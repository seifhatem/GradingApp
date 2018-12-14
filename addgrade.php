<html>
    <form action="" method="POST">
  <div class="container">
    <h1>Enter Grade</h1>

    <hr>

    <label for="studentid"><b>Student ID</b></label>
    <input type="text" placeholder="Student ID" name="studentid" required>
    
    <label for="courseid"><b>Course ID</b></label>
    <input type="text" placeholder="Course ID" name="courseid" required>
    
        <label for="grade"><b>Grade</b></label>
    <input type="text" placeholder="Grade" name="grade" required>


    <button type="submit" class="registerbtn">Add</button>
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
$grade = mysqli_real_escape_String($conn,$_POST['grade']);

if(!isAllowedToAdd($loggedinid)){die("Not Allowed");}
if(isGradeAlreadyPublished($studentid,$courseid)){die("Grade already published, please <a  href=\"editgrades.php?token=$token\">click here to edit grades</a>");}

    mysqli_query($conn,"INSERT INTO `grades`(`studentid`, `courseid`, `grade`, `addedby`) VALUES ('$studentid','$courseid','$grade','$loggedinid')");
echo "Grade Added";

}
?>