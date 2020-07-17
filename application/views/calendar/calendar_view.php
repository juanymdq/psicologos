<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Profesionales</title>

    
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
        
        .modal-content{
            width: 300px;
        }
        .modal-content > h5{
            text-align: center;
        }
        .modal-body {
            overflow: scroll;
            height: 400px;
        }
        .modal-header{
            float: left;
            text-align: center;
        }
   
        #txtFecha{
            border: 1px solid;
            text-align: center;
            
        }
        .flex-container{
            display: flex;
        }
        #CalendarioWeb {
            margin-bottom: 100px
        }
    </style>
 

</head>
<body>

    <div class="container">   
        <div class="flex-container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><br/><br/><div id="CalendarioWeb"></div></div>
                <div class="col"></div>
            </div>
        </div>
    </div>    

    <script>
    var json;
        $(document).ready(function(){
           
            $('#CalendarioWeb').fullCalendar({
                header: {
                    left: 'today,prev,next',
                    center: 'title',                    
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
                        console.log('ingreso vacio')                                         
                       
                        $('#txtFecha').val(date.format());
                        $('#txtIDuser').val(<?=$this->session->userdata('id')?>);
                       
                        $('#ModalEventos').modal();
                    }                   
                },

                events: <?=$horarios?>,
             
                eventClick:function(callEvent,jsEvent,view){                    
                    //descheckeo todos los check
                    limpiarcheck();
                    //traigo fecha formateada
                    $('#txtFecha').val(callEvent.start.format());
                    var fecha = $('#txtFecha').val();
                    //treamos id usuario
                    $('#txtIDuser').val(callEvent.id_user);
                    //traemos todos los horarios mostrados en calendario
                    json = callEvent.source.rawEventDefs;
                    console.log(json);
                    // recorremos los horarios
                    json.forEach((e) => {
                        for(var p in e){
                            //cuando encuentre la fecha que se clickeo
                            if(fecha==e[p]){
                                //iteramos por todos los checkbox buscando las horas del dia guardadas
                                $('input[type=checkbox]').each(function(){
                                    //colocamos la hora en variable cb
                                    var cb = $(this).val();
                                    //colocamos el elemento check
                                    var elem = $(this);
                                    //traemos la hora de la bd para comparar
                                    var ch = e['hora'];
                                    //le sacamos los ultimos 0 para que coincida perfecta la hora
                                    var tmp = ch.substr(0,5);
                                    //buscamos en los cheks la hora
                                    if(cb == tmp){
                                        //chekeamos si encuentra la hora
                                        elem.attr('checked', true);
                                    }
                                });

                            }
                          
                        }
                    });
                    
                    $('#ModalEventos').modal();
                },

                editable: false,
                
            });

            
        });

    </script>
    <div class="flex-container">
    <!-- Modal PARA AGREGAR MODIFICAR Y ELIMINAR-->
    <div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">       
        <div class="modal-dialog">
            <div class="modal-content">
            <h5>Seleccionar horarios</h5>
                <div class="modal-header">                    
                    <input type="hidden" id="txtIDuser" name="txtIDuser"/>
                    <input type="text" id="txtFecha" name="txtFecha" disabled="true"/>
                </div>
                <div class="modal-body">
                    <div class="">
                       
                        <?php for($i=8;$i<20;$i+=0.5){

                            list($entero, $decimal) = sscanf($i, '%d.%d');
                            
                            if($decimal == 5){
                                $min = '30';
                            }else{
                                $min = '00';
                            }
                            if($i<10){
                                $hora = '0'.$entero.':'.$min;
                            }else{
                                $hora = $entero.':'.$min;
                            }

                            if(isset($horas)){
                                var_dump($horas);
                            }
                            ?>

                            <div>
                                <input type="checkbox" id="chkHora" name="chkHora" value="<?=$hora?>">
                                <label for="chkHora"><?=$hora?></label>
                                <hr>
                            </div>
                            
                        <?php }?>
                      
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCerrar" class="btn btn-success">Cerrar</button>
                   
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        

        $("input[name=chkHora]").change(function(){
             
            if($(this).is(':checked')){//agregar horas
                console.log('checked');
                color = getRandomColor();
                obj = {
                    'id': $('#txtIDuser').val(),
                    'fecha': $('#txtFecha').val(),
                    'hora': $(this).val(),
                    'display': 'background',
                    'color': color
                }     
                EnviarInformacion('agregar', obj);          
            }else{//borrar horas               
                fecha = $('#txtFecha').val();               
                hora = $(this).val();                
                json.forEach((e) => {
                    for(var p in e){
                        var ch = e['hora'];                        
                        //le sacamos los ultimos 0 para que coincida perfecta la hora
                        var tmp = ch.substr(0,5);                    
                        //cuando encuentre la fecha que se clickeo
                        if(fecha==e['start'] && hora==tmp){                           
                            obj = {'id': e['id']}
                            EnviarInformacion('eliminar', obj); 
                        }
                    }
                });               
            }
        })

        $('#btnCerrar').click(function(){                       
            $('#ModalEventos').modal('toggle');
            window.location.href = '<?=base_url('profesional/calendario_de_horarios/'.$this->session->userdata('id'))?>';
        });    

        function EnviarInformacion(accion, objEvento, modal) {
            
            var url = '<?=base_url()?>calendar/accion?accion='+accion;
           
            $.ajax({
                type:'post',
                url: url,
                data: objEvento
            }).done(function(res){
                console.log('guardado');               
            });        
                              
        }

        function limpiarcheck() {           
            $('input[type=checkbox]').each(function(){
                $(this).attr('checked', false);            
            });
        }

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
     
    </script>
</body>
</html>


