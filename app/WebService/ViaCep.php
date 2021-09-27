<?php

namespace App\WebService;

class ViaCep
{
    /**
     * Método responsável por consultar um CEP no ViaCep
     *
     * @param string $cep
     *
     * @return array
     */
    public static function consultarCep($cep)
    {
        /* inicia o CURL */
        $curl = curl_init();

        /* configurações do CURL */
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://viacep.com.br/ws/' . $cep . '/json/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ]);

        /* response */
        $response = curl_exec($curl);

        /* fecha a conexão aberta */
        curl_close($curl);

        /* converte o response em array */
        $array = json_decode($response, true);

        /* retorna o conteúdo em array */
        return isset($array['cep']) ? $array : null;
    }
}
