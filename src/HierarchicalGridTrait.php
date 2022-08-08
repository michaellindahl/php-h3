<?php

namespace MichaelLindahl\H3;

use FFI;

trait HierarchicalGridTrait
{
    public function h3ToParent(string $H3Index, int $parentRes): string
    {
        if (php_sapi_name() !== 'cli') {
            return (new \Preloaded_H3())->h3ToParent($H3Index, $parentRes);
        }

        $ffi = FFI::cdef(self::H3IndexTypeDef.'H3Index h3ToParent(H3Index h, int parentRes);', $this->lib);

        $h3 = $ffi->h3ToParent(hexdec($H3Index), $parentRes);

        return dechex($h3);
    }
}
