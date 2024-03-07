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
                    <input type="checkbox" wire:model="is_break" {{ isset($lactures->is_break) == '1' ? 'checked' : '' }} class="appearance-none w-9 focus:outline-none checked:bg-blue-300 h-5 bg-gray-300 rounded-full before:inline-block before:rounded-full before:bg-blue-500 before:h-4 before:w-4 checked:before:translate-x-full shadow-inner transition-all duration-300 before:ml-0.5"/>
                </div>
                <div class="">
                    <div>
                        <label for="">Weeks</label>
                    </div>
                    @foreach ($weeks as $index => $day)
                        <input id="{{ $day['day'] }}" type="checkbox" wire:model="weeks.{{ $index }}.status" {{ $day['status'] == 'true' ? 'checked' : '' }}>
                        <label for="{{ $day['day'] }}">{{ $day['day'] }}</label>
                    @endforeach
                    
                </div>
            </div>  
            <x-button>{{isset($id) ? 'UPDATE' : 'SUBMIT'}}</x-button>
        </form>
    </div>
</div>

