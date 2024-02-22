@props([
    'sortable' => null,
    'direction' => null,
])

<th {{ $attributes->merge(['class' => 'px-6 py-3 bg-gray-50 cursor-pointer'])}}>
    @unless ($sortable)
        <span class="flex item-center space-x-1 text-left text-xs uppercase leading-4 font-medium tracking-wider items-center">{{$slot}}</span>
        @else
        <button class="flex item-center space-x-1 text-left text-xs uppercase leading-4 font-medium tracking-wider items-center">
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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 hidden ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                  </svg>
                @endif
            </span>
        </button>
    @endif
</th>