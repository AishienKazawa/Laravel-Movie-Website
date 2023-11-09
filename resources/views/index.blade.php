<x-account.layout>
    <x-loading />
    <div
        class="bg-[url('https://c4.wallpaperflare.com/wallpaper/862/449/162/jack-reacher-star-wars-interstellar-movie-john-wick-wallpaper-preview.jpg')] h-full">
        <div class="w-screen h-full bg-gradient-to-t from-black via-black/75 to-black text-white grid items-center"
            style="grid-template-rows: auto 1fr">
            <x-account.navbar />
            <div class="w-full px-10">
                <div class="text-center grid md:w-10/12 lg:w-8/12 2xl:w-7/12 mx-auto">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold">
                        Welcome to the Ultimate Cinematic Experience!
                    </h1>
                    <h5 class="text-md md:text-xl font-semibold xl:px-32 mt-1 mb-2">
                        Join Our Movie Universe Today and Embark on a Cinematic Journey Like
                        Never Before!
                    </h5>

                    <p class="text-sm xl:px-10">
                        Ready to dive into the world of heroes and villains? Become a member
                        now and unlock a realm of endless entertainment! Embrace the thrill,
                        the drama, and the magic of movies, exclusively with us.
                    </p>
                    <div class="xl:px-32">
                        <form method="POST" action="{{ route('signup.verify-email') }}"
                            class="mt-5 flex gap-4 md:gap-2 justify-center flex-col md:flex-row ">
                            @csrf
                            <div class="w-full">
                                <input type="text" name="email" id="email" value="{{ old('email') }}"
                                    placeholder="Email address" class="w-full p-4 rounded-md" />
                                @error('email')
                                    <p class="text-xs mt-2 text-red-500 text-left">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="md:w-64 h-fit py-4 px-5 rounded-md bg-accent-color">
                                Get Started <i class="fa-solid fa-arrow-right ml-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-account.layout>
