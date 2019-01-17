<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/dbclass.php';
include_once '../../entities/funcionalidade.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$funcionalidade = new Funcionalidade($connection);
$stmt = $funcionalidade->read();

$count = $stmt->rowCount();

if ($count > 0) {

    $funcionalidades = array();
    $funcionalidades["body"] = array();
    $funcionalidades["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $funcao = array(
            "funIdFuncoes" => $funIdFuncoes,
            "funDescricao" => $funDescricao,
            "menIdMenu" => $menIdMenu
        );

        array_push($funcionalidades["body"], $funcao);
    }

    echo json_encode($funcionalidades);
} else {
    
    echo json_encode(
            array("body" => array(), "count" => 0)
    );
}
?>