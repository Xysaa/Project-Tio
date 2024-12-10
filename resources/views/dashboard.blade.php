<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Laravel 11</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <nav class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button 
                    type="submit" 
                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out"
                >
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <main class="container mx-auto mt-8 px-4 flex-grow">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Welcome, {{ Auth::user()->name }}!</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-blue-100 p-4 rounded-lg shadow-sm">
                    <h3 class="text-lg font-medium text-blue-800 mb-2">Total Users</h3>
                    <p class="text-2xl font-bold text-blue-600">{{ \App\Models\User::count() }}</p>
                </div>

                <div class="bg-green-100 p-4 rounded-lg shadow-sm">
                    <h3 class="text-lg font-medium text-green-800 mb-2">Active Sessions</h3>
                    <p class="text-2xl font-bold text-green-600">1</p>
                </div>

                <div class="bg-purple-100 p-4 rounded-lg shadow-sm">
                    <h3 class="text-lg font-medium text-purple-800 mb-2">Your Role</h3>
                    <p class="text-xl font-bold text-purple-600">
                        {{ Auth::user()->role ?? 'User' }}
                    </p>
                </div>
            </div>

            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Recent Activity</h3>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-gray-600">No recent activity</p>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-200 text-center py-4 mt-8">
        <p class="text-gray-600">&copy; {{ date('Y') }} Your Application. All rights reserved.</p>
    </footer>
</body>
</html>