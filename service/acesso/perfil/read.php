<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../../config/dbclass.php';
include_once '../../../entities/perfil.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$perfil = new Perfil($connection);
$stmt = $perfil->read();

$count = $stmt->rowCount();

if ($count > 0) {

    $perfis = array();
    $perfis["body"] = array();
    $perfis["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $perf = array(
            "perIdPerfil" => $perIdPerfil,
            "perDescricao" => $perDescricao,
            "sisIdSistema" => $sisIdSistema
        );

        array_push($perfis["body"], $perf);
    }

    echo json_encode($perfis);
} else {

    echo json_encode(
            array("body" => array(), "count" => 0)
    );
}
?>