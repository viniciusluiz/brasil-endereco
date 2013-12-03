<?php

namespace Minime\Brasil\Endereco;

use Minime\Provedor\HttpRequest;
use Minime\Provedor\HttpHelper;

class Correios
{
    private $uri     = "http://www.buscacep.correios.com.br/servicos/dnec/";
    private $to_json = false;

    public function toJson()
    {
        $this->to_json = true;

        return $this;
    }

    private function formatJson($value)
    {
        $response      = $this->to_json ? json_encode($value) : $value;
        $this->to_json = false;

        return $response;
    }

    private function parseFaixa($table)
    {
        array_shift($table);
        $faixa_geral = explode('a', preg_replace('/\s/', '', array_shift($table)[0]));

        array_shift($table);
        $labels = array_shift($table);
        $values = array_shift($table);

        $response = [
            'FaixaGeral' => $faixa_geral,
            $labels[0]   => $values[0],
            $labels[1]   => explode('a', preg_replace('/\s/', '', $values[1]))
        ];

        return $this->formatJson($response);
    }

    private function formatTabela($url, $data)
    {
        $table = HttpHelper::parseTable(
            HttpRequest::urlOpen($url, $data)->body);

        array_shift($table);
        array_pop($table);

        $textual_keys = array_shift($table);
        $response     = HttpHelper::exchangeIndexNumericalByTextual($table, $textual_keys);

        return $this->formatJson($response);
    }

    public function buscaFaixa($localidade, $uf)
    {
        $url  = $this->uri . 'consultaFaixaCepAction.do';
        $data = [
            'UF'           => $uf,
            'Localidade'   => $localidade,
            'cfm'          => '1',
            'Metodo'       => 'listaFaixaCEP',
            'TipoConsulta' => 'faixaCep',
            'StartRow'     => '1',
            'EndRow'       => '10'
        ];

        return $this->parseFaixa(
            HttpHelper::parseTable(
                HttpRequest::urlOpen($url, $data)->body));
    }

    public function buscaLogradouros($logradouro, $uf=null, $localidade=null, $tipo=null, $numero=null)
    {
        $url = $this->uri . 'consultaLogradouroAction.do';
        $data = [
            'Logradouro'   => $logradouro,
            'UF'           => $uf,
            'TIPO'         => $tipo,
            'Localidade'   => $localidade,
            'Numero'       => $numero,
            'cfm'          => '1',
            'Metodo'       => 'listaLogradouro',
            'TipoConsulta' => 'logradouro',
            'StartRow'     => '1',
            'EndRow'       => '10'
        ];

        return $this->formatTabela($url, $data);
    }

    public function buscaEndereco($endereco)
    {
        $url = $this->uri . 'consultaEnderecoAction.do';

        // $tipoCep = [
        //     'LOG' => 'Localidade/Logradouro',
        //     'PRO' => 'CEP Promocional',
        //     'CPC' => 'Caixa Postal Comunitária',
        //     'GRU' => 'Grande Usuário',
        //     'UOP' => 'Unidade Operacional',
        //     'ALL' => 'Todos'
        // ];

        $data = [
            'relaxation'  => $endereco,
            'TipoCep'     => 'ALL',
            'semelhante'  => 'N',
            'Metodo'      => 'listaLogradouro',
            'TipoConsulta'=> 'relaxation',
            'StartRow'    => '1',
            'EndRow'      => '10'
        ];

        return $this->formatTabela($url, $data);
    }

    public function buscaCep($cep)
    {
        $url = $this->uri . 'consultaLogradouroAction.do';
        $data = [
            'CEP'  => $cep,
            'Metodo'      => 'listaLogradouro',
            'TipoConsulta'=> 'cep',
            'StartRow'    => '1',
            'EndRow'      => '10'
        ];

        return $this->formatTabela($url, $data);
    }

}
