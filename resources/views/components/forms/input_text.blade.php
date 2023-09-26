@props(['name'])
<div class="mx-4 my-2">
    <label class="font-bold text-xs" for="{{ $name }}">{{ $slot }}</label><br>
    <input class="w-full border-2 rounded bg-blue-50 p-2" id="{{ $name }}" name="{{ $name }}">
</div>