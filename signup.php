<!DOCTYPE html>
<html>
 <head>
 </head>
 <body>
<?php
   require_once 'configure.php';
     $q= " INSERT INTO login (`Username`, `Email`, `Password`) VALUES ( ";
     $q=$q."'".$_POST['Uname']."',";
     $q=$q."'".$_POST['Uemail']."',";
     $q=$q."'".$_POST['Upass']."')";
   mysqli_query($con,$q);
   mysqli_close($con);
   echo"<script type='text/javascript'>alert(' your details are submitted successfully :)');window.location.href='login.html';</script>";
?>
</body>
</html>
