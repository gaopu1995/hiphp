<?php
/**
 *   [Metlive!] (C)2001-2099 hiphp Inc.
 *
 */

namespace core;

use core\route;
class core
{
    //存储已经加载的文件
    public static $classArr = array();

    /**
     * 自动加载函数
     * @param $class
     * @return bool
     */
    public static function load($class)
    {
        if (isset($classArr[$class]))
            return true;
        $class = str_replace('\\', '/', $class);
        $file  = ROOT . $class . '.php';
        if (is_file($file)) {
            include $file . '';
            self::$classArr[$class] = $class;
            return true;
        } else {
            return false;
        }
    }

    public static function run()
    {
        $route    = route::Factory();
        $arr      = $route->active();
        $classStr = $arr['ctrl'] . 'Ctrl';
        $file     = CTRL . $classStr . '.php';
        $action   = $arr['action'];
        if (!file_exists($file)) {
            $file   = CTRL . 'indexCtrl.php';
            $action = 'index';
            $classStr = 'indexCtrl';
        }
        include $file;
        $classStr = '\\controller\\'.$classStr;
        $class = new $classStr();

        //公共初始化方法
        $methods = get_class_methods($class);
        foreach ($methods as &$v) {
            $v = strtolower($v);
        }
        if (in_array('init', $methods)) {
            call_user_func_array(array($class, 'Init'), array());
        }
        //运行本来的方法
        if (method_exists($class, $action)) {
            $class->$action();
        } elseif(method_exists($class, 'index')){
            $class->index();
        }else {
            echo 'error';
        }

    }
}