<?php
/**
 * Project:      hiphp
 * File:         mcrypt.php
 * Created by    gaopu
 * Time          2019/2/13 下午8:14
 */
namespace libs;

class Mcrypt
{

    private static $key; //加密key值
    private static $iv; //偏移量

    /**
     * DES 加密
     * @param string $key
     * @param mixed $param
     * @return array|string
     */
    public static function desEncode($key, $param)
    {
        if ($key === false)
            return false;
        if (is_array($param)) {
            $result = [];
            foreach ($param as $key => $value) {
                $result[$key] = Mcrypt::encrypt($key, $value);
            }
        } else {
            $result = Mcrypt::encrypt($key, $param);
        }
        return $result;
    }

    /**
     * DES 解密
     * @param string $key
     * @param mixed $param
     * @return array|string
     */
    public static function desDecode($key, $param)
    {
        if ($key === false)
            return false;
        if (is_array($param)) {
            $result = [];
            foreach ($param as $key => $value) {
                $result[$key] = Mcrypt::decrypt($key, $value);
            }
        } else {
            $result = Mcrypt::decrypt($key, $param);
        }
        return $result;
    }

    /**
     * 获取key
     * @param $key
     */
    public static function getkey($key)
    {
        self::$key = md5($key);
        $iv        = null;
        $ivArray   = array(1, 4, 'd', 'f', 'r', 'h', 't', 'v');
        foreach ($ivArray as $element) {
            $iv .= is_int($element) ? CHR($element) : $element;
        }
        self::$iv = $iv;
    }

    //加密
    public static function encrypt($key, $str)
    {
        self::getkey($key);
        $data = openssl_encrypt($str, 'des-cbc', self::$key, OPENSSL_RAW_DATA, self::$iv);
        return base64_encode($data);
    }

    //解密
    public static function decrypt($key, $encrypted)
    {
        self::getkey($key);
        $encrypted = base64_decode($encrypted);
        $decrypted = openssl_decrypt($encrypted, 'des-cbc', self::$key, OPENSSL_RAW_DATA, self::$iv);
        return $decrypted;
    }
}
