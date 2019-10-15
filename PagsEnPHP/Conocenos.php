<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta title="Residencia Estudiantil Digital">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/cssInicio.css" />
    <link rel="icon" type="image/png" href="imagenes/LogoRED.jpeg">
    <Title>Residencia de estudiantes bahía</Title>
</head>

<body>

    <?php 
		include "php/menu.php";
	 	?>
    <!-- cuerpo de la pagina de inicio solamente, si estas con otro html no uses esta clase -->
    <div class="cuerpo2">
            <img class="imagenCon" src="imagenes/fachada1.jpg"/>
            <p class = "pCon"> Se estableció en la calle S.Alejandro, 179, con lo imprescindible, y tan
                solo quince alumnos. Tras su remodelación en 1983
                en un conjunto de edificios modernos de estilo neomudéjar provistos de los mejores adelantos de la época
                y con unas instalaciones con la
                luz y el sol como protagonistas. Se había empezado a construir en 1973 con un proyecto del arquitecto
                Luis Antonio de la Cruz Montero. </p>

            <p class = "pCon"> Alberto Rodriguez Guzmán, hombre vinculado a la Institución Libre de
                Enseñanza y al krausismo, fue su director en la época
                inicial, periodo en el que la Residencia se convirtió en un vivero de convivencia, creación e
                intercambio artístico y
                científico de la Europa de entreguerras. </p>

            <p class = "pCon"> Junto a Rodriguez Guzmán, la JAE puso como vocales de su Patronato, según
                real decreto de creación de la institución,
                a Ramón Menéndez Pidal (presidente), Nicolás Achúcarro, Gabriel Gancedo, Juan Antonio Güell, José Ortega
                y Gasset, Leopoldo Palacios,
                Antonio Vinent y Portuondo, Pedro Sangro y Ros de Olano y Juan Uña Shartou. </p>

            <p class = "pCon">Actualmente la residencia cuenta con un aforo superior a los 400 residentes,
                cuenta con las mas nuevas tecnologias y
                adaptado para buscar la mayor comodidad de aquellos que se hospeden en ella, es por ello que es
                considerada una de las mas prestigiosas
                residencias de toda la provincia de cadiz y etre las mejores de la comunidad Andaluza.</p>

            <p class = "pCon">Premida en 2004 por su calidad como centro y en 2010 por su antigüedad es una
                de las mejores elecciónes
                para pasar en ella tus dias como
                estudiante univeritario o para disfrutar de unos diás en sus maravillosas instalaciones con un estilo
                entre moderno y clasico que te
                soprendera agradablemente. Te esperamos con las puertas abiertas. </p>

            <a href="pagina_Base.php">
                <img class="imagen2Con" src="imagenes/panoramica1.jpg"/>
            </a>
        </div>
<?php 
	include "php/pie.php";
	 ?>
</body>




</html>
