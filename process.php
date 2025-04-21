<?php
     require_once 'configure.php';

   if(isset($_POST['btn-login']))
   {
     $Uname = $_POST['Uname'] or $_POST['Uemail'];
    $Pass = $_POST['Upass'];

      if(empty($Uname) || empty($Pass))
       {
          echo"<script type='text/javascript'>alert(' Wrong data');window.location.href='login.html';</script>";
       }
      else
       {
          $query = " select * from login where Username='$Uname' or Email='$Uname'";
          $result = mysqli_query($con,$query);

            if($row=mysqli_fetch_array($result))
            {
              $password = $row['Password'];

              if($Pass == $password)
              {
                header("location:sboa.html");
              }
              else
              {
              echo"<script type='text/javascript'>alert('Incorrect Data');window.location.href='login.html';</script>";
              }

            }
            else
            {
            echo"<script type='text/javascript'>alert(' Wrong data');window.location.href='login.html';</script>";
            }
       }
   }
   mysqli_close($con);
 ?>
