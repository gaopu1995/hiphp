<?php
/**
 * Project:      hiphp
 * File:         image.php
 * Created by    gaopu
 * Time          2019/2/15 上午11:13
 */

namespace libs;

class Image
{
    public static function suoluetu($filename,$newimage)
    {
        $per=0.3;
        list($width, $height)=getimagesize($filename);
        $n_w=$width*$per;
        $n_h=$width*$per;
        $new=imagecreatetruecolor($n_w, $n_h);
        $img=imagecreatefromjpeg($filename);
        header('content-type:image/png');
        //拷贝部分图像并调整
        imagecopyresized($new, $img,0, 0,0, 0,$n_w, $n_h, $width, $height);
        //图像输出新图片、另存为
        imagejpeg($new);
        imagedestroy($new);
        imagedestroy($img);
    }
    public static function line($filename,$newimage)
    {
        //创建画布
        $img = imagecreatetruecolor(200,200);
        //为图像分配颜色
        $red = imagecolorallocate($img,0xFF,0x00,0x00);
        //画线条
        imageline($img,0,0,100,100,$red);
        //输出头信息
        header('content-type:image/jpeg');
        //声明格式 imagepng ( resource $image [, string $filename ] )如果给了参数 $filename 则将图像保存至 $filename 中
        imagepng($img);
        //销毁图像 释放内存
        imagedestroy($img);
    }

    public static function water($filename)
    {
        // 加载要加水印的图像
        $im = imagecreatefromjpeg($filename);

// 首先我们从 GD 手动创建水印图像
        $stamp = imagecreatetruecolor(100, 70);
        imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
        imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
        imagestring($stamp, 5, 20, 20, 'libGD', 0x0000FF);
        imagestring($stamp, 3, 20, 40, '(c) 2007-9', 0x0000FF);

// 设置水印图像的位置和大小
        $marge_right = 10;
        $marge_bottom = 10;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);

// 以 50% 的透明度合并水印和图像
        imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);
        header('content-type:image/jpeg');

// 将图像保存到文件，并释放内存
        imagepng($im);
        imagedestroy($im);
    }

    public static function yanzhegnma()
    {
        $img = imagecreatetruecolor(100, 40);
        $black = imagecolorallocate($img, 0x00, 0x00, 0x00);
        $green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
        $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
        imagefill($img,0,0,$white);
        //生成随机的验证码
        $code = '';
        for($i = 0; $i < 4; $i++) {
            $code .= rand(0, 9);
        }
        imagestring($img, 5, 10, 10, $code, $black);
        //加入噪点干扰
        for($i=0;$i<50;$i++) {
            imagesetpixel($img, rand(0, 100) , rand(0, 100) , $black);
            imagesetpixel($img, rand(0, 100) , rand(0, 100) , $green);
        }
        //输出验证码
        header("content-type: image/png");
        imagepng($img);
        imagedestroy($img);
    }
}
