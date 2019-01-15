<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/dbclass.php';
include_once '../../entities/cargo.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$cargo = new Cargo($connection);
$stmt = $cargo->read();

$count = $stmt->rowCount();

if ($count > 0) {

    $cargos = array();
    $cargos["body"] = array();
    $cargos["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $cargo = array(
            "carIdCargo" => $carIdCargo,
            "carDescricao" => $carDescricao
        );

        array_push($cargos["body"], $cargo);
    }

    echo json_encode($cargos);
} else {
    
    echo json_encode(
            array("body" => array(), "count" => 0)
    );
}
?>