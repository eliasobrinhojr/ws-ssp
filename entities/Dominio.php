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
        $stmt = $this->connection->prepare('INSERT INTO dominios (domDominio, domServidor) '
                . 'VALUES(:dominio, :servidor)');
        $exec = $stmt->execute(array(
            ':dominio' => $this->domDominio,
            ':servidor' => $this->domServidor
        ));
        return $exec;
    }

    //R
    public function read() {
        return $this->connection->query("select * from dominios;");
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
