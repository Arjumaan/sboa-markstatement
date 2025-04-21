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
        $this->Cell(30, 10, 'Rollno', 1, 0, 'C', TRUE);
        $this->Cell(70, 10, 'Name', 1, 0, 'C', TRUE);
        $this->Cell(25, 10, 'Eng', 1, 0, 'C', TRUE);
        $this->Cell(25, 10, 'Lang', 1, 0, 'C', TRUE);
        $this->Cell(25, 10, 'Maths', 1, 0, 'C', TRUE);
        $this->Cell(25, 10, 'Sci', 1, 0, 'C', TRUE);
        $this->Cell(25, 10, 'Soc_Sci', 1, 0, 'C', TRUE);
        $this->Cell(25, 10, 'Total', 1, 0, 'C', TRUE);
        $this->Cell(25, 10, 'Average', 1, 1, 'C', TRUE);

        $this->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            $totalMarks = 0;
            $subjectCount = 0;

            if ($row['ENG'] !== 'AB') {
                $totalMarks += (int)$row['ENG'];
                $subjectCount++;
            }
            if ($row['TAM'] !== 'AB') {
                $totalMarks += (int)$row['TAM'];
                $subjectCount++;
            }
            if ($row['MAT'] !== 'AB') {
                $totalMarks += (int)$row['MAT'];
                $subjectCount++;
            }
            if ($row['SCI'] !== 'AB') {
                $totalMarks += (int)$row['SCI'];
                $subjectCount++;
            }
            if ($row['SOC_SCI'] !== 'AB') {
                $totalMarks += (int)$row['SOC_SCI'];
                $subjectCount++;
            }

            $averageMarks = $subjectCount > 0 ? $totalMarks / $subjectCount : 0;
            // for ENGLISH
            if ($row['ENG'] < 35 ) {
              $this->SetFillColor(255,115,115);
              $this->Cell(30, 10, $row['ROLLNO'], 1, 0, 'C', FALSE);
              $this->Cell(70, 10, $row['NAME'], 1, 0, 'C', FALSE);
              $this->Cell(25, 10, $row['ENG'], 1, 0, 'C', TRUE);
            }
            else {
              $this->SetFillColor(255, 255, 255);
              $this->Cell(30, 10, $row['ROLLNO'], 1, 0, 'C', FALSE);
              $this->Cell(70, 10, $row['NAME'], 1, 0, 'C', FALSE);
              $this->Cell(25, 10, $row['ENG'], 1, 0, 'C', TRUE);
            }
            //for TAMIL
            if ( $row['TAM'] < 35) {
              $this->SetFillColor(255,115,115);
              $this->Cell(25, 10, $row['TAM'], 1, 0, 'C', TRUE);
            }
            else {
              $this->SetFillColor(255, 255, 255);
              $this->Cell(25, 10, $row['TAM'], 1, 0, 'C', TRUE);
            }
            //for MATHS
            if ( $row['MAT'] < 35) {
              $this->SetFillColor(255,115,115);
              $this->Cell(25, 10, $row['MAT'], 1, 0, 'C', TRUE);
            }
            else {
              $this->SetFillColor(255, 255, 255);
              $this->Cell(25, 10, $row['MAT'], 1, 0, 'C', TRUE);
            }
            //for Science
            if ( $row['SCI'] < 35) {
              $this->SetFillColor(255,115,115);
              $this->Cell(25, 10, $row['SCI'], 1, 0, 'C', TRUE);
            }
            else {
              $this->SetFillColor(255, 255, 255);
              $this->Cell(25, 10, $row['SCI'], 1, 0, 'C', TRUE);
            }
            //for SOCIAL SCIENCE
            if ( $row['SOC_SCI'] < 35) {
              $this->SetFillColor(255,115,115);
              $this->Cell(25, 10, $row['SOC_SCI'], 1, 0, 'C', TRUE);
            }
            else {
              $this->SetFillColor(255, 255, 255);
              $this->Cell(25, 10, $row['SOC_SCI'], 1, 0, 'C', TRUE);
            }

            if ($totalMarks > 0) {
                $this->Cell(25, 10, $totalMarks, 1, 0, 'C');
            } else {
                $this->Cell(25, 10, '', 1, 0, 'C');
            }

            $this->Cell(25, 10, number_format($averageMarks, 2), 1, 1, 'C');
        }
    }
//______________________________________________________________________________
    function AddStatisticsTable($statistics) {
        $this->AddPage();

        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'CLASS RESULT ANALYSIS', 0, 1, 'C');
        $this->Ln(10);

        $this->SetFillColor(173, 216, 230);
        $this->Cell(30, 10, 'Subject', 1, 0, 'C', TRUE);
        $this->Cell(25, 10, 'No.of Roll', 1, 0, 'C', TRUE);
        $this->Cell(33, 10, 'No.present', 1, 0, 'C', TRUE);
        $this->Cell(30, 10, 'No.Absent', 1, 0, 'C', TRUE);
        $this->Cell(33, 10, 'Highest Mark', 1, 0, 'C', TRUE);
        $this->Cell(33, 10, 'Lowest Mark', 1, 0, 'C', TRUE);
        $this->Cell(25, 10, 'Centums', 1, 0, 'C', TRUE);
        $this->Cell(25, 10, 'Failures', 1, 0, 'C', TRUE);
        $this->Cell(25, 10, 'Class Avg', 1, 0, 'C', TRUE);
        $this->Cell(25, 10, 'Pass %', 1, 1, 'C', TRUE);

        foreach ($statistics as $subjectStats)
        {
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(30, 10, $subjectStats['subject'], 1, 0, 'C');
            $this->SetFont('Arial', '', 14);
            $this->Cell(25, 10, $subjectStats['total_strength'], 1, 0, 'C');
            $this->Cell(33, 10, $subjectStats['num_present'], 1, 0, 'C');
            $this->Cell(30, 10, $subjectStats['num_absent'], 1, 0, 'C');
            $this->Cell(33, 10, $subjectStats['highest_mark'], 1, 0, 'C');
            $this->Cell(33, 10, $subjectStats['lowest_mark'], 1, 0, 'C');
            $this->Cell(25, 10, $subjectStats['num_centums'], 1, 0, 'C');
            $this->Cell(25, 10, $subjectStats['num_failures'], 1, 0, 'C');
            $this->Cell(25, 10, number_format($subjectStats['class_average'], 1, '.', ''), 1, 0, 'C');
            $this->Cell(25, 10, number_format($subjectStats['pass_percentage'], 1), 1, 1, 'C');
        }
    }
}

require_once 'configure.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$studclass = $_POST['studclass'];
$studsec = $_POST['studsec'];
$studexam = $_POST['studexam'];
$studyear = $_POST['studyear'];

$sql = "SELECT em.*, s.NAME FROM marklist2 em
        JOIN student2 s ON em.ROLLNO = s.ROLLNO
        WHERE em.CLASS = '$studclass' AND em.SECTION = '$studsec' AND em.EXAMINATION = '$studexam' AND em.YEAR = '$studyear' ORDER BY em.ROLLNO";

$result = $con->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$statistics = array();

$subjects = ['ENG', 'TAM', 'MAT', 'SCI', 'SOC_SCI'];
$subjectAbbreviations = array(
    'ENG' => 'English',
    'TAM' => 'Tamil',
    'MAT' => 'Maths',
    'SCI' => 'Science',
    'SOC_SCI' => 'Social',
      );

foreach ($subjects as $subject) {
    $subjectStats = array(
        'subject' => $subjectAbbreviations[$subject],
        'total_strength' => 0,
        'num_present' => 0,
        'num_absent' => 0,
        'highest_mark' => 0,
        'lowest_mark' => 100,
        'num_centums' => 0,
        'num_failures' => 0, // Initialize failures to 0
        'total_marks' => 0,
    );

    foreach ($data as $row) {
        $totalMarks = (int)$row[$subject];

        if ($totalMarks >= 0) {
            $subjectStats['total_strength']++;
            if ($totalMarks > 0) {
                $subjectStats['num_present']++;
                if ($totalMarks > $subjectStats['highest_mark']) {
                    $subjectStats['highest_mark'] = $totalMarks;
                }
                if ($totalMarks < $subjectStats['lowest_mark']) {
                    $subjectStats['lowest_mark'] = $totalMarks;
                }
                if ($totalMarks == 100)
                {
                    $subjectStats['num_centums']++;
                }
                if ($totalMarks < 35) {
                    $subjectStats['num_failures']++;
                }
            } else {
                $subjectStats['num_absent']++;
            }
            $subjectStats['total_marks'] += $totalMarks;
        }
    }

    if ($subjectStats['num_present'] > 0) {
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

$pdf->SetX(20);
$pdf->Cell(60, 35, 'Class Teacher\'s Sign:', 0, 0, 'L');

$pdf->SetX(120);
$pdf->Cell(100, 35, 'AHM Sign:', 0, 0, 'L');

$pdf->SetX(220);
$pdf->Cell(80, 35, 'Principal\'s Sign:', 0, 1, 'L');

$pdf->Output("$studexam $studclass $studsec.pdf", 'D', TRUE);

$con->close();
?>
