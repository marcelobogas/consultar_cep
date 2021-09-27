<?php

require __DIR__ . '/vendor/autoload.php';

use App\WebService\ViaCep;

/* verifica a existência do CEP no comando do terminal */

/* if (!isset($argv[1])) {
    die("CEP não informado!!!\n");
} */

/* executa a consulta do CEP */
/* $dadosCep = ViaCep::consultarCep($argv[1]); */

/* imprime o resultado */
/* print_r($dadosCep); */

if (isset($_POST['inputBuscarCep'])) {
    $dadosCep = ViaCep::consultarCep($_POST['inputCep']);

    if (!$dadosCep['cep']) {
        $msgError = '<div class="alert alert-danger" role="alert">
                        Cep não encontrado!!!
                    </div>';
    } else {
        $msgSuccess = '<div class="alert alert-primary" role="alert">';
        $msgSuccess .= 'Cep: ' . $dadosCep['cep'] . '<br>';
        $msgSuccess .= 'Logradouro: ' . $dadosCep['logradouro'] . '<br>';
        $msgSuccess .= 'Complemento: ' . $dadosCep['complemento'] . '<br>';
        $msgSuccess .= 'Bairro: ' . $dadosCep['bairro'] . '<br>';
        $msgSuccess .= 'Cidade: ' . $dadosCep['localidade'] . '<br>';
        $msgSuccess .= 'UF: ' . $dadosCep['uf'] . '<br>';
        $msgSuccess .= 'DDD: (' . $dadosCep['ddd'] . ')<br>';
        $msgSuccess .= '</div>';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Consultar Cep - ViaCep</title>
</head>

<body>

    <div class="container">
        <div class="text-center p-5">
            <h1>Consultar CEP</h1>
            <span>Informe um CEP para realizar a consulta na API do ViaCep</span>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-sm-auto">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group">
                        <label for="inputCep">CEP:</label>
                        <input id="inputCep" class="form-control" type="text" name="inputCep">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" id="inputBuscarCep" name="inputBuscarCep" value="Buscar Cep">
                    </div>
                </form>
            </div>
        </div>
        <!-- retorno da consulta -->
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <?php 
                if (isset($dadosCep['cep'])) {
                    echo $msgSuccess;
                }

                /* caso retorne erro na consulta */
                if (isset($msgError)) {
                    echo $msgError;
                } 
                ?>
            </div>
        </div>
    </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>