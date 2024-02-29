<?php

namespace Ozoriotsn\Kangu;

/**
 * Interface KanguInterface
 * @package Ozoriotsn\Kangu
 */
interface KanguInterface
{

    public function simulate(array $data = []);

    public function trackback(string $code);
}
