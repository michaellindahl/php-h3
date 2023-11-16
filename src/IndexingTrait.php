<?php

namespace MichaelLindahl\H3;

use FFI;

trait IndexingTrait
{
    public function latLngToCell(float $lat, float $lng, int $res): string
    {
        $output = shell_exec($this->binDirectory."/latLngToCell $lat $lng $res");
    
        if (strpos($output, 'error') !== false) {
            throw new \Exception("Unexpected output: $output");
        }

        return $output;
    }

    public function cellToLatLng(string $h3Index): LatLng
    {
        $output = shell_exec($this->binDirectory."/cellToLatLng $h3Index");
    
        if (strpos($output, 'error') !== false) {
            throw new \Exception("Unexpected output: $output");
        }

        [$lat, $lng] = explode(" ", $output);

        return new LatLng((float)$lat, (float)$lng);
    }

    /**
     * @param string $h3Index
     * @return LatLng[]
     * @throws \Exception
     */
    public function cellToBoundary(string $h3Index): array
    {
        $output = shell_exec($this->binDirectory."/cellToBoundary $h3Index");
    
        if (strpos($output, 'error') !== false) {
            throw new \Exception("Unexpected output: $output");
        }

        // for each line in the $output
        $lines = explode("\n", $output);
        $coordinates = [];

        // Iterate through each line
        foreach ($lines as $line) {
            // Skip empty lines
            if (empty($line)) { continue; }

            // Explode the line to get lat and lng
            [$lat, $lng] = explode(" ", $line);

            // Add to the array
            $coordinates[] = new LatLng((float)$lat, (float)$lng);
        }

        return $coordinates;
    }
}
