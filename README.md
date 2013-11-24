## Brasil/Endereco

[![Build Status](https://travis-ci.org/viniciusluiz/redmodel.png?branch=master)](https://travis-ci.org/viniciusluiz/redmodel)
[![Coverage Status](https://coveralls.io/repos/viniciusluiz/brasil-endereco/badge.png)](https://coveralls.io/r/viniciusluiz/brasil-endereco)
[![Latest Stable Version](https://poser.pugx.org/minime/brasil-endereco/v/stable.png)](https://packagist.org/packages/minime/brasil-endereco)
[![Total Downloads](https://poser.pugx.org/minime/brasil-endereco/downloads.png)](https://packagist.org/packages/minime/brasil-endereco)

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

Atualizar manualmente `composer.json` com:

```json
{
  "require": {
    "minime/brasil-endereco": "~0.0"
  }
}
```

Ou simplesmente usar o seu terminal: `composer require minime/brasil-endereco:~0.0` :8ball:

```php
use Minime\Brasil\Endereco\Correios as Correios;
```

## License

Brasil/Endereco é liberado sob a [MIT License](http://www.opensource.org/licenses/MIT).


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/viniciusluiz/brasil-endereco/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

