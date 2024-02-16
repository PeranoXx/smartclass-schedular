<button {{ $attributes->merge(['class' => 'bg-gray-900 text-gray-100 px-20 py-2 hover:drop-shadow-lg hover:scale-110 transition-all']) }} >
    {{$slot}}
</button>