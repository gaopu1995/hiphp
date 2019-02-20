<?php
/**
 * Project:      hiphp
 * File:         conf.php
 * Created by    gaopu
 * Time          2018/8/15 下午5:57
 */

namespace libs;

class conf
{
    public static $confArr = array();
    public static function get($file,$name)
    {
        /**
         * 1 判断配置文件是否存在
         * 2 判断配置是否存在
         * 3 缓存配置
         */
        if(isset(self::$confArr[$file])){
            return self::$confArr[$file][$name];
        }else {
            $path = CONFIG . $file . 'Conf.php';
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$confArr[$file] = $conf;
                    return $conf[$name];
                } else {
                    \core\hi_log::log('没有这个配置项'. $name,"error.log");
                    throw new \Exception('没有这个配置项'. $name);
                }
            } else {
                \core\hi_log::log('找不到配置文件'. $file,"error.log");
                throw new \Exception('找不到配置文件'. $file);
            }
        }
    }

    static public function all($file)
    {
        if(isset(self::$confArr[$file])){
            return self::$confArr[$file];
        }else {
            $path = CONFIG . $file . 'Conf.php';
            if (is_file($path)) {
                $conf = include $path;
                return $conf;
            } else {
                throw new \Exception('找不到配置文件', $file);
            }
        }
    }
}