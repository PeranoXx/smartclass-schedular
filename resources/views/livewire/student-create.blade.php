<div class="bg-white shadow-lg ">   
    <div class="p-5 text-center">
        <h4
            class="text-3xl mb-8 font-bold">
            {{isset($id) ? 'Update' : 'Create New'}} Student
        </h4>
        <form wire:submit.prevent="submit" class="max-w-4xl mx-auto my-8">
            <div class="grid grid-cols-2 gap-5">
                {{-- <div class="flex w-40"> --}}
                    <div class="">
                        <x-input class="" label="First name"  wire:model="first_name" />
                        <div class="flex justify-start">
                            @error('first_name') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <x-input class="" label="Last name" wire:model="last_name"></x-input>
                        <div class="flex justify-start">
                            @error('last_name') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                {{-- </div> --}}
                <div>
                    <x-input class="" label="Username" wire:model="username"></x-input>
                    <div class="flex justify-start">
                        @error('username') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <x-input label="Email"  wire:model="email"></x-input>
                    <div class="flex justify-start">
                        @error('email') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <x-input class="" label="Father name" wire:model="father_name"></x-input>
                    <div class="flex justify-start">
                        @error('father_name') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <x-input class="" label="Father contact number" wire:model="father_contact_number"></x-input>
                    <div class="flex justify-start">
                        @error('father_contact_number') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <x-input class="" label="Mother name" wire:model="mother_name"></x-input>
                    <div class="flex justify-start">
                        @error('mother_name') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <x-input class="" label="Mother contact number" wire:model="mother_contact_number"></x-input>
                    <div class="flex justify-start">
                        @error('mother_contect_number') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
                @if (!isset($id))
                    <div>
                        <x-input class="" label="Password" type="password"  wire:model="password"></x-input>
                        <div class="flex justify-strat">
                            @error('password') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                @endif
                <div class="">
                    <x-input class="" label="Contact number" wire:model="contact_number"></x-input>
                    <div class="flex justify-strat">
                        @error('contact_number') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <div class="main flex overflow-hidden border border-gray-300 select-none">
                        <div class="title py-3 my-auto px-5 bg-gray-900 text-white text-sm font-semibold mr-3">Gender</div>
                            <label class="flex radio p-2 cursor-pointer">
                                <input class="my-auto transform scale-125" type="radio" value="male" wire:model="gender" />
                                <div class="title px-2">Male</div>
                            </label>
                        
                            <label class="flex radio p-2 cursor-pointer">
                                <input class="my-auto transform scale-125" type="radio" value="female" wire:model="gender" />
                                <div class="title px-2">Female</div>
                            </label>
                        
                            <label class="flex radio p-2 cursor-pointer">
                                <input class="my-auto transform scale-125" type="radio" value="others" wire:model="gender" />
                                <div class="title px-2">Others</div>
                            </label>
                        </div>
                        <div class="flex justify-strat">
                            @error('gender') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                <div>
                    <x-input class="" label="Birth date" type="date" wire:model="birth_date"></x-input>
                    <div class="flex justify-start">
                        @error('birth_date') <span class="text-pink-500 text-sm px-3">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="border border-gray-400">
                    <label>select class :</label>
                    <select wire:model.live="class_room">
                        <option value="0" disabled selected>Please select class</option>
                        @foreach ($class_data as $class_room)
                            <option value="{{$class_room->id}}">{{$class_room->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="border border-gray-400">
                    <label>select class :</label>
                    <select wire:model.live="batch_id" wire:key="{{$class_room}}">
                        <option value="0" disabled selected>Please select batch</option>
                        @foreach ($batch as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="bg-white col-span-2 w-full mb-5">
                    <div
                        class="w-full relative grid grid-cols-1 md:grid-cols-3 border border-gray-300 bg-gray-100 rounded-lg">
                        <div
                            class="rounded-l-lg p-4 bg-gray-200 flex flex-col justify-center items-center border-0 border-r border-gray-300 ">
                            <label
                                class="cursor-pointer hover:opacity-80 inline-flex items-center shadow-md my-2 px-2 py-2 bg-gray-900 text-gray-50 border border-transparent
                            rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none 
                           focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                for="restaurantImage">

                                Select image
                                <input id="restaurantImage" class="text-sm cursor-pointer w-36 hidden"
                                    wire:model="photo" type="file">
                            </label>
                            <span wire:click='removeImage()'
                                class='inline-flex items-center shadow-md my-2 px-2 py-2 bg-gray-900 text-gray-50 border border-transparent
                            rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none 
                           focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer'>
                                remove image
                        </span>
                        </div>
                        @if ($photo)
                        <div class="col-span-2">
                            <img class="w-full h-64 object-contain" src="{{ $photo->temporaryUrl() }}">
                        </div>
                        @elseif($imagePreview)
                        <div class="col-span-2">
                            <img class="w-full h-64 object-contain" src="{{ $imagePreview }}">
                        </div>
                        @else
                        <div
                            class="relative order-first md:order-last h-28 md:h-auto flex justify-center items-center border border-dashed border-gray-400 col-span-2 m-2 rounded-lg bg-no-repeat bg-center bg-origin-padding bg-cover">
                            <span class="text-gray-400 opacity-75">
                                <svg class="w-14 h-14" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="0.7" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="flex justify-start">
                        @error('image') <span class="text-pink-500 text-sm px-3">{{ $message }}</span>@enderror
                    </div>
                </div>
                <input label="user id" value="" type="hidden"  name="name" wire:model="id" />
                <input label="Class id" type="hidden"  name="name" wire:model="class_id" />
            </div>
           <x-button type="submit" class="w-full mt-5" >{{isset($id) ? 'UPDATE' : 'SUBMIT'}}</x-button>
        </form>
    </div>
</div>

