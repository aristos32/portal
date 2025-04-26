{{-- which attributes should be considered data variables --}}
@props(['name', 'label', 'value'])

<x-input-label for="{{$name}}" value="{{$label}}" class="pt-2" />
<div>
    <x-text-input id="{{$name}}" name="{{$name}}" type="text" :value="old('last_name', $value)" required
        autocomplete="first_name" />
    @error('{{$name}}')
    <p class="text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>