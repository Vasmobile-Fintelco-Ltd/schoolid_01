<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatsGPTController extends Controller
{
    public function evaluateAnswer(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $question = $request->input('question');
        $answerText = $request->input('answer');

        // OpenAI API URL and Key
        $apiKey = env('OPENAI_API_KEY');
        $url = 'https://api.openai.com/v1/chat/completions';

        try {
            // Prepare the request payload
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post($url, [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a helpful assistant that evaluates answers and provides correct answers if the user is wrong.'
                    ],
                    [
                        'role' => 'user',
                        'content' => "Evaluate this answer for the following question. Please compare the student's answer with the correct one, considering both similarity and correctness: \"$question\". User's answer: \"$answerText\". If the answer is incorrect,
                         provide the correct answer in the format: 'status: incorrect. Correct answer: {correct answer}'. If the answer is correct, respond with 'status: correct'."
                    ]
                ],
                'max_tokens' => 100,
                'temperature' => 0,
            ]);

            // Log the full response for debugging
            //Log::info('OpenAI API response:', $response->json());

            if ($response->ok()) {
                $responseData = $response->json();
                if (isset($responseData['choices'][0]['message']['content'])) {
                    $result = trim($responseData['choices'][0]['message']['content']);
                    Log::info('OpenAI API result:', ['result' => $result]);

                    // Parse result
                    $resultParts = explode("Correct answer:", $result, 2);
                    $status = isset($resultParts[0]) ? trim($resultParts[0]) : 'error';
                    $correctAnswer = isset($resultParts[1]) ? trim($resultParts[1]) : null;

                    // Handle edge cases where correct answer is not provided
                    if (strpos($status, 'status:') !== false) {
                        $status = str_replace('status:', '', $status);
                        $status = trim($status);
                    }

                    if ($status === 'correct' || $status === 'incorrect' || $correctAnswer) {
                        return response()->json([
                            'result' => $status,
                            'correct_answer' => $correctAnswer 
                            
                        ]);
                    } else {
                        return response()->json(['result' => 'error', 'message' => 'Unexpected response format from OpenAI.'], 500);
                    }
                } else {
                    return response()->json(['result' => 'error', 'message' => 'No content found in response.'], 500);
                }
            } else {
                return response()->json(['result' => 'error', 'message' => $response->body()], $response->status());
            }
        } catch (\Exception $e) {
            Log::error('Error evaluating answer: ' . $e->getMessage());
            return response()->json(['result' => 'error', 'message' => 'An error occurred while processing your request.'], 500);
        }
    }
}
