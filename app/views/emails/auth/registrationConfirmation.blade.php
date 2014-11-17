<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{Config::get('appInfo.name')}} User Registration Confirmation</h2>

		<div>
			Dear {{ $username }}, thank you for registering an account at {{ Config::get('appInfo.name') }}.<br/>
			In order to use our services, you would need to be granted access to a home directory. Our staff is being notified of your registration and we will be in  touch shortly, to notify you when your account is being completely set up.<br/>
		</div>
	</body>
</html>
