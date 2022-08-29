<?php 


namespace App;

use Imagine\Gd\Imagine;
use Imagine\Image\Box;

class ImageOptimizer
{
    private const MAX_WIDTH = 200;
    private const MAX_HEIGHT = 150;

    private $imagine;

    public function __construct()
    {
        $this->imagine = new Imagine();
    }

    public function  resize(string $filename)
    {
        list($iwidth,$iheight) = getImagesize($filename);
        $ratio = $iwidth / $iheight;
        $width = self::MAX_HEIGHT;
        $height = self::MAX_HEIGHT;
        if($width / $height > $ratio){
            $width = $height  * $ratio;
        }else{
            $height = $width / $ratio;
        }

        $photo = $this->image->open($filename);
        $photo->resize(new Box($width,$height))->save($filename);
    }
}
?>