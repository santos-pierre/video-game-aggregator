<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Games</title>
    <link rel="stylesheet" href={{ asset('css/main.css') }}>
    <livewire:styles>
</head>
<body class="bg-gray-900 text-white font-semibold">
    <header class="border-b border-gray-800">
        <nav class="container mx-auto flex lg:flex-row flex-col items-center justify-between px-4 py-6">
            <div class="flex lg:flex-row flex-col items-center">
                <!-- Logo -->
                <a href="/">
                    <img src={{ asset('img/logo.png') }} alt="logo" class="w-16">
                </a>
                <!-- navlinks -->
                <ul class="flex lg:ml-16 ml-0 space-x-8 my-5 lg:my-0">
                    <li><a href="{{route('games.index')}}" class="hover:text-gray-400">Games</a></li>
                    <li><span class="text-gray-600 cursor-default">Reviews</span></li>
                    <li><span class="text-gray-600 cursor-default">Coming Soon</span></li>
                </ul>
            </div>
            <div class="flex items-center">
                <livewire:search-games />
                <div class="ml-6">
                    <span><img src={{ asset('img/fireflies-logo.png') }} alt="avatar" class="rounded-full w-8 h-8 bg-white"></span>
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
    <livewire:scripts>
    <script src="{{ url(mix('js/app.js')) }}"></script>
</body>
</html>