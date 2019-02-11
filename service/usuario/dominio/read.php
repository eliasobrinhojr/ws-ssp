<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../../config/dbclass.php';
include_once '../../../entities/dominio.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$dominio = new Dominio($connection);
$stmt = $dominio->read();

$count = $stmt->rowCount();

if ($count > 0) {

    $dominios = array();
    $dominios["body"] = array();
    $dominios["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $dominio = array(
            "domIdDominio" => $domIdDominio,
            "domDominio" => $domDominio,
            "domServidor" => $domServidor
        );

        array_push($dominios["body"], $dominio);
    }

    echo json_encode($dominios);
} else {
    
    echo json_encode(
            array("body" => array(), "count" => 0)
    );
}
?>