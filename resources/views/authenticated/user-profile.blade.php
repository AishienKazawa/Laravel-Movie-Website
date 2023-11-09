<x-layout>
    <x-loading />

    <div class="h-full flex justify-center items-center flex-col">
        <div class="grid gap-5 w-1/4">
            <form method="POST" action="{{ route('admin.update-profile') }}" class="mt-5 grid gap-5 w-full"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="w-28 h-28 rounded-full overflow-hidden block mx-auto">

                    <label for="image">
                        <img id="profile-image-preview"
                            src="{{ $user->image ? asset('storage/' . $user->image) : asset('storage/assets/user-has-no-image.jpg') }}"
                            alt="" />
                    </label>
                    <input type="file" name="image" id="image" class="hidden">
                </div>

                <div>
                    <input type="text" name="email" id="email" placeholder="Email address"
                        value="{{ $user->email }}" class="w-full p-4 rounded-md" />
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

                <button type="submit" class="py-4 px-5 rounded-md bg-accent-color hover:bg-accent-color-light">
                    Save
                </button>
            </form>

            <form method="POST" action="{{ route('admin.delete-profile') }}">
                @csrf
                <input type="hidden" name="userId" value="{{ $user->id }}" />
                <button type="submit" class="w-full bg-gray-500 py-4 px-5 rounded-md">
                    Delete Account
                </button>
            </form>
        </div>
    </div>

    <x-footer />
</x-layout>
