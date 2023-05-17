@component('mail::message')
# OTP Code

Your OTP code is: {{ $otpCode }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
