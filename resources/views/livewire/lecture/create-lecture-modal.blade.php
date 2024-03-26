<div class="bg-white w-1/3">
    <div class="">
        <div class="border-b p-5 flex justify-between items-center">
            <h1 class="text-2xl font-bold">{{isset($lecture_id) ? 'Update' : 'Assign'}}  Lecture</h1>
            <span class="cursor-pointer" wire:click='close'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
        <div class="p-5">
                <div class="flex flex-col w-full">
                    <div class="mt-5">
                        <x-select wire:model.live="class_room" label="Select Class">
                            <option value="0" disabled selected></option>
                            @foreach ($class_data as $class_room)
                                <option value="{{$class_room->id}}">{{$class_room->name}}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="flex jusrrtify-start">
                        @error('class_room') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <div class="mt-5">
                        <x-select wire:model.live="subject" label="Select Subject" wire:key="{{$class_room}}">
                            <option value="0" disabled selected></option>
                            @foreach ($subjects??[] as $data)
                                <option value="{{$data->subject_id}}">{{$data->subject->name}}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="flex jusrrtify-start">
                        @error('subject') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mt-4 mb-4 flex flex-col gap-6">
                    <div>
                        <x-input label="Number of lecture" wire:model="no_of_lectures" />
                        @error('no_of_lectures') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <input label="lecture id" type="hidden"  name="name" wire:model="lecture_id" />
                </div>
                <div class="flex justify-end">
               <x-button type="submit" wire:click="submit" class="" >{{isset($lecture_id) ? 'UPDATE' : 'SUBMIT'}}</x-button>
            </div>
        </div>
    </div>
</div>
