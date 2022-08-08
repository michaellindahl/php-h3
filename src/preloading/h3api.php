<?php

declare(strict_types=1);

// This class leverages FFI preloading and scopes. In order to use this class you need to set the following in your php.ini:
// opcache.preload=preloader.php
// opcache.preload_user=_www
// ffi.preload=header.h
// opcache.enable_cli=1

// Any methods or objects used here must be defined in the header.h files.

final class Preloaded_H3
{
    private static $ffi = null;

    public function __construct()
    {
        if (is_null(self::$ffi)) {
            self::$ffi = FFI::scope('H3');
        }
    }

    // IndexInspection

    public function h3GetResolution(string $H3Index): int
    {
        return self::$ffi->h3GetResolution(hexdec($H3Index));
    }

    public function h3IsValid(string $H3Index): bool
    {
        return (bool) self::$ffi->h3IsValid(hexdec($H3Index));
    }

    // Indexing

    public function geoToH3(float $lat, float $lon, int $res): string
    {
        $location = self::$ffi->new('GeoCoord');
        $location->lat = deg2rad($lat);
        $location->lon = deg2rad($lon);

        $h3 = self::$ffi->geoToH3(FFI::addr($location), $res);

        return dechex($h3);
    }

    public function h3ToGeo(string $h3Index): object
    {
        $dec = hexdec($h3Index);
        $geoCord = self::$ffi->new('GeoCoord');
        self::$ffi->h3ToGeo($dec, FFI::addr($geoCord));

        return (object) [
            'lat' => rad2deg($geoCord->lat),
            'lon' => rad2deg($geoCord->lon),
        ];
    }

    public function h3ToGeoBoundary(string $h3Index): array
    {
        $dec = hexdec($h3Index);
        $geoBoundary = self::$ffi->new('GeoBoundary');
        self::$ffi->h3ToGeoBoundary($dec, FFI::addr($geoBoundary));

        $array = [];
        for ($x = 0; $x <= count($geoBoundary->verts) / 2; $x++) {
            $geoCord = $geoBoundary->verts[$x];

            $array[] = (object) [
                'lat' => rad2deg($geoCord->lat),
                'lon' => rad2deg($geoCord->lon),
            ];
        }

        return $array;
    }

    // HierarchicalGrid

    public function h3ToParent(string $H3Index, int $parentRes): string
    {
        $h3 = self::$ffi->h3ToParent(hexdec($H3Index), $parentRes);

        return dechex($h3);
    }

    // Misc

    public function degsToRads(float $degrees): float
    {
        return self::$ffi->degsToRads($degrees);
    }

    public function radsToDegs(float $radians): float
    {
        return self::$ffi->radsToDegs($radians);
    }
}
