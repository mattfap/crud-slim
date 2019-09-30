<?php

namespace App\DAO\MySql\CarrosGerenciadorDeLojas;

abstract class Conexao
{
    /**
     * @var \PDO
     */
    protected $pdo;

    public function __construct(){
        $host = getenv('CARROS_MYSQL_HOST');
        $port = getenv('CARROS_MYSQL_PORT');
        $user = getenv('CARROS_MYSQL_USER');
        $pass = getenv('CARROS_MYSQL_PASSWORD');
        $dbname = getenv('CARROS_MYSQL_DBNAME');

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}