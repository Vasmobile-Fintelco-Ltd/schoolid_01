<?php
// app/Services/OpenAIService.php
namespace App\Services;

use GuzzleHttp\Client;

class OpenAIService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY');
    }

    public function checkAnswer($question, $answer)
    {
        $prompt = "You are a quiz grader. A student has answered a question. Please respond with 'correct' or 'incorrect' only.\n\nQuestion: $question\nStudent Answer: $answer\nGrade:";

        $response = $this->client->post('https://api.openai.com/v1/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'text-davinci-003',
                'prompt' => $prompt,
                'max_tokens' => 10,
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return trim($data['choices'][0]['text']);
    }
}

