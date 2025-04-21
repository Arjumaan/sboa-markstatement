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
          <form method="post" action="pdf.php">
          <img src="sboa logo.png" height=200 width=100% alt="SBOA MAT HR SEC SCHOOL CBE-39">
          <table id='marktable' align="center" background='bc5.png' width=100%>
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
    $studgrp = $_POST["group"];
    $studlang = $_POST["language"];
    $eng = $_POST["eng"];
    $lang = $_POST["lang"];
    $phy_eco = $_POST["phy_eco"];
    $che_acc = $_POST["che_acc"];
    $mat_com = $_POST["mat_com"];
    $bio_cs_ca_bm = $_POST["bio_cs_ca_bm"];

    //using for loop  it iterates over data and submit data
    for ($i = 0; $i < count($studroll); $i++)
        {

            $name = $studname[$i];
            $adno = $studadno[$i];
            $group = $studgrp[$i];
            $language = $studlang[$i];
            $roll_no = $studroll[$i];
            $english_mark = $eng[$i];
            $language_mark = $lang[$i];
            $phy_eco_mark = $phy_eco[$i];
            $che_acc_mark = $che_acc[$i];
            $mat_com_mark = $mat_com[$i];
            $bio_cs_ca_bm_mark = $bio_cs_ca_bm[$i];

            //data are in array
            //query for update
$update_query = "UPDATE marklist SET ENG = '$english_mark', LANG = '$language_mark', PHY_ECO = '$phy_eco_mark', CHE_ACC = '$che_acc_mark', MAT_COM = '$mat_com_mark', BIO_CS_CA_BM = '$bio_cs_ca_bm_mark' WHERE CLASS = '$studclass' AND SECTION = '$studsec' AND ROLLNO = '$roll_no' AND EXAMINATION = '$studexam' AND YEAR = '$studyear' ";
                if (mysqli_query($con, $update_query))
                 {
                    echo "";
                 }
                 else
                 {
                      echo "Error updating marks:" . mysqli_error($con) . "<br>";
                  }
        }
            //to display the updated data
        $select_query= "SELECT student.NAME, marklist.ADNO, marklist.ROLLNO, marklist.CLASS, marklist.SECTION, marklist.GROUPS, student.LANGUAGE, marklist.EXAMINATION, marklist.YEAR,
                        marklist.ENG, marklist.LANG, marklist.PHY_ECO, marklist.CHE_ACC, marklist.MAT_COM, marklist.BIO_CS_CA_BM FROM student, marklist
                        WHERE student.ROLLNO = marklist.ROLLNO AND marklist.EXAMINATION = '$studexam' AND marklist.YEAR = '$studyear' AND marklist.CLASS = '$studclass' AND marklist.SECTION = '$studsec' ORDER BY ROLLNO ";
            $result = mysqli_query($con,$select_query);
                 echo "<tr>
                          <th>Name</th>
                          <th>Admission Number</th>
                          <th>Class</th>
                          <th>Section</th>
                          <th>Roll Number</th>
                          <th>Group</th>
                          <th>Second Lang</th>
                          <th>Examination</th>
                          <th>Year</th>
                          <th>English</th>
                          <th>Language</th>
                          <th>Phy/Eco</th>
                          <th>Chem/Acc</th>
                          <th>Mat/Com</th>
                          <th>Bio/CS/CA/BM</th>
                        </tr>";
                     while ($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td>" . $row['NAME'] . "</td>";
                            echo "<td>" . $row['ADNO'] . "</td>";
                            echo "<td>" . $row['CLASS'] . "</td>";
                            echo "<td>" . $row['SECTION'] . "</td>";
                            echo "<td>" . $row['ROLLNO'] . "</td>";
                            echo "<td>" . $row['GROUPS'] . "</td>";
                            echo "<td>" . $row['LANGUAGE'] . "</td>";
                            echo "<td>" . $row['EXAMINATION'] . "</td>";
                            echo "<td>" . $row['YEAR'] . "</td>";
                            echo "<td>" . $row['ENG'] . "</td>";
                            echo "<td>" . $row['LANG'] . "</td>";
                            echo "<td>" . $row['PHY_ECO'] . "</td>";
                            echo "<td>" . $row['CHE_ACC'] . "</td>";
                            echo "<td>" . $row['MAT_COM'] . "</td>";
                            echo "<td>" . $row['BIO_CS_CA_BM'] . "</td>";
                            echo "</tr>";
                        }
             //echo "";
     mysqli_close($con);

     echo "<input type='hidden' name='studclass' value='$studclass'>";
     echo "<input type='hidden' name='studsec' value='$studsec'>";
     echo "<input type='hidden' name='studexam' value='$studexam'>";
     echo "<input type='hidden' name='studyear' value='$studyear'>";

   ?>
   </table>
        <br> <br>
            <div>
              <a href="cls&sec.html"> <input type="button" class="registerbtn" value="ENTER MARKS FOR ANOTHER SUBJECT"> </a> <br>
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
