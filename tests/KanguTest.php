<?php
namespace Ozoriotsn\tests\KanguTest;

use Ozoriotsn\Kangu\Kangu;
use PHPUnit\Framework\TestCase;


class KanguTest extends TestCase
{


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
