<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/dbclass.php';
include_once '../../entities/empresa.php';
include_once '../../entities/responsavel.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$empresa = new Empresa($connection);
$responsavel = new Responsavel($connection);

$data = json_decode(file_get_contents("php://input"));

$empresa->empidEmpresas = $data->idEmp;
$empresa->empCNPJ = $data->cnpj;
$empresa->empInscMunicipal = $data->inscMunicipal;
$empresa->empRazaoSocial = $data->razaoSocial;
$empresa->empEnderecoNumero = $data->numero;
$empresa->EmpresaAtividade_emaidEmpresaAtividade = $data->id_atividade;
$empresa->empEnderecoComplemento = $data->complemento;
$empresa->Logradouro_logIdLogradouro = $data->logId;

//salvar responsavel

$responsavel->emrNome = $data->respNome;
$responsavel->emrCPF = str_replace(".", "", $data->respCpf);
$responsavel->emrCPF = str_replace("-", "", $responsavel->emrCPF);
$empresa->EmpresaResponsavel_emridEmpresaResponsavel = $responsavel->create();


if ($empresa->create()) {
    echo '{';
    echo '"message": "Empresa foi criada."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Erro ao criar empresa."';
    echo '}';
}
?>