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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/administracionStyle.css"/>
</head>
<style>
	.wrapper {
		width: 700px;
		margin-left: 30px;
		display: grid;
		grid-gap: 4rem 20em;
		grid-template-columns: 120px 120px 120px;
		grid-template-rows: 120px 120px 120px;	
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
			<li class="item-user"><?php echo $this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></li>
				
		</ul>
	</div>
</header>
    <section>
		
		<div class="wrapper">
			<a href="<?=base_url()?>"><div class="one"><i class="fas fa-home icono" title="Inicio"></i></div></a>
			<a href=""><div class="two"><i class="fas fa-calendar-check icono" title="Turnos"></i></div></a>
			<a href=""><div class="three"><i class="fas fa-user-md icono" title="Profesionales"></i></div></a>
			<a href=""><div class="four"><i class="fas fa-user icono" title="Clientes"></i></div></a>
			<a href=""><div class="five"><i class="fas fa-list-alt icono" title="Historial"></i></div></a>
			<a href=""><div class="six"><i class="fas fa-credit-card icono" title="Pagos"></i></div></a>
			<a href=""><div class="seven"><i class="fas fa-key icono" title="cambiar contraseña"></i></div></a>
			<a href="<?=base_url('login/logout')?>"><div class="eigth"><i class="fas fa-power-off icono" title="Salir"></i></div></a>
		</div>
    </section>
    <footer>

    </footer>
</body>
</html>