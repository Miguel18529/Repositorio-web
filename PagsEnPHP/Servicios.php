<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta title="Residencia Estudiantil Digital">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/cssInicio.css" />
    <link rel="icon" type="image/png" href="imagenes/LogoRED.jpeg" />
    <Title>Residencia de estudiantes bahía</Title>
</head>

<body>
    <?php
    include "php/menu.php";
    ?>
    <div class="cuerpo2">
    <div class="margen">
        <h4 class="titulo">
            Servicios
        </h4>
        <h4 class="titulo2">
            Comedor
        </h4>
        <img class="centrar2Ser"  src="http://www.cmuchaminade.com/sites/default/files/bigwig/Colegio%20Mayor%20Chaminade%20-%20Residencia%20de%20estudiantes%20Chaminade%20-%20Colegio%20Mayor%20Madrid%20-%20Residencia%20de%20estudiantes%20Madrid%20-%20comedor%203_0.jpg"/>
        <p>
            El servicio de comedor, puede ser pedido de forma opcional, con un coste adicional.
            Incluye almuerzo completo. Este servicio estará disponible cuando un mínimo de 30 residentes lo hayan
            solicitado en el contrato.
        </p>
        <h4 class="titulo2">
            Mantenimiento
        </h4>
        <img class="centrar2Ser" src="https://www.ithotelero.com/wp-content/uploads/2018/08/foto-6-checklist-parte-averias.png"/>

        <p>
            Esta residencia consta con un eficiente servicio de mantenimiento que se encargará de la
            reparación de cualquier desperfecto en la misma. En caso de que el desperfecto sea causado por un
            residente, este pagará los gastos pertinentes.
        </p>

        <h4 class="titulo2">
            Vigilancia
        </h4>
        <img class="centrar2Ser" src="https://www.anulimpiezas.net/wp-content/uploads/2017/02/conserjeria2.jpg"/>

        <p>
			El servicio de vigilancia, es el encargado de evitar que personas no autorizadas entren
            en la residencia, así como de defender la misma de cualquier peligro externo, como ladrones o maleantes.
        </p>

        <h4 class="titulo2">
            Limpieza
        </h4>
        <img class="centrar2Ser" src="http://www.ajofrin.es/wp-content/uploads/2018/04/personal-limpieza.png"/>

        <p>
         	El contrato de la residencia incluye nuestro servicio de limpieza. Los residentes
            podrán disponer de limpieza en sus habitaciones todos los viernes. Además de ser el encargado de la limpieza
            post-estancia.
        </p>



    </div>	
    </div>
    <?php
    include "php/pie.php";
    ?>
</body>

</html>
