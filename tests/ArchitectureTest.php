<?php

namespace MichaelLindahl\H3\Tests;

use MichaelLindahl\H3\H3;
use PHPUnit\Framework\TestCase;

class ArchitectureTest extends TestCase
{
    /** @test */
    public function can_map_to_proper_bin_directory()
    {
        // mac_os_apple_silicon
        if ('arm64' == php_uname('m') && 'Darwin' == php_uname('s')) {
            $h3 = new H3();
            $this->assertStringEndsWith('bin/darwin-arm64', $h3->binDirectory);    
        }
        
        // mac_os_intel
        if ('x86_64' == php_uname('m') && 'Darwin' == php_uname('s')) {
            $h3 = new H3();
            $this->assertStringEndsWith('bin/darwin-amd64', $h3->binDirectory);    
        }
        
        // linux
        if ('x86_64' == php_uname('m') && 'Linux' == php_uname('s')) {
            $h3 = new H3();
            $this->assertStringEndsWith('bin/linux-amd64', $h3->binDirectory);    
        }
    }
}