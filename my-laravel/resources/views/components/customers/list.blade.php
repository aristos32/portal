@props(['customers'])

<ul class="divide-y divide-gray-200">
    @forelse($customers as $customer)
    <li class="py-3">
        <div class="mb-2">
            <x-nav-link :href="route('customers.show',['id'=>$customer->id])" type='anchor'>
                {{$customer->getFullName()}}
            </x-nav-link>
        </div>
        <div class="text-xs text-gray-500">Created {{ $customer->created_at->diffForHumans() }}</div>
    </li>
    @empty
    <li class="py-3 text-gray-500 italic">No customers created recently.</li>
    @endforelse
</ul>