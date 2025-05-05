<?php

namespace App\Http\Controllers;

use App\Models\AiResponse;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class HomeController extends Controller
{
    // Affiche la liste des réponses IA (Index)
    public function index()
    {
        return view('users.request.index', [
            'aiResponses' => AiResponse::latest()->get(),
        ]);
    }

    // Affiche le formulaire de demande (Create)
    public function create()
    {
        return view('users.request.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
        ]);


        $prompt = 'Suggest me 5 domain names from "' . $request->title . '" topic. Simply give me a domain name list like: 1. ... 2. ... etc.';


        $openaiResponse = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        $responseText = $openaiResponse['choices'][0]['message']['content'] ?? 'No response from AI.';


        $aiResponse = AiResponse::create([
            'prompt' => $prompt,
            'response' => $responseText,
            //'user_id' => auth()->id(), // Optionnel selon ton app
        ]);


        return view('users.request.result', compact('responseText', 'prompt'));
    }
}
