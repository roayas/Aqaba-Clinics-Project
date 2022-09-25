@component('mail::message')
# New Booking 

<p>User Name: {{$bookClinic['user_name']}}</p>
            <p>User ID Number: {{$bookClinic['user_id_num']}}</p>
            <p>Time: {{$bookClinic['time']}}</p>
            <p>User Phone: {{$bookClinic['user_phone']}}</p>
            <p>User Email: {{$bookClinic['email']}}</p>
@component('mail::button', ['url' => 'http://127.0.0.1:8000/booking'])
Go To The Web
@endcomponent

Thanks,<br>
Aqaba Clinics
@endcomponent
