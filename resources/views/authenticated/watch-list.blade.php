<x-layout>
    <x-loading />

    <div class="max-w-screen-xl h-full pt-32 mx-auto grid" style="grid-template-rows: 1fr auto">
        @if ($movies->isEmpty())
            <div class="flex justify-center items-center">
                <h5 class="text-xl text-gray-500">No watch list</h5>
            </div>
        @else
            <div class="px-2">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-3 md:gap-5">
                    @foreach ($movies as $movie)
                        <a href="/netflix/movies/movie/{{ $movie['movie_id'] }}" class="swiper-slide h-96">
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
                                        <p>2023</p>
                                        <span>
                                            <form method="POST" action="{{ route('netflix.delete-movie') }}">
                                                @csrf
                                                <input type="hidden" name="movieID" value="{{ $movie['id'] }}" />
                                                <button class="submit">
                                                    <i class="fa-regular fa-trash-can text-red-500"></i>
                                                </button>
                                            </form>
                                        </span>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    <x-footer />
</x-layout>
