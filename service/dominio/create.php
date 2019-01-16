<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/dbclass.php';
include_once '../../entities/dominio.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$dominio = new Dominio($connection);

$data = json_decode(file_get_contents("php://input"));
//$dominio
//$usuario->usuLogin = $data->login;
//$usuario->domIdDominio = $data->dominio_id;
//$usuario->usuEmail = $data->email;
//$usuario->carIdCargo = $data->cargo_id;
//$usuario->usuNome = $data->nome;
//$usuario->usuCorporativo = $data->corporativo;

if ($dominio->create()) {
    echo '{';
    echo '"message": "Dominio foi criado."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Erro ao criar Dominio."';
    echo '}';
}
?>