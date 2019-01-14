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
        
    }

    //R
    public function read() {
        
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
