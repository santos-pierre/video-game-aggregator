@extends('layouts.app')


@section('content')
<div class="container mx-auto px-4">
    <!-- Start popular game -->
    <h2 class="text-blue-500 uppercase tracking-wide font-bold">Popular Games</h2>
    <livewire:popular-games>
    @push('scripts')
        <x-rating-progress-bar event="popularGameRating" />
    @endpush
    <!-- End Popular Game -->
    <div class="flex lg:flex-row flex-col my-10">
        <!-- Recently Reviewed -->
        <div class="recent-review lg:w-3/4 w-full lg:mr-32 mr-0">
            <h2 class="text-blue-500 uppercase tracking-wide font-bold">
                Recently Reviewed
            </h2>
            <livewire:recently-reviewed>
            @push('scripts')
                <x-rating-progress-bar event="reviewedGameRating" />
            @endpush
        </div>
        <!-- End Recently Reviewed -->
        <!-- Side bar -->
        <div class="most-anticipated lg:w-1/4 w-full lg:mt-0 mt-12">
            <!--  Most Anticipated Games  -->
            <h2 class="text-blue-500 uppercase tracking-wide font-bold">
                Most Anticipated
            </h2>
            <livewire:most-anticipated>
            <!--  End Most Anticipated Games  -->
            <!--  Coming Soon  -->
            <h2 class="text-blue-500 uppercase tracking-wide font-bold mt-12">
                Coming soon
            </h2>
            <livewire:coming-soon>
            <!-- End  Coming Soon  -->
        </div>
    </div>
</div>
@endsection