<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laravel Application' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <nav class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <h1 class="text-2xl font-bold">{{ $pageTitle ?? 'Application' }}</h1>
                
                <div class="flex space-x-2">
                    <a href="{{ route('dashboard') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                        Dashboard
                    </a>
                    <a href="{{ route('suppliers.index') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                        Suppliers
                    </a>
                    <a href="{{ route('items.index') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                        Items
                    </a>
                    <a href="{{ route('transactions.index') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                        Transactions
                    </a>
                </div>
            </div>
            
            @auth
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button 
                    type="submit" 
                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out"
                >
                    Logout
                </button>
            </form>
            @endauth
        </div>
    </nav>

    <main class="container mx-auto mt-8 px-4 flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-200 text-center py-4 mt-8">
        <p class="text-gray-600">&copy; {{ date('Y') }} Your Application. All rights reserved.</p>
    </footer>
</body>
</html>