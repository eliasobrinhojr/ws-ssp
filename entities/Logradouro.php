<?php



class Logradouro {

    // Connection instance
    private $connection;
    // table name
    private $table_name = "logradouros";
    // table columns

    public $logIdLogradouro;
    public $logNome;
    public $logCEP;
    public $logComplemento;
    public $cidIdCidade;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        $stmt = $this->connection->prepare("INSERT INTO $this->table_name (logNome, logCEP, logComplemento, cidIdCidade) "
                . "VALUES(:logNome, :logCEP, :logComplemento, :cidIdCidade)");
        $exec = $stmt->execute(array(
            ':logNome' => $this->logNome,
            ':logCEP' => $this->logCEP,
            ':logComplemento' => $this->logComplemento,
            ':cidIdCidade' => $this->cidIdCidade
        ));
        return $exec;
    }

    //R
    public function read() {
        return $this->connection->query("select * from $this->table_name where cidIdCidade = $this->cidIdCidade;");
    }

    public function readByCep() {

        $query = "select 
                    lg.logIdLogradouro as logId, 
                    lg.logNome as logNome, 
                    lg.logCEP as logCep, 
                    c.cidIdCidade as cidadeId, 
                    c.cidNome as cidadeNome, 
                    est.estSigla as estSigla
                    from $this->table_name lg
                    join cidades c on c.cidIdCidade = lg.cidIdCidade
                    join estados est on est.estIdEstado = c.estIdEstado
                    where logCEP = '$this->logCEP';";
        return $this->connection->query($query);
    }

    public function readByCidadeAndCep() {

        $query = "select 
                    lg.logIdLogradouro as logId, 
                    lg.logNome as logNome, 
                    lg.logCEP as logCep, 
                    c.cidIdCidade as cidadeId, 
                    c.cidNome as cidadeNome, 
                    est.estSigla as estSigla
                    from $this->table_name lg
                    join cidades c on c.cidIdCidade = lg.cidIdCidade
                    join estados est on est.estIdEstado = c.estIdEstado
                    where logCEP = '$this->logCEP' and lg.cidIdCidade = $this->cidIdCidade;";

        return $this->connection->query($query);
    }

    //U
    public function update() {
        
    }

    //D
    public function delete() {
        
    }

}
