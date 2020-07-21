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
            background-color: #FFDBD4;
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
            text-align: center;            
            display: flex;
            flex-direction: column;
           
        }
        .diaSemana {
            
            
        }
     
        #txtFechaView{           
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
        var id_prof;
        $(document).ready(function(){
           
            $('#CalendarioWeb').fullCalendar({
                header: {
                    left: 'today,prev,next',
                    center: 'title',                    
                },       

                viewRender: function(view){
                    var j = view.options.events;
                    //console.log(j[0].hora);
                    console.log(Date.parse(view.dayGrid.cellEls[0].dataset.date));
                    //console.log(view.dayGrid.cellEls.length);
                    //console.log(view.dayGrid.cellEls);*/
                    view.dayGrid.cellEls[6].style.backgroundColor = 'red';
                    if($('#txtPerfil').val() == 'cliente'){
                        console.log('vista cliente');
                       
                        var k = 0;
                        while(k <= view.dayGrid.cellEls.length - 1){
                            fchCalendar = Date.parse(view.dayGrid.cellEls[k].dataset.date);
                            var i=0;
                            var encontro = false;
                            while(i <= j.length-1 && !encontro){
                                fchDB = Date.parse(j[i].start);
                                //console.log(fechaInicio.getTime());
                                if(fchDB == fchCalendar) {
                                    encontro = true  
                                    //console.log(fchCal)                                      
                                }
                                //console.log(j[i].start);
                                i++;
                            }                        
                            if(!encontro) {
                               console.log(view.dayGrid.cellEls[k].dataset.date)
                               view.dayGrid.cellEls[k].style.backgroundColor = 'FB9864';
                            }else{
                                view.dayGrid.cellEls[k].style.backgroundColor = 'D7FBFD';
                            }
                            
                            k++;
                           
                           
                        }

                    }
                },

                dayRender: function(date, cell){
                   
                },
               
                dayClick: function(date, jsEvent, view){  
                    
                    var myDate = new Date();                     
                    //Trae la fecha en milisegundos
                    d = new Date(date._i);         
                    //le suma un dia ya que 0=domingo
                    //debemos preguntar si d == 7. debido a que el domingo es igual a 0           
                    ((d.getDay() + 1)==7) ? dd = 0 : dd=d.getDay() + 1;
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
                        console.log('ingreso vacio');
                        $('#txtFechaView').val(date.format('DD/MM/YYYY'));
                        $('#txtFecha').val(date.format());
                        $('#txtIDuser').val();
                       // $('#txtPerfil').val(<?=$this->session->userdata('perfil')?>)
                        //obtenemos la descripcion del dia
                        $('.diaSemana').text(date._locale._config.weekdays[dd]);
                        $('#ModalEventos').modal();
                    }                   
                },

                events: <?=$horarios?>,
             
                eventClick:function(callEvent,jsEvent,view){ 
                    //Trae la fecha en milisegundos
                    d = new Date(callEvent.start._d);
                    //le suma un dia ya que 0=domingo
                    //debemos preguntar si d == 7. debido a que el domingo es igual a 0  
                    ((d.getDay() + 1)==7) ? dd = 0 : dd=d.getDay() + 1;                   
                    //descheckeo todos los check
                    limpiarcheck();
                    //obtenemos la descripcion del dia
                    $('.diaSemana').text(view.calendar.localeData._weekdays[dd]);
                    $('#txtFechaView').val(callEvent.start.format('DD/MM/YYYY'));
                    //traigo fecha formateada
                    $('#txtFecha').val(callEvent.start.format());
                    var fecha = $('#txtFecha').val();
                    //treamos id usuario
                    $('#txtIDuser').val(callEvent.id_user);
                    id_prof = callEvent.id_user;
                    //traemos todos los horarios mostrados en calendario
                    json = callEvent.source.rawEventDefs;
                    //console.log(json);
                    // recorremos los horarios
                    var perfil = $('#txtPerfil').val();
                    console.log(perfil);
                   if(perfil=='profesional'){
                        json.forEach((e) => {
                            for(var p in e){
                                //cuando encuentre la fecha que se clickeo
                                if(fecha==e[p]){                               
                                    console.log('pantalla de profesional');
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
                    }else if(perfil == 'cliente'){
                       
                        console.log('pantalla de cliente');
                        jQuery ( "#divCliente" ) .append("<form>")
                        json.forEach((e) => {
                            for(var p in e){
                                //cuando encuentre la fecha que se clickeo
                                if(fecha==e[p]){
                                    jQuery ( "#divCliente" ) .append(
                                        "<input type='radio' name='hora' value='prueba'><br>");
                                }
                            }
                        });
                        jQuery ( "#divCliente" ) .append("</form>")
                    }
                    
                    $('#ModalEventos').modal();
                },

                editable: false,
                
            });

            
        });

    </script>
   
    <!-- Modal PARA AGREGAR MODIFICAR Y ELIMINAR-->
    <div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">       
        <div class="modal-dialog">
            <div class="modal-content">
            <h5>Seleccionar horarios</h5>                
                <div class="modal-header">
                    <div class="diaSemana"></div>                  
                    <div class="fch"><input type="text" id="txtFechaView" disabled="true"/></div> 
                    <div class="hidd">
                        <input type="text" id="txtIDuser" name="txtIDuser"/>
                        <input type="text" id="txtPerfil" name="txtPerfil" value="<?=$this->session->userdata('perfil')?>"/>
                        <input type="hidden" id="txtFecha" name="txtFecha" disabled="true"/>                  
                    </div>
                </div>
                <div class="modal-body">
                    <?php
                    if($perfil == 'profesional'){
                    ?>
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
                         
                            ?>

                            <div>
                                <input type="checkbox" id="chkHora" name="chkHora" value="<?=$hora?>">
                                <label for="chkHora"><?=$hora?></label>
                                <hr>
                            </div>
                            
                        <?php }?>
                      
                    </div>
                    <?php }else{?>
                        <div id="divCliente">
                          
                        </div>
                        
                    <?php }?>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCerrar" class="btn btn-success">Cerrar</button>
                   
                </div>
            </div>
        </div>
    </div>
    
    <script>
        

        $("input[name=chkHora]").change(function(){
             
            if($(this).is(':checked')){//agregar horas
                //console.log('checked');
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
                //console.log(fecha)            ;
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
            $("#divCliente").empty();
            console.log(id_prof);
            if($('#txtPerfil').val() == 'profesional'){
                window.location.href = '<?=base_url('profesional/calendario_de_horarios/'.$this->session->userdata('id'))?>/1';
            }else if($('#txtPerfil').val() == 'cliente'){
                console.log('recarga cliente');
                window.location.href = '<?=base_url('profesional/calendario_de_horarios/'.$this->session->userdata('id'))?>/0';
            }
        });    

        function EnviarInformacion(accion, objEvento, modal) {
            
            var url = '<?=base_url()?>calendar/accion?accion='+accion;
           
            $.ajax({
                type:'post',
                url: url,
                data: objEvento
            }).done(function(res){
                if(accion=='agregar'){
                    console.log('guardado');
                }else{
                    console.log('eliminado');               
                }
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

        function obtieneFecha(fecha) {
            var mm = fecha.getMonth() + 1;
            var dd = fecha.getDate();
            var yy = fecha.getFullYear();
            return yy+'-'+mm+'-'+dd;
        }
        
    </script>
</body>
</html>


