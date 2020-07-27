<?php
session_start();
if (!isset($_SESSION['admin']) and !isset($_SESSION['rango']) and !$_SESSION['auth1'] == 'Trr44NvG3r1t0' and !$_SESSION['auth2'] == 'WhS9k6s0TbE3d1v13434azE' and !$_SESSION['auth3'] == md5($_SESSION['admin']))
{
	header('Location: ../');
}
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

//Funcion de Obtención de IP
function getIpReal()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP']))   
	{
	  $ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   
	{
	  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
	  $ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

if(isset($_GET['id']))
{
	$patron = "/^[[:digit:]]+$/";
	if(preg_match($patron, $_GET['id']))
	{
		$id = $_GET['id'];
		$id = htmlentities($id, ENT_QUOTES,'UTF-8');
	}
	else
	{
		session_destroy();
		header('Location: ./');
	}
}

if(isset($_GET['email']))
{
	if(preg_match('/[a-z]/',$_GET['email']))
	{
		$email = $_REQUEST['email'];
		$email = htmlentities($email, ENT_QUOTES,'UTF-8');
	}
	else
	{
		session_destroy();
		header('Location: ./');
	}
}

if(isset($_POST['buscar']))
{
	$email = $_POST['email'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Ver Certificación | GranRol</title>
	<link id="css" rel="stylesheet" type="text/css" href="./css/admin3.css" />
	<link id="css2" rel="stylesheet" type="text/css" href="./css/menu.css" />
</head>
<body>
<?php
//Box 1 y 2
include('./boxs.php');
?>
<div id="box3">
			<ul class="ulh">
				<li class="lih"><a href="javascript:void(0);" class="active">Ver</a></li>
			</ul>
</div>
<?php
include('./menu.php');
?>
<div id="box5">
	<div class="contenido">
	<?php
	if(isset($id) and isset($email))
	{
	?>
	<div class="alert alert-error">
		<strong>Error</strong><br>
		Hay un exceso de datos en tu petición. Vuelve e intentalo de nuevo.
	</div>
	<?php
	}
	else if(isset($id))
	{
		$query5 = sprintf("SELECT * FROM web_cert WHERE id = '%s' AND activa = '0'",
		$id);
		$resultado5 = mysqli_query($con, $query5);
		$num = mysqli_num_rows($resultado5);

		if ($num)
		{
			$tos = mysqli_fetch_assoc($resultado5);
			$email = htmlentities($tos[email], ENT_QUOTES,'UTF-8');
			
			$query6 = sprintf("SELECT * FROM web_perfiles WHERE email = '%s'",
			$email);
			$resultado6 = mysqli_query($con, $query6);
			$num2 = mysqli_num_rows($resultado6);
			if($num2)
			{
				$toste = mysqli_fetch_assoc($resultado6);
				//Obtenemos datos del perfil
				$id = htmlentities($toste[id], ENT_QUOTES,'UTF-8');
				$perfil = htmlentities($toste[nombre], ENT_QUOTES,'UTF-8');
				$ip = htmlentities($toste[ip], ENT_QUOTES,'UTF-8');
				$nombre = htmlentities($toste[namec1], ENT_QUOTES,'UTF-8');
				
				$fechacert = htmlentities($tos[fecha], ENT_QUOTES,'UTF-8');
				$msjcert = htmlentities($tos[mensaje], ENT_QUOTES,'UTF-8');
				$msjcert = nl2br($msjcert);
				$msjcert = stripslashes($msjcert);
				$certificador = htmlentities($tos[certificador], ENT_QUOTES,'UTF-8');
				
				$mostrarf = explode("-",$fechacert);
				
				//Obtenemos datos de la certificación
				$resp1 = htmlentities($tos[resp1], ENT_QUOTES,'UTF-8');
				$resp1 = nl2br($resp1);
				$resp1 = stripslashes($resp1);
				//
				$resp2 = htmlentities($tos[resp2], ENT_QUOTES,'UTF-8');
				$resp2 = nl2br($resp2);
				$resp2 = stripslashes($resp2);
				//
				$resp3 = htmlentities($tos[resp3], ENT_QUOTES,'UTF-8');
				$resp3 = nl2br($resp3);
				$resp3 = stripslashes($resp3);
				//
				$resp4 = htmlentities($tos[resp4], ENT_QUOTES,'UTF-8');
				$resp4 = nl2br($resp4);
				$resp4 = stripslashes($resp4);
				//
				$resp5 = htmlentities($tos[resp5], ENT_QUOTES,'UTF-8');
				$resp5 = nl2br($resp5);
				$resp5 = stripslashes($resp5);
				//
				$resp6 = htmlentities($tos[resp6], ENT_QUOTES,'UTF-8');
				$resp6 = nl2br($resp6);
				$resp6 = stripslashes($resp6);
				//
				$resp7 = htmlentities($tos[resp7], ENT_QUOTES,'UTF-8');
				$resp7 = nl2br($resp7);
				$resp7 = stripslashes($resp7);
				//
				$resp8 = htmlentities($tos[resp8], ENT_QUOTES,'UTF-8');
				$resp8 = nl2br($resp8);
				$resp8 = stripslashes($resp8);
				//
				$resp9 = htmlentities($tos[resp9], ENT_QUOTES,'UTF-8');
				$resp9 = nl2br($resp9);
				$resp9 = stripslashes($resp9);
				//
				$resp10 = htmlentities($tos[resp10], ENT_QUOTES,'UTF-8');
				$resp10 = nl2br($resp10);
				$resp10 = stripslashes($resp10);
				//
				$resp11 = htmlentities($tos[resp11], ENT_QUOTES,'UTF-8');
				$resp11 = nl2br($resp11);
				$resp11 = stripslashes($resp11);
				//
				$resp12 = htmlentities($tos[resp12], ENT_QUOTES,'UTF-8');
				$resp12 = nl2br($resp12);
				$resp12 = stripslashes($resp12);
				//
				$resp13 = htmlentities($tos[resp13], ENT_QUOTES,'UTF-8');
				$resp13 = nl2br($resp13);
				$resp13 = stripslashes($resp13);
				//
				
				echo $errorcert;
				?>
				<div class="alert alert-success">
					<h4 style="float: right;">ID Único: <?php echo $id; ?></h4>
					<h5>Certificación del Perfil - <?php echo $email; ?></h5>
					<p class="contact-input">
					Nombre del Perfil: <?php echo $perfil; ?><br>
					Nombre del Personaje: <?php echo $nombre; ?><br>
					IP al registrarse: <?php echo $ip; ?>
					</p>
					<h5 style="text-align: center;">Preguntas y Respuestas</h5>
					<!-- Pregunta -->
					Cuéntanos un poco de ti. (Nombre, país, edad, intereses, etc)<br>
					<p class="contact-input">
					<?php echo $resp1; ?>
					</p>
					<!-- Pregunta -->
					¿Por qué te gusta el rol? ¿Hace cuánto juegas sa-mp? ¿En qué servidores?<br>
					<p class="contact-input">
					<?php echo $resp2; ?>
					</p>
					<!-- Pregunta -->
					¿Qué expectativas tienes de nuestro servidor? ¿Qué te gustaría que tenga?<br>
					<p class="contact-input">
					<?php echo $resp3; ?>
					</p>
					<!-- Pregunta -->
					Define DeathMatch (DM), Metagaming (MG) y Powergaming (PG) y da un ejemplo de cada uno.<br>
					<p class="contact-input">
					<?php echo $resp4; ?>
					</p>
					<!-- Pregunta -->
					Define Revenge Kill (RK), Character Kill (CK), y Bunny Jump (BJ) y da un ejemplo de cada uno.<br>
					<p class="contact-input">
					<?php echo $resp5; ?>
					</p>
					<!-- Pregunta -->
					Quiero estar AFK ¿Qué tengo que hacer? ¿Cómo se enteran los administradores?<br>
					<p class="contact-input">
					<?php echo $resp6; ?>
					</p>
					<!-- Pregunta -->
					¿Qué es interpretar el entorno?<br>
					<p class="contact-input">
					<?php echo $resp7; ?>
					</p>
					<!-- Pregunta -->
					¿Puedo matar al alcalde o a un lider de una facción legal?<br>
					<p class="contact-input">
					<?php echo $resp8; ?>
					</p>
					<!-- Pregunta -->
					¿Debo rolear las armas pequeñas? ¿Y las grandes?<br>
					<p class="contact-input">
					<?php echo $resp9; ?>
					</p>
					<!-- Pregunta -->
					¿Debo rolear cada golpe que le doy a una persona?<br>
					<p class="contact-input">
					<?php echo $resp10; ?>
					</p>
					<!-- Pregunta -->
					¿Se puede abusar de un error (bug)?<br>
					<p class="contact-input">
					<?php echo $resp11; ?>
					</p>
					<!-- Pregunta -->
					Si necesito un arma IC ¿Qué hago?<br>
					<p class="contact-input">
					<?php echo $resp12; ?>
					</p>
					<!-- Pregunta -->
					¿Puedo conducir como un loco por la ciudad?<br>
					<p class="contact-input">
					<?php echo $resp13; ?>
					</p>
				</div>
				<div class="alert alert-block">
				Esta certificación fue aceptada por el administrador: <?php echo $certificador." en la fecha: ".$mostrarf[2]."/".$mostrarf[1]."/".$mostrarf[0]; ?>
				<br>
				El administrador le dejó el siguiente mensaje al jugador:<br>
				<p class="contact-input">
					<?php echo $msjcert; ?>
				</p>
				</div>
				<?php
			}
			else
			{
			?>
			<div class="alert alert-error">
				<strong>Error 077</strong><br>
				Error de incompatibilidad, contacta a un desarrollador sobre este error informándole los siguentes datos:
				<?php echo "ID CERT: ". $idacertificar."E-MAIL: ".$email;?>
			</div>
			<?php
			}
		}
		else
		{
		?>
		<div class="alert alert-error">
			<strong>¡Aviso!</strong><br>
			La cuenta que intentas observar no existe o todavía no fue certificada.
		</div>
		<?php
		}
	}
	else if(isset($email))
	{
		if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$email))
		{
			$query5 = sprintf("SELECT * FROM web_cert WHERE email = '%s' AND activa = '0'",
			$email);
			$resultado5 = mysqli_query($con, $query5);
			$num = mysqli_num_rows($resultado5);

			if ($num)
			{
				$tos = mysqli_fetch_assoc($resultado5);
				$email = htmlentities($tos[email], ENT_QUOTES,'UTF-8');
				
				$query6 = sprintf("SELECT * FROM web_perfiles WHERE email = '%s'",
				$email);
				$resultado6 = mysqli_query($con, $query6);
				$num2 = mysqli_num_rows($resultado6);
				if($num2)
				{
					$toste = mysqli_fetch_assoc($resultado6);
					//Obtenemos datos del perfil
					$id = htmlentities($toste[id], ENT_QUOTES,'UTF-8');
					$perfil = htmlentities($toste[nombre], ENT_QUOTES,'UTF-8');
					$ip = htmlentities($toste[ip], ENT_QUOTES,'UTF-8');
					$nombre = htmlentities($toste[namec1], ENT_QUOTES,'UTF-8');
					
					$fechacert = htmlentities($tos[fecha], ENT_QUOTES,'UTF-8');
					$msjcert = htmlentities($tos[mensaje], ENT_QUOTES,'UTF-8');
					$msjcert = nl2br($msjcert);
					$msjcert = stripslashes($msjcert);
					$certificador = htmlentities($tos[certificador], ENT_QUOTES,'UTF-8');
					
					$mostrarf = explode("-",$fechacert);
					
					//Obtenemos datos de la certificación
					$resp1 = htmlentities($tos[resp1], ENT_QUOTES,'UTF-8');
					$resp1 = nl2br($resp1);
					$resp1 = stripslashes($resp1);
					//
					$resp2 = htmlentities($tos[resp2], ENT_QUOTES,'UTF-8');
					$resp2 = nl2br($resp2);
					$resp2 = stripslashes($resp2);
					//
					$resp3 = htmlentities($tos[resp3], ENT_QUOTES,'UTF-8');
					$resp3 = nl2br($resp3);
					$resp3 = stripslashes($resp3);
					//
					$resp4 = htmlentities($tos[resp4], ENT_QUOTES,'UTF-8');
					$resp4 = nl2br($resp4);
					$resp4 = stripslashes($resp4);
					//
					$resp5 = htmlentities($tos[resp5], ENT_QUOTES,'UTF-8');
					$resp5 = nl2br($resp5);
					$resp5 = stripslashes($resp5);
					//
					$resp6 = htmlentities($tos[resp6], ENT_QUOTES,'UTF-8');
					$resp6 = nl2br($resp6);
					$resp6 = stripslashes($resp6);
					//
					$resp7 = htmlentities($tos[resp7], ENT_QUOTES,'UTF-8');
					$resp7 = nl2br($resp7);
					$resp7 = stripslashes($resp7);
					//
					$resp8 = htmlentities($tos[resp8], ENT_QUOTES,'UTF-8');
					$resp8 = nl2br($resp8);
					$resp8 = stripslashes($resp8);
					//
					$resp9 = htmlentities($tos[resp9], ENT_QUOTES,'UTF-8');
					$resp9 = nl2br($resp9);
					$resp9 = stripslashes($resp9);
					//
					$resp10 = htmlentities($tos[resp10], ENT_QUOTES,'UTF-8');
					$resp10 = nl2br($resp10);
					$resp10 = stripslashes($resp10);
					//
					$resp11 = htmlentities($tos[resp11], ENT_QUOTES,'UTF-8');
					$resp11 = nl2br($resp11);
					$resp11 = stripslashes($resp11);
					//
					$resp12 = htmlentities($tos[resp12], ENT_QUOTES,'UTF-8');
					$resp12 = nl2br($resp12);
					$resp12 = stripslashes($resp12);
					//
					$resp13 = htmlentities($tos[resp13], ENT_QUOTES,'UTF-8');
					$resp13 = nl2br($resp13);
					$resp13 = stripslashes($resp13);
					//
					
					echo $errorcert;
					?>
					<div class="alert alert-success">
						<h4 style="float: right;">ID Único: <?php echo $id; ?></h4>
						<h5>Certificación del Perfil - <?php echo $email; ?></h5>
						<p class="contact-input">
						Nombre del Perfil: <?php echo $perfil; ?><br>
						Nombre del Personaje: <?php echo $nombre; ?><br>
						IP al registrarse: <?php echo $ip; ?>
						</p>
						<h5 style="text-align: center;">Preguntas y Respuestas</h5>
						<!-- Pregunta -->
						Cuéntanos un poco de ti. (Nombre, país, edad, intereses, etc)<br>
						<p class="contact-input">
						<?php echo $resp1; ?>
						</p>
						<!-- Pregunta -->
						¿Por qué te gusta el rol? ¿Hace cuánto juegas sa-mp? ¿En qué servidores?<br>
						<p class="contact-input">
						<?php echo $resp2; ?>
						</p>
						<!-- Pregunta -->
						¿Qué expectativas tienes de nuestro servidor? ¿Qué te gustaría que tenga?<br>
						<p class="contact-input">
						<?php echo $resp3; ?>
						</p>
						<!-- Pregunta -->
						Define DeathMatch (DM), Metagaming (MG) y Powergaming (PG) y da un ejemplo de cada uno.<br>
						<p class="contact-input">
						<?php echo $resp4; ?>
						</p>
						<!-- Pregunta -->
						Define Revenge Kill (RK), Character Kill (CK), y Bunny Jump (BJ) y da un ejemplo de cada uno.<br>
						<p class="contact-input">
						<?php echo $resp5; ?>
						</p>
						<!-- Pregunta -->
						Quiero estar AFK ¿Qué tengo que hacer? ¿Cómo se enteran los administradores?<br>
						<p class="contact-input">
						<?php echo $resp6; ?>
						</p>
						<!-- Pregunta -->
						¿Qué es interpretar el entorno?<br>
						<p class="contact-input">
						<?php echo $resp7; ?>
						</p>
						<!-- Pregunta -->
						¿Puedo matar al alcalde o a un lider de una facción legal?<br>
						<p class="contact-input">
						<?php echo $resp8; ?>
						</p>
						<!-- Pregunta -->
						¿Debo rolear las armas pequeñas? ¿Y las grandes?<br>
						<p class="contact-input">
						<?php echo $resp9; ?>
						</p>
						<!-- Pregunta -->
						¿Debo rolear cada golpe que le doy a una persona?<br>
						<p class="contact-input">
						<?php echo $resp10; ?>
						</p>
						<!-- Pregunta -->
						¿Se puede abusar de un error (bug)?<br>
						<p class="contact-input">
						<?php echo $resp11; ?>
						</p>
						<!-- Pregunta -->
						Si necesito un arma IC ¿Qué hago?<br>
						<p class="contact-input">
						<?php echo $resp12; ?>
						</p>
						<!-- Pregunta -->
						¿Puedo conducir como un loco por la ciudad?<br>
						<p class="contact-input">
						<?php echo $resp13; ?>
						</p>
					</div>
					<div class="alert alert-block">
					Esta certificación fue aceptada por el administrador: <?php echo $certificador." en la fecha: ".$mostrarf[2]."/".$mostrarf[1]."/".$mostrarf[0]; ?>
					<br>
					El administrador le dejó el siguiente mensaje al jugador:<br>
					<p class="contact-input">
						<?php echo $msjcert; ?>
					</p>
					</div>
					<?php
				}
				else
				{
				?>
				<div class="alert alert-error">
					<strong>Error 077</strong><br>
					Error de incompatibilidad, contacta a un desarrollador sobre este error informándole los siguentes datos:
					<?php echo "E-MAIL: ".$email;?>
				</div>
				<?php
				}
			}
			else
			{
			?>
			<div class="alert alert-error">
				<strong>¡Aviso!</strong><br>
				La cuenta que intentas observar no existe o todavía no fue certificada.
				<a href="./certificacion?action=aprobadas">Atrás</a>
			</div>
			<?php
			}
		}
		else
		{
		?>
		<div class="alert alert-error">
			<strong>¡Aviso!</strong><br>
			El texto ingresado no es un e-mail.
			<a href="./certificacion?action=aprobadas">Atrás</a>
		</div>
		<?php
		}
	}
	else
	{
	?>
	<div class="alert alert-error">
		<strong>¡Aviso!</strong><br>
		Debes ingresar los datos correspondientes para ver una certificación.
		<a href="./certificacion?action=aprobadas">Atrás</a>
	</div>
	<?php
	}
	?>
	</div>
</div>