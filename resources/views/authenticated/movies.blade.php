<x-layout>
    <x-loading />

    <!-- movies -->
    <div class="max-w-screen-xl mx-auto mt-36">
        <div class="mb-10 flex justify-between items-end pb-5 border-b border-solid border-gray-500">
            <h1 class="text-2xl font-semibold">
                <i class="fa-solid fa-film mr-3"></i> Movies
            </h1>
        </div>

        <div class="px-2">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-3 md:gap-5">
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
    <x-footer />
</x-layout>
