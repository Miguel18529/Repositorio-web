<?php

//extraigo los datos especificados con la primera y última
function consulta_paginada($conn, $query, $pag_num, $pag_size)
{
	try {

		$primera = ($pag_num - 1) * $pag_size + 1;
		$ultima  = $pag_num * $pag_size;
		$consulta_paginada =
			"SELECT * FROM ( "
			. "SELECT ROWNUM RNUM, AUX.* FROM ( $query ) AUX "
			. "WHERE ROWNUM <= :ultima"
			. ") "
			. "WHERE RNUM >= :primera";

		$stmt = $conn->prepare($consulta_paginada);
		$stmt->bindParam(':primera', $primera);
		$stmt->bindParam(':ultima',  $ultima);
		$stmt->execute();
		return $stmt;
	} catch (PDOException $e) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
}

// Devuelve el tamaño de la consulta
function total_consulta($conn, $query)
{
	try {
		$total_consulta = "SELECT COUNT(*) AS TOTAL FROM ($query)";
		$stmt = $conn->query($total_consulta);
		$result = $stmt->fetch();
		$total = $result['TOTAL'];
		return  $total;
	} catch (PDOException $e) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
}

$consulta = "SELECT * FROM RESIDENTE NATURAL JOIN CONTRATO_RESIDENTE ORDER BY FECHA_INICIO, FECHA_FIN";

//Extraigo todos los datos de la base de datos
function consultarTodos($conexion)
{
	global $consulta;
	return $conexion->query($consulta);
}


//Llamo al procedimiento de la base de datos modificando la tabla;
function editarResidente($conn, $DNI, $NOMBRE, $APELLIDO1, $APELLIDO2, $SEXO, $FECHALLEGADA, $FECHASALIDA)
{

	try {
		
		$director = "CALL UPDATEARRESIDENTE(:dni, :nombre, :apellido1, :apellido2, :sexo, :fechallegada, :fechasalida)";

		$stmt = $conn->prepare($director);
		$stmt->bindParam(':dni', $DNI);
		$stmt->bindParam(':nombre', $NOMBRE);
		$stmt->bindParam(':apellido1', $APELLIDO1);
		$stmt->bindParam(':apellido2', $APELLIDO2);
		$stmt->bindParam(':sexo', $SEXO);
		$stmt->bindParam(':fechallegada', $FECHALLEGADA);
		$stmt->bindParam(':fechasalida', $FECHASALIDA);
		$stmt->execute();

		return "";
	} catch (PDOException $e) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
}

//Borro la fila de la base de datos
function borrarConsulta($conn, $DNI_R)
{
	try {
		$borrarConsulta = "DELETE FROM RESIDENTE WHERE DNI_R = :DNI_R";
		$borrarConsulta1 = "DELETE FROM CONTRATO_RESIDENTE WHERE DNI_R = :DNI_R";

		$stmt = $conn->prepare($borrarConsulta);
		$stmt1 = $conn->prepare($borrarConsulta1);

		$stmt->bindParam(':DNI_R', $DNI_R);
		$stmt1->bindParam(':DNI_R', $DNI_R);

		$stmt->execute();
		$stmt1->execute();

		return "";
	} catch (PDOException $e) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
}

//A la hora de registrar el usuario en inicio sesion, compruebo que ya se encuentra registrado entre otras cosas 
function validacionCreacionUsuario($conn, $usuario)
{
	$res = "";


	//Comprobación de que el residente se encuentra ya en la base de datos

	try {
		$stmt = $conn->prepare("SELECT COUNT(*) AS CONTADOR FROM RESIDENTE WHERE DNI_R = :DNI");
		$stmt->bindParam(':DNI', $usuario["DNI"]);
		$resultado = $stmt->fetch();
		$valor = $resultado["CONTADOR"];
		$res += $valor >= 1 && res == true ? "" : "<p>El residente no se encuentra registrado en la BD</p><br>";
	} catch (PDOException $e) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}

	//Comprobacion de que no se ha registrado anteriormente el DNI

	try {
		$stmt = $conn->prepare("SELECT COUNT(*) AS NUMERO FROM USUARIO_REGISTRADO WHERE DNI_R = :DNI");
		$stmt->bindParam(':DNI', $usuario["DNI"]);
		$resultado = $stmt->fetch();
		$numero = $resultado["NUMERO"];
		$res += $numero >= 1 ? "<p>El usuario ya se ha registrado anteriormente</p><br>" : "";
	} catch (PDOException $e) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}

	//Validacion de la fortaleza de la password

	try {
		if (!isset($usuario["contraseña"]) || strlen($usuario["contraseña"]) > 5) {
			$res += "<p>La contraseña debe de tener al menos 5 caracteres</p><br>";
		} else if (
			!preg_match("/[a-z]+/", $usuario["contraseña"]) || !preg_match("/[A-Z]+/", $usuario["contraseña"])
			|| !preg_match("/[0-9]+/", $usuario["contraseña"])
		) {
			$res += "<p>La contraseña debe de tener una mayúscula, una minúscula y un número</p><br>";
		} else if ($usuario["contraseña"] != $usuario["repetirContraseña"]) {
			$res += "<p>La confirmación de la contraseña debe de coincidir con la contraseña escrita</p><br>";
		}
	} catch (PDOException $e) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
	
	return $res;
}
