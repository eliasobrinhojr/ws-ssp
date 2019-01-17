<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/dbclass.php';
include_once '../../entities/funcionalidade.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$funcionalidade = new Funcionalidade($connection);

$data = json_decode(file_get_contents("php://input"));

$funcionalidade->funDescricao = $data->descricao;
$funcionalidade->menIdMenu = $data->id_menu;


if ($funcionalidade->create()) {
    echo '{';
    echo '"message": "Funcionalidade foi criado."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Erro ao criar Funcionalidade."';
    echo '}';
}
?>