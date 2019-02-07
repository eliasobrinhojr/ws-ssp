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

$empresa->empidEmpresas = trim($data->idEmp); 
$empresa->empCNPJ = str_replace(".", "", trim($data->cnpj));
$empresa->empCNPJ = str_replace("-", "", $empresa->empCNPJ);
$empresa->empCNPJ = str_replace("/", "", $empresa->empCNPJ);
$empresa->empCNPJ = trim($empresa->empCNPJ);

$empresa->empInscMunicipal = trim($data->inscMunicipal);
$empresa->empRazaoSocial = trim($data->razaoSocial);
$empresa->empEnderecoNumero = trim($data->numero);
$empresa->EmpresaAtividade_emaidEmpresaAtividade = trim($data->id_atividade);
$empresa->empEnderecoComplemento = trim($data->complemento);
$empresa->Logradouro_logIdLogradouro = trim($data->logId);

//salvar responsavel
$responsavel->emrNome = trim($data->respNome);
$responsavel->emrCPF = str_replace(".", "", $data->respCpf);
$responsavel->emrCPF = str_replace("-", "", $responsavel->emrCPF);
$responsavel->emrCPF = trim($responsavel->emrCPF);

$stmt = $responsavel->readOne();

$count = $stmt->rowCount();
if ($count === 0) {
    $var = $responsavel->create();

    if ($var === false) {
        echo '{';
        echo '"message": "Erro salvar responsável."';
        echo '}';
        exit;
    } else {
        $empresa->EmpresaResponsavel_emridEmpresaResponsavel = $var;

        if ($empresa->create()) {
            echo '{';
            echo '"message": "Empresa foi criada."';
            echo '}';
            exit;
        } else {
            echo '{';
            echo '"message": "Erro ao criar empresa."';
            echo '}';
            exit;
        }
    }
} else {
    $id_resp = null;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $id_resp = $emridEmpresaResponsavel;
    }

    if ($id_resp != NULL) {
        $empresa->EmpresaResponsavel_emridEmpresaResponsavel = $id_resp;
        if ($empresa->create()) {
            echo '{';
            echo '"message": "Empresa foi criada."';
            echo '}';
        } else {
            echo '{';
            echo '"message": "Erro ao criar empresa."';
            echo '}';
        }
    } else {
        echo '{';
        echo '"message": "Erro ao consultar responsável."';
        echo '}';
    }
}
