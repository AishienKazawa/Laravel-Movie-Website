<x-account.layout>
    <x-loading />
    <div class="w-full grid" style="grid-template-rows: auto 1fr">
        <x-account.navbar />
        <div class="md:h-full flex justify-center items-center py-10 px-10">
            <div class="grid xl:w-9/12">
                <span class="text-xs tracking-widest font-semibold uppercase">Step 2 to 3</span>

                <h1 class="text-3xl md:text-4xl 2xl:text-5xl font-bold my-2">Choose the plan that’s right
                    for you.</h1>
                <p class="flex items-start"><i class="fa-solid fa-check mr-2 mt-[5px] text-green-500"></i>Unlimited movies
                    and TV shows.</p>
                <p class="flex items-start"><i class="fa-solid fa-check mr-2 mt-[5px] text-green-500"></i>Watch all you
                    want
                    ad-free.</p>


                <div class="grid md:grid-cols-3 gap-y-16 md:gap-x-2 lg:gap-x-10 2xl-gap-x-16 mt-10">
                    <div class="grid gap-7 border border-slate-500 p-10 rounded-xl"
                        style="grid-template-rows: 3rem 1fr">
                        <div class="">
                            <span>Basic</span>
                            <h4 class="text-2xl font-bold">Php 100.00</h4>
                        </div>

                        <ul class="text-sm grid gap-2">
                            <li class="flex items-start">
                                <i class="fa-regular fa-circle text-[.6rem] mr-2 mt-[6px]"></i>
                                <p>Stream content in standard definition (480p) quality.</p>
                            </li>
                            <li class="flex items-start">
                                <i class="fa-regular fa-circle text-[.6rem] mr-2 mt-[6px]"></i>
                                <p>Ability to stream on one device at a time.</p>
                            </li>
                            <li class="flex items-start">
                                <i class="fa-regular fa-circle text-[.6rem] mr-2 mt-[6px]"></i>
                                <p>Option to create and manage a watchlist.</p>
                            </li>
                            <li class="flex items-start">
                                <i class="fa-regular fa-circle text-[.6rem] mr-2 mt-[6px]"></i>
                                <p>Monthly newsletter with movie recommendations.</p>
                            </li>
                        </ul>

                        <form method="POST" action="{{ route('membership.select-plan') }}">
                            @csrf
                            <input type="hidden" name="plan" value="Basic">
                            <input type="hidden" name="price" value="100.00">
                            <button type="submit"
                                class="w-full py-2 px-5 rounded-md bg-accent-color hover:bg-accent-color-light">Next</button>
                        </form>
                    </div>

                    <div class="grid gap-7 border border-slate-500 p-10 rounded-xl"
                        style="grid-template-rows: 3rem 1fr">
                        <div class="">
                            <span>Standard</span>
                            <h4 class="text-2xl font-bold">Php 200.00</h4>
                        </div>

                        <ul class="text-sm grid gap-2">
                            <li class="flex items-start">
                                <i class="fa-regular fa-circle text-[.6rem] mr-2 mt-[6px]"></i>
                                <p>Ability to stream on up to three devices simultaneously.</p>
                            </li>
                            <li class="flex items-start">
                                <i class="fa-regular fa-circle text-[.6rem] mr-2 mt-[6px]"></i>
                                <p>High-definition (1080p) streaming quality.</p>
                            </li>
                            <li class="flex items-start">
                                <i class="fa-regular fa-circle text-[.6rem] mr-2 mt-[6px]"></i>
                                <p>Early access to new releases and trailers.</p>
                            </li>
                            <li class="flex items-start">
                                <i class="fa-regular fa-circle text-[.6rem] mr-2 mt-[6px]"></i>
                                <p>Option to download content for offline viewing on mobile devices.</p>
                            </li>
                        </ul>


                        <form method="POST" action="{{ route('membership.select-plan') }}">
                            @csrf
                            <input type="hidden" name="plan" value="Standard">
                            <input type="hidden" name="price" value="200.00">
                            <button type="submit"
                                class="w-full py-2 px-5 rounded-md bg-accent-color hover:bg-accent-color-light">Next</button>
                        </form>
                    </div>

                    <div class="grid gap-7 border border-slate-500 p-10 rounded-xl"
                        style="grid-template-rows: 3rem 1fr">
                        <div class="">
                            <span>Premium</span>
                            <h4 class="text-2xl font-bold">Php 300.00</h4>
                        </div>

                        <ul class="text-sm grid gap-2">
                            <li class="flex items-start">
                                <i class="fa-regular fa-circle text-[.6rem] mr-2 mt-[6px]"></i>
                                <p>All features included in the Premium Plan.</p>
                            </li>
                            <li class="flex items-start">
                                <i class="fa-regular fa-circle text-[.6rem] mr-2 mt-[6px]"></i>
                                <p>Access for up to five family members or friends under the same account.</p>
                            </li>
                            <li class="flex items-start">
                                <i class="fa-regular fa-circle text-[.6rem] mr-2 mt-[6px]"></i>
                                <p>4K+HDR streaming quality.</p>
                            </li>
                            <li class="flex items-start">
                                <i class="fa-regular fa-circle text-[.6rem] mr-2 mt-[6px]"></i>
                                <p>Ability to create and share custom playlists within the family.</p>
                            </li>
                        </ul>

                        <form method="POST" action="{{ route('membership.select-plan') }}">
                            @csrf
                            <input type="hidden" name="plan" value="Premium">
                            <input type="hidden" name="price" value="300.00">
                            <button type="submit"
                                class="w-full py-2 px-5 rounded-md bg-accent-color hover:bg-accent-color-light">Next</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-account.layout>
