<?php
session_start();
include_once 'gestionarReserva.php';
include_once 'php/validacionesPhp.php';
include_once 'ConexionBD.php';
?>
<?php
try {

	// Importar librerías necesarias para gestionar direcciones y géneros literarios

	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {

		// Recogemos los datos del formulario, si alguno no existe controlamos el error y lo asignamos como vacío;

		//La razón por la que está puesto así es porque algunos nos daba fallo en la página.
		//Aunque no se haga así, está a prueba de fallos
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

		if(isset($_REQUEST["confirmpass"])) $reservaForm['confirmpass'] = $_REQUEST["confirmpass"];
		
		if(isset($_REQUEST["FechaLlegada"])) $reservaForm['FechaLlegada'] = $_REQUEST["FechaLlegada"];


		if(isset($_REQUEST["FechaSalida"])) $reservaForm['FechaSalida'] = $_REQUEST["FechaSalida"];


		if(isset($_REQUEST["TipoPago"])) $reservaForm['TipoPago'] = $_REQUEST["TipoPago"];


		if(isset($_REQUEST["FormaPago"])) $reservaForm['FormaPago'] = $_REQUEST["FormaPago"];


		if(isset($_REQUEST["pagoComedor"])) $reservaForm['pagoComedor'] = $_REQUEST["pagoComedor"];
		else $reservaForm['pagoComedor'] = "";


	} else // En caso contrario, vamos al formulario
		Header("Location: formulario-reserva.php");
	
	$_SESSION["formulario"] = $reservaForm;
	
} catch (PDOException $e) {
	$_SESSION['excepcion'] = "No se ha insertado en la base de datos";
	header("Location: excepcion.php");
}
	$conexion = crearConexionBD(); 
	$errores = validarDatosReserva($conexion, $reservaForm);
	cerrarConexionBD($conexion);
	
	// Si se han detectado errores
	if (count($errores)>0) {
		// Guardo en la sesión los mensajes de error y volvemos al formulario
		$_SESSION["errores"] = $errores;
		Header('Location: formulario-reserva.php');
	} else
		// Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
		Header('Location: validacionReserva.php');
?>
