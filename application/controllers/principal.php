<?php
class Principal extends MY_Controller {

    function index() {
        $datos['titulo'] = "Inicio";
        $this->render_page('principal_view',$datos);
    }
}

?>