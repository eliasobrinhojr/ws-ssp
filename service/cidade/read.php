<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/dbclass.php';
include_once '../../entities/cidade.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$cidade = new Cidade($connection);

$stmt = $cidade->read();

$count = $stmt->rowCount();

if ($count > 0) {

    $cidades = array();
    $cidades["body"] = array();
    $cidades["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);
        

        $obj = array(
            "id" => $cidIdCidade,
            "name" => $cidNome
        );

        array_push($cidades["body"], $obj);
    }

    echo json_encode($cidades);
} else {
    
    echo json_encode(
            array("body" => array(), "count" => 0)
    );
}
?>