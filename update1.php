<html>
  <head>
    <style>
      <style>
      table, tr, th, td
       {
        table-layout: fixed;
        border: 0px solid black;
        border-collapse: separate;
       }
      table
       {
        border-spacing: 10px;
        align-items: center;
        align-content: center;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
       }
      th
       {
        background-color: black;
        color: white;
        font-size: 20px;
       }
       td
        {
         background-color: white;
         color: black;
         font-size: 16px;
         /* font-weight: bold; */
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
        font-weight: bold;
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
  <body background = "bc5.png" align = "center">
        <form method="post" action="pdf1.php">
          <img src="sboa logo.png" height=150 width=100% alt="SBOA MAT HR SEC SCHOOL CBE-39">
    <?php
    require_once 'configure.php';

         $studclass = $_POST['studclass'];
         $studsec = $_POST['studsec'];
         $studexam = $_POST['studexam'];
         $studyear = $_POST['studyear'];

             echo "<h1><u><b> Upload Exam Marks for $studclass  $studsec </u></b></h1><br><br>";
    //data from exam_page2.php i.e marks
    $studname = $_POST['name'];
    $studadno = $_POST["adno"];
    $studroll = $_POST["rollno"];
    $eng = $_POST["eng"];
    $tam = $_POST["tam"];
    $mat = $_POST["mat"];
    $sci = $_POST["sci"];
    $soc_sci = $_POST["soc_sci"];
    //using for loop  it iterates over data and submit data
    for ($i = 0; $i < count($studroll); $i++)
        {
            $name = $studname[$i];
            $adno = $studadno[$i];
            $roll_no = $studroll[$i];
            $english_mark = $eng[$i];
            $tamil_mark = $tam[$i];
            $mat_mark = $mat[$i];
            $sci_mark = $sci[$i];
            $soc_sci_mark = $soc_sci[$i];
            //data are in array
            //query for update
$update_query = "UPDATE marklist2 SET ENG = '$english_mark', TAM = '$tamil_mark', MAT = '$mat_mark', SCI = '$sci_mark', SOC_SCI = '$soc_sci_mark' WHERE CLASS = '$studclass' AND SECTION = '$studsec' AND ROLLNO = '$roll_no' AND EXAMINATION = '$studexam' AND YEAR = '$studyear'";
                if (mysqli_query($con, $update_query))
                 {
                    echo "";
                 }
                 else
                 {
                      echo "Error updating marks: " . mysqli_error($con) . "<br>";
                  }
        }
            //to display the updated data
        $select_query= "SELECT student2.NAME, marklist2.ADNO, marklist2.ROLLNO, marklist2.CLASS, marklist2.SECTION, marklist2.EXAMINATION, marklist2.YEAR,
                        marklist2.ENG, marklist2.TAM, marklist2.MAT, marklist2.SCI, marklist2.SOC_SCI FROM student2, marklist2
                        WHERE student2.ROLLNO = marklist2.ROLLNO AND marklist2.EXAMINATION = '$studexam' AND marklist2.YEAR = '$studyear' AND marklist2.CLASS = '$studclass' AND marklist2.SECTION = '$studsec' ORDER BY ROLLNO";
                        #student2.CLASS = marklist2.CLASS AND student2.SECTION = marklist2.SECTION";
            $result = mysqli_query($con,$select_query);
                echo "<table id='marktable' background='bc5.png' width=100%> ";
                 echo "<tr>
                          <th>Name</th>
                          <th>Admission Number</th>
                          <th>Class</th>
                          <th>Section</th>
                          <th>Roll Number</th>
                          <th>Examination</th>
                          <th>Year</th>
                          <th>English</th>
                          <th>Tamil</th>
                          <th>Maths</th>
                          <th>Science</th>
                          <th>Social Science</th>
                        </tr>";
                     while ($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td>" . $row['NAME'] . "</td>";
                            echo "<td>" . $row['ADNO'] . "</td>";
                            echo "<td>" . $row['CLASS'] . "</td>";
                            echo "<td>" . $row['SECTION'] . "</td>";
                            echo "<td>" . $row['ROLLNO'] . "</td>";
                            echo "<td>" . $row['EXAMINATION'] . "</td>";
                            echo "<td>" . $row['YEAR'] . "</td>";
                            echo "<td>" . $row['ENG'] . "</td>";
                            echo "<td>" . $row['TAM'] . "</td>";
                            echo "<td>" . $row['MAT'] . "</td>";
                            echo "<td>" . $row['SCI'] . "</td>";
                            echo "<td>" . $row['SOC_SCI'] . "</td>";
                            echo "</tr>";
                        }
             echo "</table>";
     mysqli_close($con);

     echo "<input type='hidden' name='studclass' value='" . $studclass . "'>";
     echo "<input type='hidden' name='studsec' value='" . $studsec . "'>";
     echo "<input type='hidden' name='studexam' value='" . $studexam . "'>";
     echo "<input type='hidden' name='studyear' value='$studyear'>";

   ?>
        <br> <br>
        <div>
          <a href="cls&sec1.html"> <input type="button" class="registerbtn" value="ENTER MARKS FOR ANOTHER SUBJECT"> </a> <br>
        </div>
        <div>
          <input type="submit" class="registerbtn" value="GENERATE PDF"><br>
        </div>
        <div>
            <a href="sboa.html"> <input type="button" class="registerbtn" value="GO TO HOME PAGE"> </a>
        </div>
        <div>
            <a href="login.html"> <input type="button" class="registerbtn" value="LOGOUT"> </a>
        </div>
      </form>
  </body>
</html>
