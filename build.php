#!/usr/bin/env php
<?php

chdir("go");

$goFiles = glob('*.go');

if (empty($goFiles)) {
    echo "No Go files found in the 'go' directory.\n";
    exit(1);
}

// TODO: Maybe build this using GitHub actions?
// Right now Apple Silicon must build Apple Silicon
// and Intel must build Intel.
$targets = [
    // Apple Silicon macOS
    // 'darwin-arm64' => [
    //     'arch' => "CGO_ENABLED=1 GOOS=darwin GOARCH=arm64",
    //     'static' => "-tags netgo -ldflags '-w -extldflags \"-static\"'",
    // ],
    // Intel macOS
    'darwin-amd64' => [
        //'arch' => "GOOS=darwin GOARCH=amd64",
        //'static' => "-tags netgo -ldflags '-w -extldflags \"-static\"'",
    ],
    // Linux
    'linux-amd64' => [
        'arch' => "CC=x86_64-linux-musl-gcc CGO_ENABLED=1 GOOS=linux GOARCH=amd64",
        'static' => "-tags netgo -ldflags '-w -extldflags \"-static\"'",
    ],
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

        if ($returnCode !== 0) {
            echo "Error building $file:\n";
            echo implode("\n", $output) . "\n";
            exit(1);
        }

        echo "Built $file for $target successfully.\n";
    }
}

echo "Go command-line tool build completed.\n";
