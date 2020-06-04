<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profesionales</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- STYLES -->
	  <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>

	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
	
	<style>

body {
	margin: 0;
	margin-bottom: 40px;
	}
.wrapper {
	width: 100%;
	margin-left: 30px;
	display: grid;
	grid-gap: 4rem 20em;
	grid-template-columns: 120px 120px 120px;
	grid-template-rows: 110px 110px 10px;		
}

.div-text{
	margin-top: 10px;		
}
.icono {
	font-size: 4em;		
	color: green;
}
.one {
	grid-column: 1;
	grid-row: 1;					
	text-align: center;
				
}
.two { 
	grid-column: 2;
	grid-row: 1;			
	text-align: center;	
}
.three {
	grid-column: 3;
	grid-row: 1;
	text-align: center;		
}
.four {
	grid-column: 1;
	grid-row: 2;
	text-align: center;
}
.five {
	grid-column: 2;
	grid-row: 2;		
	text-align: center;
}
.six {
	grid-column: 3;
	grid-row: 2;		
	text-align: center;
}
.seven {
	grid-column: 1;
	grid-row: 3;		
	text-align: center;
}
.aviso_message {
		color: red;
		text-align: center;
	}
</style>


</head>

<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>
        <div class="menu-uno">
            <div class="menu-uno-usuario">				
				<?php if($this->session->userdata('nombre') != null) {?>
				<?="Profesional: ". $this->session->userdata('nombre') . " " . $this->session->userdata('apellido'); }?>
            </div>
            <div class="menu-uno-btn">
                <a href="" class="btn-turnos">TURNOS</a>
                <a href="<?=base_url('profesional/acceso_profesionales')?>" class="menu-uno-link">INICIAR SESIÓN PSICOLOGOS</a>			
            </div>
        </div>
        <div class="menu-dos">
            <div class="menu-dos-img"><img src="<?=base_url()?>application/assets/img/divan.png" class="imgLogo" /></div>
            <div class="menu-dos-text">Terapia Virtual</div>
            <div class="menu-dos-link">
                <a href="<?=base_url('Welcome')?>" class="menu-dos-link-text">INICIO</a>                
                <a href="" class="menu-dos-link-text">NOSOTROS</a>
                <a href="<?=base_url('webcam')?>" class="">WEBCAM</a>
                <a href="" class="menu-dos-link-text">INICIO</a>			
            </div>
        </div>
    </header>
	<section>		
		<div class="wrapper">
			<a href="<?=base_url()?>"><div class="one"><i class="fas fa-home icono" title="Inicio"></i><label class="div-text">Inicio</label></div></a>
			<a href="<?=base_url('profesional/profesional_save/'.$this->session->userdata('id'))?>"><div class="two"><i class="fas fa-user-edit icono" title="Modificar datos"></i><label class="div-text">Modificar datos</label></div></a>			
			<a href="<?=base_url('profesional/find_all_eventos?prof='.$this->session->userdata('id'))?>"><div class="three"><i class="fas fa-clock icono" title="Horarios"></i><label class="div-text">Horarios</label></div></a>			
			<a href=""><div class="four"><i class="fas fa-notes-medical icono" title="Historial"></i><label class="div-text">Historial</label></div></a>
			<a href=""><div class="five"><i class="fas fa-credit-card icono" title="Pagos"></i><label class="div-text">Pagos</label></div></a>
			<a href=""><div class="six"><i class="fas fa-key icono" title="cambiar contraseña"></i><label class="div-text">Cambiar contraseña</label></div></a>
			<a href="<?=base_url('login/logout')?>"><div class="seven"><i class="fas fa-power-off icono" title="Salir"></i><label class="div-text">Salir</label></div></a>
		</div>
    </section>
    <footer>	
		<div class="copyrights">
			<p>&copy; <?= date('Y') ?> Desarrolado por J.I.F</p>
		</div>
    </footer>
</body>
</html>