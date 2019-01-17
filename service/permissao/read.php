<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/dbclass.php';
include_once '../../entities/permissao.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$permissao = new Permissao($connection);
$stmt = $permissao->read();

$count = $stmt->rowCount();

if ($count > 0) {

    $permissoes = array();
    $permissoes["body"] = array();
    $permissoes["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $perm = array(
            "perIdPerfil" => $perIdPerfil,
            "funIdFuncoes" => $funIdFuncoes
        );

        array_push($permissoes["body"], $perm);
    }

    echo json_encode($permissoes);
} else {
    echo json_encode(
            array("body" => array(), "count" => 0)
    );
}
?>