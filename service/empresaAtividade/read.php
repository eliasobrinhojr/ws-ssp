<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/dbclass.php';
include_once '../../entities/empresaAtividade.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$empAtividade = new EmpresaAtividade($connection);
$stmt = $empAtividade->read();

$count = $stmt->rowCount();

if ($count > 0) {

    $empAtividades = array();
    $empAtividades["body"] = array();
    $empAtividades["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $empAtividade = array(
            "emaidEmpresaAtividade" => $emaidEmpresaAtividade,
            "emaNome" => $emaNome
        );

        array_push($empAtividades["body"], $empAtividade);
    }

    echo json_encode($empAtividades);
} else {
    
    echo json_encode(
            array("body" => array(), "count" => 0)
    );
}
?>