<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
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
</head>
<style>

		body {
		margin: 0;
		margin-bottom: 40px;
		}
	
	.wrapper {
		width: 700px;
		margin-left: 30px;
		display: grid;
		grid-gap: 4rem 20em;
		grid-template-columns: 120px 120px 120px;
		grid-template-rows: 120px 120px 120px;	
	}

	.div-text{
		margin-top: 10px;		
	}
	.icono {
		font-size: 6em;		
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
	.eigth {
		grid-column: 2;
		grid-row: 3;		
		text-align: center;		
	}
</style>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
	<header>
		<div class="menu">
			<ul>
				<li class="logo">
					<div class="divLogo">
						<img src="<?=base_url()?>application/assets/img/divan.png" class="imgLogo" />
					</div>
					<div class="textLogo">
						<p>Espacio de terapia online</p>
					</div>
				</li>	
				<li class="item-user">Bienvenido</li>
				<li><?=$this->session->userdata('id')?></li>
				<li><?=$this->session->userdata('perfil')?></li>
				<li class="item-user"><?php echo $this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></li>
					
			</ul>
		</div>
	</header>
	<section>		
		<div class="wrapper">
			<a href="<?=base_url()?>"><div class="one"><i class="fas fa-home icono" title="Inicio"></i><label class="div-text">Inicio</label></div></a>
			<a href="<?=base_url('usuarios/user_save/'.$this->session->userdata('id'))?>"><div class="two"><i class="fas fa-user-edit icono" title="Modificar datos"></i><label class="div-text">Modificar datos</label></div></a>			
			<a href="<?=base_url('cliente/calendar')?>"><div class="three"><i class="fas fa-calendar-alt icono" title="Turnos"></i><label class="div-text">Turnos</label></div></a>			
			<a href=""><div class="four"><i class="fas fa-notes-medical icono" title="Historial"></i><label class="div-text">Historial</label></div></a>
			<a href=""><div class="five"><i class="fas fa-credit-card icono" title="Pagos"></i><label class="div-text">Pagos</label></div></a>
			<a href=""><div class="six"><i class="fas fa-key icono" title="cambiar contraseña"></i><label class="div-text">Cambiar contraseña</label></div></a>
			<a href="<?=base_url('login/logout')?>"><div class="seven"><i class="fas fa-power-off icono" title="Salir"></i><label class="div-text">Salir</label></div></a>
		</div>
    </section>
    <footer>	
	<div class="copyrights">
		<div class="container_footer">
			<div class="col_full">
				<div class="copyrights-menu">
					<a href="/">Inicio</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/acerca-de/">Acerca de</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="<?=base_url('Welcome/privacidad')?>">Política de Privacidad</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/ayuda/">Ayuda</a>
				</div>
				<div class="copyrights-text">
				Copyrights &copy; <?= date('Y') ?> Todos los derechos reservados.
				</div>
			</div>
		</div>
	</div>
    </footer>
</body>
</html>