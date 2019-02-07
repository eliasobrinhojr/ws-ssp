<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/dbclass.php';
include_once '../../entities/logradouro.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$log = new Logradouro($connection);


if ($_GET['acao'] == 'byCep') {

    if (isset($_GET['strCep'])) {
        $log->logCEP = str_replace(".", "", trim($_GET['strCep']));
        $log->logCEP = str_replace("-", "", $log->logCEP);
    } else {
        $log->logCEP = 0;
    }

    $stmt = $log->readByCep();
    $count = $stmt->rowCount();
    

    if ($count > 0) {

        $logradouros = array();
        $logradouros["body"] = array();
        $logradouros["count"] = $count;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          
            
            $obj = array(
                "logId" => $row['logId'],
                "logNome" => $row['logNome'],
                "logCep" => $row['logCep'],
                "cidadeId" => $row['cidadeId'],
                "cidadeNome" => $row['cidadeNome'],
                "estSigla" => $row['estSigla']
            );

            array_push($logradouros["body"], $obj);
        }

        echo json_encode($logradouros);
    } else {

        echo json_encode(
                array("body" => array(), "count" => 0)
        );
    }
} else if ($_GET['acao'] == 'byCidade') {

    $log->cidIdCidade = isset($_GET['id_cidade']) ? $_GET['id_cidade'] : 0;
    $stmt = $log->read();

    $count = $stmt->rowCount();

    if ($count > 0) {

        $logradouros = array();
        $logradouros["body"] = array();
        $logradouros["count"] = $count;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            $obj = array(
                "id" => $logIdLogradouro,
                "name" => $logNome . ' - ' . $logCEP
            );

            array_push($logradouros["body"], $obj);
        }

        echo json_encode($logradouros);
    } else {

        echo json_encode(
                array("body" => array(), "count" => 0)
        );
    }
} else if ($_GET['acao'] == 'byAll') {
    
}
?>