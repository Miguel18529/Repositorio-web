<?php
include_once 'gestionarReserva.php';
include_once 'conexionBD.php';
session_start();
?>
<?php
if (isset($_SESSION["formulario"])) {
	$reservaForm = $_SESSION["formulario"];
	$_SESSION["formulario"] = null;
	$_SESSION["errores"] = null;
} else
	Header("Location: formulario-reserva.php");

$conexion = crearconexionBD();
?>

<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta title="Residencia Estudiantil Digital">
		<link rel="stylesheet" href="css/cssInicio.css" />
		<link rel="icon" type="image/png" href="imagenes/LogoRED.jpeg" />
		<Title>Residencia de estudiantes bahía</Title>
	</head>

	<body>
		<?php
		include "php/menu.php";
		?>
		<div class="cuerpo2">
			<?php if (insertarReserva($conexion, $reservaForm)) {
				$_SESSION['login'] = $reservaForm['CorreoElectronico'];
			?>
			<h1>Reserva realizada correctamente, ahora puede iniciar sesión y comprobar sus datos</h1>
			<?php } else { ?>
			<h1>Residente existente.</h1>
			<div >
				<p>Pulsa <a href="formulario-reserva.php">aquí</a> para volver a realizar la reserva.</p>
			</div>
			<?php } ?>
		</div>
		<?php
		include "php/pie.php";
		?>
	</body>

</html>