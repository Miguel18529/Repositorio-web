<?php
    //Funcion en un principio para crear contraseñas desde administracionDirector,
    // después se optó por que los residentes eligieran su contraseña
    try{
    session_start();

    if(isset($_REQUEST["usuario"])){
        $usuario["usuario"] = $_REQUEST["usuario"];
        $usuario["contraseña"] = $_REQUEST["contraseña"];
        $usuario["repetirContraseña"] = $_REQUEST["repetirContraseña"];
        $usuario["DNI"] = $_REQUEST["DNIResidente"];

        $_SESSION["usuario"] = $usuario;

        if(isset($usuario["repetirContraseña"])) header("Location: registroDeContraseñaAuxiliar.php");
        else if(isset($usuario["contraseña"])) header("Location: AdministracionDirector.php");

    }else{
        header("Location: AdministracionDirector.php");
    }
    
    } catch (PDOException $e) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
