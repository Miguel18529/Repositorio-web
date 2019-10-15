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
    <div class="cuerpo2">
        <div>
            <img class="derRes" src="imagenes/fachada1.jpg"/>
            <p> Residencia Bahía, se encuentra situada muy cerca del Campus Universitario Rio San Pedro (Puerto Real),
                creada y
                orientada para alojamientos de universitarios, profesores o trabajadores. </p>

            <p> Viene a cubrir una necesidad importante para las personas que vengan a Cádiz y ofrecerles cuantos
                servicios y
                comodidades puedan tener en ésta Residencia. Estos fueron los proyectos y objetivos de sus promotores en
                una zona
                ideal muy proxima al Campus.</p>

            <p>Orientada a ser una segunda vivienda familiar, donde las personas se encuentren como en su propia casa,
                con buen ambiente y salas adecuadas y confortables que invitan al recogimiento.
                Complementariamente dispone de zonas ajardinadas que ayudan igualmente a disfrutar del medio ambiente.
            </p>

        </div>

        <div>
            <img class="izqRes" src="imagenes/comedor.jpg"/>
            <p>Entre sus instalaciones podemos encontrar un comedor, en el cual se servirá por parte de nuestro personal
                culificado de cocina,
                una extensa variedad de productos, un menú especial diario, frutas de temporada, pescados y toda clase
                de comida. </p>

            <p> Tambien se atenderan las necesidades especiales de los comensales,
                ya sea por motivos alergenos o por religiosos para que te sientas como en tu propio hogar
            </p>
            <p>
                Para tener derecho a comer en dicho comedor se debera notificar de que se quiere diponer a tal
                servicio
                ya que este tiene un coste a dicional al precio de la reserva de alojamiento, Tambien existe la
                posibilidad
                de solicitar que la comida se lleve a la habitación del residente para mayor comodidad, pero este
                servicio debe ser
                avisado con tiempo de sobra para que se pueda realizar tal petición.

            </p>
        </div>
        <div>
            <img class="derRes" src="imagenes/mantenimiento.jpg"/>
            <p> Otra de las cosas que esta residencia puede destacar es su servicio de mantenimiento al igual que el de
                limpieza, el cual
                es uno de los mas valorados entre todas las residencia de la provincia de Cadiz. </p>

            <p> Ambos Servicios resaltan por su puntualidad y calidad, disponiendo de un personal de limpieza amplio que
                limpieza de
                forma semanal hasta 3 veces tanto las instalaciones del centro, como los dormitorios y casas. Intentando
                siempre
                molestar lo menos posible a los residentes para que estos no noten su presencia.
            </p>

            <p>El servicio de mantenimiento, tambien es destacable por su su disponiblidad y valocidad al arreglar
                cualquier desperfecto
                en las viviendas que se hayan ocacionado por deterioro de las instalaciones o cualquier accidente ajeno
                a los inquilinos, ademas
                de mantener siempre las intalaciones en perfecto estado</p>
        </div>
    </div>
    <?php
    include "php/pie.php";
    ?>
</body>




</html>
