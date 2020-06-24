<?php

namespace MichaelLindahl\H3;

use FFI;

trait MiscTrait
{
    public function degsToRads(float $degrees) : float
    {
        $ffi = FFI::cdef('double degsToRads(double degrees);', 'libh3.dylib');

        return $ffi->degsToRads($degrees);
    }

    public function radsToDegs(float $radians) : float
    {
        $ffi = FFI::cdef('double radsToDegs(double degrees);', 'libh3.dylib');

        return $ffi->radsToDegs($radians);
    }
}
