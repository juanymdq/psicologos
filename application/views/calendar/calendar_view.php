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
                   // alert("Valos seleccionado: " + date.format());
                   // alert("Vista actual: " + view.name);
                    $(this).css('background-color','red');
                    $('#exampleModal').modal();
                },
                eventSources:[{
                    events: [
                    {
                        id:1,
                        title: 'Evento 1, llegamos a 800 suscriptores',
                        descripcion: "Hermoso calendario",
                        start: '2020-06-20',
                        color: "#FF0F0",
                        textColor: "#FFFFFF"
                    },
                    {
                        title: 'Evento 2, llegamos a 803 suscriptores',
                        descripcion: "No se si cumplire con el soft",
                        start: '2020-06-12',
                        end: '2020-06-14'
                    },
                    {
                        title: 'Evento 3, saludos Dev',
                        descripcion: "Preguuntar por hostinger",
                        start: '2020-06-05T11:30:00',
                        allDay: false,
                        color: "#FFF000",
                        textColor: "#000000"
                    }
                ],
                color: "black",
                textColor: "yellow"
                }],
                eventClick:function(callEvent,jsEvent,view){
                    $('#tituloEvento').html(callEvent.title);
                    $('#descripcionEvento').html(callEvent.descripcion);
                    $('#exampleModal').modal();
                }
               
            });
        });

    </script>

    <!-- Modal -->
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <a href="<?=base_url('calendar/find_all_eventos')?>">Buscar Eventos</a>
        <?php
            if(isset($datos_calendar)){
                echo "<p>".$datos_calendar."</p>";
            }
        ?>
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloEvento"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="descripcionEvento"></div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success">Agregar</button>
                <button type="button" class="btn btn-success">Modificar</button>
                <button type="button" class="btn btn-danger">Borrar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                

            </div>
            </div>
        </div>
    </div>
</body>
</html>