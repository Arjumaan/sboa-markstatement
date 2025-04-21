<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title> Mark Table for Enrollment</title>
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
    <script type="text/javascript">
    function validateInput(inputField)
     {
      let inputValue = inputField.value.trim().toUpperCase();
      const validPattern=/^(0|([1-9][0-9]?)|100|AB)$/;

      if(!validPattern.test(inputValue)&&inputValue!=='A')
      {
        inputField.value='';
      }
     }

     $(document).ready(function () {
     	$('input').keyup(function (event) {
     		var input = $(this),
     			td = input.closest("td"),
     			next;

     		switch (e.which) {
     			case 37: next = td.prev().find("input"); break;
     			case 39: next = td.next().find("input"); break;
     			case 38: next = input.closest("tr").prev().find("td:eq(" + td.index() + ")").find("input"); break;
     			case 40: next = input.closest("tr").next().find("td:eq(" + td.index() + ")").find("input"); break;
     		}
     		if (next) {
     			next.focus();
     		}
     	});
     });

    </script>
 </head>
 <body align="center" background="bc5.png">
   <img src="sboa logo.png" height=200 width=100% alt="SBOA MAT HR SEC SCHOOL CBE-39">
    <h1><b><u><center>Mark Enrollment Table for 11th & 12th Students</u></b></h1></center>
    <form action="update.php" method="post">
    <table id="marktable" background="bc5.png" align="center">
    <?php
    require_once 'configure.php';

    $studclass = $_POST['studclass'];
    $studsec = $_POST['studsec'];
    $studexam = $_POST['studexam'];
    $studyear = $_POST['studyear'];
    echo "<font color='white'>";
    echo "<center>";
    echo "<h1> <font color=black> Upload Exam Marks for $studclass  $studsec </font></h1>";
    echo "<br><br>";

        $q = "SELECT student.NAME, student.ADNO, student.CLASS, student.SECTION, student.ROLLNO, student.GROUPS, student.LANGUAGE, marklist.EXAMINATION, marklist.YEAR, ";
        $q .= "ENG, LANG, PHY_ECO, CHE_ACC, ";
        $q .= " MAT_COM, BIO_CS_CA_BM FROM student LEFT JOIN marklist ON ";
        $q .= "student.ROLLNO = marklist.ROLLNO AND marklist.EXAMINATION = '$studexam' AND marklist.YEAR = '$studyear'";
        $q .= "WHERE student.CLASS = '$studclass' AND student.SECTION = '$studsec' ORDER BY ROLLNO";
        //query to retirve

    $result = mysqli_query($con, $q);
       if (mysqli_num_rows($result) > 0)
         echo "<input type='hidden' name='studclass' value='" . $studclass . "'>";
         echo "<input type='hidden' name='studsec' value='" . $studsec . "'>";
         echo "<input type='hidden' name='studexam' value='" . $studexam . "'>";
         echo "<input type='hidden' name='studyear' value='$studyear'>";

         echo"<tr>
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

#after taking the basic details in php the marks have to be entered in the form and resubmit to the same table in the database
   while ($rows = mysqli_fetch_array($result))
   {
       $studroll = $rows['ROLLNO'];
       $studadno = $rows['ADNO'];
       $studname = $rows['NAME'];
       $studclass = $rows['CLASS'];
       $studsec = $rows['SECTION'];
       $studgrp = $rows['GROUPS'];
       $studlang = $rows['LANGUAGE'];
       $lang = $rows['LANG'];
       $eng = $rows['ENG'];
       $mat_com = $rows['MAT_COM'];
       $che_acc = $rows['CHE_ACC'];
       $bio_cs_ca_bm = $rows['BIO_CS_CA_BM'];
       $phy_eco = $rows['PHY_ECO'];

       echo "<tr>";
        echo "<td>" . $studname . "</td>";
        echo "<td>" . $studadno . "</td>";
        echo "<td>" . $studclass . "</td>";
        echo "<td>" . $studsec . "</td>";
        echo "<td>" . $studroll . "</td>";
        echo "<td>" . $studgrp . "</td>";
        echo "<td>" . $studlang . "</td>";
        echo "<td>" . $studexam . "</td>";
        echo "<td>" . $studyear . "</td>";

        echo "<td><input type='text' size='7' name='eng[]' id='marktable100' value='$eng' maxlength='3' oninput = 'validateInput(this);' onkeypress = 'event(this);'></td>";
        echo "<td><input type='text' size='7' name='lang[]' id='marktable101' value='$lang' maxlength='3' oninput = 'validateInput(this);' onkeypress = 'event(this);'></td>";
        echo "<td><input type='text' size='7' name='phy_eco[]' id='marktable102' value='$phy_eco' maxlength='3' oninput = 'validateInput(this);' onkeypress = 'event(this);'></td>";
        echo "<td><input type='text' size='7' name='che_acc[]' id='marktable103' value='$che_acc' maxlength='3' oninput = 'validateInput(this);' onkeypress = 'event(this);'></td>";
        echo "<td><input type='text' size='7' name='mat_com[]' id='marktable104' value='$mat_com' maxlength='3' oninput = 'validateInput(this);' onkeypress = 'event(this);'></td>";
        echo "<td><input type='text' size='10' name='bio_cs_ca_bm[]' id='marktable105' value='$bio_cs_ca_bm' maxlength='3' oninput = 'validateInput(this);' onkeypress = 'event(this);'></td>";
        echo "<input type='hidden' name='rollno[]' value='" . $studroll . "'>";
        echo "<input type='hidden' name='adno[]' value='" . $studadno . "'>";
        echo "<input type='hidden' name='name[]' value='" . $studname . "'>";
        echo "<input type='hidden' name='group[]' value='" . $studgrp . "'>";
        echo "<input type='hidden' name='language[]' value='" . $studlang . "'>";
       echo "</tr>";
     }
     mysqli_close($con);
    ?>
  </table> <br>
    <!--  <h1><b><u><center><font color=black>Statistics Table</h1></b></u></center></font>
      <table  id="marktable" background="bc5.png" align="center">
        <tr>
          <th>Subject</th>
          <th>No.on Roll</th>
          <th>No.of Present</th>
          <th>No.of Absent</th>
          <th>Highest Mark</th>
          <th>Lowest Mark</th>
          <th>No.of Centums</th>
          <th>No.of Failures</th>
          <th>Class Average</th>
          <th>Pass %</th>
        </tr>
         /*
       $subject = array('English','Language',);

        foreach ($statistics as $value) {
            echo ' <tr> ';
            echo ' <td> $subject </td>';
            echo ' <td> $total_strength </td>';
            echo ' <td> $num_present </td>';
            echo ' <td> $num_absent </td>';
            echo ' <td> $highest_mark </td>';
            echo ' <td> $lowest_mark </td>';
            echo ' <td> $num_centums </td>';
            echo ' <td> $num_failures </td>';
            echo ' <td> $class_average </td>';
            echo ' <td> $pass_percentage </td>';
            echo ' </tr> ';
          }
            //getting proper data
                $totalMarks = (int)

                if ($totalMarks >= 0)
                {
                    $subjectStats['total_strength']++;
                    if ($totalMarks > 0)
                    {
                        $subjectStats['num_present']++;
                        if ($totalMarks > $subjectStats['highest_mark']) {
                            $subjectStats['highest_mark'] = $totalMarks;
                        }
                        if ($totalMarks < $subjectStats['lowest_mark']) {
                            $subjectStats['lowest_mark'] = $totalMarks;
                        }
                        if ($totalMarks < 35)
                        {
                            $subjectStats['num_failures']++;
                        }
                        if ($totalMarks == 100)
                        {
                            $subjectStats['num_centums']++;
                        }
                    }
                    else
                    {
                        $subjectStats['num_absent']++;
                    }
                    $subjectStats['total_marks'] += $totalMarks;
                }


            if ($subjectStats['num_present'] > 0)
            {
                $subjectStats['class_average'] = $subjectStats['total_marks'] / $subjectStats['num_present'];
                $subjectStats['pass_percentage'] = ($subjectStats['num_present'] - $subjectStats['num_failures']) / $subjectStats['num_present'] * 100;
            }
            else
            {
                $subjectStats['class_average'] = 0;
                $subjectStats['pass_percentage'] = 0;
            }

            $statistics[] = $subjectStats;

         */
      </table> -->
    </form>
      <br>
     <input type="submit" class="registerbtn" value="Submit" onclick="validate">
  </body>
</html>
