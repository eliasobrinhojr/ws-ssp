<?php

class Transaction {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "Perfis";
    // table columns
    public $perIdPerfil;
    public $perDescricao;
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
