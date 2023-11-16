<?php

class LatLng
{
    public function __construct(
        public readonly float $lat,
        public readonly float $lng
    ) {}
}