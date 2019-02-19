<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../../config/dbclass.php';
include_once '../../../entities/logradouro.php';
include_once '../../../entities/cidade.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$logradouro = new Logradouro($connection);
$cidade = new Cidade($connection);

$data = json_decode(file_get_contents("php://input"));

$logradouro->logCEP = str_replace(".", "", trim($data->logCEP));
$logradouro->logCEP = str_replace("-", "", $logradouro->logCEP);
$logradouro->logComplemento = $data->logComplemento;
$logradouro->logNome = $data->logNome;

$cidade->cidNome = $data->cidadeNome;
$stmt = $cidade->readByCidadeAndUf($data->uf);
$count = $stmt->rowCount();

if ($count > 0) {
    $id_cidade = null;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_cidade = $row['cidIdCidade'];
    }
    if ($id_cidade != null) {
        $logradouro->cidIdCidade = $id_cidade;

        if ($logradouro->create()) {
            echo '{';
            echo '"message": "Logradouro foi criado."';
            echo '}';
        } else {
            echo '{';
            echo '"message": "Erro ao criar logradouro."';
            echo '}';
        }
    }
} else {
    echo '{';
    echo '"message": "Cidade não encontrada."';
    echo '}';
}
