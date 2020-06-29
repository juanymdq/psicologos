<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer();
    //Server settings 
        
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'ssl://smtp.googlemail.com';                    // Set the SMTP server to send through
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'juanymdq@gmail.com';                     // SMTP username
    $mail->Password   = 'kano0479';                               // SMTP password
    
    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('jifernandez04@hotmail.com', 'Juany');     // Add a recipient
    if(!empty($datosTurno)){        
        $item = array_values($datosTurno)[0];
    }else{
        
    }
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Terapia virtual - Confirmaci&oacute;n de turno';
    $mail->Body    = "
        <html>
            <head>               
            </head>
            <body>                
                <p>Cliente: ".$item['apellido'].", &nbsp;". $item['nombre']."</p>
                <p>Profesional: ".$item['pr_apellido'].", &nbsp;". $item['pr_nombre']."</p>
                <p>Fecha de turno: ".$item['fecha_string']."</p>
                <p>Estado de pago de la sesion: ".$item['payment_status']."</p>
                <p>El siguiente id lo necesitará para conectarse el dia del turno con el profesional por videollamada</p>
                <p>Id de la videollamada: ".$item['id_sesion']."</p>
            </body>
        </html>";
   
    if(!$mail->send()){       
        $datos['message_advice'] = "El turno se agendó correctamente pero el mensaje no pudo ser enviado por mail";
        echo $mail->ErrorInfo;
    }else{
        $datos['message_advice'] = "El turno se agendó correctamente. Se envio un mail con los detalles del mismo";
        $datos['payment_message'] = $message;        
    }
?>
    
