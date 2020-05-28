public function sendMail()
    {
        $email = $this->input->post("email");  
        $token = $this->session->userdata('token');
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            //guarda el token en la bd para cotejarlo luego
            $data = array('token' => $token, 'email' => $email);
            $this->usuarios_model->insert_token($data);

            $this->load->library('email');
            $this->config->load('email');
 
        //Ponemos la dirección de correo que enviará el email y un nombre
          $this->email->from('juanymdq@gmail.com', 'Juan Fernandez');
           
        /*
         * Ponemos el o los destinatarios para los que va el email
         * en este caso al ser un formulario de contacto te lo enviarás a ti
         * mismo
         */
          $this->email->to($email);
           
        //Definimos el asunto del mensaje
          $this->email->subject('Restablecer contraseña');
           
        //Definimos el mensaje a enviar
          $this->email->message(
                'El mail ' . $email . ' solicitó restablecer la contraseña. ' .
                'Para realizarlo, presione el siguiente enlace </br>' .
                $token
            );
           
          //Enviamos el email y si se produce bien o mal que avise con una flasdata
          if($this->email->send()){
              $this->session->set_flashdata('envio', 'Email enviado correctamente');
          }else{
              $this->session->set_flashdata('envio', 'No se a enviado el email');
          }
           
          redirect(base_url('login'));
  
            
        }else{
            $this->load->view('usuarios/forgot_password');
        }
    }