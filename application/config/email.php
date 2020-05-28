<?php
  //Indicamos el protocolo a utilizar
  $config['protocol'] = 'smtp';
         
  //El servidor de correo que utilizaremos
   $config["smtp_host"] = 'smtp.gmail.com';
    
  //Nuestro usuario
   $config["smtp_user"] = 'juanymdq@gmail.com';
    
  //Nuestra contraseña
   $config["smtp_pass"] = 'kano0479';   
    
  //El puerto que utilizará el servidor smtp
   $config["smtp_port"] = '587';
   
  //El juego de caracteres a utilizar
   $config['charset'] = 'utf-8';

  //Permitimos que se puedan cortar palabras
   $config['wordwrap'] = TRUE;
    
  //El email debe ser valido 
  $config['validate'] = true;
