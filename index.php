<?php 

require __DIR__ . '/vendor/autoload.php';

use App\WebService\ViaCep;

/* verifica a existência do CEP no comando do terminal */
if (!isset($argv[1]))
{
    die("CEP não informado!!!\n");
}

/* executa a consulta do CEP */
$dadosCep = ViaCep::consultarCep($argv[1]);

/* imprime o resultado */
print_r($dadosCep);