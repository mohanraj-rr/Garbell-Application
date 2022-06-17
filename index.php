<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM sv_reglog WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="index_style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #CFEABD;
      height: 100%;
    }

    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;}
    }
  </style>

    <title>Index</title>

  </head>
  <body>
    <div align="left">
  	 <img src="img/logo.png" class="logo"></div>



<div class="navigation">

 <a class="button" href="logout.php">
   <img src="img/loo.png">
 <div class="logout">LOGOUT</div>

 </a>

</div>



    </div>
    <!-- <div align="right">  <input type="button" onclick="location.href='garbell-app/logout.php';" value="Logout" /></div> -->
    <div align="center">
    <h1>Welcome <?php echo $row["sv_name"]; ?></h1>
    <h2><img src="img/<?php echo $row["sv_image"]; ?>" width = 200><h2>

      <!-- <div id="myDIV"> -->


    <!-- <ul class="nav nav-pills nav-stacked">

      <li><a href="garbell-app/addgc.php">Add Garbage Collector</a></li>
      <li><a href="garbell-app/viewgc.php">View & Edit Garbage Collector</a></li>
      <li><a href="garbell-app/generatePDF.php">Generate PDF</a></li>
      <li><a href="garbell-app/logout.php">Logout</a></li>

    </ul> -->
    <div class="button-images">
            <div class="one_fourth">
            	<div class="button-container">
           		  <a href="addgc.php"><h6>Add Garbage Collector</h6></a>
               		<img src="img/bin.png" />
                </div>
            </div>
              <div class="one_fourth">
            	<div class="button-container">
           		  <a href="viewgc.php"><h6>View & Edit GC</h6></a>
               		<img src="img/recycle.png" />
                </div>
            </div>
               <div class="one_fourth">
            	<div class="button-container">
           		  <a href="generatePDF.php"><h6>Generate PDF</h6></a>
              <div class="button-image"> 		<img src="img/pdf.png"/></div>
                </div>
            </div>



    	<div class="clearboth"></div>
        </div>
  </div>
  </div>
  <!-- <div align="center">
  <div id="scroll-container">
    <div id="scroll-text">
    <h5>  Major metropolitan cities like Delhi, Mumbai, Chennai, Hyderabad, Bengaluru and Kolkata generate about 10 million tonnes of garbage every day!</h5>
    </div>
  </div> -->
</div>




  </body>
</html>
