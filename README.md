## Brasil/Endereco

[![Build Status](https://travis-ci.org/viniciusluiz/redmodel.png?branch=master)](https://travis-ci.org/viniciusluiz/redmodel)
[![Coverage Status](https://coveralls.io/repos/viniciusluiz/brasil-endereco/badge.png)](https://coveralls.io/r/viniciusluiz/brasil-endereco)

Brasil/Endereco é um componente de consulta que facilita a obtenção de endereços a partir do site dos [correios](http://www.buscacep.correios.com.br/). 

## Exemplos

Usando o Brasil/Endereco para consultar endereços:
```php
$correios = new Minime\Brasil\Endereco\Correios();
$correios->buscaFaixa("Macapa", "AP");
$correios->buscaLogradouros('Jovino Dinoa', 'AP', 'Macapa', 'Rua', 18);
$correios->buscaEndereco('Jovino Dinoá');
$correios->buscaCep('68900075');

```

Retornando em formato json:
```php
$correios = new Minime\Brasil\Endereco\Correios();
$correios->toJson()->buscaFaixa("Macapa", "AP");
```

## Instalação

Adicione a seguinte dependência no `composer.json` do seu projeto:
```json
{
  "require": {
    "minime/brasil-endereco": "~0.0"
  }
}
```
O terminal é seu amigo: `composer require minime/brasil-endereco:~0.0` :8ball:

## License

Minime/Endereco é liberado sob a [MIT License](http://www.opensource.org/licenses/MIT).
