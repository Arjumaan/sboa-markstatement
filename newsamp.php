<?php
require('fpdf/fpdf.php');

class PDF extends FPDF {
    private $title;

    function Header()
    {
        $this->Image('sboa.png', 40, 6, 25, 0, 'png');
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 15, 'SBOA MAT & HR SEC SCHOOL', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(0, 24, $this->title, 0, 1, 'C');
        $this->SetFont('Arial', 'B', 14);
        $this->Ln(0);
    }

    function SetTitle($title, $isUTF8 = false) {
        $this->title = $title;
    }

    function AddMarksTable($data) {
        $this->AddPage('L', 'A4');

        $this->SetFont('Arial', 'B', 20);
        $this->Cell(0, 5, "Student's Markslist", 0, 1, 'C');
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 14);
        $this->SetFillColor(173, 216, 230);
        $this->Cell(20, 10, 'Rollno', 1, 0, 'C', TRUE);
        $this->Cell(68, 10, 'Name', 1, 0, 'C', TRUE);
        $this->Cell(25, 10, 'Language', 1, 0, 'C', TRUE);
        $this->Cell(15, 10, 'Eng', 1, 0, 'C', TRUE);
        $this->Cell(15, 10, 'Lang', 1, 0, 'C', TRUE);
        $this->Cell(23, 10, 'Phy/Eco', 1, 0, 'C', TRUE);
        $this->Cell(23, 10, 'Che/Acc', 1, 0, 'C', TRUE);
        $this->Cell(23, 10, 'Mat/Com', 1, 0, 'C', TRUE);
        $this->Cell(38, 10, 'Bio/CS/CA/BM', 1, 0, 'C', TRUE);
        $this->Cell(15, 10, 'Total', 1, 0, 'C', TRUE);
        $this->Cell(15, 10, 'Avg', 1, 1, 'C', TRUE);

        $this->SetFont('Arial', '', 12);

        $subjectMarks = array(
            'ENG',
            'LANG',
            'PHY_ECO',
            'CHE_ACC',
            'MAT_COM',
            'BIO_CS_CA_BM',
        );

        foreach ($data as $row)
        {
            $totalMarks = 0;
            $subjectCount = 0;

            foreach ($subjectMarks as $subject)
            {
                if ($row[$subject] !== 'AB')
                {
                    $totalMarks += (int)$row[$subject];
                    $subjectCount++;
                }
            }

            $averageMarks = $subjectCount > 0 ? $totalMarks / $subjectCount : 0;

            // for ENGLISH
            if ($row['ENG'] < 35 ) {
              $this->SetFillColor(255,115,115);
              $this->Cell(20, 10, $row['ROLLNO'], 1, 0, 'C', FALSE);
              $this->Cell(68, 10, $row['NAME'], 1, 0, 'C', FALSE);
              $languageCode = ($row['LANGUAGE'] == 'T') ? 'T' : 'F';
              $this->Cell(25, 10, $languageCode, 1, 0, 'C', FALSE);
              $this->Cell(15, 10, $row['ENG'], 1, 0, 'C', TRUE);
            }
            else {
              $this->SetFillColor(255, 255, 255);
              $this->Cell(20, 10, $row['ROLLNO'], 1, 0, 'C', FALSE);
              $this->Cell(68, 10, $row['NAME'], 1, 0, 'C', FALSE);
              $languageCode = ($row['LANGUAGE'] == 'T') ? 'T' : 'F';
              $this->Cell(25, 10, $languageCode, 1, 0, 'C', FALSE);
              $this->Cell(15, 10, $row['ENG'], 1, 0, 'C', TRUE);
            }
            //for LANGUAGE
            if ( $row['LANG'] < 35) {
              $this->SetFillColor(255,115,115);
              $this->Cell(15, 10, $row['LANG'], 1, 0, 'C', TRUE);
            }
            else {
              $this->SetFillColor(255, 255, 255);
              $this->Cell(15, 10, $row['LANG'], 1, 0, 'C', TRUE);
            }
            //for PHY_ECO
            if ( $row['PHY_ECO'] < 35) {
              $this->SetFillColor(255,115,115);
              $this->Cell(23, 10, $row['PHY_ECO'], 1, 0, 'C', TRUE);
            }
            else {
              $this->SetFillColor(255, 255, 255);
              $this->Cell(23, 10, $row['PHY_ECO'], 1, 0, 'C', TRUE);
            }
            //for CHE_ACC
            if ( $row['CHE_ACC'] < 35) {
              $this->SetFillColor(255,115,115);
              $this->Cell(23, 10, $row['CHE_ACC'], 1, 0, 'C', TRUE);
            }
            else {
              $this->SetFillColor(255, 255, 255);
              $this->Cell(23, 10, $row['CHE_ACC'], 1, 0, 'C', TRUE);
            }
            //for MAT_COM
            if ( $row['MAT_COM'] < 35) {
              $this->SetFillColor(255,115,115);
              $this->Cell(23, 10, $row['MAT_COM'], 1, 0, 'C', TRUE);
            }
            else {
              $this->SetFillColor(255, 255, 255);
              $this->Cell(23, 10, $row['MAT_COM'], 1, 0, 'C', TRUE);
            }
            //for BIO_CS_CA_BM
            if ( $row['BIO_CS_CA_BM'] < 35) {
              $this->SetFillColor(255,115,115);
              $this->Cell(38, 10, $row['BIO_CS_CA_BM'], 1, 0, 'C', TRUE);
            }
            else {
              $this->SetFillColor(255, 255, 255);
              $this->Cell(38, 10, $row['BIO_CS_CA_BM'], 1, 0, 'C', TRUE);
            }
            if ($totalMarks > 0)
            {
                $this->Cell(15, 10, $totalMarks, 1, 0, 'C');
            }
            else
            {
                $this->Cell(15, 10, '', 1, 0, 'C');
            }

            $this->Cell(15, 10, number_format($averageMarks, 2), 1, 1, 'C');

            // Add the Language column

        }
    }
//______________________________________________________________________________
function AddStatisticsTable($statistics) {
    $this->AddPage();

    $this->SetFont('Arial', 'B', 14);
    $this->Cell(0, 10, 'CLASS RESULT ANALYSIS', 0, 1, 'C');
    $this->Ln(10);

    $this->SetFillColor(173, 216, 230);
    $this->Cell(38, 10, 'Subject', 1, 0, 'C', TRUE);
    $this->Cell(25, 10, 'No.of Roll', 1, 0, 'C', TRUE);
    $this->Cell(28, 10, 'No.present', 1, 0, 'C', TRUE);
    $this->Cell(28, 10, 'No.Absent', 1, 0, 'C', TRUE);
    $this->Cell(33, 10, 'Highest Mark', 1, 0, 'C', TRUE);
    $this->Cell(33, 10, 'Lowest Mark', 1, 0, 'C', TRUE);
    $this->Cell(23, 10, 'Centums', 1, 0, 'C', TRUE);
    $this->Cell(23, 10, 'Failures', 1, 0, 'C', TRUE);
    $this->Cell(25, 10, 'Class Avg', 1, 0, 'C', TRUE);
    $this->Cell(25, 10, 'Pass %', 1, 1, 'C', TRUE);

    foreach ($statistics as $subjectStats)
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(38, 10, $subjectStats['subject'], 1, 0, 'C');
        $this->SetFont('Arial', '', 14);
        $this->Cell(25, 10, $subjectStats['total_strength'], 1, 0, 'C');
        $this->Cell(28, 10, $subjectStats['num_present'], 1, 0, 'C');
        $this->Cell(28, 10, $subjectStats['num_absent'], 1, 0, 'C');
        $this->Cell(33, 10, $subjectStats['highest_mark'], 1, 0, 'C');
        $this->Cell(33, 10, $subjectStats['lowest_mark'], 1, 0, 'C');
        $this->Cell(23, 10, $subjectStats['num_centums'], 1, 0, 'C');
        $this->Cell(23, 10, $subjectStats['num_failures'], 1, 0, 'C');
        $this->Cell(25, 10, number_format($subjectStats['class_average'], 1, '.', ''), 1, 0, 'C');
        $this->Cell(25, 10, number_format($subjectStats['pass_percentage'], 1), 1, 1, 'C');
    }
}
}

require_once 'configure.php';

if ($con->connect_error)
{
    die("Connection failed: " . $con->connect_error);
}

$studclass = $_POST['studclass'];
$studsec = $_POST['studsec'];
$studexam = $_POST['studexam'];
$studyear = $_POST['studyear'];

$sql = "SELECT em.*, s.NAME FROM marklist em
        JOIN student s ON em.ROLLNO = s.ROLLNO
        WHERE em.CLASS = '$studclass' AND em.SECTION = '$studsec' AND em.EXAMINATION = '$studexam' AND em.YEAR = '$studyear' ORDER BY em.ROLLNO";

$result = $con->query($sql);

$data = array();

if ($result->num_rows > 0)
{
    while ($row = $result->fetch_assoc())
     {
        $data[] = $row;
    }
}

$statistics = array();

$subjectMarks = array(
    'ENG',
    'LANG',
    'PHY_ECO',
    'CHE_ACC',
    'MAT_COM',
    'BIO_CS_CA_BM',
);
$subjectAbbreviations = array(
    'ENG'=> 'Eng',
    'LANG'=> 'Lang',
    'PHY_ECO'=> 'Phy/Eco',
    'CHE_ACC'=> 'Che/Acc',
    'MAT_COM'=>'Mat/Com',
    'BIO_CS_CA_BM'=>'Bio/CS/CA/BM',
);

$tamilQuery = "SELECT
    COUNT(*) AS total_strength,
    SUM(CASE WHEN LANGUAGE = 'T' AND LANG <> 'AB' THEN 1 ELSE 0 END) AS num_present,
    SUM(CASE WHEN LANGUAGE = 'T' AND LANG = 'AB' THEN 1 ELSE 0 END) AS num_absent,
    MAX(CASE WHEN LANGUAGE = 'T' THEN CAST(LANG AS SIGNED) ELSE 0 END) AS highest_mark,
    MIN(CASE WHEN LANGUAGE = 'T' THEN CAST(LANG AS SIGNED) ELSE 100 END) AS lowest_mark,
    SUM(CASE WHEN LANGUAGE = 'T' AND LANG = '100' THEN 1 ELSE 0 END) AS num_centums,
    SUM(CASE WHEN LANGUAGE = 'T' AND CAST(LANG AS SIGNED) < 35 THEN 1 ELSE 0 END) AS num_failures,
    (SUM(CASE WHEN LANGUAGE = 'T' AND LANG <> 'AB' THEN CAST(LANG AS SIGNED) ELSE 0 END) / COUNT(CASE WHEN LANGUAGE = 'T' AND LANG <> 'AB' THEN 1 ELSE 0 END)) AS class_average,
    (SUM(CASE WHEN LANGUAGE = 'T' AND LANG <> 'AB' THEN 1 ELSE 0 END) - SUM(CASE WHEN LANGUAGE = 'T' AND CAST(LANG AS SIGNED) < 35 THEN 1 ELSE 0 END)) / SUM(CASE WHEN LANGUAGE = 'T' AND LANG <> 'AB' THEN 1 ELSE 0 END) * 100 AS pass_percentage
    FROM marklist
    WHERE CLASS = $studclass AND SECTION = '$studsec' AND EXAMINATION = '$studexam' AND LANGUAGE = 'T'";

// Include statistics for French
$frenchQuery = "SELECT
COUNT(*) AS total_strength,
SUM(CASE WHEN LANGUAGE = 'F' AND LANG <> 'AB' THEN 1 ELSE 0 END) AS num_present,
SUM(CASE WHEN LANGUAGE = 'F' AND LANG = 'AB' THEN 1 ELSE 0 END) AS num_absent,
MAX(CASE WHEN LANGUAGE = 'F' THEN CAST(LANG AS SIGNED) ELSE 0 END) AS highest_mark,
MIN(CASE WHEN LANGUAGE = 'F' THEN CAST(LANG AS SIGNED) ELSE 100 END) AS lowest_mark,
SUM(CASE WHEN LANGUAGE = 'F' AND LANG = '100' THEN 1 ELSE 0 END) AS num_centums,
SUM(CASE WHEN LANGUAGE = 'F' AND CAST(LANG AS SIGNED) < 35 THEN 1 ELSE 0 END) AS num_failures,
(SUM(CASE WHEN LANGUAGE = 'F' AND LANG <> 'AB' THEN CAST(LANG AS SIGNED) ELSE 0 END) / COUNT(CASE WHEN LANGUAGE = 'F' AND LANG <> 'AB' THEN 1 ELSE 0 END)) AS class_average,
(SUM(CASE WHEN LANGUAGE = 'F' AND LANG <> 'AB' THEN 1 ELSE 0 END) - SUM(CASE WHEN LANGUAGE = 'F' AND CAST(LANG AS SIGNED) < 35 THEN 1 ELSE 0 END)) / SUM(CASE WHEN LANGUAGE = 'F' AND LANG <> 'AB' THEN 1 ELSE 0 END) * 100 AS pass_percentage
    FROM marklist
    WHERE CLASS = $studclass AND SECTION = '$studsec' AND EXAMINATION = '$studexam' AND LANGUAGE = 'F'";

$tamilResult = $con->query($tamilQuery);
$frenchResult = $con->query($frenchQuery);

$tamilStats = $tamilResult->fetch_assoc();
$frenchStats = $frenchResult->fetch_assoc();

// Include statistics for Tamil
$statistics[] = array(
    'subject' => 'Tamil',
    'total_strength' => $tamilStats['total_strength'],
    'num_present' => $tamilStats['num_present'],
    'num_absent' => $tamilStats['num_absent'],
    'highest_mark' => $tamilStats['highest_mark'],
    'lowest_mark' => $tamilStats['lowest_mark'],
    'num_centums' => $tamilStats['num_centums'],
    'num_failures' => $tamilStats['num_failures'],
    'class_average' => $tamilStats['class_average'], // Update class average calculation
    'pass_percentage' => $tamilStats['pass_percentage'],
);

// Include statistics for French
$statistics[] = array(
    'subject' => 'French',
    'total_strength' => $frenchStats['total_strength'],
    'num_present' => $frenchStats['num_present'],
    'num_absent' => $frenchStats['num_absent'],
    'highest_mark' => $frenchStats['highest_mark'],
    'lowest_mark' => $frenchStats['lowest_mark'],
    'num_centums' => $frenchStats['num_centums'],
    'num_failures' => $frenchStats['num_failures'],
    'class_average' => $frenchStats['class_average'], // Update class average calculation
    'pass_percentage' => $frenchStats['pass_percentage'],
);

foreach ($subjectMarks as $subject)
{
    $subjectStats = array(
        'subject' => $subjectAbbreviations[$subject],
        'total_strength' => 0,
        'num_present' => 0,
        'num_absent' => 0,
        'highest_mark' => 0,
        'lowest_mark' => 100,
        'num_centums' => 0,
        'num_failures' => 0,
        'total_marks' => 0,
    );

    foreach ($data as $row)
    {
        $totalMarks = (int)$row[$subject];

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
}

$pdf = new PDF('L','mm','A4');
$pdf->SetTitle("EXAM REPORT FOR $studexam OF CLASS $studclass $studsec IN THE YEAR $studyear");
$pdf->AddMarksTable($data); // Add the student marks table
$pdf->AddStatisticsTable($statistics);
$pdf->SetFont('Arial', 'B', 12);

$pdf->SetX(10);
$pdf->Cell(60, 25, 'Class Teacher\'s Sign:', 0, 0, 'L');

$pdf->SetX(110);
$pdf->Cell(100, 25, 'AHM Sign:', 0, 0, 'L');

$pdf->SetX(210);
$pdf->Cell(80, 25, 'Principal\'s Sign:', 0, 1, 'L');

$pdf->Output("$studexam $studclass $studsec.pdf", 'D', TRUE);

$con->close();
?>
