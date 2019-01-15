<?php

class Modulo {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "modulos";
    // table columns
    public $modIdModulo;
    public $modDescricao;
    public $sisIdSistema;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        $stmt = $this->connection->prepare('INSERT INTO modulos (modDescricao, sisIdSistema) '
                . 'VALUES(:descricao, :idSistema)');
        $exec = $stmt->execute(array(
            ':descricao' => $this->carDescricao,
            ':idSistema' => $this->sisIdSistema
        ));
        return $exec;
    }

    //R
    public function read() {
        return $this->connection->query("select * from modulos;");
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
