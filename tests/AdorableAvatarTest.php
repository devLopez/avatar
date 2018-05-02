<?php

namespace Tests;

use GuzzleHttp\Client;
use Igrejanet\Avatar\AdorableAvatar;
use PHPUnit\Framework\TestCase;

class AdorableAvatarTest extends TestCase
{
    public function testGenerate()
    {
        $client = new Client();
        $dir    = sys_get_temp_dir();

        $avatar = new AdorableAvatar($client, $dir);
        $avatar->generate('joaosilva@gmail.com');

        $this->assertFileExists($dir . '/joaosilva@gmail.com.png');
    }
}
