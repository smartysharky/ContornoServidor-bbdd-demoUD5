<?php

declare(strict_types = 1);

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
    
    function getUsuariosByIdRol(int $idRol) : array{
        $stmt = $this->pdo->prepare(self::SELECT_FROM . " WHERE u.id_rol = :id_rol");
        $stmt->execute(['id_rol' => $idRol]);
        return $stmt->fetchAll();
    }
    
    function getUsuariosByUsername(string $username) : array{
        $stmt = $this->pdo->prepare(self::SELECT_FROM . " WHERE u.username LIKE :username");
        $stmt->execute(['username' => "%$username%"]);
        return $stmt->fetchAll();
    }
    
    function getUsuariosBySalar(?float $min, ?float $max){
        $query = self::SELECT_FROM . " WHERE ";
        $condiciones = [];
        $vars = [];
        if(!is_null($min)){
            $condiciones[] = "salarioBruto >= :min";
            $vars['min'] = $min;
        }
        if(!is_null($max)){
            $condiciones[] = "salarioBruto <= :max";
            $vars['max'] = $max;
        }
        
        $query .= implode(" AND ", $condiciones) . " ORDER BY salarioBruto";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($vars);
        return $stmt->fetchAll();
    }
    
}

