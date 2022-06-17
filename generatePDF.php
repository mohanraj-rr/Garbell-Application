<?php
require 'config.php';
if(!empty($_SESSION["id"])){

     $id = $_SESSION['id'];

     $sql="SELECT * FROM `gc_user` WHERE `gc_user`.`sv_id` like '$id' ORDER BY `gc_user`.`gc_id` ASC";

     $result = mysqli_query($conn,$sql);



     if(mysqli_num_rows($result) > 0)
                {
                  require("library/fpdf.php");

                  $pdf = new FPDf('p','mm','A4');
                  $pdf->AddPage();
                  $pdf->SetFont('Arial','B',14);

                  $pdf->cell(40,10,"GC-ID",1,0,'C');
                  $pdf->cell(50,10,"GC Name",1,0,'C');
                  $pdf->cell(50,10,"GC Address",1,0,'C');
                  $pdf->cell(50,10,"GC Phone",1,1,'C');

                  $pdf->SetFont('Arial','',12);


                  while($rows = mysqli_fetch_array($result))
                  {
                    $pdf->cell(40,10,$rows['gc_id'],1,0,'C');
                    $pdf->cell(50,10,$rows['gc_name'],1,0,'C');
                    $pdf->cell(50,10,$rows['gc_address'],1,0,'C');
                    $pdf->cell(50,10,$rows['gc_phone'],1,1,'C');
                  }

                  $pdf->Output();
                }
        else
             {
                  echo '<script>alert("No records....!")</script>';
  ?>
  <footer>
    <p>No record is entered! <br> so go and enter some gc_user!!!!!</p>
    <a href="index.php">home</a></p>
  </footer>
  <?php
  }
}
else{
  header("Location: login.php");
}
   ?>
