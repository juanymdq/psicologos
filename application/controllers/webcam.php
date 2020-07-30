<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webcam extends MY_Controller {

    public function __construct()
    {
         parent::__construct();   
         $this->load->library(array('session','form_validation'));
         //llamo al helper url
         $this->load->helper(array('url','form'));               
    }

    public function index()
    { 
      
       
    }

    function acceso_camara($id_session) {
        $datos['id_sesion'] = $id_session;
        $this->render_page('webcam/acceso_webcam',$datos);

    }
}