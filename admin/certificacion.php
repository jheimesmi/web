<?php
session_start();
if (!isset($_SESSION['admin']) and !isset($_SESSION['rango']) and !$_SESSION['auth1'] == 'Trr44NvG3r1t0' and !$_SESSION['auth2'] == 'WhS9k6s0TbE3d1v13434azE' and !$_SESSION['auth3'] == md5($_SESSION['admin']))
{
	header('Location: ./');
}
include('./../includes/db.php');
$rango = $_SESSION['rango'];
$name = $_SESSION['admin'];
$name = mysqli_real_escape_string($con, $name);

$query1 = sprintf("SELECT count(*) FROM web_admin_job WHERE para = '%s'",
$name);
$resultq1 = mysqli_query($con, $query1);
$notificaciones = mysqli_fetch_row($resultq1);
// por algo está
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

if(isset($_GET['action']))
{
	if(preg_match('/[a-z]/',$_GET['action']))
	{
		$action = $_GET['action'];
		$action = htmlentities($action, ENT_QUOTES,'UTF-8');
	}
	else
	{
		session_destroy();
		header('Location: ./');
	}
}

if(isset($_POST['desaprobar']))
{
	if((isset($_POST['mensajeuser'])) && !empty($_POST['mensajeuser']) &&
	(isset($_POST['suspende'])) && !empty ($_POST['suspende']))
	{
		$mensaje = $_POST['mensajeuser'];
		$suspende = $_POST['suspende'];
		$diass = $_POST['direccion'];
		$id = $_POST['id'];
		$emaila = $_POST['email'];
		
		$query5 = sprintf("SELECT id FROM web_cert WHERE id = '%s' AND activa = '1'",
		$id);
		$resultado5 = mysqli_query($con, $query5);
		$num = mysqli_num_rows($resultado5);

		if ($num)
		{
			$query1 = sprintf("UPDATE players SET certificacion = 6 WHERE email = '%s'",$emaila);
			mysqli_query($con, $query1) or die (mysqli_error($con));;
			$query2 = sprintf("UPDATE web_perfiles SET certificacion = 6 WHERE email = '%s'",$emaila);
			mysqli_query($con, $query2) or die (mysqli_error($con));
			
			$emaila = mysqli_real_escape_string($con, $emaila);
			$mensaje = mysqli_real_escape_string($con, $mensaje);
			
			$fecha = date('Y-m-d');
			
			$query3 = sprintf("UPDATE web_cert SET activa = 3, fecha = '%s', certificador = '%s', mensaje = '%s' WHERE id = '%s' AND email = '%s'",
			$fecha, $name, $mensaje, $id, $emaila);
			mysqli_query($con, $query3) or die (mysqli_error($con));
			
			$accion = "Certificó";
			$zone = "certificaciones";
			$momento = date('Y-m-d H:i');
			$ip = getIpReal();
			$detalles = "Rechazó la certificación de ".$emaila;
			
			$query8 = sprintf("INSERT INTO logs_admin (id, admin, accion, zona, momento, ip, detalles) VALUES (null, '%s', '%s', '%s', '%s', '%s', '%s')",
			$name, $accion, $zone, $momento, $ip, $detalles);
			$resultado8 = mysqli_query($con, $query8);
										
			
			
			if($suspende == 1)
			{
				//$momento = date('Y-m-d H:i');
				switch($diass)
				{
					case 1:
						$finsus = strtotime ('+1 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 2:
						$finsus = strtotime ('+2 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 3:
						$finsus = strtotime ('+3 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 4:
						$finsus = strtotime ('+4 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 5:
						$finsus = strtotime ('+5 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 6:
						$finsus = strtotime ('+6 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 7:
						$finsus = strtotime ('+7 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 8:
						$finsus = strtotime ('+8 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 9:
						$finsus = strtotime ('+9 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					default:
						$finsus = "Error";
				}
				$query4 = sprintf("UPDATE web_cert SET suspende = 1, finsus = '%s' WHERE id = '%s' AND email = '%s'",
				$finsus, $id, $emaila);
				mysqli_query($con, $query4);
			}
			$nohayerror = true;
		}
		else
		{
			$errorcert = "Parece que ya han certificado esta cuenta";
		}
		
	}
	else
	{
		$errorcert = "Debes completar todos los campos requeridos";
	}	
}
if(isset($_POST['aprobar']))
{
	if((isset($_POST['mensajeuser'])) && !empty($_POST['mensajeuser']))
	{
		$mensaje = $_POST['mensajeuser'];
		$id = $_POST['id'];
		$emaila = $_POST['email'];
		
		$query5 = sprintf("SELECT id FROM web_cert WHERE id = '%s' AND activa = '1'",
		$id);
		$resultado5 = mysqli_query($con, $query5);
		$num = mysqli_num_rows($resultado5);

		if ($num)
		{
			$query1 = sprintf("UPDATE players SET certificacion = 5 WHERE email = '%s'",$emaila);
			mysqli_query($con, $query1) or die (mysqli_error($con));;
			$query2 = sprintf("UPDATE web_perfiles SET certificacion = 5 WHERE email = '%s'",$emaila);
			mysqli_query($con, $query2) or die (mysqli_error($con));
			
			$emaila = mysqli_real_escape_string($con, $emaila);
			$mensaje = mysqli_real_escape_string($con, $mensaje);
			
			$fecha = date('Y-m-d');
			
			$query3 = sprintf("UPDATE web_cert SET activa = 0, fecha = '%s', certificador = '%s', mensaje = '%s' WHERE id = '%s' AND email = '%s'",
			$fecha, $name, $mensaje, $id, $emaila);
			mysqli_query($con, $query3) or die (mysqli_error($con));
			
			$accion = "Certificó";
			$zone = "certificaciones";
			$momento = date('Y-m-d H:i');
			$ip = getIpReal();
			$detalles = "Aceptó la certificación de ".$emaila;
			
			$query8 = sprintf("INSERT INTO logs_admin (id, admin, accion, zona, momento, ip, detalles) VALUES (null, '%s', '%s', '%s', '%s', '%s', '%s')",
			$name, $accion, $zone, $momento, $ip, $detalles);
			$resultado8 = mysqli_query($con, $query8);
			
			$nohayerror = true;
		}
		else
		{
			$errorcert = "Parece que ya han certificado esta cuenta";
		}
		
	}
	else
	{
		$errorcert = "Debes completar todos los campos requeridos";
	}	
}


//RE CERTIFICACIONES

if(isset($_POST['redesaprobar']))
{
	if((isset($_POST['mensajeuser'])) && !empty($_POST['mensajeuser']) &&
	(isset($_POST['suspende'])) && !empty ($_POST['suspende']))
	{
		$mensaje = $_POST['mensajeuser'];
		$suspende = $_POST['suspende'];
		$diass = $_POST['direccion'];
		$id = $_POST['id'];
		$emaila = $_POST['email'];
		
		$query5 = sprintf("SELECT id FROM web_cert2 WHERE id = '%s' AND activa = '1'",
		$id);
		$resultado5 = mysqli_query($con, $query5);
		$num = mysqli_num_rows($resultado5);

		if ($num)
		{
			$query1 = sprintf("UPDATE players SET certificacion = 8 WHERE email = '%s'",$emaila);
			mysqli_query($con, $query1) or die (mysqli_error($con));;
			$query2 = sprintf("UPDATE web_perfiles SET certificacion = 8 WHERE email = '%s'",$emaila);
			mysqli_query($con, $query2) or die (mysqli_error($con));
			
			$emaila = mysqli_real_escape_string($con, $emaila);
			$mensaje = mysqli_real_escape_string($con, $mensaje);
			
			$fecha = date('Y-m-d');
			
			$query3 = sprintf("UPDATE web_cert2 SET activa = 3, fecha = '%s', certificador = '%s', mensaje = '%s' WHERE id = '%s' AND email = '%s'",
			$fecha, $name, $mensaje, $id, $emaila);
			mysqli_query($con, $query3) or die (mysqli_error($con));
			
			$accion = "Re-Certificó";
			$zone = "certificaciones";
			$momento = date('Y-m-d H:i');
			$ip = getIpReal();
			$detalles = "Rechazó la constancia de certificación de ".$emaila;
			
			$query8 = sprintf("INSERT INTO logs_admin (id, admin, accion, zona, momento, ip, detalles) VALUES (null, '%s', '%s', '%s', '%s', '%s', '%s')",
			$name, $accion, $zone, $momento, $ip, $detalles);
			$resultado8 = mysqli_query($con, $query8);
		
			
			
			if($suspende == 1)
			{
				//$momento = date('Y-m-d H:i');
				switch($diass)
				{
					case 1:
						$finsus = strtotime ('+1 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 2:
						$finsus = strtotime ('+2 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 3:
						$finsus = strtotime ('+3 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 4:
						$finsus = strtotime ('+4 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 5:
						$finsus = strtotime ('+5 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 6:
						$finsus = strtotime ('+6 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 7:
						$finsus = strtotime ('+7 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 8:
						$finsus = strtotime ('+8 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					case 9:
						$finsus = strtotime ('+9 day',strtotime($momento));
						$finsus = date ('Y-m-j H:i',$finsus);
						break;
					default:
						$finsus = "Error";
				}
				$query4 = sprintf("UPDATE web_cert2 SET suspende = 1, finsus = '%s' WHERE id = '%s' AND email = '%s'",
				$finsus, $id, $emaila);
				mysqli_query($con, $query4);
			}
			$nohayerror = true;
		}
		else
		{
			$errorcert = "Parece que ya han certificado esta cuenta";
		}
		
	}
	else
	{
		$errorcert = "Debes completar todos los campos requeridos";
	}	
}
if(isset($_POST['reaprobar']))
{
	if((isset($_POST['mensajeuser'])) && !empty($_POST['mensajeuser']))
	{
		$mensaje = $_POST['mensajeuser'];
		$id = $_POST['id'];
		$emaila = $_POST['email'];
		
		$query5 = sprintf("SELECT id FROM web_cert2 WHERE id = '%s' AND activa = '1'",
		$id);
		$resultado5 = mysqli_query($con, $query5);
		$num = mysqli_num_rows($resultado5);

		if ($num)
		{
			$query1 = sprintf("UPDATE players SET certificacion = 7 WHERE email = '%s'",$emaila);
			mysqli_query($con, $query1) or die (mysqli_error($con));;
			$query2 = sprintf("UPDATE web_perfiles SET certificacion = 7 WHERE email = '%s'",$emaila);
			mysqli_query($con, $query2) or die (mysqli_error($con));
			
			$emaila = mysqli_real_escape_string($con, $emaila);
			$mensaje = mysqli_real_escape_string($con, $mensaje);
			
			$fecha = date('Y-m-d');
			
			$query3 = sprintf("UPDATE web_cert2 SET activa = 0, fecha = '%s', certificador = '%s', mensaje = '%s' WHERE id = '%s' AND email = '%s'",
			$fecha, $name, $mensaje, $id, $emaila);
			mysqli_query($query3) or die (mysqli_error($con));
			
			$accion = "Re-Certificó";
			$zone = "certificaciones";
			$momento = date('Y-m-d H:i');
			$ip = getIpReal();
			$detalles = "Aceptó la constancia de certificación de ".$emaila;
			
			$query8 = sprintf("INSERT INTO logs_admin (id, admin, accion, zona, momento, ip, detalles) VALUES (null, '%s', '%s', '%s', '%s', '%s', '%s')",
			$name, $accion, $zone, $momento, $ip, $detalles);
			$resultado8 = mysqli_query($con, $query8);
			
			$nohayerror = true;
		}
		else
		{
			$errorcert = "Parece que ya han certificado esta cuenta";
		}
		
	}
	else
	{
		$errorcert = "Debes completar todos los campos requeridos";
	}	
}

/*if(isset($_POST['buscar']))
{
	$action = $_POST['action'];
	$turro = $_POST['email'];
	//echo "Procesando";
	header('Location: ?action=ver&id=$email');
	$action = $_POST['action'];
	$turro = $_POST['email'];
	
}*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Certificación | GranRol</title>
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/admin.js" type="text/javascript"></script>
	<link id="css" rel="stylesheet" type="text/css" href="./css/admin3.css" />
	<link id="css2" rel="stylesheet" type="text/css" href="./css/menu.css" />
	<script>
	$(document).on("ready", function()
	{
		$(".search").keyup( function()
		{
			var correo = $(this).val();
			//var funbuscar = 'email='+ correo;
			if(correo != '')
			{
				$.ajax({
					type: "POST",
					url: "./include/buscar.php",
					data: 
					{
						email: correo,
						supervar: true
					},
					cache: false,
					success: function(html)
					{
					$("#resultados").html(html).fadeIn();
					}
				});
			}
			if(correo == '')
			{
				$("#resultados").fadeOut();
			}
			//return false;
		});
	});
	</script>
</head>
<body>
<?php
//Box 1 y 2
include('./boxs.php');
?>
<div id="box3">
		<?php
		if ($rango == 2)
		{
			if($action === "aprobadas")
			{
			?>
			<ul class="ulh">
				<li class="lih"><a href="./certificacion?action=aprobadas" class="active">Aprobadas</a></li>
				<li class="lih"><a href="./certificacion?action=pendientes">Pendientes</a></li>
			</ul>
			<?php
			}
			else if($action === "pendientes")
			{
			?>
			<ul class="ulh">
				<li class="lih"><a href="./certificacion?action=aprobadas">Aprobadas</a></li>
				<li class="lih"><a href="./certificacion?action=pendientes" class="active">Pendientes</a></li>
			</ul>
			<?php
			}
			else
			{
			?>
			<ul class="ulh">
				<li class="lih"><a href="./certificacion?action=aprobadas">Aprobadas</a></li>
				<li class="lih"><a href="./certificacion?action=pendientes">Pendientes</a></li>
			</ul>
			<?php
			}
		}
		if($rango == 3 || $rango == 4)
		{
			if($action === "aprobadas")
			{
			?>
			<ul class="ulh">
				<li class="lih"><a href="./certificacion?action=aprobadas" class="active">Aprobadas</a></li>
				<li class="lih"><a href="./certificacion?action=pendientes">Pendientes</a></li>
				<li class="lih"><a href="./certificacion?action=constancias">Constancias</a></li>
				<li class="lih"><a href="./certificacion?action=log">Log</a></li>
			</ul>
			<?php
			}
			else if($action === "pendientes")
			{
			?>
			<ul class="ulh">
				<li class="lih"><a href="./certificacion?action=aprobadas">Aprobadas</a></li>
				<li class="lih"><a href="./certificacion?action=pendientes" class="active">Pendientes</a></li>
				<li class="lih"><a href="./certificacion?action=constancias">Constancias</a></li>
				<li class="lih"><a href="./certificacion?action=log">Log</a></li>
			</ul>
			<?php
			}
			else if($action === "constancias")
			{
			?>
			<ul class="ulh">
				<li class="lih"><a href="./certificacion?action=aprobadas">Aprobadas</a></li>
				<li class="lih"><a href="./certificacion?action=pendientes">Pendientes</a></li>
				<li class="lih"><a href="./certificacion?action=constancias" class="active">Constancias</a></li>
				<li class="lih"><a href="./certificacion?action=log">Log</a></li>
			</ul>
			<?php
			}
			else if($action === "log")
			{
			?>
			<ul class="ulh">
				<li class="lih"><a href="./certificacion?action=aprobadas">Aprobadas</a></li>
				<li class="lih"><a href="./certificacion?action=pendientes">Pendientes</a></li>
				<li class="lih"><a href="./certificacion?action=constancias">Constancias</a></li>
				<li class="lih"><a href="./certificacion?action=log" class="active">Log</a></li>
			</ul>
			<?php
			}
			else
			{
			?>
			<ul class="ulh">
				<li class="lih"><a href="./certificacion?action=aprobadas">Aprobadas</a></li>
				<li class="lih"><a href="./certificacion?action=pendientes">Pendientes</a></li>
				<li class="lih"><a href="./certificacion?action=constancias">Constancias</a></li>
				<li class="lih"><a href="./certificacion?action=log">Log</a></li>
			</ul>
			<?php
			}
		}
	?>
</div>
<?php
include('./menu.php');
?>
<div id="box5">
	<div class="contenido">
	<?php
	if(!(isset($_GET['action'])))
	{
	?>
		<h3 class="msj">Certificaciones</h3>
		<p>Las certificaciones son un pilar fundamental de toda la comunidad. En estas, podemos llegar a una comunidad profesional y con jugadores verdaderamente interesados por el rol. A la hora de certificar una cuenta debemos estar conscientes de que aceptamos a un miembro a la comunidad y que éste puede influir en ella.</p>
		<p>Debemos tener un equilibrio, no podemos ser extremadamente exigentes ni tampoco poco exigentes. Se hace todo lo posible para que la comunidad tenga una buena cantidad de usuarios y que ellos sepan los conceptos del rol. Reiterando el punto anterior, siempre debemos tratar de atraer usuarios para que la comunidad no decaiga. Es un trabajo de todo el equipo administrativo en el cual se debe actuar uniendo ideas y fuerzas. Todos somos uno.</p>
		<p>La comunidad puede decaer por varios motivos, mala administración, inestabilidad, muchos error, malos jugadores etc. En este caso hablaremos de los malos jugadores, aquellos que cuando certifican los aprobamos nosotros................ A TERMINAR</p>
	<?php
	}
	if(isset($action))
	{
		if($action === "aprobadas" or $action === "pendientes" or $action === "constancias" or $action === "log" or $action === "certificar" or $action === "recertificar" or $action === "ver")
		{
			if($action === "aprobadas")
			{
				$sel = "SELECT id, email FROM web_cert WHERE activa = '0' ORDER BY id DESC LIMIT 0,30";
				$que = mysqli_query($con, $sel);
				$num = mysqli_num_rows($que);
				if($num)
				{
					//$row = mysql_fetch_assoc($que); NO TERMINADO
					?>
					<br>
					<div id="buscador">
						<input class="search" id="email" type="text" size="30" placeholder="Busque ingresando un e-mail" autocomplete="off"/>
						<ul id="resultados">
						</ul>
					</div>
					<br>
					<p style="padding-top: 20px;">A continuación podrás ver las últimas certificaciones que fueron aceptadas.</p>
					<table id="certaceptadas" class="table-light">
					<tr>
						<th style="width:30%;">ID Cert.</th>
						<th style="width:40%;">E-mail</th>
						<th>Certificar</th>		
					</tr>
					<?php
					while ($i < $num and $row = mysqli_fetch_assoc($que))
					{
						$id = htmlentities($row[id], ENT_QUOTES,'UTF-8');
						$email = htmlentities($row[email], ENT_QUOTES,'UTF-8');
						echo "<tr>";
						echo "<td>$id</td>";
						echo "<td>$email</td>";
						echo "<td><a href='./vercertificacion?id=$id'>Ver esta certificación</a></td>";
						echo "</tr>";
						$i++;
					}
					?>
					</table><br>
					<?php
				}
				else
				{
				?>
					<div class="alert alert-success">
					<strong>¡Aviso!</strong>
					No hay certificaciones pendientes. Vuelve en otro momento
					</div>
				<?php
				}
			}
			else if($action === "ver")
			{
				echo $turro;
			}
			else if($action === "pendientes")
			{
				if($rango > 1 and $rango < 5)
				{
					$sel = "SELECT id, email FROM web_cert WHERE activa = '1'";
					$que = mysqli_query($con, $sel);
					$num = mysqli_num_rows($que);
					if($num)
					{
						//$row = mysql_fetch_assoc($que);
						?>
						<br>
						<p>A continuación podrás ver las certificaciones pendientes, es importante corregir las que están al principio ya que estas llevan más tiempo esperando.</p>
						<table id="certpendientes" class="table-light">
						<tr>
							<th style="width:30%;">ID Cert.</th>
							<th style="width:30%;">E-mail</th>
							<th>Certificar</th>		
						</tr>
						<?php
						while ($i < $num and $row = mysqli_fetch_assoc($que))
						{
							$id = htmlentities($row[id], ENT_QUOTES,'UTF-8');
							$email = htmlentities($row[email], ENT_QUOTES,'UTF-8');
							echo "<tr>";
							echo "<td>$id</td>";
							echo "<td>$email</td>";
							echo "<td><a href='./certificacion?action=certificar&id=$id'>Certificar esta cuenta</a></td>";
							echo "</tr>";
							$i++;
						}
						?>
						</table><br>
						<?php
					}
					else
					{
					?>
						<div class="alert alert-success">
						<strong>¡Aviso!</strong>
						No hay certificaciones pendientes. Vuelve en otro momento
						</div>
					<?php
					}
				}
				else
				{
				?>
					<div class="alert alert-error">
					<strong>¡Aviso!</strong> Acceso denegado.
					</div>
				<?php
				}
			}
			else if($action === "certificar")
			{
				$idacertificar = $_GET['id'];
				if(isset($idacertificar))
				{
					$patron = "/^[[:digit:]]+$/";
					if(preg_match($patron, $idacertificar))
					{
						$query5 = sprintf("SELECT * FROM web_cert WHERE id = '%s' AND activa = '1'",
						$idacertificar);
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
									<button class="botont1" id='envio1'>Desaprobar</button>
									<button class="botont1" id='envio2'>Aprobar</button>
								</div>
								<div class="alert alert-error" id="cert-denegada">
								<form action="" method="post" accept-charset="utf-8" id="certden">
								Estás a punto de rechazar esta certificación, por favor completa los siguientes datos.<br>
								Escribe un mensaje para el usuario (Por qué desaprobó, en qué puede mejorar).
								<textarea name='mensajeuser' class="textareacr" style="height: 120px; width: 90%;"></textarea><br>
								¿Se le suspende la certificación hasta un determinado tiempo?<br>
								<input class="input" type="radio" name="suspende" value="1">Sí
								
								<input class="input" type="radio" name="suspende" value="2">No<br>
								(Completar solo si suspende)
								Fin de la suspensión:<br>
								<select name="direccion" id="select">
									<option value="1">En un día</option>
									<option value="2">En dos días</option>
									<option value="3">En tres días</option>
									<option value="4">En cuatro días</option>
									<option value="5">En cinco días</option>
									<option value="6">En seis días</option>
									<option value="7">En siete días</option>
									<option value="8">En ocho días</option>
									<option value="9">En nueve días</option>
								</select>
								<?php
								echo "<input name='id' type='hidden' value='$idacertificar' />";
								echo "<input name='email' type='hidden' value='$email' />";
								?>
								<input style="float: right;" type='submit' name='desaprobar' id='envio' value='Desaprobar'>
								</form>
								</div>
								
								<div class="alert alert-success" id="cert-aceptada">
								<form action="" method="post" accept-charset="utf-8" id="certacep">
								Estás a punto de aceptar esta certificación, por favor completa el siguiente mensaje.<br>
								Escribe un mensaje para el usuario(Felicitaciones, consejos, correcciones, etc.).
								<textarea name='mensajeuser' class="textareacr" style="height: 120px; width: 90%;"></textarea><br>
								<?php
								echo "<input name='id' type='hidden' value='$idacertificar' />";
								echo "<input name='email' type='hidden' value='$email' />";
								?>
								<input style="float: right;" type='submit' name='aprobar' class="botonc" value='Aprobar'>
								<br>
								</form>
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
							if($nohayerror == false)
							{
							?>
							<div class="alert alert-error">
								<strong>¡Aviso!</strong><br>
								La cuenta que intentas certificar no existe o ya fue certificada.
							</div>
							<?php
							}
							else if($nohayerror == true)
							{
							?>
							<div class="alert alert-success">
								<strong>Correcto</strong><br>
								El proceso de certificación de esta cuenta fue hecho correctamente.
								<a href="./certificacion?action=pendientes">Atrás</a>
							</div>
							<?php
							}
						}
					}
					else
					{
					?>
						<div class="alert alert-error">
						<strong>¡Aviso!</strong><br>
						Ocurrió un error, faltan datos. Posiblemente hayas intentado manipular los datos. Vuelve a atrás y haz la acción que deseas hacer por medio del panel. <br>
						Si crees que se trata de un error, contacta al Desarrollador.
						</div>
					<?php
					}
				}
				else
				{
				?>
					<div class="alert alert-error">
					<strong>¡Aviso!</strong><br>
					Ocurrió un error, faltan datos. Posiblemente hayas intentado manipular los datos. Vuelve a atrás y haz la acción que deseas hacer por medio del panel. <br>
					Si crees que se trata de un error, contacta al Desarrollador.
					</div>
				<?php
				}
			}
			else if($action === "constancias")
			{
				if($rango > 1 and $rango < 5)
				{
					$sel = "SELECT id, email FROM web_cert2 WHERE activa = '1'";
					$que = mysqli_query($con, $sel);
					$num = mysqli_num_rows($que);
					if($num)
					{
						//$row = mysql_fetch_assoc($que);
						?>
						<br>
						<p>A continuación podrás ver las constancias de certificaciones pendientes, es importante corregir las que están al principio ya que estas llevan más tiempo esperando.</p>
						<p>Estas constancias son de aquellos jugadores que posiblemente hayan infringido las normas y que se dude de su capacidad de rolear.</p>
						<table id="certpendientes" class="table-light">
						<tr>
							<th style="width:30%;">ID</th>
							<th style="width:30%;">E-mail</th>
							<th>Certificar</th>		
						</tr>
						<?php
						while ($i < $num and $row = mysqli_fetch_assoc($que))
						{
							$id = htmlentities($row[id], ENT_QUOTES,'UTF-8');
							$email = htmlentities($row[email], ENT_QUOTES,'UTF-8');
							echo "<tr>";
							echo "<td>$id</td>";
							echo "<td>$email</td>";
							echo "<td><a href='./certificacion?action=recertificar&id=$id'>Certificar esta cuenta</a></td>";
							echo "</tr>";
							$i++;
						}
						?>
						</table><br>
						<?php
					}
					else
					{
					?>
						<div class="alert alert-success">
						<strong>¡Aviso!</strong>
						No hay constancias de certificaciones pendientes. Vuelve en otro momento
						</div>
					<?php
					}
				}
			}
			else if($action === "recertificar")
			{
				$idacertificar = $_GET['id'];
				if(isset($idacertificar))
				{
					$patron = "/^[[:digit:]]+$/";
					if(preg_match($patron, $idacertificar))
					{
						$query5 = sprintf("SELECT * FROM web_cert2 WHERE id = '%s' AND activa = '1'",
						$idacertificar);
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
									¿Por qué estás haciendo la certificación de nuevo? ¿Crees que fue justo?<br>
									<p class="contact-input">
									<?php echo $resp1; ?>
									</p>
									<!-- Pregunta -->
									¿Tienes quejas sobre la administración? ¿Cuáles?<br>
									<p class="contact-input">
									<?php echo $resp2; ?>
									</p>
									<!-- Pregunta -->
									¿Propones un cambio de actitud desde tu parte?<br>
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
									Define los comandos de comunicación IC y OOC y cuándo se utilizan (/b, /s, /f, /r, /mp)<br>
									<p class="contact-input">
									<?php echo $resp6; ?>
									</p>
									<!-- Pregunta -->
									¿Qué es interpretar el entorno?<br>
									<p class="contact-input">
									<?php echo $resp7; ?>
									</p>
									<!-- Pregunta -->
									Haz el rol de sacar un arma pequeña<br>
									<p class="contact-input">
									<?php echo $resp8; ?>
									</p>
									<!-- Pregunta -->
									Haz el rol de un asalto a un 24/7<br>
									<p class="contact-input">
									<?php echo $resp9; ?>
									</p>
									<!-- Pregunta -->
									¿Debo rolear cada golpe que le doy a una persona?<br>
									<p class="contact-input">
									<?php echo $resp10; ?>
									</p>
									<!-- Pregunta -->
									¿Se puede negociar por el canal /mp (Mensaje privado)?<br>
									<p class="contact-input">
									<?php echo $resp11; ?>
									</p>
									<!-- Pregunta -->
									¿Puedo insultar por canales IC?<br>
									<p class="contact-input">
									<?php echo $resp12; ?>
									</p>
									<!-- Pregunta -->
									¿Para qué sirve el comando /do? Da un ejemplo<br>
									<p class="contact-input">
									<?php echo $resp13; ?>
									</p>
									<button class="botont1" id='envio3'>Desaprobar</button>
									<button class="botont1" id='envio4'>Aprobar</button>
								</div>
								<div class="alert alert-error" id="cert-denegada">
								<form action="" method="post" accept-charset="utf-8" id="recertden">
								Estás a punto de rechazar esta re-certificación, por favor completa los siguientes datos.<br>
								Escribe un mensaje para el usuario (Por qué desaprobó, en qué puede mejorar).
								<textarea name='mensajeuser' class="textareacr" style="height: 120px; width: 90%;"></textarea><br>
								¿Se le suspende la certificación hasta un determinado tiempo?<br>
								<input class="input" type="radio" name="suspende" value="1">Sí
								
								<input class="input" type="radio" name="suspende" value="2">No<br>
								(Completar solo si suspende)
								Fin de la suspensión:<br>
								<select name="direccion" id="select">
									<option value="1">En un día</option>
									<option value="2">En dos días</option>
									<option value="3">En tres días</option>
									<option value="4">En cuatro días</option>
									<option value="5">En cinco días</option>
									<option value="6">En seis días</option>
									<option value="7">En siete días</option>
									<option value="8">En ocho días</option>
									<option value="9">En nueve días</option>
								</select>
								<?php
								echo "<input name='id' type='hidden' value='$idacertificar' />";
								echo "<input name='email' type='hidden' value='$email' />";
								?>
								<input style="float: right;" type='submit' name='redesaprobar' id='envio' value='Desaprobar'>
								</form>
								</div>
								
								<div class="alert alert-success" id="cert-aceptada">
								<form action="" method="post" accept-charset="utf-8" id="recertacep">
								Estás a punto de aceptar esta re-certificación, por favor completa el siguiente mensaje.<br>
								Escribe un mensaje para el usuario(Felicitaciones, consejos, correcciones, etc.).
								<textarea name='mensajeuser' class="textareacr" style="height: 120px; width: 90%;"></textarea><br>
								<?php
								echo "<input name='id' type='hidden' value='$idacertificar' />";
								echo "<input name='email' type='hidden' value='$email' />";
								?>
								<input style="float: right;" type='submit' name='reaprobar' class="botonc" value='Aprobar'>
								<br>
								</form>
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
							if($nohayerror == false)
							{
							?>
							<div class="alert alert-error">
								<strong>¡Aviso!</strong><br>
								La cuenta que intentas certificar no existe o ya fue certificada.
							</div>
							<?php
							}
							else if($nohayerror == true)
							{
							?>
							<div class="alert alert-success">
								<strong>Correcto</strong><br>
								El proceso de certificación de esta cuenta fue hecho correctamente.
								<a href="./certificacion?action=pendientes">Atrás</a>
							</div>
							<?php
							}
						}
					}
					else
					{
					?>
						<div class="alert alert-error">
						<strong>¡Aviso!</strong><br>
						Ocurrió un error, faltan datos. Posiblemente hayas intentado manipular los datos. Vuelve a atrás y haz la acción que deseas hacer por medio del panel. <br>
						Si crees que se trata de un error, contacta al Desarrollador.
						</div>
					<?php
					}
				}
				else
				{
				?>
					<div class="alert alert-error">
					<strong>¡Aviso!</strong><br>
					Ocurrió un error, faltan datos. Posiblemente hayas intentado manipular los datos. Vuelve a atrás y haz la acción que deseas hacer por medio del panel. <br>
					Si crees que se trata de un error, contacta al Desarrollador.
					</div>
				<?php
				}
			}
			else if($action === "log")
			{
				$sel = "SELECT * FROM logs_admin WHERE zona = 'certificaciones' ORDER BY id DESC LIMIT 0,30";
				$que = mysqli_query($con, $sel);
				$num = mysqli_num_rows($que);

				if ($num)
				{
					?>
					<table class="table-light">
					<tr>
						<th style="width:30%;">Acción</th>
						<th>Administrador</th>
						<th>Momento (A-M-D)</th>
						<th>IP</th>
						<th>Detalles</th>		
					</tr>
					<?php
					while ($i < $num and $tos = mysqli_fetch_assoc($que))
					{
						$accion = htmlentities($tos[accion], ENT_QUOTES,'UTF-8');
						$admin = htmlentities($tos[admin], ENT_QUOTES,'UTF-8');
						$momento= htmlentities($tos[momento], ENT_QUOTES,'UTF-8');
						$ip = htmlentities($tos[ip], ENT_QUOTES,'UTF-8');
						$detalles = htmlentities($tos[detalles], ENT_QUOTES,'UTF-8');
						$detalles = stripslashes($detalles);
						
						echo "<tr>";
						echo "<td>$accion</td>";
						echo "<td>$admin</td>";
						echo "<td>$momento</td>";
						echo "<td>$ip</td>";
						echo "<td>$detalles</td>";
						echo "</tr>";
					}
					?>
					</table><br>
					<?php
				}
				else
				{
					?>
						<div class="alert alert-error">
						<strong>¡Aviso!</strong> No hay datos registrados en el log.
						</div>		
					<?php
				}
			}
		}
		else
		{
		?>
			<div class="alert alert-error">
			<strong>¡Aviso!</strong> Se desconoce la acción que estás intentando llevar a cabo.
			</div>
		<?php
		}
	}
	?>
	</div>
</div>