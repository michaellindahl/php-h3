<?php

namespace MichaelLindahl\H3\Tests;

use MichaelLindahl\H3\H3;
use PHPUnit\Framework\TestCase;

class IndexInspectionTest extends TestCase
{
    /** @test */
    public function can_get_h3_resolution()
    {
        $h3 = new H3(H3::DYLIB);
        $res = $h3->h3GetResolution('8a2a1072b59ffff');

        $this->assertEquals($res, 10);
    }

    /** @test */
    public function can_check_if_h3_is_valid()
    {
        $h3 = new H3(H3::DYLIB);

        $this->assertTrue($h3->h3IsValid('8a2a1072b59ffff'));
        $this->assertFalse($h3->h3IsValid('8a2a1072b59f0ee'));
    }
}
