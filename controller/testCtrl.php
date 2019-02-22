<?php
/**
 * Project:      hiphp
 * File:         testCtrl.php
 * Created by    gaopu
 * Time          2019/2/12 下午5:43
 */
namespace controller;
use model\medooModel;

class testCtrl
{
    public function index()
    {
        $a = new medooModel();
        $a->test(['username'=>'test','passwd'=>md5('haha')]);
    }
}