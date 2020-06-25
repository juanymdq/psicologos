<html>
    <head>
    <meta name="viewport"content="width-device-with, user-scalable-no,initial-scale-1.0,maximum-scale-1.0, minimum-scale-1.0">
        	<!-- STYLES -->
	  <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/solid.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
        <!-- Los iconos tipo Solid de Fontawesome-->
        
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>

        <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>        
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/footer.css"/>
        <div class="container">
            <div class="menu">
                <header>                    
                    <div class="menu-uno">                         
                                                                 
                            <nav class="uno">
                                <ul>
                                    <li class="usuario">                                        
                                        <?php if($this->session->userdata('nombre') != null) {
                                            switch($this->session->userdata('perfil')){
                                                case 'administrador':?>
                                                    <a href="<?=base_url('administrador')?>"> <?="Administrador: ". $this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
                                                <?php break;
                                                case 'profesional':?>
                                                    <a href="<?=base_url('profesional/home_profesionales')?>"> <?="Profesional logueado: ". $this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
                                                <?php break;
                                                case 'cliente':?>
                                                    <a href="<?=base_url('cliente/cpanel')?>"> <?="Cliente logueado: ". $this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
                                                <?php break;
                                            } 
                                        }?>
                                    </li>       
                                    <?php if($this->session->userdata('nombre') == null) {?>                                
                                        <li class="logins"><a href="<?=base_url('cliente/login')?>?var=0">CLIENTES&nbsp;&nbsp;&nbsp;|</a></li>
                                        <li><a href="<?=base_url('profesional')?>">INICIAR SESIÓN PSICOLOGOS</a></li>
                                    <?php }?>
                                </ul>
                            </nav>
                          
                        
                    </div>
                    <div class="menu-dos">
                        
                            <input type="checkbox" id="btn-menu">
                            <label for="btn-menu"><img id="img" src="<?=base_url()?>application/assets/img/menu.png" alt=""></label>
                       
                        <nav class="nav">
                            <ul>
                                <li><a href="<?=base_url('principal')?>" class="menu-dos-link-text">INICIO</a></li>
                                <li><a href="" class="menu-dos-link-text">NOSOTROS</a></li>
                                <li><a href="<?=base_url('webcam')?>" class="">WEBCAM</a></li>
                                <li><a href="" class="menu-dos-link-text">INICIO</a></li>
                            </ul>
                        </nav>
                    </div>            
                </header>
            </div> 
        </div>
    </head>
<body>

</body>
</html>