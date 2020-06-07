<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!--JQUERY-->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Nuestro css-->
    
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/login_nuevo.css"/>
    <style>
        label {
            text-align: left;
        }
        #canvas, #video {
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .foto_perfil {
            margin: 10px 0 15px;
            font-size: 20px;
        }
     
    </style>
</head>
<body>
    <header>
        <div class="menu-uno">            		
            <div class="menu-uno-usuario">				
				<?php if($this->session->userdata('nombre') != null) {?>
				<a href="<?=base_url('profesional/home_profesionales')?>"><?="Profesional: ". $this->session->userdata('nombre') . " " . $this->session->userdata('apellido'); }?></a>
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
    </header>
    <section>
        <div class="title">Acceso a Profesionales </div>
        <div class="login-page">            
            <div class="form">
                    
                    <div class="enc-titulo">Mi Perfil</div>                        
                               

                     <!--************************TOMAR FOTO DE WEBCAM -->
                     <!—Aquí el video embebido de la webcam -->
                    <div class="video-wrap">
                    <video id="video" playsinline autoplay></video>
                    </div>
                    <!—El elemento canvas -->
                    <div class="controller">
                    <button id="snap">Capture</button>
                    </div>
                    <!—Botón de captura -->
                    
                    <!--****************************************************************** -->


                <form  class="register-form" action="<?=base_url('profesional/profesional_save/'.$this->session->userdata('id'))?>" method="post">	
                    
                    <?php
                    if(isset($error_message)){
                        echo "<p class='error_message'>".$error_message."</p>";
                    }
                    ?>
                    <div class="foto_perfil">Foto de perfil</div>
                    <canvas id="canvas" width="316" height="259"></canvas> 
                    <input type="hidden" id="foto" name="foto" value="" />
                    <hr/>

                    <input type="hidden" name="registra" value="<?=$registra?>"/>                   
                    <label>Matricula</label>
                    <input value="<?=$matricula?>" name="matricula" id="matricula" type="text" placeholder="Matricula">                     
                    <span class="help-block"><?php echo form_error('matricula', '<div class="text-danger">', '</div>') ?></span>                    

                    <label>Nombre</label>
                    <input value="<?=$nombre?>" name="nombre" id="nombre" type="text" placeholder="Nombre">                     
                    <span class="help-block"><?php echo form_error('nombre', '<div class="text-danger">', '</div>') ?></span> 
                                 
                    <label>Apellido</label>
                    <input value="<?=$apellido?>" name="apellido" id="apellido" type="text" placeholder="Apellido"> 
                    <span class="help-block"><?php echo form_error('apellido', '<div class="text-danger">', '</div>') ?></span> 

                    <label>Telefono</label>
                    <input value="<?=$telefono?>" name="telefono" id="telefono" type="text" placeholder="Teléfono"> 
                    <span class="help-block"><?php echo form_error('telefono', '<div class="text-danger">', '</div>') ?></span> 
                                    
                    <label>Email</label>
                    <input value="<?=$email?>" name="email" id="email" type="text" placeholder="@Email"> 					
                    <span class="help-block"><?php echo form_error('email', '<div class="text-danger">', '</div>') ?></span>                     
                    
                    <label>Biografía</label>
                    <textarea name="resenia" id="resenia" cols="50" rows="10" placeholder="Ingrese su biografía"><?=$resenia?></textarea>                     
                    <span class="help-block"><?php echo form_error('resenia', '<div class="text-danger">', '</div>') ?></span> 

                    <button type="submit">Actualizar datos</button>
    
                </form>              
            </div>
        </div>

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
    <script>

        'use strict';

        const video = document.getElementById('video');
        const snap = document.getElementById("snap");
        const canvas = document.getElementById('canvas');
        const errorMsgElement = document.querySelector('span#errorMsg');

        const constraints = {
        audio: false,
        video: {
        width: 316, height: 259
        }
        };

        // Acceso a la webcam
        async function init() {
        try {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        handleSuccess(stream);
        } catch (e) {
        errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
        }
        }
        // Correcto!
        function handleSuccess(stream) {
        window.stream = stream;
        video.srcObject = stream;
        }
        // Load init
        init();
        // Dibuja la imagen
        var context = canvas.getContext('2d');
        snap.addEventListener("click", function() {
            context.drawImage(video, 0, 0, 316, 259);
            let photo = canvas.toDataURL('image/png');
            document.getElementById('foto').value = photo;
        });
    </script>  
  
</body>
</html>