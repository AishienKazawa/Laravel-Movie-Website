<x-account.layout>
    <x-loading />
    <div class="w-full grid" style="grid-template-rows: auto 1fr">
        <x-account.navbar />
        <div class="w-screen h-full flex justify-center items-center px-10 py-10 2xl:px-48">
            <div class="grid sm:w-9/12 md:w-9/12 lg:w-6/12 2xl:w-5/12">
                <span class="text-xs tracking-widest font-semibold uppercase">Step 2 to 3</span>

                <h1 class="text-3xl md:text-4xl 2xl:text-5xl font-bold my-2">
                    Choose Your Membership Level.
                </h1>

                <p>Find the plan that suits your movie watching style.</p>

                <ul class="grid gap-3 my-8">
                    <li class="flex">
                        <i class="fa-solid fa-check mr-2 mt-1 text-green-500"></i> Enjoy the
                        flexibility of our no-commitment plan; cancel anytime without hassle.
                    </li>
                    <li class="flex">
                        <i class="fa-solid fa-check mr-2 mt-1 text-green-500"></i> Get unlimited
                        access to our entire movie library at an unbeatable price.
                    </li>
                    <li class="flex">
                        <i class="fa-solid fa-check mr-2 mt-1 text-green-500"></i> Immerse yourself
                        in uninterrupted cinematic bliss; no ads and no hidden fees, ever.
                    </li>
                </ul>

                <button class="py-4 px-5 mt-5 rounded-md bg-accent-color hover:bg-accent-color-light"
                    onclick="window.location.href = '{{ route('membership.planform') }}';">Next</button>
            </div>
        </div>
    </div>
</x-account.layout>
