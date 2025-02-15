<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../../config/dbclass.php';
include_once '../../../entities/usuario.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$usuario = new Usuario($connection);

$data = json_decode(file_get_contents("php://input"));

$usuario->usuLogin = $data->login;
$usuario->domIdDominio = $data->dominio_id;
$usuario->usuEmail = $data->email;
$usuario->carIdCargo = $data->cargo_id;
$usuario->usuNome = $data->nome;
$usuario->usuCorporativo = $data->corporativo;

if ($usuario->create()) {
    echo '{';
    echo '"message": "Usuario foi criado."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Erro ao criar usuario."';
    echo '}';
}
?>