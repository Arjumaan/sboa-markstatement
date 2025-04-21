<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Change Password </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <div class="img" align=top>
      <img src="sboa logo.png" height=150 width=100% alt="SBOA MAT HR SEC SCHOOL CBE-39"><br><br>
    </div>
    <div class="login_form_container">
      <div class="login_form" id="myform">
        <h2> Change Password </h2>
        <form action="fpnew.php" method="post">
        <div class="input_group">
        <i class="fa fa-user"></i>
          <input type="text" placeholder="Username" class="input_text" name="Uname" autocomplete="off" required>
        </div>
        <div class="input_group">
        <i class="fa fa-unlock-alt"></i>
          <input type="password" placeholder="New Password" class="input_text" name="UNpass" autocomplete="off" required>
        </div>
        <div class="input_group">
        <i class="fa fa-unlock-alt"></i>
          <input type="password" placeholder="Confirm Password" class="input_text" name="UNpass" autocomplete="off" required>
        </div>
        <div align="center">
          <input type="submit" value="Change Password" id="login_button" name="btn-login" onclick="sub()">
        </div>
      </form>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="login.js"></script>
  </body>
</html>
