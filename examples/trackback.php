<?php
require __DIR__ . '/../vendor/autoload.php';
header('Content-Type: application/json; charset=utf-8');

use Ozoriotsn\Kangu\Kangu;

try {

    $key = file_get_contents('key.txt');
    $kangu = new Kangu($key);

    $track = $kangu->trackback('123456');
    echo ($track);

} catch (Exception $e) {
    return 'Error: ' . $e->getMessage();
}