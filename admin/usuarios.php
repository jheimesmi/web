<?php
// Agregar sistema de clanes tanto al PCU como al GM.
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

$supervar = 1;
global $supervar;

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

$id = $_GET['id'];
$patron = "/^[[:digit:]]+$/";
if(preg_match($patron, $id))
{
	$sel = sprintf("SELECT id, Email FROM players WHERE id = '%s'",
	$id);
	$que = mysqli_query($con, $sel);
	$num = mysqli_num_rows($que);
	if($num)
	{
		$tos = mysqli_fetch_assoc($que);
		$idc = htmlentities($tos[id], ENT_QUOTES,'UTF-8');
		$email = htmlentities($tos[Email], ENT_QUOTES,'UTF-8');
	}
}
else { $id = false; }

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

//Formulario de creación de usuario
if(isset($_POST['crear']))
{
	if((isset($_POST['email'])) && !empty($_POST['email']) &&
	(isset($_POST['nombre'])) && !empty ($_POST['nombre']) &&
	(isset($_POST['edad'])) && !empty ($_POST['edad']) &&
	(isset($_POST['password1'])) && !empty ($_POST['password1']) &&
	(isset($_POST['password2'])) && !empty ($_POST['password2']) &&
	(isset($_POST['sexo'])))
	{
		$emailCrear = $_POST['email'];
		$nombreCrear = $_POST['nombre'];
		$edadCrear = $_POST['edad'];
		$pass1Crear = $_POST['password1'];
		$pass2Crear = $_POST['password2'];
		$sexoCrear = $_POST['sexo'];
		$errorcreacion = "Todo turro";
	}
	else
	{
		$errorcreacion = "Debes llenar todos los campos";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Usuarios | GranRol</title>
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/jquery.numeric.js"></script>
	<script src="./js/usuarios.js" type="text/javascript"></script>
	<link id="css" rel="stylesheet" type="text/css" href="./css/admin3.css" />
	<link id="css2" rel="stylesheet" type="text/css" href="./css/menu.css" />
	<script type="text/javascript">
	$(document).ready(function() 
	{    
		var escrito = false;
		var nombrec = /[A-Z][a-z]+_[A-Z][a-z]{1,3}[A-Z]?[a-z]*/;
		var entero = /^(?:\+|-)?\d+$/;
		$("#editar-a").on("click", function()
		{
			var admin, rango;
			var editara = true;
			// $("#datosdelacuenta").slideUp(function ()
			// {
			//$('#datosdelacuenta').html('<div style="text-align: center;"><img src="./imagenes/load.gif" width="70px" height="70px"/></div>');
			// });
			$.ajax({
				type: "POST",
				url: "include/editar.php",
				cache: false,
				data:
				{
					supervar: true,
					zona: 1,
					id: <?php echo $idc.",";?>
					rango: <?php echo $rango.","; ?>
					admin: <?php echo $name; ?>
				},
				success: function(html)
				{
					$("#datosdelacuenta").slideUp();
					$("#edicion-a").slideDown().html(html);
				}
			});
		});
		$("#edicion-a").on("click", "#cancelar-a", function()
		{
			$("#edicion-a").slideUp( function() {$("#datosdelacuenta").slideDown();} );
			//$("#datosdelacuenta").slideDown();
		});
		$("#edicion-a").on("click", "#guardar-a", function()
		{
			var error = false;
			var numskin = $("#skin").val()
			var nuevoname = $("#nombrec").val()
			var enviarname = false;
			var enviarskin = false;
			var marcado2 = $("#confirmoskin").prop("checked");
			var marcado1 = $("#confirmoname").prop("checked");
			var emaill = <?php echo "'".$email."'";?>;
			var admin, rango;
			var administrador = <?php echo "'".$name."'"; ?>;
			var mensaje = $("#comentarios").val();
			if(marcado1 === true || marcado2 === true)
			{
				if(escrito === true)
				{
					$("#erroredicion").html("");
				}
				if(marcado1 === true)
				{
					if(!nombrec.test($("#nombrec").val()))
					{
						$("#erroredicion").html("<h5 style='text-align: center; color: red;'>Debes enviar un formato de nombre correcto<h5>");
						escrito = true;
						error = true;
						// alert("Los datos no se enviaran");
					}
					else
					{
						enviarname = true;
					}
				}
				if(marcado2 === true)
				{
					if(!entero.test($("#skin").val()))
					{
						$("#erroredicion").html("<h5 style='text-align: center; color: red;'>¡El skin debe ser un número!<h5>");
						escrito = true;
						error = true;
						// alert("Los datos no se enviaran");
					}
					else
					{
						enviarskin = true;
					}
				}
				if(enviarname === true && enviarskin === false && error === false)
				{
					$('#erroredicion').html('<div style="text-align: center;"><img src="./imagenes/load.gif" width="70px" height="70px"/></div>');
					
					$.ajax({
						type: "POST",
						url: "include/editar.php",
						cache: false,
						data:
						{
							supervar: true,
							zona: 111,
							email: emaill,
							mensaje: mensaje,
							nuevoname: nuevoname,
							id: <?php echo $idc.",";?>
							rango: <?php echo $rango.","; ?>
							admin: administrador
						},
						success: function(html)
						{
							$("#edicion-a").slideUp();
							$("#edicion-b").html(html).slideDown();
						}
					});
					//alert("Se actualizará el nombre a " + nuevoname);
				}
				else if(enviarname === false && enviarskin === true && error === false)
				{
					$('#erroredicion').html('<div style="text-align: center;"><img src="./imagenes/load.gif" width="70px" height="70px"/></div>');
					
					$.ajax({
						type: "POST",
						url: "include/editar.php",
						cache: false,
						data:
						{
							supervar: true,
							zona: 112,
							email: emaill,
							mensaje: mensaje,
							skin: numskin,
							id: <?php echo $idc.",";?>
							rango: <?php echo $rango.","; ?>
							admin: administrador
						},
						success: function(html)
						{
							$("#edicion-a").slideUp();
							$("#edicion-b").html(html).slideDown();
						}
					});
				}
				else if(enviarname === true && enviarskin === true && error === false)
				{
					$('#erroredicion').html('<div style="text-align: center;"><img src="./imagenes/load.gif" width="70px" height="70px"/></div>');
					
					$.ajax({
						type: "POST",
						url: "include/editar.php",
						cache: false,
						data:
						{
							supervar: true,
							zona: 113,
							email: emaill,
							mensaje: mensaje,
							nuevoname: nuevoname,
							skin: numskin,
							id: <?php echo $idc.",";?>
							rango: <?php echo $rango.","; ?>
							admin: administrador
						},
						success: function(html)
						{
							$("#edicion-a").slideUp();
							$("#edicion-b").html(html).slideDown();
						}
					});
				}
			}
			else
			{
				$("#erroredicion").html("<h5 style='text-align: center; color: red;'>Debes confirmar las ediciones que deseas realizar.<h5>");
				escrito = true;
			}
		});
		$("#contentlog").on('click', '.paginate a', function(){

			$('#contentlog').html('<div style="text-align: center;"><img src="./imagenes/load.gif" width="70px" height="70px"/></div>');
			//alert("Touch me");
			var page = $(this).attr('data');    
			//$('#paginate').remove;
			//var dataString = 'page='+page;

				$.ajax({
					type: "POST",
					url: "include/logins2.php",
					cache: false,
					data: 
					{
						pagina: page,
						supervar: true,
						idc: <?php echo $idc; ?>
					},
					success: function(data) {
						//$('#contentlog').empty;
						$('#contentlog').html(data);
					}
				});
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
	if($rango == 1 || $rango == 2)
	{
		?>
		<ul class="ulh">
			<li class="lih"><a href="./usuarios" class="active">Ver Usuarios</a></li>
		</ul>
		<?php
	}
	if($rango == 3 || $rango == 4)
	{
		if($action === "crear")
		{
		?>
		<ul class="ulh">
			<li class="lih"><a href="./usuarios">Ver Usuarios</a></li>
			<li class="lih"><a href="./usuarios?action=crear" class="active">Crear Usuario</a></li>
			<li class="lih"><a href="./usuarios?action=log">Log</a></li>
		</ul>
		<?php
		}
		else if($action === "log")
		{
		?>
		<ul class="ulh">
			<li class="lih"><a href="./usuarios">Ver Usuarios</a></li>
			<li class="lih"><a href="./usuarios?action=crear">Crear Usuario</a></li>
			<li class="lih"><a href="./usuarios?action=log" class="active">Log</a></li>
		</ul>
		<?php
		}
		else
		{
		?>
		<ul class="ulh">
			<li class="lih"><a href="./usuarios" class="active">Ver Usuarios</a></li>
			<li class="lih"><a href="./usuarios?action=crear">Crear Usuario</a></li>
			<li class="lih"><a href="./usuarios?action=log">Log</a></li>
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
		if(!$action)
		{
				?>
				<h3 class="msj">Ver Usuarios</h3>
				<div id="buscador">
				<input class="search" id="cuenta" type="text" size="30" autocomplete="off" placeholder="Busque una cuenta"/>
				<ul id="resultados">
				</ul>
				</div>
				<p>Desde aquí podrás ver las cuentas de los usuarios. Es información estadística y que te puede ayudar cuando necesites ayuda.</p>
				<p>Recuerda que esta información es totalmente confidencial y no debes compartirla con personas ajenas a la administración. Este hecho amerita una sanción.</p>
				<?php
				$sel = "SELECT id, nombre, email FROM players ORDER BY id DESC LIMIT 0,30";
				$que = mysqli_query($con, $sel);
				$num = mysqli_num_rows($que);
				if($num)
				{
					?>
					<br>
					<p>Últimas 30 cuentas creadas:</p>
					<table id="certpendientes" class="table-light">
					<tr>
						<th style="width:30%;">ID Cuenta</th>
						<th style="width:30%;">Nombre</th>
						<th style="width:30%;">E-mail</th>
						<th>Ver</th>
					</tr>
					<?php
					while ($i < $num and $row = mysqli_fetch_assoc($que))
					{
						$id = htmlentities($row[id], ENT_QUOTES,'UTF-8');
						$nombre = htmlentities($row[nombre], ENT_QUOTES,'UTF-8');
						$email = htmlentities($row[email], ENT_QUOTES,'UTF-8');
						echo "<tr>";
						echo "<td>$id</td>";
						echo "<td>$nombre</td>";
						//echo "<td>$email</td>";
						echo "<td><a href='./perfiles?action=ver&email=$email'>$email</a></td>";
						echo "<td><a href='./usuarios?action=ver&id=$id'>Ver esta cuenta</a></td>";
						echo "</tr>";
						$i++;
					}
					?>
					</table><br>
					<?php
				}
				else
				{
					echo "<i>Actualmente no hay usuarios.</i>";
				}
		}
		else if($action === "ver")
		{
			if(isset($id))
			{
				$patron = "/^[[:digit:]]+$/";
				if(preg_match($patron, $id))
				{
					$sel = sprintf("SELECT * FROM players WHERE id = '%s' AND 1",
					$id);
					$que = mysqli_query($con, $sel);
					$num = mysqli_num_rows($que);
					if($num)
					{
						$tos = mysqli_fetch_assoc($que);
						//Obtenemos los datos
						$idc = htmlentities($tos[id], ENT_QUOTES,'UTF-8');
						$nombre = htmlentities($tos[Nombre], ENT_QUOTES,'UTF-8');
						$leveladmin = htmlentities($tos[AdminLevel], ENT_QUOTES,'UTF-8');
						$documentacion = htmlentities($tos[Documentacion], ENT_QUOTES,'UTF-8');
						$licencias = htmlentities($tos[Licencias], ENT_QUOTES,'UTF-8');
						$seguro = htmlentities($tos[SeguroMedico], ENT_QUOTES,'UTF-8');
						$telefono = htmlentities($tos[Telefonos], ENT_QUOTES,'UTF-8');
						$respeto = htmlentities($tos[Respeto], ENT_QUOTES,'UTF-8');
						$dinero = htmlentities($tos[Dinero], ENT_QUOTES,'UTF-8');
						$banco = htmlentities($tos[Banco], ENT_QUOTES,'UTF-8');
						$trabajo = htmlentities($tos[Trabajo], ENT_QUOTES,'UTF-8');
						$faccion = htmlentities($tos[Faccion], ENT_QUOTES,'UTF-8');
						$rangos = htmlentities($tos[Rango], ENT_QUOTES,'UTF-8');
						$interior = htmlentities($tos[Interior], ENT_QUOTES,'UTF-8');
						$virtual = htmlentities($tos[VirtualWorld], ENT_QUOTES,'UTF-8');
						$casa = htmlentities($tos[Casa], ENT_QUOTES,'UTF-8');
						$coches = htmlentities($tos[Coches], ENT_QUOTES,'UTF-8');
						$negocio = htmlentities($tos[Negocio], ENT_QUOTES,'UTF-8');
						$x = htmlentities($tos[X], ENT_QUOTES,'UTF-8');
						$y = htmlentities($tos[Y], ENT_QUOTES,'UTF-8');
						$z = htmlentities($tos[Z], ENT_QUOTES,'UTF-8');
						$angulo = htmlentities($tos[Angulo], ENT_QUOTES,'UTF-8');
						$inventario = htmlentities($tos[Iventario], ENT_QUOTES,'UTF-8');
						$armas = htmlentities($tos[Armas], ENT_QUOTES,'UTF-8');
						$ammo = htmlentities($tos[Ammo], ENT_QUOTES,'UTF-8');
						$bloq = htmlentities($tos[Bloqueado], ENT_QUOTES,'UTF-8');
						$adv = htmlentities($tos[Advertencias], ENT_QUOTES,'UTF-8');
						$cert = htmlentities($tos[Certificacion], ENT_QUOTES,'UTF-8');
						$jugando = htmlentities($tos[Jugando], ENT_QUOTES,'UTF-8');
						$skin = htmlentities($tos[Skin], ENT_QUOTES,'UTF-8');
						$sexo = htmlentities($tos[Sexo], ENT_QUOTES,'UTF-8');
						$edad = htmlentities($tos[Edad], ENT_QUOTES,'UTF-8');
						$vida = htmlentities($tos[Vida], ENT_QUOTES,'UTF-8');
						$chaleco = htmlentities($tos[Armor], ENT_QUOTES,'UTF-8');
						$email = htmlentities($tos[Email], ENT_QUOTES,'UTF-8');
						//Yyyy......... empieza el terror
						
						switch($trabajo)
						{
							case 0:
								$trabajod = "Ninguno";
								break;
							case 1:
								$trabajod = "Mecánico";
								break;
							case 2:
								$trabajod = "Granjero";
								break;
							case 3:
								$trabajod = "Pescador";
								break;
							case 4:
								$trabajod = "Limpiador de Calles";
								break;
							case 5:
								$trabajod = "Basurero";
								break;
							case 6:
								$trabajod = "Repartidor de Pizzas";
								break;
							case 7:
								$trabajod = "Camionero";
								break;
							case 8:
								$trabajod = "Vendedor Ambulante";
								break;
							case 9:
								$trabajod = "Detective";
								break;
							case 10:
								$trabajod = "Vendedor de Seguros";
								break;
							case 11:
								$trabajod = "Ladrón";
								break;
							default:
								$trabajod = "Desconocido - Solucionar";
						}
						
						switch($faccion)
						{
							case 0:
								$facciond = "Ninguna";
								break;
							case 1:
								$facciond = "Los Santos Police Departament";
								break;
							case 2:
								$facciond = "Los Santos Medical Departament";
								break;
							case 3:
								$facciond = "Los Santos Taxi Departament";
								break;
							case 4:
								$facciond = "Los Santos News";
								break;
							case 5:
								$facciond = "Alcaldía";
								break;
							case 6:
								$facciond = "Guardia Nacional";
								break;
							case 7:
								$facciond = "Federal Bureau of Investigation";
								break;
							case 91:
								$facciond = "RCA";
								break;
							default:
								$facciond = "Desconocido - Solucionar";
						}
						
						if($faccion == 0) { $rangond = "fdf-"; }
						if($rangos == 0)
						{
							$rangond = "-";
						}
						
						if($faccion == 1)
						{
							if($rangos == 1){ $rangond = "Cadete"; }
							if($rangos == 2){ $rangond = "Oficial"; }
							if($rangos == 3){ $rangond = "Oficial Superior"; }
							if($rangos == 4){ $rangond = "Sargento"; }
							if($rangos == 5){ $rangond = "Teniente"; }
							if($rangos == 6){ $rangond = "Capitán"; }
						}
						
						if($faccion == 2)
						{
							if($rangos == 1){ $rangond = "Practicante"; }
							if($rangos == 2){ $rangond = "Paramédico"; }
							if($rangos == 3){ $rangond = "Médico"; }
							if($rangos == 4){ $rangond = "Médico Jefe"; }
							if($rangos == 5){ $rangond = "Vice Director"; }
							if($rangos == 6){ $rangond = "Director"; }
						}
						
						if($faccion == 3)
						{
							if($rangos == 1){ $rangond = "TAXI1"; }
							if($rangos == 2){ $rangond = "TAXI2"; }
							if($rangos == 3){ $rangond = "TAXI3"; }
							if($rangos == 4){ $rangond = "TAXI4"; }
							if($rangos == 5){ $rangond = "TAXI5"; }
							if($rangos == 6){ $rangond = "TAXI6"; }
						}
						
						if($faccion == 4)
						{
							if($rangos == 1){ $rangond = "NEWS1"; }
							if($rangos == 2){ $rangond = "NEWS2"; }
							if($rangos == 3){ $rangond = "NEWS3"; }
							if($rangos == 4){ $rangond = "NEWS4"; }
							if($rangos == 5){ $rangond = "NEWS5"; }
							if($rangos == 6){ $rangond = "NEWS6"; }
						}
						
						if($faccion == 5)
						{
							if($rangos == 1){ $rangond = "GOB1"; }
							if($rangos == 2){ $rangond = "GOB2"; }
							if($rangos == 3){ $rangond = "GOB3"; }
							if($rangos == 4){ $rangond = "GOB4"; }
							if($rangos == 5){ $rangond = "GOB5"; }
							if($rangos == 6){ $rangond = "GOB6"; }
						}
						
						if($faccion == 6)
						{
							if($rangos == 1){ $rangond = "SHEFF1"; }
							if($rangos == 2){ $rangond = "SHEFF2"; }
							if($rangos == 3){ $rangond = "SHEFF3"; }
							if($rangos == 4){ $rangond = "SHEFF4"; }
							if($rangos == 5){ $rangond = "SHEFF5"; }
							if($rangos == 6){ $rangond = "SHEFF6"; }
						}
						
						if($faccion === 7)
						{
							if($rangos == 1){ $rangond = "FBI1"; }
							if($rangos == 2){ $rangond = "FBI2"; }
							if($rangos == 3){ $rangond = "FBI3"; }
							if($rangos == 4){ $rangond = "FBI4"; }
							if($rangos == 5){ $rangond = "FBI5"; }
							if($rangos == 6){ $rangond = "FBI6"; }
						}
						
						$armasd = explode(",",$armas);
						$ammod = explode(",",$ammo);
						$licenciasd = explode(",",$licencias);
						$telefonod = explode(",",$telefono);
						
						if($armasd[1] > 0)
						{
							$slot1 = true;
							if($armasd[1] == 1) { $manopla = 1; }
							elseif($armasd[1] == 2) { $palogolf= 1; }
							elseif($armasd[1] == 3) { $porra = 1; }
							elseif($armasd[1] == 4) { $cuchillo = 1; }
							elseif($armasd[1] == 5) { $bate = 1; }
							elseif($armasd[1] == 6) { $pala = 1; }
						}
						
						/*if(isset($porra))
						{
							echo "Tiene una porra";
							echo "<img src='./imagenes/armas/Weapon-$armasd[1].gif'>";
						}*/
						/*for($i=1;$i<13;$i++)
						{
							echo $armasd[$i];
							echo "<br>";
						}*/
						//echo "<img src='./imagenes/skins/Skin_$skin.png'>";
						switch($cert)
						{
							case 0:
								$certd = "Sin enviar e-mail";
								break;
							case 1:
								$certd = "Aprobada y Jugando";
								break;
							case 2:
								$certd = "Recertificando por Faltas";
								break;
							case 3:
								$certd = "Falta responder preguntas";
								break;
							case 4:
								$certd = "Esperando resolución";
								break;
							case 5:
								$certd = "Aprobada";
								break;
							case 6:
								$certd = "Rechazada y Suspendida";
								break;
							case 7:
								$certd = "Re-Certificación Aprobada";
								break;
							case 8:
								$certd = "Re-Certificación Suspendida";
								break;
						}
						
						if($leveladmin > 0)
						{
							$esadmin = true;
							if($leveladmin == "1") { $rangoa = "Moderador"; }
							elseif($leveladmin == "2") { $rangoa = "Operador"; }
							elseif($leveladmin == "3") { $rangoa = "Administrador"; }
							elseif($leveladmin == "4") { $rangoa = "Desarrollador"; }
						}
						?>
						<br>
						<?php
						//echo "<a href='?action=editar&ampid=$id' class='botond' style='float: right; color: white;'>Editar Cuenta</a>";
						?>
						<div id="edicion-a">
						</div>
						<div id="datosdelacuenta" class="alert alert-success">
							<?php
							if($rango == 3 or $rango ==4)
							{
							?>
							<button class="botond" id="editar-a" style="float: right;">Editar Datos</button>
							<?php
							}
							?>
							<br>
							<h4 style="text-align: center;">Datos de la Cuenta</h4>
							<h5 style="float: right;">Perfil: <?php echo $email; ?></h5><br><br><br>
							<div style="float: right;">
							<?php echo "<img style='float: right;' src='./imagenes/skins/Skin_$skin.png'  alt='img'>"."<br> Skin $skin"; ?>
							</div>
							<div class="contact-input" style="color: black;">
							<table>
								<tr>
									<th style="width:30%;"> </th>
									<th></th>
								</tr>
								<tr>
									<td>SQLID:</td> <td><?php echo $idc; ?><br></td>
								</tr>
								<tr>
									<td>Nombre de Usuario:</td> <td><img src='./imagenes/id.png' alt="img"> <?php echo $nombre; ?><br></td>
								</tr>
								<?php
								if(isset($esadmin))
								{
									?>
								<tr>
									<td>Nivel en la Administración:</td> <td><img src='./imagenes/admin.png' alt="img"> <?php echo $rangoa; ?><br></td>
								</tr>
									<?php
								}
								?>
								<tr>
									<td>¿Está jugando?:</td> <td><img src='./imagenes/game.png' alt="img"> <?php if($jugando == 1) { echo "Sí"; } else if($jugando == 0) { echo "No"; } else { echo "Desconocido"; } ?><br></td>
								</tr>
								<tr>	
									<td>Horas Jugadas:</td> <td><img src='./imagenes/time.png' alt="img"> <?php echo $respeto; ?><br></td>
								</tr>
								<tr>	
									<td>Certificación:</td> <td><img src='./imagenes/document.png' alt="img"> <?php echo $certd; ?><br></td>
								</tr>
							</table>	
							</div>
						</div>
						<div id="edicion-b">
						</div>
						<div id="estadisticas" class="alert alert-success">
							<?php
							if($rango == 3 or $rango ==4)
							{
							?>
							<button class="botond" id="editar-b" style="float: right;">Editar Estadísticas</button><br>
							<?php
							}
							?>
							<h4 style="text-align: center;">Estadísticas</h4>
							<div class="contact-input" style="color: black;">
							<table>
								<tr>
									<th style="width:30%;">Información</th>
									<th style="width:10%;">Resultado</th>
								</tr>
								<tr>
									<td>Dinero en Mano:</td> <td><img src='./imagenes/dinero.png' alt="img"> $<?php echo $dinero; ?></td>
								</tr>
								<tr>
									<td>Dinero en el Banco:</td> <td><img src='./imagenes/banco.png' alt="img"> $<?php echo $banco; ?></td>
								</tr>
								<tr>
									<td>Sexo:</td> <td><img src='./imagenes/sex.png' alt="img"><?php if($sexo == 1) { echo "Masculino"; } else if($sexo == 2) { echo "Femenino"; } else { echo "Desconocido"; } ?><br></td>
								</tr>
								<tr>
									<td>Edad:</td> <td><img src='./imagenes/kuser.png' alt="img"> <?php echo $edad; ?></td>
								</tr>
								<tr>
									<td>Vida:</td> <td><img src='./imagenes/vida.png' alt="img"> <?php echo $vida; ?></td>
								</tr>
								<tr>
									<td>Chaleco:</td> <td><img src='./imagenes/chaleco.png' alt="img"> <?php if($chaleco == 0) { echo "No posee"; } else { echo $chaleco; } ?></td>
								</tr>
								<tr>
									<td>Trabajo:</td> <td><img src='./imagenes/job.png' alt="img"><?php echo $trabajod; ?></td>
								</tr>
								<tr>
									<td>Facción:</td> <td><img src='./imagenes/police.png' alt="img"><?php echo $facciond; ?></td>
								</tr>
								<tr>
									<td>Rango:</td> <td><img src='./imagenes/piramide.png' alt="img"> <?php echo $rangond; ?></td>
								</tr>
								<tr>
									<td>Teléfono 1:</td> <td><img src='./imagenes/phone.png' alt="img"> <?php if($telefonod[0] == 0) { echo "No posee"; } else { echo $telefonod[0]; } ?></td>
								</tr>	
								<tr>	
									<td>Teléfono 2:</td> <td><img src='./imagenes/phone.png' alt="img"> <?php if($telefonod[1] == 0) { echo "No posee"; } else { echo $telefonod[1]; } ?></td>
								</tr>
							</table>
							</div><br>
							<div class="contact-input" style="color: black;">
							<table>
								<tr>
									<th style="width:30%;">Información</th>
									<th style="width:10%;">Resultado</th>
								</tr>
								<tr>
									<td>Posición X:</td> <td><img src='./imagenes/map.png' alt="img"><?php echo $x; ?></td>
								</tr>
								<tr>
									<td>Posición Y:</td> <td><img src='./imagenes/map.png' alt="img"><?php echo $y; ?></td>
								</tr>
								<tr>
									<td>Posición Z:</td> <td><img src='./imagenes/map.png' alt="img"><?php echo $x; ?></td>
								</tr>
								<tr>
									<td>Ángulo:</td> <td><img src='./imagenes/angulo.png' alt="img"><?php echo $angulo; ?></td>
								</tr>
								<tr>
									<td>Interior:</td> <td><img src='./imagenes/interior.png' alt="img"> <?php echo $interior; ?></td>
								</tr>
								<tr>
									<td>Mundo Virtual:</td> <td><img src='./imagenes/world.png' alt="img"> <?php echo $virtual; ?></td>
								</tr>
							</table>
							</div>
						</div>
						<div id="edicion-c">
						</div>
						<div id="posesiones" class="alert alert-success">
							<?php
							if($rango == 3 || $rango ==4)
							{
							?>
							<button class="botond" id="editar-c" style="float: right;">Editar Posesiones</button><br>
							<?php
							}
							?>
							<h4 style="text-align: center;">Propiedades e Inventario</h4>
							<div class="contact-input" style="color: black;">
							<table>
								<tr>
									<th style="width:30%;">Licencia</th>
									<th style="width:10%;">¿Posee?</th>
									<th style="width:10%;">Puntos</th>
								</tr>
								<tr>
									<td>Conducción</td> <td><img src='./imagenes/license.png' alt="img"> <?php if($licenciasd[0] == 0) { echo "No posee"; } else { echo "Si posee"; } ?></td> <td><?php if($licenciasd[1] == 0) { echo "No posee"; } else { echo $licenciasd[1]; } ?></td>
								</tr>
								<tr>
									<td>Navegación</td> <td><img src='./imagenes/boat.png' alt="img"> <?php if($licenciasd[2] == 0) { echo "No posee"; } else { echo "Si posee"; } ?></td> <td>-</td>
								</tr>
								<tr>
									<td>Vuelo</td> <td><img src='./imagenes/avion.png' alt="img"> <?php if($licenciasd[3] == 0) { echo "No posee"; } else { echo "Si posee"; } ?></td> <td>-</td>
								</tr>
							</table>	
							</div>
							<h5 style="text-align: center;">Armas</h5>
							<div class="contact-input" style="color: black;">
							<table>
								<tr>
									<th style="width:30%;">Slot</th>
									<th style="width:10%;">Arma</th>
									<th style="width:10%;">Municiones</th>
								</tr>
								<tr>
									<td>Slot 1</td> <td><?php if($armasd[1] > 0) { echo "<img src='./imagenes/armas/Weapon-$armasd[1].gif' alt='img'>"; } else { echo "Vacío"; } ?></td> <td><?php echo $ammod[1]; ?></td>
								</tr>
								<tr>
									<td>Slot 2</td> <td><?php if($armasd[2] > 0) { echo "<img src='./imagenes/armas/Weapon-$armasd[2].gif' alt='img'>"; } else { echo "Vacío"; } ?></td> <td><?php echo $ammod[2]; ?></td>
								</tr>
								<tr>
									<td>Slot 3</td> <td><?php if($armasd[3] > 0) { echo "<img src='./imagenes/armas/Weapon-$armasd[3].gif' alt='img'>"; } else { echo "Vacío"; } ?></td> <td><?php echo $ammod[3]; ?></td>
								</tr>
								<tr>
									<td>Slot 4</td> <td><?php if($armasd[4] > 0) { echo "<img src='./imagenes/armas/Weapon-$armasd[4].gif' alt='img'>"; } else { echo "Vacío"; } ?></td> <td><?php echo $ammod[4]; ?></td>
								</tr>
								<tr>
									<td>Slot 5</td> <td><?php if($armasd[5] > 0) { echo "<img src='./imagenes/armas/Weapon-$armasd[5].gif' alt='img'>"; } else { echo "Vacío"; } ?></td> <td><?php echo $ammod[5]; ?></td>
								</tr>
								<tr>
									<td>Slot 6</td> <td><?php if($armasd[6] > 0) { echo "<img src='./imagenes/armas/Weapon-$armasd[6].gif' alt='img'>"; } else { echo "Vacío"; } ?></td> <td><?php echo $ammod[6]; ?></td>
								</tr>
								<tr>
									<td>Slot 7</td> <td><?php if($armasd[7] > 0) { echo "<img src='./imagenes/armas/Weapon-$armasd[7].gif' alt='img'>"; } else { echo "Vacío"; } ?></td> <td><?php echo $ammod[7]; ?></td>
								</tr>
								<tr>
									<td>Slot 8</td> <td><?php if($armasd[8] > 0) { echo "<img src='./imagenes/armas/Weapon-$armasd[8].gif' alt='img'>"; } else { echo "Vacío"; } ?></td> <td><?php echo $ammod[8]; ?></td>
								</tr>
								<tr>
									<td>Slot 9</td> <td><?php if($armasd[9] > 0) { echo "<img src='./imagenes/armas/Weapon-$armasd[9].gif' alt='img'>"; } else { echo "Vacío"; } ?></td> <td><?php echo $ammod[9]; ?></td>
								</tr>
								<tr>
									<td>Slot 10</td> <td><?php if($armasd[10] > 0) { echo "<img src='./imagenes/armas/Weapon-$armasd[10].gif' alt='img'>"; } else { echo "Vacío"; } ?></td> <td><?php echo $ammod[10]; ?></td>
								</tr>
								<tr>
									<td>Slot 11</td> <td><?php if($armasd[11] > 0) { echo "<img src='./imagenes/armas/Weapon-$armasd[11].gif' alt='img'>"; } else { echo "Vacío"; } ?></td> <td><?php echo $ammod[11]; ?></td>
								</tr>
							</table>
							</div>
							<h5 style="text-align: center;">Vehículos</h5>
							<?php
							$sel = sprintf("SELECT * FROM cars WHERE Owner = '%s' ORDER BY id DESC LIMIT 0,10",
							$nombre);
							$que = mysqli_query($con, $sel);
							$num = mysqli_num_rows($que);
							if($num)
							{
								for($f=1;$f<=$num;$f++)
								{
									$tos = mysqli_fetch_assoc($que);
									$idcar = htmlentities($tos[id], ENT_QUOTES,'UTF-8');
									$key = htmlentities($tos[Key], ENT_QUOTES,'UTF-8');
									$modelid = htmlentities($tos[Model], ENT_QUOTES,'UTF-8');
									$XA = htmlentities($tos[X], ENT_QUOTES,'UTF-8');
									$YA = htmlentities($tos[Y], ENT_QUOTES,'UTF-8');
									$ZA = htmlentities($tos[Z], ENT_QUOTES,'UTF-8');
									$AA = htmlentities($tos[A], ENT_QUOTES,'UTF-8');
									$km = htmlentities($tos[Kms], ENT_QUOTES,'UTF-8');
									$C1 = htmlentities($tos[C1], ENT_QUOTES,'UTF-8');
									$C2 = htmlentities($tos[C2], ENT_QUOTES,'UTF-8');
									$des = htmlentities($tos[Des], ENT_QUOTES,'UTF-8');
									$val = htmlentities($tos[Val], ENT_QUOTES,'UTF-8');
									$gas = htmlentities($tos[Gas], ENT_QUOTES,'UTF-8');
									$drogas = htmlentities($tos[Drogas], ENT_QUOTES,'UTF-8');
									$armasa = htmlentities($tos[Slots], ENT_QUOTES,'UTF-8');
									$comp = htmlentities($tos[Comp], ENT_QUOTES,'UTF-8');
									$danos = htmlentities($tos[Danos], ENT_QUOTES,'UTF-8');
									$vw = htmlentities($tos[Vw], ENT_QUOTES,'UTF-8');
									$interiora = htmlentities($tos[Interior], ENT_QUOTES,'UTF-8');
									echo $modelo;
									?>
									<div class="contact-input" style="color: black; text-align: center;">
									<table>
										<tr>
											<th style="width:30%;">Información</th>
											<th style="width:10%;">Resultado</th>
										</tr>
										<tr>
											<td>ID SQL:</td> <td><img src='./imagenes/dinero.png' alt="img"><?php echo $idcar; ?></td>
										</tr>
										<tr>
											<td>Llave</td> <td><img src='./imagenes/keys.png' alt="img"><?php echo $key; ?></td>
									</table>
									</div>
									<?php
								}
							}
							else
							{
							?>
							<div class="contact-input" style="color: black; text-align: center;">
							Este jugador no posee vehículos.
							</div>
							<?php
							}
							
							?>
							<h5 style="text-align: center;">Casa</h5>
							<?php
							$sel = sprintf("SELECT * FROM casas WHERE Owner = '%s' ORDER BY id DESC LIMIT 0,5",
							$nombre);
							$que = mysqli_query($con, $sel);
							$num = mysqli_num_rows($que);

							if ($num)
							{
								echo "ay casa";
							}
							else
							{
							?>
							<div class="contact-input" style="color: black; text-align: center;">
							Este jugador no posee viviendas.
							</div>
							<?php
							}
							?>
						</div>
						<div class="alert alert-success">
							<h4 style="text-align: center;">Sanciones</h4>
							<h5 style="text-align: center;">Advertencias</h5>
							<?php
							$sel = sprintf("SELECT * FROM advertirs WHERE kickeado = '%s' ORDER BY kickid DESC LIMIT 0,30",
							$nombre);
							$que = mysqli_query($con, $sel);
							$num = mysqli_num_rows($que);

							if ($num)
							{
								?>
								<div class="contact-input" style="color: black;">
									<table class="table-light" style="margin: auto; text-align: center;">
									<tr>
										<th style="width:30%; text-align: center;">Administrador que lo Advirtió</th>
										<th style="text-align: center;">Razón</th>
										<th style="text-align: center;">Fecha</th>	
									</tr>
									<?php
									while ($i < $num and $tos = mysqli_fetch_assoc($que))
									{
										$advirtio = htmlentities($tos[kicker], ENT_QUOTES,'UTF-8');
										$razon = htmlentities($tos[razon], ENT_QUOTES,'UTF-8');
										$momento = htmlentities($tos[fecha], ENT_QUOTES,'UTF-8');
										
										echo "<tr>";
										echo "<td>$advirtio</td>";
										echo "<td>$razon</td>";
										echo "<td>$momento</td>";
										echo "</tr>";
									}
								?>
									</table>
								</div>
								<?php
							}
							else
							{
							?>
							<div class="contact-input" style="color: black; text-align: center;">
							Este jugador no fue advertido hasta ahora.
							</div>
							<?php
							}
							?>
							<h5 style="text-align: center;">Cárcel Administrativa</h5>
							<?php
							$sel = sprintf("SELECT * FROM ajails WHERE ajaileado = '%s' ORDER BY ajailid DESC LIMIT 0,30",
							$nombre);
							$que = mysqli_query($con, $sel);
							$num = mysqli_num_rows($que);

							if ($num)
							{
								?>
								<div class="contact-input" style="color: black;">
									<table class="table-light" style="margin: auto; text-align: center;">
									<tr>
										<th style="width:30%; text-align: center;">Administrador que lo Encarceló</th>
										<th style="text-align: center;">Razón</th>
										<th style="text-align: center;">Fecha</th>
										<th style="text-align: center;">Tiempo</th>
									</tr>
									<?php
									while ($i < $num and $tos = mysqli_fetch_assoc($que))
									{
										$advirtio = htmlentities($tos[ajailer], ENT_QUOTES,'UTF-8');
										$razon = htmlentities($tos[razon]);
										$momento = htmlentities($tos[fecha], ENT_QUOTES,'UTF-8');
										$tiempo = htmlentities($tos[tiempo], ENT_QUOTES,'UTF-8');
										
										echo "<tr>";
										echo "<td>$advirtio</td>";
										echo "<td>$razon</td>";
										echo "<td>$momento</td>";
										echo "<td>$tiempo Minutos</td>";
										echo "</tr>";
									}
								?>
									</table>
								</div>
								<?php
							}
							else
							{
							?>
							<div class="contact-input" style="color: black; text-align: center;">
							Este jugador no fue encarcelado hasta ahora.
							</div>
							<?php
							}
							?>
							<h5 style="text-align: center;">Baneos</h5>
							<?php
							$sel = sprintf("SELECT * FROM bans WHERE banneado = '%s' ORDER BY banid DESC LIMIT 0,30",
							$nombre);
							$que = mysqli_query($con, $sel);
							$num = mysqli_num_rows($que);

							if ($num)
							{
								?>
								<div class="contact-input" style="color: black;">
									<table class="table-light" style="margin: auto; text-align: center;">
									<tr>
										<th style="width:30%; text-align: center;">Administrador que lo Baneó</th>
										<th style="text-align: center;">Razón</th>
										<th style="text-align: center;">Fecha</th>
									</tr>
									<?php
									while ($i < $num and $tos = mysqli_fetch_assoc($que))
									{
										$advirtio = htmlentities($tos[banner], ENT_QUOTES,'UTF-8');
										$razon = htmlentities($tos[razon], ENT_QUOTES,'UTF-8');
										$momento = htmlentities($tos[fecha], ENT_QUOTES,'UTF-8');
										
										echo "<tr>";
										echo "<td>$advirtio</td>";
										echo "<td>$razon</td>";
										echo "<td>$momento</td>";
										echo "</tr>";
									}
								?>
									</table>
								</div>
								<?php
							}
							else
							{
							?>
							<div class="contact-input" style="color: black; text-align: center;">
							Este jugador no fue baneado hasta ahora.
							</div>
							<?php
							}
							?>
							<h5 style="text-align: center;">Kickeos</h5>
							<?php
							$sel = sprintf("SELECT * FROM kicks WHERE kickeado = '%s' ORDER BY kickid DESC LIMIT 0,30",
							$nombre);
							$que = mysqli_query($con, $sel);
							$num = mysqli_num_rows($que);

							if ($num)
							{
								?>
								<div class="contact-input" style="color: black;">
									<table class="table-light" style="margin: auto; text-align: center;">
									<tr>
										<th style="width:30%; text-align: center;">Administrador que lo Kickeó</th>
										<th style="text-align: center;">Razón</th>
										<th style="text-align: center;">Fecha</th>
									</tr>
									<?php
									while ($i < $num and $tos = mysqli_fetch_assoc($que))
									{
										$advirtio = htmlentities($tos[kicker], ENT_QUOTES,'UTF-8');
										$razon = htmlentities($tos[razon], ENT_QUOTES,'UTF-8');
										$momento = htmlentities($tos[fecha], ENT_QUOTES,'UTF-8');
										
										echo "<tr>";
										echo "<td>$advirtio</td>";
										echo "<td>$razon</td>";
										echo "<td>$momento</td>";
										echo "</tr>";
									}
								?>
									</table>
								</div>
								<?php
							}
							else
							{
							?>
							<div class="contact-input" style="color: black; text-align: center;">
							Este jugador no fue kickeado hasta ahora.
							</div>
							<?php
							}
							?>
						</div>
						<div class="alert alert-success" id="logins">
							<h4 style="text-align: center;">Inicios de Sesión</h4>
							<div id="contentlog">
							<?php
							require('./include/logins2.php');
							?>
							</div>
						</div>
						<?php
					}
					else
					{
					?>
					<div class="alert alert-error">
					<strong>¡Aviso!</strong><br>
					La cuenta que intentar ver no existe.
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
			<strong>¡Aviso!</strong> Faltan datos para poder procesar tu solicitud.
			</div>
			<?php
			}
		}
		else if($action === "crear")
		{
		if(isset($errorcreacion))
		{
		?>
		<div class="alert alert-error">
			<strong>¡Aviso!</strong> <?php echo $errorcreacion; ?>
		</div>
		<?php
		}
		?>
		<h3 class="msj" style="text-align: center;">Crear una nueva cuenta</h3>
		<p>Bienvenido a la sección para crear una nueva cuenta de usuario. Recuerda que se confia plenamente en ti y creemos que no crearás cuentas innecesariamente.
		Esta utilidad solamente debe ser usada en casos que lo requieran. Crear cuentas innecesariamente puede convocar a una sanción y hasta la expulsión del equipo.</p>
		<p>Antes de proseguir, debes tener muy en cuenta que la cuenta a crear se asociará a un perfil, es decir que si el perfil no existe no podrás crear la cuenta.
		También recuerda que la creación de perfiles está dependiente de las cuentas que el usuario ya tenga y si ya compró más cuentas. El límite de cuentas de un usuario
		común es de dos, luego se pueden seguir comprando hasta tres cuentas más.</p>
		<h3 class="msj">Formulario</h3>
		<form action="" method="post" id="crear" name="crear" accept-charset="utf-8">
			Asocia la cuenta a un e-mail:<br>
			<p class="contact-input">
				<input class="textareacr" type="text" name="email" placeholder="email - perfil@ejemplo.com" id="email"/>
			</p>
			Escribe el nombre de la cuenta:<br>
			<p class="contact-input">
				<input class="textareacr" type="text" name="nombre" placeholder="nombre - Nombre_Apellido" id="nombre"/>
			</p>
			Selecciona el sexo:
			<p class="contact-input">
			<label for="select" class="select">
				<select name="sexo" id="select">
					<option value="1">Hombre</option>
					<option value="2">Mujer</option>
				</select>
			</label>
			</p>
			Escribe la edad de la cuenta:<br>
			<p class="contact-input">
				<input class="textareacr" type="number" name="edad" size="5" maxlength="2" id="edad" placeholder="Edad" min="18" max="80">
			</p>
			Escribe la contraseña que usará:<br>
			<p class="contact-input">
				<input class="textareacr" type="password" name="password1" maxlength="20" id="pass1"/>
			</p>
			Confirma la contraseña:<br>
			<p class="contact-input">
				<input class="textareacr" type="password" name="password2" maxlength="20" id="pass2"/>
			</p>
			<input name="crear" type="submit" class="botonc" value="Crear">
		</form>
		<?php
		}
		else
		{
		?>
			<div class="alert alert-error">
			<strong>¡Aviso!</strong> Se desconoce la acción que estás intentado llevar a cabo.
			</div>
		<?php
		}
	?>
	</div>
</div>