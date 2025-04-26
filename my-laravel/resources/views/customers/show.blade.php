<x-layout>
    <x-slot:heading>
        {{ __('general.Find Customers') }}
    </x-slot:heading>

    <section class="text-left w-full max-w-none px-0">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Update Customer Information') }}
            </h2>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('customers.update',['id'=>$customer->id]) }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div class="grid grid-cols-[150px_1fr] gap-x-6 gap-y-4 items-start">

                <x-customer-info-row name="identity_number" :label="__('Identity No.')"
                    :value="$customer->identity_number" />

                <x-customer-info-row name="first_name" :label="__('First Name')" :value="$customer->first_name" />

                <x-customer-info-row name="last_name" :label="__('Last Name')" :value="$customer->last_name" />

                <x-customer-info-row name="type" :label="__('Type')" :value="$customer->type" />

                <x-customer-info-row name="gender" :label="__('Gender')" :value="$customer->gender" />

                <x-customer-info-row name="phone" :label="__('Phone')" :value="$customer->phone" />

                <x-customer-info-row name="cellphone" :label="__('Cell Phone')" :value="$customer->cellphone" />

                <x-customer-info-row name="profession" :label="__('Profession')" :value="$customer->profession" />

                <x-customer-info-row name="birthdate" :label="__('Birth Date')" :value="$customer->birthdate" />

                <x-customer-info-row name="license_date" :label="__('License Date')" :value="$customer->license_date"
                    :required="false" />

                <x-customer-info-row name="license_type" :label="__('License Type')" :value="$customer->license_type"
                    :required="false" />

                <x-customer-info-row name="email" :label="__('Email')" :value="$customer->email" />

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