<?php
use App\Models\AiResponse;

use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/openai', function() {

    $prompt = 'Comment générer un PDF en Laravel ?';

    $result = OpenAI::chat()->create([
        'model' => 'gpt-4o-mini',
        'messages' => [
            ['role' => 'user', 'content' => $prompt],
        ],
    ]);

    $response = $result->choices[0]->message->content;

    // Enregistrement dans la base
    AiResponse::create([
        'prompt' => $prompt,
        'response' => $response,
    ]);

    echo $response;
});

Route::get('/prompt', [HomeController::class, 'index'])->name('prompt.index');
Route::get('/prompt/create', [HomeController::class, 'create'])->name('prompt.create');
Route::post('/prompt', [HomeController::class, 'store'])->name('prompt.store');
