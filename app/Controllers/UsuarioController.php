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
        $rolModel = new \Com\Daw2\Models\AuxRolModel();
        $roles = $rolModel->getAll();
        
        $input = filter_var_array($_GET, FILTER_SANITIZE_SPECIAL_CHARS);
        
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        if(!empty($_GET['id_rol']) && filter_var($_GET['id_rol'], FILTER_VALIDATE_INT)){
            $usuarios = $modelo->getUsuariosByIdRol((int)$_GET['id_rol']);
        }
        else if(!empty($_GET['username'])){
            $usuarios = $modelo->getUsuariosByUsername($_GET['username']);
        }
        else if((!empty($_GET['min_salar']) && is_numeric($_GET['min_salar'])) || (!empty($_GET['max_salar']) && is_numeric($_GET['max_salar']))){
            $min = (!empty($_GET['min_salar']) && is_numeric($_GET['min_salar'])) ? (float) $_GET['min_salar'] : NULL;
            /*if((!empty($_GET['min_salar']) && is_numeric($_GET['min_salar']))){
                $min =  (float) $_GET['min_salar'] ;
            }
            else{
                $min = NULL;
            }*/
            $max = (!empty($_GET['max_salar']) && is_numeric($_GET['max_salar'])) ? (float) $_GET['max_salar'] : NULL;
            
            $usuarios = $modelo->getUsuariosBySalar($min, $max);            
        }
        else if((!empty($_GET['min_ret']) && is_numeric($_GET['min_ret'])) || (!empty($_GET['max_ret']) && is_numeric($_GET['max_ret']))){
            $min = (!empty($_GET['min_ret']) && is_numeric($_GET['min_ret'])) ? (float) $_GET['min_ret'] : NULL;
            /*if((!empty($_GET['min_ret']) && is_numeric($_GET['min_ret']))){
                $min =  (float) $_GET['min_ret'] ;
            }
            else{
                $min = NULL;
            }*/
            $max = (!empty($_GET['max_ret']) && is_numeric($_GET['max_ret'])) ? (float) $_GET['max_ret'] : NULL;
            
            $usuarios = $modelo->getUsuariosByRetencion($min, $max);            
        }
        else{
            $usuarios = $modelo->getAllUsers();
        }        
        
        $data = array(
            'titulo' => 'Usuarios',
            'breadcrumb' => ['Inicio', 'Usuarios'],
            'seccion' => 'usuarios',
            'usuarios' => $usuarios,
            'roles' => $roles,
            'input' => $input
        );        
        $this->view->showViews(array('templates/header.view.php', 'usuarios-filtro.view.php', 'templates/footer.view.php'), $data);
    }    
}