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
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Documento Base | GranRol</title>
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
				<li class="lih"><a href="javascript:void(0);" class="active">Enlace</a></li>
				<li class="lih"><a href="javascript:void(0);">Enlace</a></li>
			</ul>
</div>
<?php
include('./menu.php');
?>
<div id="box5">
	<div class="contenido">
	DOCUMENTO BASE
	</div>
</div>