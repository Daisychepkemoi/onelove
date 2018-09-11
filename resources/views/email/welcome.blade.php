<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@foreach($user as $userr)
		<h1>welcome  to laracasts  {{$userr->name}} </h1>
		<h3>Please click the burron below to activate your account </h3>
		<button class="btn btn-primary"><a href="/activate/{{$userr->id}}">Activate Account</a></button>
		@endforeach
</body>
</html>