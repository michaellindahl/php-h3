<?php

namespace MichaelLindahl\H3;

use FFI;

trait IndexingTrait
{
    // public function latLngToCell(float $lat, float $lng, int $res): string
    // {
    //     if (php_sapi_name() !== 'cli') {
    //         return (new \Preloaded_H3())->latLngToCell($lat, $lng, $res);
    //     }

    //     $ffi = FFI::cdef(
    //         self::H3IndexTypeDef.self::LatLngTypeDef.self::H3ErrorTypeDef.
    //         'H3Error latLngToCell(const LatLng *g, int res, H3Index *out);',
    //         $this->lib
    //     );

    //     $latLng = $ffi->new('LatLng');
    //     $latLng->lat = deg2rad($lat);
    //     $latLng->lng = deg2rad($lng);

    //     // @var FFI\CData
    //     $h3 = $ffi->new('H3Index');

    //     $ffi->latLngToCell(FFI::addr($latLng), $res, FFI::addr($h3));

    //     return dechex($h3->cdata);
    // }

    // public function cellToLatLng(string $h3Index): object
    // {
    //     if (php_sapi_name() !== 'cli') {
    //         return (new \Preloaded_H3())->cellToLatLng($h3Index);
    //     }

    //     $ffi = FFI::cdef(
    //         self::H3IndexTypeDef.self::LatLngTypeDef.
    //         'void cellToLatLng(H3Index h3, LatLng *latLng);',
    //         $this->lib
    //     );

    //     $dec = hexdec($h3Index);
    //     $latLng = $ffi->new('LatLng');
    //     $ffi->cellToLatLng($dec, FFI::addr($latLng));

    //     return (object) [
    //         'lat' => rad2deg($latLng->lat),
    //         'lng' => rad2deg($latLng->lng),
    //     ];
    // }

    // public function cellToBoundary(string $h3Index): array
    // {
    //     if (php_sapi_name() !== 'cli') {
    //         return (new \Preloaded_H3())->cellToBoundary($h3Index);
    //     }
    
    //     $ffi = FFI::cdef(
    //         self::H3IndexTypeDef.self::LatLngTypeDef.self::CellBoundaryTypeDef.
    //         'void cellToBoundary(H3Index cell, CellBoundary *boundary);',
    //         $this->lib
    //     );

    //     $dec = hexdec($h3Index);
    //     $cellBoundary = $ffi->new('CellBoundary');
    //     $ffi->cellToBoundary($dec, FFI::addr($cellBoundary));

    //     $array = [];
    //     for ($x = 0; $x <= count($cellBoundary->verts) / 2; $x++) {
    //         $latLng = $cellBoundary->verts[$x];

    //         $array[] = (object) [
    //             'lat' => rad2deg($latLng->lat),
    //             'lng' => rad2deg($latLng->lng),
    //         ];
    //     }

    //     return $array;
    // }
}
