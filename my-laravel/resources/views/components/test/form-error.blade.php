@props(['name'])

@error($name)
    <p class="text-xs text-red-600">{{ $message }}</p>
@enderror