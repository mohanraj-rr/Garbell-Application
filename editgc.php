<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Garbage Collector</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<br><br>
<?php
   require 'config.php';
if(!empty($_SESSION["id"]))
{
  if(isset($_GET['edit'])){
  $edit_id = $_GET['edit'];

  $select = "SELECT * FROM `gc_user` WHERE `gc_id`='$edit_id'";

 $run = mysqli_query($conn,$select);
 $row_user = mysqli_fetch_array($run);

  $gc_name= $row_user['gc_name'];
  $gc_address= $row_user['gc_address'];
  $gc_phone= $row_user['gc_phone'];


}
}
else {
  header("Location: login.php");
}

  ?>

<div class="container">
  <h2>Edit Garbage Collector</h2>
  <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
      <label>ID No:</label>
      <input type="text" class="form-control" value="<?php echo $edit_id?>"  placeholder="Enter Id No" name="id" readonly>
    </div>
  <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" value="<?php echo $gc_name?>" placeholder="Enter Name" name="name">
    </div>
  <div class="form-group">
      <label>Address</label>
      <input type="text" class="form-control" value="<?php echo $gc_address?>" placeholder="Enter Address" name="address">
    </div>
  <div class="form-group">
      <label>Phone number:</label>
      <input type="tel" class="form-control" name="phone" value="<?php echo $gc_phone?>" placeholder="Enter Phone Number" pattern="[0-9]{10}" maxlength="10" required>
    </div>
  </div>

    <center> <input type="submit" name="insert-btn" class="btn btn-primary" /> </center>

  </form>
</div>
<?php

   // if(mysqli_connect_errno()){
   //     echo "connection fail";
   // }
   // else{
   //     echo "connection success";
   // }

   if(isset($_POST['insert-btn'])){

   $egc_id = $_POST['id'];
   $egc_name = $_POST['name'];
   $egc_address = $_POST['address'];
   $egc_phone = $_POST['phone'];


   $update = "UPDATE `gc_user` SET `gc_id`='$egc_id',`gc_name`='$egc_name',`gc_address`='$egc_address',`gc_phone`='$egc_phone' WHERE `gc_id`='$edit_id'";

   $run_update = mysqli_query($conn,$update);

   if( $run_update == true){
     echo
     "<script> alert('Data is updated correctly'); </script>";
   }else{
       echo
       "<script> alert('Failed, Try Again'); </script>";
   }

   }






?>
<br>
<br>
<center> <a class="btn btn-primary" href="viewgc.php">View GC</a> </center>
</body>
</html>
