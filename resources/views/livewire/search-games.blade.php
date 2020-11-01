<div class="flex flex-col" x-data="{ open: @entangle('search') }">
  <div class="relative" >
      <input wire:model="search" type="text" class="bg-gray-800 text-sm rounded-full focus:outline-none focus:shadow-outline px-3 py-1 w-64 pl-8" placeholder="Search ..." @click.away="$wire.set('search', '')">
      <div class="absolute top-0 flex items-center h-full ml-2">
          <svg class="text-gray-400 w-4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
      </div>
  </div>
  <div x-show="open" 
        class="bg-gray-800 border border-blue-500 h-64 w-64 absolute z-50 mt-10 rounded-sm overflow-scroll overflow-x-hidden" 
        style="scrollbar-width: none;">
      <ul class="game-list space-y-2">
          @forelse ($gamesResult as $game)
            <li>
              <a href="{{route('games.show', $game['slug'])}}" class="block hover:bg-blue-900 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                <div class="flex items-center">
                  <div class="min-w-0 flex-1 flex items-center">
                    <div class="flex-shrink-0 p-2">
                      <img class="w-10" src="{{ isset($game['cover']['url']) ? Str::of($game['cover']['url'])->replace('thumb', 'cover_big')->__toString() : asset('img/cover_big.png')}}" alt="">
                    </div>
                    <div>
                        <div class="ml-4">
                            <span href="#" class="block text-sm font-bold hover:text-gray-400">{{$game['name']}}</span>
                            <div class="text-white text-sm mt-1">{{isset($game['first_release_date']) ? Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') : "N/A"}}</div>
                        </div>
                    </div>
                  </div>
                </div>
              </a>
            </li>
          @empty
            <h3 class="text-center text-lg text-gray-500 mt-3" wire:loading.class='hidden'>No Result Found</h3>
          @endforelse
        </ul>
        <div wire:loading>
          <span class="flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
          </span>
        </div>
  </div>
</div>