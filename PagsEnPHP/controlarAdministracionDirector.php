<?php
    try{
    session_start();
    if(isset($_REQUEST["DNI"])){
        if(isset($_SESSION["reserva"])) $reserva = $_SESSION["reserva"]; unset($_SESSION["reserva"]);
        $reserva["DNI"] = $_REQUEST["DNI"];
        $reserva["NOMBRE"] = $_REQUEST["NOMBRE"];
        $reserva["APELLIDO1"] = $_REQUEST["APELLIDO1"];
        $reserva["APELLIDO2"] = $_REQUEST["APELLIDO2"];
        $reserva["SEXO"] = $_REQUEST["SEXO"];
        $reserva["FECHALLEGADA"] = $_REQUEST["FECHALLEGADA"];
        $reserva["FECHASALIDA"] = $_REQUEST["FECHASALIDA"];
        $_SESSION["reserva"] = $reserva;
        
        if(isset($_REQUEST["editar"])) header("Location: AdministracionDirector.php");
        else if(isset($_REQUEST["modificar"])) header("Location: accionModificarAdministracionDirector.php");
        else header("Location: accionBorrarAdministracionDirector.php");

    }else{
        header("Location: AdministracionDirector.php");
    }
    
    } catch (PDOException $e) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
