<?php

namespace Igrejanet\Avatar;

use GuzzleHttp\Client;

/**
 * AdorableAvatar
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   02/05/2018
 * @package Igrejanet\Avatar
 */
class AdorableAvatar
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $address = 'https://api.adorable.io/avatars/285/';

    /**
     * @var string
     */
    protected $savePath;

    /**
     * @param   Client  $client
     * @param   string  $savePath
     */
    public function __construct(Client $client, string $savePath)
    {
        $this->client   = $client;
        $this->savePath = $savePath;
    }

    /**
     * @param   mixed  $identifier
     * @return  bool
     */
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