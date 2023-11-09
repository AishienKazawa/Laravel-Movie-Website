<nav class="w-full py-5 px-2 bg-glass z-10">
    <div class="max-w-screen-lg xl:max-w-screen-xl mx-auto flex justify-between items-center">
        <a href="/"><img src="{{ asset('storage/assets/netflix-logo-2.svg') }}" alt="" class="w-24"></a>

        @auth('web')
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="py-2 px-5 rounded-md bg-accent-color hover:bg-accent-color-light">Logout</button>
            </form>
        @else
            <a href="{{ route('signin.index') }}"
                class="btn py-2 px-5 rounded-md bg-accent-color hover:bg-accent-color-light">
                SignIn
            </a>
        @endauth
    </div>
</nav>
