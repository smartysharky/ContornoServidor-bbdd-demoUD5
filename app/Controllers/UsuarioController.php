<?php
declare(strict_types = 1);

namespace Com\Daw2\Controllers;

class UsuarioController extends \Com\Daw2\Core\BaseController {
    
    function mostrarTodosUsuarios(){
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $usuarios = $modelo->getAllUsers();
        
        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio'],
            'usuarios' => $usuarios
        );        
        $this->view->showViews(array('templates/header.view.php', 'inicio.view.php', 'templates/footer.view.php'), $data);
    }
}