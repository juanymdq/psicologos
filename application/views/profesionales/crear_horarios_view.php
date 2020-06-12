<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>
    <!--JQUERY-->
    <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <script async="" src="//www.google-analytics.com/analytics.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>application/assets/js/moment.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    
    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/footer.css"/>
    
    <style>

        .container{      
            padding-bottom: 600px;      
            text-align: center;
            margin-top: 50px;
            height: 80px;
        }

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
    <header>
        <div class="menu-uno">
            <div class="menu-uno-usuario">				
				<?php if($this->session->userdata('nombre') != null) {?>
				<a href="<?=base_url('profesional/home_profesionales')?>"><?="Profesional: ". $this->session->userdata('nombre') . " " . $this->session->userdata('apellido'); }?></a>
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
        <h3>Agregue las fechas y horas de atención</h3>
        <?=(isset($error_message)) ? $error_message : ""?>
        <div class="container">   
            <form action="<?=base_url('turnos/accion?accion=agregar')?>" method="post" id="myForm" onsubmit="return enviar()">
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
                        <a href="<?=base_url('profesional/home_profesionales')?>" id="btnVolver" class="btn btn-default">Volver</a>
                    </div>
                </div>
            </form>

            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker8').datetimepicker({locale:'es'});
                    
                });
            </script>
            
            <div class="col-sm-5">
            <div class="titulo-date">Fecha y hora</div>
                <div class="fechas-horas">
                    <?php
                        if(!empty($horarios)){
                                                       
                            //Este seria si tuvieses mas de un indice dentro de tu json array
                            foreach($horarios as $item){       

                                echo '
                                <form action="'.base_url('turnos/accion?accion=eliminar').'" method="post">
                                    <div class="row">
                                        <input type="hidden" name="id" value="'.$item['id'].'"/>
                                        <input type="hidden" name="id_profesional" value="'.$item['id_profesional'].'"/>
                                        <div class="col-md-10">'.$item['fecha_string'].'</div>
                                        <div class="col-md-2">
                                            <button type="submit" id="btnEliminar">                                                
                                                <span class="fa fa-trash"></span>                                                
                                            </button>   
                                        </div>                                       
                                    </div>
                                </form>';
                            }
                        }
                    ?>
                </div>
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