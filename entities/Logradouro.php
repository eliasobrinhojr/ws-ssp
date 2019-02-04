<?php

ini_set('memory_limit', '-1');

class Logradouro {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "logradouros";
    // table columns

    public $logIdLogradouro;
    public $logNome;
    public $logCEP;
    public $logComplemento;
    public $cidIdCidade;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        return 0;
//        $stmt = $this->connection->prepare('INSERT INTO cargos (carDescricao) '
//                . 'VALUES(:descricao)');
//        $exec = $stmt->execute(array(
//            ':descricao' => $this->carDescricao
//        ));
//        return $exec;
    }

    //R
    public function read() {
        return $this->connection->query("select * from $this->table_name where cidIdCidade = $this->cidIdCidade;");
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
