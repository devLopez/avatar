<?php

namespace Igrejanet\Avatar\ServiceProviders;

use GuzzleHttp\Client;
use Igrejanet\Avatar\AdorableAvatar;
use Igrejanet\Avatar\Avatar;
use Illuminate\Support\ServiceProvider;

/**
 * AvatarServiceProvider
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   02/05/2018
 * @package Igrejanet\Avatar\ServiceProviders
 */
class AvatarServiceProvider extends ServiceProvider
{
    public function register()
    {
        $path = storage_path('app/public/users');

        $this->app->singleton(Avatar::class, function () use ($path) {
            return new Avatar($path);
        });

        $this->app->singleton(AdorableAvatar::class, function () use ($path) {
            $client = new Client();

            return new AdorableAvatar($client, $path);
        });
    }
}