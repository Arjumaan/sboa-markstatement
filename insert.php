<html>
 <head>
    <title>STUDENTS RECORD</title>
    <style>
    :root {
    --arrow-bg: rgba(255, 255, 255, 0.3);
    --arrow-icon: url(https://upload.wikimedia.org/wikipedia/commons/9/9d/Caret_down_font_awesome_whitevariation.svg);
    --option-bg: white;
    --select-bg: rgba(255, 255, 255, 0.2);
    }
    body {
          place-items: center;
         }
         .img {
               align: top;
               width: 100%;
               height: 150;
              }
         #login_button{
             position: relative;
             width: 300px;
             height: 40px;
             transition: 1s;
             margin-top: 70px;
         }
         #login_button {
           align:center;
           font-size: 15px;
           color: black;
           letter-spacing: 1px;
             width: 20%;
             height: 5%;
             text-decoration: none;
             z-index: 10;
             cursor: pointer;
             font-size: 22px;
             letter-spacing: 2px;
             border: 1px solid #00ccff;
             border-radius: 50px;
             background-color:#87CEEB;
             display: flex;
             justify-content: center;
             align-items: center;
         }

    </style>
 </head>
 <body align="center" background = "bc5.png">
   <center>
     <div class="img">
         <img src="sboa logo.png" height=150 width=100% alt="SBOA MAT HR SEC SCHOOL CBE-39">
       </div>
        <h1><u><b> Marks are been Checking please wait :) </u></b></h1><br><br>
     <?php
        require_once 'configure.php';
        $studclass = $_POST['studclass'];
        $studsec = $_POST['studsec'];
        $studexam = $_POST['studexam'];
        $studyear = $_POST['studyear'];
        $q = "SELECT COUNT(*) AS count FROM marklist WHERE EXAMINATION = '$studexam' AND YEAR = '$studyear' AND CLASS = '$studclass' AND SECTION = '$studsec'";
        $result = mysqli_query($con, $q);
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];
            if ($count > 0) //not to commit duplication
             {
                echo "<h2>The Marks of $studexam exam already exist for these students. Click the below button to enter the MARKS <br>";
             }
            else
            {
$insert_query = "INSERT INTO marklist (ADNO, ROLLNO, CLASS, SECTION, GROUPS, LANGUAGE, EXAMINATION, YEAR, ENG, LANG, PHY_ECO, CHE_ACC, MAT_COM, BIO_CS_CA_BM)";
$insert_query .= "SELECT ADNO, ROLLNO, '$studclass', '$studsec', GROUPS, LANGUAGE, '$studexam', '$studyear', NULL, NULL, NULL, NULL, NULL, NULL FROM student ";
$insert_query .= "WHERE CLASS = '$studclass' AND SECTION = '$studsec'";
               if (mysqli_query($con, $insert_query))
                {
                    echo " <h2> Table is been created of class $studclass $studsec for $studexam in $studyear <br><br>";

                }
                else        //for checking if error in data base
                {
                    echo "Error inserting marks please contact admin" . mysqli_error($con) . "<br>";
                }

            }
         echo "<form method='post' action='marktable.php'>";
         echo "<input type='hidden' name='studclass' value='$studclass'>";
         echo "<input type='hidden' name='studsec' value='$studsec'>";
         echo "<input type='hidden' name='studexam' value='$studexam'>";
         echo "<input type='hidden' name='studyear' value='$studyear'>";
         echo "<input type='submit' id='login_button' value='Next Page'>";
         //header("Refresh:5; url=marktable.php");
         mysqli_close($con);
    ?>
  </center>
 </body>
</html>
