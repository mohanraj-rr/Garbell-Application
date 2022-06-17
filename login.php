<?php
require 'config.php';

if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $u_password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM sv_reglog WHERE sv_username = '$usernameemail' OR sv_email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);

  if(mysqli_num_rows($result) > 0){
    $password = md5($u_password);

    if($password == $row["sv_password"]){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered!! go and register'); </script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="./login_style.css">
</head>
<body>


    <h2>Login Page</h2><br>
    <div class="login">
    <form class="" action="" method="post" autocomplete="off">
        <label for="usernameemail">Username or Email : </label>
        <input type="text" name="usernameemail" id="usernameemail" required value=""><br>
        <br><br>
        <label><b>Password
        </b>
        </label>
        <input type="password" name="password" id="password" required value="">
        <br><br>

      <!--<input type="button" name="log" id="log" value="Log In Here">-->
        <!-- <br><br>
        <input type="checkbox" id="check">
        <span>Remember me</span>
        <br><br> -->
        <!-- <a href="/garbell-app/forgot.php">Forgot Password</a><br> -->
        <div align="right">
        <button class="button" type="submit" name="submit">Login</button></div>
    </form>
      <a class="button" href="registration.php">New? Register Here</a>

</div>
</body>
</html>
