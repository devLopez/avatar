<?php

namespace Igrejanet\Avatar;

use GuzzleHttp\Client;

class AdorableAvatar
{
    protected $client;

    protected $address = 'https://api.adorable.io/avatars/285/';

    protected $savePath;

    public function __construct(Client $client, $savePath)
    {
        $this->client   = $client;
        $this->savePath = $savePath;
    }

    public function generate($identifier)
    {
        $address    = $this->address . $identifier;
        $filename   = $this->savePath . DIRECTORY_SEPARATOR . $identifier . '.png';

        if ( ! is_dir($this->savePath) ) {
            mkdir($this->savePath);
        }

        if ( ! file_exists($filename) ) {
            $this->client->get($address, [
                'save_to'   => $filename
            ]);
        }

        return true;
    }
}