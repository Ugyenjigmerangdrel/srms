<?php
require('fpdf/fpdf.php');
include('path.php');
include($ROOTPATH.'/app/database/db.php');

if (isset($_GET['student_code'])){
    $code = url_decode($_GET['student_code']);
    $marks = dispSort(['result', 'subject', 'ASC'], ['student_code' => $code]);
    $student_data = selectOne('result_record', ['student_code' => $code]);
    //printD($marks);
    $datas = [];
    foreach($marks as $m){
        array_push($datas, [$m['subject'],$m['marks']]);

    }

    class PDF extends FPDF
    {
    // Page header

    function Header()
    {
    
        // Logo
        $this->Image('https://www.drukjeganghss.bt/assets/img/logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Times','B',15);
        // Move to the right
        $this->Cell(50);
        // Title
        $this->MultiCell(100,8, 'DRUKJEGANG CENTRAL SCHOOL                     DAGANA, BHUTAN                                  Student Progress Report', 'C');

        $this->Image('https://www.drukjeganghss.bt/assets/img/40-logo.png',170,6,30);
        // Line break
        $this->Ln(10);
        $this->SetLineWidth(0.5);
        $this->Line(240,40,0,40);
        $this->Ln(0);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        $this->SetX(10);
        // Arial italic 8
        $this->SetFont('Arial','',8);
        // Page number
        $this->Cell(0,10,'Contact-Principal Office: 06-487128 Vice Principal: 06 487124 General Office: 06 487152',0,0,'C');
        $this->Ln(5);
        $this->SetX(10);
        $this->Cell(0,10,'Email Address: dg.drukjegangcs@education.gov.bt',0,0,'C');
    }

    function printL($str, $font_w)
    {
        // Position at 1.5 cm from bottom
        
        // Arial italic 8
        $this->SetFont('Times',$font_w,12);
        // Page number
        $this->Cell(0,10,$str,0,0,'L');
        $this->Ln(7);
        
    }

    function BasicTable($header, $data)
    {
        // Header
        $size = ['80', '50'];
        $form = ['L', 'C'];
        foreach($header as $i => $col)
            $this->Cell($size[$i],10,$col,1,0,$form[$i]);
        $this->Ln();
        // Data
        $this->SetFont('Times','',12);
        foreach($data as $row)
        {
            foreach($row as $i => $col)
        
                $this->Cell($size[$i],7,$col,1,0,$form[$i]);
            $this->Ln();
        } 
    }

    function createRows($data){
        $size = ['80', '50'];
        $form = ['L', 'C'];
        foreach($data as $i => $col)
        
            $this->Cell($size[$i],7,$col,1,0, $form[$i]);
        $this->Ln();
    }

    }

    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetLeftMargin(40);
    $pdf->SetX(40);
    $pdf->SetFont('Times','',12);
    $header = array('Subject', 'Marks');
    $data = $datas;
    $pdf->printL("Name: ".$student_data['student_name'], 'B');
    $pdf->printL("Student Code: ".$student_data['student_code'], 'B');
    $pdf->printL("Class: ".$student_data['class'], 'B');
    
    $pdf->Ln(3);
    $pdf->printL("Scoresheet:", 'B');
    $pdf->Ln(3);
    $pdf->BasicTable($header,$data);
    $pdf->createRows(['Percentage', $student_data['percentage'].'%']);
    $pdf->createRows(['Status', 'Pass']);
    $pdf->Ln(20);
    $pdf->Cell(0,10,'Principal                                                                     Academic Coordinator',0,0,'L');
    //$pdf->Cell(10);

    $pdf->Output('D', $student_data['student_name'].'_Result.pdf');
    exit();
    header("Location: result_list.php");
}
?>
