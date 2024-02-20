<div>
    <x-button wire:click="showModal" class="mt-1"> Create Role</x-button>
    <div class="relative flex h-[calc(100vh-120px)]">
        <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex justify-center flex-col bg-transparent bg-clip-border text-gray-700 shadow-lg bg-white px-10 py-5 transition-all {{$show == true ? 'scale-100' : 'scale-0'}}">
            <h4
                class="text-4xl font-bold">
                Create New Role
            </h4>
            <span class="cursor-pointer" wire:click="hideModal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute right-2 top-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>     
            </span>             
            <form wire:submit.prevent="submit" class="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96">
                <div class="mb-4 flex flex-col gap-6">
                    <div>
                        <x-input label="Role name"  name="name" wire:model="name" />
                        @error('name') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                    <input label="Role name" type="hidden"  name="name" wire:model="action" />
                    <input label="Role name" type=""  name="name" wire:model="role_id" />
                </div>
               <x-button type="submit" class="w-full" >SUBMIT</x-button>
            </form>
        </div><!-- component -->
        <table class="mt-10 min-w-full border-collapse block md:table">
            <thead class="block md:table-header-group">
                <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Id</th>
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Name</th>
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Guard name</th>
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
                </tr>
            </thead>
            <tbody class="block md:table-row-group">
                @foreach ($role as $data)
                <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$data->id}}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$data->name}}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$data->guard_name}}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <button wire:click="showModal('{{$data->name}}', '{{$data->id}}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Edit</button>
                            <button wire:click="delete('{{$data->id}}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                    </td>
                </tr>
                @endforeach
                			
            </tbody>
        </table>
    </div>
    
</div>
