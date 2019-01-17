<?php

class UsuarioPerfil {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "usuarios_perfil";
    // table columns
    public $usuIdUsuario;
    public $perIdPerfil;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        $stmt = $this->connection->prepare('INSERT INTO usuarios_perfil (usuIdUsuario, perIdPerfil) '
                . 'VALUES(:id_usuario, :id_usuario)');
        $exec = $stmt->execute(array(
            ':id_usuario' => $this->usuIdUsuario,
            ':id_usuario' => $this->perIdPerfil
        ));

        return $exec;
    }

    //R
    public function read() {
        return $this->connection->query("select * from usuarios_perfil;");
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
