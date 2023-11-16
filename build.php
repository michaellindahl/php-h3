#!/usr/bin/env php
<?php

chdir("go");

$goFiles = glob('*.go');

if (empty($goFiles)) {
    echo "No Go files found in the 'go' directory.\n";
    exit(1);
}

$targets = [
    'darwin-amd64',
    'linux-amd64',
//    'darwin-arm64',
];

foreach ($targets as $target) {
    foreach ($goFiles as $file) {
        $output = [];
        $returnCode = 0;

        echo "Building $file for $target...\n";

        // Build the Go file with cross-compilation
        exec("GOOS=$target go build -o ../bin/$target/" . basename($file, '.go') . " $file", $output, $returnCode);

        
        if ($returnCode !== 0) {
            echo "Error building $file:\n";
            echo implode("\n", $output) . "\n";
            exit(1);
        }

        echo "Built $file for $target successfully.\n";
    }
}

echo "Go command-line tool build completed.\n";
