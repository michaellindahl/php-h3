<?php

namespace MichaelLindahl\H3;

use FFI;

trait HierarchicalGridTrait
{
    public function cellToParent(string $H3Index, int $parentRes): string
    {
        $ffi = FFI::cdef(
            self::H3IndexTypeDef.self::H3ErrorTypeDef.
            'H3Error cellToParent(H3Index h, int parentRes, H3Index *parent);', 
            $this->lib
        );

        // @var FFI\CData
        $h3 = $ffi->new('H3Index');

        $ffi->cellToParent(hexdec($H3Index), $parentRes, FFI::addr($h3));

        return dechex($h3->cdata);
    }
}
