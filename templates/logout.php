<?php
session_start();
require 'functions2.php';

$id_user = $_SESSION["loginsubmit"];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
$row = mysqli_fetch_assoc($result);

$log =  $row["user_username"] .= " logout dari sistem" ;
            act_log($log);

$_SESSION = [];
session_unset();
session_destroy();

setcookie('id', '', time()-3600);
setcookie('key', '', time()-3600);

header("Location: login.php");
exit;

?>
