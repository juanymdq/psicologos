<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/login_nuevo.css"/>
    <style>
        .bigicon {
            font-size: 35px;
            color: #36A0FF;
            padding-right: 10px;
        }
      
    </style>
</head>
<body>
    
    <section>
        <div class="login-page">        
            <div class="form">
                <form style="display: <?php 
                                        if(isset($registra)){
                                            if($registra || $actualiza){                                           
                                                echo 'block';
                                            }else{
                                                echo 'none';
                                            }
                                        }
                                           //$route['profesional/guardar'] = 'Profesional/profesional_save';
                                           ?>;" class="register-form" action="<?=base_url('profesional/guardar')?>" method="post">	
                    <?php if(isset($registra)){
                        if($registra && !$actualiza){?>
                        <div class="encabezado">
                            <div class=enc-titulo>
                                Registro de Profesionales
                            </div>
                            <div class="enc-cuerpo">
                            Deberías completar este formulario si estás interesado en formar parte del equipo de colaboradores de TerapiaVirtual.
                            </div>
                        </div>
                    <?php }else{?>
                        <div class="encabezado">
                            <div class=enc-titulo>
                                Modificación de Datos Personales
                            </div>                       
                        </div>
                    <?php }}?>
                    <?php
                    if(isset($message)){
                        echo "<p class='error_message'>".$message."</p>";                        
                    }
                    ?>
                    <hr>
                    <input name="perfil" type="hidden" value="cliente"/>
                    <!--MATRICULA-->
                    <div class="form-group"> 
                        <div class="row">                       
                            <span class="col-md-1 text-center"><i class="fa fa-graduation-cap bigicon" style="color: black"></i></span>
                            <div class="col-md-8">
                                <input value="<?=(isset($matricula)) ? $matricula : ""?>" name="matricula" id="fname" type="text" placeholder="Matrícula" class="form-control"> 
                                <span class="help-block"><?php echo form_error('matricula', '<div class="text-danger">', '</div>') ?></span> 
                            </div>
                            <span class="col-md-1 text-center"><i class="fa fa-asterisk" style="color:red; font-size:12px"></i></span>
                        </div>
                    </div>
                    <!--NOMBRE-->
                    <div class="form-group"> 
                        <div class="row">                       
                            <span class="col-md-1 text-center"><i class="fa fa-user bigicon" style="color: black"></i></span>
                            <div class="col-md-8">
                                <input value="<?=(isset($nombre)) ? $nombre : ""?>" name="nombre" id="fname" type="text" placeholder="Nombre" class="form-control"> 
                                <span class="help-block"><?php echo form_error('nombre', '<div class="text-danger">', '</div>') ?></span> 
                            </div>
                            <span class="col-md-1 text-center"><i class="fa fa-asterisk" style="color:red; font-size:12px"></i></span>
                        </div>
                    </div>
                    <!--APELLIDO-->
                    <div class="form-group">
                        <div class="row">  
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon" style="color: black"></i></span>
                            <div class="col-md-8">
                                <input value="<?=(isset($apellido)) ? $apellido : ""?>" name="apellido" id="lname" type="text" placeholder="Apellido" class="form-control"> 
                                <span class="help-block"><?php echo form_error('apellido', '<div class="text-danger">', '</div>') ?></span> 
                            </div>
                            <span class="col-md-1 text-center"><i class="fa fa-asterisk" style="color:red; font-size:12px"></i></span>
                        </div>
                    </div>
                    <!--EMAIL-->
                    <div class="form-group">
                        <div class="row">  
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope bigicon" style="color: black"></i></span>
                            <div class="col-md-8">
                                <input value="<?=(isset($email)) ? $email : ""?>" name="email" id="email" type="text" placeholder="@Email" class="form-control"> 					
                                <span class="help-block"><?php echo form_error('email', '<div class="text-danger">', '</div>') ?></span> 
                            </div>
                            <span class="col-md-1 text-center"><i class="fa fa-asterisk" style="color:red; font-size:12px"></i></span>
                        </div>
                    </div>
                    <!--TELEFONO-->
                    <div class="form-group">
                        <div class="row">  
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon" style="color: black"></i></span>
                            <div class="col-md-8">
                                <input value="<?=(isset($telefono)) ? $telefono : ""?>" name="telefono" id="telefono" type="text" placeholder="Teléfono" class="form-control"> 					
                                <span class="help-block"><?php echo form_error('telefono', '<div class="text-danger">', '</div>') ?></span> 
                            </div>
                            <span class="col-md-1 text-center"><i class="fa fa-asterisk" style="color:red; font-size:12px"></i></span>
                        </div>
                    </div>
                    <!--RESEÑA-->
                    <div class="form-group">
                        <div class="row">  
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-edit bigicon" style="color: black"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" name="resenia" id="resenia" placeholder="Por favor. Agregue brevemente algunas lineas sobre su carrera profesional" rows="5" cols="40"><?=(isset($resenia)) ? $resenia : ""?></textarea>                                
                                <span class="help-block"><?php echo form_error('resenia', '<div class="text-danger">', '</div>') ?></span> 
                            </div>
                            <span class="col-md-1 text-center"><i class="fa fa-asterisk" style="color:red; font-size:12px"></i></span>
                        </div>
                    </div>
                    <button type="submit">Registrarse</button>
                    <p class="message">¿Ya tienes cuenta? <a href="<?=base_url('profesional/login')?>?var=0">Sign In</a></p>
                </form>
                <form style="display: <?php 
                                        if(isset($registra)){ 
                                            if($registra || $actualiza){
                                                echo 'none';
                                            }else{
                                                echo 'block';
                                            }
                                        }
                                           //$route['profesional/log_in'] = 'Profesional/login_profesionales';
                                           ?>;" class="login-form" action="<?=base_url('profesional/log_in')?>" method="post">                
                    <?php
                        //if(isset($message)){
                        //echo "<p class='error_message'>".$this->session->userdata('message')."</p>";                         
                        //}
                    ?>
                    <div class="title">Acceso a Profesionales </div>
                    <input name="perfil" type="hidden" value="profesional"/>
                    <input type="text" placeholder="@Email" name="email" class="form-control"/>
                    <span class="help-block"><?php echo form_error('email', '<div class="text-danger">', '</div>') ?></span> 
                    <input type="password" placeholder="Password" name="password" class="form-control"/>                                        
                    <span class="help-block"><?php echo form_error('password', '<div class="text-danger">', '</div>') ?></span> 
                    <button type="submit">Ingresar </button>
                    <!-- $route['cliente/crear'] = 'Cliente'; -->
                    <p class="message">¿No estás registrado? <a href="<?=base_url('profesional/crear')?>?var=1">Crear una cuenta</a></p>
                    <!-- $route['cliente/restablecer_contraseña'] = 'cliente/forgot_password'; -->
                    <p class="message"><a href="<?=base_url('profesional/restablecer_password')?>">¿Olvidaste tu constraseña?</a></p>
                </form>
            </div>
        </div>

    </section>
  
    <script>
        $('.message a').click(function(){            
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    </script>
</body>
</html>
                            
         