<?php

namespace MichaelLindahl\H3\Tests;

use MichaelLindahl\H3\H3;
use PHPUnit\Framework\TestCase;

class IndexingTest extends TestCase
{
    /** @test */
    // public function can_convert_lat_geo_to_h3_index()
    // {
    //     $h3 = new H3(H3::DYLIB);

    //     $this->assertEquals('8a2a1072b59ffff', $h3->latLngToCell(40.689421843699, -74.044431399909, 10, false));
    //     $this->assertEquals('8a2a1072b59ffff', $h3->latLngToCell(40.689421843699, -74.044431399909, 10, true));
    // }

    // /** @test */
    // public function can_convert_h3_index_to_geo()
    // {
    //     $h3 = new H3(H3::DYLIB);
    //     $latLng = $h3->cellToLatLng('8a2a1072b59ffff');

    //     $this->assertEquals($latLng->lat, 40.689421843699);
    //     $this->assertEquals($latLng->lng, -74.044431399909);
    // }

    // /** @test */
    // public function can_convert_h3_index_to_boundary()
    // {
    //     $h3 = new H3(H3::DYLIB);
    //     $boundary = $h3->cellToBoundary('8a2a1072b59ffff');

    //     $this->assertEquals($boundary[0]->lat, 40.69005860095357);
    //     $this->assertEquals($boundary[0]->lng, -74.04415176176158);
    // }
}
