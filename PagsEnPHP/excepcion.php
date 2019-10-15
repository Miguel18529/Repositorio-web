<?php
session_start();

//PD: Me he asegurado personalmente de que todos los errores sean captados correctamente

//Por defecto en nuestra página web si se accede manualmente a esta página,
//Mostramos que no haya ningun error en el caso de no haberlo 
$excepcion = "No hay error";

//De haberlo cogemos el error y lo asignamos a la variable
if (isset($_SESSION['excepcion'])) {
	$excepcion = $_SESSION['excepcion'];
	}
	unset($_SESSION['excepcion']);

//Esta función está en desuso, se tenía intención de que se pudiera volver a la página anterior
if (isset($_SESSION["destino"])) {
	$destino = $_SESSION["destino"];
	unset($_SESSION["destino"]);
} else
	$destino = "";

// Función para controlador los errores, es mucho más cómoda que un print_r() ya que este falla aveces
// if (isset($_SESSION["dentro"])) {
// 	echo $_SESSION["dentro"];
// 	unset($_SESSION["dentro"]);
// } else {
// 	unset($_SESSION["dentro"]);
// }
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta title="Residencia Estudiantil Digital">
	<link rel="stylesheet" href="css/cssInicio.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="icon" type="image/jpeg" href="imagenes/LogoRED.jpeg" />
	<Title>Residencia de estudiantes bahía</Title>
</head>

<body>

	<?php
	include "php/menu.php";
	?>
	<div class="cuerpo">

		<p class="p404">Se ha producido un error</p>
		<img class="caritatriste" src="imagenes/caritaTriste.png" />

	</div>
	<div class='excepcion'>
		<?php if ($excepcion == 'SQLSTATE[HY000]: General error: 1 OCIStmtExecute: ORA-00001: unique constraint (IISSI.SYS_C007026) violated ORA-06512: at "IISSI.INSERTAR_RESERVA", line 23 (ext\pdo_oci\oci_statement.c:148)'){
			$excepcion = 'Usuario ya registrado';
			//Capturamos el error de formulario-reserva 
			//y si se trata de unique constrain proporcionamos el mensaje de usuario repetido
		}
		echo "Información relativa al problema: <span class='Error' > $excepcion <span/>" ?>
	</div>
	<?php
	include "php/pie.php";
	?>
</body>

</html>
