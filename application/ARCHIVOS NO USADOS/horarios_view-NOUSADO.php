<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>application/assets/js/horarios/horarios.js"></script>
    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/footer.css"/>
    
    
    <style>     
       #flip-container{
        -webkit-perspective: 1000px;
        perspective: 1000px;
        padding: 50px;
        position: relative;
        margin: 10px auto;
        width: 500px;
        }
        .card {
        position: relative;
        width: 500px;
        height: 50px;
        transition: 0.6s;
        transform-style: preserve-3d;
        transform-origin: 100% 25px;
        margin: 5px;
        }
        .card:hover, .card.flip{
        transform: rotateX(180deg);
        }
        .front, .back{
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        text-align: center;
        }
        .front{
        transform: rotateX(0deg);
        z-index: 2;
        background-color: #e93e29;
        color: #FFF;
        font: 1em/1.8em Arial;
        display: flex;
        align-items: center;
        justify-content: center;
        }
        .back{
        transform: rotateX(180deg);
        background: repeating-linear-gradient(
            -45deg,
            #ececec,
            #ececec 10px,
            #dedede 10px,
            #dedede 20px
        );
        }
        .encabezados {
           width: 70px;
           border: 1px solid;
           text-align: center;
        }
    </style>
</head>
<body  onload="fechas();">
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

    <a href="<?=base_url('turnos')?>" class="btn btn-default">Volver</a>
    <div id="fecha"></div>   

    <ul>
    <?php            
    if(isset($horarios)){
        $cont = 0;
        foreach($horarios as $item){
            $cont += 1; 
            echo "<li id='fecha".$item['id']."'>".$item['fecha']."</li>";
        }

        $articuos_x_pagina = 7;
        $total_fechas = $cont;
        
        
        
        //********************************************************************
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        
        $bisiesto = date('Y') % 4;//comprueba si es año bisiesto
        $dia_numero = intval(date('d'));//numero de dia actual
       
        //arreglo de dias de la semana
        $dia = ['Dom.','Lun.','Mar.','Mié.','Jue.','Vie','Sab'];  
        //arreglo de meses
        $mes = ['','Ene.','Feb.','Mar.','Abr.','May.','Jun.','Jul.','Ago.','Sep.','Oct.','Nov.','Dic.'];
        //arreglo de cantidad de dias del mes
        $nmes = ['',31,($bisiesto==0) ? 29 : 28,31,30,31,30,31,31,30,31,30,31];        
        //getday() devuelve el siguiente array
        //Array ( [seconds] => 58 [minutes] => 2 [hours] => 11 [mday] => 7 [wday] => 0 
        //[mon] => 6 [year] => 2020 [yday] => 158 [weekday] => Sunday [month] => June 
        //[0] => 1591538578 ) Jun.30
        $hoy = getdate();        
        $txtmes = $mes[$hoy['mon']];//texto del mes en español        
        $dmes = $nmes[$hoy['mon']];//cantidad de dias del mes
        $paginas = ceil($dmes/$articuos_x_pagina);     
        ?>
        
        <table>
        <tr>
       
        <?php
        //Calculo para iniciar en fecha hoy
       // $iniciar = (($_GET['pagina'] - 1) * $articuos_x_pagina) + $dia_numero - 1;
        $j=1;
        
        $iniciar = (($_GET['pagina'] - 1) * $articuos_x_pagina) + $dia_numero - 1;
        $i = $iniciar;
        while($i <= $articuos_x_pagina + $iniciar && $j < $dmes) {
            $fecha = strtotime(date(date('Y').'-'.date('m').'-'.$i));
            $fecha=  date('w', $fecha);
            ?>

            <td colspan="2">
            <div class="encabezados">
                <?=$dia[$fecha].'<br>'?>
                <?php echo $i.' '.$txtmes?>
            </div>

            </td>
        <?php            
            $i++;
            if($i == $dmes) {
                $i = 1;
                $iniciar = 0;
            }
        }
              
       /*
        for($i = $iniciar + 1;$i <= $articuos_x_pagina + $iniciar; $i++) {
         
            $fecha = strtotime(date(date('Y').'-'.date('m').'-'.$i));
            $fecha=  date('w', $fecha);*/
            ?>

           
        <?php
         
        //}
       
        ?>
        
        </tr>
        </table>
      

    <?php }          
    ?>
    </ul>

    <div class="container-fluid">
        <br>
        <nav>
            <ul class="pagination" id="pag">

                <?php
                    if(!$_GET['pagina']){
                        header('Location:'.base_url('turnos/ver_horarios?id='.$item["id_profesional"].'&pagina=1'));
                    }
                ?>



                
                <li class="<?=$_GET['pagina'] <= 1 ? 'disabled' : ''?>">
                    <a href="<?=base_url('turnos/ver_horarios?id='.$item["id_profesional"].'&pagina=')?><?=$_GET['pagina']-1?>">
                        &laquo;
                    </a>
                </li>     

                <?php for($i=0;$i<$paginas;$i++){ ?>
                    <li class='<?=$_GET['pagina']==$i+1 ? 'active' : '' ?>'>
                        <a href='<?=base_url('turnos/ver_horarios?id='.$item["id_profesional"].'&pagina=')?><?=$i+1?>'><?=$i+1?></a>
                    </li>              
                <?php } ?>


                <li class="<?=$_GET['pagina'] >= 5 ? 'disabled' : ''?>">
                    <a href="<?=base_url('turnos/ver_horarios?id='.$item["id_profesional"].'&pagina=')?><?=$_GET['pagina']+1?>">&raquo;</a>
                </li>     
            </ul>
        </nav>
    </div>

    <div class="col-md-5">
        <nav>
            <ul class="pager">
                <li class="previous"><a href="#">&larr; Anterior</a></li>
                <li class="next"><a href="#">Siguiente &rarr;</a></li>
            </ul>
        </nav>
    </div>


    </section>
    <script>

      
    </script>
     <script>
                       
                            
    </script>
</body>
</html>