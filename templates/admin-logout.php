<?php
require 'functions2.php';

session_start();

session_unset();
session_destroy();

$log =  "Admin berhasil log out" ;
act_log($log);

header("Location: admin-login.php");
exit;


?>
