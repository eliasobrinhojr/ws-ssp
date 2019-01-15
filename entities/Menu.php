<?php

class Menu {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "menus";
    // table columns
    public $menIdMenu;
    public $menDescricao;
    public $modIdModulo;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        $stmt = $this->connection->prepare('INSERT INTO menus (menDescricao, modIdModulo) '
                . 'VALUES(:descricao, :idModulo)');
        $exec = $stmt->execute(array(
            ':descricao' => $this->menDescricao,
            ':idModulo' => $this->modIdModulo
        ));
        return $exec;
    }

    //R
    public function read() {
        return $this->connection->query("select * from menus;");
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
