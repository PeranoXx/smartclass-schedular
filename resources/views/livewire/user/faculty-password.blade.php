<div>
    <div class="">
        <div class="bg-white shadow-lg">
            <div class="p-5 text-center">
                <h1 class="text-3xl font-bold">Change Password</h1>
                <form wire:submit.prevent="changePassword" class="max-w-xl mx-auto my-8">
                    <div class="mb-4 flex flex-col gap-6">
                        <div>
                            <x-input label="Current Password" type="password"  wire:model="current_password" />
                            <div class="flex justify-start">
                                @error('current_password') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div>
                            <x-input label="New Password" type="password" wire:model="new_password"></x-input>
                            <div class="flex justify-start">
                                @error('new_password') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div>
                            <x-input label="Confirm New Password" type="password" wire:model="confirm_new_password"></x-input>
                            <div class="flex justify-start">
                                @error('confirm_new_password') <span class="text-pink-500 text-sm px-3 text-left">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                   <x-button type="submit" class="w-full" >CHANGE PASSWORD</x-button>
                </form>
            </div>
    
        </div>
    </div>
</div>
