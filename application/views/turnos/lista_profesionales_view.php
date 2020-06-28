<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>   
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/tarjetas.css"/> 
    
  
        <style>
           
            .clasificacion {
            position: relative;
            display:flex;
            flex-direction: row;
            overflow: hidden;                     
            justify-content: center;
            }

            .clasificacion input {
            position: absolute;
            
            top: -100px;
            }

            .clasificacion label {
            float: right;
            padding-right: 15px;
            font-size: 20px;
            color: #333;
            }

            .clasificacion label:hover,
            .clasificacion label:hover ~ label,
            .clasificacion input:checked ~ label {
            color: #dd4;
            }

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
                    <img src="<?=$item["pr_foto"]?>"/>
                </a>
                <h2>Lic.&nbsp;<?=$item['pr_apellido'].", ".$item['pr_nombre']?></h2>
                <h4>Psicologo</h4>
            </div>
            <div class="description">
                <div class="clasificacion">
                    <input id="radio1" type="radio" name="estrellas" value="5">
                    <label for="radio1">★</label>
                    <input id="radio2" type="radio" name="estrellas" value="4">
                    <label for="radio2">★</label>
                    <input id="radio3" type="radio" name="estrellas" value="3">
                    <label for="radio3">★</label>
                    <input id="radio4" type="radio" name="estrellas" value="2">
                    <label for="radio4">★</label>
                    <input id="radio5" type="radio" name="estrellas" value="1">
                    <label for="radio5">★</label>
                </div>
            
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