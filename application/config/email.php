<?php
  //Indicamos el protocolo a utilizar
  $config['protocol'] = 'smtp';
         
  //El servidor de correo que utilizaremos
   $config["smtp_host"] = 'ssl://smtp.googlemail.com';
    
  //Nuestro usuario
   $config["smtp_user"] = 'juanymdq@gmail.com';
    
  //Nuestra contraseña
   $config["smtp_pass"] = 'kano0479';   
    
  //El puerto que utilizará el servidor smtp
   $config["smtp_port"] = '465';
   
  //El juego de caracteres a utilizar
   $config['charset'] = 'utf-8';

  //Permitimos que se puedan cortar palabras
   $config['wordwrap'] = TRUE;
    
  //El email debe ser valido 
  $config['validate'] = true;

  //Indica el typo de cuerpo de mensaje
  $config['mailType'] = 'html';
