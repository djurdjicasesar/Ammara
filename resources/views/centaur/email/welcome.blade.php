<!DOCTYPE html>
<html lang="hr">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Dobro Došli</h2>

		<p><b>Račun:</b> {{ $email }}</p>
		<p>Za aktivaciju Vašeg računa, <a href="{{ route('auth.activation.attempt', urlencode($code)) }}">kliknite ovdje.</a></p>
		<p>Ili u pregledniku otvorite ovu adresu: <br /> {!! route('auth.activation.attempt', urlencode($code)) !!} </p>
		<p>Hvala Vam!</p>
	</body>
</html>