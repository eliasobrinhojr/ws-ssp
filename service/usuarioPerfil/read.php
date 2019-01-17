<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/dbclass.php';
include_once '../../entities/usuarioPerfil.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$usuarioPerfil = new UsuarioPerfil($connection);
$stmt = $usuarioPerfil->read();

$count = $stmt->rowCount();

if ($count > 0) {

    $usuarioPerfis = array();
    $usuarioPerfis["body"] = array();
    $usuarioPerfis["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $usuPerfil = array(
            "usuIdUsuario" => $usuIdUsuario,
            "perIdPerfil" => $perIdPerfil
        );

        array_push($usuarioPerfis["body"], $usuPerfil);
    }

    echo json_encode($usuarioPerfis);
} else {
    
    echo json_encode(
            array("body" => array(), "count" => 0)
    );
}
?>