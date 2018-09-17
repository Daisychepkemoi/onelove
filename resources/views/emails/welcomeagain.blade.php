@component('mail::message')
# Introduction
<p>Welcome to one Love {{$user->name}}, </p>
Thank You for Registering with us. Please activate your account to be able to login.

@component('mail::button', ['url' => '/activate/{{$user->id}}'])
Activate Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
