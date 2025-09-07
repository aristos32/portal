<x-layout>
    <x-slot:heading>
        {{ __('Update Customer: ') . $customer->first_name . ' ' . $customer->last_name }}
    </x-slot:heading>

    <section class="text-left w-full max-w-none px-0">

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('customers.update',['id'=>$customer->id]) }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div class="grid grid-cols-[150px_1fr] gap-x-6 gap-y-4 items-start">

                <x-customer-info-row name="identity_number" :label="__('Identity No.')"
                    :value="$customer->identity_number" />

                <x-customer-info-row name="first_name" :label="__('First Name')" :value="$customer->first_name"
                    :required="false" />

                <x-customer-info-row name="last_name" :label="__('Last Name')" :value="$customer->last_name"
                    :required="false" />

                <x-customer-info-row name="type" :label="__('Type')" :value="$customer->type" />

                <x-customer-info-row name="gender" :label="__('Gender')" type="select" :value="$customer->gender">
                    <option value="">{{ __('Select') }}</option>
                    <option value="male" {{ $customer->gender === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $customer->gender === 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $customer->gender === 'other' ? 'selected' : '' }}>Other</option>
                </x-customer-info-row>

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

            <div class="mt-6 flex items-center justify-end gap-4">
                <x-secondary-button onclick="history.back()">{{ __('Cancel') }}</x-secondary-button>
                <x-primary-button>{{ __('Update') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Updated.') }}</p>
                @endif
            </div>
        </form>

        <div class="mt-4 flex items-center justify-start">
            <form method="POST" action="{{ route('customers.destroy', ['id' => $customer->id]) }}" onsubmit="return confirm('Are you sure you want to delete this customer?')">
                @csrf
                @method('delete')
                <button type="submit" class="text-red-500 text-sm font-bold hover:text-red-700">Delete Customer</button>
            </form>
        </div>

    </section>
</x-layout>
