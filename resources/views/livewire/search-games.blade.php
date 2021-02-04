<div class="flex flex-col" x-data="{ open:  @entangle('search') }">
  <div class="relative" >
      <input wire:model="search" type="text" class="w-64 px-3 py-1 pl-8 text-sm bg-gray-800 rounded-full focus:outline-none focus:shadow-outline" placeholder="Search ..." @click.away="$wire.set('search', '')">
      <div class="absolute top-0 flex items-center h-full ml-2">
          <svg class="w-4 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
      </div>
  </div>
  <div x-show="open"
        class="absolute z-50 w-64 h-64 mt-10 overflow-scroll overflow-x-hidden bg-gray-800 border border-blue-500 rounded-sm"
        style="scrollbar-width: none;">
      <ul class="space-y-2 game-list">
          @forelse ($gamesResult as $game)
            <li>
              <a href="{{route('games.show', $game['slug'])}}" class="block transition duration-150 ease-in-out hover:bg-blue-900 focus:outline-none focus:bg-gray-50">
                <div class="flex items-center">
                  <div class="flex items-center flex-1 min-w-0">
                    <div class="flex-shrink-0 p-2">
                      <img class="w-10" src="{{ isset($game['cover']['url']) ? Str::of($game['cover']['url'])->replace('thumb', 'cover_big')->__toString() : asset('img/cover_big.png')}}" alt="">
                    </div>
                    <div>
                        <div class="ml-4">
                            <span href="#" class="block text-sm font-bold hover:text-gray-400">{{$game['name']}}</span>
                            <div class="mt-1 text-sm text-white">{{isset($game['first_release_date']) ? Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') : "N/A"}}</div>
                        </div>
                    </div>
                  </div>
                </div>
              </a>
            </li>
          @empty
            <h3 class="mt-3 text-lg text-center text-gray-500" wire:loading.class='hidden'>No Result Found</h3>
          @endforelse
        </ul>
        <div wire:loading>
          <span class="flex w-3 h-3">
            <span class="absolute inline-flex w-full h-full bg-blue-400 rounded-full opacity-75 animate-ping"></span>
          </span>
        </div>
  </div>
</div>
