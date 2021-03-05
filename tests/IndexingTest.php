<?php

namespace MichaelLindahl\H3\Tests;

use MichaelLindahl\H3\H3;
use PHPUnit\Framework\TestCase;

class IndexingTest extends TestCase
{
    /** @test */
    public function can_convert_lat_geo_to_h3_index()
    {
        $h3 = new H3(H3::DYLIB);
        $h3Index = $h3->geoToH3(40.689421843699, -74.044431399909, 10);

        $this->assertEquals($h3Index, '8a2a1072b59ffff');
    }

    /** @test */
    public function can_convert_h3_index_to_geo()
    {
        $h3 = new H3(H3::DYLIB);
        $geo = $h3->h3ToGeo('8a2a1072b59ffff');

        $this->assertEquals($geo->lat, 40.689421843699);
        $this->assertEquals($geo->lon, -74.044431399909);
    }
}
