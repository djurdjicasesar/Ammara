<!DOCTYPE html>
<html lang="hr">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Resetirajte Lozinku</h2>

		<p>Za promijenu lozinke, <a href="{{ route('auth.password.reset.form', urlencode($code)) }}">kliknite ovdje.</a></p>
		<p>ili u pregledniku otvorite ovu adresu: <br /> {!! route('auth.password.reset.form', urlencode($code)) !!} </p>
		<p>Hvala Vam!</p>
	</body>
</html>