<?php

class Empresa {

// Connection instance
    private $connection;
// table name
    private $table_name = "empresas";
// table columns
    public $empidEmpresas;
    public $empCNPJ;
    public $empInscMunicipal;
    public $empRazaoSocial;
    public $empEnderecoNumero;
    public $EmpresaAtividade_emaidEmpresaAtividade;
    public $EmpresaResponsavel_emridEmpresaResponsavel;
    public $Logradouro_logIdLogradouro;
    public $empEnderecoComplemento;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

//C
    public function create() {

        $stmt = $this->connection->prepare('INSERT INTO ' . $this->table_name . '(empidEmpresas,'
                . 'empCNPJ,'
                . 'empInscMunicipal,'
                . 'empRazaoSocial,'
                . 'empEnderecoNumero,'
                . 'EmpresaAtividade_emaidEmpresaAtividade,'
                . 'EmpresaResponsavel_emridEmpresaResponsavel,'
                . 'Logradouro_logIdLogradouro,'
                . 'empEnderecoComplemento) '
                . 'VALUES(:idEmpresa,'
                . ':cnpj, '
                . ':inscricaoMunicipal, '
                . ':razaoSocial, '
                . ':numero, '
                . ':id_atividade, '
                . ':idResponsavel, '
                . ':idLogradouro, '
                . ':complemento);');

        try {
            return $stmt->execute(array(
                        ':idEmpresa' => $this->empidEmpresas,
                        ':cnpj' => $this->empCNPJ,
                        ':inscricaoMunicipal' => $this->empInscMunicipal,
                        ':razaoSocial' => $this->empRazaoSocial,
                        ':numero' => $this->empEnderecoNumero,
                        ':id_atividade' => $this->EmpresaAtividade_emaidEmpresaAtividade,
                        ':idResponsavel' => $this->EmpresaResponsavel_emridEmpresaResponsavel,
                        ':idLogradouro' => $this->Logradouro_logIdLogradouro,
                        ':complemento' => $this->empEnderecoComplemento
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
