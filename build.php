#!/usr/bin/env php
<?php

chdir("go");

$goFiles = glob('*.go');

if (empty($goFiles)) {
    echo "No Go files found in the 'go' directory.\n";
    exit(1);
}

foreach ($goFiles as $file) {
    $output = [];
    $returnCode = 0;

    echo "Building ".$file."…\n";

    // Build the Go file
    exec("go build -o ../bin/" . basename($file, '.go') . " $file", $output, $returnCode);

    if ($returnCode !== 0) {
        echo "Error building $file:\n";
        echo implode("\n", $output) . "\n";
        exit(1);
    }

    echo "Built $file successfully.\n";
}

echo "Go command-line tool build completed.\n";
