<?php

namespace Com\Daw2\Controllers;

class InicioController extends \Com\Daw2\Core\BaseController {

    public function index() {
        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio']
        );        
        $this->view->showViews(array('templates/header.view.php', 'inicio.view.php', 'templates/footer.view.php'), $data);
    }

        
    public function listadoEjemplo() {
        $data = array(
            'titulo' => 'Listado ejemplo',
            'breadcrumb' => ['Inicio', 'Listado ejemplo']
        );        
        $this->view->showViews(array('templates/header.view.php', 'proveedores.sample.php', 'templates/footer.view.php'), $data);
    }
}
