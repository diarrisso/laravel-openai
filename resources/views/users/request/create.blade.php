@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Générer des noms de domaine</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('prompt.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Sujet du domaine :</label>
            <input type="text" name="title" class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-400" placeholder="ex: crypto, musique, startup...">
        </div>
        <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-700 transition">Envoyer</button>
    </form>
</div>
@endsection
