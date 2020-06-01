<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Olvidé mi contraseña</title>

     <!--JQUERY-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/administracionStyle.css"/>
  </head>  
  <style>
        html {
			min-height: 100%;
			position: relative;
		}
		body {
		margin: 0;
		margin-bottom: 40px;
		}
		footer {
		background-color: black;
		position: absolute;
		bottom: 0;
		width: 100%;
		height: 40px;
		color: white;
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
    <div class="volver">        
            <a href="<?=base_url('administrador')?>">Volver</a>        
    </div>
    <section>    
        <div class="contain">    
            <table>
                <?php foreach($query as $row ){?>
                <tr>
                    <td><?=$row->nombre?></td>
                    <td><?=$row->apellido?></td>
                    <td><?=$row->email?></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </section>
    
    <footer>	
		<div class="copyrights">
			<p>&copy; <?= date('Y') ?> Desarrolado por J.I.F</p>
		</div>
    </footer>
  </body>
</html>