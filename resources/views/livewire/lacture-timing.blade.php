<div>
    <div class="flex justify-end">
        <x-button class="mt-1"><a href="{{route('lacture-management.create')}}"> Create Lacture Timing</a></x-button>
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
    <div class="py-4">
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    {{-- <x-table.heading wire:click="sortBy('id')" :direction="$sortField == 'id' ? $sortDirection : null"
                        sortable>Id</x-table.heading> --}}
                    <x-table.heading wire:click="sortBy('lacture_name')"
                        :direction="$sortField == 'first_name' ? $sortDirection : null" sortable>Lacture Name
                    </x-table.heading>
                    <x-table.heading wire:click="sortBy('start_time')"
                        :direction="$sortField == 'first_name' ? $sortDirection : null" sortable>Start Time
                    </x-table.heading>
                    <x-table.heading wire:click="sortBy('end_time')"
                        :direction="$sortField == 'email' ? $sortDirection : null" sortable>End Time</x-table.heading>
                    <x-table.heading wire:click="sortBy('gender')"
                        :direction="$sortField == 'gender' ? $sortDirection : null" sortable>Is Break</x-table.heading>
                    <x-table.heading wire:click="sortBy('role')"
                        :direction="$sortField == 'gender' ? $sortDirection : null" sortable>Weeks</x-table.heading>
                </x-slot>

                <x-slot name="body">
                    @foreach ($lacture_data as $data)
                    <x-table.row>
                        <x-table.cell>{{ $data->lacture_name }}</x-table.cell> 
                        <x-table.cell>{{ $data->start_time }}</x-tablecell> 
                        <x-table.cell>{{ $data->end_time }}</x-table.cell> 
                        <x-table.cell>{{ $data->is_break }}</x-table.cell> 
                        <x-table.cell>
                            <div class="flex gap-x-4 items-center">
                                    <a href="{{route('lacture-management.create', ['id' => $data->id])}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                        </svg>
                                    </a>
                                <button class="flex" wire:click="delete('{{--{{$data->id}}--}}')" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>

                                </button>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>
            <div>
                {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>
</div>
