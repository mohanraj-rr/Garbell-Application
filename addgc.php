<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add Garbage Collector</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

  <br><br>

  <div class="container">
    <h2>Add Garbage Collector</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Name:</label>
        <input type="text" class="form-control" placeholder="Enter Name" name="name">
      </div>
      <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" placeholder="Enter Address" name="address">
      </div>
      <div class="form-group">
        <label>Phone number:</label>
        <input type="tel" class="form-control" name="phone" placeholder="Enter Phone Number" pattern="[0-9]{10}" maxlength="10" required>
      </div>
  </div>


  <center> <input type="submit" name="insert-btn" class="btn btn-primary" /> </center>
<br><br>
  <center> <a class="btn btn-primary" href="index.php">back to home</a> </center>

  </form>
  </div>

</body>

</html>

<?php
require 'config.php';
// if(mysqli_connect_errno()){
//     echo "connection fail";
// }
// else{
//     echo "connection success";
// }
if(!empty($_SESSION["id"])){
  if (isset($_POST['insert-btn'])) {
    $randomNum=substr(str_shuffle("0123456789"), 0, 3);
    $idno = "GC".$randomNum;
    $sv_id = $_SESSION["id"];
    $gc_idno = $idno;
    $gc_uname = $_POST['name'];
    $gc_address = $_POST['address'];
    $gc_phone = $_POST['phone'];


    $insert = "INSERT INTO `gc_user`(`sv_id`,`gc_id`, `gc_name`, `gc_address`, `gc_phone`)
           VALUES ('$sv_id','$gc_idno','$gc_uname','$gc_address','$gc_phone')";

    $run_insert = mysqli_query($conn, $insert);

    if ($run_insert == true) {
      echo
      "<script> alert('Data Inserted Successfully'); </script>";

    } else {
      "<script> alert('Failed, Try Again'); </script>";
    }

  }

}
else {
  header("Location: login.php");
}


?>
