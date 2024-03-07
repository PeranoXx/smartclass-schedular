

<style>
    /* .float-label-input {
    margin: 32px 0;     
 } */

.float-label-input:focus-within label {
    transform: translateY(-20px);
    font-size: 12px;
    transition: 0.2s;
    /* transform: translateY(-1.5rem) scale(0.75); */
    background-color: white;
}

.selected{
    transform: translateY(-20px);
    font-size: 12px;
    transition: 0.2s;
    /* transform: translateY(-1.5rem) scale(0.75); */
    background-color: white;
}

</style>
<div class="relative float-label-input">
    <select placeholder=" " id="selectBox" {{ $attributes->merge(['class' => 'w-full bg-white focus:outline-none focus:shadow-outline border border-gray-300 py-2.5 px-3 block appearance-none leading-normal focus:border-gray-800']) }} >
        {{$slot}}
    </select>
    <label for="selectBox" id="label" class="absolute top-3 left-2 text-gray-400 pointer-events-none transition-all duration-200 ease-in-outbg-white px-1 text-grey-darker">{{$label}}</label>
</div>

<script>
    document.getElementById('selectBox').addEventListener('change', function() {
    var label = document.getElementById('label');
    if (this.value !== '') {
        label.classList.add('selected');
    } else {
        label.classList.remove('selected');
    }
});
</script>