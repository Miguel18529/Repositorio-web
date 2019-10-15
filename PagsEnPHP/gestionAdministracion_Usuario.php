<?php
require_once("ConexionBD.php");
//función para extraer las fechas de los residentes
function extraerFechasLlegadaSalida($conn, $correo)
{
    try {

        //Comprobacion de errores para saber si la funcion se ejecuta correctamente
        // if (!isset($_SESSION["dentro"])) {
        //     $_SESSION["dentro"] = "Estoy dentro de editar";
        // } else {
        //     unset($_SESSION["dentro"]);
        //     $_SESSION["dentro"] = "Estoy dentro de editar";
        // }

        $consulta = "SELECT FECHA_INICIO, FECHA_FIN FROM USUARIO_REGISTRADO NATURAL JOIN CONTRATO_RESIDENTE WHERE CORREO = '$correo'";

        $stmt = $conn->query($consulta);
        $result = $stmt->fetchAll();
        return $result;

    } catch (PDOException $e) {
        $_SESSION['excepcion'] = $e->GetMessage();
        header("Location: excepcion.php");
    }
}
//función para saber si el residente paga el comedor
function extraerPagoComedor($conn, $correo)
{
    try {

        //Comprobacion de errores para saber si la funcion se ejecuta correctamente
        // if (!isset($_SESSION["dentro"])) {
        //     $_SESSION["dentro"] = "Estoy dentro de editar";
        // } else {
        //     unset($_SESSION["dentro"]);
        //     $_SESSION["dentro"] = "Estoy dentro de editar";
        // }

        $consulta = "SELECT PAGOCOMEDOR FROM USUARIO_REGISTRADO NATURAL JOIN residente WHERE CORREO = '$correo'";

        $stmt = $conn->query($consulta);
        $result = $stmt->fetchAll();
        return $result;

    } catch (PDOException $e) {
        $_SESSION['excepcion'] = $e->GetMessage();
        header("Location: excepcion.php");
    }
}
