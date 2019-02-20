<?php
/**
 *   [Metlive!] (C)2001-2099 hiphp Inc.
 *   This is not a freeware, use is subject to license terms
 *
 *   $Id: function.php 1 2018-08-14 下午5:00:00Z gaopu $
 */

function debug() {
    if(func_num_args() >= 2) {
        $var = func_get_args();
    }else{
        $var = current(func_get_args());
    }
    echo '<pre>';
    $vardump = false;
    $vardump = empty($var) ? true : $vardump;
    if($vardump) {
        var_dump($var);
    } else {
        print_r($var);
    }
    exit();
}