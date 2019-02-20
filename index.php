<?php
/**
 *   [Metlive!] (C)2001-2099 hiphp Inc.
 *   This is not a freeware, use is subject to license terms
 *
 *   $Id: index.php 1 2018-08-13 下午6:39:39Z gaopu $
 */

ini_set('display_errors', 'on');//开启或关闭PHP异常信息
date_default_timezone_set('Asia/Shanghai');

define('FD_DS',     DIRECTORY_SEPARATOR);//定制目录符合
define('ROOT',      __DIR__ .               FD_DS);
define('CORE',      ROOT . 'core' .         FD_DS);
define('MODEL',     ROOT . 'model' .        FD_DS);
define('LIBS',      ROOT . 'libs' .         FD_DS);
define('CONFIG',    ROOT . 'config' .       FD_DS);
define('CTRL',      ROOT . 'controller' .   FD_DS);
define('LOGS',      ROOT . 'logs' .         FD_DS);
define('STATIC',    ROOT . 'static' .       FD_DS);

require_once(CORE . 'core.php');
require_once(CORE . 'route.php');

spl_autoload_register('\core\core::load');

require "vendor/autoload.php";

include LIBS . 'function.php';
\core\core::run();


