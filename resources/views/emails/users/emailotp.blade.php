@component('mail::message')
    # Hi {{ $username }}

    This is your otp {{ $email_otp }} to verify the account.

    @component('mail::button', ['url' => route('login')])
        Verify Now
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
