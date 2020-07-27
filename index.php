<?php

/*

/// creada tabla web_email id nombre email code pressed verified
/// creada tabla web_quest 
/// creada tabla web_form id quest
/// creada table web_cert id nombre resp1 hasta resp10, id8 hasta id10
/// creada tabla sexo en players
/// creada tabla web_assig nombre assig

0 -> email

3 -> certificacion

1 -> acceso al PCU (i al juego in-game)

2 -> reeduca

*/

session_start();
if (isset($_SESSION['email']) and $_SESSION['control'] == 'NnY2c0g1JqI' and $_SESSION['control2'] == 'UbP4b5a0Efj2m1XuT' and $_SESSION['control3'] == md5($_SESSION['email']))
{
	header('Location: ./principal/');
}
else
{
	if (isset($_POST['button']))
	{
		if((isset($_POST['user'])) && !empty($_POST['user']) &&
		(isset($_POST['password'])) && !empty($_POST['password']))
		{
			$email = $_POST['user'];
			$email = strtolower($email);
			$email = htmlentities($email, ENT_QUOTES,'UTF-8');
			if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$email))
			{
				$pass = $_POST['password'];
				$pass = htmlentities($pass, ENT_QUOTES,'UTF-8');
				include('./includes/db.php');
				
				$email = mysqli_real_escape_string($con, $email);
				$pass = mysqli_real_escape_string($con, $pass);
				//$pass = hash('whirlpool', $pass);
				
				$sel = sprintf("SELECT email, password, certificacion FROM web_perfiles WHERE email = '%s' AND password = '%s' AND 1",
				$email, $pass);
				$error = "paso";
				//$num = mysql_fetch_array($que) or die ($error = mysql_error());
				if(mysqli_num_rows(mysqli_query($con, $sel)))
				{
					$_SESSION['email'] = $email;
					$_SESSION['control'] = 'NnY2c0g1JqI';
					$_SESSION['control2'] = 'UbP4b5a0Efj2m1XuT';
					$control3 = md5($email);
					$_SESSION['control3'] = $control3;
					header('Location: ./ucp/principal');
					$error = "Correcto";
					//echo "correcto";
				}
				else
				{
					$error = "Datos incorrectos";
					//$error = $pass;
				}
			}
			else
			{
				$error = "Email inválido";
			}
		}
		else
		{
			$error = "Debes completar todos los campos correctamente.";
		}
		/*if(!preg_match('/[^A-Za-z_]/',$_POST['user']) and !preg_match('/[^A-Za-z0-9]/',$_POST['password']))
		{
			include('./includes/db.php');
			$user = $_POST['user'];
			$pass = $_POST['password'];
			$sel = "SELECT nombre,password,certificacion FROM players WHERE nombre = '$user' and password = '$pass' AND 1 ";$que = mysql_query($sel); $num = mysql_num_rows($que);
			if ($num)
			{
			$_SESSION['player'] = $user;
			$_SESSION['control'] = 'NnY2c0g1JqI';
			$_SESSION['control2'] = 'UbP4b5a0Efj2m1XuT';
			header('Location: http://localhost/pcu/panel/');
			}
			else
			{
				$error = 'Los datos introducidos no son correctos.';
			}
		}
		else
		{
			$error = 'Los datos introducidos no son correctos.';
		}*/
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GranRol | PCU</title>


<link id="css" rel="stylesheet" type="text/css" href="./css/principal.css" />
<!--<script type="text/javascript">
if ((screen.width==800) && (screen.height==600))
{document.getElementById('css').href='index_800.css';}

if ((screen.width==1280) && (screen.height==1024))
{document.getElementById('css').href='index_1280.css';}


</script>!-->

</head>

<body>
<!--<div id="logo"><img src="logo.png" /></div> !-->
<div id="big">

	<div id="info">
		<h1>¡Bienvenido!</h1>
		<article>
		Te invitamos a participar en nuestro servidor.
		Estamos muy agradecidos por tu visita, espero que el servidor 
		logre cumplir tus expectativas. Aquí podrás ver los datos relacionados
		a tu personaje en el servidor y podrás configurarlo.
		¡Diviertete!
		<br>
		<aside>- Administración Gran Rol. </aside>
		</article>
	</div>
	<br>
	<div id="box">
		<h1>Ingresar al Panel</h1>
		<form method="post" action="">
		<table width="100%" border="0">
			<tr>
				<td scope="col">Perfil</td>
				<td scope="col"><label>
				<input class="in" type="text" name="user" id="user" placeholder="email@ejemplo.com"/>
				</label></td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td>
					<input class="in" type="password" name="password" id="password" placeholder="Contraseña" />
				</td>
			</tr>
		</table>
    
		<center><label>
			<input type="submit" name="button" id="button" class='but' value="Acceder" />
		</label>
		<label>
			<input type="reset" name="button2" id="button2" class='but' value="Restablecer" /></label></center>
			<center><p><a href="javascript:popup2();">¿Olvidaste la contraseña?</a></p><error><?php echo $error ?></error></center>
		</form>
	</div>
	
	<div id="box2">
		<h1>¿Nuevo en GranRol?</h1>
		<div class="p2">- <a href="./registro.php" target="_parent">Crear una nueva cuenta</a><br />
		- <a href="../foro" target="_blank">Acceder al foro</a><br />
		- <a href="javascript:popup();">¿Quiénes somos?</a></div></div>
</div>
</body>
</html>