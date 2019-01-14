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
