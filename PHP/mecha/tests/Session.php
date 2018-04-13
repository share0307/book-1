<?php
require "./autoload.php";

use Mecha\Session\SessionHandler;
use Mecha\Database\DB;

//$db = DB::connection();
//$session = new SessionHandler($db);
session_start();
echo strlen(session_id());