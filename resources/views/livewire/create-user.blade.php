<div>
    <div class="flex min-h-screen items-center justify-center">
        <div class="relative flex justify-center flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
            <h4
                class="text-4xl font-bold">
                Create New User
            </h4>
            <form wire:submit.prevent="submit" class="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96">
                <div class="mb-4 flex flex-col gap-6">
                    <div>
                        <x-input label="First name"  wire:model="first_name" />
                        @error('first_name') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-input label="Last name" wire:model="last_name"></x-input>
                        @error('last_name') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-input label="Contact number" wire:model="contact_number"></x-input>
                        @error('contact_number') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-input label="Email"  wire:model="email"></x-input>
                        @error('email') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-input label="Password" type="password"  wire:model="password"></x-input>
                        @error('password') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <div class="main flex border rounded-full overflow-hidden m-4 select-none">
                      <div class="title py-3 my-auto px-5 bg-blue-500 text-white text-sm font-semibold mr-3">Gender</div>
                      <label class="flex radio p-2 cursor-pointer">
                        <input class="my-auto transform scale-125" type="radio" value="male" wire:model="gender" />
                        <div class="title px-2">Male</div>
                      </label>
                  
                      <label class="flex radio p-2 cursor-pointer">
                        <input class="my-auto transform scale-125" type="radio" value="female" wire:model="gender" />
                        <div class="title px-2">Female</div>
                      </label>
                  
                      <label class="flex radio p-2 cursor-pointer">
                        <input class="my-auto transform scale-125" type="radio" value="others" wire:model="gender" />
                        <div class="title px-2">Others</div>
                      </label>
                    </div>
                    @error('gender') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    <div>
                        <x-input label="Birth date" type="date" wire:model="birth_date"></x-input>
                        @error('birth_date') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-input label="image" type="file" wire:model="photo"></x-input>
                        @error('photo') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
               <x-button type="submit" class="w-full" >SUBMIT</x-button>
            </form>
        </div>

    </div>
</div>
''