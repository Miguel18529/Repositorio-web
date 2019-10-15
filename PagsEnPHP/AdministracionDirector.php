<?php
session_start();
//nos aseguramos de que solo la directora pueda entrar
//if (!isset($_SESSION['login'])=='margarita@gmail.com')
//	Header("Location: Inicio_sesion.php");
require_once("conexionBD.php");
require_once("gestion_AdministracionDirector.php");

$conn = crearconexionBD();

//Recuperamos la reserva, la página actual y el tamaño de página
if (isset($_SESSION["reserva"])) $reserva = $_SESSION["reserva"];
$pag_act = isset($_GET["pag_act"]) ? (int)$_GET["pag_act"] : (isset($reserva["PAG_ACT"]) ? (int)$reserva["PAG_ACT"] : 1);
$pag_size = isset($_GET["pag_size"]) ? (int)$_GET["pag_size"] : (isset($reserva["PAG_SIZE"]) ? (int)$reserva["PAG_SIZE"] : 10);

//Asegurarnos simplemente de que no se puedan dar dichos casos
if ($pag_act < 1) $pag_act = 1;
if ($pag_size < 1) $pag_size = 10;

//Ya no nos sirve reserva, asi que lo liberamos
unset($_SESSION["reserva"]);

$total_registros = total_consulta($conn, $consulta); //Cantidad de registros totales
$consultaTotal = ceil($total_registros / $pag_size); //Valor de la cantidad total de valores dentro de la consulta

//Asegurarnos de que no se pueda producir ningún error de acceder a una página mayor que la actual
if ($pag_act > $consultaTotal) $pag_act = $consultaTotal;

//Guardamos los valores dentro del mismo array que se hace la consulta.
//Entendemos que esto no se hace así pero ya está implementado y funciona
$reserva["PAG_ACT"] = $pag_act;
$reserva["PAG_SIZE"] = $pag_size;
$_SESSION["reserva"] = $reserva;

//Consultamos la fila de valores dentro de la base de datos
$filas = consulta_paginada($conn, $consulta, $pag_act, $pag_size);
cerrarConexionBD($conn);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta title="Residencia Estudiantil Digital">
    <link rel="stylesheet" href="css/cssInicio.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="icon" type="image/png" href="imagenes/LogoRED.jpeg" />
    <Title>Residencia de estudiantes bahía</Title>
</head>

<body>
    <?php
    include "php/menu.php";
    ?>
    <main class="cuerpo">

        <nav>
            <div class="pagAD">
                <?php
                for ($pagina = 1; $pagina <= $consultaTotal; $pagina++) {
                    if ($pagina == $pag_act) {
                        echo ("<span id ='pagina'>$pagina</span>");
                    } else {
                        echo ("<a id='pagina' href='AdministracionDirector.php?pag_act=$pagina'>$pagina</a>");
                    }
                }
                ?>

            </div>

            <form method="get" action="AdministracionDirector.php">
                <input type="number" id="pag_size" name="pag_size" value="<?php echo $pag_size ?>" autofocus>
                <div><input type="submit" id="Cambiar" value="Cambiar!"></div>
            </form><br><br>
        </nav>

        <div class="cuadroAD">
            <div class="DescripcionBotones">
                <span class="TextoEditar">
                    Editar
                </span>
                <span class="TextoBorrar">
                    Borrar
                </span>
                <span class="TextoNombre">
                    Nombre
                </span>
                <span class="TextoApellido1">
                    Primer Apellido
                </span>
                <span class="TextoApellido2">
                    Segundo Apellido
                </span>
                <span class="TextoSexo">
                    Sexo
                </span>
                <span class="TextoFecha1">
                    Fecha Llegada
                </span>
                <span class="TextoFecha2">
                    Fecha Salida
                </span>
            </div>

            <?php foreach ($filas as $pagina) { ?>

                <form method="post" action="controlarAdministracionDirector.php" class="muestraFormulario">

                    <div id="botones_modificacion" class="botones_modificacion">

                        <!--No hemos podido cambiar la imagen de los botones a los símbolos ascii.
                            Como usted vió en clase, no coge los símbolos ascii y se quedan vacíos-->
                        <?php if (isset($reserva["DNI"]) && $reserva["DNI"] == $pagina["DNI_R"]) { ?>
                            <button class="buttonAD" id="modificar" class="modificar" type="submit" name="modificar">
                                <img src="http://www.fileformat.info/info/unicode/char/2714/heavy_check_mark.png" width="17px">
                            </button>
                        <?php } else { ?>
                            <button class="buttonAD" id="editar" class="editar" type="submit" name="editar">
                                <img src="https://www.fileformat.info/info/unicode/char/2702/black_scissors.png" width="17px">
                            </button>
                        <?php } ?>
                        <button class="buttonAD" id="borrar" class="borrar" type="submit" name="borrar">
                            <img src="http://www.fileformat.info/info/unicode/char/270f/pencil.png" width="17px" height="22px"/>
                        </button>
                    </div>

                    <div id="input_display" class="input_display">
                        <input id="DNI" name="DNI" type="hidden" height="40px" value="<?php echo $pagina["DNI_R"]; ?>" />
                        <input id="NOMBRE" name="NOMBRE" type="text" value="<?php echo $pagina["NOMBRE"]; ?>" />
                        <input id="APELLIDO1" name="APELLIDO1" value="<?php echo $pagina["APELLIDO1"]; ?>" />
                        <input id="APELLIDO2" name="APELLIDO2" value="<?php echo $pagina["APELLIDO2"]; ?>" />
                        <input id="SEXO" name="SEXO" type="text" value="<?php echo $pagina["GENERO"]; ?>" />
                        <input id="FECHALLEGADA" name="FECHALLEGADA" type="text" value="<?php echo $pagina["FECHA_INICIO"]; ?>" />
                        <input id="FECHASALIDA" name="FECHASALIDA" type="text" value="<?php echo $pagina["FECHA_FIN"]; ?>" />
                    </div><br>
                    
                    <!--Función de debugg de Administración director-->
                    <!-- <?php foreach ($_SESSION["reserva"] as $res) echo "<br>Lo que hay dentro de reserva: " . $res ?> -->
                    <!-- <?php if (isset($_SESSION["dentro"])) {
                                echo $_SESSION["dentro"];
                                unset($_SESSION["dentro"]);
                            } else ?> -->

                </form>

            <?php   } ?>
        </div>
    </main>
    <?php
    include "php/pie.php";
    ?>
</body>

</html>
