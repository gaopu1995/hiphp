<?php
/**
 * Project:      hiphp
 * File:         route.php
 * Created by    gaopu
 * Time          2018/8/15 上午11:35
 */

namespace core;

class route
{
    private static $in = null;

    private function __construct()
    {

    }

    public static function Factory()
    {
        if (!isset(self::$in)) {
            self::$in = new route();
        }
        return self::$in;
    }

    public function active()
    {
        $ctrl   = 'index';
        $action = 'index';
        if (isset($_SERVER[REQUEST_URI]) && $_SERVER[REQUEST_URI] != '/') {
            $path    = strtok($_SERVER['REQUEST_URI'], '?');
            $patharr = explode('/', trim($path, '/'));
            if (isset($patharr[0])) {
                $ctrl = $patharr[0];
            }
            if (isset($patharr[1])) {
                $action = $patharr[1];
            }
        }
        return array('ctrl'=>$ctrl,'action'=>$action);
    }


}