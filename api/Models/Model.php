<?php
namespace api\models;

use api\models\Conexao;
use api\traits\PersistDb;

abstract class Model {
    
    use PersistDb;

    protected $conn;

    public function __construct() {
        $this->conn = Conexao::conecta();
    }

    // Lista todos
    public function all() {

        $sql = "SELECT * FROM {$this->table}";

        // "Prepara" o sql para receber valores
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }

    // Busca um em especifico
    public function find($field, $value) {

        $sql = "SELECT * FROM {$this->table} WHERE {$field} = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $value);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function del($field, $value) {

        $sql = "DELETE FROM {$this->table} WHERE $field = ?";

        $stmt_del = $this->conn->prepare($sql);
        $stmt_del->bindValue(1, $value);
        $stmt_del->execute();

        return $stmt_del->rowCount();
    }

    // Apenas para o sistema de Login
    public function find_user($field1, $field2, $user, $pass) {

    $sql = "SELECT * FROM {$this->table} WHERE {$field1} = ? AND {$field2} = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $user);
        $stmt->bindValue(2, $pass);
        $stmt->execute();

        return $stmt->fetch();
    }
}

