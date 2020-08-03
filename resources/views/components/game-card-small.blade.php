<div class="flex">
    <a href="{{route('games.show', $game['slug'])}}">
        <img src="{{ $game['coverImageUrl']}}"" alt="game cover"
        class="w-16 hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="ml-4">
        <a href="{{route('games.show', $game['slug'])}}" class="block text-sm font-bold hover:text-gray-400"> {{$game['name']}}</a>
        <div class="text-gray-400 text-sm mt-1">{{$game['first_release_date']}}</div>
    </div>
</div>