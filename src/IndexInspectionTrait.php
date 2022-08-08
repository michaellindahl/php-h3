<?php

namespace MichaelLindahl\H3;

use FFI;

trait IndexInspectionTrait
{
    public function h3GetResolution(string $H3Index): int
    {
        if (php_sapi_name() !== 'cli') {
            return (new \Preloaded_H3())->h3GetResolution($H3Index);
        }

        $ffi = FFI::cdef(self::H3IndexTypeDef.'int h3GetResolution(H3Index h);', $this->lib);

        return $ffi->h3GetResolution(hexdec($H3Index));
    }

    public function h3IsValid(string $H3Index): bool
    {
        if (php_sapi_name() !== 'cli') {
            return (new \Preloaded_H3())->h3IsValid($H3Index);
        }

        $ffi = FFI::cdef(self::H3IndexTypeDef.'int h3IsValid(H3Index h);', $this->lib);

        return $ffi->h3IsValid(hexdec($H3Index));
    }
}
