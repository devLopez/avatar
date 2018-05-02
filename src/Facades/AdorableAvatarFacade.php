<?php

namespace Igrejanet\Avatar\Facades;

use Igrejanet\Avatar\AdorableAvatar;
use Illuminate\Support\Facades\Facade;

/**
 * AdorableAvatarFacade
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   02/05/2018
 * @package Igrejanet\Avatar\Facades
 */
class AdorableAvatarFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return AdorableAvatar::class;
    }
}