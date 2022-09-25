@component('mail::message')
# Canceled Appointment

<h3>This Appointment has been canceled </h3>
<p>User Name: {{$cancelClinic['user_name']}}</p>
<p>User ID Number: {{$cancelClinic['user_id_num']}}</p>
<p>Time: {{$cancelClinic['time']}}</p>
<p>User Phone: {{$cancelClinic['user_phone']}}</p>
<p>User Email: {{$cancelClinic['email']}}</p>
@component('mail::button', ['url' => 'http://127.0.0.1:8000/deletedebook'])
Go To The Web
@endcomponent

Thanks,<br>
Aqaba Clinics
@endcomponent