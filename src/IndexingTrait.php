<?php

namespace MichaelLindahl\H3;

use FFI;

trait IndexingTrait
{
    public function geoToH3(float $lat, float $lon, int $res): string
    {
        $ffi = FFI::cdef(
            self::H3IndexTypeDef.self::GeoCoordTypeDef.
            'H3Index geoToH3(const GeoCoord *g, int res);',
            'libh3.dylib'
        );

        $location = $ffi->new('GeoCoord');
        $location->lat = deg2rad($lat);
        $location->lon = deg2rad($lon);

        $h3 = $ffi->geoToH3(FFI::addr($location), $res);

        return dechex($h3);
    }

    public function h3ToGeo(string $h3Index): object
    {
        $ffi = FFI::cdef(
            self::H3IndexTypeDef.self::GeoCoordTypeDef.
            'void h3ToGeo(H3Index h3, GeoCoord *g);',
            'libh3.dylib'
        );

        $dec = hexdec($h3Index);
        $geoCord = $ffi->new('GeoCoord');
        $ffi->h3ToGeo($dec, FFI::addr($geoCord));

        return (object) [
            'lat' => rad2deg($geoCord->lat),
            'lon' => rad2deg($geoCord->lon),
        ];
    }

    // public function h3ToGeoBoundary(string $h3Index) : object
    // {
    //     $ffi = FFI::cdef('void h3ToGeoBoundary(H3Index h3, GeoBoundary *gp);', 'libh3.dylib');
    // }
}
