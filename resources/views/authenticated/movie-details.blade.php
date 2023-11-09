<x-layout>
    <x-loading />

    <div class="h-3/6 overflow-hidden hidden md:block">
        <img src="{{ $movieDetails['cover'] }}" alt="" />
    </div>

    <div class="md:max-w-screen-xl mx-auto px-2 pt-24 sm:pt-32 md:pt-0 md:px-5">
        <div class="flex flex-col md:flex-row gap-10">
            <div class="md:w-[35rem] md:h-[30rem] sm:mt-[-4%]">
                <img src="{{ $movieDetails['image'] }}" alt="" class="h-[20rem] md:h-[30rem] mb-5" />

                <div class="grid sm:grid-cols-2 md:grid-cols-1 gap-4 mt-5 px-2 md:px-0">
                    <button type="button"
                        class="py-5 px-4 rounded-full text-md bg-accent-color hover:bg-accent-color-light">
                        <i class="fa-solid fa-play mr-3"></i> Play
                    </button>
                    <form method="POST" action="{{ route('netflix.add-to-list') }}">
                        @csrf
                        <input type="hidden" name="movieID" value="{{ $movieDetails['id'] }}" />

                        <button type="submit"
                            class="w-full py-5 px-4 rounded-full text-md bg-gray-800 hover:bg-gray-700"
                            @if ($movieExisted) disabled @endif>
                            @if ($movieExisted)
                                <i class="fa-solid fa-check mr-3"></i> Saved to List
                            @else
                                <i class="fa-solid fa-plus mr-3"></i> Add List
                            @endif
                        </button>
                    </form>
                </div>
            </div>

            <div class="w-full py-8 px-2">
                <div class="text-center sm:text-left pb-5 border-b border-solid border-gray-500">
                    <h2 class="text-3xl font-bold uppercase">
                        {{ $movieDetails['title'] }}
                    </h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>

                <span
                    class="hidden sm:flex items-center justify-between lg:justify-start lg:gap-8 py-5 border-b border-solid border-gray-500">
                    <span><i class="fa-regular fa-eye mr-2"></i>33,546</span>
                    <span><i class="fa-solid fa-star text-yellow-300 mr-2"></i>{{ $movieDetails['ratings'] }}</span>

                    <span class="font-bold text-xs py-1 px-2 ml-5 border rounded-lg">IMDb:
                        {{ $movieDetails['imdb'] }}</span>

                    <div class="ml-5 flex items-center gap-5">
                        <span class="pr-5 border-r border-solid border-gray-500">{{ $movieDetails['fr'] }}</span>
                        <span>{{ $movieDetails['duration'] }}</span>
                    </div>
                </span>

                <div class="py-5 border-b border-solid border-gray-500">
                    <h3 class="text-2xl font-bold mb-6">Details</h3>

                    <ul class="grid gap-y-4">
                        <li class="flex gap-2">
                            <h6 class="font-semibold">Director:</h6>
                            <span class="ml-3">{{ $movieDetails['director'] }}</span>
                        </li>
                        <li class="flex gap-2">
                            <h6 class="font-semibold">Country:</h6>
                            <span class="ml-3">{{ $movieDetails['country'] }}</span>
                        </li>
                        <li class="flex gap-2">
                            <h6 class="font-semibold">Date released:</h6>
                            <span class="ml-3">{{ $movieDetails['release_year'] }}</span>
                        </li>
                        <li class="flex gap-2 sm:hidden">
                            <h6 class="font-semibold">Duration:</h6>
                            <span>
                                {{ $movieDetails['duration'] }}
                            </span>
                        </li>
                        <li class="flex gap-2">
                            <h6 class="font-semibold">Cast:</h6>
                            <span class="ml-3 inline-block">{{ $movieDetails['cast'] }}</span>
                        </li>
                        <li class="flex gap-2 sm:hidden">
                            <h6 class="font-semibold">IMDb:</h6>
                            <span>
                                <span class="ml-3">{{ $movieDetails['imdb'] }}</span>
                            </span>
                        </li>
                        <li class="flex gap-2 sm:hidden">
                            <h6 class="font-semibold">Ratings:</h6>
                            <span>
                                <i class="fa-solid fa-star text-yellow-300 mr-2 ml-3"></i>
                                {{ $movieDetails['ratings'] }}
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="py-5">
                    <h3 class="text-2xl font-bold mb-6">Storyline</h3>

                    <p>{{ $movieDetails['plot'] }}</p>
                </div>

                <div class="grid sm:grid-cols-2 md:grid-cols-5 gap-2">
                    @foreach ($movieDetails['screenshots'] as $ss)
                        <div class="h-48 md:h-24"><img src="{{ $ss }}" alt="" /></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</x-layout>
