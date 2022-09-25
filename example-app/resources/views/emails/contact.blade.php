<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Mail</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>
<body>

<section class="mail-seccess section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 col-12">
				<!-- Error Inner -->
				<div class="success-inner">
					<h1>  <img src="{{asset('img/alogo')}}"
            style="margin-top: 1.4em;margin-left:1.1em;width:90px;"></i><span>Your Mail Sent Successfully!</span></h1>
            <h6>Contact Message</h6>
            <p>Name: {{$email['name']}}</p>
            <p>email: {{$email['email']}}</p>
            <p>subject: {{$email['subject']}}</p>
            <p>phone: {{$email['phone']}}</p>
            <p>message: {{$email['message']}}</p>
					<a href="http://127.0.0.1:8000/" class="btn btn-primary btn-lg">Go Home</a>
				</div>
				<!--/ End Error Inner -->
			</div>
		</div>
	</div>
</section>
</body>
</html>