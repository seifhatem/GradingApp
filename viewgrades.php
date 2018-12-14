<html>
    <form action="" method="POST">
  <div class="container">
    <h1>Check Grades</h1>

    <hr>

    <label for="studentid"><b>Student ID</b></label>
    <input type="text" placeholder="Student ID" name="studentid" required>
    
    <label for="courseid"><b>Course ID</b></label>
    <input type="text" placeholder="Course ID" name="courseid" required>


    <button type="submit" class="registerbtn">View</button>
  </div>


</form>
</html>

<?php
if($_POST){
include("funcs.php");


$token = $_REQUEST['token'];
if(strlen($token)!=64){ die("Invalid Token, please <a href=\"login.php\">relogin</a>");}

isLoggedIn();

$loggedinid = getUserId();

$studentid = mysqli_real_escape_String($conn,$_POST['studentid']);
$courseid = mysqli_real_escape_String($conn,$_POST['courseid']);

if(!isAllowedToCheck(getUserId(),$_POST['studentid'])){die("Not Allowed");}
if(!isGradeAlreadyPublished($studentid,$courseid)){die("Grade not published!");}


    $sth = mysqli_query($conn,"SELECT * FROM `grades` WHERE `studentid`='$studentid' and `courseid`='$courseid' LIMIT 1");
      while($r = mysqli_fetch_assoc($sth)) {
  
      $studentid = $r['studentid'];
      $courseid = $r['courseid'];
      $addedby = $r['addedby'];
      $grade = $r['grade'];

  
  echo "Student: $studentid<br>Course ID: $courseid<br>Grade: $grade<br>Added By: $addedby";
}

}

?>