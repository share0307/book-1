<?php
require "./autoload.php";

use Mecha\Session\SessionHandler;
use Mecha\Database\DB;
use Mecha\Database\PdoConf;


$db = DB::connection('localTest');
$handler = new SessionHandler($db);
session_set_save_handler($handler, false);


session_start();
var_dump($_SESSION);exit;
