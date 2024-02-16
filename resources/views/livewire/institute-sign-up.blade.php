<div class="">
    <div class="flex min-h-screen items-center justify-center">
        <div class="relative flex justify-center flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
            <h4
                class="text-4xl font-bold">
                Create New Institute
            </h4>
            <form wire:submit.prevent="submit" class="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96">
                <div class="mb-4 flex flex-col gap-6">
                    <div>
                        <x-input label="Institute name"  wire:model="name" />
                        @error('name') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-input label="Email" wire:model="email"></x-input>
                        @error('email') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-input label="Contact number" wire:model="contact_number"></x-input>
                        @error('contact_number') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-input label="Password" type="password" wire:model="password"></x-input>
                        @error('password') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-input label="Confirm password" type="password" wire:model="confirm_password"></x-input>
                        @error('confirm_password') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>

                </div>
               <x-button type="submit" class="w-full" >SIGN UP</x-button>
            </form>
        </div>

    </div>
</div>