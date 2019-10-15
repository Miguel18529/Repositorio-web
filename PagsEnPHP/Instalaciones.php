<?php
session_start();
?>﻿
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
        
        <h2 class="titulo">
            Instalaciones
        </h2>
        <h2 class="titulo2">
            Sala de Estudio
        </h2>
        <img class="centroInst" src="imagenes/sala_estudio.jpg"/>
        <p>
            La sala de estudio es un lugar de tranquilidad y perfectamente equipado para realizar trabajos o simplemente
            poder estar en silencio
            para poder estudiar. En estas salas las cuales se pueden reservar para estar aislado de cualquier ruido,
            podras encontrar enchufes para
            usar , un televisor con sus respectivos cables de conexión externa; tanto VGA como HDMi, una pizarra, un
            proyector.
        </p>
        <h2 class="titulo2">
            Sala Común
        </h2>
        <img class="centroInst" src="imagenes/sala_comun.jpg"/>

        <p>
            El centro dispone de una sala común en la que los residentes pueden relajarse y socializar con el resto de
            personas que aquí reside
            esta sala cuenta con varios televisores, dos mesas de billar, cinco dianas de dardos, maquinas de cafe, una
            amplia programación de
            películas para el disfrute de los asistentes. En este sitio podras venir con compañeros y amigos para
            disfrutar y descansar en compañia.
        </p>

        <h2 class="titulo2">
            Jardines
        </h2>
        <img class="centroInst" src="imagenes/jardin.jpg"/>

        <p>
            El equipo de mantenimiento se enorgullece de los preciosos jardines de los que disponemos, con una vadiedad
            de flores olorosas, ademas
            de zonas de sombra proporcionada por nuestros árboles perfectamente cuidados, cercanos siempre a bancos
            donde poder sentarte. Un jardin
            hermoso para pasar la tarde y respirar aire puro mientras hablas con amigos o simplemente contemplas las
            flores.
        </p>

        <h2 class="titulo2">
            Comedor
        </h2>
        <img class="centroInst" src="imagenes/comedor.jpg"/>

        <p>
            El centro tampoco escatima gastos, y mucho menos para una de las cosas mas importantes para todo estudiante, la alimentación
            tanto es asi que nuestros cocineros elaboran cada semana un menú variado para cada día, ayudados por nutricionistas de confianza
            que nos permiten ofrecer una dieta equilibrada para nuestros huespedes. Y es que algo tan importante no podia descuidarse, y como 
            debe ser, tambien disponemos de personal encargado de preparar exclusivamente menús especiales ya sea por algun tipo de alergia
            intolerancia o por cuestion de religion. 
        </p>



    </div>
    
    <?php
    include "php/pie.php";
    ?>
</body>

</html>
