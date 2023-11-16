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

        $this->assertEquals('8a2a1072b59ffff', $h3->geoToH3(40.689421843699, -74.044431399909, 10, false));
        $this->assertEquals('8a2a1072b59ffff', $h3->geoToH3(40.689421843699, -74.044431399909, 10, true));
    }

    /** @test */
    public function can_convert_h3_index_to_geo()
    {
        $h3 = new H3(H3::DYLIB);
        $geo = $h3->h3ToGeo('8a2a1072b59ffff');

        $this->assertEquals($geo->lat, 40.68942184369929);
        $this->assertEquals($geo->lon, -74.04443139990863);
    }

    /** @test */
    public function can_convert_h3_index_to_geoBoundary()
    {
        $h3 = new H3(H3::DYLIB);
        $boundary = $h3->h3ToGeoBoundary('8a2a1072b59ffff');

        $this->assertEquals($boundary[0]->lat, 40.690058600953584);
        $this->assertEquals($boundary[0]->lon, -74.04415176176158);
    }
}
