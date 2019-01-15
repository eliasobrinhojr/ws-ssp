<?php

class Permissao {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "permissoes";
    // table columns
    public $perIdPerfil;
    public $funIdFuncoes;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        $stmt = $this->connection->prepare('INSERT INTO permissoes (perIdPerfil, funIdFuncoes) '
                . 'VALUES(:idPerfil, :idFuncoes)');
        $exec = $stmt->execute(array(
            ':idPerfil' => $this->perIdPerfil,
            ':idFuncoes' => $this->funIdFuncoes
        ));
        return $exec;
    }

    //R
    public function read() {
        return $this->connection->query("select * from permissoes;");
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
