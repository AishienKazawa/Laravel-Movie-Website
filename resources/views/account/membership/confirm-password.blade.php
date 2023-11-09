<x-account.layout>
    <x-loading />
    <div class="w-full grid" style="grid-template-rows: auto 1fr">
        <x-account.navbar />
        <div class="w-screen h-full flex justify-center items-center py-10 px-10 xl:px-36">
            <div class="grid sm:w-9/12 md:w-9/12 lg:w-6/12 2xl:w-5/12">
                <span class="text-xs tracking-widest font-semibold uppercase">Step 1 to 3</span>

                <h1 class="text-3xl md:text-4xl 2xl:text-5xl font-bold my-2">
                    Welcome back! Joining Netflix is easy.
                </h1>

                <p>Continue your unlimited movies and exclusive content by joining now!</p>

                <form method="POST" action="{{ route('signup.pending-account') }}" class="mt-5 grid gap-5 md:gap-4">
                    @csrf
                    <div>
                        <div>Email: <span class="font-semibold">{{ session('email') }}</span></div>
                        @if (session('error'))
                            <p class="text-left text-xs mt-2 text-red-500">{{ session('error') }}</p>
                        @endif
                    </div>
                    <div>
                        <input type="password" name="password" id="password" placeholder="Enter your password"
                            class="w-full p-4 rounded-md" />
                        @error('password')
                            <p class="text-xs mt-2 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="py-4 px-5 rounded-md bg-accent-color hover:bg-accent-color-light">
                        Next
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-account.layout>
