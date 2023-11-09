<x-layout>
    <x-loading />

    <div id="swiperHero" class="swiper h-5/6">
        <div class="swiper-wrapper">
            @foreach ($hero as $movie)
                <div class="swiper-slide relative">
                    <img src="{{ $movie['image'] }}" alt="" class="object-center" />
                    <div class="h-full w-full absolute top-0 bg-gradient-to-t from-black via-black/30 to-transparent">
                    </div>

                    <div class="sm:max-w-screen-xl mx-auto">
                        <div
                            class="w-full md:w-3/4 xl:w-1/2 absolute top-1/2 transform -translate-y-1/2 md:left-10 xl:left-[unset] px-2 mt-5 sm:pr-28 font-semibold">
                            <span class="block sm:text-lg mb-2">
                                <i class="fa-solid fa-star text-yellow-300 mr-2"></i>{{ $movie['ratings'] }}
                                {{ $movie['genre'] }}
                            </span>
                            <h1 class="text-4xl sm:text-6xl font-bold uppercase ff-accent">
                                {{ $movie['title'] }}
                            </h1>
                            <p class="text-md mt-3 mb-10">
                                {{ $movie['plot'] }}
                            </p>

                            <div class="grid sm:flex gap-5">
                                <button type="button" class="sm:w-48 py-5 px-4 rounded-full text-md bg-accent-color">
                                    <i class="fa-solid fa-play mr-3"></i> Play
                                </button>
                                <a href="/netflix/movies/movie/{{ $movie['id'] }}"
                                    class="sm:w-48 py-5 px-4 rounded-full text-md text-center border-[3px] border-accent-color hover:bg-accent-color-light">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="swiper-pagination swiper-pagination__long mb-3"></div>
    </div>

    <!-- recommended movies -->
    <div class="mt-16">
        <div id="swiper-infinite-loop" class="swiper">
            <div class="swiper-wrapper w-full">
                @foreach ($movies as $movie)
                    <a href="/netflix/movies/movie/{{ $movie['id'] }}" class="swiper-slide">
                        <figure class="h-80 sm:h-96 grid" style="grid-template-rows: 1fr auto">
                            <div class="rounded-md overflow-hidden">
                                <img src="{{ $movie['image'] }}" alt="" class="w-full h-full object-cover" />
                            </div>
                            <figcaption class="py-5 overflow-hidden">
                                <h4 class="text-ellipsis overflow-hidden whitespace-nowrap w-full">
                                    {{ $movie['title'] }}
                                </h4>
                            </figcaption>
                        </figure>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- new movies -->
    <div class="max-w-screen-xl mx-auto mt-24">
        <div
            class="mb-10 pb-5 px-2 flex justify-between items-center sm:items-end border-b border-solid border-gray-500">
            <h1 class="text-2xl font-semibold">
                <i class="fa-solid fa-clapperboard"></i> New Movies
            </h1>

            <a href="/netflix/movies">View all <i class="fa-solid fa-arrow-right ml-2"></i></a>
        </div>

        <div id="swiper-loop" class="swiper">
            <div id="swiper-to-grid" class="swiper-wrapper px-2 md:grid grid-cols-4 xl:grid-cols-6 md:gap-5">
                @foreach ($movies as $movie)
                    <a href="/netflix/movies/movie/{{ $movie['id'] }}" class="swiper-slide h-96">
                        <figure class="h-96 grid" style="grid-template-rows: 1fr auto">
                            <div class="rounded-md overflow-hidden">
                                <img src="{{ $movie['image'] }}" alt="" class="w-full h-full object-cover" />
                            </div>
                            <figcaption class="py-5 overflow-hidden">
                                <h4 class="text-ellipsis overflow-hidden whitespace-nowrap w-full mb-2">
                                    {{ $movie['title'] }}
                                </h4>

                                <div class="flex justify-between">
                                    <p>{{ $movie['release_year'] }}</p>
                                    <span>
                                        <i class="fa-solid fa-star mr-2 text-yellow-300"></i>{{ $movie['ratings'] }}
                                    </span>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- popular movies -->
    <div class="max-w-screen-xl mx-auto mt-24">
        <div
            class="mb-10 pb-5 px-2 flex justify-between items-center sm:items-end border-b border-solid border-gray-500">
            <h1 class="text-2xl font-semibold">
                <i class="fa-solid fa-clapperboard"></i> Popular Movies
            </h1>

            <a href="/netflix/movies">View all <i class="fa-solid fa-arrow-right ml-2"></i></a>
        </div>

        <div id="swiper-loop" class="swiper">
            <div id="swiper-to-grid" class="swiper-wrapper px-2 md:grid grid-cols-4 xl:grid-cols-6 md:gap-5">
                @foreach ($movies as $movie)
                    <a href="/netflix/movies/movie/{{ $movie['id'] }}" class="swiper-slide h-96">
                        <figure class="h-96 grid" style="grid-template-rows: 1fr auto">
                            <div class="rounded-md overflow-hidden">
                                <img src="{{ $movie['image'] }}" alt="" class="w-full h-full object-cover" />
                            </div>
                            <figcaption class="py-5 overflow-hidden">
                                <h4 class="text-ellipsis overflow-hidden whitespace-nowrap w-full mb-2">
                                    {{ $movie['title'] }}
                                </h4>

                                <div class="flex justify-between">
                                    <p>{{ $movie['release_year'] }}</p>
                                    <span>
                                        <i class="fa-solid fa-star mr-2 text-yellow-300"></i>{{ $movie['ratings'] }}
                                    </span>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- movies -->
    <div class="max-w-screen-xl mx-auto mt-24">
        <div
            class="mb-10 pb-5 px-2 flex justify-between items-center sm:items-end border-b border-solid border-gray-500">
            <h1 class="text-2xl font-semibold">
                <i class="fa-solid fa-film mr-3"></i> Movies
            </h1>

            <div class="flex items-center gap-10">
                <select name="sortby" id="sortby" class="hidden bg-transparent border w-48 py-1 px-3">
                    <option value="volvo">Latest</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                </select>
                <a href="/netflix/movies">View all <i class="fa-solid fa-arrow-right ml-2"></i></a>
            </div>
        </div>

        <div id="swiper-loop" class="swiper">
            <div id="swiper-to-grid" class="swiper-wrapper px-2 md:grid grid-cols-4 xl:grid-cols-6 md:gap-5">
                @foreach ($movies as $movie)
                    <a href="/netflix/movies/movie/{{ $movie['id'] }}" class="swiper-slide h-96">
                        <figure class="h-96 grid" style="grid-template-rows: 1fr auto">
                            <div class="rounded-md overflow-hidden">
                                <img src="{{ $movie['image'] }}" alt=""
                                    class="w-full h-full object-cover" />
                            </div>
                            <figcaption class="py-5 overflow-hidden">
                                <h4 class="text-ellipsis overflow-hidden whitespace-nowrap w-full mb-2">
                                    {{ $movie['title'] }}
                                </h4>

                                <div class="flex justify-between">
                                    <p>{{ $movie['release_year'] }}</p>
                                    <span>
                                        <i class="fa-solid fa-star mr-2 text-yellow-300"></i>{{ $movie['ratings'] }}
                                    </span>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <x-footer />
</x-layout>
