@props(['display' => ''])

<x-nav-link href="/" :active="request()->is('/')" display={{$display}}>Home</x-nav-link>
<x-nav-link href="{{route('profile.edit')}}" :active="request()->is('profile')" display={{$display}}>Profile
</x-nav-link>