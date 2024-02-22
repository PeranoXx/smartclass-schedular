@props([
    'sortable' => null,
    'direction' => null,
])

<th {{ $attributes->merge(['class' => 'px-6 py-3 bg-gray-50'])}}>
    @unless ($sortable)
        <span class=" text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{$slot}}</span>
        @else
        <button {{$attributes->except('class')}} class="flex item-center space-x-1 text-left text-xs leading-4 font-medium items-center">
            <span>{{$slot}}</span>

            <span>
                @if ($direction == 'asc')
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                          </svg>
                          
                    </p>
                @elseif ($direction == 'desc')
                    <p><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                      </svg>
                      </p>
                @else
                    
                @endif
            </span>
        </button>
    @endif
</th>