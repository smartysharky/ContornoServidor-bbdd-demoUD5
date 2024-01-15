<?php

namespace Com\Daw2\Core;

use Steampixel\Route;

class FrontController{
    
    static function main(){
        Route::add('/', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\InicioController();
                    $controlador->index();
                }
                , 'get');
        
        Route::add('/formulario', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\FormularioExamenController();
                    $controlador->mostrarFormulario();
                }
                , 'get');
                
        Route::add('/formulario', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\FormularioExamenController();
                    $controlador->procesarFormulario();
                }
                , 'post');
        
        Route::add('/anagrama', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\AnagramaController();
                    $controlador->mostrarFormulario();
                }
                , 'get');
                
        Route::add('/anagrama', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\AnagramaController();
                    $controlador->procesarFormulario();
                }
                , 'post');
        
        Route::add('/letra-palabras', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\PrimeraLetraPalabrasController();
                    $controlador->mostrarFormulario();
                }
                , 'get');
                
        Route::add('/letra-palabras', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\PrimeraLetraPalabrasController();
                    $controlador->procesarFormulario();
                }
                , 'post');
        
        Route::add('/contar-letras', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\ContarLetrasController();
                    $controlador->mostrarFormulario();
                }
                , 'get');
        
        Route::add('/contar-letras', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\ContarLetrasController();
                    $controlador->doFormulario();
                }
                , 'post');
                
        Route::add('/procesar-asignaturas-1', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\ProcesarAsignaturasController();
                    $controlador->mostrarFormulario();
                }
                , 'get');
                
        Route::add('/procesar-asignaturas-1', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\ProcesarAsignaturasController();
                    $controlador->doProcesarAsignaturasI();
                }
                , 'post');
                
        Route::add('/procesar-asignaturas-2', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\ProcesarAsignaturasController();
                    $controlador->mostrarFormularioComplejo();
                }
                , 'get');
                
        Route::add('/procesar-asignaturas-2', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\ProcesarAsignaturasController();
                    $controlador->doProcesarAsignaturasII();
                }
                , 'post');
                
        Route::add('/usuarios-full', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\UsuarioController();
                    $controlador->mostrarTodosUsuarios();
                }
                , 'get');
        
        Route::add('/usuarios', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\UsuarioController();
                    $controlador->mostrarListadoFiltros();
                }
                , 'get');
        
        Route::add('/usuarios-carlos', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\UsuarioController();
                    $controlador->mostrarUsuariosCarlos();
                }
                , 'get');
        Route::add('/usuarios-standard', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\UsuarioController();
                    $controlador->mostrarUsuariosStandard();
                }
                , 'get');
        
        Route::add('/usuarios-salar', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\UsuarioController();
                    $controlador->mostrarUsuariosOrderBySalar();
                }
                , 'get');
                
        Route::pathNotFound(
            function(){
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error404();
            }
        );
        
        Route::methodNotAllowed(
            function(){
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error405();
            }
        );
        Route::run();
    }
}

