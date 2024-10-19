<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    @php
                        $isActive = true;
                        $hasError = false;
                    @endphp

                    @if ($isActive)
                        <p>Active</p>
                    @else
                        <p>Inactive</p>
                    @endif

                    @auth
                        <p>Hello d, {{ Auth::user()->name }}!</p>
                        <p>Your email: {{ Auth::user()->email }}</p>
                    @else
                        <p>You are not logged in dh.</p>
                    @endauth

                    @guest
                        <p>Welcome, guest! Please <a href="{{ route('login') }}">log in</a>.</p>
                    @endguest

                    <x-alert type="new type" message="There was an error." />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>