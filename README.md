## Brasil/Endereco

[![Build Status](https://travis-ci.org/viniciusluiz/redmodel.png?branch=master)](https://travis-ci.org/viniciusluiz/redmodel)
[![Coverage Status](https://coveralls.io/repos/viniciusluiz/brasil-endereco/badge.png)](https://coveralls.io/r/viniciusluiz/brasil-endereco)

Brasil/Endereco é um componente de consulta que facilita a obtenção de endereços a partir do site dos [correios](http://www.buscacep.correios.com.br/). 

## Exemplos

Usando o Brasil/Endereco para consultar endereços:
```php
$correios = new Correios();
$correios->buscaFaixa("Macapa", "AP");
$correios->buscaLogradouros('Jovino Dinoa', 'AP', 'Macapa', 'Rua', 18);
$correios->buscaEndereco('Jovino Dinoá');
$correios->buscaCep('68900075');

```

Retornando em formato json:
```php
$correios = new Correios();
$correios->toJson()->buscaFaixa("Macapa", "AP");
```

## Instalação

```php
use Minime\Brasil\Endereco\Correios as Correios;
```

## License

Minime/Endereco é liberado sob a [MIT License](http://www.opensource.org/licenses/MIT).
