<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<h1>welcome  to One Love  {{$user->name}} </h1>
	<h3>Please click the burron below to activate your account </h3>
	<button class="btn btn-primary"><a href="/activate/{{$user->id}}">Activate Account</a></button>
	<p>	Thank tou for registering with us.</p>
	
</body>
</html>