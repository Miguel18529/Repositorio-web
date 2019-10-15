<?php
session_start();
//procedimiento para borrar un residente desde la administración
if (isset($_SESSION["reserva"])) {
    $reserva = $_SESSION["reserva"];
    unset($_SESSION["reserva"]);
    //Nos aseguramos de que los valores de la página actual y el tamaño de página se mantengan
    //Ambos se encuentran en el mismo array que la reserva por lo que lo extraemos
    $reservaAux["PAG_ACT"] = $reserva["PAG_ACT"];
    $reservaAux["PAG_SIZE"] = $reserva["PAG_SIZE"];
    $_SESSION["reserva"] = $reservaAux;

    require_once("ConexionBD.php");
    require_once("gestion_AdministracionDirector.php");

    //Se llama a la función borrar consulta
    $conn = crearconexionBD();
    $borrar = borrarConsulta($conn, $reserva["DNI"]);
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
