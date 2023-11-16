<?php

namespace MichaelLindahl\H3\Tests;

use MichaelLindahl\H3\H3;
use PHPUnit\Framework\TestCase;

class HierarchicalGridTest extends TestCase
{
    /** @test */
    public function can_convert_h3_index_to_parent()
    {
        $h3 = new H3(H3::DYLIB);
        $h3Index = $h3->h3ToParent('8a2a1072b59ffff', 5);

        $this->assertEquals($h3Index, '852a1073fffffff');
        $this->assertEquals('852a1073fffffff', $h3->h3ToParent('8a2a1072b59ffff', 5));
        $this->assertEquals('842a107ffffffff', $h3->h3ToParent('8a2a1072b59ffff', 4));
        $this->assertEquals('862a1072fffffff', $h3->h3ToParent('8a2a1072b59ffff', 6));
        $this->assertEquals('832a10fffffffff', $h3->h3ToParent('8a2a1072b59ffff', 3));
        $this->assertEquals('802bfffffffffff', $h3->h3ToParent('8a2a1072b59ffff', 0));
    }
}
