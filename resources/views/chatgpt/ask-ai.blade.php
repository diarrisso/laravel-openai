<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demander à l'IA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-md p-8">

        <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">Pose ta question à l'IA</h1>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('ask.form') }}" class="space-y-4">
            @csrf
            <label for="prompt" class="block text-gray-700 font-semibold">Votre question :</label>
            <textarea name="prompt" rows="4" class="w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: Comment générer un PDF en Laravel ?">{{ old('prompt') }}</textarea>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition duration-300 w-full">
                Envoyer
            </button>
        </form>

        @if (session('aiResponse'))
            <div class="mt-8 border-t pt-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Question :</h2>
                <p class="bg-gray-50 p-4 rounded-lg text-gray-700">{{ session('aiResponse')->prompt }}</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">Réponse de l'IA :</h2>
                <p class="bg-green-50 p-4 rounded-lg text-gray-800 whitespace-pre-wrap">{{ session('aiResponse')->response }}</p>
            </div>
        @endif

    </div>
</body>
</html>
