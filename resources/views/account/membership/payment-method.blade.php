<x-account.layout>
    <x-loading />
    <div class="w-full grid" style="grid-template-rows: auto 1fr">
        <x-account.navbar />
        <div class="w-screen h-full flex justify-center items-center px-2 sm:px-10">
            <div class="w-full grid md:w-11/12 lg:w-8/12 xl:w-1/2">
                <span class="text-xs tracking-widest font-semibold uppercase">Step 3 to 3</span>

                <h1 class="text-3xl md:text-4xl 2xl:text-5xl font-bold my-2">Choose how to pay</h1>

                <p>Your payment is encrypted and you can change how you pay anytime.</p>

                <div class="grid sm:grid-cols-2 gap-3 my-8">
                    <button class="border border-slate py-5 rounded-lg"
                        onclick="window.location.href = '{{ route('payment-method.credit-option') }}';">
                        <i class="fa-regular fa-credit-card mr-2"></i>
                        Credit or Debit Card
                    </button>
                    <button class="border border-slate py-5 rounded-lg"
                        onclick="window.location.href = '{{ route('payment-method.wallet-option') }}';">
                        <i class="fa-regular fa-credit-card mr-2"></i>
                        Payment Center / E-Wallet
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-account.layout>
