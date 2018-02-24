<?php

namespace Tests;

use Igrejanet\Avatar\Avatar;
use PHPUnit\Framework\TestCase;

class AvatarTest extends TestCase
{
    /**
     * @test
     */
    public function avatar_creation()
    {
        $directory = __DIR__ . '/../resources/tests';

        $avatar = new Avatar($directory);
        $filename = $avatar->generate('Marcos', 'Lacerda');

        $this->assertFileExists($directory . '/' . $filename);
    }
}
