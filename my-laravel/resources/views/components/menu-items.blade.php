@props(['display' => ''])

<x-nav-link href="/" :active="request()->is('/')" display={{$display}}>Home</x-nav-link>
<x-nav-link href="/users" :active="request()->is('users')" display={{$display}}>Users</x-nav-link>
<x-nav-link href="/accounts" :active="request()->is('accounts')" display={{$display}}>Accounts</x-nav-link>
<x-nav-link href="/profile" :active="request()->is('profile')" display={{$display}}>Profile</x-nav-link>
<x-nav-link href="/contact" :active="request()->is('contact')" display={{$display}} type="anchor">Contact
</x-nav-link>