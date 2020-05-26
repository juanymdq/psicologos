<!DOCTYPE html>
 <html lang="es">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <script src="https://kit.fontawesome.com/e2bb6fb4f5.js" crossorigin="anonymous"></script>
 <link rel=StyleSheet href="<?=base_url()?>application/assets/css/login_css.css" type="text/css" media=screen />  
 <script>

    var pwShown = 0;
    function handleHidePassword(){    
        if (pwShown == 0) {
            pwShown = 1;
            show();
        } else {
            pwShown = 0;
            hide();
        }
    }
    function handleSubmit(event) {
        event.preventDefault();  
        alert("submit")

    }
    function show() {
        var p = document.getElementById('pwd');
        p.setAttribute('type', 'text');
    }

    function hide() {
        var p = document.getElementById('pwd');
        p.setAttribute('type', 'password');
    }

 </script>
 </head>
 <body>

    <?php
    $username = array(
        'name'        => 'username', 
        'placeholder' => '@Email', 
        'class'       => 'form-input',
        'type'        => 'text'
    );
    $password = array(
        'name'        => 'password',
        'placeholder' => 'introduce tu password', 
        'class'       => 'form-input',
        'type'        => 'password',
        'id'          => 'pwd'        
    );
    $submit = array(
        'name'  => 'submit', 
        'value' => 'Log In', 
        'title' => 'Iniciar sesi&oacute;n',
        'type'  => 'submit',
        'class' => 'log-in'
    );
    $botonSignUp = array(
        'name'    => 'signUp' ,
        'id'      => 'signUp' ,
        'value'   => 'true' ,
        'type'    => 'button' ,
        'content' => 'Reset',
        'class'   => 'btn submits sign-up'        
    );
    ?>
    <div class="overlay">
    <?=form_open(base_url().'login/new_user')?>  
        <div class="con">   
            <header class="head-form">
                <h2>Log In</h2>      
                <p>Ingrese Email y Password para acceder</p>
            </header>  
            <br />
            <div class="field-set">                
                <i class="fas fa-user-circle input-item"></i>                
                <?=form_input($username)?>
                <br />
                <i class="fas fa-key input-item"></i>                
                <?=form_password($password)?>                
                <i class="fas fa-eye eye" onclick="handleHidePassword()"></i>                
                <br />
                <?=form_submit($submit)?>               
            </div>
        
            <div class="other">
                <button class="btn submits frgt-pass">Forgot Password</button>
                <?=form_button($botonSignUp)?>                                
                <span id="user-plus">
                    <i class="fas fa-userPlus"></i>
                </span>
               
            </div> 
        </div> 
    <?=form_close()?>
    </div>
    <?php
        if($this->session->flashdata('usuario_incorrecto'))
        {?>
        <p><?=$this->session->flashdata('usuario_incorrecto')?></p>
        <?php
        }
    ?>
</body>   
</html>
