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
         $stmt = $this->connection->prepare("INSERT INTO $this->table_name (forTipo, forCNPJ_CPF, logIdLogradouro, forEnderecoComplemento, forEnderecoNumero, forINSS)". "VALUES(:forTipo, :forCNPJ_CPF, :logIdLogradouro, :forEnderecoComplemento, :forEnderecoNumero, :forINSS, :forNome)");

              try {
            return $stmt->execute(array(
                        ':forTipo' => $this->forTipo,
                        ':forCNPJ_CPF' => $this->forCNPJ_CPF,
                        ':logIdLogradouro' => $this->logIdLogradouro,
                        ':forEnderecoComplemento' => $this->forEnderecoComplemento,
                        ':forEnderecoNumero' => $this->forEnderecoNumero,
                        ':forINSS' => $this->forINSS,
                        ':forNome' => $this->forNome
            ));
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
