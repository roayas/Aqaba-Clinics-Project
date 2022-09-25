@component('mail::message')
# Canceling Appointment

<h3>Dear {{$cancelUser['user_name']}}</h3>
<p> your booking appointment in clinic {{$cancelUser['clinicName']}} in {{$cancelUser['time']}} is Canceled </p>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Go To The Web
@endcomponent

Thanks,<br>
Aqaba Clinic
@endcomponent
