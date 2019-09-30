<?php

namespace App\DAO\MySql\CarrosGerenciadorDeLojas;

class LojasDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function teste()
    {
        $lojas = $this->pdo
        ->query('SELECT * FROM loja;')
        ->fethAll(\PDO::FETCH_ASSOC);

        echo "<pre>";

        foreach($lojas as $dados){
            var_dump($dados);
        }
        die;
    }
}