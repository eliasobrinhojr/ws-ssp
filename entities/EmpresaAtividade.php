<?php

class EmpresaAtividade {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "empresaatividades";
    // table columns
    public $emaidEmpresaAtividade;
    public $emaNome;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
//        $stmt = $this->connection->prepare('INSERT INTO cargos (carDescricao) '
//                . 'VALUES(:descricao)');
//        $exec = $stmt->execute(array(
//            ':descricao' => $this->carDescricao
//        ));
//        return $exec;
        return false;
    }

    //R
    public function read() {
        return $this->connection->query("select * from empresaatividades;");
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
