

![Logo](https://www.kangu.com.br/wp-content/uploads/2021/07/logo-completo-kangu-1653x615-1.png)



# Kangu PHP SDK

Free webservice for shipping quotation kangu

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)


## Installation

Composer install

``` bash
composer require ozoriotsn/kangu-php-sdk
```

## Usage

``` php

<?php
    require __DIR__ . '/vendor/autoload.php';
    
    use Ozoriotsn\Kangu\Kangu;

    $kangu = new Kangu('API_KEY');
```

## Simulate delivery cost

``` php

<?php

    $data = [
        "cepOrigem" => "90035-076",
        "cepDestino" => "94415-730",
        "vlrMerc" => 5, // float
        "pesoMerc" => 1, // float
        "produtos" => [
            [
                "peso" => 1,//kg
                "altura" => 2,//cm
                "largura" => 11,//cm
                "comprimento" => 30,//cm
                "valor" => 5,
                "quantidade" => 1
            ]
        ],
        "servicos" => [
            "E",// Entrega normal
            "X",// Entrega expressa
            "M",// Mini Envios
            "R" // Retirada
        ],
        "ordernar" => "preco" // ‘preco’ ou ‘prazo’
    ];

    $simulate = $kangu->simulate($data)->toJson();

    echo ($simulate);

    /********************
     * Return quatation
     ********************

    [
    {
        "vlrFrete": 10.88,
        "prazoEnt": 2,
        "prazoEntMin": 2,
        "dtPrevEnt": "2024-02-29 14:28:28",
        "dtPrevEntMin": "2024-02-29 14:28:28",
        "tarifas": [
            {
                "valor": 10.88,
                "descricao": "Frete Peso + Seguro"
            }
        ],
        "error": {
            "codigo": "",
            "mensagem": ""
        },
        "idSimulacao": 1037357473,
        "idTransp": 9900,
        "cnpjTransp": "99999999000000",
        "idTranspResp": 9900,
        "cnpjTranspResp": "99999999000000",
        "alertas": [],
        "nf_obrig": "N",
        "url_logo": "https://portal.kangu.com.br/ged/documento/download/file/3962/Logo_Correios.png",
        "transp_nome": "Correios Sedex",
        "descricao": "Correios Sedex via Kangu",
        "servico": "X",
        "referencia": "kangu_X_99999999000000_1037357473"
    }
]
    */
```


## Track Back


``` php

<?php
    $trackback = $kangu->trackback('CODE');
    echo ($trackback);


/***********************
 * Return track back
 ***********************/
/*
{
    "situacao": {
        "ocorrencia": "Entregue",
        "data": "2019-11-22",
        "dataHora": "2019-11-22 16:55:00",
        "observacao": "Mercadoria de PET SHOP NOVO MUNDO foi entregue.",
        "recebedor": "PET SHOP NOVO MUNDO",
        "acao": "E",
        "produto": "POSTAGEM"
    },
    "historico": [
        {
            "ocorrencia": "Entregue",
            "data": "2019-11-22",
            "dataHora": "2019-11-22 16:55:00",
            "observacao": "Mercadoria de PET SHOP NOVO MUNDO foi entregue.",
            "recebedor": "PET SHOP NOVO MUNDO",
            "acao": "E",
            "produto": "POSTAGEM"
        },
        {
            "ocorrencia": "Postado",
            "data": "2019-11-21",
            "dataHora": "2019-11-21 17:25:00",
            "observacao": "Mercadoria recebida por PET SHOP NOVO MUNDO.",
            "recebedor": "PET SHOP NOVO MUNDO",
            "acao": "C",
            "produto": "POSTAGEM"
        }
    ],
    "error": {
        "codigo": "",
        "mensagem": ""
    },
    "dtPrevEnt": "22\/11\/2019 16:55:00"
}
*/

```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
 ./vendor/bin/phpunit/ tests
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


## Credits

- [Ozorio Neto][link-author]
- [All Contributors][link-contributors]


[ico-version]: https://img.shields.io/badge/packegist-v2.0.0-blue
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[link-packagist]: https://packagist.org/packages/ozoriotsn/kangu-php-sdk
[link-downloads]: https://packagist.org/packages/ozoriotsn/kangu-php-sdk
[link-author]: https://github.com/ozoriotsn
[link-contributors]: ../../contributors