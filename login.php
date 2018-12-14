<html>
    <form action="" method="POST">
  <div class="container">
    <h1>Login</h1>

    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
    
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>


    <button type="submit" class="registerbtn">Login</button>
  </div>


</form>
</html>
<?php
include("funcs.php");
if($_POST){
    
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = md5($_POST['psw']);
    
    if(checkCredentials($username,$password)){
        echo "Logged in<br>";
        $token = generateRandomString(64);
        
        
        mysqli_query($conn,"UPDATE `users` SET  `token`='$token' WHERE `username`='$username' and `password`='$password' LIMIT 1");
        
         echo "<a href=\"profile.php?token=$token\">Click here to go to your profile</a>";
    }
    else{
        echo "Invalid Credentials";
    }
}

?>