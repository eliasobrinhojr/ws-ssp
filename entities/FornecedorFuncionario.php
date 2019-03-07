<?php

class FornecedorFuncionario {

// Connection instance
    private $connection;
// table name
    private $table_name = "fornecedorfuncionario";
// table columns
    public $ffuIdFuncionario;
    public $forIdFornecedor;
    public $ffuCentroCusto;
    public $empidEmpresas;

    public function __construct($connection) {
        $this->connection = $connection;
    }

//C
    public function create() {
        $stmt = $this->connection->prepare("INSERT INTO $this->table_name (forIdFornecedor, ffuCentroCusto, empidEmpresas)" . "VALUES(:forIdFornecedor, :ffuCentroCusto, :empidEmpresas)");

        try {
            $exec = $stmt->execute(array(
                ':forIdFornecedor' => $this->forIdFornecedor,
                ':ffuCentroCusto' => $this->ffuCentroCusto,
                ':empidEmpresas' => $this->empidEmpresas));

            return $exec;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
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
