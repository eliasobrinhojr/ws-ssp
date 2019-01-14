<?php

class Permissao {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "permissoes";
    // table columns
    public $perIdPerfil;
    public $funIdFuncoes;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        
    }

    //R
    public function read() {
        
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
