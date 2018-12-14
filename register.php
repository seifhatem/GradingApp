<html>
    <form action="" method="POST">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
    
        <label for="firstname"><b>First Name</b></label>
    <input type="text" placeholder="Enter first name" name="firstname" required>
    
        <label for="lastname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter last name" name="lastname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="role"><b>Role</b></label>
<select name="role">
  <option value="1">Student</option>
  <option value="2">TA</option>
  <option value="3">Lecturer</option>
</select>

    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
</html>
<?php
include("funcs.php");
if($_POST){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = md5($_POST['psw']);
    $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
    $role = mysqli_real_escape_string($conn,$_POST['role']);
    

    if(register($username,$firstname,$lastname,$password,$role)){
        echo "Registered Succesfully";
    }
    else{
        echo "Registration Failed";
    }
}

?>