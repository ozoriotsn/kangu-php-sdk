<?php
namespace Ozoriotsn\tests\ApiTest;

use GuzzleHttp\Client;
use Ozoriotsn\Kangu\Api;
use PHPUnit\Framework\TestCase;


class ApiTest extends TestCase
{

    /**
     * @covers \Ozoriotsn\Kangu\Api
     * @covers \Ozoriotsn\Kangu\Api::__construct
     */

    public function testConstructor($accessToken = null)
    {
        $accessToken = uniqid();
        $api = new Api($accessToken);
        $this->assertSame($accessToken, $api->accessToken);
    }

    /**
     * @covers \Ozoriotsn\Kangu\Api
     * @covers \Ozoriotsn\Kangu\Api::http
     */
    public function testApiReturnsInstanceOfClient()
    {
        $api = new Api('API_KEY');
        $this->assertInstanceOf(Client::class, $api->http());
    }


}
