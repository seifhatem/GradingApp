<?php
include("funcs.php");

$token = $_REQUEST['token'];
if(strlen($token)!=64){ die("Invalid Token, please <a href=\"login.php\">relogin</a>");}
 $sth = mysqli_query($conn,"SELECT `id`, `firstname`, `lastname`, `role` FROM `users` WHERE `token`='$token' LIMIT 1");

if(mysqli_num_rows($sth)!=1){
    die("Invalid Token, please <a href=\"login.php\">relogin</a>");
}

while($r = mysqli_fetch_assoc($sth)) {
   $userid = $r['id'];
   $first = $r['firstname'];
   $last = $r['lastname'];
   $role = $r['role'];
}

echo "<b>Welcome</b> $first $last ($userid)<br>";
echo "<a target=\"_blank\" href=\"viewgrades.php?token=$token\">Click here to view grades</a><br>";
echo "<a target=\"_blank\" href=\"addgrade.php?token=$token\">Click here to enter grades</a><br>";
echo "<a target=\"_blank\" href=\"editgrades.php?token=$token\">Click here to edit grades</a><br>";
echo "<a href=\"logout.php?token=$token\">Logout</a><br>";

?>