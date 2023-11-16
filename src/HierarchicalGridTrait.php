<?php

namespace MichaelLindahl\H3;

trait HierarchicalGridTrait
{
    public function cellToParent(string $h3, int $parentRes): string
    {
        $output = shell_exec(__DIR__."/../bin/cellToParent $h3 $parentRes");
    
        if (strpos($output, 'error') !== false) {
            throw new \Exception("Unexpected output: $output");
        }

        return $output;
    }
}
