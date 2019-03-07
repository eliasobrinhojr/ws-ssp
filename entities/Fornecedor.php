<?php

class Fornecedor {

// Connection instance
    private $connection;
// table name
    private $table_name = "fornecedor";
// table columns
    public $forTipo;
    public $forCNPJ_CPF;
    public $logIdLogradouro;
    public $forEnderecoComplemento;
    public $forEnderecoNumero;
    public $forIdFornecedor;
    public $forINSS;
    public $forNome;

    public function __construct($connection) {
        $this->connection = $connection;
    }

//C
    public function create() {
        $stmt = $this->connection->prepare("INSERT INTO $this->table_name (forTipo, forCNPJ_CPF, logIdLogradouro, forEnderecoComplemento, forEnderecoNumero, forINSS, forNome) VALUES(:forTipo, :forCNPJ_CPF, :logIdLogradouro, :forEnderecoComplemento, :forEnderecoNumero, :forINSS, :forNome)");

        try {
            $exec = $stmt->execute(array(
                ':forTipo' => intval($this->forTipo),
                ':forCNPJ_CPF' => $this->forCNPJ_CPF,
                ':logIdLogradouro' => intval($this->logIdLogradouro),
                ':forEnderecoComplemento' => $this->forEnderecoComplemento,
                ':forEnderecoNumero' => intval($this->forEnderecoNumero),
                ':forINSS' => $this->forINSS,
                ':forNome' => $this->forNome));

            return $exec ? $this->connection->lastInsertId() : $exec;
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
