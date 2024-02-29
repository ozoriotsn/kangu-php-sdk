<?php
require __DIR__ . '/../vendor/autoload.php';
header('Content-Type: application/json; charset=utf-8');

use Ozoriotsn\Kangu\Kangu;

try {

    $key = file_get_contents('key.txt');
    $kangu = new Kangu($key);

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
            "R" // retirada
        ],
        "ordernar" => "preco" // ‘preco’ ou ‘prazo’
    ];

    $response = $kangu->simulate($data);

    echo ($response);

} catch (Exception $e) {
    return 'Error: ' . $e->getMessage();
}