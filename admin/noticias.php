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
$notificaciones = $notificaciones[0];
if(mysqli_fetch_row($resultq1))
{
	$notificaciones = mysqli_fetch_row($resultq1);
}
//$total = $total[0];
//$notificaciones = 5;

//print_r ($notificaciones);
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

if(isset($_POST['crearnoticia']))
{
	if((isset($_POST['titulo'])) && !empty($_POST['titulo']) &&
	(isset($_POST['mensaje'])) && !empty ($_POST['mensaje']) &&
	(isset($_POST['direccion'])))
	{
		$titulo = $_POST['titulo'];
		$mensaje = $_POST['mensaje'];
		$direccion = $_POST['direccion'];
		
		//$titulo = htmlentities($titulo, ENT_QUOTES,'UTF-8');
		//$mensaje = htmlentities($mensaje, ENT_QUOTES,'UTF-8');
		
		$titulo = mysqli_real_escape_string($con, $titulo);
		$mensaje = mysqli_real_escape_string($con, $mensaje);
		if(strlen($titulo) < 25 && strlen($mensaje) < 500)
		{
			$fecha = date('Y-m-d');
			$momento = date('Y-m-d H:i');
			
			
			if($direccion === "1")
			{
				//Insertamos la noticia en administración
				$query8 = sprintf("INSERT INTO web_noticias (id, titulo, fecha, creador, texto) VALUES (null, '%s', '%s', '%s', '%s')",
				$titulo, $fecha, $name, $mensaje);
				$resultado8 = mysqli_query($con, $query8);
				
				//Obtenemos la ip
				$ip = getIpReal();
				
				//Insertamos en el log
				$accion = "Crear noticia";
				$zona = "noticias";
				$detalles = "Creó una noticia con el título: \"".$titulo."\" para el servidor.";
				$query8 = sprintf("INSERT INTO logs_admin (id, admin, accion, zona, momento, ip, detalles) VALUES (null, '%s', '%s', '%s', '%s', '%s', '%s')",
				$name, $accion, $zona, $momento, $ip, $detalles);
				$resultado8 = mysqli_query($con, $query8);
				
				$errorcreacion = "Noticia creada correctamente";
				
			}
			else if($direccion === "2")
			{
				$query8 = sprintf("INSERT INTO noticias (id, titulo, fecha, creador, texto) VALUES (null, '%s', '%s', '%s', '%s')",
				$titulo, $fecha, $name, $mensaje);
				$resultado8 = mysqli_query($con, $query8);
				
				//Obtenemos la ip
				$ip = getIpReal();
				
				//Insertamos en el log
				$accion = "Crear noticia";
				$zona = "noticias";
				$detalles = "Creó una noticia con el título: \"".$titulo."\" para la administración.";
				$query8 = sprintf("INSERT INTO logs_admin (id, admin, accion, zona, momento, ip, detalles) VALUES (null, '%s', '%s', '%s', '%s', '%s', '%s')",
				$name, $accion, $zona, $momento, $ip, $detalles);
				$resultado8 = mysqli_query($con, $query8);
				
				$errorcreacion = "Noticia creada correctamente";
			}
		}
		else
		{
			if(strlen($titulo) > 25)
			{
				$errorcreacion = "¡El titulo debe ser más corto!";
			}
			if(strlen($mensaje) > 500)
			{
				$errorcreacion = "El cuerpo de la noticia debe ser más corto";
			}
		}
	}
	else
	{
		$errorcreacion = "¡Debes completar todos los campos!";
	}
}
if(isset($_POST['editarnoticia']))
{
	if((isset($_POST['titulo'])) && !empty($_POST['titulo']) &&
	(isset($_POST['mensaje'])) && !empty ($_POST['mensaje']))
	{
		$direccion = $_GET['zona'];
		$titulo = $_POST['titulo'];
		$mensaje = $_POST['mensaje'];
		$ida = $_POST['id'];
		
		if(strlen($titulo) < 25 && strlen($mensaje) < 500)
		{
			$fecha = date('Y-m-d');
			$momento = date('Y-m-d H:i');
			if($direccion === "serv")
			{
				$query4 = sprintf("SELECT * FROM noticias WHERE id = '%s'",
				$ida);
				$resultado4 = mysqli_query($con, $query4);
				$num2 = mysqli_num_rows($resultado4);
				
				$titulo = mysqli_real_escape_string($con, $titulo);
				$mensaje = mysqli_real_escape_string($con, $mensaje);
				if ($num2)
				{
					$query8 = sprintf("UPDATE noticias SET titulo = '%s', texto = '%s' WHERE id = '%s'",
					$titulo, $mensaje, $ida);
					$resultado8 = mysqli_query($con, $query8);
					
					$ip = getIpReal();
				
					$accion = "Editar noticia";
					$zone = "noticias";
					$detalles = "Editó una noticia con el id ".$ida." del servidor.";
					$query8 = sprintf("INSERT INTO logs_admin (id, admin, accion, zona, momento, ip, detalles) VALUES (null, '%s', '%s', '%s', '%s', '%s', '%s')",
					$name, $accion, $zone, $momento, $ip, $detalles);
					$resultado8 = mysqli_query($con, $query8);
				
					$erroredicion = "Noticia editada correctamente";
				}
				else
				{
					?>
					<div class="contenido">
						<div class="alert alert-error">
						<strong>¡Aviso!</strong><br>
						La noticia que intentas editar no existe.
						</div>
					</div>
					<?php
				}
			}
			if($direccion === "admin")
			{
				$query4 = sprintf("SELECT * FROM web_noticias WHERE id = '%s'",
				$ida);
				$resultado4 = mysqli_query($con, $query4);
				$num2 = mysqli_num_rows($resultado4);
				
				$titulo = mysqli_real_escape_string($con, $titulo);
				$mensaje = mysqli_real_escape_string($con, $mensaje);
				if ($num2)
				{
					$query8 = sprintf("UPDATE web_noticias SET titulo = '%s', texto = '%s' WHERE id = '%s'",
					$titulo, $mensaje, $ida);
					$resultado8 = mysqli_query($con, $query8);
					
					$ip = getIpReal();
				
					$accion = "Editar noticia";
					$zone = "noticias";
					$detalles = "Editó una noticia con el id ".$ida." de la administración.";
					$query8 = sprintf("INSERT INTO logs_admin (id, admin, accion, zona, momento, ip, detalles) VALUES (null, '%s', '%s', '%s', '%s', '%s', '%s')",
					$name, $accion, $zone, $momento, $ip, $detalles);
					$resultado8 = mysqli_query($con, $query8);
				
					$erroredicion = "Noticia editada correctamente";
				}
				else
				{
					?>
					<div class="contenido">
						<div class="alert alert-error">
						<strong>¡Aviso!</strong><br>
						La noticia que intentas editar no existe.
						</div>
					</div>
					<?php
				}
			}
			
		}
		else
		{
			if(strlen($titulo) > 25)
			{
				$erroredicion = "¡El titulo debe ser más corto!";
			}
			if(strlen($mensaje) > 500)
			{
				$erroredicion = "El cuerpo de la noticia debe ser más corto";
			}
		}
	}
	else
	{
		$erroredicion = "¡Los campos deben estar completos!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Noticias | GranRol</title>
	<link id="css" rel="stylesheet" type="text/css" href="./css/admin3.css" />
	<link id="css2" rel="stylesheet" type="text/css" href="./css/menu.css" />
</head>
<body>
<?php
//Box 1 y 2
include('./boxs.php');
?>
<div id="box3">
	<?php
		if($rango == 3 || $rango == 4)
		{
			if($action === "administrar")
			{
			?>
			<ul class="ulh">
				<li class="lih"><a href="javascript:void(0);" class="active">Administrar</a></li>
				<li class="lih"><a href="./noticias?action=crear">Crear Noticias</a></li>
				<li class="lih"><a href="./noticias?action=log">Log</a></li>
			</ul>
			<?php
			}
			else if($action === "crear")
			{
			?>
			<ul class="ulh">
				<li class="lih"><a href="./noticias?action=administrar">Administrar</a></li>
				<li class="lih"><a href="javascript:void(0);" class="active">Crear Noticias</a></li>
				<li class="lih"><a href="./noticias?action=log">Log</a></li>
			</ul>
			<?php
			}
			else if($action === "log")
			{
			?>
			<ul class="ulh">
				<li class="lih"><a href="./noticias?action=administrar">Administrar</a></li>
				<li class="lih"><a href="./noticias?action=crear">Crear Noticias</a></li>
				<li class="lih"><a href="javascript:void(0);" class="active">Log</a></li>
			</ul>
			<?php
			}
			else
			{
			?>
			<ul class="ulh">
				<li class="lih"><a href="./noticias?action=administrar">Administrar</a></li>
				<li class="lih"><a href="./noticias?action=crear">Crear Noticias</a></li>
				<li class="lih"><a href="./noticias?action=log">Log</a></li>
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
	if($rango == 1 or $rango == 2)
	
	{
		if(!isset($_GET['action']))
		{
		?>
			<h3 class="msj">Noticias del Servidor</h3>
			<?php
			$i = 0;
			$sel = "SELECT * FROM noticias ORDER BY id DESC LIMIT 0,10";
			$que = mysqli_query($con, $sel);
			$num = mysqli_num_rows($que);

			if ($num)
			{
				while ($i < $num and $tos = mysqli_fetch_assoc($que))
				{
					$titulo = htmlentities($tos[titulo], ENT_QUOTES,'UTF-8');
					//$texto = htmlentities($tos[texto], ENT_QUOTES,'UTF-8');
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
			<h3 class="msj">Noticias de la Administración</h3>
			<?php
			$i = 0; 
			$sel = "SELECT * FROM web_noticias ORDER BY id DESC LIMIT 0,10"; 
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
					
					echo "<div class='alert alert-block'>";
					echo "<h4 class='alert-heading'>$titulo - $creador - $fecha</h4><br>";
					echo $texto;
					echo "</div>";

				}
			}
			else
			{
				echo "<i>Actualmente no hay noticias.</i>";
			}
		}
	}
	//Recuerda, entendías muy bien este código cuando lo creaste.
	else if($rango == 3 or $rango == 4 and !(isset($_GET['action'])))
	{
	?>
		<h3 class="msj">Noticias del Servidor</h3>
		<?php
		$i = 0; 
		$sel = "SELECT * FROM noticias ORDER BY id DESC LIMIT 0,10"; 
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
				
				echo "<div class='alert alert-block'>";
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
		<h3 class="msj">Noticias de la Administración</h3>
	<?php
		$i = 0; 
		$sel = "SELECT * FROM web_noticias ORDER BY id DESC LIMIT 0,10"; 
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
				
				echo "<div class='alert alert-block'>";
				echo "<h4 class='alert-heading'>$titulo - $creador - $fecha</h4><br>";
				echo $texto;
				echo "</div>";

			}
		}
		else
		{
			echo "<i>Actualmente no hay noticias.</i>";
		}
	}
	
	if(isset($action))
	{
		if($action === "administrar" or $action === "crear" or $action === "eliminar" or $action === "editar" or $action === "log")
		{
			if($rango == 3 or $rango == 4)
			{
				if($action === "administrar")
				{
					?>
						<h3 class="msj">Administrar Noticias</h3>
						<h2>Servidor</h2>
						<?php
						$i = 0; 
						$sel = "SELECT * FROM noticias ORDER BY id DESC LIMIT 0,10"; 
						$que = mysqli_query($con, $sel); 
						$num = mysqli_num_rows($que);

						if ($num)
						{ 
							while ($i < $num and $tos = mysqli_fetch_assoc($que))
							{
								$titulo = htmlentities($tos[titulo], ENT_QUOTES,'UTF-8');
								$texto = htmlentities($tos[texto], ENT_QUOTES,'UTF-8');
								$id = htmlentities($tos[id], ENT_QUOTES,'UTF-8');
								$texto = nl2br($texto);
								$texto = stripslashes($texto);
								
								echo "<div class='alert alert-block'>";
								echo "<a href='?action=eliminar&delete=$id&zona=serv' class='close' data-dismiss='alert'>×</a>";
								echo "<h4 class='alert-heading'>$titulo</h4>";
								echo $texto;
								echo "<a href='?action=editar&editar=$id&zona=serv' class='botonc' id='unica'>Editar</a>";
								echo "</div>";

							}
						}
						else
						{
							echo "<i>Actualmente no hay noticias.</i>";
						}
						?>
						<h2>Administración</h2>
						<?php
						$i = 0; 
						$sel = "SELECT * FROM web_noticias ORDER BY id DESC LIMIT 0,10"; 
						$que = mysqli_query($con, $sel); 
						$num = mysqli_num_rows($que);

						if ($num)
						{ 
							while ($i < $num and $tos = mysqli_fetch_assoc($que))
							{
								$titulo = htmlentities($tos[titulo], ENT_QUOTES,'UTF-8');
								$texto = htmlentities($tos[texto], ENT_QUOTES,'UTF-8');
								$id = htmlentities($tos[id], ENT_QUOTES,'UTF-8');
								$texto = nl2br($texto);
								$texto = stripslashes($texto);
								
								echo "<div class='alert alert-success'>";
								echo "<a href='?action=eliminar&delete=$id&zona=admin' class='close' data-dismiss='alert'>×</a>";
								echo "<h4 class='alert-heading'>$titulo</h4>";
								echo $texto;
								echo "<a href='?action=editar&editar=$id&zona=admin' class='botonc' id='unica'>Editar</a>";
								echo "</div>";
							}
						}
						else
						{
							echo "<i>Actualmente no hay noticias.</i>";
						}
						
				}
				else if($action === "crear")
				{
					?>
						<h3 class="msj">Crear Noticias</h3>
						<?php if(isset($errorcreacion)) { echo $errorcreacion; } ?>
						<form action="" method="post" id="form1" name="form1" accept-charset="utf-8" class="crear">
						Escribe el título de la noticia.<br>
						<p class="contact-input">
							<input class="textareacr" type="text" name="titulo" placeholder="Tu título..."/>
						</p>
						
						Selecciona la sección.<br>
						<p class="contact-input">
							<label for="select" class="select">
								<select name="direccion" id="select">
									<option value="1">Noticias de la Administración</option>
									<option value="2">Noticias del Servidor</option>
								</select>
							</label>
						</p>
						Escribe la noticia. Recuerda ser lo más simple y preciso posible.<br>
						<p class="contact-input">
							<textarea name="mensaje" placeholder="Redacta la noticia" class="textareacr"></textarea>
						</p>
						<input name="crearnoticia" type="submit" class="botonc" value="Crear">
						</form>
					<?php
				}
				else if($action === "eliminar")
				{
					$idaeliminar = $_GET['delete'];
					$zona = $_GET['zona'];
					if(isset($idaeliminar) and isset($zona))
					{
						$patron = "/^[[:digit:]]+$/";
						$patron2 = "/^[[:lower:]]+$/";
						if(preg_match($patron, $idaeliminar) and preg_match($patron2, $zona))
						{
							if($zona === "serv" or $zona === "admin")
							{
								if($zona === "serv")
								{
									$query10 = sprintf("SELECT id FROM noticias WHERE id = '%s'",
									$idaeliminar);
									$resultado10 = mysqli_query($con, $query10);
									$num = mysqli_num_rows($resultado10);
									if($num)
									{
										$query7 = sprintf("DELETE FROM noticias WHERE id = '%s'",
										$idaeliminar);
										$resultado7 = mysqli_query($con, $query7);
										
										$accion = "Eliminar una noticia";
										$zone = "noticias";
										$momento = date('Y-m-d H:i');
										$ip = getIpReal();
										$detalles = "Eliminó la noticia que poseía el id ".$idaeliminar." en el servidor.";
										
										$query8 = sprintf("INSERT INTO logs_admin (id, admin, accion, zona, momento, ip, detalles) VALUES (null, '%s', '%s', '%s', '%s', '%s', '%s')",
										$name, $accion, $zone, $momento, $ip, $detalles);
										$resultado8 = mysqli_query($con, $query8);
										
										?>
											<div class="alert">
											<strong>¡Aviso!</strong><br>
											La noticia parece haberse borrado correctamente.<br>
											<a href="./noticias?action=administrar">Atrás</a>
											</div>
										<?php
									}
									else
									{
										?>
											<div class="alert">
											<strong>¡Aviso!</strong><br>
											La noticia que intentas editar no existe.<br>
											<a href="./noticias?action=administrar">Atrás</a>
											</div>
										<?php
									}
								}
								else if($zona === "admin")
								{
									$query10 = sprintf("SELECT id FROM web_noticias WHERE id = '%s'",
									$idaeliminar);
									$resultado10 = mysqli_query($con, $query10);
									$num = mysqli_num_rows($resultado10);
									if($num)
									{
										$query6 = sprintf("DELETE FROM web_noticias WHERE id = '%s'",
										$idaeliminar);
										$resultado6 = mysqli_query($con, $query6);
										
										$accion = "Eliminar una noticia";
										$zone = "noticias";
										$momento = date('Y-m-d H:i');
										$ip = getIpReal();
										$detalles = "Eliminó la noticia que poseía el id ".$idaeliminar." en el servidor.";
										
										$query8 = sprintf("INSERT INTO logs_admin (id, admin, accion, zona, momento, ip, detalles) VALUES (null, '%s', '%s', '%s', '%s', '%s', '%s')",
										$name, $accion, $zone, $momento, $ip, $detalles);
										$resultado8 = mysqli_query($con, $query8);
										
										?>
											<div class="alert">
											<strong>¡Aviso!</strong><br>
											La noticia parece haberse borrado correctamente.<br>
											<a href="./noticias?action=administrar">Atrás</a>
											</div>
										<?php
									}
									else
									{
										?>
											<div class="alert">
											<strong>¡Aviso!</strong><br>
											La noticia que intentas editar no existe.<br>
											<a href="./noticias?action=administrar">Atrás</a>
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
				else if($action === "editar")
				{
					$idaeditar = $_GET['editar'];
					$zona = $_GET['zona'];
					if(isset($idaeditar) and isset($zona))
					{
						$patron = "/^[[:digit:]]+$/";
						$patron2 = "/^[[:lower:]]+$/";
						if(preg_match($patron, $idaeditar) and preg_match($patron2, $zona))
						{
							if($zona === "serv" or $zona === "admin")
							{
								if($zona === "serv")
								{
									$query5 = sprintf("SELECT * FROM noticias WHERE id = '%s'",
									$idaeditar);
									$resultado5 = mysqli_query($con, $query5);
									$num = mysqli_num_rows($resultado5);

									if ($num)
									{ 
										$tos = mysqli_fetch_assoc($resultado5);
										$titulo = htmlentities($tos[titulo], ENT_QUOTES,'UTF-8');
										$texto = htmlentities($tos[texto], ENT_QUOTES,'UTF-8');
										$texto = stripslashes($texto);
										$id = htmlentities($tos[id], ENT_QUOTES,'UTF-8');
										//$texto = nl2br($texto);
										
										
										echo "<div class='contenido'>";
										echo "<h3 class='msj'>Editar Noticia</h3>";
										if(isset($erroredicion)) { echo $erroredicion; }
										echo "<form action='' method='post' id='form2' name='form2' accept-charset='utf-8' class='crear'>";
										echo "Escribe el titulo de la noticia <br>";
										echo "<p class='contact-input'>";
										echo "<input class='textareacr' type='text' name='titulo' value='$titulo'/>";
										echo "</p>";
										echo "Re-escribe la noticia.<br>";
										echo "<p class='contact-input'>";
										echo "<textarea name='mensaje' class='textareacr'>$texto</textarea>";
										echo "</p>";
										echo "<input name='id' type='hidden' value='$id' />";
										echo "<input name='editarnoticia' type='submit' class='botonc' value='Editar'>";
										echo "</div>";
										
									}
									else
									{
										?>
											<div class="alert alert-error">
											<strong>¡Aviso!</strong><br>
											La noticia que intentas editar no existe.
											</div>
										<?php
									}
								}
								else if($zona === "admin")
								{
									$query5 = sprintf("SELECT * FROM web_noticias WHERE id = '%s'",
									$idaeditar);
									$resultado5 = mysqli_query($con, $query5);
									$num = mysqli_num_rows($resultado5);

									if ($num)
									{ 
										$tos = mysqli_fetch_assoc($resultado5);
										$titulo = htmlentities($tos[titulo], ENT_QUOTES,'UTF-8');
										$texto = htmlentities($tos[texto], ENT_QUOTES,'UTF-8');
										$texto = stripslashes($texto);
										$id = htmlentities($tos[id], ENT_QUOTES,'UTF-8');
										//$texto = nl2br($texto);
										
										
										echo "<div class='contenido'>";
										echo "<h3 class='msj'>Editar Noticia</h3>";
										if(isset($erroredicion)) { echo $erroredicion; }
										echo "<form action='' method='post' id='form2' name='form2' accept-charset='utf-8' class='crear'>";
										echo "Escribe el titulo de la noticia <br>";
										echo "<p class='contact-input'>";
										echo "<input class='textareacr' type='text' name='titulo' value='$titulo'/>";
										echo "</p>";
										echo "Re-escribe la noticia.<br>";
										echo "<p class='contact-input'>";
										echo "<textarea name='mensaje' class='textareacr'>$texto</textarea>";
										echo "</p>";
										echo "<input name='id' type='hidden' value='$id' />";
										echo "<input name='editarnoticia' type='submit' class='botonc' value='Editar'>";
										echo "</div>";
										
									}
									else
									{
										?>
											<div class="alert alert-error">
											<strong>¡Aviso!</strong><br>
											La noticia que intentas editar no existe.
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
					// $i = 0;
					$sel = "SELECT * FROM logs_admin WHERE zona = 'noticias' ORDER BY id DESC LIMIT 0,30";
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
					<strong>¡Aviso!</strong> Acceso denegado.
					</div>
				<?php
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
</body>
</html>