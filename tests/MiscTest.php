<?php

namespace MichaelLindahl\H3\Tests;

use MichaelLindahl\H3\H3;
use PHPUnit\Framework\TestCase;

class MiscTest extends TestCase
{
    /** @test */
    public function can_convert_radians_to_degrees()
    {
        $h3 = new H3(H3::DYLIB);
        $this->assertEquals($h3->radsToDegs(2331.317541003), rad2deg(2331.317541003));
    }

    /** @test */
    public function can_convert_degress_to_radians()
    {
        $h3 = new H3(H3::DYLIB);
        $this->assertEquals($h3->degsToRads(-74.044444), deg2rad(-74.044444));
    }
}
