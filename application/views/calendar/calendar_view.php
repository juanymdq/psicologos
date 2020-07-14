<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
 
        .modal-body {
            overflow: scroll;
            height: 400px;
           
            
        }
   
        #txtFecha{
            border: 1px solid;
            text-align: center;
        }

    </style>
  

</head>
<body>

    <div class="container"> 
    <?php
    if(isset($data)){
        
        /*foreach($data as $clave=>$valor) {
            foreach($valor as $key=>$value){
                echo $value;
            }
                
        } */          
        
       // echo var_dump($data);
       print_r(array_values($data));
       $registro = array_values($data);
       foreach($registro as $array){
           foreach($array as $item){
                $res = $item." ";             
               
           }   
           $temp = explode(" " , $res);
           echo $temp[1];        
       }
    }else{
        echo "data no esta seteado";
    }
    ?>         
        <div class="row">
            <div class="col"></div>
            <div class="col-7"><br/><br/><div id="CalendarioWeb"></div></div>
            <div class="col"></div>
        </div>
    </div>    

    <script>
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
                    <h5>Seleccionar horarios</h5>               
                
               
                    <input type="hidden" id="txtIDuser" name="txtIDuser"/>
                    <input type="text" id="txtFecha" name="txtFecha" disabled="true"/>
               
                </div>
                <div class="modal-body">
                    <div class="form-row">
                       
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
                                </div>
                                
                            <?php }?>
                      
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
            NuevoEvento = obtener_datos();
            
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
        //obtiene el id, la feha y las horas seleccionadas y las envia en un array de objetos
        function obtener_datos(){            
            var registros= [];
            let obj = {};
            $("input[name=chkHora]").each(function (index) {  
                if($(this).is(':checked')){
                    obj = {
                        'id': $('#txtIDuser').val(),
                        'fecha': $('#txtFecha').val(),
                        'hora': $(this).val()
                    }
                    registros.push(obj);          
                }
            });
           /*
           console.log(registros);
           for(key in registros){
               console.log(key+": "+registros[key].id);
               console.log(key+": "+registros[key].fecha);
               console.log(key+": "+registros[key].hora);
           }*/
            return registros;
        }

       /* function RecolectarDatosGUI() {          
            NuevoEvento = {
                id_user: $('#txtIDuser').val(),              
                fecha: $('#txtFecha').val(),
                horas: obtener_horas()
            };
            console.log(NuevoEvento);
        }
*/
        function EnviarInformacion(accion, objEvento, modal) {
            
            var url = '<?=base_url()?>calendar/accion?accion='+accion;
           
            $.ajax({
                type:'post',
                url: url,
                data: {data: objEvento}
            });
            console.log(objEvento);
            if(!modal){
                $('#ModalEventos').modal('toggle');           
            }
            //$route['profesional/calendario_de_horarios/(:any)'] = 'calendar/find_all_eventos/$1';
           
                              
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



<!--

  
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

                <input type="text" id="txtID" name="txtID"/>
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



    -->