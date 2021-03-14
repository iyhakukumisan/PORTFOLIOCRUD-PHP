<?php
require_once("../database/connection.php");
require_once("../FPDF/fpdf.php");
$user_id=$_REQUEST["id"];

$sql = mysqli_query($con,"SELECT * FROM tbl_info WHERE id = '$user_id'");

if($row=mysqli_fetch_assoc($sql)){
    $fname=$row["fname"];
    $lname = $row["lname"];
    $email = $row["email"];
    $cont = $row["contact"];

}

//Creating PDF FILE
require_once("../FPDF/fpdf.php");

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",8);

    $pdf->Cell(0,5,"SAMPLE PDF REPORT",0,1,"C");
    $pdf->SetFont("Arial","B",10);
    $pdf->Cell(50,5,"",0,1,"L");
    $pdf->Cell(0,5,"PERSONAL INFORMATION",0,1,"C");
    $pdf->SetFont("Arial","",10);
    $pdf->Cell(50,5,"",0,1,"L");
    $pdf->Cell(50,5,"",0,1,"L");
    $pdf->Cell(50,5,"",0,1,"L");
    $pdf->SetFont("Arial","B",15);
    $pdf->Cell(70,10,"ID:",1,0,"L");
    $pdf->Cell(110,10,$user_id,1,1,"L");
    $pdf->Cell(70,10,"FIRST NAME:",1,0,"L");
    $pdf->Cell(110,10,$fname,1,1,"L");
    $pdf->Cell(70,10,"LAST NAME:",1,0,"L");
    $pdf->Cell(110,10,$lname,1,1,"L");
    $pdf->Cell(70,10,"EMAIL:",1,0,"L");
    $pdf->Cell(110,10,$email,1,1,"L");
    $pdf->Cell(70,10,"CONTACT:",1,0,"L");
    $pdf->Cell(110,10,$cont,1,1,"L");

$pdf->output();

//guide ito -> Cell(width,height,"label na llaabs sa pdf",border,newline,text alignment)
?>
