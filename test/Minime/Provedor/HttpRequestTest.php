<?php

namespace Minime\Provedor;

class HttpRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function connectLib()
    {
        $url = "http://www.buscacep.correios.com.br/servicos/dnec/consultaLogradouroAction.do";
        $data = [
            'CEP'         => '68900075',
            'Metodo'      => 'listaLogradouro',
            'TipoConsulta'=> 'cep',
            'StartRow'    => '1',
            'EndRow'      => '10'
        ];
        $this->assertNotEmpty(HttpRequest::urlOpen($url, $data)->body);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function exception()
    {
        HttpRequest::urlOpen("", [])->body;
        HttpRequest::urlOpen("?", "[]")->body;
    }

}
