<?php
declare(strict_types = 1);

namespace Com\Daw2\Controllers;

class UsuarioController extends \Com\Daw2\Core\BaseController {
    
    function mostrarTodosUsuarios(){
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $usuarios = $modelo->getAllUsers();
        
        $data = array(
            'titulo' => 'Todos usuarios',
            'breadcrumb' => ['Inicio', 'Usuarios'],
            'seccion' => 'usuarios-full',
            'usuarios' => $usuarios
        );        
        $this->view->showViews(array('templates/header.view.php', 'usuarios.view.php', 'templates/footer.view.php'), $data);
    }
    
    function mostrarUsuariosOrderBySalar(){
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $usuarios = $modelo->getAllUserOrderBySalar();
        
        $data = array(
            'titulo' => 'Usuarios por salario',
            'breadcrumb' => ['Inicio', 'Usuarios'],
            'seccion' => 'usuarios-salar',
            'usuarios' => $usuarios
        );        
        $this->view->showViews(array('templates/header.view.php', 'usuarios.view.php', 'templates/footer.view.php'), $data);
    }
    
    function mostrarUsuariosCarlos(){
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $usuarios = $modelo->getUsersNameCarlos();
        
        $data = array(
            'titulo' => 'Usuarios Carlos',
            'breadcrumb' => ['Inicio', 'Usuarios'],
            'seccion' => 'usuarios-carlos',
            'usuarios' => $usuarios
        );        
        $this->view->showViews(array('templates/header.view.php', 'usuarios.view.php', 'templates/footer.view.php'), $data);
    }
    
    function mostrarUsuariosStandard(){
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $usuarios = $modelo->getStandardUsers();
        
        $data = array(
            'titulo' => 'Usuarios Standard',
            'breadcrumb' => ['Inicio', 'Usuarios'],
            'seccion' => 'usuarios-standard',
            'usuarios' => $usuarios
        );        
        $this->view->showViews(array('templates/header.view.php', 'usuarios.view.php', 'templates/footer.view.php'), $data);
    }
    
    function mostrarListadoFiltros() : void{
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $usuarios = $modelo->getAllUsers();
        
        $rolModel = new \Com\Daw2\Models\AuxRolModel();
        $roles = $rolModel->getAll();
        
        $data = array(
            'titulo' => 'Usuarios',
            'breadcrumb' => ['Inicio', 'Usuarios'],
            'seccion' => 'usuarios-filtros',
            'usuarios' => $usuarios,
            'roles' => $roles
        );        
        $this->view->showViews(array('templates/header.view.php', 'usuarios-filtro.view.php', 'templates/footer.view.php'), $data);
    }
}