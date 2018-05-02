<?php

namespace Igrejanet\Avatar\Facades;

use Igrejanet\Avatar\Avatar;
use Illuminate\Support\Facades\Facade;

/**
 * AvatarFacade
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   02/05/2018
 * @package Igrejanet\Avatar\Facades
 */
class AvatarFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Avatar::class;
    }
}