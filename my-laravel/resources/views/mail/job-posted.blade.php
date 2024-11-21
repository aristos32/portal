<x-mail::message>
    # Introduction

    The body of your message.

    <h2>
        {{ $job->title }}

    </h2>

    <p>
        <a href="{{url('/jobs/' . $job->id)}}">View</a>
    </p>
    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>