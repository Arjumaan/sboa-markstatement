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
        color: white;
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
    </script>
 </head>
 <body align="center" background="bc5.png">
   <img src="sboa logo.png" height=200 width=100% alt="SBOA MAT HR SEC SCHOOL CBE-39">
    <h1><b><center><u>Mark Enrollment Table For 1st - 10th std Students</u></b></h1></center>
    <form action="update1.php" method="post">
    <table id="marktable1" background="bc5.png" align="center">
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

        $q = "SELECT student2.NAME, student2.ADNO, student2.CLASS, student2.SECTION, student2.ROLLNO,  marklist2.EXAMINATION, marklist2.YEAR,";
        $q .= "ENG, TAM, MAT, SCI, ";
        $q .= " SOC_SCI FROM student2 LEFT JOIN marklist2 ON ";
        $q .= "student2.ROLLNO = marklist2.ROLLNO AND marklist2.EXAMINATION = '$studexam' AND marklist2.YEAR = '$studyear'";
        $q .= "WHERE student2.CLASS = '$studclass' AND student2.SECTION = '$studsec' ORDER BY ROLLNO";
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
                  <th>Examination</th>
                  <th>Year</th>
                  <th>English</th>
                  <th>Tamil</th>
                  <th>Maths</th>
                  <th>Science</th>
                  <th>Social Science</th>
                </tr>";

#after taking the basic details in php the marks have to be entered in the form and resubmit to the same table in the database
   while ($rows = mysqli_fetch_array($result))
   {
       $studroll = $rows['ROLLNO'];
       $studadno = $rows['ADNO'];
       $studname = $rows['NAME'];
       $studclass = $rows['CLASS'];
       $studsec = $rows['SECTION'];
       $eng = $rows['ENG'];
       $tam = $rows['TAM'];
       $mat = $rows['MAT'];
       $sci = $rows['SCI'];
       $soc_sci = $rows['SOC_SCI'];

       echo "<tr>";
        echo "<td>" . $studname . "</td>";
        echo "<td>" . $studadno . "</td>";
        echo "<td>" . $studclass . "</td>";
        echo "<td>" . $studsec . "</td>";
        echo "<td>" . $studroll . "</td>";
        echo "<td>" . $studexam . "</td>";
        echo "<td>" . $studyear . "</td>";

        echo "<td><input type='text' size='7' maxlength='3' name='eng[]' value='$eng' oninput = 'validateInput(this)'></td>";
        echo "<td><input type='text' size='7' maxlength='3' name='tam[]' value='$tam' oninput = 'validateInput(this)'></td>";
        echo "<td><input type='text' size='7' maxlength='3' name='mat[]' value='$mat' oninput = 'validateInput(this)'></td>";
        echo "<td><input type='text' size='7' maxlength='3' name='sci[]' value='$sci' oninput = 'validateInput(this)'></td>";
        echo "<td><input type='text' size='7' maxlength='3' name='soc_sci[]' value='$soc_sci' oninput = 'validateInput(this)'></td>";
        echo "<input type='hidden' name='rollno[]' value='" . $studroll . "'>";
        echo "<input type='hidden' name='adno[]' value='" . $studadno . "'>";
        echo "<input type='hidden' name='name[]' value='" . $studname . "'>";
       echo "</tr>";
     }
mysqli_close($con);
      ?>
      </table>
    </form>
      <br>
     <input type="submit" class="registerbtn" value="Submit">
  </body>
</html>
