<?php

namespace api\models;

use PDO;

class Conexao {
    public static function conecta() {

        $config = [
            'host' => 'localhost',
            'name' => 'dbagenda',
            'user' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ]; 

        $pdo = new PDO("mysql:host={$config['host']};dbname={$config['name']};charset={$config['charset']}", "{$config['user']}", "{$config['password']}");
        //driver = mysql : host = localhost dbname= nome do banco charset = config de caracter user = root password = ''

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Caso algum erro ocorra será exibido na tela
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // Para poder trabalhar como objeto ao invés de []
        $pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
        return $pdo;
    }
}
    