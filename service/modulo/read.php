<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/dbclass.php';
include_once '../../entities/modulo.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$modulo = new Modulo($connection);
$stmt = $modulo->read();

$count = $stmt->rowCount();

if ($count > 0) {

    $modulos = array();
    $modulos["body"] = array();
    $modulos["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $modulo = array(
            "modIdModulo" => $modIdModulo,
            "modDescricao" => $modDescricao,
            "sisIdSistema" => $sisIdSistema
        );

        array_push($modulos["body"], $modulo);
    }

    echo json_encode($modulos);
} else {
    
    echo json_encode(
            array("body" => array(), "count" => 0)
    );
}
?>