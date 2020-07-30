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
      
        .modal-content > h5{
            text-align: center;
        }
      
          
        #txtFechaView{           
            text-align: center;
            
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

                viewRender: function(view){
                    var j = view.options.events;
                    //verificamos si esta accediendo un profesional o un cliente
                                                
                        var k = 0;
                        //recorremos todo el calendario renderizado (unos 42 dias)
                        while(k <= view.dayGrid.cellEls.length - 1){
                            //Obtenemos la fecha
                            fchCalendar = Date.parse(view.dayGrid.cellEls[k].dataset.date);
                            var i=0;
                            var encontro = false;
                            //El ciclo es para buscar las fechas que tienen horarios
                            //Al final se pintaran de color gris las celdas que no posean turnos para
                            //que el cliente no pueda acceder a ellas
                            while(i <= j.length-1 && !encontro){
                                fchDB = Date.parse(j[i].start);                               
                                if(fchDB == fchCalendar) {
                                    encontro = true                                                                        
                                }                              
                                i++;
                            }                        
                            if(!encontro) {                               
                               //celdas deshabilitadas                               
                               view.dayGrid.cellEls[k].style.backgroundColor = 'D5D5D5';
                            }else{
                                //Celdas habilitadas con horarios
                                view.dayGrid.cellEls[k].style.backgroundColor = 'D4FCAE';
                            }                            
                            k++;
                        }

                   
                },  

                dayClick: function(date, jsEvent, view){ 
                    
                    $('#ModalEventos').modal({backdrop: 'static', keyboard: false});
                },   

                eventClick:function(callEvent,jsEvent,view){
                   console.log(callEvent.idt);
                   
                    var url = '<?=base_url()?>turnos/fecha_cliente_turnos_view';
                    $.ajax({
                        type:'post',
                        url: url,
                        data: {fecha:callEvent.start._i, hora:callEvent.hora}
                    }).done(function(res){
                       console.log(res);
                       $('#pr_nombre').text(callEvent.pr_nombre);
                       $('#pr_apellido').text(callEvent.pr_apellido);
                      
                       $('#fechaTurno').text(res);

                    });
                    $('#ModalEventos').modal({backdrop: 'static', keyboard: false});
                },                            

                events: <?=$turnos?>,        

                editable: false,
                
            });

            
        });
        
        
    </script>
   
    <!-- Modal PARA AGREGAR MODIFICAR Y ELIMINAR-->
    <div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">       
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content" id="modal-content">            
                <h5>Datos del turno</h5>     
                <?php
                if(isset($turnos)){
                $turno = json_decode($turnos);
                $item = array_values($turno)[0];                    
                //$route['profesional/videollamada/(:any)'] = 'Profesional/goVideoCall/$1';
                $uri = 'profesional/videollamada/'.$item->idt.$item->token_id;               
                ?>
                <div class="modal-header">
                    
                </div>
                <div class="modal-body">
                   <div>
                        Lic. <label id="pr_nombre"></label>&nbsp;<label id="pr_apellido"></label>
                   </div>
                   <div>                   
                        Fecha: <label id="fechaTurno"></label>
                   </div>
                    <div>
                    <p></p>
                        <a href="<?=base_url($uri)?>" id="">Acceder a Videollamada</a>
                   </div>
                </div>
                <div class="modal-footer">                   
                        <div><button type="button" id="btnCerrar" class="btn btn-warning">Cerrar</button></div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
    <script>
         $('#btnCerrar').click(function(){           
            //ocultamo el modal            
            $('#ModalEventos').modal('toggle');                                 
        }); 

    </script>
</body>
</html>


