<?php

class Responsavel {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "empresaresponsavel";
    // table columns
    public $emrNome;
    public $emrCPF;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        $stmt = $this->connection->prepare('INSERT INTO empresaresponsavel (emrNome, emrCPF) '
                . 'VALUES(:nome, :cpf)');
        $exec = $stmt->execute(array(
            ':nome' => $this->emrNome,
            ':cpf'=> $this->emrCPF
        ));

        return $this->connection->lastInsertId();
    }

    //R
    public function read() {
        return $this->connection->query("select * from $this->table_name;");
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
