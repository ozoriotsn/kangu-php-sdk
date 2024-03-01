<?php
namespace Ozoriotsn\tests\ApiTest;

use Exception;
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
        $accessToken = uniqid();
        $api = new Api($accessToken);
        $this->assertInstanceOf(Client::class, $api->http());
    }

    /**
     * @covers \Ozoriotsn\Kangu\Api
     * @covers \Ozoriotsn\Kangu\Api::http
     */
    public function testApiThrowsException()
    {
        $this->expectException(Exception::class);
        $api = new Api();
        $api->http();
    }

}
