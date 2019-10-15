<?php
session_start();
//procedimiento para modificar los datos de un residente mediante la administración
if (isset($_SESSION["reserva"])) {
    $reserva = $_SESSION["reserva"];
    unset($_SESSION["reserva"]);
    $reservaAux["PAG_ACT"] = $reserva["PAG_ACT"];
    $reservaAux["PAG_SIZE"] = $reserva["PAG_SIZE"];
    $_SESSION["reserva"] = $reservaAux;

    require_once("ConexionBD.php");
    require_once("gestion_AdministracionDirector.php");

    $conn = crearconexionBD();
    $borrar = editarResidente($conn, $reserva["DNI"],
    $reserva["NOMBRE"],$reserva["APELLIDO1"],$reserva["APELLIDO2"],
    $reserva["SEXO"],$reserva["FECHALLEGADA"],$reserva["FECHASALIDA"] );

    // if (!isset($_SESSION["dentro"])) {
    //     $_SESSION["dentro"] = "Estoy dentro de editar Libro";
    // } else {
    //     unset($_SESSION["dentro"]);
    //     $_SESSION["dentro"] = "Estoy dentro de editar Libro";
    // }

    cerrarConexionBD($conn);

    if ($excepcion <> "") {
        $_SESSION["excepcion"] = $excepcion;
        
        header("Location: excepcion.php");

    }else {
        header("Location: AdministracionDirector.php");
    }

}else{
    header("Location: AdministracionDirector.php");
}
