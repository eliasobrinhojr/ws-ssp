<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../../config/dbclass.php';
include_once '../../../entities/empresa.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$empresa = new Empresa($connection);
$stmt = $empresa->read();

$count = $stmt->rowCount();

if ($count > 0) {

    $empresas = array();
    $empresas["body"] = array();
    $empresas["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $obj = array(
            "id_empresa" => $empidEmpresas
        );

        array_push($empresas["body"], $obj);
    }

    echo json_encode($empresas);
} else {

    echo json_encode(
            array("body" => array(), "count" => 0)
    );
}

?>