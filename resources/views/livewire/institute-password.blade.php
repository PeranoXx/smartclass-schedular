<div>
    <div class="">
        <div class="flex min-h-screen items-center justify-center">
            <div class="relative flex justify-center flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
                <h4
                    class="text-4xl font-bold">
                    Change Password
                </h4>
                <form wire:submit.prevent="changePassword" class="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96">
                    <div class="mb-4 flex flex-col gap-6">
                        <div>
                            <x-input label="Current Password" type="password"  wire:model="current_password" />
                            @error('current_password') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <x-input label="New Password" type="password" wire:model="new_password"></x-input>
                            @error('new_password') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <x-input label="Confirm New Password" type="password" wire:model="confirm_new_password"></x-input>
                            @error('confirm_new_password') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                   <x-button type="submit" class="w-full" >CHANGE PASSWORD</x-button>
                </form>
            </div>
    
        </div>
    </div>
</div>
