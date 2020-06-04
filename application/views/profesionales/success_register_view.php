<!DOCTYPE html>
<html>
<head>
    <title>Profesional Registrado</title>
    <!--JQUERY-->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Nuestro css-->
    
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/login_nuevo.css"/>
    <style>
        .contenedor {
            border: 1px solid;
            text-align: center;
        }
        
    </style>
</head>
<body>
    <header>
        <div class="menu-uno">
            <div class="menu-uno-usuario">				
              
            </div>
            <div class="menu-uno-btn">
                <a href="" class="btn-turnos">TURNOS</a>
                <a href="<?=base_url('profesional/acceso_profesionales')?>" class="menu-uno-link">INICIAR SESIÓN PSICOLOGOS</a>			
            </div>
        </div>
        <div class="menu-dos">
            <div class="menu-dos-img"><img src="<?=base_url()?>application/assets/img/divan.png" class="imgLogo" /></div>
            <div class="menu-dos-text">Terapia Virtual</div>
            <div class="menu-dos-link">
                <a href="<?=base_url('Welcome')?>" class="menu-dos-link-text">INICIO</a>
                <a href="<?=base_url('cliente/acceso_clientes')?>" class="menu-dos-link-text">ACCESO CLIENTES</a>
                <a href="" class="menu-dos-link-text">NOSOTROS</a>
                <a href="<?=base_url('webcam')?>" class="">WEBCAM</a>
                <a href="" class="menu-dos-link-text">INICIO</a>			
            </div>
        </div>
    </header>
<section>
    <div class="contenedor">

        <h2>¡¡Bienvenido <?=$nombre?> <?=$apellido?>!!</h2>

        <p>Gracias por querer formar parte de nuestro staff</p>

        <p>¡Bien! El siguiente paso es evaluar tu perfil. Para eso, en primera instancia,</p>
        <p> vamos a necesitar que nos envíes la siguientes documentación por mail a la dirección</p>
        .......

        <p>- CV con foto actualizada</p>
        <p>- Copia del DNI actualizado</p>
        <p>- Copia de carnet profesional</p>

        <p>Luego, una vez que nuestro equipo evalúe tu perfil, se pondrá en contacto nuevamente con vos</p>
        <p> y te solicitará el resto de la documentación, que consiste en lo siguiente:</p>

        <p>- Copia de titulo</p>
        <p>- Constancia de CBU</p>
        <p>- Constancia de CUIL</p>
        <p>- Constancia de Monotributo</p>

        <p>Todos los documentos adjuntos deben ser copias digitalizadas que se puedan leer claramente.</p>
        <p>Te recomendamos aplicaciones para el celular como Scanner App o My Scanner.</p>


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
</body>

</html>

























