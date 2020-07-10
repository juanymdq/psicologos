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
                            <?php if($this->session->userdata('nombre') != null || $this->session->userdata('pr_nombre') != null) {
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
                    
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div>
                            <span><img src="<?=base_url()?>application/assets/img/icono-terapia-mod.png" width="35px" height="30px" alt=""></span>
                            <a href="<?=base_url('principal')?>" class="menu-dos-link-text">
                                    Terapia<strong>Virtual</strong>
                            </a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link" href="#">
                                    <span class="d-lg-none"><i class="fa fa-bars" aria-hidden="true"></i></span>
                                    Nuestro Staff<span class="sr-only">(current)</span>
                                </a>
                                <a class="nav-item nav-link" href="#">
                                    <span class="d-lg-none"><i class="fa fa-comments" aria-hidden="true"></i></span>
                                    Preguntas frecuentes
                                </a>
                                <a class="nav-item nav-link" href="#">
                                    <span class="d-lg-none"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    Quiénes somos
                                </a>
                                <a class="nav-item nav-link" href="#">
                                    <span class="d-lg-none"><i class="fa fa-indent" aria-hidden="true"></i></i></span>
                                    Noticias
                                </a> 
                                <div class="d-lg-none">
                                    <a class="nav-item nav-link" href="<?=base_url('cliente/login')?>?var=0" >
                                        <span><i class="fas fa-user"></i></span>
                                        Iniciar sesión clientes
                                    </a>
                                </div>   
                                <div class="d-lg-none">                        
                                    <a class="nav-item nav-link" href="<?=base_url('profesional')?>" class="d-lg-none">
                                        <span><i class="fas fa-briefcase"></i></span>
                                        Iniciar sesión psicólogos
                                    </a>
                                </div>
                                <div class="d-lg-none">
                                    <?php if($this->session->userdata('nombre') != null) {
                                        switch($this->session->userdata('perfil')){
                                            case 'administrador':?>
                                                <a class="nav-item nav-link" href="<?=base_url('administrador')?>"> <span><i class="fas fa-user-shield"></i></span><?=$this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
                                            <?php break;
                                            case 'profesional':?>
                                                <a class="nav-item nav-link" href="<?=base_url('profesional/home_profesionales')?>"> <span><i class="fas fa-briefcase"></i></span><?=$this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
                                            <?php break;
                                            case 'cliente':?>
                                                <a class="nav-item nav-link" href="<?=base_url('cliente/cpanel')?>"> <span><i class="fas fa-user"></i></span><?=$this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
                                            <?php break;
                                        } 
                                    }?>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div class="ruta-relativa">
                        <?php
                        if(isset($ruta_relativa)) echo $ruta_relativa
                        ?>
                    </div>
                   
                </header>
            </div> 
        </div>
    </head>

<body>

</body>
</html>