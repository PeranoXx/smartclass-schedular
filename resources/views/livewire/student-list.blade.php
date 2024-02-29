<div>
    <div class="flex justify-end">
        <x-button class="mt-1"><a href="{{route('student-management.student')}}"> Create student</a></x-button>
    </div>
    <div class="relative w-1/5">
        <input wire:model.live="search" placeholder="search..."
            class="w-full bg-white focus:outline-none focus:shadow-outline border border-gray-300 py-2 pl-3 pr-10 block appearance-none text-sm leading-normal focus:border-gray-800" />
        <span class="absolute top-2 right-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </span>
    </div>
</div>
