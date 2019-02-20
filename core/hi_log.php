<?php
/**
 * Project:      hiphp
 * File:         hi_log.php
 * Created by    gaopu
 * Time          2019/2/12 下午5:28
 */
namespace core;

class hi_log
{
    public static function log($content,$filename)
    {
        $file = LOGS.$filename;
        if (is_array($content) || is_object($content)){
            $content = json_encode($content);
        }
        $log = $content . PHP_EOL;
        file_put_contents($file,$log,FILE_APPEND);
    }
}