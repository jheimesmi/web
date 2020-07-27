<?php

if(isset($_POST['enviado']))
{
	include('./includes/db.php');
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$pass = htmlentities($pass, ENT_QUOTES,'UTF-8');
	$pass = mysql_real_escape_string($pass);
	$sel = sprintf("SELECT email, password, certificacion FROM web_perfiles WHERE email = '%s' AND password = '%s' AND 1",
	$email, $pass);
	if(mysql_num_rows(mysql_query($sel)))
	{
		echo "Datos correctos";
	}
	else
	{
		echo "Datos incorrectos";
	}
}
?>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form action="login.php" method="post">
Escribe tu email:<br>
<input type="text" name="email"><br>
Escribe tu contraseña:<br>
<input type="text" name="pass"><br>
<input type="submit" name="enviado" value="Enviar">
</form>
</body>
</html>