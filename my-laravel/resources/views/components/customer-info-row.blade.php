{{-- https://chatgpt.com/c/680c761e-b12c-8009-94d1-54a4860cef96 --}}
@props([
'name',
'label',
'value',
'required' => true,
'readonly' => false,
'disabled' => false,
])

@php
$inputAttributes = [
'id' => $name,
'name' => $name,
'type' => 'text',
'value' => old($name, $value),
'autocomplete' => 'first_name',
];

if ($required) {
$inputAttributes['required'] = 'required';
}

if ($readonly) {
$inputAttributes['readonly'] = 'readonly';
}

if ($disabled) {
$inputAttributes['disabled'] = 'disabled';
}
@endphp

<x-input-label for="{{ $name }}" value="{{ $label }}" class="pt-2" />

<div>
    <x-text-input {{ $attributes->merge($inputAttributes) }} />

        @error($name)
        <p class="text-xs text-red-600">{{ $message }}</p>
        @enderror
</div>