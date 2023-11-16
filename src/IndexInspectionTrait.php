<?php

namespace MichaelLindahl\H3;

trait IndexInspectionTrait
{
    public function getResolution(string $h3): int {
        return shell_exec($this->binDirectory."/getResolution $h3");
    }

    function isValidCell(string $h3): bool {
        $output = shell_exec($this->binDirectory."/isValidCell $h3");
    
        if ($output == "valid") {
            return true;
        } else if ($output == "invalid") {
            return false;
        } else {
            throw new \Exception("Unexpected output: $output");
        }
    }
}