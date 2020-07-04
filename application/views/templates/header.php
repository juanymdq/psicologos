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
                        <div class="usuario">
                            <?php if($this->session->userdata('nombre') != null) {
                                switch($this->session->userdata('perfil')){
                                    case 'administrador':?>
                                        <a href="<?=base_url('administrador')?>"> <span><i class="fas fa-user-shield"></i></span><?=$this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
                                    <?php break;
                                    case 'profesional':?>
                                        <a href="<?=base_url('profesional/home_profesionales')?>"> <span><i class="fas fa-briefcase"></i></span><?=$this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
                                    <?php break;
                                    case 'cliente':?>
                                        <a href="<?=base_url('cliente/cpanel')?>"> <span><i class="fas fa-user"></i></span><?=$this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
                                    <?php break;
                                } 
                            }?>
                        </div>
                        <?php if($this->session->userdata('nombre') == null) {?> 
                        <div class="logins">
                            <div class="login-cliente">                            
                                <a href="<?=base_url('cliente/login')?>?var=0">
                                    <span><i class="fas fa-user"></i></span>
                                    Iniciar sesión clientes
                                </a>
                            </div>
                            <div class="divisor">|</div>
                            <div class="login-psicologo">                            
                                <a href="<?=base_url('profesional')?>">
                                    <span><i class="fas fa-briefcase"></i></span>
                                    Iniciar sesión psicólogos
                                </a>
                            </div>
                        </div>
                        <?php }?>
                    </div> 

                    <div class="menu-dos">
                        <div class="terapia">
                            <span><img src="<?=base_url()?>application/assets/img/icono-terapia.png" width="35px" height="30px" alt=""></span>
                            <a href="<?=base_url('principal')?>" class="menu-dos-link-text">
                                 Terapia<strong>Virtual</strong>
                            </a>
                        </div>
                        <div class="menu-dos-flex">
                            <div>
                                <a href="" class="menu-dos-link-text">                                
                                    Nuestro Staff
                                </a>
                            </div>
                            <div>
                                <a href="" class="menu-dos-link-text">                               
                                    Preguntas frecuentes
                                </a>
                            </div>
                            <div>
                                <a href="" class="menu-dos-link-text">                               
                                    Quiénes somos
                                </a>
                            </div>                            
                        </div>
                    </div>

                    <div class="menu-dos-toggle">
                        <div class="toggle-menu">
                            <div>
                                <input type="checkbox" id="btn-menu">
                                <label for="btn-menu"><img id="img" src="<?=base_url()?>application/assets/img/menu.png" alt=""></label>
                            </div>
                            <div class="toggle-usuario">
                                <?php if($this->session->userdata('nombre') != null) {
                                    switch($this->session->userdata('perfil')){
                                        case 'administrador':?>
                                            <a href="<?=base_url('administrador')?>"> <span><i class="fas fa-user-shield"></i></span><?=$this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
                                        <?php break;
                                        case 'profesional':?>
                                            <a href="<?=base_url('profesional/home_profesionales')?>"> <span><i class="fas fa-briefcase"></i></span><?=$this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
                                        <?php break;
                                        case 'cliente':?>
                                            <a href="<?=base_url('cliente/cpanel')?>"> <span><i class="fas fa-user"></i></span><?=$this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
                                        <?php break;
                                    } 
                                }?>
                            </div>
                            <div>
                                <a href="<?=base_url('principal')?>" class="menu-dos-link-text">
                                    <span><i class="fas fa-home"></i></span>
                                    Inicio
                                </a>
                            </div>
                            <div>
                                <a href="" class="menu-dos-link-text">
                                    <span><i class="fas fa-info-circle"></i></span>
                                    Quienes somos
                                </a>
                            </div>
                            <div class="toggle-cliente">
                                <a href="<?=base_url('cliente/login')?>?var=0">
                                    <span><i class="fas fa-user"></i></span>
                                    Iniciar sesión clientes
                                </a>
                            </div>
                            <div class="toggle-psicologo">
                                <a href="<?=base_url('profesional')?>">
                                    <span><i class="fas fa-briefcase"></i></span>
                                    Iniciar sesión psicólogos
                                </a>
                            </div>
                        </div>
                    </div>
                </header>
            </div> 
        </div>
    </head>
<body>

</body>
</html>