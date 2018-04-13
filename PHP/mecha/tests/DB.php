<?php
require "./autoload.php";

use Mecha\Database\DB;

$res = DB::selectFetchColumn('SELECT id FROM student WHERE studentId<:id LIMIT 1',[':id'=>10]);
var_dump($res);