<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/tarjetas.css"/> 
    <style>     
     
        h2 {
            color: #4E94AE;
            text-decoration: underline;
            margin-bottom: 10px;
        }
        .horarios {
            text-align: center;           
            width: 400px;
            height: auto;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
        }
        .horarios nav {            
            text-align: center;
            margin-left: auto;
            margin-right: auto; 
            margin-bottom: 50px;                    
        }
        
    </style>
</head>
<body>
    
    <section>
    <h3>SELECCIÓN DE HORARIO DE ATENCIÓN</h3>    
    <p><a href="<?=base_url('turnos')?>" class="btn btn-default">Volver</a></p>
    <?php
        if(isset($prof)){
            $itemprof = array_values($prof)[0];       
    ?>
    <div class="container">
        
        <div class="card-container">
            <div class="header">
                <a href="#">
                    <img src="<?=$itemprof["foto"]?>"/>
                </a>
                <h2>Lic.&nbsp;<?=$itemprof['apellido'].", ".$itemprof['nombre']?></h2>
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
    <?php } ?>

    <div class="horarios">
    <?php
    //filas que queremos por pagina
    $filas = 7;
    //cantidad de fechas en BD
    $cont=0;
    foreach($horarios as $item){
        $cont++;
    }

    $id = $item['id_profesional'];   
    //cantidad de botones a dibujar
    if($cont<$filas){
        $paginas = 1;
        $filas_x_pagina = $cont;
    }else{
        $paginas = ceil($cont/$filas_x_pagina);
        $filas_x_pagina = $filas;
    }
    
    ?>
    
        <h2>Horarios de atención</h2>

        <?php
        if(!$_GET['pagina']){
            //header('Location:'.base_url('turnos/ver_horarios?id='.$_GET['id'].'&pagina=1'));
            header('Location:'.base_url('cliente/ver_horarios_de_profesional?id='.$_GET['id'].'&pagina=1'));
        }  

        ?>
        <?php $i = ($_GET['pagina']-1) * $filas_x_pagina;
              $fin = ($_GET['pagina']-1) * $filas_x_pagina;
        while($i < $filas_x_pagina + $fin) { 
            $item = array_values($horarios)[$i]
            ?>
        <div class="alert alert-primary" role="alert">
            <a href="<?=base_url('cliente/datos_del_turno')?>?id=<?=$item['id']?>"><?=$item['fecha_string']?>hs.</a>
        </div>
        <?php $i++;
        } ?>
       
        <div class="nav">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?=$_GET['pagina'] <= 1 ? 'disabled' : ''?>">
                        <a class="page-link" href="<?=base_url('turnos/ver_horarios?id='.$_GET['id'].'&pagina=')?><?=$_GET['pagina']-1?>">
                            Anterior
                        </a>
                    </li>

                    <?php for($i=0;$i<$paginas;$i++):?>
                    <li class="page-item <?=($_GET['pagina']==$i+1) ? 'active' : '' ?>">
                        <a class="page-link" href='<?=base_url('turnos/ver_horarios?id='.$_GET['id'].'&pagina=')?><?=$i+1?>'>
                            <?=$i+1?>
                        </a>
                    </li>
                    <?php endfor?>

                    <li class="page-item <?=$_GET['pagina'] >= $paginas ? 'disabled' : ''?>">
                        <a class="page-link" href="<?=base_url('turnos/ver_horarios?id='.$_GET['id'].'&pagina=')?><?=$_GET['pagina']+1?>">
                            Siguiente
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    
    </div><!--horarios-->           

    </section>
   
</body>
</html>