<?php

class Dominio {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "dominios";
    // table columns
    public $domIdDominio;
    public $domDominio;
    public $domServidor;

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
