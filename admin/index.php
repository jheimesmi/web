<?php
session_start();
if (!isset($_SESSION['admin']) and !isset($_SESSION['rango']) and !$_SESSION['auth1'] == 'Trr44NvG3r1t0' and !$_SESSION['auth2'] == 'WhS9k6s0TbE3d1v13434azE' and !$_SESSION['auth3'] == md5($_SESSION['admin']))
{
	if(isset($_POST['envio']))
	{
		if((isset($_POST['user'])) && !empty($_POST['user']) &&
			(isset($_POST['password'])) && !empty ($_POST['password']))
			{
				if(!preg_match('/[^0-9A-Za-z]/',$_POST['user']))
				{
					$user = $_POST['user'];
					$pass = $_POST['password'];
					
					$user = htmlentities($user, ENT_QUOTES,'UTF-8');
					$pass = htmlentities($pass, ENT_QUOTES,'UTF-8');
					
					include('./../includes/db.php');
					
					$user = mysqli_real_escape_string($con, $user);
					$pass = mysqli_real_escape_string($con, $pass);
					
					
					//$sel = sprintf("SELECT user, pass, rango FROM web_admin WHERE user = '%s' AND pass = '%s' AND 1",
					//$user, $pass);
					//$que = mysql_query($sel);
					// $num = mysql_num_rows($que);
					$sel = sprintf("SELECT user, rango FROM web_admin WHERE user = '%s' AND 1",
					$user);
					$que = mysqli_query($con, $sel);
					$num = mysqli_num_rows($que);
					
					if($num)
					{
						
						$row =  mysqli_fetch_assoc($que);
						if($row['user'] === $user)
						{
							$sel2 = sprintf("SELECT pass FROM web_admin WHERE user = '%s' AND 1",
							$user);
							$que2 = mysqli_query($con, $sel2);
							$row2 =  mysqli_fetch_assoc($que2);
							if($row2['pass'] === $pass)
							{
								$rango = $row['rango'];
								$_SESSION['admin'] = $user;
								$_SESSION['rango'] = $rango;
								$_SESSION['auth1'] = 'Trr44NvG3r1t0';
								$_SESSION['auth2'] = 'WhS9k6s0TbE3d1v13434azE';
								$_SESSION['auth3'] = md5($_SESSION['admin']);
								header('Location:./');
							}
							else
							{
								$error = "Datos erróneos";
							}
						}
						else
						{
							$error = "Datos erróneos";
						}
						
					}
					else
					{
						$error = "Datos erróneos";
					}
				}
				else
				{
					$error = "Datos erróneos";
				}
			}
			else
			{
				$error = "Debes completar todos los campos";
			}
	}
	?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración | GranRol</title>
	<link id="css" rel="stylesheet" type="text/css" href="./css/admin.css" />
</head>
<body>
	<div id="box">
		<div id="header">
			<div id="gran">
			Gran Rol
			</div>
		<h5>Área de administración</h5>
		</div>
		<p>Bienvenido. Introduce tus datos</p>
			<form action="" method="post" id="form" accept-charset="utf-8">
				<table width="95%" border="0" align="right">
				<tr>
						<td width="38%" height="1">Usuario</td>
						<td width="62%"><label for="username"></label>
						<input type="text" name="user" id="user" /></td>
					</tr>
					<tr>
						<td height="48">Contraseña</td>
						<td><input type="password" name="password" id="password" /></td>
					</tr>
				</table>
				<div id="submit"><input type="submit" name="envio" id="button" value="Acceder" /></div>
			</form>
			<?php if(isset($error)){ echo "<div class='error'>".$error."</div>"; } ?>
			<div id="copy">Copyright &copy; Gran Rol 2013</div>
		
	</div>
</body>
</html>
	<?php
}
else
{
include('./../includes/db.php');
$rango = $_SESSION['rango'];
$name = $_SESSION['admin'];
$name = mysqli_real_escape_string($con, $name);

$query1 = sprintf("SELECT count(*) FROM web_admin_job WHERE para = '%s'",
$name);
$resultq1 = mysqli_query($con, $query1);
$notificaciones = mysqli_fetch_row($resultq1);
$notificaciones = $notificaciones[0];
if(mysqli_fetch_row($resultq1))
{
	$notificaciones = mysqli_fetch_row($resultq1);
}

switch($rango)
{
	case 1:
		$rangon = "Moderador";
		break;
	case 2:
		$rangon = "Operador";
		break;
	case 3:
		$rangon = "Administrador";
		break;
	case 4:
		$rangon = "Desarrollador";
		break;
	default:
		$rangon = "Error";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración | GranRol</title>
	<link id="css" rel="stylesheet" type="text/css" href="./css/admin3.css" />
	<link id="css" rel="stylesheet" type="text/css" href="./css/menu.css" />
</head>
<body>
<?php
//Box 1 y 2
include('./boxs.php');
?>
<div id="box3">
	
</div>
<?php
//Box 4
include('./menu.php');
?>
<div id="box5">
	<div class="contenido">
		<p class="text">Bienvenido <?php echo $name; ?> al panel de control. Recuerda informarte sobre tus tareas pendentes en la esquina superior derecha.
		Si tienes alguna duda sobre el panel no dudes contactar a un desarrollador. También puedes ver la información disponible en la zona restringida para la administración en el foro.
		</p>
		<h3 class="msj">Mensaje del Desarrollador</h3>
		<textarea class="textnote">¡Bienvenidos staff! Mañana posiblemente el servidor esté en mantenimiento para agregar nuevas funciones. Solo será por un momento</textarea>
		<br>
		<h3 class="msj">Noticias</h3>
		<?php
		$i = 0; 
		$sel = "SELECT * FROM web_noticias ORDER BY id DESC LIMIT 0,4"; 
		$que = mysqli_query($con, $sel); 
		$num = mysqli_num_rows($que);

		if ($num)
		{ 
			while ($i < $num and $tos = mysqli_fetch_assoc($que))
			{
				$titulo = htmlentities($tos[titulo], ENT_QUOTES,'UTF-8');
				$texto = htmlentities($tos[texto], ENT_QUOTES,'UTF-8');
				$fecha = htmlentities($tos[fecha], ENT_QUOTES,'UTF-8');
				$creador = htmlentities($tos[creador], ENT_QUOTES,'UTF-8');
				$texto = nl2br($texto);
				$texto = stripslashes($texto);
				
				echo "<div class='alert alert-success'>";
				echo "<h4 class='alert-heading'>$titulo - $creador - $fecha</h4><br>";
				echo $texto;
				echo "</div>";
			}
		}
		else
		{
			echo "<i>Actualmente no hay noticias.</i>";
		}
		?>
		<h3 class="msj">Estado del Servidor</h3>
		<?php
			require("SampQuery.class.php");
			$query = new SampQuery("69.64.45.232", 7777);
			if ($query->connect())
			{
				$aInformation = $query->getInfo();
				$aServerRules = $query->getRules();
				$ping = $query->getPing();
				//$jugadores = $query->getDetailedPlayers();
				//$result = count($jugadores);
				
				//Sacamos los datos de los array
				$hostname = utf8_encode($aInformation['hostname']);
				//$players = utf8_encode($aInformation['players']);
				$gm = utf8_encode($aInformation['gamemode']);
				$map = utf8_encode($aInformation['map']);
				
				$version = utf8_encode($aServerRules['version']);
				$clima = utf8_encode($aServerRules['weather']);
				$urlsv = utf8_encode($aServerRules['weburl']);
				$time = utf8_encode($aServerRules['worldtime']);
				?>
				<div id="corrser">
				Estado del Servidor: Conectado
				</div>
				<br>
				<table class="corrtable" border="1">
					<tr>
						<th>Info</th><th>Resultado</th>
					</tr>
					<tr>
						<td>IP</td><td>69.64.45.232:7777</td>
					</tr>
					<tr>
						<th>Hostname</th><td><?php echo $hostname; ?></td>
					</tr>
					<tr>
						<th>jugadores</th><td><?php echo $aInformation['players']; ?></td>
					</tr>
					<tr>
						<th>GM</th><td><?php echo $gm; ?></td>
					</tr>
					<tr>
						<th>Ping</th><td><?php echo $ping; ?></td>
					</tr>
					<tr>
						<th>Mapa</th><td><?php echo $map; ?></td>
					</tr>
					<tr>
						<th>Versión</th><td><?php echo $version; ?></td>
					</tr>
					<tr>
						<th>Clima</th><td><?php echo $clima; ?></td>
					</tr>
					<tr>
						<th>Web</th><td><?php echo $urlsv; ?></td>
					</tr>
					<tr>
						<th>Horario</th><td><?php echo $time; ?></td>
					</tr>
				</table>
			<?php
			}
			else
			{
				?>
				<div id="errorser">
				Estado del Servidor: Sin conexión
				</div>
				<br>
				<table class="tablefail" border="1">
					<tr>
						<th>IP</th><th>Puerto</th>
					</tr>
					<tr>
						<td>127.0.0.1</td><td>:7777</td>
					</tr>
				</table>
				<?php
			}
		?>
		<h3 class="msj">Estadísticas</h3>
		<?php
			$q = mysqli_query($con, "SELECT count(*) FROM players");
			$total = mysqli_fetch_row($q);
			$total = $total[0];
			//echo "Tenemos "."<div id='bold' style='font-weight:bold;'>".$total."</div>"." cuentas en el servidor";
		?>
		<!--Tenemos <div id="bold" style="font-weight:bold;"></div>cuentas<div id="right" style="text-align: right;">Tenemos</div>-->
		<table id="estadisticas">
			<tr>
			<tr>
		</table>
		<br><br><br>
	</div>
</div>
</body>
</html>
<?php
}
?>