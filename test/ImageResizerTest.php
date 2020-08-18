<?php

namespace Vampyrian\ImageResizer\Test;


use Vampyrian\ImageResizer\ImageResizer;

class ImageResizerTest extends \PHPUnit\Framework\TestCase
{
    protected $wrongImagePath = './download1.jpeg';
    protected $imagePath = './download.jpeg';
    protected $imageResizer;

    protected function setUp()
    {
        $this->imageResizer = ImageResizer::load($this->imagePath);
    }

    public function testException()
    {
        $this->expectException(\Exception::class);
        ImageResizer::load($this->wrongImagePath);
    }

    public function testNormalInitialization()
    {
        $imageResizer = ImageResizer::load($this->imagePath);
        $this->assertInstanceOf(ImageResizer::class, $imageResizer, 'Nepavyko inicializuoti');
    }

    public function testWrongWidth()
    {
        $this->expectException(\Exception::class);
        $this->imageResizer->setWidth(0);
    }

    public function testWrongHeight()
    {
        $this->expectException(\Exception::class);
        $this->imageResizer->setHeight(0);
    }

}
