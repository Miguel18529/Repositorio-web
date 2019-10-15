<?php
	session_start();
  	
  	include_once("conexionBD.php");
 	include_once("funcionLogin.php");
    
     //Escribimos las funciones y validamos que exista el usuario con su email y contraseña
	if (isset($_REQUEST['Enviar'])){
		$email= $_REQUEST['Email'];
		$pass = $_REQUEST['Contraseña'];
		$conexion = crearconexionBD();
		$num_usuarios = consultarUsuario($conexion,$email,$pass);
		cerrarConexionBD($conexion);	
	
		if ($num_usuarios == 0)
			$login = "error";	
        
        else {
            //Si se da el caso de que el usuario es nuestro administrador, se redigirá a administracionDirector
            //Desde la página de reserva no se puede crear dos veces el mismo correo
            $_SESSION['login'] = $email;
            if($_SESSION['login'] == 'margarita@gmail.com') Header("Location: AdministracionDirector.php");
			else Header("Location: Perfil.php");
		}	
	}
?>

<!DOCTYPE html>
<html lang="es">
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
    <div>
        <main class="mainInSes">
            <form method="get" action="Inicio_sesion.php">
                <fieldset class="fieldInSes">
                    <legend><u> Iniciar sesión</u></legend>
                    <section>
                        <label>
                            Email: <input class = "botonInSesEmail" type="text" name="Email" id="Email" placeholder="EmailDeEjemplo@gmail.com" required>
                        </label>
                    </section>
                    <section>
                        <label>
                            Contraseña: <input class = "botonInSes" type="password" name="Contraseña" id="Contraseña" placeholder="Ejemplo: 123456abcdef" required>
                        </label>
                        <div>
                            <label>
                                ¿Aun no has hecho tu reserva? <a href="formulario-reserva.php">Reserva Aquí</a>
                            </label>
                        </div>
                        	<label>
                        		   <?php if (isset($login)) {
									echo "<div class=\"error\">";
									echo "Error en la contraseña o no existe el usuario.";
									echo "</div>";
										}	
									?>
                        	</label>
                    </section>
                </fieldset>
                <input class = "botonInSes" type="submit" title="Enviar" name="Enviar" value="Iniciar Sesión">
            </form>
        </main>
    </div>
    <?php
    include "php/pie.php";
    ?>
</body>

</html>
