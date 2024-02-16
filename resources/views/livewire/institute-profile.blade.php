<div>
    {{-- {{dd(authUser()->id)}} --}}
    <form wire:submit.prevent="update" class="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96">
        <div class="mb-4 flex flex-col gap-6">
            <div>
                <x-input label="Institute name" value="{{authUser()->name}}" name="name"  wire:model="name" />
                @error('name') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-input label="Address" wire:model="address"></x-input>
                @error('address') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-input label="Contact number" value="{{authUser()->contact_number}}" wire:model="contact_number"></x-input>
                @error('contact_number') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-input label="Image" type="file" wire:model="image"></x-input>
                @error('image') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
            </div>
        </div>
       <x-button type="submit" class="w-full" >UPDATE</x-button>
    </form>
</div>
