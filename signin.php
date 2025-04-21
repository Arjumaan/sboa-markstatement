<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sign-Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="login.css" />
    <script>
    function sub()
    {
      if(document.getElementById("t1").value=="")
      {
        alert("Enter Username");
        return false;
      }
      elseif(document.getElementById("t2").value=="")
      {
        alert("Enter E-Mail");
        return false;
      }
      elseif(document.getElementById("t3").value=="")
      {
        alert("Enter Password");
        return false;
      }
      elseif(document.getElementById("t3").value != document.getElementById("t4"))
      {
        alert("Enter Correct Password");
        return false;
      }

        alert("You can Proceed Login");
        return true;


     }

    </script>
  </head>
  <body>
   <img src="sboa logo.png" height=150 width=100% alt="SBOA MAT HR SEC SCHOOL CBE-39">
    <div class="login_form_container">
      <div class="login_form">
        <h2> Sign-Up </h2>
        <form method="post" action="signup.php">
        <div class="input_group">
        <i class="fa fa-user"></i>
          <input type="text" placeholder="Username" class="input_text" name='Uname' id="t1" required/>
        </div>
        <div class="input_group">
        <i class="fa fa-envelope icon"></i>
          <input type="text" placeholder="E-Mail" class="input_text" name='Uemail' id="t2" required/>
        </div>
        <div class="input_group">
        <i class="fa fa-unlock-alt"></i>
          <input type="password" placeholder="Password" class="input_text" name='Upass' id="t3" required/>
        </div>
        <div align="center">
          <input type="submit" value="Create Account" id="login_button" name="btn-login" onclick="sub()">
        </div>
         <br><br>
        <div>
          <center> <a href="login.html"> Already have an account? Click here </a> </center>
        </div><br><br>
      </form>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="login.js"></script>
  </body>
</html>
