<div>
    <x-button class="mt-1"><a href="{{route('user-management.user')}}"> Create user</a></x-button>
    <table class="mt-10 min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Id</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">First name</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">last name</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Contact number</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Email</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Gender</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Birth date</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Image</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach ($users as $data)
            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$data->id}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$data->first_name}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$data->last_name}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$data->contact_number}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$data->email}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$data->gender}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$data->birth_date}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><img height="100px" width="150px" src="{{asset('storage/user_image/' . $data->image)}}" alt=""></td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"> 
                        <a href="{{route('user-management.user',['id' =>  $data->id])}}"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Edit</a>
                        <button wire:click="delete('{{$data->id}}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                </td>
            </tr>
            @endforeach
                        
        </tbody>
    </table>
</div>
