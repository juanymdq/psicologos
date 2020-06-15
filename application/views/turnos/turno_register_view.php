<!DOCTYPE html>
<html>
<head>
    <title>Turnos</title>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .header {
    color: #36A0FF;
    font-size: 27px;
    padding: 10px;
}

.bigicon {
    font-size: 35px;
    color: #36A0FF;
}
.container {  
  width: 100%;
  background-color: #E3FCE0;
}

.row {
  margin-left: 30px;
  width: 100%;  
}
.col-sm-3 {    
  width: 500px;
  margin-left: -4em;

}
#fname::placeholder, #lname::placeholder, #email::placeholder, #phone::placeholder, #message::placeholder {
  color: lightgray;
}
.contenedor {
  margin-top: 30px;
  padding: 5px 5px 5px 5px;
  background-color: white;
  border-radius: 10px;
  width: 350px;
  height: 340px;
  border: 1px solid;
}
.titulo-prof {
  font-size: 25px;
}
#avatar {
  width: 50px;
  height: 40px;
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
  
}

    </style>
  
</head>
<body>  
    <section>
    <div class="container">
      <div class="row">
     
          <div class="col-sm-7 text-left">
          <?php
                  if(isset($horario)){
                    $item = array_values($horario)[0]?>
            <form action="<?=base_url('Turnos/guardar_turno')?>" method="post">
                    <input type="hidden" value="<?=$_GET['id']?>" name="id_turno">

                  

                    <legend class="text-center header" style="color: black">Datos del Cliente</legend>
                    
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
                              <textarea class="form-control" id="message" name="comentarios" placeholder="Podes añadir cualquier comentario de interes para el especialista (opcional)." rows="7"></textarea>
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                        
                            <button type="submit" class="btn btn-primary btn-lg">Proceder al pago $</button>
                        </div>
                    </div> 
                                       
            </form>                         
          </div><!--col-sm-7 text-left-->
          <div class="col-sm-1"></div>
          <div class="col-sm-2">
            <div class="contenedor">
              <div class="titulo-prof">Detalles de la Visita</div>
                    <div class="datos-prof">
                      <hr>
                      <div class="row" style="width: 300px; margin-left:-.5em">
                        <div class="col-md-3">
                          <img src="<?=$item["foto"]?>" id="avatar"/>
                        </div>
                        <div class="col-md-8">Lic. <?=$item["nombre"]?>&nbsp;<?=$item["apellido"]?></div>
                      </div>
                      <hr>
                      <div class="row" style="width: 350px; margin-left:-.5em">  
                          <span class="col-md-1 col-md-offset-2"><i class="fa fa-calendar bigicon" style="color: grey"></i></span>                          
                          <div class="col-md-8" style="margin-left:20px;"><?=$item["fecha_string"]?></div>
                      </div> 
                      <hr>
                      <div class="row" style="width: 350px; margin-left:-.5em">  
                          <span class="col-md-1 col-md-offset-2"><i class="fa fa-dollar-sign bigicon" style="color: grey"></i></span>                          
                          <div class="col-md-8" style="margin-left:20px;"><label>Costo de la consulta $800</label></div>
                      </div> 
                      <div class="cambiar-horario">
                        <a href="<?=base_url('cliente/ver_horarios_de_profesional?id='.$item["id"])?>">Cambiar horario</a>
                      </div>                         
                      <?php }?>
                    </div>              
            </div>
          </div><!--col-sm-2-->  
      </div><!--row-->
</div><!--contenedor-->
     
  
    </section>
 
</body>
</html>