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

	
	.imgLogo {
		margin-bottom: 3px;
		width: 70px;
		height: 50px;
	}

	.textLogo {
		text-align: left;
		width: 250px;
		margin-top: 0.4em;
		margin-left: 1em;
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
</style>
   
    <body>

<!-- HEADER: MENU + HEROE SECTION -->
        <header>
            <div class="menu">
                <ul>
                    <li class="logo">
                        <div class="divLogo">
                            <a href="<?=base_url('cliente/home_clientes')?>"><img src="<?=base_url()?>application/assets/img/divan.png" class="imgLogo" /></a>
                        </div>
                        <div class="textLogo">
                            <p>TerapiaVirtual</p>
                        </div>
                    </li>                  
                </ul>
            </div>
        </header>     

    </body>
</html>

