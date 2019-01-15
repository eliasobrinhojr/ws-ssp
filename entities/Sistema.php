<?php

class Sistema {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "sistemas";
    // table columns
    public $sisIdSistema;
    public $sisNome;
    public $sisSigla;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        $stmt = $this->connection->prepare('INSERT INTO sistemas (sisNome, sisSigla) '
                . 'VALUES(:nome, :sigla)');
        $exec = $stmt->execute(array(
            ':nome' => $this->sisNome,
            ':sigla' => $this->sisSigla
        ));
        return $exec;
    }

    //R
    public function read() {
        $this->sql = "select * from sistemas;";
        return $this->connection->query($this->sql);
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
