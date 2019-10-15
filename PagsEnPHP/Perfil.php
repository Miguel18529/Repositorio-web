<?php
session_start();
require_once("gestionAdministracion_Usuario.php");

//si hay usuario (que debería de haber, y si no se devuelve al login), extraigo de él las fechas y si ha pagado el comedor.
if (isset($_SESSION['login'])) {
    $correo = $_SESSION['login'];
    $conn = crearconexionBD();
    $comedor = extraerPagoComedor($conn, $correo);
    if (isset($comedor)) {
        $comedorValor = $comedor[0]["PAGOCOMEDOR"];

        if ($comedorValor == 0) {
            $comedorValor = 'No';
        } else {
            $comedorValor = 'Si';
        }
    }
    $fechas = extraerFechasLlegadaSalida($conn, $correo);
    cerrarConexionBD($conn);
} else {
    Header("Location: Inicio_sesion.php");
}


?>

<?php
        include "php/funciones.php";
        ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta title="Residencia Estudiantil Digital">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/cssInicio.css">
    <link rel="icon" type="image/png" href="imagenes/LogoRED.jpeg">
    <Title>Residencia de estudiantes bahía</Title>
</head>

<body>

    <?php
    include "php/menu.php";
    ?>

<img class="imgPerfil" src="imagenes\avatar.png" alt="ImagenDelUsuario" class="adminI">
    <div id="mensaje" class="mensajePerfil">
        <!--Extraigo el usuario que se ha aportado al incio de sesion -->
        Bienvenido <?php if ($correo != "") echo $correo; ?>, inicio de sesión correcto.<br>
        Esperamos que tenga una buena estancia en nuestra residencia.
        </p>
    </div>


    <main>
    	 
        <form class="formPer" method="GET">      
            <fieldset class="fieldsetRes">
            	<legend class="underline">Reserva de salas</legend>
                <label class="adminL">Reserve para hoy:</label>
                    
                    <label class="labelRes" for="paises"> Desde:
                    <select class="P_Ajuste_Hora" name="paises" id="paises">
                          
                        <?php
                        $selected = "";
                        foreach ($horas as $p => $horas) {
                            $selected = ($p == $default_hora) ? "selected" : "";
                            echo "<option $selected value='$p'>$horas</option>";
                        }
                        ?>
                    </label>
                </section>
                
                
                <select class="sectionRes">
                
                <label class="labelRes" > Hasta :
                <select class="sectionRes" >    
                        <?php
                        $selected = "";
                        foreach ($horas2 as $p => $horas2) {
                            $selected = ($p == $default_hora2) ? "selected" : "";
                            echo "<option $selected value='$p'>$horas2</option>";
                        }
                        ?>
                    </label>  
                    
                </section>
               

            </fieldset>
            <div><input type="submit" value="Enviar"> </div>
        </form>
    </main>
    
    <div class="gridPerfil">
    	<div class="divPerfilLeft">
    	<section class="sectionPerfil1">
            <span>Fecha último pago</span>
        </section>
        <section class="sectionPerfil1">
            <span> Pago realizado</span>
        </section>
        <section class="sectionPerfil1">
            <span>Habitación Actual</span>
    	</section>
    	<section class="sectionPerfil1">
            <span>Fecha de llegada</span>
         </section>
         <section class="sectionPerfil1">
            <span>Fecha de partida</span>
        </section>
        <section class="sectionPerfil1">
            <span>Comedor Pagado</span>
        </section>
    	</div>
    	<div class="divPerfilRight">
        <section class="sectionPerfil2">
            <!-- Extraigo la fecha de pago de la residencia de la base de datos-->
            <span class="adminR2"> <?php if (isset($fechas[0]["FECHA_INICIO"])) echo $fechas[0]["FECHA_INICIO"];
                                    else echo "<span class='error'> No hay fecha </span>" ?></span>             
        </section>
        <section class="sectionPerfil2">
            <span class="adminR3"> Sí</span>
        </section>
             
        <section class="sectionPerfil2">
            <span class="adminR3"> WIP</span>
        </section>
        
        <section class="sectionPerfil2">
            <!--Extraigo la fecha de entrada de la base de datos-->
            <span class="adminR2"> <?php if (isset($fechas[0]["FECHA_INICIO"])) echo $fechas[0]["FECHA_INICIO"];
                                    else echo "<span class='error'> No hay fecha </span>" ?></span>
        </section>
        <section class="sectionPerfil2">
            <!--Extraigo de la base de datos la fecha de salida que se especifica en la reserva-->
            <span class="adminR2"> <?php if (isset($fechas[0]["FECHA_FIN"])) echo $fechas[0]["FECHA_FIN"];
                                    else echo "<span class='error'> No hay fecha </span>" ?></span>
        </section>
        <section class="sectionPerfil2">
            <span class="adminR3"><?php if (isset($comedorValor)) echo $comedorValor;
                                    else echo "<span class='error'> dato no encontrado </span>" ?></span>
        </section>
        </div>
        
        
    </div>


    <?php
    include "php/pie.php";
    ?>
</body>

</html>
