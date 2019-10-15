<?php 
include_once 'gestionarContacto.php';
?>
<?php
	session_start();

	
	require_once("ConexionBD.php");

	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$usuario["Nombre"] = $_REQUEST["Nombre"];
		$usuario["PrimerApellido"] = $_REQUEST["PrimerApellido"];
		$usuario["SegundoApellido"] = $_REQUEST["SegundoApellido"];
		$usuario["CorreoElectronico"] = $_REQUEST["CorreoElectronico"];
		$usuario["Asunto"] = $_REQUEST["Asunto"];
		$usuario["Mensaje"] = $_REQUEST["Mensaje"];
	
	}
	else // En caso contrario, vamos al formulario
		Header("Location: Contacto.php");
	$_SESSION["formulario"] = $usuario;
	$con = crearconexionBD();
	insertarContacto($con,$usuario);
	cerrarConexionBD($con);
	
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
        <h1>Su mensaje ha sido correctamente enviado, le responderemos lo antes posible</h1>
        
    </div>
			<?php 
	include "php/pie.php";
	 ?>
	
</body>

</html>
