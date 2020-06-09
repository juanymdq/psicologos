<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>
     <!--JQUERY-->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
   
    
    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/footer.css"/>
</head>
<body>
<header>
    <div class="menu-uno">
        <div class="menu-uno-usuario">				
            <?php if($this->session->userdata('nombre') != null) {?>
            <?="Profesional: ". $this->session->userdata('nombre') . " " . $this->session->userdata('apellido'); }?>
        </div>
    </div>
    <div class="menu-dos">
        <div class="menu-dos-img"><img src="<?=base_url()?>application/assets/img/divan.png" class="imgLogo" /></div>
        <div class="menu-dos-text">Terapia Virtual</div>
        <div class="menu-dos-link">
            <a href="<?=base_url('Welcome')?>" class="menu-dos-link-text">INICIO</a>               
            <a href="" class="menu-dos-link-text">NOSOTROS</a>
            <a href="<?=base_url('webcam')?>" class="">WEBCAM</a>
            <a href="" class="menu-dos-link-text">INICIO</a>			
        </div>
    </div>
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
  height: 240px;
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

</header>
    <section>
    <div class="container">
      <div class="row">

      
     
          <div class="col-sm-7 text-left">
              
            <form method="post">
                
                    <legend class="text-center header" style="color: black">Registro de usuarios</legend>
                    
                    <div class="form-group"> 
                        <div class="row">                       
                            <span class="col-md-1 text-center"><i class="fa fa-user bigicon" style="color: black"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="nombre" type="text" placeholder="Nombre" class="form-control">
                            </div>
                            <span class="col-md-1 text-center"><i class="fa fa-asterisk" style="color:red; font-size:12px"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="row">  
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon" style="color: black"></i></span>
                          <div class="col-md-8">
                              <input id="lname" name="apellido" type="text" placeholder="Apellido" class="form-control">
                          </div>
                          <span class="col-md-1 text-center"><i class="fa fa-asterisk" style="color:red; font-size:12px"></i></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">  
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon" style="color: black"></i></span>
                          <div class="col-md-8">
                              <input id="email" name="email" type="text" placeholder="Correo electrónico" class="form-control">
                          </div>
                          <span class="col-md-1 text-center"><i class="fa fa-asterisk" style="color:red; font-size:12px"></i></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">  
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon" style="color: black"></i></span>
                          <div class="col-md-8">
                              <input id="phone" name="telefono" type="text" placeholder="telefono" class="form-control">
                          </div>
                          <span class="col-md-1 text-center"><i class="fa fa-asterisk" style="color:red; font-size:12px"></i></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">  
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon" style="color: black"></i></span>
                          <div class="col-md-8">
                              <textarea class="form-control" id="message" name="comentarios" placeholder="Podes añadir cualquier comentario de interes para el especialista (opcional)." rows="7"></textarea>
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg">Siguiente ></button>
                        </div>
                    </div> 
                    <div class="row">  
                      <span class="col-md-1 text-center"><i class="fa fa-asterisk" style="color:red; font-size:12px"></i></span>
                      <div class="col-md-10">
                          <p>Los campos marcados con asterisco deben ser completados</p>
                      </div>
                      </div>                     
            </form>
                         
          </div><!--col-sm-7 text-left-->
          <div class="col-sm-1"></div>
          <div class="col-sm-2">
            <div class="contenedor">
              <div class="titulo-prof">Detalles de la Visita</div>
              <?php
                  if(isset($horario)){
                    $item = array_values($horario)[0]?>
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
                      <div class="cambiar-horario">
                        <a href="<?=base_url('turnos/ver_horarios?id='.$item["id"])?>">Cambiar horario</a>
                      </div>                         
                 <?php }
              ?>
            </div>
          </div><!--col-sm-2-->  
      </div><!--row-->
</div><!--contenedor-->
     
  
    </section>
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
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>
</html>