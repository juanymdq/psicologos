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
                                           
                                           ?>;" class="register-form" action="<?=base_url('cliente/cliente_save')?>" method="post">	
                    <?php if(isset($registra)){
                        if($registra && !$actualiza){?>
                        <div class="encabezado">
                            <div class=enc-titulo>
                                Registro de Clientes
                            </div>
                            <div class="enc-cuerpo">
                                Deberas completar este formulario para acceder a los servicios de TerapiaVirtual.
                            </div>
                        </div>
                    <?php }else{?>
                        <div class="encabezado">
                            <div class=enc-titulo>
                                Modificación de Clientes
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
                    <?php if(isset($registra)){
                        if($registra && !$actualiza){?>  
                            <!--PASSWORD-->
                            <div class="form-group">
                                <div class="row">  
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-key bigicon" style="color: black"></i></span>
                                    <div class="col-md-8">
                                        <input name="password" id="password" type="password" class="form-control" placeholder="Password"> 
                                        <span class="help-block"><?php echo form_error('password', '<div class="text-danger">', '</div>') ?></span> 
                                    </div>
                                    <span class="col-md-1 text-center"><i class="fa fa-asterisk" style="color:red; font-size:12px"></i></span>
                                </div>
                            </div>
                             <!--CONFIRM PASSWORD-->
                             <div class="form-group">
                                <div class="row">  
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-key bigicon" style="color: black"></i></span>
                                    <div class="col-md-8">
                                        <input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirmar Password"> 
                                        <span class="help-block"><?php echo form_error('confirm_password', '<div class="text-danger">', '</div>') ?></span> 
                                    </div>
                                    <span class="col-md-1 text-center"><i class="fa fa-asterisk" style="color:red; font-size:12px"></i></span>
                                </div>
                            </div>
                            <button type="submit">Registrarse</button>
                            <p class="message">¿Ya tienes cuenta? <a href="<?=base_url('cliente/login')?>?var=0">Sign In</a></p>
                        <?php }else{ ?>
                            <button type="submit">Actualizar</button>
                    <?php }}?>
                    
                    
                </form>
                <form style="display: <?php 
                                        if(isset($registra)){ 
                                            if($registra || $actualiza){
                                                echo 'none';
                                            }else{
                                                echo 'block';
                                            }
                                        }
                                           
                                           ?>;" class="login-form" action="<?=base_url('cliente/log_in')?>" method="post">                
                    <?php
                      if(isset($message)){
                        echo "<p class='error_message'>".$message."</p>";                        
                    }
                    ?>
                    <div class="title">Acceso a Clientes </div>
                    <input name="perfil" type="hidden" value="cliente"/>
                    <input type="text" placeholder="@Email" name="email" class="form-control"/>
                    <span class="help-block"><?php echo form_error('email', '<div class="text-danger">', '</div>') ?></span> 
                    <input type="password" placeholder="Password" name="password" class="form-control"/>                                        
                    <span class="help-block"><?php echo form_error('password', '<div class="text-danger">', '</div>') ?></span> 
                    <button type="submit">Ingresar </button>
                    <!-- $route['cliente/crear'] = 'Cliente'; -->
                    <p class="message">¿No estás registrado? <a href="<?=base_url('cliente/crear')?>?var=1">Crear una cuenta</a></p>
                    <!-- $route['cliente/restablecer_contraseña'] = 'cliente/forgot_password'; -->
                    <p class="message"><a href="<?=base_url('cliente/restablecer_password')?>">¿Olvidaste tu constraseña?</a></p>
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