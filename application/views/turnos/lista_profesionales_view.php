<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>   
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/tarjetas.css"/> 
    
  
      <style>
     
</style>
   
</head>
<body>
    <h3>Staff de Profesionales</h3>
    <p>Haga click en la foto del profesional deseado para ver sus horarios de atención</p>
        <?php 
            if(isset($profesionales)){
                foreach($profesionales as $item){        
        ?>
        
    <div class="container">
        
        <div class="card-container">
            <div class="header">
                <a href="<?=base_url('cliente/ver_horarios_de_profesional')?>?id=<?=$item['id']?>" title="Ver horarios">
                    <img src="<?=$item["foto"]?>"/>
                </a>
                <h2>Lic.&nbsp;<?=$item['apellido'].", ".$item['nombre']?></h2>
                <h4>Psicologo</h4>
            </div>
            <div class="description">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod 
                    tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                    quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat.</p>
                <div class="social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>                              
    </div>
        <?php }
            }
        ?>
</body>
</html>