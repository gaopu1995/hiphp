<?php
/**
 * Project:      hiphp
 * File:         testModel.php
 * Created by    gaopu
 * Time          2018/8/15 下午7:23
 */

namespace model;
use core\hi_table;
class testModel extends hi_table
{
    function __construct(array $param = array())
    {
        $param['table'] = 'test';
        parent::__construct($param);
    }
}