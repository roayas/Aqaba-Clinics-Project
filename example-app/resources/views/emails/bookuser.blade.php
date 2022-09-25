@component('mail::message')
# Thank you for booking

<h3>Dear {{$bookuser['user_name']}}</h3>
<p> your booking appointment in clinic {{$bookuser['clinicName']}} is in {{$bookuser['time']}}</p>


@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Go To The Web
@endcomponent

Thanks,<br>
Aqaba Clinics
@endcomponent