<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profesionales</title>
	<meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <script src="<?=base_url()?>application/assets/js/calendar/jquery.min.js"></script>
    <script src="<?=base_url()?>application/assets/js/calendar/moment.min.js"></script>

    <!-- FULL CALENDAR-->
    <link rel="stylesheet" href="<?=base_url()?>application/assets/css/calendar/fullcalendar.min.css" />
    <script src="<?=base_url()?>application/assets/js/calendar/fullcalendar.min.js"></script>
    <script src="<?=base_url()?>application/assets/js/calendar/es.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">          
        <div class="row">
            <div class="col"></div>
            <div class="col-7"><div id="CalendarioWeb"></div></div>
            <div class="col"></div>
        </div>
    </div>    
    
    <script>
        $(document).ready(function(){
            $('#CalendarioWeb').fullCalendar({
                header: {
                    left: 'today,prev,next,Miboton',
                    center: 'title',
                    right: 'month,basicWeek,basicDay,agendaWeek,agendaDay'
                },
                customButtons:{
                    Miboton: {
                        text: "Boton 1",
                        click: function(){
                            alert("Accion del boton")
                        }
                    }
                },
                dayClick: function(date, jsEvent, view){    

                    $('#txtFecha').val(date.format());
                    $('#ModalEventos').modal();
                },

                events: <?=$eventos?>,                

                eventClick:function(callEvent,jsEvent,view){

                    //H2
                    $('#tituloEvento').html(callEvent.title);
                    //Mostrar la informaciond el evento en los inputs
                    $('#txtDescripcion').val(callEvent.descripcion);
                    $('#txtID').val(callEvent.id);
                    $('#txtTitulo').val(callEvent.title);
                    $('#txtcolor').val(callEvent.color);

                    FechaHora = callEvent.start._i.split(" ");
                    $('#txtFecha').val(FechaHora[0]);
                    $('#txtHora').val(FechaHora[1]);


                    $('#ModalEventos').modal();
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
                id: <input type="text" id="txtID" name="txtID"/><br/>
                Fecha: <input type="text" id="txtFecha" name="txtFecha"/><br/>
                Título: <input type="text" id="txtTitulo"/><br/>
                Hora: <input type="text" id="txtHora" value="10:30"/><br/>
                Descripción: <textarea id="txtDescripcion" rows="3"></textarea><br/>
                Color: <input type="color" id="txtColor" value="#ff0000"/><br/>

            </div>
            <div class="modal-footer">

                <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
                <button type="button" class="btn btn-success">Modificar</button>
                <button type="button" class="btn btn-danger">Borrar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                

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

        function RecolectarDatosGUI() {
            NuevoEvento = {
                accion: 'agregar',                
                id: $('#txtID').val(),
                title: $('#txtTitulo').val(),
                start: $('#txtFecha').val()+ " " +$('#txtHora').val(),
                color: $('#txtColor').val(),
                descripcion: $('#txtDescripcion').val(),
                textColor: '#FFFFFF',
                end: $('#txtFecha').val()+ " " +$('#txtHora').val(),
            };
        }

        function EnviarInformacion(accion, objEvento) {
            var url = '<?=base_url()?>calendar/accion?accion='+accion;
            $.ajax({
                type:'post',
                url: url,
                data: objEvento,                            
                success: function(response) {            

                    console.log(response);
                    $('#CalendarioWeb').fullCalendar('refetchEvents');
                    $('#ModalEventos').modal('toggle');                    
                },
                error: function(){
                    alert("Hay un error...");
                }
            });
        }

    </script>
</body>
</html>