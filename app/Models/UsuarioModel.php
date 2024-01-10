<?php

namespace Com\Daw2\Models;

use \PDO;

class UsuarioModel extends \Com\Daw2\Core\BaseDbModel{            
    
    function getAllUsers() : array{        
        $stmt = $this->pdo->query("SELECT * FROM usuario u");
        return $stmt->fetchAll();                
    }
    
    function getAllUserOrderBySalar() : array{        
        $stmt = $this->pdo->query("SELECT * FROM usuario u ORDER BY salarioBruto DESC");
        return $stmt->fetchAll();
    }
    
    function getStandardUsers() : array{        
        $stmt = $this->pdo->query("SELECT * FROM usuario u WHERE rol = 'standard'");
        return $stmt->fetchAll();
    }
    
    function getUsersNameCarlos() : array{        
        $stmt = $this->pdo->query("SELECT * FROM usuario u WHERE username LIKE 'carlos%'");
        return $stmt->fetchAll();
    }
    
}

