<div class="h-screen bg-gray-200 py-20 px-3 w-full flex justify-center items-center">
    <div class="w-1/3">
        <div class="bg-white py-10 rounded text-center">
            <h1 class="text-2xl font-bold">Email Verification</h1>
            <div class="flex flex-col mt-4">
                <span class="">Enter the OTP you received at</span>
                <span class="font-bold">{{authUser()->email}}</span>
            </div>

            <form id="otp-form" wire:submit.prevent="submit" >
                <div class="flex items-center justify-center gap-3 py-10">
                    <input type="text" wire:model='first'
                        class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        pattern="\d*" maxlength="1" />
                    <input type="text" wire:model='second'
                        class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" />
                    <input type="text" wire:model='third'
                        class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" />
                    <input type="text" wire:model='fourth'
                        class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" />
                    <input type="text" wire:model='fifth'
                        class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" />
                    <input type="text" wire:model='sixth'
                        class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" />
                </div>
                <x-button>SUBMIT</x-button>
            </form>
            <div class="my-3">
                Didn't receive otp ? <span class="cursor-pointer text-rose-500" wire:click='resentOTP'>Resend OTP</span>
            </div>
        </div>
    </div>
</div>