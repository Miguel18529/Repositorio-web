<?php
	session_start();
	
	// Importar librerías necesarias para gestionar direcciones y géneros literarios
	require_once("ConexionBD.php");
	
	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION["formulario"])) {
		$formulario['Nombre'] = "";
		$formulario['PrimerApellido'] = "";
		$formulario['SegundoApellido'] = "";
		$formulario['CorreoElectronico'] = "";
		$formulario['Asunto'] = "";
		$formulario['Mensaje'] = "";
	
		$_SESSION["formulario"] = $formulario;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$formulario = $_SESSION["formulario"];
			
	// Si hay errores de validación, hay que mostrarlos y marcar los campos
	if (isset($_SESSION["errores"])){
		$errores = $_SESSION["errores"];
		unset($_SESSION["errores"]);
	}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta title="Residencia Estudiantil Digital">
    <link rel="stylesheet" href="css/cssInicio.css" />
    <script src="javascript/validacionContacto.js" type="text/javascript"></script>
    <link rel="icon" type="image/png" href="imagenes/LogoRED.jpeg" />
    <Title>Residencia de estudiantes bahía</Title>
</head>

<body>
    <?php
    include "php/menu.php";
    ?>

    <fieldset>
        <div class="margenFormularioContacto">

            <h2 class = "hContacto">
                Contacto
            </h2>
            <p class="textoContacto">
                Residencia estudiantil Bahia
            </p>

            <p class="textoContacto">
                C/S.Alejandro, 179, 11510, Puerto Real, Cádiz
            </p>

            <p class="textoContacto">
                954-789-856-1
            </p>

            <p class="textoContacto">
                CorreoFalso@gmaol.ez
            </p>

            <h2 class = "hContacto">
                Consulta
            </h2>

            <form method="get" name="formularioContacto" if="formularioContacto" action="validacionContacto.php" onsubmit="return validacionGeneral()">
                <section>
                    <label>
                        Nombre*: <input class="margenContactoNOM" type="text" name="Nombre" id="Nombre" maxlength="50" required>
                    </label>
                </section>
                <section>
                    <label>
                        Primer Apellido*: <input class="margenContactoPA" type="text" name="PrimerApellido" id="PrimerApellido" maxlength="50" required>
                    </label>
                </section>
                <section>
                    <label>
                        Segundo Apellido: <input class="margenContactoSA" type="text" name="SegundoApellido" id="SegundoApellido" maxlength="50">
                    </label>
                </section>

                <section class="margenGeneral">
                    <label>
                        Correo electrónico*: <input type="email" maxlength="25" name="CorreoElectronico" id="CorreoElectronico" maxlength="50" class="margenSexo" required>
                    </label>
                </section>

                <section class="margenGeneral">
                    <section>
                        Asunto*: <input class="margenContactoAS" type="text" name="Asunto" id="Asunto" maxlength="100" required>
                    </section>
                    <section class = "secM">
                        Mensaje*:
                    </section>
                    <textarea name="Mensaje" rows=10 cols=140 maxlength="600">
                            </textarea>

                </section>

                <input type="submit" title="Enviar" name="Enviar" id=Enviar>
            </form>
        </div>
    </fieldset>
    <?php
    include "php/pie.php";
    ?>
</body>

</html>
