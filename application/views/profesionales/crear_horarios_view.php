<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>
    <!--JQUERY-->
    <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>application/assets/js/moment.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    
    
    
    <style>

     

        h3 {
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
        }
       
        .fechas-horas { 
            border-left: 1px solid #28D142 ;           
            text-align: left;        
            overflow: scroll;
            padding-bottom: 20px;
            margin-bottom: 120px;
            height: 400px;
        }
        
        
        .titulo-date {
            font-size: 20px;
            margin-bottom: 10px;
            border: 1px solid;            
        }
        .row {
            padding-left: 40px;
        }

    </style>
</head>
<body>
    
    <section>
        <h3>Agregue las fechas y horas de atención</h3>
        <?=(isset($error_message)) ? $error_message : ""?>
        <div class="container">   
        <!-- $route['profesional/agregar_horario/(:any)'] = 'Turnos/accion/$1'; -->
            <form action="<?=base_url('profesional/agregar_horario/agregar')?>" method="post" id="myForm" onsubmit="return enviar()">
                <div class="col-sm-4">   
                    <input type="hidden" name="id_profesional" value="<?=$this->session->userdata('id')?>"/>                 
                    <input type="hidden" name="fecha" id="fechadb" value=""/>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker8'>                        
                            <input type='text' class="form-control" id="txtFecha"   />                            
                            <span class="input-group-addon">
                                <span class="fa fa-calendar">
                                </span>
                            </span>
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <button type="submit" id="btnAgregar" class="btn btn-success">Agregar</button>
                        <!-- $route['profesional/cpanel'] = 'Profesional/profesional_cpanel'; -->
                        <a href="<?=base_url('profesional/cpanel')?>" id="btnVolver" class="btn btn-default">Volver</a>
                    </div>
                </div>
            </form>

            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker8').datetimepicker({locale:'es'});
                    
                });
            </script>
            
      

<!-- COMIENZO DE LA TABLA DE NAVEGACION DE HORARIOS DEL PROFESIONAL -->

        <div class="horarios">
        <?php
        //filas que queremos por pagina
        $filas = 7;
        //cantidad de fechas en BD
        $cont=0;
        if(!empty($horarios)){
            foreach($horarios as $item){
                $cont++;
            }

            $id = $item['id_profesional'];   
            //cantidad de botones a dibujar
            if($cont<=$filas){
                $paginas = 1;
                $filas_x_pagina = $cont;
            }else{
                $filas_x_pagina = $filas;
                $paginas = ceil($cont/$filas_x_pagina);
            }
        }

        
        
        ?>
    
        <h2>Horarios de atención</h2>
        <?php 
            if($cont==0){
                echo "<p>El profesional no posee horarios disponibles de atención</p>";
            }else{
        
                if(!$_GET['pagina']){
                    //header('Location:'.base_url('turnos/ver_horarios?id='.$_GET['id'].'&pagina=1'));

                    //$route['profesional/crear_horarios_de_profesional/(:any)'] = 'Turnos/ver_horarios/$1';                
                    header('Location:'.base_url('profesional/crear_horarios_de_profesional/'.$id.'?var=1&pagina=1'));
                }  

                ?>
                <?php
                /*
                $cont - $filas_x_pagina = $dif
                12 - 7 = 5

                */
                    //$dif = $cont - $filas_x_pagina;//8-7=1
                    $pagina = $_GET['pagina'];
                    $i = ($pagina-1) * $filas_x_pagina;
                    //$fin = ($pagina-1) * $dif; 
                    if($cont<=$filas_x_pagina) {
                        $fin = 0;
                    }else{
                        $a = $pagina * $filas_x_pagina;
                        $fin =  $i + ($cont - $filas_x_pagina);
                    }
                    //$fin = ($pagina-1) * ($filas_x_pagina + ($cont -(($pagina-1) * $filas_x_pagina)));
                while($i < $filas_x_pagina + $fin) { 
                    $item = array_values($horarios)[$i]
                    ?>
                <div class="alert alert-primary" role="alert">
                    <!-- $route['cliente/datos_del_turno/(:any)'] = 'Turnos/turno_cliente/$1'; -->
                    <?=$item['fecha_string']?>hs.
                </div>
                <?php $i++;
                } ?>
            
                <div class="nav">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?=$_GET['pagina'] <= 1 ? 'disabled' : ''?>">
                            <!-- $route['profesional/crear_horarios_de_profesional/(:any)'] = 'Turnos/ver_horarios/$1'; -->
                                <a class="page-link" href="<?=base_url('profesional/crear_horarios_de_profesional/'.$id.'?var=1&pagina=')?><?=$_GET['pagina']-1?>">
                                    Anterior
                                </a>
                            </li>

                            <?php for($i=0;$i<$paginas;$i++):?>
                            <li class="page-item <?=($_GET['pagina']==$i+1) ? 'active' : '' ?>">
                                <a class="page-link" href='<?=base_url('profesional/crear_horarios_de_profesional/'.$id.'?var=1&pagina=')?><?=$i+1?>'>
                                    <?=$i+1?>
                                </a>
                            </li>
                            <?php endfor?>

                            <li class="page-item <?=$_GET['pagina'] >= $paginas ? 'disabled' : ''?>">
                                <a class="page-link" href="<?=base_url('profesional/crear_horarios_de_profesional/'.$id.'?var=1&pagina=')?><?=$_GET['pagina']+1?>">
                                    Siguiente
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
        <?php }?>
    </div><!--horarios-->           




    </section>
  
    <script>   
    ///convierte la fecha seleccionada a formato db mysql "2020-06-01 12:00:00"
    $(document).ready(function() {
        $("#txtFecha").blur(function(){
            //obtengo la fecha y hora seleccionada
            var fh =$(this).val();                
            //divido la fecha de la hora por espacio  
            var fechahora = fh.split(" ");          
            //divido la fecha en dia mes y año por /  
            var temFecha = fechahora[0].split("/");
            //concateno para guardar en db mysql YYYY-mm-dd
            var fechaFinal = temFecha[2]+'-'+temFecha[1]+'-'+temFecha[0];
            //coloco la fecha y hora en el input
            $("#fechadb").val(fechaFinal+' '+fechahora[1]);                  
        });       
    });

    //Verifica que se agregue una fecha antes de guardarla
    function enviar() {        
        var formulario = document.getElementById("myForm");
        var fecha = document.getElementById('txtFecha').value;
        if(fecha=="") {
            alert('Agrege una fecha');
            return false;            
        } else {            
            return true;            
        }
    }
    </script>
</body>
</html>