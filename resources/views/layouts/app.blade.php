<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Games</title>
    <link rel="stylesheet" href={{ asset('css/main.css') }}>
</head>
<body class="bg-gray-900 text-white font-semibold">
    <header class="border-b border-gray-800">
        <nav class="container mx-auto flex items-center justify-between px-4 py-6">
            <div class="flex items-center">
                <!-- Logo -->
                <a href="/">
                    <img src={{ asset('img/logo.png') }} alt="logo" class="w-16">
                </a>
                <!-- navlinks -->
                <ul class="flex ml-16 space-x-8">
                    <li><a href="#" class="hover:text-gray-400">Games</a></li>
                    <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                    <li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
                </ul>
            </div>
            <div class="flex items-center">
                <div class="relative">
                    <input type="text" class="bg-gray-800 text-sm rounded-full focus:outline-none focus:shadow-outline px-3 py-1 w-64 pl-8" placeholder="Search ...">
                    <div class="absolute top-0 flex items-center h-full ml-2">
                        <svg class="text-gray-400 w-4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                </div>
                <div class="ml-6">
                    <a href="#"><img src={{ asset('img/fireflies-logo.png') }} alt="" class="rounded-full w-8 h-8 bg-white"></a>
                </div>
            </div>
        </nav>
    </header>
    <main class="py-8">
        @yield('content')
    </main>

    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            Power By <a href="#" class="underline hover:text-gray-400">IGDB API</a>
        </div>
    </footer>
</body>
</html>