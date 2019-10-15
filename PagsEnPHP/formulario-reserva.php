<?php
	session_start();
	
	// Importar librerías necesarias para gestionar direcciones y géneros literarios
	require_once("ConexionBD.php");
	
	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION["formulario"])) {
		$formulario['DNI'] = "";
		$formulario['Nombre'] = "";
		$formulario['PrimerApellido'] = "";
		$formulario['SegundoApellido'] = "";
		$formulario['Sexo'] = "";
		$formulario['MayoriaEdad'] = "";
		$formulario['paises'] = "";
		$formulario['Poblacion'] = "";
		$formulario['CodigoPostal'] = "";
		$formulario['Domicilio'] = "";
		$formulario['CorreoElectronico'] = "";
		$formulario['CorreoPadre'] = "";
		$formulario['pass'] = "";
		$formulario['FechaLlegada'] = "";
		$formulario['FechaSalida'] = "";
		$formulario['TipoPago'] = "";
		$formulario['FormaPago'] = "";
		$formulario['pagoComedor'] = "";
	
		$_SESSION["formulario"] = $formulario;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$formulario = $_SESSION["formulario"];
			
	// Si hay errores de validación, hay que mostrarlos y marcar los campos (El estilo viene dado y ya se explicará)
	if (isset($_SESSION["errores"])){
		$errores = $_SESSION["errores"];
		unset($_SESSION["errores"]);
	}
?>

		<?php
        include "php/funciones.php";
        ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta title="Residencia Estudiantil Digital">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/cssInicio.css"/>
    <script src="javascript/validacionFormulario.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-1.12.2.min.js"
              integrity="sha256-lZFHibXzMHo3GGeehn1hudTAP3Sc0uKXBXAzHX1sjtk="
              crossorigin="anonymous"></script>
    <script src="javascript/comprobarcheckbox.js" type="text/javascript"></script>
    <link rel="icon" type="image/png" href="imagenes/LogoRED.jpeg" />
    <Title>Residencia de estudiantes bahía</Title>
</head>

<body>
    <div>
        <?php
        include "php/menu.php";
        ?>

    </div>
    <form  class="formRes" name="formularioReserva" method="post" onsubmit="return validacionGeneral()" action="validacionReserva.php">
    	<div class="gridFR">
        <div class="divForm">
        <fieldset class="fieldsetRes">
            <legend class="underline">Datos Personales</legend>
            <section class="sectionRes">
                <label class="labelRes">
                    DNI*: <input class="FR_Ajuste_DNI" type="text" name="DNI" id="DNI" placeholder="12345678A" maxlength="9" oninput="inputDNI()" required>
                </label>
            </section>
            <span class="colorSpan" id="TextoDNI"></span>
            <section class="sectionRes">
                <label class="labelRes">
                    Nombre*: <input class="FR_Ajuste_NOM" type="text" name="Nombre" id="Nombre" maxlenght="50" class="margenGeneral" required>
                </label>
            </section>
            <section class="sectionRes">
                <label class="labelRes">
                    Primer Apellido*: <input class="FR_Ajuste_PA" type="text" name="PrimerApellido" maxlenght="50" id="PrimerApellido" class="margenGeneral" required>
                </label>
            </section>
            <section class="sectionRes">
                <label class="labelRes">
                    Segundo Apellido*: <input class="FR_Ajuste_SA" type="text" name="SegundoApellido" maxlenght="50" id="SegundoApellido" class="margenGeneral" required>
                </label>
            </section>
            <section class="sectionRes">
                <label class="labelRes" for="paises"> País*:
                    <select class="FR_Ajuste_Pais" name="paises" id="paises">
                        <?php
                        $selected = "";
                        foreach ($paises as $p => $paises) {
                            $selected = ($p == $default_paises) ? "selected" : "";
                            echo "<option $selected value='$p'>$paises</option>";
                        }
                        ?>
                    </select>
                </label>
                <label class="labelRes">
                    Población: <input class="FR_Ajuste_Pob" type="text" name="Poblacion" id="Poblacion" maxlength="50" class="margenSexo" placeholder="Sevilla">
                </label>
                <label class="labelRes">
                    Código Postal*: <input class="FR_Ajuste_Pos" type="text" name="CodigoPostal" id="CodigoPostal" maxlength="6" placeholder="12345" pattern="((0[1-9]|5[0-2])|[1-4][0-9])[0-9]{3}" required>
                </label>
            </section>
            <section class="sectionRes">
                <label class="labelRes">
                    Domicilio: <input class="FR_Ajuste_Dom" type="text" name="Domicilio" id="Domicilio" maxlength="50" class="margenSexo">
                </label>
            <section class="sectionRes">
                <label class="labelRes">
                    Sexo*:
                    <input value="hombre" name="Sexo" id="Sexo" type="radio" required>Hombre
                    <input value="mujer" name="Sexo" id="Sexo" type="radio">Mujer
                </label>
            </section>
            <section class="sectionRes">
                <label class="labelRes">
                    ¿Eres mayor de edad?: <input type="checkbox" name="MayoriaEdad" id="MayoriaEdad">
                </label>
            </section>
        </fieldset>
        </div>
        
        <div class="divFormO">
        <fieldset class="fieldsetRes">
            <legend class="underline">Otros Datos de Importancia</legend>
                <label class="labelRes">
                    Correo electrónico*: <input class="FR_Ajuste_Correo" type="email" name="CorreoElectronico" maxlength="50" id="CorreoElectronico" class="margenSexo" placeholder="aaaa@buscador.com" required>
                </label>
                <label class="labelRes jquery">
                    Correo electrónico del tutor legal: <input class="FR_Ajuste_CorreoTA" type="email" name="CorreoPadre"  maxlength="50" id="CorreoPadre" placeholder="aaaa@buscador.com">
                </label>
                
                  <label for="pass" class="labelRes">Password*:
                <input class="FR_Ajuste_Password" type="password" name="pass" id="pass" placeholder="Ej: ContrAseña1234" maxlength="50" oninput="inputContraseña()" required/> <span class="colorSpan" id="TextosPass"></span>
                </label>
                
                <label class="labelRes" for="confirmpass">Confirmar Password*: 
				<input class="FR_Ajuste_ConPassword" type="password" name="confirmpass" id="confirmpass" placeholder="Confirmación de contraseña" maxlength="50" oninput="inputCoincidenContraseñas()" required><span class="colorSpan" id="textoConfirm"></span>
                </label>
                
            </section>
            <section class="sectionRes">
                <label class="labelRes">
                    Fecha de llegada*: <input class="FR_Ajuste_entrada" type="date" name="FechaLlegada" id="FechaLlegada" class="margenGeneral" required>
                </label>
            </section>
            <section class="sectionRes">
                <label class="labelRes">
                    Fecha de salida*: <input class="FR_Ajuste_salida" type="date" name="FechaSalida" id="FechaSalida" class="margenGeneral" oninput="inputFechas()" required> <span class="colorSpan" id="textoFecha"></span>
                </label>
            </section>
            <section class="sectionRes">
                <label class="labelRes">
                    Tipo de pago*:
                    <input value="mensual" name="TipoPago" id="TipoPago" type="radio" required>Mensual
                    <input value="bimensual" name="TipoPago" id="TipoPago" type="radio">Bimensual
                    <input value="cuatrimestral" name="TipoPago" id="TipoPago" type="radio">Cuatrimestral
                    <input value="anual" name="TipoPago" id="TipoPago" type="radio">Anual
                </label>
            </section>
            <section class="sectionRes">
                <label class="labelRes">
                    Forma de pago*:
                    <input name="FormaPago" id="FormaPago" type="radio" value="efectivo" required>Efectivo
                    <input name="FormaPago" id="FormaPago" type="radio" value="transferencia">Transferencia
                    <input name="FormaPago" id="FormaPago" type="radio" value="recibo bancario">Recibo bancario
                    <input name="FormaPago" id="FormaPago" type="radio" value="TPV">TPV
                </label>
            </section>
            <section class="sectionRes">
                <label class="labelResCom">
                    ¿Va a pagar el comedor?: <input type="checkbox" id="pagoComedor" name="pagoComedor">
                </label>
            </section>
        </fieldset>
        </div>
        </div>
        <div><input type="submit" value="Enviar"> </div>
    </form>
    
	<?php 
	include "php/pie.php";
	 ?>
</body>

</html>
