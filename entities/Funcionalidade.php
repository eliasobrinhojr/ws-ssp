<?php

class Funcionalidade {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "funcoes";
    // table columns
    public $funIdFuncoes;
    public $funDescricao;
    public $menIdMenu;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        $stmt = $this->connection->prepare('INSERT INTO funcoes (funDescricao, menIdMenu) '
                . 'VALUES(:descricao, :menuId)');
        $exec = $stmt->execute(array(
            ':descricao' => $this->funDescricao,
            ':menuId' => $this->menIdMenu
        ));
        return $exec;
    }

    //R
    public function read() {
        return $this->connection->query("select * from funcoes;");
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
