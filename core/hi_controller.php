<?php
/**
 * Project:      hiphp
 * File:         hi_controller.php
 * Created by    gaopu
 * Time          2018/8/15 下午5:38
 */

namespace core;

abstract class hi_controller
{
    public function Get($name)
    {
        if (isset($_GET[$name])) {
            return is_array($_GET[$name]) ? $_GET[$name] : trim($_GET[$name]);
        } else {
            return null;
        }
    }

    public function Post($name)
    {
        if (isset($_POST[$name])) {
            return is_array($_POST[$name]) ? $_POST[$name] : trim($_POST[$name]);
        } else {
            return null;
        }
    }

    public function showMsg($msg, $state)
    {
        $res = array(
            'state' => $state,
            'msg'   => $msg
        );
        $res  = json_encode($res);
        echo $res;
        exit;
    }
}