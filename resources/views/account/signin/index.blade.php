<x-account.layout>
    <div class="w-screen h-full flex justify-center items-center py-10 px-10 xl:px-36">
        <div class="w-full sm:w-9/12 md:w-9/12 lg:w-6/12 2xl:w-5/12">
            <h1 class="text-3xl md:text-4xl 2xl:text-5xl font-bold my-2">
                Welcome to Netflix
            </h1>

            <p>Sign In to Your Account!</p>

            <form method="POST" action="{{ route('signin.account-validation') }}" class="mt-5 grid gap-5 md:gap-4">
                @csrf
                <div>
                    <input type="text" name="email" id="email" value="{{ old('email') }}"
                        placeholder="Email address" class="w-full p-4 rounded-md" />
                    @error('email')
                        <p class="text-xs mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="password" name="password" id="password" placeholder="Enter your password"
                        class="w-full p-4 rounded-md" />
                    @error('password')
                        <p class="text-xs mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <span class="text-center text-sm px-2">Did you forgot your password?
                    <a href="#" class="underline">Click here</a></span>

                <button type="submit" class="py-4 px-5 rounded-md bg-accent-color hover:bg-accent-color-light">
                    SignIn
                </button>

                <span class="text-center text-sm px-2">Not yet a member?
                    <a href="/" class="underline">Click here</a></span>
            </form>
        </div>
    </div>
</x-account.layout>
