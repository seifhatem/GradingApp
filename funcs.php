<?php
include("config.php");


function isLoggedIn(){
    global $conn,$token; 
  
 $sth = mysqli_query($conn,"SELECT `id` FROM `users` WHERE `token`='$token' LIMIT 1");

if(mysqli_num_rows($sth)!=1){
    die("Invalid Token, please <a href=\"login.php\">relogin</a>");
}


}

function getUserId(){
    global $conn,$token; 
  
 if(strlen($token)!=64){die("");}
   $q = mysqli_query($conn,"SELECT `id` FROM `users` WHERE `token`='$token' LIMIT 1");
  while($r = mysqli_fetch_assoc($q)) {
  
      $userid = $r['id'];
  }
   return $userid;
}

function isAllowedToAdd($userid){
    global $conn; 
        $sth = mysqli_query($conn,"SELECT `role` FROM `users` WHERE `id`='$userid' LIMIT 1");

while($r = mysqli_fetch_assoc($sth)) {
   $role = $r['role'];
}

if($role!="3"){return false;}
return true;
}

function isAllowedToCheck($userid,$studentid){
    global $conn; 
        $sth = mysqli_query($conn,"SELECT `role` FROM `users` WHERE `id`='$userid' LIMIT 1");

while($r = mysqli_fetch_assoc($sth)) {
   $role = $r['role'];
}

if($role=="1" && $userid!=$studentid){return false;}
return true;
}

function isAllowedToAlter($userid){
    global $conn; 
        $sth = mysqli_query($conn,"SELECT `role` FROM `users` WHERE `id`='$userid' LIMIT 1");

while($r = mysqli_fetch_assoc($sth)) {
   $role = $r['role'];
}

if($role=="3"){return true;}
return false;
}


function isGradeAlreadyPublished($studentid,$courseid){
    global $conn; 
        $sth = mysqli_query($conn,"SELECT * FROM `grades` WHERE `studentid`='$studentid' and `courseid`='$courseid'");

if(mysqli_num_rows($sth)!=0){
    return true;
}
return false;
}

function register($username,$firstname,$lastname,$password,$role){
    global $conn; 

        $sth = mysqli_query($conn,"INSERT INTO `users`(`username`, `password`, `firstname`, `lastname`, `role`) VALUES ('$username','$password','$firstname','$lastname','$role')");

if(mysqli_affected_rows($conn)==1){
    return true;
}
return false;
}

function addGrade($studentid,$courseid,$grade,$userid){
    global $conn; 
       mysqli_query($conn,"INSERT INTO `grades`(`studentid`, `courseid`, `grade`, `addedby`) VALUES ('$studentid','$courseid','$grade','$userid')");
}

function editGrade($studentid,$courseid,$grade,$userid){
    global $conn; 
       mysqli_query($conn,"UPDATE `grades` SET `grade`='$grade',`addedby`='$userid' WHERE `studentid`='$studentid' and `courseid`='$courseid' ");
}

function checkGrade($studentid,$courseid){
    global $conn; 
       mysqli_query($conn,"SELECT `studentid`, `courseid`, `grade`, `addedby` FROM `grades` WHERE `studentid`='$studentid' and `courseid`='$courseid'");
       
       while($r = mysqli_fetch_assoc($sth)) {
   $courseid = $r["courseid"];
    $studentid = $r["studentid"];
    $grade = $r["grade"];
    $addedby = $r["addedby"];
}
echo "Student ID: $studentid<br>Course ID: $courseid<br>Grade: $grade<br>Added By: $addedby";
}


function generateRandomString($length) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function checkCredentials($username,$password){
   
    global $conn; 
    

    
    $sth = mysqli_query($conn,"SELECT `id`, `firstname`, `lastname`, `role` FROM `users` WHERE `username`='$username' and `password`='$password' LIMIT 1");

while($r = mysqli_fetch_assoc($sth)) {
   $userid = $r['id'];
   $first = $r['firstname'];
   $last = $r['lastname'];
   $role = $r['role'];
}


if(strlen($userid)<1){
    return false;
}
else
{
    return true; 
}

}
?>