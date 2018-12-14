<?php
include("funcs.php");


$token = $_REQUEST['token'];
if(strlen($token)!=64){ die("Invalid Token, please <a href=\"login.php\">relogin</a>");}

$loggedinid = getUserId();


    mysqli_query($conn,"UPDATE `users` SET `token`='' WHERE `id`='$loggedinid'");
echo "Logged out...";


?>