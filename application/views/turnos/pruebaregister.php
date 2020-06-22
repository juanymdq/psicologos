<!DOCTYPE html>
<html>
<head>
    <title>Turnos</title>
    
</head>
<style>
.container{
    margin-bottom: 10px;
}
h1 {
margin-top: 10px;
text-align: center;
color: #4E94AE;
}

p {
text-align: center;
color: #4E94AE;
}
.row {    
    width: auto;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid;
}
.form-group {
    text-align: left;
}

.flex-container {
  display: flex;
  flex-direction: row;
  background-color: #4E94AE;
}

.flex-prof > div{
   text-align: left;
}

.flex-container > div, .flex-prof > div {
  background-color: #f1f1f1;
  width: 400px;
  margin: 10px;
  text-align: center;  
  font-size: 15px;
  margin-left: auto;
  margin-right: auto;  
}



@media (max-width:640px) {
    .form-group {
    text-align: center;
    }
}

.titulo-prof {
  font-size: 25px;
}
#avatar {
  width: 100px;
  height: 80px;
  border-radius: 50%;
}
.datos-prof {
  margin-top: 20px;
  text-align: left;
  font-size: 16px;
  font-family:'Arial';
  font-weight: lighter;
  
  
}
.cambiar-horario{
  
  text-align: center;
  

</style>
</head>
<body>
    <section>
    <div class="container">
        <h1>Confirmación de turno</h1>
        <p><a href="<?=base_url('turnos')?>" class="btn btn-default">Volver y cancelar</a></p>

        <p>Verifique que los datos sean correctos. Si desea puede cambiar el horario del turno
        hacendo clic en <em>Cambiar turno</em>.<br>
        Una vez verificado, debera proceder al pago de la sesión</p>

        <div class="flex-container">
            <div>
                <div class="row">
                        
                    <form action="<?=base_url('Turnos/guardar_turno')?>" method="post">
                            <input type="hidden" value="<?=$_GET['id']?>" name="id_turno">

                            <legend class="titulo-prof" style="color: black">Datos del Cliente</legend>
                            <hr>
                            <div class="form-group"> 
                                <div class="row">                       
                                    <span class="col-md-1 text-center"><i class="fa fa-user bigicon" style="color: black"></i></span>
                                    <div class="col-md-8">                            
                                    <label><?=$this->session->userdata('nombre')?></label>                                
                                    </div>                            
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">  
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon" style="color: black"></i></span>
                                    <div class="col-md-8">
                                    <label><?=$this->session->userdata('apellido')?></label>    
                                    </div>                          
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">  
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope bigicon" style="color: black"></i></span>
                                    <div class="col-md-8">
                                    <label><?=$this->session->userdata('email')?></label>    
                                    </div>                          
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">  
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon" style="color: black"></i></span>
                                    <div class="col-md-8">
                                    <label><?=$this->session->userdata('telefono')?></label>    
                                    </div>                          
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">  
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-edit bigicon" style="color: black"></i></span>
                                    <div class="col-md-8">
                                        <textarea class="form-control" id="message" name="comentarios" placeholder="Podes añadir cualquier comentario de interes para el especialista (opcional)." rows="5" cols="40"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                
                                    <button type="submit" class="btn btn-primary btn-lg">Proceder al pago $</button>
                                </div>
                            </div>                                         
                    </form>
                </div><!--class row-->
            </div>
            <!--DATOS DEL PROFESIONAL-->
            <div>
                <?php
                        if(isset($horario)){
                        $item = array_values($horario)[0]
                    ?>
                <div class="flex-prof">
                    <legend class="titulo-prof" style="color: black">Detalle de la visita</legend>
                    <hr>
                    <div>
                        <img src="<?=$item["foto"]?>" id="avatar"/>
                        <label>Lic. <?=$item["nombre"]?>&nbsp;<?=$item["apellido"]?></label>
                    </div>
                    <hr>
                    <div>
                        <span><i class="fa fa-calendar bigicon" style="color: grey"></i></span>
                        <label><?=$item["fecha_string"]?>hs.</label>
                    </div>
                    <hr>
                    <div>
                        <span><i class="fa fa-dollar-sign bigicon" style="color: grey"></i></span> 
                        <label>Costo de la consulta $800</label>
                    </div>  
                    <hr>
                    <div>
                        <a href="<?=base_url('cliente/ver_horarios_de_profesional?id='.$item["id"])?>">Cambiar horario</a>
                    </div> 
                    <hr>
                   

                </div>
                <?php }?>
            </div>
        </div><!--END FLEX-->
    </div> <!--END CONTAINER-->
    </section>
    
</body>
</html>