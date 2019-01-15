<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/dbclass.php';
include_once '../../entities/sistema.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$sistema = new Sistema($connection);

$data = json_decode(file_get_contents("php://input"));

$sistema->sisNome = $data->nome;
$sistema->sisSigla = $data->sigla;

if ($sistema->create()) {
    echo '{';
    echo '"message": "Sistema foi criado."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Erro ao criar sistema."';
    echo '}';
}
?>