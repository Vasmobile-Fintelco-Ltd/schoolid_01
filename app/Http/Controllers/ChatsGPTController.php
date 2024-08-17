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
            'answerreturn response()->json(['result' => 'error', 'message' => 'Unexpected response format from OpenAI.'], 500);
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
