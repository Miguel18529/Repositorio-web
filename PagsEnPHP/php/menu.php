<div>
	<div class="example1">
            <a href="Inicio_sesion.php" target="_blank">
            <img src="imagenes/LogoRED.jpeg" alt="Logo"
                class="ImgUS">
    		</a>
    		<h2 class="texto-chulo">
       			 Residencia Estudiantil Digital
    			</h2>
            
    </div>
        <div class="sticky">
                    <!-- start nav -->
        <nav id="menu">
                <!-- start menu -->
                <ul>
                <li><?php if (!(isset($_SESSION['login']))) {	?>
                	<a href="formulario-reserva.php">Reserva</a><?php } ?>
                	</li>
                	
                <li><?php if (!(isset($_SESSION['login']))) {	?>
               	<a href="inicio_sesion.php">Iniciar Sesión</a><?php } ?>
               	</li>
                <li><a href="Como-llegar.php">Como Llegar</a></li>
                <li><?php if (isset($_SESSION['login'])) {	?>
				<a href="logout.php">Cerrar Sesión</a>
			<?php } ?>
		</li>
		
		<li><?php if ((isset($_SESSION['login']))) {	?>
				<?php if($_SESSION['login']== 'margarita@gmail.com'){?>
				<a href="AdministracionDirector.php">Administrar</a>
			<?php }} ?>
		<li><?php if (isset($_SESSION['login'])) {	?>
				<?php if($_SESSION['login'] != 'margarita@gmail.com'){?>
				<a href="Perfil.php">Perfil</a>
			<?php }} ?>
		</li>
                <li><a href="Residencia.php">Residencia</a>
                <!-- start menu desplegable -->
                    <ul>
                        <li><a href="Instalaciones.php">Instalación</a></li>
                        <li><a href="Conocenos.php">Conócenos</a></li>
                        <li><a href="Contacto.php">Contacto</a></li>
                        <li><a href="Servicios.php">Servicios</a></li>
                        </ul>
                        <!-- end menu desplegable -->
                    </ul>
                </li>
                <!-- end menu -->
                </nav>
                <!-- end nav -->
</div>
