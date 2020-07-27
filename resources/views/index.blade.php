@extends('layouts.app')


@section('content')
    <div class="container mx-auto px-4">
        <!-- Start popular game -->
        <h2 class="text-blue-500 uppercase tracking-wide font-bold">Popular Games</h2>
        <div class="popular-game text-sm grid grid-cols-6 gap-12 border-b border-gray-800 pb-16">
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="">
                        <img src={{ asset('img/tlou2.jpg') }} alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                        <!-- Rating -->
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: -20px; bottom: -20px;">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                80%
                            </div>
                        </div>
                    </a>
                </div>
                <a href="" class="block text-base font-bold leading-tight hover:text-gray-400 mt-8"> The Last Of Us II</a>
                <div class="text-gray-400 mt-1"> Playstation 4</div>
            </div>
        </div>
        <!-- End Popular Game -->
        <div class="flex my-10">
            <!-- Recently Reviewed -->
            <div class="recent-review w-3/4 mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-bold">
                    Recently Reviewed
                </h2>
                <div class="recently-reviewed-container space-y-12 mt-8">
                    <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                        <div class="relative flex-none">
                            <a href="">
                                <img src={{ asset('img/tlou2.jpg') }} alt="game cover" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                                <!-- Rating -->
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full" style="right: -20px; bottom: -20px;">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        80%
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="ml-12">
                            <a href="" class="block text-lg font-bold leading-tight hover:text-gray-400 mt-4"> The Last Of Us II</a>
                            <div class="text-gray-400 mt-1"> Playstation 4</div>
                            <p class="mt-6 text-gray-400">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit placeat, eveniet animi, necessitatibus vero perferendis voluptatibus reprehenderit velit aperiam quo esse amet aspernatur in cum labore, laborum dicta accusantium! Ea.Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit placeat, eveniet animi, necessitatibus vero
                            </p>
                        </div>
                    </div>
                    <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                        <div class="relative flex-none">
                            <a href="">
                                <img src={{ asset('img/tlou2.jpg') }} alt="game cover" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                                <!-- Rating -->
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full" style="right: -20px; bottom: -20px;">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        80%
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="ml-12">
                            <a href="" class="block text-lg font-bold leading-tight hover:text-gray-400 mt-4"> The Last Of Us II</a>
                            <div class="text-gray-400 mt-1"> Playstation 4</div>
                            <p class="mt-6 text-gray-400">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit placeat, eveniet animi, necessitatibus vero perferendis voluptatibus reprehenderit velit aperiam quo esse amet aspernatur in cum labore, laborum dicta accusantium! Ea.Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit placeat, eveniet animi, necessitatibus vero
                            </p>
                        </div>
                    </div>
                    <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                        <div class="relative flex-none">
                            <a href="">
                                <img src={{ asset('img/tlou2.jpg') }} alt="game cover" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                                <!-- Rating -->
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full" style="right: -20px; bottom: -20px;">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        80%
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="ml-12">
                            <a href="" class="block text-lg font-bold leading-tight hover:text-gray-400 mt-4"> The Last Of Us II</a>
                            <div class="text-gray-400 mt-1"> Playstation 4</div>
                            <p class="mt-6 text-gray-400">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit placeat, eveniet animi, necessitatibus vero perferendis voluptatibus reprehenderit velit aperiam quo esse amet aspernatur in cum labore, laborum dicta accusantium! Ea.Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit placeat, eveniet animi, necessitatibus vero
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Recently Reviewed -->
            <!-- Side bar -->
            <div class="most-anticipated w-1/4">
                 <!--  Most Anticipated Games  -->
                <h2 class="text-blue-500 uppercase tracking-wide font-bold">
                    Most Anticipated
                </h2>
                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="game flex">
                        <a href="">
                            <img src={{ asset('img/tlou2.jpg') }} alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="" class="block text-sm font-bold hover:text-gray-400"> The Last Of Us: Part II</a>
                            <div class="text-gray-400 text-sm mt-1"> Jun 19, 2020</div>
                        </div>
                    </div>
                    <div class="game flex">
                        <a href="">
                            <img src={{ asset('img/tlou2.jpg') }} alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="" class="block text-sm font-bold hover:text-gray-400"> The Last Of Us: Part II</a>
                            <div class="text-gray-400 text-sm mt-1"> Jun 19, 2020</div>
                        </div>
                    </div>
                    <div class="game flex">
                        <a href="">
                            <img src={{ asset('img/tlou2.jpg') }} alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="" class="block text-sm font-bold hover:text-gray-400"> The Last Of Us: Part II</a>
                            <div class="text-gray-400 text-sm mt-1"> Jun 19, 2020</div>
                        </div>
                    </div>
                    <div class="game flex">
                        <a href="">
                            <img src={{ asset('img/tlou2.jpg') }} alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="" class="block text-sm font-bold hover:text-gray-400"> The Last Of Us: Part II</a>
                            <div class="text-gray-400 text-sm mt-1"> Jun 19, 2020</div>
                        </div>
                    </div>
                </div>
                <!--  End Most Anticipated Games  -->
                <!--  Coming Soon  -->
                <h2 class="text-blue-500 uppercase tracking-wide font-bold mt-12">
                    Coming soon
                </h2>
                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="game flex">
                        <a href="">
                            <img src={{ asset('img/tlou2.jpg') }} alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="" class="block text-sm font-bold hover:text-gray-400"> The Last Of Us: Part II</a>
                            <div class="text-gray-400 text-sm mt-1"> Jun 19, 2020</div>
                        </div>
                    </div>
                    <div class="game flex">
                        <a href="">
                            <img src={{ asset('img/tlou2.jpg') }} alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="" class="block text-sm font-bold hover:text-gray-400"> The Last Of Us: Part II</a>
                            <div class="text-gray-400 text-sm mt-1"> Jun 19, 2020</div>
                        </div>
                    </div>
                    <div class="game flex">
                        <a href="">
                            <img src={{ asset('img/tlou2.jpg') }} alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="" class="block text-sm font-bold hover:text-gray-400"> The Last Of Us: Part II</a>
                            <div class="text-gray-400 text-sm mt-1"> Jun 19, 2020</div>
                        </div>
                    </div>
                    <div class="game flex">
                        <a href="">
                            <img src={{ asset('img/tlou2.jpg') }} alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="" class="block text-sm font-bold hover:text-gray-400"> The Last Of Us: Part II</a>
                            <div class="text-gray-400 text-sm mt-1"> Jun 19, 2020</div>
                        </div>
                    </div>
                </div>
                <!-- End  Coming Soon  -->
            </div>
        </div>
    </div>
@endsection