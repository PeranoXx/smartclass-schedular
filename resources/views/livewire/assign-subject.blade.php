<div>
    <div class="bg-white shadow-lg">
        <div class="p-5 text-center">
            <h1 class="text-3xl font-bold">Assign Subject</h1>
            <div class="mt-5 w-1/3 text-center bg-white focus:outline-none focus:shadow-outline border border-gray-300 py-2.5 block appearance-none leading-normal focus:border-gray-800">
                <label class="">Select subject :</label>
                <select wire:model.live="subject_id" class="">
                    <option value="0" disabled selected>Please select subject</option>
                    @foreach ($subject_data as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-5 mx-5 flex justify-start">
                <x-button style="margin:10px"><a href="{{route('class-management.index')}}">Cancle</a></x-button>
                <x-button wire:click="submit" style="margin:10px">Submit</x-button>
                <x-button  wire:click="submit_and_add" style="margin:10px">Add and create more</x-button>
            </div>
        </div>
    </div>
    <div class="mt-5 bg-white shadow-lg">
        <div class="p-5 text-center">
            <div class="py-4">
                <div class="flex-col space-y-4">
                    <x-table>
                        <x-slot name="head">
                            {{-- <x-table.heading wire:click="sortBy('id')" :direction="$sortField == 'id' ? $sortDirection : null"
                                sortable>Id</x-table.heading> --}}
                            <x-table.heading wire:click="sortBy('name')"
                                :direction="$sortField == 'name' ? $sortDirection : null" sortable>Class Room</x-table.heading>
                            <x-table.heading wire:click="sortBy('guard_name')"
                                :direction="$sortField == 'guard_name' ? $sortDirection : null" sortable>Subject
                            </x-table.heading>
                            <x-table.heading wire:click="sortBy('created_at')"
                                :direction="$sortField == 'created_at' ? $sortDirection : null" sortable>Created At
                            </x-table.heading>
                            <x-table.heading>Action</x-table.heading>
                        </x-slot>
        
                        <x-slot name="body">
                            @foreach ($assign_subject_data as $data)
                            <x-table.row>
                                {{-- <x-table.cell>{{ $data->id }}</x-table.cell> --}}
                                <x-table.cell>{{ $data->class_room->name}}</x-table.cell>
                                <x-table.cell>{{ $data->subject->name }}</x-table.cell>
                                <x-table.cell>{{ $data->created_at }}</x-table.cell>
                                <x-table.cell>
                                    <div class="flex gap-x-4">
                                        <button wire:click="delete('{{$data->id}}')"
                                            class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-slot>
                    </x-table>
                    <div>
                        {{-- {{ $role->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
