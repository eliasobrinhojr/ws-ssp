<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../../config/dbclass.php';
include_once '../../../entities/fornecedor.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$fornecedor = new Fornecedor($connection); 

$data = json_decode(file_get_contents("php://input"));



$fornecedor->forCNPJ_CPF = str_replace(".", "", trim($data->forCNPJ_CPF));
$fornecedor->forCNPJ_CPF = str_replace("-", "", $fornecedor->forCNPJ_CPF);
$fornecedor->forCNPJ_CPF = str_replace("/", "", $fornecedor->forCNPJ_CPF);
$fornecedor->logIdLogradouro = $data->logIdLogradouro;
$fornecedor->forEnderecoComplemento = $data->forEnderecoComplemento;
$fornecedor->forEnderecoNumero = $data->forEnderecoNumero;
$fornecedor->forINSS = $data->forINSS;
$fornecedor->forTipo = $data->forTipo == 'J' ? 1 : 0;


if ($fornecedor->create()) {
    echo '{';
    echo '"message": "Fornecedor foi criado."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Erro ao criar fornecedor."';
    echo '}';
}

// $stmt = $responsavel->readOne();

// $count = $stmt->rowCount();
// if ($count === 0) {
//     $var = $responsavel->create();

//     if ($var === false) {
//         echo '{';
//         echo '"message": "Erro salvar responsável."';
//         echo '}';
//         exit;
//     } else {
//         $empresa->EmpresaResponsavel_emridEmpresaResponsavel = $var;



//         if ($empresa->create()) {
//             echo '{';
//             echo '"message": "Empresa foi criada."';
//             echo '}';
//             exit;
//         } else {
//             echo '{';
//             echo '"message": "Erro ao criar empresa."';
//             echo '}';
//             exit;
//         }
//     }
// } else {
//     $id_resp = null;

//     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         extract($row);
//         $id_resp = $emridEmpresaResponsavel;
//     }

//     if ($id_resp != NULL) {
//         $empresa->EmpresaResponsavel_emridEmpresaResponsavel = $id_resp;
      
//         if ($empresa->create()) {
//             echo '{';
//             echo '"message": "Empresa foi criada."';
//             echo '}';
//         } else {
//             echo '{';
//             echo '"message": "Erro ao criar empresa."';
//             echo '}';
//         }
//     } else {
//         echo '{';
//         echo '"message": "Erro ao consultar responsável."';
//         echo '}';
//     }
// }
