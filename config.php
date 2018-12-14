<?php
$host = "localhost";
$db = "gucapp";
$username = "gucapp";
$password = 'gucapp2018';

$conn = new mysqli($host, $username,$password, $db);

if (mysqli_connect_errno()){
die("cannot connect to DB");
}
?>