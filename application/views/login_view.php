<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/login_css.css">

    <style>
        header .logo {
            float: left;			
            color: #ADAFAF;	
            margin-top: -7em;	
            margin-left: 2.5em;	
        }
        .textLogo {
            float: left;
            width: 380px;
            margin-left: 1em;
            margin-top: 1em;			
        }

        .textLogo p {			
            font-size: 30px;
        }

        .divLogo {
            float: left;
            margin-top: 5px
        }

        .imgLogo {
            width: 100px;
            height: 60px;
        }

        .no-count {
            color: #ADAFAF;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="<?=base_url()?>">
            <div class="divLogo">
                <img 
                    src="<?=base_url()?>application/assets/img/divan.png" 
                    class="imgLogo"
                    title="Inicio"    
                />
            </div>            
            </a>
        </div>
    </header>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">                    
                    <img src="<?=base_url()?>application/assets/img/user.png"/>
                </div>                
                <form class="col-12" action="<?=base_url()?>login/new_user" method="post">
                    <div class="form-group" id="user-group">                        
                        <input type="text" class="form-control" placeholder="@Email" name="email"/>
                    </div>
                    <div class="form-group" id="contrasena-group">                        
                        <input type="password" class="form-control" placeholder="Contrasena" name="password"/>
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
</body>
</html>