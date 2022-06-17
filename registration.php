<?php
require 'config.php';

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM sv_reglog WHERE sv_username = '$username' OR sv_email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){



      if($_FILES["image"]["error"] == 4){
        echo
        "<script> alert('Image Does Not Exist'); </script>"
        ;
      }
      else{
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if ( !in_array($imageExtension, $validImageExtension) ){
          echo
          "
          <script>
            alert('Invalid Image Extension');
          </script>
          ";
        }
        else if($fileSize > 1000000){
          echo
          "
          <script>
            alert('Image Size Is Too Large');
          </script>
          ";
        }
        else{
          $randomNum=substr(str_shuffle("0123456789"), 0, 2);
          $newImageName = "supervisor".$randomNum;
          $newImageName .= '.' . $imageExtension;

          $password_encrypt=md5($password);

          move_uploaded_file($tmpName, 'img/' . $newImageName);
          $query = "INSERT INTO sv_reglog VALUES('','$name','$username','$email','$newImageName','$password_encrypt')";
          mysqli_query($conn, $query);
          echo
          "<script> alert('Registration Successful'); </script>";
        }
      }
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <link rel="stylesheet" type="text/css" href="./registration_style.css">
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>
    <h2>Registration</h2>
    <div class="reg">
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
      <label for="name">Name : </label>
      <input type="text" name="name" id = "name" required value=""> <br><br>
      <label for="username">Username : </label>
      <input type="text" name="username" id = "username" required value=""> <br><br>
      <label for="image">Image : </label>
      <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br><br>
      <label for="email">Email : </label>
      <input type="email" name="email" id = "email" required value=""> <br><br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""><br> <br>
      <label for="confirmpassword">Confirm Password : </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br><br>
      <button class="button button1" type="submit" name="submit">Register</button>
      <div align="right">
      <button class="button button1">
      <a href="login.php">Login</a></button>
    </div>
    </form>
    <br>

</div>
  </body>
</html>
