<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Inventory App' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen">
        <header class="bg-blue-500 text-white py-4">
            <div class="container mx-auto px-4">
                <h1 class="text-xl font-bold">Inventory App</h1>
            </div>
        </header>
        <main class="container mx-auto px-4 py-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
