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

    public function getResolution(string $H3Index): int
    {
        return self::$ffi->getResolution(hexdec($H3Index));
    }

    public function isValidCell(string $H3Index): bool
    {
        return (bool) self::$ffi->isValidCell(hexdec($H3Index));
    }

    // Indexing

    public function latLngToCell(float $lat, float $lng, int $res): string
    {
        $latLng = self::$ffi->new('LatLng');
        $latLng->lat = deg2rad($lat);
        $latLng->lng = deg2rad($lng);

        $h3 = self::$ffi->latLngToCell(FFI::addr($latLng), $res);

        return dechex($h3);
    }

    public function cellToLatLng(string $h3Index): object
    {
        $dec = hexdec($h3Index);
        $latLng = self::$ffi->new('LatLng');
        self::$ffi->cellToLatLng($dec, FFI::addr($latLng));

        return (object) [
            'lat' => rad2deg($latLng->lat),
            'lng' => rad2deg($latLng->lng),
        ];
    }

    public function cellToBoundary(string $h3Index): array
    {
        $dec = hexdec($h3Index);
        $cellBoundary = self::$ffi->new('CellBoundary');
        self::$ffi->cellToBoundary($dec, FFI::addr($cellBoundary));

        $array = [];
        for ($x = 0; $x <= count($cellBoundary->verts) / 2; $x++) {
            $latLng = $cellBoundary->verts[$x];

            $array[] = (object) [
                'lat' => rad2deg($latLng->lat),
                'lng' => rad2deg($latLng->lng),
            ];
        }

        return $array;
    }

    // HierarchicalGrid

    public function cellToParent(string $H3Index, int $parentRes): string
    {
        $h3 = self::$ffi->cellToParent(hexdec($H3Index), $parentRes);

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
