@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Historique des requêtes IA</h1>

    @forelse ($aiResponses as $response)
        <div class="mb-6 border-b pb-4">
            <h3 class="font-semibold text-gray-700">Prompt :</h3>
            <p class="text-gray-800 mb-2">{{ $response->prompt }}</p>

            <h4 class="font-semibold text-gray-700">Réponse :</h4>
            <pre class="bg-gray-100 p-3 rounded text-gray-800 whitespace-pre-wrap">{{ $response->response }}</pre>
        </div>
    @empty
        <p class="text-gray-600">Aucune réponse générée pour l’instant.</p>
    @endforelse
</div>
@endsection
