<div class="bg-white w-1/3">
    <div class="">
        <div class="border-b p-5 flex justify-between items-center">
            <h1 class="text-2xl font-bold">{{isset($subject_id) ? 'Update' : 'Create New'}} subject</h1>
            <span class="cursor-pointer" wire:click='close'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
        <div class="p-5">
            <form wire:submit.prevent="submit" class="">
                <div class="mb-4 flex flex-col gap-6">
                    <div>
                        <x-input label="Class name"  name="name" wire:model="name" />
                        @error('name') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <input label="Claas name" type="hidden"  name="name" wire:model="action" />
                    <input label="Class name" type="hidden"  name="name" wire:model="clas_id" />
                </div>
                <div class="flex justify-end">
               <x-button type="submit" class="" >{{isset($subject_id) ? 'UPDATE' : 'SUBMIT'}}</x-button>
            </div>
            </form>
        </div>
    </div>
</div>