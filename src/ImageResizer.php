<?php

namespace Vampyrian\ImageResizer;

use Exception;
use Imagick;

class ImageResizer
{
    //Old Image
    protected $pathToImage;
    protected $oldName;
    protected $extension;

    protected $dirToSave = 'storage/thumbnail/';
    protected $width = 1;
    protected $height = 1;

    public static function load(string $pathToImage)
    {
        return new static($pathToImage);
    }

    public function __construct(string $pathToImage)
    {
        if (! file_exists($pathToImage)) {
            throw new Exception("File on path $pathToImage not found");
        }

        $this->pathToImage = $pathToImage;
        $this->oldName = pathinfo($this->pathToImage)['filename'];
        $this->extension = pathinfo($this->pathToImage)['extension'];
    }

    public function setWidth(int $width)
    {
        if ($width < 1) {
            throw new Exception("Image width can't be smaller than 1 px");
        }
        $this->width = $width;
        return $this;
    }

    public function setHeight(int $height)
    {
        if ($height < 1) {
            throw new Exception("Image height can't be smaller than 1 px");
        }

        $this->height = $height;
        return $this;
    }

    public function setWidthAndHeight(int $width, int $height)
    {
        if ($width < 1) {
            throw new Exception("Image width can't be smaller than 1 px");
        }
        if ($height < 1) {
            throw new Exception("Image height can't be smaller than 1 px");
        }
        $this->width = $width;
        $this->height = $height;
        return $this;
    }

    public function dirToSave(string $dirToSave)
    {
        $this->dirToSave = $dirToSave;
        return $this;
    }

    public function saveAndReturnPath()
    {
        $newFileName = $this->oldName.'_'.$this->width.'x'.$this->height;
        $writePath = $this->dirToSave.$newFileName.'.'.$this->extension;

        if (file_exists($writePath)) {
            return $writePath;
        }

        if (! file_exists($this->dirToSave)) {
            mkdir($this->dirToSave, 0777, true);
        } else {
            touch($writePath);
        }

        $imagick = new Imagick($this->pathToImage);
        $imagick->thumbnailImage($this->width, $this->height, true);
        $imagick->writeImage($writePath);
        return $imagick->getImageFilename();
    }
}
