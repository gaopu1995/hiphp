<?php
/**
 * Project:      hiphp
 * File:         common.php
 * Created by    gaopu
 * Time          2019/2/13 下午8:12
 */
namespace controller;
use core\hi_controller;
use libs\Mcrypt;
class Common extends hi_controller
{
    protected $uid;
    public function init()
    {
        //获取登陆数据
        if (!empty($_COOKIE['sessionid'])) {
            $userinfo = json_decode(Mcrypt::desDecode("hiphp", $_COOKIE['sessionid']), true);
            if($userinfo) {
                $this->uid = (int) $userinfo['uid'];
            }
        } else {
            $this->uid = 0;
        }
        \core\hi_log::log($this->uid,"common.log");
    }

}