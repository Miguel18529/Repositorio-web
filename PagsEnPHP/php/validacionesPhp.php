<?php
	function validarDatosReserva($conexion, $reservaForm){
	$errores=array();
    	// Validación del DNI
		if($reservaForm["DNI"]=="") 
		$errores[] = "<p>El DNI es un campo obligatorio</p>";
		else if(!preg_match("/^[0-9]{8}[A-Z]$/", $reservaForm["DNI"])){
		$errores[] = "<p>El DNI debe contener 8 números y una letra mayúscula: " . $reservaForm["DNI"]. "</p>";
		}
		// Validación del nombre
		if($reservaForm['Nombre']==""){
		$errores[] ='<p>* El nombre es un campo obligatorio</p>';
		} else {
			if($reservaForm['Nombre']>50){
			$errores[] = '<p>* Nombre demasiado largo</p>';
			}
		}
		// Validación del primer apellido
		if($reservaForm['PrimerApellido']==""){
			$errores[] ='<p>* Primer apellido es un campo obligatorio</p>';
		} else {
			if($reservaForm['PrimerApellido']>50){
				$errores[] ='<p>* Primer apellido demasiado largo, acórtelo</p>';
			}
		}
		// Validación del segundo apellido
		if($reservaForm['SegundoApellido']==""){
			$errores[] ='<p>* Segundo apellido es un campo obligatorio</p>';
		} else {
			if($reservaForm['SegundoApellido']>50){
				$errores[] ='<p>* Segundo apellido demasiado largo, acórtelo</p>';
			}
		}
		// Validación del sexo
		if($reservaForm['Sexo']==""){
			$errores[] ='<p>*Sexo: Por favor, elija con lo que mejor se identifique, pero elija</p>';
		}
		// Validación del código postal
		if($reservaForm['CodigoPostal']==""){
			$errores[] ='<p>* El código postal es un campo obligatorio</p>';
		}
		else if(!preg_match("/[0-9]{5}/", $reservaForm["CodigoPostal"])){
		$errores[] = "<p>El Código postal debe ser 5 números" . $reservaForm["CodigoPostal"]. "</p>";
		}
		// Validación del correo
		if($reservaForm['CorreoElectronico']==""){
			$errores[] ='<p>* El correo electrónico propio es un campo obligatorio</p>';
		}
		// Validación de la contraseña
		if($reservaForm['pass']==""){
			$errores[] = '<p>La contraseña es un campo obligatorio</p>';
		} else{
			if($reservaForm['pass']!=$reservaForm['confirmpass']){
				$errores[] = '<p>Las contraseñas no coinciden</p>';
			}
		}
		// Validación de las fechas
		if($reservaForm["FechaLlegada"]>$reservaForm["FechaSalida"]){
			$errores[] ='<p>* La fecha de llegada no puede ser posterior a la fecha de salida</p>';
		}
		return $errores;
	}
?>
