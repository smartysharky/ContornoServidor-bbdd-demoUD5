<?php

namespace Com\Daw2\Models;

use \PDO;

class UsuarioModel extends \Com\Daw2\Core\BaseDbModel{            
    
    const SELECT_FROM = "SELECT u.*, ar.nombre_rol as rol FROM usuario u LEFT JOIN aux_rol ar ON ar.id_rol = u.id_rol";
    
    function getAllUsers() : array{        
        $stmt = $this->pdo->query(self::SELECT_FROM);
        return $stmt->fetchAll();                
    }
    
    function getAllUserOrderBySalar() : array{        
        $stmt = $this->pdo->query(self::SELECT_FROM . " ORDER BY salarioBruto DESC");
        return $stmt->fetchAll();
    }
    
    function getStandardUsers() : array{        
        $stmt = $this->pdo->query(self::SELECT_FROM . " WHERE nombre_rol = 'standard'");
        return $stmt->fetchAll();
    }
    
    function getUsersNameCarlos() : array{        
        $stmt = $this->pdo->query(self::SELECT_FROM . " WHERE username LIKE 'carlos%'");
        return $stmt->fetchAll();
    }
    
}

