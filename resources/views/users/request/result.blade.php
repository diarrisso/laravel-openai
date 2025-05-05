@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Prompt :</h2>
    <p class="bg-gray-50 p-4 rounded-lg text-gray-700">{{ $prompt }}</p>

    <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">Réponse de l'IA :</h2>
    <pre class="bg-green-50 p-4 rounded-lg text-gray-800 whitespace-pre-wrap">{{ $responseText }}</pre>

    <div class="mt-6">
        <a href="{{ route('prompt.create') }}" class="text-blue-600 hover:underline">Faire un autre essai</a>
    </div>
</div>
@endsection
