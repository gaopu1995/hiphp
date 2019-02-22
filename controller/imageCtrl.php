<?php
/**
 * Project:      hiphp
 * File:         imageController.php
 * Created by    gaopu
 * Time          2019/2/15 上午11:07
 */

namespace controller;
use libs\Image;
class imageCtrl extends Common
{
    public function index()
    {
        $filename  = dirname(__DIR__).FD_DS.'static' . FD_DS . "image/kate.jpg";
        $newimage  = dirname(__DIR__).FD_DS.'static' . FD_DS . "image/1.jpg";

        //Image::suoluetu($filename,$newimage);
        //Image::water($filename);
        Image::yanzhegnma();
        //Image::line($filename,$newimage);



        /*$string = "1";
        $im     = imagecreatefromjpeg($filename);
        $orange = imagecolorallocate($im, 220, 210, 60);
        $px     = (imagesx($im) - 7.5 * strlen($string)) / 2;
        imagestring($im, 3, $px, 9, $string, $orange);
        imagejpeg($im,$newimage);
        imagedestroy($im);*/

        //echo "<img src='{$filename}'/>";
    }
}