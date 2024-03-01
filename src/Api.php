<?php

namespace Ozoriotsn\Kangu;


use Exception;
use GuzzleHttp\Client;


/**
 * Class Api
 * @package Ozoriotsn\Kangu
 */
class Api
{

    public $accessToken;

    /**
     * Constructor for the class.
     *
     * @param string $accessToken description
     */
    public function __construct($accessToken = null)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * A description of the entire PHP function.
     *
     * @throws Exception Token não informado
     */
    public function http()
    {

        try {

            if (is_null($this->accessToken)) {
                throw new Exception("Token não informado");
            }

            $headers = [
                'token' => $this->accessToken,
                'Accept' => '*',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ];
            $options = [
                'verify' => false,
                'debug' => false,
                'connect_timeout' => 30,
                'timeout' => 30,
                'allow_redirects' => false,
                'headers' => $headers
            ];

            return new Client(
                array_merge(
                    $options,
                    array(
                        'base_uri' => 'https://portal.kangu.com.br/tms/transporte/',
                        'headers' => $headers
                    )
                )
            );

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

    }

}