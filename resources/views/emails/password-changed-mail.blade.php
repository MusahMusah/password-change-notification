<x-mail::message>
Hi {{ $user->getRawOriginal($user->nameColumnName()) }},

The password for your account was recently changed.

Please contact {{ config('app.name') }} team if you did not initiate this change.

<x-mail::button :url="''">
    {{ __('Go to Dashboard') }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
