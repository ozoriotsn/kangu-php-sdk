<?php
namespace Ozoriotsn\tests\KanguTest;

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
     * @covers \Ozoriotsn\Kangu\Kangu 
     * @covers \Ozoriotsn\Kangu\Kangu::simulate
     */

    public function testSimulate()
    {
        $service = $this->createMock(Kangu::class);
        $service
            ->expects(self::once())
            ->method('simulate')
            ->with([])
            ->willReturn(true);

        self::assertTrue($service->simulate([]));
    }

    /**
     * @covers \Ozoriotsn\Kangu\Kangu 
     * @covers \Ozoriotsn\Kangu\Kangu::trackback
     */
    public function testTrackback()
    {

        $service = $this->createMock(Kangu::class);
        $service
            ->expects(self::once())
            ->method('trackback')
            ->with('123456')
            ->willReturn(true);

        self::assertTrue($service->trackback('123456'));

    }

}
