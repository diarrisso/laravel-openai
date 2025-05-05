<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Application Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 font-sans">
    <div class="container mx-auto px-4 py-6">
        @yield('content')
    </div>
</body>
</html>
