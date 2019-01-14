<?php

class Sistema {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "sistemas";
    // table columns
    public $sisIdSistema;
    public $sisNome;
    public $sisSigla;

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
