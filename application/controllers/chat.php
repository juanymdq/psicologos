<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->library(array('session','form_validation'));         
         $this->load->helper(array('url','form'));        
    }

    public function index() { 
        $this->load->view('chat/chat_view');
       
    }
}