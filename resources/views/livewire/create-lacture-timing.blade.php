<div class="bg-white shadow-lg ">   
    <div class="p-5 text-center">
        <h4
            class="text-3xl mb-8 font-bold">
            {{isset($id) ? 'Update' : 'Create '}} Lacture Timing
        </h4>
        <form wire:submit.prevent="submit" class="max-w-4xl mx-auto my-8">
            <div class="grid grid-cols-2 gap-5">
                <div class="">
                    <x-input class="" label="Lacture name"  wire:model="lacture_name" />
                    <div class="flex justify-start">
                        @error('lacture_name') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="">
                    <x-input class="" type="time" label="Start Time"  wire:model="start_time" />
                    <div class="flex justify-start">
                        @error('start_time') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="">
                    <x-input class="" type="time" label="End Time"  wire:model="end_time" />
                    <div class="flex justify-start">
                        @error('end_time') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <label for="">Is Break</label>
                    <input type="checkbox" wire:model="is_break" {{$lactures->is_break == 1 ? 'checked' : ''}} class="appearance-none w-9 focus:outline-none checked:bg-blue-300 h-5 bg-gray-300 rounded-full before:inline-block before:rounded-full before:bg-blue-500 before:h-4 before:w-4 checked:before:translate-x-full shadow-inner transition-all duration-300 before:ml-0.5"/>
                </div>
                {{dd($lactures->weeks)}}
                <div class="">
                    <div>
                        <label for="">Weeks</label>
                    </div>
                    <label for="checkbox1">Monday</label>
                    <input id="checkbox1" type="checkbox" value="monday" wire:model="weeks"/>
                    <label for="checkbox2">Tuesday</label>
                    <input id="checkbox2" type="checkbox" value="tuesday" wire:model="weeks"/>
                    <label for="checkbox3">Wednesday</label>
                    <input id="checkbox3" type="checkbox" value="wednesday" wire:model="weeks"/>
                    <label for="checkbox4">Thursday</label>
                    <input id="checkbox4" type="checkbox" value="thursday" wire:model="weeks"/>
                    <label for="checkbox5">Friday</label>
                    <input id="checkbox5" type="checkbox" value="friday" wire:model="weeks"/>
                    <label for="checkbox6">Saturday</label>
                    <input id="checkbox6" type="checkbox" value="saturday" wire:model="weeks"/>
                    <label for="checkbox7">sunday</label>
                    <input id="checkbox7" type="checkbox" value="sunday" wire:model="weeks"/>
                </div>
            </div>  
            <x-button>{{isset($id) ? 'UPDATE' : 'SUBMIT'}}</x-button>
        </form>
    </div>
</div>

