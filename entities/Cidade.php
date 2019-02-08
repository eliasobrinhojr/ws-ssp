<?php

class Cidade {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "cidades";
    // table columns

    public $estIdEstado;
    public $cidCodIBGE;
    public $cidIdCidade;
    public $cidNome;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        return 0;
//        $stmt = $this->connection->prepare('INSERT INTO cargos (carDescricao) '
//                . 'VALUES(:descricao)');
//        $exec = $stmt->execute(array(
//            ':descricao' => $this->carDescricao
//        ));
//        return $exec;
    }

    //R
    public function read() {
        return $this->connection->query("select * from cidades;");
    }

    public function readByCidadeAndUf($uf) {
        return $this->connection->query("select * from $this->table_name cid join estados est on est.estIdEstado = cid.estIdEstado where cid.cidNome = '$this->cidNome' and est.estSigla = '$uf';");
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
