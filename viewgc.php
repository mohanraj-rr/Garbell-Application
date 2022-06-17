<!DOCTYPE html>
<html lang="en">
<head>
  <title>View GC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<br> <br> <br>
<center> <a class="btn btn-primary" href="index.php">back to home</a> </center>
<div class="container">
  <h2>View Garbage Collector</h2>
  <?php
   require 'config.php';

   if(!empty($_SESSION["id"])){
     if(isset($_GET['del'])){
        $del_id = $_GET['del'];
        $delete = "DELETE FROM `gc_user` WHERE gc_id='$del_id'";

        $run_delete = mysqli_query($conn,$delete);

        if($run_delete == true){
          echo
          "<script> alert('Record has been Deleted'); </script>";

     }else{
       echo
       "<script> alert('Failed, Try Again'); </script>";
     }
     }
   }
   else {
     header("Location: login.php");
   }
  ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>GC-ID No.</th>
        <th>Name</th>
        <th>Address</th>
        <th>phone number</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
    $conn = mysqli_connect('localhost','root','','garbell-app');
    $id = $_SESSION["id"];
    
    $select = "SELECT * FROM `gc_user` WHERE `sv_id` like '$id'";

    $run = mysqli_query($conn,$select);
    while($row_user = mysqli_fetch_array($run)){

     $gc_id = $row_user['gc_id'];
     $gc_name= $row_user['gc_name'];
     $gc_address= $row_user['gc_address'];
     $gc_phone= $row_user['gc_phone'];

    ?>
      <tr>
        <td><?php echo $gc_id?></td>
        <td><?php echo $gc_name?></td>
        <td><?php echo $gc_address?></td>
        <td><?php echo $gc_phone?></td>
        <td><a class="btn btn-danger" href="viewgc.php?del=<?php echo $gc_id?>">delete</a></td>
        <td><a class="btn btn-success" href="editgc.php?edit=<?php echo $gc_id?>">Edit</a></td>
      </tr>
      </tr>
    <?php
    }

    ?>
    </tbody>
  </table>
</div>

</body>
</html>
