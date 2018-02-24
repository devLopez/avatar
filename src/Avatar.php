<?php

namespace Igrejanet\Avatar;

use BadMethodCallException;
use Exception;
use Ramsey\Uuid\Uuid;

/**
 * Avatar
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.1
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
    public function generate(string $firstName, string $lastName = '') : string
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
        imagettftext($image, 48, 0, 6, 85, $fontColor, $this->font, $text);

        if ( ! imagepng($image, $this->pathToSave . '/' . $filename) ) {
            throw new Exception('We can\'t create your avatar. Try again');
        }

        return $filename;
    }

    /**
     * @return int
     */
    public function getWidth() : int
    {
        return $this->width;
    }

    /**
     * @param   int  $width
     * @return  $this
     */
    public function setWidth(int $width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeight() : int
    {
        return $this->height;
    }

    /**
     * @param   int  $height
     * @return  $this
     */
    public function setHeight(int $height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return string
     */
    public function getFont() : string
    {
        return $this->font;
    }

    /**
     * @param   string  $font
     * @return  $this
     */
    public function setFont(string $font)
    {
        $this->font = $font;

        return $this;
    }

    /**
     * @return string
     */
    public function getPathToSave() : string
    {
        return $this->pathToSave;
    }

    /**
     * @param   string  $pathToSave
     * @return  $this
     */
    public function setPathToSave(string $pathToSave)
    {
        $this->pathToSave = $pathToSave;

        return $this;
    }
}