<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>
    <!--JQUERY-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    
    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/footer.css"/>
    
    
    <style>     
        .container {
            margin-top: 20px;
            padding-bottom: 500px;
            border: 1px solid;
            justify-content: center;
            align-items: center;
            align-self: center;
        }

        .card-text {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }
        
        #avatar {
            width: 160px;
            height: 140px;
            
        }
    </style>
</head>
<body>
<header>
    <div class="menu-uno">
        <div class="menu-uno-usuario">				
            <?php if($this->session->userdata('nombre') != null) {?>
            <?="Profesional: ". $this->session->userdata('nombre') . " " . $this->session->userdata('apellido'); }?>
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
<div class='container'>    
<?php
    if(isset($profesionales)){
        foreach($profesionales as $item){            
            echo '
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="'.$item["foto"].'" id="avatar"/>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Lic. '.$item["nombre"].' '.$item["apellido"].'</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted"><a href="'.base_url('turnos/ver_horarios?id='.$item["id"]).'">Ver horarios...</a></small></p>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
    }
?>

</div><!-- container -->

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