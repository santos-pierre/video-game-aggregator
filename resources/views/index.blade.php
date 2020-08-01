@extends('layouts.app')


@section('content')
<div class="container mx-auto px-4">
    <!-- Start popular game -->
    <h2 class="text-blue-500 uppercase tracking-wide font-bold">Popular Games</h2>
    <div class="popular-game text-sm grid lg:grid-cols-6 md:grid-cols-4 grid-cols-2 gap-12 border-b border-gray-800 pb-16">
        @foreach ($popularGames as $game)
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="">
                        <img src={{ Str::of($game['cover']['url'])->replace('thumb', 'cover_big')->__toString() }} alt="game cover"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                        <!-- Rating -->
                        @isset($game['rating'])
                            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                                style="right: -20px; bottom: -20px;">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">
                                    {{round($game['rating']).'%'}}
                                </div>
                            </div>
                        @endisset
                    </a>
                </div>
                <a href="" class="block text-base font-bold leading-tight hover:text-gray-400 mt-8">{{$game['name']}}</a>
                @isset($game['platforms'])
                    <div class="text-gray-400 mt-1">
                        @foreach ($game['platforms'] as $platform)
                            @isset($platform["abbreviation"])
                                {{$platform["abbreviation"].','}}
                            @endisset
                        @endforeach
                    </div>
                @endisset
            </div>
        @endforeach
    </div>
    <!-- End Popular Game -->
    <div class="flex lg:flex-row flex-col my-10">
        <!-- Recently Reviewed -->
        <div class="recent-review lg:w-3/4 w-full lg:mr-32 mr-0">
            <h2 class="text-blue-500 uppercase tracking-wide font-bold">
                Recently Reviewed
            </h2>
            <div class="recently-reviewed-container space-y-12 mt-8">
                @foreach ($recentlyReviewed as $game)
                    <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                        <div class="relative flex-none">
                            <a href="">
                                <img src={{ Str::of($game['cover']['url'])->replace('thumb', 'cover_big')->__toString() }} alt="game cover"
                                    class="lg:w-48 w-24 hover:opacity-75 transition ease-in-out duration-150">
                                <!-- Rating -->
                                @isset($game['rating'])
                                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                                        style="right: -20px; bottom: -20px;">
                                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                                            {{round($game['rating']).'%'}}
                                        </div>
                                    </div>
                                @endisset
                            </a>
                        </div>
                        <div class="ml-12">
                            <a href="" class="block text-lg font-bold leading-tight hover:text-gray-400 mt-4">{{$game['name']}}</a>
                            @isset($game['platforms'])
                                <div class="text-gray-400 mt-1">
                                    @foreach ($game['platforms'] as $platform)
                                        @isset($platform["abbreviation"])
                                            {{$platform["abbreviation"].','}}
                                        @endisset
                                    @endforeach
                                </div>
                            @endisset
                            @isset($game['summary'])
                                <p class="mt-6 text-gray-400 lg:block hidden">
                                    {{$game['summary']}}
                                </p>
                            @endisset
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End Recently Reviewed -->
        <!-- Side bar -->
        <div class="most-anticipated lg:w-1/4 w-full lg:mt-0 mt-12">
            <!--  Most Anticipated Games  -->
            <h2 class="text-blue-500 uppercase tracking-wide font-bold">
                Most Anticipated
            </h2>
            <div class="most-anticipated-container space-y-10 mt-8">
                @foreach ($mostAnticipated as $game)
                    <div class="game flex">
                        <a href="">
                            <img src={{ Str::of($game['cover']['url'])->replace('thumb', 'cover_small')->__toString() }} alt="game cover"
                                class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="" class="block text-sm font-bold hover:text-gray-400"> {{$game['name']}}</a>
                            <div class="text-gray-400 text-sm mt-1">{{Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y')}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--  End Most Anticipated Games  -->
            <!--  Coming Soon  -->
            <h2 class="text-blue-500 uppercase tracking-wide font-bold mt-12">
                Coming soon
            </h2>
            <div class="most-anticipated-container space-y-10 mt-8">
                @foreach ($comingSoon as $game)
                    <div class="game flex">
                        <a href="">
                            <img src={{ Str::of($game['cover']['url'])->replace('thumb', 'cover_small')->__toString() }} alt="game cover"
                                class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="" class="block text-sm font-bold hover:text-gray-400"> {{$game['name']}}</a>
                            <div class="text-gray-400 text-sm mt-1">{{Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y')}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End  Coming Soon  -->
        </div>
    </div>
</div>
@endsection