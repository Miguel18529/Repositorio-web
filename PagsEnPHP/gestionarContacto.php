<?php

 //Funcion para insertar las consultas en la base de datos
 function insertarContacto($conexion,$usuario) {
	
	// para ver si le llega algo o no:print_r($usuario);
	try {
		$consulta = "CALL INSERTAR_CONTACTO(:nombre, :ape1, :ape2, :corr, :asu, :men)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':nombre',$usuario["Nombre"]);
		$stmt->bindParam(':ape1',$usuario["PrimerApellido"]);
		$stmt->bindParam(':ape2',$usuario["SegundoApellido"]);
		$stmt->bindParam(':corr',$usuario["CorreoElectronico"]);
		$stmt->bindParam(':asu',$usuario["Asunto"]);
		$stmt->bindParam(':men',$usuario["Mensaje"]);
		$stmt->execute();
	} catch (PDOException $e) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
}
}
