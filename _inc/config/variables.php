<?php 
// show all errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

// require stuff
require_once __DIR__.'\..\vendor\autoload.php';

$db = new SRC\DB('127.0.0.1', 'todooapp','root','');

$todoapp = new SRC\tododb($db);

//global variables
$base_url ="http://localhost/todoo/";