<!DOCTYPE html>
<html lang="en">
  <head>
     <title> Mark receiving and posting statement </title>
     <style>
       table, tr, th, td
        {
         table-layout: fixed;
         border: 1px solid black;
         border-collapse: separate;
        }
       table
        {
         border-spacing: 8px;
         width: 50%;
         align-items: center;
         align-content: center;
         box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
       th
        {
         background-image: url(bc1.png);
         color: black;
         font-size: 18px;
         font-weight: bold;
         font-style: italic;
        }
        td
         {
          background-image: url(bc1.png);
          color: black;
          font-size: 18px;
         }
       .b
        {
         padding: 2px 15px;
         border-radius: 10px;
       }
       .b:active
       {
         transform: scale(0.98);
       }
       .b:hover
       {
         background-color: black;
         color: white;
       }
       .registerbtn {
         background-color: #87CEEB;
         color: black;
         font-weight: bolder;
         padding: 16px 20px;
         margin: 8px 0;
         border: none;
         cursor: pointer;
         width: 100%;
         opacity: 0.9;
       }
       .registerbtn:hover {
         opacity: 1;
       }
      </style>
  </head>
  <body background="bc4.png" width=100% align="center">
     <img src="sboa logo.png" height=150 width=100% alt="SBOA MAT HR SEC SCHOOL CBE-39">
     <h1> You Have successfully Registered </h1>
     <p><b> Your Basic details have been stored to database. First enter all the students Name,
     Adno, Class, Rollno one by one. You will be directed to the following pages. </p></b>
     <p><b> Click the following links to enter your students mark. </p></b><br>

    <?php
    //for displaying the students details
    $name = strtoupper($_POST["name"]);
    $adno = $_POST["adno"];
    $class = $_POST["class"];
    $sec = strtoupper($_POST["sec"]);
    $rollno = $_POST["rollno"];
    $group = strtoupper($_POST["group"]);
    $language = strtoupper($_POST["language"]);

     echo "<h2> Student Data  </h2>";
     echo "<table border='1' align='center' width='30%'>";
     echo "<tr>
             <th>Name</th>
             <td>$name</td>
           </tr>
           <tr>
             <th>ADNO</th>
             <td>$adno</td>
           </tr>
           <tr>
             <th>Class</th>
             <td>$class</td>
           </tr>
           <tr>
             <th>Section</th>
             <td>$sec</td>
           </tr>
           <tr>
             <th>Rollno</th>
             <td>$rollno</td>
           </tr>
           <tr>
             <th>Groups</th>
             <td>$group</td>
           </tr>
           <tr>
             <th>Language</th>
             <td>$language</td>
           </tr>";
     echo "</table> <br><br><br>"    ;
    //only inserting data of students and mark is inserted in another form
      require_once 'configure.php';
        $q= "INSERT INTO student values('$name','$adno','$class','$sec','$rollno','$group','$language')";
      mysqli_query($con,$q);
      mysqli_close($con);
    ?>

    <div>
      <a href="sendme.html"> <input type="button" class="registerbtn" value="RE-ENTER DATA FOR STUDENTS"> </a> <br>
    </div>
    <div>
      <a href="cls&sec.html"> <input type="button" class="registerbtn" value="ENTER MARKS FOR SUBJECT"> </a> <br>
    </div>
    </center>
    <div>
        <a href="sboa.html"> <input type="button" class="registerbtn" value="GO TO HOME PAGE"> </a>
    </div>
  </body>
</html>
