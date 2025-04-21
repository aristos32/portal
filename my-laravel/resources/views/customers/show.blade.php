<x-layout>
    <x-slot:heading>
        {{ __('general.Find Customers') }}
    </x-slot:heading>

    <section class="text-left w-full max-w-none px-0">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Profile Information') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('customers.update',['id'=>$customer->id]) }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div class="grid grid-cols-[150px_1fr] gap-x-6 gap-y-4 items-start">
                {{-- First Name --}}
                <x-input-label for="first_name" :value="__('First Name')" class="pt-2" />
                <div>
                    <x-text-input id="first_name" name="first_name" type="text"
                        :value="old('first_name', $customer->first_name)" required autocomplete="first_name" />
                    @error('first_name')
                    <p class="text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Last Name --}}
                <x-input-label for="last_name" :value="__('Last Name')" class="pt-2" />
                <div>
                    <x-text-input id="last_name" name="last_name" type="text"
                        :value="old('last_name', $customer->last_name)" required autocomplete="last_name" />
                    @error('last_name')
                    <p class="text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <x-input-label for="email" :value="__('Email')" class="pt-2" />
                <div>
                    <x-text-input id="email" name="email" type="email" :value="old('email', $customer->email)" required
                        autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </section>
</x-layout>