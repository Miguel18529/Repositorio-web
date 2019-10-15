<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta title="Residencia Estudiantil Digital">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/cssInicio.css"/>
    <link rel="icon" type="image/png" href="imagenes/LogoRED.jpeg" />
    <Title>Residencia de estudiantes bahía</Title>
</head>

<body>
    <?php
    include "php/menu.php";
    ?>
	<div class="cuerpo2CLL">
    <h2 class="ubi-textCLL">Residencia de estudiantes Bahía</h2>

        <div id="all">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3205.850105977093!2d-6.198180984717585!3d36.53361048000445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0dcdd53820fc45%3A0x6b11cb52d77977a0!2sResidencia+de+Estudiantes+Bah%C3%ADa!5e0!3m2!1ses!2ses!4v1551192901730">ss</iframe>
        </div>
        <address>
            <label>
                C/S.Alejandro, 179<br>
            </label>
            <label>
                11510<br>
            </label>
            <label>
                Puerto Real<br>
            </label>
            <label>
                Cádiz<br>
            </label>
            <label>
                Cercana a la estación de trenes de Puerto Real<br>
            </label>
        </address>
    </div>
    <?php
    include "php/pie.php";
    ?>
</body>

</html>