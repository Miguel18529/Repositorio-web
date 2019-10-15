<?php

//Funcion para insertar las reservas en la base de datos
function insertarReserva($conexion, $reservaForm)
{

	try {
		//Formateamos la fecha introducida para introducida en la base de datos
		$fechaLlegada = date('d/m/Y', strtotime($reservaForm["FechaLlegada"]));
		$fechaSalida = date('d/m/Y', strtotime($reservaForm["FechaSalida"]));
		$mayor = $reservaForm["MayoriaEdad"];
		$comedor = $reservaForm["pagoComedor"];

		//Formateamos las checkbox para introducirla en la base de datos
		if ($mayor == "on") {
			$mayor = "1";
			$mayor = (integer)$mayor;
		} else {
			$mayor = "0";
			$mayor = (integer)$mayor;
		}
		if ($comedor == "on") {
			$comedor = "1";
			$comedor = (integer)$comedor;
		} else {
			$comedor = "0";
			$comedor = (integer)$comedor;
		}
		//Convertimos el código postal en Integer
		$codPostal = $reservaForm["CodigoPostal"];
		$codPostal = (integer)$codPostal;

		//Llamamos al procedure que está en la base de datos
		$reservar = "CALL INSERTAR_RESERVA(:dni, :nombre, :ape1, :ape2, :sex, :may, :pai, :pob,
											 :cod, :dom, :corr, :corp, :pas, :lleg, :sal, :pag, :fpag, :pagc)";
		$stmt = $conexion->prepare($reservar);
		$stmt->bindParam(':dni', $reservaForm["DNI"]);
		$stmt->bindParam(':nombre', $reservaForm["Nombre"]);
		$stmt->bindParam(':ape1', $reservaForm["PrimerApellido"]);
		$stmt->bindParam(':ape2', $reservaForm["SegundoApellido"]);
		$stmt->bindParam(':sex', $reservaForm["Sexo"]);
		$stmt->bindParam(':may', $mayor);
		$stmt->bindParam(':pai', $reservaForm["paises"]);
		$stmt->bindParam(':pob', $reservaForm["Poblacion"]);
		$stmt->bindParam(':cod', $codPostal);
		$stmt->bindParam(':dom', $reservaForm["Domicilio"]);
		$stmt->bindParam(':corr', $reservaForm["CorreoElectronico"]);
		$stmt->bindParam(':corp', $reservaForm["CorreoPadre"]);
		$stmt->bindParam(':pas', $reservaForm["pass"]);
		$stmt->bindParam(':lleg', $fechaLlegada);
		$stmt->bindParam(':sal', $fechaSalida);
		$stmt->bindParam(':pag', $reservaForm["TipoPago"]);
		$stmt->bindParam(':fpag', $reservaForm["FormaPago"]);
		$stmt->bindParam(':pagc', $comedor);
		$stmt->execute();
	} catch (PDOException $e) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
}
