@props(['display' => ''])

@php
$locale = app()->getLocale();
@endphp

<x-nav-link href="/{{ $locale }}/home" :active="request()->is($locale.'/home')" display="{{ $display }}">Home</x-nav-link>
<x-nav-link href="/{{ $locale }}/users" :active="request()->is($locale.'/users')" display="{{ $display }}">Users</x-nav-link>
<x-nav-link href="/{{ $locale }}/accounts" :active="request()->is($locale.'/accounts')" display="{{ $display }}">Accounts</x-nav-link>
<x-nav-link href="/{{ $locale }}/profile" :active="request()->is($locale.'/profile')" display="{{ $display }}">Profile</x-nav-link>
<x-nav-link href="/{{ $locale }}/contact" :active="request()->is($locale.'/contact')" display="{{ $display }}" type="anchor">Contact</x-nav-link>