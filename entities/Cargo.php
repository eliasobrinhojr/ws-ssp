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
