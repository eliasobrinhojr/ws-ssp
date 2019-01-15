<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/dbclass.php';
include_once '../../entities/sistema.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$sistema = new Sistema($connection);

$stmt = $sistema->read();


$count = $stmt->rowCount();

if ($count > 0) {

    $sistemas = array();
    $sistemas["body"] = array();
    $sistemas["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $sistema = array(
            "sisIdSistema" => $sisIdSistema,
            "sisNome" => $sisNome,
            "sisSigla" => $sisSigla
        );

        array_push($sistemas["body"], $sistema);
    }

    echo json_encode($sistemas);
} else {

    echo json_encode(
            array("body" => array(), "count" => 0)
    );
}
?>