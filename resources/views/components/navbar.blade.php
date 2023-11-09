<nav class="w-full fixed top-0 py-4 px-2 bg-glass z-10">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center">
        <a href="/netflix/homepage"><img src="{{ asset('storage/assets/netflix-logo-2.svg') }}" alt=""
                class="w-24" /></a>

        <ul class="flex items-center justify-between gap-x-10 md:gap-x-16">
            <li class="hidden md:block"><a href="/netflix/homepage">Home</a></li>
            <li class="hidden md:block"><a href="/netflix/movies">Movies</a></li>
            <li class="hidden md:block">
                <a href="/netflix/user/watch-list">My List</a>
            </li>
            <li id="button-search-form">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </li>
            <li class="hidden md:block">
                <a href="#"> <i class="fa-regular fa-bell"></i></a>
            </li>
            <li id="profile-btn" class="relative">
                <button class="">
                    <div class="w-10 h-10 rounded-full overflow-hidden bg-slate-500">
                        <img src="{{ $userAuth->image ? asset('storage/' . $userAuth->image) : asset('storage/assets/user-has-no-image.jpg') }}"
                            alt="" />
                    </div>
                </button>

                <div id="profile-pop" class="hidden gap-4 w-36 p-3 absolute bottom-[-6 rem] right-0 bg-slate-950">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="w-full h-full text-left p-2">
                            Logout
                        </button>
                    </form>

                    <a href="/netflix/user/profile" class="w-full h-full text-left font-bold p-2">Profile</a>
                    <a href="/netflix/homepage" class="w-full h-full text-left font-bold p-2 md:hidden">Home</a>
                    <a href="/netflix/movies" class="w-full h-full text-left font-bold p-2 md:hidden">Movie</a>
                    <a href="/netflix/user/watch-list" class="w-full h-full text-left font-bold p-2 md:hidden">My
                        List</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
