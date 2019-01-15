<?php

class Cargo {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "cargos";
    // table columns
    public $carIdCargo;
    public $carDescricao;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        $stmt = $this->connection->prepare('INSERT INTO cargos (carDescricao) '
                . 'VALUES(:descricao)');
        $exec = $stmt->execute(array(
            ':descricao' => $this->carDescricao
        ));
        return $exec;
    }

    //R
    public function read() {
        return $this->connection->query("select * from cargos;");
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
