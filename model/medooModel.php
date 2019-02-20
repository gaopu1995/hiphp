<?php
/**
 * Project:      hiphp
 * File:         medooModel.php
 * Created by    gaopu
 * Time          2019/2/12 下午4:06
 */
namespace model;
use core\hi_medoo;

class medooModel extends hi_medoo
{
    function __construct()
    {
        $param['table'] = 'user';
        parent::__construct($param);
    }

    public function test($arr)
    {
        return $this->_db->insert($this->_table,$arr);
        //$account_id = $this->_db->id();
        //return $this->_db->select($this->_table,'*');
    }
}