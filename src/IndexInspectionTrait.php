<?php

namespace MichaelLindahl\H3;

use FFI;

trait IndexInspectionTrait
{
    public function getResolution(string $H3Index): int
    {
        if (php_sapi_name() !== 'cli') {
            return (new \Preloaded_H3())->getResolution($H3Index);
        }

        $ffi = FFI::cdef(self::H3IndexTypeDef.'int getResolution(H3Index h);', $this->lib);

        return $ffi->getResolution(hexdec($H3Index));
    }

    public function isValidCell(string $H3Index): bool
    {
        if (php_sapi_name() !== 'cli') {
            return (new \Preloaded_H3())->isValidCell($H3Index);
        }

        $ffi = FFI::cdef(self::H3IndexTypeDef.'int isValidCell(H3Index h);', $this->lib);

        return $ffi->isValidCell(hexdec($H3Index));
    }
}
