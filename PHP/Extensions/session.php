<?php
session_start();
$sid = session_id();
$_SESSION[$sid] = 'this is test';
session_write_close();

var_dump($_SESSION);exit;