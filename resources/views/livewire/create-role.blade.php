<div>
    <x-button onclick="Livewire.dispatch('openModal', { component: 'role-management-modal' })" class="mt-1"> Create Role</x-button>
    {{-- <form wire:submit.prevent="search"> --}}
        <div>
            <input wire:model.live="searchName" placeholder="search name" />
            <input wire:model.live="searchGname" placeholder="search guard name" />

            {{-- <button type="submit">search</button> --}}
        </div>
    {{-- </form> --}}
    <div class="py-4">
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading wire:click="sortBy('Id')" sortable >Id</x-table.heading>
                    <x-table.heading wire:click="sortBy('Name')" sortable>Name</x-table.heading>
                    <x-table.heading wire:click="sortBy('Guard name')" sortable>Guard name</x-table.heading>
                    <x-table.heading wire:click="sortBy('Created At')" sortable>Created At</x-table.heading>
                    <x-table.heading wire:click="sortBy('Action')" sortable>Action</x-table.heading>
                </x-slot>

                <x-slot name="body">
                    @foreach ($role as $data)
                        <x-table.row>
                            <x-table.cell>{{ $data->id }}</x-table.cell>
                            <x-table.cell>{{ $data->name }}</x-table.cell>
                            <x-table.cell>{{ $data->guard_name }}</x-table.cell>
                            <x-table.cell>{{ $data->created_at }}</x-table.cell>
                            <x-table.cell>
                                <div>
                                    <button onclick="Livewire.dispatch('openModal', { component: 'role-management-modal', arguments: { role_id: {{ $data->id }} , name: '{{$data->name}}' }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Edit</button>
                                <button wire:click="delete('{{$data->id}}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                        @endforeach
                </x-slot>
            </x-table>
            <div>
                {{ $role->links() }}
            </div>
        </div>
    </div>
</div>
