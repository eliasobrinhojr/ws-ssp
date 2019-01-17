<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/dbclass.php';
include_once '../../entities/usuarioPerfil.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$usuarioPerfil = new UsuarioPerfil($connection);

$data = json_decode(file_get_contents("php://input"));

$usuarioPerfil->usuIdUsuario = $data->id_usuario;
$usuarioPerfil->perIdPerfil = $data->id_perfil;

if ($usuarioPerfil->create()) {
    echo '{';
    echo '"message": "Usuario foi relacionado ao perfil."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Erro ao relacionar usuario ao perfil."';
    echo '}';
}
?>