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
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <script id="_carbonads_projs" type="text/javascript" src="https://srv.carbonads.net/ads/CK7DC5QN.json?segment=placement:eonasdangithubio&amp;callback=_carbonads_go"></script>



    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
    
    <style>

        .container{
            margin-top: 50px;
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
            <div class="col-sm-3" style="height:130px;">
            <input type="hidden" id="txtID"/>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker8'>                        
                        <input type='text' class="form-control" id="txtFecha"/>
                        <span class="input-group-addon">
                            <span class="fa fa-calendar">
                            </span>
                        </span>
                    </div>
                </div>
                
            </div>
            <div class="col-sm-3" style="height:130px;">
                <div class="form-group">
                    <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
                    <a href="<?=base_url('profesional/home_profesionales')?>" id="btnVolver" class="btn btn-default">Volver</a>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker8').datetimepicker({
                        icons: {
                            time: "fa fa-clock-o",
                            date: "fa fa-calendar",
                            up: "fa fa-arrow-up",
                            down: "fa fa-arrow-down"
                        }
                    });
                });
            </script>
            <div id="tabla_horarios">
                <?php if(isset($horarios)){
                                                       
                            $array = (array)json_decode($horarios);
                            //Este seria si tuvieses mas de un indice dentro de tu json array
                            foreach($array as $clave => $valor){
                            echo 'Fecha: '.$valor->fecha.'<br>';
                            }
                        }   
                ?>

            </div>   
        </div>
        <script>
            $(document).ready(function(){
                $('#txtID').val(<?=$this->session->userdata('id')?>);
            });
        </script>
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
        var NuevoEvento;

        $('#btnAgregar').click(function(){ 
            RecolectarDatosGUI();
            EnviarInformacion('agregar', NuevoEvento);
            
        });
/*
        $('#btnEliminar').click(function(){ 
            RecolectarDatosGUI();
            EnviarInformacion('eliminar', NuevoEvento);
            
        });

        $('#btnModificar').click(function(){ 
            RecolectarDatosGUI();
            EnviarInformacion('modificar', NuevoEvento);
            
        });
*/
        function trae_fecha() {
            
            var fechahora = $('#txtFecha').val().split(" ");
            
            var temFecha = fechahora[0].split("/");
            var fechaFinal = temFecha[2]+'-'+temFecha[0]+'-'+temFecha[1];
            var temhora = fechahora[1].split(" ");
            var horaFinal = temhora[0]+':'+temhora[1]+':00';
            return fechaFinal+' '+horaFinal;
            console.log(fechaFinal+' '+horaFinal);
        }

        function RecolectarDatosGUI() {
            NuevoEvento = {                
                id_profesional: $('#txtID').val(),           
                fecha: trae_fecha()
            };
        }

        function EnviarInformacion(accion, objEvento) {
            
            var url = '<?=base_url()?>profesional/accion?accion='+accion;
            
            $.ajax({
                type:'post',
                url: url,
                data: objEvento
            });
           
            window.location.href = '<?=base_url('profesional/find_all_eventos?prof='.$this->session->userdata('id'))?>';                   
        }


    </script>
</body>