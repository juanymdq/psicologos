<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profesionales</title>
	<meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   
    <script src="<?=base_url()?>application/assets/js/calendar/moment.min.js"></script>
   
    
    <script src="http://weareoutman.github.io/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
    <script src="<?=base_url()?>application/assets/js/calendar/fullcalendar.min.js"></script>
    <script src="<?=base_url()?>application/assets/js/calendar/es.js"></script>
    <!-- BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="http://weareoutman.github.io/clockpicker/dist/bootstrap-clockpicker.min.css">
    
    <!-- FULL CALENDAR-->
    <link rel="stylesheet" href="<?=base_url()?>application/assets/css/calendar/fullcalendar.min.css" />
    
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
    <style>
        .fc th {
            padding: 10px 0px;
            vertical-align: middle;
            background-color: #F2F2F2;
        }
        /*COLOREA LAS FECHA PASADAS*/
        .fc-past {
        background-color: #c94b4b;
        }
        body {
            margin: 0;
            margin-bottom: 40px;
        }
        
        .container {
            margin-top: -3em;
            width: 1100px;
        }

        .imgLogo {
            margin-bottom: 3px;
            width: 70px;
            height: 50px;
        }

        .textLogo {
            text-align: left;
            width: 250px;
            margin-top: 0.4em;
            margin-left: 1em;
        }
        .datos-usuario {
            margin-top: 1em; 
        }
    </style>

</head>
<body>
<header>
		<div class="menu">
			<ul>
				<li class="logo">
					<div class="divLogo">
						<a href="<?=base_url('cliente/home_clientes')?>"><img src="<?=base_url()?>application/assets/img/divan.png" class="imgLogo" /></a>
					</div>
					<div class="textLogo">
						<p>TerapiaVirtual</p>
					</div>
                </li>
                <div class="datos-usuario">
                    <li class="item-user">Bienvenido</li>                    
                    <li class="item-user"><?php echo $this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></li>
                </div>
			</ul>
		</div>
	</header>
    <div class="container">          
        <div class="row">
            <div class="col"></div>
            <div class="col-7"><br/><br/><div id="CalendarioWeb"></div></div>
            <div class="col"></div>
        </div>
    </div>    
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
        $(document).ready(function(){
           
            $('#CalendarioWeb').fullCalendar({
                header: {
                    left: 'today,prev,next',
                    center: 'title',
                    //right: 'month,basicWeek,basicDay,agendaWeek,agendaDay'
                },
               
                dayClick: function(date, jsEvent, view){                       
                    var myDate = new Date();                    
                    //Cuantos días se agregarán desde hoy?
                    var diasAdicionales = 0;
                    myDate.setDate(myDate.getDate() + diasAdicionales);
                    if (date < myDate) 
                    {
                        //VERDADERO Hiciste clic en una fecha menor a hoy + diasAdicionales
                        alert("No puedes agendar esta fecha!");
                    } 
                    else 
                    {
                        $('#btnAgregar').prop('disabled',false);
                        $('#btnModificar').prop('disabled',true);
                        $('#btnEliminar').prop('disabled',true);
                        
                        limpiarFormulario();
                        $('#txtFecha').val(date.format());
                        $('#txtIDuser').val(<?=$this->session->userdata('id')?>);
                        $('#ModalEventos').modal();
                    }

                    
                   
                },

                events: <?=$eventos?>,                

                eventClick:function(callEvent,jsEvent,view){

                    $('#btnAgregar').prop('disabled',true);
                    $('#btnModificar').prop('disabled',false);
                    $('#btnEliminar').prop('disabled',false);

                    //H2
                    $('#tituloEvento').html(callEvent.title);
                    //Mostrar la informaciond el evento en los inputs
                    $('#txtDescripcion').val(callEvent.descripcion);
                    $('#txtID').val(callEvent.id);
                    $('#txtIDuser').val(callEvent.id_user);
                    $('#txtTitulo').val(callEvent.title);
                    $('#txtColor').val(callEvent.color);

                    FechaHora = callEvent.start._i.split(" ");
                    $('#txtFecha').val(FechaHora[0]);
                    $('#txtHora').val(FechaHora[1]);


                    $('#ModalEventos').modal();
                },

                editable: true,

                eventDrop: function(callEvent){
                    $('#txtID').val(callEvent.id);
                    $('#txtIDuser').val(callEvent.id_user);
                    $('#txtTitulo').val(callEvent.title);
                    $('#txtcolor').val(callEvent.color);
                    $('#txtDescripcion').val(callEvent.descripcion);

                    var fechaHora = callEvent.start.format().split("T");
                    $('#txtFecha').val(fechaHora[0]);
                    $('#txtHora').val(fechaHora[1]);

                    RecolectarDatosGUI();
                    EnviarInformacion('modificar', NuevoEvento, true);
                }
               
            });

            
        });

    </script>

    <!-- Modal PARA AGREGAR MODIFICAR Y ELIMINAR-->
    <div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">       
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloEvento"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">       

                <input type="hidden" id="txtID" name="txtID"/>
                <input type="text" id="txtIDuser" name="txtIDuser"/>
                <input type="text" id="txtFecha" name="txtFecha"/>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Título:</label>
                        <input type="text" id="txtTitulo" class="form-control" placeholder="Título del evento"/>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Hora del evento:</label>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input id="txtHora" type="text" class="form-control" value="">                            
                            <span class="glyphicon glyphicon-time"></span>   
                        </div>
                        <script type="text/javascript">
                        $('.clockpicker').clockpicker();
                        </script>
                    </div>                    
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea id="txtDescripcion" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Color:</label>
                    <input type="color" id="txtColor" value="#ff0000" class="form-control" style="height:36px"/>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
                <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
                <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                

            </div>
            </div>
        </div>
    </div>
    <script>
        var NuevoEvento;

        $('#btnAgregar').click(function(){ 
            RecolectarDatosGUI();
            EnviarInformacion('agregar', NuevoEvento);
            
        });

        $('#btnEliminar').click(function(){ 
            RecolectarDatosGUI();
            EnviarInformacion('eliminar', NuevoEvento);
            
        });

        $('#btnModificar').click(function(){ 
            RecolectarDatosGUI();
            EnviarInformacion('modificar', NuevoEvento);
            
        });

        function RecolectarDatosGUI() {
            NuevoEvento = {                
                id: $('#txtID').val(),
                id_user: $('#txtIDuser').val(),
                title: $('#txtTitulo').val(),
                start: $('#txtFecha').val()+ " " +$('#txtHora').val(),
                color: $('#txtColor').val(),
                descripcion: $('#txtDescripcion').val(),
                textColor: '#FFFFFF',
                end: $('#txtFecha').val()+ " " +$('#txtHora').val(),
            };
        }

        function EnviarInformacion(accion, objEvento, modal) {
            
            var url = '<?=base_url()?>calendar/accion?accion='+accion;
            
            $.ajax({
                type:'post',
                url: url,
                data: objEvento
            });
            if(!modal){
                $('#ModalEventos').modal('toggle');           
            }
            window.location.href = '<?=base_url('calendar/find_all_eventos?user='.$this->session->userdata('id'))?>';                   
        }

        function limpiarFormulario() {
            $('#tituloEvento').html('');
            $('#txtID').val('');
            $('#txtIDuser').val('');
            $('#txtTitulo').val('');
            $('#txtColor').val('');
            $('#txtHora').val('');
            $('#txtDescripcion').val('');
        }
    </script>
</body>
</html>