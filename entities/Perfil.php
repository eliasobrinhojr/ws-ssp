<?php

class Perfil {

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
        $stmt = $this->connection->prepare('INSERT INTO perfis (perDescricao, sisIdSistema) '
                . 'VALUES(:descricao, :idSistema)');
        $exec = $stmt->execute(array(
            ':descricao' => $this->perDescricao,
            ':idSistema' => $this->sisIdSistema
        ));
        return $exec;
    }

    //R
    public function read() {
        return $this->connection->query("select * from perfis;");
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
