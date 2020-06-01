<div class="tab">
            <button class="tablinks" onclick="tabOption(event, 'iniciar')">INICIAR SESIÓN</button>
            <button class="tablinks" onclick="tabOption(event, 'registro')">REGISTRO</button>    
        </div>
        <div id="iniciar" class="tabcontent">
            <div class="modal-dialog text-center">
                <div class="col-sm-8 main-section">
                    <div class="modal-content">
                        <div class="col-12 user-img">                    
                            <img src="<?=base_url()?>application/assets/img/user.png"/>
                        </div>                
                        <form class="col-12" action="<?=base_url()?>login/new_user" method="post">                
                            <?php
                                if(isset($aviso_message)){
                                    echo "<p class='aviso_message'>".$aviso_message."</p>";                         
                                }
                            ?>
                            <div class="form-group" id="user-group">                        
                                <input type="text" class="form-control" placeholder="@Email" name="email"/>
                            </div>
                            <div class="form-group" id="contrasena-group">                        
                                <input type="password" class="form-control" placeholder="Password" name="password"/>
                            </div>                    
                            <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar </button>
                        </form>
                        <div class="col-12 forgot">
                            <span class="no-count">¿No tienes una cuenta?</span><a href="<?=base_url('usuarios/user_save')?>"> Crea una</a>
                        </div>
                        <div class="col-12 forgot">
                            <a href="<?=base_url()?>usuarios/sendMail">Recordar contrasena?</a>
                        </div>
                        <?php
                            if($this->session->flashdata('email_incorrecto'))
                            {?>
                                <div class="alert alert-danger" role="alert">
                            
                                    <?=$this->session->flashdata('email_incorrecto');?>
                                </div>
                                
                            <?php } ?> 		       
                    </div>
                </div>
            </div>
        </div>
        <div id="registro" class="tabcontent">
            <div class="container">		
                <div class="login-form">			
                    <div class="form-header">
                        <img src="<?=base_url()?>application/assets/img/user.png" width="70px" height="70px" />
                        
                    </div>
                    <form action="<?=base_url('usuarios/user_save')?>" id="register-form" method="post"  class="form-register" role="form">										
                        <?php
                        if(isset($error_message)){
                            echo "<p class='error_message'>".$error_message."</p>";
                        }
                        ?>
                        <div>				
                            <input value="<?=$nombre?>" name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre"> 
                            <span class="help-block"><?php echo form_error('nombre', '<div class="text-danger">', '</div>') ?></span> 
                        </div>
                        <div>				
                            <input value="<?=$apellido?>" name="apellido" id="apellido" type="text" class="form-control" placeholder="Apellido"> 
                            <span class="help-block"><?php echo form_error('apellido', '<div class="text-danger">', '</div>') ?></span> 
                        </div>
                        <div>				
                            <input value="<?=$email?>" name="email" id="email" type="text" class="form-control" placeholder="@Email"> 					
                            <span class="help-block"><?php echo form_error('email', '<div class="text-danger">', '</div>') ?></span> 
                        </div>                        
                        <div>
                            <input name="password" id="password" type="password" class="form-control" placeholder="Password"> 
                            <span class="help-block"><?php echo form_error('password', '<div class="text-danger">', '</div>') ?></span> 
                        </div>
                        <div>
                            <input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirmar Password"> 
                            <span class="help-block"><?php echo form_error('confirm_password', '<div class="text-danger">', '</div>') ?></span> 
                        </div>
                        <div class="div-botones">
                            <button class="btn bt-login" type="submit" id="submit_btn" data-loading-text="Registrando....">Registrarse</button>
                            <div class="separator"></div>
                            <button class="btn btn-warning" type="button" onclick="location.href='<?=base_url('login')?>'" >Cancelar</button>
                        </div>                       
                    </form>
                    
                </div>
            </div>
        </div>
  