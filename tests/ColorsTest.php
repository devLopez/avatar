<?php

namespace Tests;

use Igrejanet\Avatar\Colors;
use PHPUnit\Framework\TestCase;

class ColorsTest extends TestCase
{
    /**
     * @test
     */
    public function get_colors()
    {
        $colors = new Colors();

        $rgb = $colors->getColor();

        $this->assertInternalType('array', $rgb);
        $this->assertArrayHasKey('r', $rgb);
        $this->assertArrayHasKey('g', $rgb);
        $this->assertArrayHasKey('b', $rgb);
        $this->assertCount(3, $rgb);
    }
}
