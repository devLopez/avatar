<?php

namespace Igrejanet\Avatar;

use BadMethodCallException;
use Exception;
use Ramsey\Uuid\Uuid;

/**
 * Avatar
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   23/02/2018
 * @package Igrejanet\Avatar
 */
class Avatar
{
    /**
     * @var int
     */
    protected $width = 128;

    /**
     * @var int
     */
    protected $height = 128;

    /**
     * @var string
     */
    protected $font = __DIR__ . '/../resources/font/Lato-Lig-webfont.ttf';

    /**
     * @var string
     */
    protected $pathToSave;

    /**
     * @param   string  $pathToSave
     */
    public function __construct(string $pathToSave)
    {
        $this->pathToSave = $pathToSave;
    }

    /**
     * @param   string $firstName
     * @param   string $lastName
     * @return  string
     * @throws  \ReflectionException
     * @throws  Exception
     */
    public function generate(string $firstName, string $lastName = '')
    {
        if ( $lastName ==  '') {
            $text = $firstName[0] . $firstName[1];
        } else {
            $text = $firstName[0] . $lastName[0];
        }

        $uuid = Uuid::uuid1()->toString();
        $filename = str_replace('-', '', $uuid) . '.png';

        // Recebe as cores predefinidas. Estas cores foram extraídas de produtos Google
        $rgb = (new Colors())->getColor();

        // Creates a image resource
        $image = imagecreate($this->width, $this->height);

        // Sets background and color text
        $backgroundColor    = imagecolorallocate($image, $rgb['r'], $rgb['g'], $rgb['b']);
        $fontColor          = imagecolorallocate($image, 255, 255, 255);

        // Generates and save the image
        imagettftext($image, 64, 0, 10, 90, $fontColor, $this->font, $text);

        if ( ! imagepng($image, $this->pathToSave . '/' . $filename) ) {
            throw new Exception('We can\'t create your avatar. Try again');
        }

        return $filename;
    }

    /**
     * @param   string  $name
     * @param   mixed  $value
     * @return  $this
     */
    public function __set($name, $value)
    {
        if ( property_exists($this, $name) ) {
            throw new BadMethodCallException();
        }

        $this->$name = $value;

        return $this;
    }

    /**
     * @param   string  $name
     * @return  mixed
     */
    public function __get($name)
    {
        if ( property_exists($this, $name) ) {
            throw new BadMethodCallException();
        }

        return $this->$name;
    }
}