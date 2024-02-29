<?php
namespace Ozoriotsn\tests\ApiTest;

use GuzzleHttp\Client;
use Ozoriotsn\Kangu\Api;
use PHPUnit\Framework\TestCase;


class ApiTest extends TestCase
{

    public function testApiReturnsInstanceOfClient()
    {
        $api = new Api('API_KEY');
        $this->assertInstanceOf(Client::class, $api->http());
    }


}
