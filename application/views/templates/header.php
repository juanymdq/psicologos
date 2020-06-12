<html>
    <head>
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
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/header.css"/>
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/footer.css"/>
        
        <header>
            <div class="menu-uno">
                <div class="menu-uno-usuario">				
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
                </div>  
                <?php if($this->session->userdata('nombre') != null) {?> 
                    <div class="menu-uno-btn">                        
                    </div> 
                <?php }else{?>
                    <div class="menu-uno-btn">
                        <a href="<?=base_url('cliente/login')?>?var=0" class="menu-uno-link">CLIENTES&nbsp;&nbsp;&nbsp;|</a>
                        <a href="<?=base_url('profesional')?>" class="menu-uno-link">INICIAR SESIÓN PSICOLOGOS</a>			
                    </div>                     
                <?php }?>
            </div>
            <div class="menu-dos">
                <div class="menu-dos-img"><img src="<?=base_url()?>application/assets/img/divan.png" class="imgLogo" /></div>
                <div class="menu-dos-text">Terapia Virtual</div>
                <div class="menu-dos-link">
                    <a href="<?=base_url('principal')?>" class="menu-dos-link-text">INICIO</a>                
                    <a href="" class="menu-dos-link-text">NOSOTROS</a>
                    <a href="<?=base_url('webcam')?>" class="">WEBCAM</a>
                    <a href="" class="menu-dos-link-text">INICIO</a>			
                </div>
            </div>

          
        </header>
    </head>
<body>

</body>
</html>