<section class="text-left w-full max-w-none px-0">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Customer Information') }}
        </h2>
    </header>

    <div class="grid grid-cols-[150px_1fr] gap-x-6 gap-y-4 items-start">
        <div class="font-medium text-gray-700 dark:text-gray-300">{{ __('Identity No.') }}</div>
        <div class="text-gray-900 dark:text-gray-100">{{ $customer->identity_number ?? '-' }}</div>

        <div class="font-medium text-gray-700 dark:text-gray-300">{{ __('First Name') }}</div>
        <div class="text-gray-900 dark:text-gray-100">{{ $customer->first_name ?? '-' }}</div>

        <div class="font-medium text-gray-700 dark:text-gray-300">{{ __('Last Name') }}</div>
        <div class="text-gray-900 dark:text-gray-100">{{ $customer->last_name ?? '-' }}</div>

        <div class="font-medium text-gray-700 dark:text-gray-300">{{ __('Type') }}</div>
        <div class="text-gray-900 dark:text-gray-100">{{ $customer->type ?? '-' }}</div>

        <div class="font-medium text-gray-700 dark:text-gray-300">{{ __('Gender') }}</div>
        <div class="text-gray-900 dark:text-gray-100">
            @if($customer->gender)
                {{ ucfirst($customer->gender) }}
            @else
                -
            @endif
        </div>

        <div class="font-medium text-gray-700 dark:text-gray-300">{{ __('Phone') }}</div>
        <div class="text-gray-900 dark:text-gray-100">{{ $customer->phone ?? '-' }}</div>

        <div class="font-medium text-gray-700 dark:text-gray-300">{{ __('Cell Phone') }}</div>
        <div class="text-gray-900 dark:text-gray-100">{{ $customer->cellphone ?? '-' }}</div>

        <div class="font-medium text-gray-700 dark:text-gray-300">{{ __('Profession') }}</div>
        <div class="text-gray-900 dark:text-gray-100">{{ $customer->profession ?? '-' }}</div>

        <div class="font-medium text-gray-700 dark:text-gray-300">{{ __('Birth Date') }}</div>
        <div class="text-gray-900 dark:text-gray-100">{{ $customer->birthdate ?? '-' }}</div>

        <div class="font-medium text-gray-700 dark:text-gray-300">{{ __('License Date') }}</div>
        <div class="text-gray-900 dark:text-gray-100">{{ $customer->license_date ?? '-' }}</div>

        <div class="font-medium text-gray-700 dark:text-gray-300">{{ __('License Type') }}</div>
        <div class="text-gray-900 dark:text-gray-100">{{ $customer->license_type ?? '-' }}</div>

        <div class="font-medium text-gray-700 dark:text-gray-300">{{ __('Email') }}</div>
        <div class="text-gray-900 dark:text-gray-100">{{ $customer->email ?? '-' }}</div>
    </div>

    <x-button :href="route('customers.edit',['customer'=>$customer])">{{ __('Edit') }}</x-button>

</section>
