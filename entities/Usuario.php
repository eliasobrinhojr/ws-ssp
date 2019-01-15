<?php

class Usuario {

    //query
    private $sql = '';
    // Connection instance
    private $connection;
    // table name
    private $table_name = "usuarios";
    // table columns
    public $usuIdUsuario;
    public $usuLogin;
    public $domIdDominio;
    public $usuNome;
    public $usuEmail;
    public $usuCorporativo;
    public $carIdCargo;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        
    }

    //R
    public function read() {
        $this->sql = "select * from usuarios;";
        return $this->connection->query($this->sql);
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
