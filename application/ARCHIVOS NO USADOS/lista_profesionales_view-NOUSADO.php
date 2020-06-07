<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>
    <!--JQUERY-->
    <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    
    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/footer.css"/>
    
    
    <style>     
        .container {
            padding-bottom: 500px;
        }
        #avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .listado-profesionales {
            margin-top: 10px;            
            font-size: 26px;
            
            text-align: center;
        }
        .listado-profesionales-t {
            text-align: center;
        }
        ul{           
            width: 400px;
        }
        ul li{
            padding-top: 20px;
        }
        #horarios{
            margin-top: 10px;
            color: red;
            border: 1px solid;
            height: 300px;
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
    <div class="container">
        <div class="listado-profesionales">Listado de profesionales</div>
        <div class="listado-profesionales-t">Seleccione el profesional para ver sus horarios de atención</div>
            <ul>
                <?php 
                if(isset($query)){
                    $array = (array)json_decode($query);
                
                    foreach($array as $clave => $item){

                        echo ' <li> <img src="'.$item->foto.'" id="avatar"/>                           
                                <a href="javascript:mostrar_horarios('.$item->id.')" id="horarios">Lic. '.$item->nombre.' '.$item->apellido.'</a>                   
                                </li>
                        ';
                    }}?>
                
            </ul>
            
            <div id="horarios">
                   
                
            </div>
    </div>
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
    <script>
        
        function mostrar_horarios(idProf){
            url = '<?=base_url()?>profesional/find_horarios';
            var coment = $.ajax({
                url:url,
                dataType: 'text',//indicamos que es de tipo texto plano
                async: false,     //ponemos el parámetro asyn a falso            
                type:"POST",
                data:{idProf:idProf}
            }).responseText;  //ejecuta la consulta y devuelve formato texto            
            if(coment == ""){

            }else{            
                    alert(coment);
                    document.getElementById('horarios').innerHTML = coment;
                    
                   
            }          
        }
    </script>
</body>
</html>