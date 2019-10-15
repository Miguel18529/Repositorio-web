<?php
include_once 'gestionarReserva.php';
?>
<?php
try {

	session_start();

	
	require_once("ConexionBD.php");

	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {

		// Recogemos los datos del formulario, si alguno no existe controlamos el error y lo asignamos como vacío;
		if(isset($_REQUEST["DNI"])) $reservaForm['DNI'] = $_REQUEST["DNI"]; 

		if(isset($_REQUEST["Nombre"])) $reservaForm['Nombre'] = $_REQUEST["Nombre"];


		if(isset($_REQUEST["PrimerApellido"])) $reservaForm['PrimerApellido'] = $_REQUEST["PrimerApellido"];


		if(isset($_REQUEST["SegundoApellido"])) $reservaForm['SegundoApellido'] = $_REQUEST["SegundoApellido"];


		if(isset($_REQUEST["Sexo"])) $reservaForm['Sexo'] = $_REQUEST["Sexo"];


		if(isset($_REQUEST["MayoriaEdad"])) $reservaForm['MayoriaEdad'] = $_REQUEST["MayoriaEdad"];
		else $reservaForm['MayoriaEdad'] = "";

		if(isset($_REQUEST["paises"])) $reservaForm['paises'] = $_REQUEST["paises"];


		if(isset($_REQUEST["Poblacion"])) $reservaForm['Poblacion'] = $_REQUEST["Poblacion"];
		else $reservaForm['Poblacion'] = "";

		if(isset($_REQUEST["CodigoPostal"])) $reservaForm['CodigoPostal'] = $_REQUEST["CodigoPostal"];


		if(isset($_REQUEST["Domicilio"])) $reservaForm['Domicilio'] = $_REQUEST["Domicilio"];
		else $reservaForm['Domicilio'] = "";

		if(isset($_REQUEST["CorreoElectronico"])) $reservaForm['CorreoElectronico'] = $_REQUEST["CorreoElectronico"];


		if(isset($_REQUEST["CorreoPadre"])) $reservaForm['CorreoPadre'] = $_REQUEST["CorreoPadre"];
		else $reservaForm['CorreoPadre'] = "";

		if(isset($_REQUEST["pass"])) $reservaForm['pass'] = $_REQUEST["pass"];


		if(isset($_REQUEST["FechaLlegada"])) $reservaForm['FechaLlegada'] = $_REQUEST["FechaLlegada"];


		if(isset($_REQUEST["FechaSalida"])) $reservaForm['FechaSalida'] = $_REQUEST["FechaSalida"];


		if(isset($_REQUEST["TipoPago"])) $reservaForm['TipoPago'] = $_REQUEST["TipoPago"];


		if(isset($_REQUEST["FormaPago"])) $reservaForm['FormaPago'] = $_REQUEST["FormaPago"];


		if(isset($_REQUEST["pagoComedor"])) $reservaForm['pagoComedor'] = $_REQUEST["pagoComedor"];
		else $reservaForm['pagoComedor'] = "";


	} else // En caso contrario, vamos al formulario
		Header("Location: formulario-reserva.php");
	$_SESSION["formulario"] = $reservaForm;
	$cone = crearconexionBD();
	insertarReserva($cone, $reservaForm);
	cerrarConexionBD($cone);
	
} catch (PDOException $e) {
	$_SESSION['excepcion'] = "No se ha insertado en la base de datos";
	header("Location: excepcion.php");
}
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
		<h1>Reserva realizada correctamente, ahora puede iniciar sesión y comprobar sus datos</h1>

	</div>
	<?php
	include "php/pie.php";
	?>

</body>

</html>
