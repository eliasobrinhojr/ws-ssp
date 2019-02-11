<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../../config/dbclass.php';
include_once '../../../entities/cargo.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$cargo = new Cargo($connection);

$data = json_decode(file_get_contents("php://input"));

$cargo->carDescricao = $data->descricao;

if ($cargo->create()) {
    echo '{';
    echo '"message": "Cargo foi criado."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Erro ao criar cargo."';
    echo '}';
}
?>