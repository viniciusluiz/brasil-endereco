<?php

namespace Minime\Brasil\Endereco;

class CorreiosTest extends \PHPUnit_Framework_TestCase {
    private $correios;

    public function setUp() {
        $this->correios = new Correios();
    }

    public function tearDown() {
        $this->correios = null;        
    }

    /**
     * @test
     */
    public function buscaCorreios() {
        $this->assertCount(3, $this->correios->buscaFaixa("Macapa", "AP"));
        $this->assertCount(5, $this->correios->buscaLogradouros('Jovino Dinoa', 'AP', 'Macapa', 'Rua', 18));
        $this->assertCount(5, $this->correios->buscaEndereco('Jovino Dinoá'));
        $this->assertCount(1, $this->correios->buscaCep('68900075'));
    }

    /**
     * @test
     */
    public function buscaCorreiosJson() {
        $this->correios->toJson()->buscaFaixa("Macapa", "AP");
        $this->assertEmpty(json_last_error());

        $this->correios->toJson()->buscaLogradouros('Jovino Dinoa', 'AP', 'Macapa', 'Rua', 18);
        $this->assertEmpty(json_last_error());

        $this->correios->toJson()->buscaEndereco('Jovino Dinoá');
        $this->assertEmpty(json_last_error());

        $this->correios->toJson()->buscaCep('68900075');
        $this->assertEmpty(json_last_error());
    }
}
