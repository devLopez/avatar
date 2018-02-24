<?php

namespace Igrejanet\Avatar;
use ReflectionClass;

/**
 * Colors
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   23/02/2018
 * @package Igrejanet\Avatar
 */
class Colors
{
    const NAVY = ['r' => 37, 'g' => 71, 'b' => 106];

    const BLUE = ['r' => 3, 'g' => 169, 'b' => 244];

    CONST GREEN = ['r' => 139, 'g' => 195, 'b' => 74];

    const MINT = ['r' => 38, 'g' => 166, 'b' => 154];

    const YELLOW = ['r' => 255, 'g' => 179, 'b' => 0];

    const RED = ['r' => 224, 'g' => 67, 'b' => 54];

    const PINK = ['r' => 240, 'g' => 98, 'b' => 146];

    const PURPLE = ['r' => 171, 'g' => 71, 'b' => 188];

    const DARK = ['r' => 58, 'g' => 68, 'b' => 78];

    /**
     * @var array
     */
    protected $color;

    /**
     * @throws  \ReflectionException
     */
    public function __construct()
    {
        $class = new ReflectionClass($this);

        $constants = array_keys($class->getConstants());

        $this->color = $class->getConstant(
            $constants[rand(0, count($constants) - 1)]
        );
    }

    /**
     * @return  array
     */
    public function getColor() : array
    {
        return $this->color;
    }
}