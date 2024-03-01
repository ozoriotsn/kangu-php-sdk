<?php
namespace Ozoriotsn\tests\KanguTest;


use Exception;
use Ozoriotsn\Kangu\Api;
use Ozoriotsn\Kangu\Kangu;
use PHPUnit\Framework\TestCase;


class KanguTest extends TestCase
{

    /**
     * @covers \Ozoriotsn\Kangu\Kangu
     * @covers \Ozoriotsn\Kangu\Api
     * @covers \Ozoriotsn\Kangu\Kangu::__construct
     */

    public function testConstructor()
    {
        $token = uniqid();
        $kangu = new Kangu($token);
        $api = new Api($token);
        $this->assertInstanceOf(Kangu::class, $kangu);
        self::assertInstanceOf(Api::class, $api);
    }


    /**
     * @covers \Ozoriotsn\Kangu\Kangu::simulate
     */

    public function testSimulate()
    {

        // Act
        $kangu = $this->createMock(Kangu::class);
        $kangu
            ->expects(self::once())
            ->method('simulate')
            ->with(['foo' => 'bar'])
            ->willReturn(['foo' => 'bar']);
        self::assertIsArray($kangu->simulate(['foo' => 'bar']));
        self::assertInstanceOf(Kangu::class, $kangu);
    }

    /**
     * @covers \Ozoriotsn\Kangu\Kangu::simulate
     */
    public function testSimulateWithException()
    {
        $this->expectException(Exception::class);
        // Act
        $accessToken = uniqid();
        $kangu = new Kangu($accessToken);
        $kangu->simulate([]);
    }

    /**
     * @covers \Ozoriotsn\Kangu\Kangu 
     * @covers \Ozoriotsn\Kangu\Kangu::trackback
     */
    public function testTrackback()
    {
        $trackback = $this->createMock(Kangu::class);
        $trackback
            ->expects(self::once())
            ->method('trackback')
            ->with('123456')
            ->willReturn([]);
        self::assertIsArray($trackback->trackback('123456'));
        self::assertInstanceOf(Kangu::class, $trackback);
    }

    /**
     * @covers \Ozoriotsn\Kangu\Kangu 
     * @covers \Ozoriotsn\Kangu\Kangu::trackback
     */
    public function testTrackbackThrowsException()
    {
        $this->expectException(Exception::class);
        // Act
        $accessToken = uniqid();
        $kangu = new Kangu($accessToken);
        $kangu->trackback([]);
    }

}
