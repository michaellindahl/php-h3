#!/usr/bin/env php
<?php

chdir("go");

$goFiles = glob('*.go');

if (empty($goFiles)) {
    echo "No Go files found in the 'go' directory.\n";
    exit(1);
}

$targets = [
    'darwin-amd64' => null,
    'linux-amd64' => [
        'arch' => "CC=x86_64-linux-musl-gcc CGO_ENABLED=1 GOOS=linux GOARCH=amd64",
        'static' => "-tags netgo -ldflags '-w -extldflags \"-static\"'",
    ]
    
//    'darwin-arm64',
];

foreach ($targets as $target => $flags) {
    foreach ($goFiles as $file) {
        $output = [];
        $returnCode = 0;

        echo "Building $file for $target...\n";

        // Build the Go file with cross-compilation
        $archFlags = $flags['arch'] ?? "";
        $staticFlags = $flags['static'] ?? "";

        exec("$archFlags go build $staticFlags -o ../bin/$target/" . basename($file, '.go') . " $file", $output, $returnCode);

        // % CC=x86_64-linux-musl-gcc CGO_ENABLED=1 GOOS=linux GOARCH=amd64 go build -tags netgo -ldflags '-w -extldflags "-static"' -o ../bin/linux-amd64/cellToParent cellToParent.go 
        //   CC=x86_64-linux-musl-gcc CGO_ENABLED=1 GOOS=linux GOARCH=amd64 go build -tags netgo -ldflags '-w -extldflags "-static"' -o ../bin/linux-amd64/cellToParent cellToParent.goBuilt cellToParent.go


        if ($returnCode !== 0) {
            echo "Error building $file:\n";
            echo implode("\n", $output) . "\n";
            exit(1);
        }

        echo "Built $file for $target successfully.\n";
    }
}

echo "Go command-line tool build completed.\n";
