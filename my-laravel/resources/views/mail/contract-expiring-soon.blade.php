<x-mail::message>
Dear {{ $contract->customer->first_name }},

Your contract with number {{ $contract->number }} is expiring soon. Please renew it before it expires.

Thanks,<br>
{{ config('app.name') }}

</x-mail::message>
