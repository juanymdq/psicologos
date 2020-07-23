<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Mis Turnos</title>

    
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
   
    
   <!-- <link rel="stylesheet" href="http://weareoutman.github.io/clockpicker/dist/bootstrap-clockpicker.min.css">-->
    
    <!-- FULL CALENDAR-->
    <link rel="stylesheet" href="<?=base_url()?>application/assets/css/calendar/fullcalendar.min.css" />
    
  
    <style>
   
        .fc th {
            padding: 10px 0px;
            vertical-align: middle;
            background-color: #F2F2F2;
        }
        /*COLOREA LAS FECHA PASADAS*/
        .fc-past {            
            background-color: #D5D5D5;
        }
        .modal-dialog {
            position:relative;
            top: 10%;
        }
        
        .modal-content{
            width: 300px;
           
           
        }
        .modal-content > h5{
            text-align: center;
        }
        .modal-body {
            overflow: scroll;
            
            
        }
        .modal-header{            
            text-align: center;            
            display: flex;
            flex-direction: column;
           
        }
          
        #txtFechaView{           
            text-align: center;
            
        }
        .flex-container{
            display: flex;
        }
        #CalendarioWeb {
            margin-bottom: 400px
        }
        .help-modal {
            padding: 0 15px 0 15px;
            color: 'green';
        }
        .help-modal>p {
            font-size:12px;
            color: #FF0000;
        }
        .modal-footer>div{            
            margin:0px auto;
        }

    </style>
 

</head>
<body>
    <div class="container">
    <?=var_dump($turnos)?>
    <div id="CalendarioWeb" class="fc fc-media-screen fc-direction-ltr fc-theme-standard" style="height: 90%;"></div>
    </div>
    <script>
        var json;
       
        $(document).ready(function(){
           
            $('#CalendarioWeb').fullCalendar({
                header: {
                    left: 'today,prev,next',
                    center: 'title',                    
                }, 
                editable: true,
                selectable: true,
                allDaySlot: true,   

                dayClick: function(date, jsEvent, view){ 
                    
                    $('#ModalEventos').modal({backdrop: 'static', keyboard: false});
                },   

                eventClick:function(callEvent,jsEvent,view){
                    console.log(callEvent)
                    $('#ModalEventos').modal({backdrop: 'static', keyboard: false});
                },                            

                events: <?=$turnos?>,        

                editable: false,
                
            });

            
        });
        
        
    </script>
    <?php
    $item = array_values($turnos)[0];
    var_dump($item);
    ?>
    <!-- Modal PARA AGREGAR MODIFICAR Y ELIMINAR-->
    <div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">       
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">            
                h5>Datos del turno</h5>            
                <div class="modal-header">
                
                </div>
                <div class="modal-body">
                    <label></label>
                </div>
                <div class="modal-footer">                   
                        <div><button type="button" id="btnCerrar" class="btn btn-warning">Cerrar</button></div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
         $('#btnCerrar').click(function(){           
            //ocultamo el modal            
            $('#ModalEventos').modal('toggle');                                 
        }); 

    </script>
</body>
</html>


