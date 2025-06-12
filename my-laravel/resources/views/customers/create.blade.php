<x-layout>
    <x-slot:heading>
        {{__('general.Create Profile')}}
    </x-slot:heading>

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Customer Information') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("Insert the customer information and email address.") }}
            </p>
        </header>


        <form method="post" action="{{ route('customers.store') }}" class="mt-6 space-y-6">
            @csrf
            @method('post')

            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" required
                    autocomplete="on" placeholder="First Name" />

                @error('first_name')
                <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" required
                    autocomplete="on" placeholder="Last Name" />
                @error('last_name')
                <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="on"
                    placeholder="Email" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />


            </div>

            <div class="flex items-center gap-4">

                <x-secondary-button type="button" onclick="window.location.href='{{ route('home') }}'">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-primary-button>{{ __('Save') }}</x-primary-button>


            </div>
        </form>
    </section>

</x-layout>