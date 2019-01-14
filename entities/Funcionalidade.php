<?php

class Funcionalidade {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "funcoes";
    // table columns
    public $funIdFuncoes;
    public $funDescricao;
    public $menIdMenu;

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
