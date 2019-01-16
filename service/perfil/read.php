<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/dbclass.php';
include_once '../../entities/perfil.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$usuario = new Usuario($connection);
$stmt = $usuario->read();

$count = $stmt->rowCount();

if ($count > 0) {

    $usuarios = array();
    $usuarios["body"] = array();
    $usuarios["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $usuario = array(
            "usuIdUsuario" => $usuIdUsuario,
            "usuLogin" => $usuLogin,
            "domIdDominio" => $domIdDominio,
            "usuNome" => $usuNome,
            "usuEmail" => $usuEmail,
            "usuCorporativo" => $usuCorporativo,
            "carIdCargo" => $carIdCargo
        );

        array_push($usuarios["body"], $usuario);
    }

    echo json_encode($usuarios);
} else {
    
    echo json_encode(
            array("body" => array(), "count" => 0)
    );
}
?>