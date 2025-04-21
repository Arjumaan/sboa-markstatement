<?php
   require_once 'configure.php';
   $ps = $_POST['UNpass'];
   $un = $_POST['Uname'];

     $q= "UPDATE login SET Password= '$ps' WHERE Username = '$un' ";
   mysqli_query($con,$q);
   mysqli_close($con);
   echo"<script type='text/javascript'>alert(' Password Changed successfully :)');window.location.href='login.html';</script>";
?>
