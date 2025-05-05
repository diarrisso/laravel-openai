<?php
use OpenAI\Laravel\Facades\OpenAI;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/openai', function() {

    $result =  OpenAI::chat()->create([
        'model' => 'gpt-4o-mini',
        'messages' => [
            ['role' => 'user', 'content' => 'Hello!'],
        ],
    ]);

    echo $result->choices[0]->message->content;
});