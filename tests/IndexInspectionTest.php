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

        $this->assertEquals(10, $h3->getResolution('8a2a1072b59ffff'));

        $this->assertEquals(1, $h3->getResolution('8128fffffffffff'));
        $this->assertEquals(1, $h3->getResolution('81383ffffffffff'));
        
        $this->assertEquals(2, $h3->getResolution('822797fffffffff'));
        $this->assertEquals(2, $h3->getResolution('8228b7fffffffff'));
        $this->assertEquals(2, $h3->getResolution('822687fffffffff'));
        
        $this->assertEquals(3, $h3->getResolution('8328b2fffffffff'));
        $this->assertEquals(3, $h3->getResolution('8312d9fffffffff'));
        $this->assertEquals(3, $h3->getResolution('83268cfffffffff'));
        
        $this->assertEquals(4, $h3->getResolution('842694dffffffff'));
        $this->assertEquals(4, $h3->getResolution('8429987ffffffff'));
        $this->assertEquals(4, $h3->getResolution('84299d7ffffffff'));
        
        $this->assertEquals(5, $h3->getResolution('85298a73fffffff'));
        $this->assertEquals(5, $h3->getResolution('85556cb7fffffff'));
        
        $this->assertEquals(6, $h3->getResolution('86298ac07ffffff'));
        $this->assertEquals(6, $h3->getResolution('86556c14fffffff'));
        
        $this->assertEquals(7, $h3->getResolution('87298ad42ffffff'));
        $this->assertEquals(7, $h3->getResolution('87556ca9cffffff'));
        
        $this->assertEquals(8, $h3->getResolution('88298ad42dfffff'));
        $this->assertEquals(8, $h3->getResolution('88556ca9d5fffff'));
        
        $this->assertEquals(9, $h3->getResolution('89298ad4663ffff'));
        $this->assertEquals(9, $h3->getResolution('89556ca9d17ffff'));
        
        $this->assertEquals(10, $h3->getResolution('8a298ad467b7fff'));
        $this->assertEquals(10, $h3->getResolution('8a556ca9daa7fff'));
        
        $this->assertEquals(11, $h3->getResolution('8b298ad467a4fff'));
        $this->assertEquals(11, $h3->getResolution('8b556ca9daf6fff'));
        
        $this->assertEquals(12, $h3->getResolution('8c298ad467a45ff'));
        $this->assertEquals(12, $h3->getResolution('8c556ca9daf67ff'));
        
        $this->assertEquals(13, $h3->getResolution('8d298ad467a443f'));
        $this->assertEquals(13, $h3->getResolution('8d556ca9daf62bf'));
        
        $this->assertEquals(14, $h3->getResolution('8e298ad467a441f'));
        $this->assertEquals(14, $h3->getResolution('8e556ca9daf62af'));
        
        $this->assertEquals(15, $h3->getResolution('8f298ad467a44ac'));
        $this->assertEquals(15, $h3->getResolution('8f556ca9daf628c'));
    }

    /** @test */
    public function can_validate_cells()
    {
        $h3 = new H3(H3::DYLIB);

        $this->assertTrue($h3->isValidCell('85283473fffffff'));
        $this->assertTrue($h3->isValidCell('821C37FFFFFFFFF'));
        $this->assertTrue($h3->isValidCell('085283473fffffff'));
    }

    /** @test */
    public function can_find_invalid_cells()
    {
        $h3 = new H3(H3::DYLIB);

        $this->assertFalse($h3->isValidCell('ff283473fffffff'));
        $this->assertFalse($h3->isValidCell('85283q73fffffff'));
        $this->assertFalse($h3->isValidCell('85283473fffffff112233'));
        $this->assertFalse($h3->isValidCell('85283473fffffff_lolwut'));
        $this->assertFalse($h3->isValidCell('8a283081f1f1f1f1f1f5505ffff'));
        $this->assertFalse($h3->isValidCell('8a28308_hello_world_5505ffff'));
        $this->assertFalse($h3->isValidCell('lolwut'));
    }
}