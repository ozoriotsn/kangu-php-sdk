<?php

namespace Ozoriotsn\Kangu;

use Exception;
use Ozoriotsn\Kangu\Api;

/**
 * Class Kangu
 * @package Ozoriotsn\Kangu
 */
class Kangu implements KanguInterface
{
    protected $token;
    protected $api;

    /**
     * Kangu constructor.
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
        $this->api = new Api($this->token);
    }


    /**
     * Simulates shipping costs and delivery times based on provided data.
     * @param array $body The data used for simulating shipping costs and delivery times.
     * @return mixed The simulated shipping costs and delivery times.
     */
    public function simulate(array $body = []): mixed
    {
        try {
            if (count($body) == 0) {
                throw new Exception('Data parameter is required');
            }

            $response = $this->api->http()->request('POST', "simular", ['json' => $body])->getBody()->getContents();
            return $response;

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

    }

    /**
     * Trackback function to retrieve response for a given code.
     * @param $code description of the code parameter
     * @return mixed The response from the API request
     */
    public function trackback($code)
    {

        try {
            if (!$code) {
                throw new Exception('Code parameter is required');
            }

            $response = $this->api->http()->request('GET', "rastrear/{$code}")->getBody()->getContents();
            return $response;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

    }

}