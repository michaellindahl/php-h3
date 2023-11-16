#!/usr/bin/env php
<?php

chdir("go");

$goFiles = glob('*.go');

if (empty($goFiles)) {
    echo "No Go files found in the 'go' directory.\n";
    exit(1);
}

$targets = [
    'darwin-amd64' => "",
    'linux-amd64' => "CC=x86_64-linux-musl-gcc CGO_ENABLED=1 GOOS=linux GOARCH=amd64",
//    'darwin-arm64',
];

foreach ($targets as $target => $archFlags) {
    foreach ($goFiles as $file) {
        $output = [];
        $returnCode = 0;

        echo "Building $file for $target...\n";

        // Build the Go file with cross-compilation
        $staticFlags = "-tags netgo -ldflags '-w -extldflags \"-static\"'";

        exec("$archFlags go build -o ../bin/$target/" . basename($file, '.go') . " $file", $output, $returnCode);
        
        if ($returnCode !== 0) {
            echo "Error building $file:\n";
            echo implode("\n", $output) . "\n";
            exit(1);
        }

        echo "Built $file for $target successfully.\n";
    }
}

echo "Go command-line tool build completed.\n";
