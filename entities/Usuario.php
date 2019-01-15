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

        $stmt = $this->connection->prepare('INSERT INTO usuarios (usuLogin, domIdDominio, usuNome, usuEmail, usuCorporativo, carIdCargo) '
                . 'VALUES(:login, :dominio_id, :nome, :email, :corporativo, :cargo)');
        $exec = $stmt->execute(array(
            ':login' => $this->usuLogin,
            ':dominio_id' => $this->domIdDominio,
            ':nome' => $this->usuNome,
            ':email' => $this->usuEmail,
            ':corporativo' => $this->usuCorporativo,
            ':cargo' => $this->carIdCargo
        ));

        return $exec;
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
