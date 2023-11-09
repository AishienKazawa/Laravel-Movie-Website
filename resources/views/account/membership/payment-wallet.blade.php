<x-account.layout>
    <x-loading />
    <div class="w-full grid" style="grid-template-rows: auto 1fr">
        <x-account.navbar />
        <div class="w-screen h-full flex justify-center items-center px-10">
            <div class="grid sm:w-9/12 md:w-7/12 lg:w-5/12 2xl:w-5/12">
                <span class="text-xs tracking-widest font-semibold uppercase">Step 3 to 3</span>

                <h1 class="text-3xl md:text-4xl 2xl:text-5xl font-bold my-2">Set up GCash</h1>

                <p>Enter your GCash mobile number.</p>

                <form method="POST" action="{{ route('wallet-validation') }}" class="mt-5 grid gap-5 md:gap-4">
                    @csrf
                    <div>
                        <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}"
                            placeholder="Mobile number" class="w-full p-3 rounded-md text-black" />
                        @error('mobile')
                            <p class="text-xs mt-2 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="p-4 flex justify-between bg-gray-900">
                        <div class="flex gap-4">
                            <span>₱{{ session('selected_price') }} /month</span>
                        </div>
                        <a href="/signup/membership-plan/planform">Change</a>
                    </div>

                    <div>
                        <div class="flex items-start gap-2">
                            <input type="checkbox" name="agree" id="agree" class="mt-[1px]" />
                            <p class="text-xs">
                                By checking the checkbox, you agree to our Terms of Use, Privacy
                                Statement, and that you are over 18. Netflix will automatically
                                continue your membership and charge the membership fee (currently
                                ₱{{ session('selected_price') }}/month) to your payment method until
                                you cancel. You may cancel at any time to avoid future charges.
                            </p>
                        </div>
                        @error('agree')
                            <p class="text-xs mt-2 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="py-4 px-5 rounded-md bg-accent-color hover:bg-accent-color-light">
                        Start Membership <i class="fa-solid fa-arrow-right ml-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-account.layout>
