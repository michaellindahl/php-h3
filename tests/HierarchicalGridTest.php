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
    }
}
