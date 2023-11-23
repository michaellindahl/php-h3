<?php

namespace MichaelLindahl\H3\Tests;

use MichaelLindahl\H3\H3;
use PHPUnit\Framework\TestCase;

class IndexingTest extends TestCase
{
    /** @test */
    public function can_convert_lat_geo_to_h3_index()
    {
        $h3 = new H3();

        $this->assertEquals('8a2a1072b59ffff', $h3->latLngToCell(40.689421843699, -74.044431399909, 10, false));
    }

    /** @test */
    public function can_convert_h3_index_to_geo()
    {
        $h3 = new H3();
        $latLng = $h3->cellToLatLng('8a2a1072b59ffff');

        $this->assertEquals(40.68942184369931, $latLng->lat);
        $this->assertEquals(-74.04443139990863, $latLng->lng);
    }

    /** @test */
    public function can_convert_h3_index_to_boundary()
    {
        $h3 = new H3();
        $boundary = $h3->cellToBoundary('8a2a1072b59ffff');

        $this->assertEquals(40.69005860095359, $boundary[0]->lat);
        $this->assertEquals(-74.0441517617616, $boundary[0]->lng);
    }

    /** @test */
    public function can_convert_h3_index_to_geo_and_back()
    {
        $highestResolutionH3 = "8f2a1072b598080";

        $h3 = new H3();
        $latLng = $h3->cellToLatLng($highestResolutionH3);

        $h3String = $h3->latLngToCell(
            $latLng->lat, 
            $latLng->lng, 
            15, 
            false
        );

        $this->assertEquals($highestResolutionH3, $h3String);
    }
}