<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../../config/dbclass.php';
include_once '../../../entities/fornecedor.php';
include_once '../../../entities/fornecedorFuncionario.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$fornecedor = new Fornecedor($connection);
$fornecedorFuncionario = new FornecedorFuncionario($connection);

$data = json_decode(file_get_contents("php://input"));

$fornecedor->forCNPJ_CPF = str_replace(".", "", trim($data->forCNPJ_CPF));
$fornecedor->forCNPJ_CPF = str_replace("-", "", $fornecedor->forCNPJ_CPF);
$fornecedor->forCNPJ_CPF = str_replace("/", "", $fornecedor->forCNPJ_CPF);
$fornecedor->logIdLogradouro = $data->logIdLogradouro;
$fornecedor->forEnderecoComplemento = $data->forEnderecoComplemento;
$fornecedor->forEnderecoNumero = intval($data->forEnderecoNumero);
$fornecedor->forINSS = $data->forINSS;
$fornecedor->forTipo = $data->forTipo == 'J' ? 1 : 0;
$fornecedor->forNome = $data->forNome;


$id_fornecedor = $fornecedor->create();

$fornecedorFuncionario->empidEmpresas = $data->id_empresa;
$fornecedorFuncionario->ffuCentroCusto = 0;
$fornecedorFuncionario->forIdFornecedor = $id_fornecedor;

if ($fornecedorFuncionario->create()) {
    echo '{';
    echo '"message": "Fornecedor foi criado."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Erro ao criar fornecedor."';
    echo '}';
}
