<?php
/**
 * Project:      hiphp
 * File:         hi_medoo.php
 * Created by    gaopu
 * Time          2019/2/12 下午3:57
 */

namespace core;
use Medoo\Medoo;

abstract class hi_medoo
{
    protected $_db     = null;
    protected $_table = null;

    public function __construct($param = array())
    {
        if (!empty($param)) {
            $this->_table = $param['table'];
        }
        // 初始化配置
        $this->_db = new Medoo(
            [
                'database_type' => 'mysql',
                'database_name' => \libs\conf::get('database', 'database_name'),
                'server'        => \libs\conf::get('database', 'host'),
                'username'      => \libs\conf::get('database', 'username'),
                'password'      => \libs\conf::get('database', 'password'),
                'port'          => \libs\conf::get('database', 'port'),
                'charset'       => 'utf8'
            ]);
    }
}

