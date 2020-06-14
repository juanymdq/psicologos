<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>
    
    <style>     
     
     .container {
            margin-top: 20px;
            padding-bottom: 50px;     
            border: 1px solid;            
        }

        .card-text {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }
        
        #avatar {
            width: 160px;
            height: 140px;
            
        }
        .horarios {
            border: 1px solid;
            width: 500px;
            height: 500px;
            margin-top: 10px;
        }
      .profesional {
        margin-left: 70px;
        margin-top: -2em;
        
            
      }
    </style>
</head>
<body>

    <section>
    <h2>SELECCIÓN DE HORARIO DE ATENCIÓN</h2>
    <a href="<?=base_url('turnos')?>" class="btn btn-default">Volver</a>
    <div class="container">
        <div class="profesional">
            <?php  
            foreach($prof as $item){            
                    echo '
                    <div class="card mb-3" style="max-width: 540px;  background-color: rgba(163, 211, 223, 0.8); ">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="'.$item["foto"].'" id="avatar"/>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Lic. '.$item["nombre"].' '.$item["apellido"].'</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                }
            ?>
        </div>       
    
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
    
        <h2>Paginacion</h2>

        <?php
        if(!$_GET['pagina']){
            header('Location:'.base_url('turnos/ver_horarios?id='.$_GET['id'].'&pagina=1'));
        }  

        ?>
        <?php $i = ($_GET['pagina']-1) * $filas_x_pagina;
              $fin = ($_GET['pagina']-1) * $filas_x_pagina;
        while($i < $filas_x_pagina + $fin) { 
            $item = array_values($horarios)[$i]
            ?>
        <div class="alert alert-primary" role="alert">
            <?=$item['fecha_string']?>
        </div>
        <?php $i++;
        } ?>
       

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
    
    </div><!--horarios-->
            </div>

    </section>
   
</body>
</html>