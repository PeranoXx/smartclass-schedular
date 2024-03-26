<div>
    <div class="flex min-h-screen items-center justify-center">
        <div class="relative flex justify-center flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
            <h4
                class="text-4xl font-bold">
                Create New Faculty
            </h4>
            <form wire:submit.prevent="submit" class="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96">
                <div class="mb-4 flex flex-col gap-6">
                    <div>
                        <x-input label="Email" wire:model="email"></x-input>
                        @error('email') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-input label="Password" type="password" wire:model="password"></x-input>
                        @error('password') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
               <x-button type="submit" class="w-full" wire:loading.class="opacity-50 cursor-not-allowed">SIGN IN</x-button>
            </form>
        </div>
    </div>
</div>
