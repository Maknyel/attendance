<?php
$obj_pdf = new TCPDF('P', PDF_UNIT, auto, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = global_title().""; 


$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData("", 0, "Payslip: ".date('M d, Y', strtotime($get['date_from'])).' - '.date('M d, Y', strtotime($get['date_to'])), '');
// $obj_pdf->SetHeaderData("", "", $title, '');
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
$countworking_days = getWorkingDays($get['date_from'],$get['date_to'],[]);
$get_all_month_attendance_by_employer = get_all_month_attendance_by_employer($get['date_from'],$get['date_to'],$value['id']);
$leaveused = countleave_perid($get['date_from'],$get['date_to'],$value['id']);
$salary = total_salary($value['rate'],$get_all_month_attendance_by_employer,$countworking_days,$leaveused,count_available_holidays($get['date_from'],$get['date_to']));

$sss = get_value_deduction('sss',$salary,$value['rate']);
$pagibig = get_value_deduction('pagibig',$salary,$value['rate']);
$philhealth = get_value_deduction('philhealth',$salary,$value['rate']);
$tax = get_value_deduction('tax',$salary,$value['rate']);
$basic_salary = $salary - ($sss + $pagibig + $philhealth + $tax);
$datatitle .= '<table style="width: 100%;">';
    $datatitle .= '<tr>';
        $datatitle .= '<th><p><b>Employee Code: </b>'.$value['employee_id'].'</p></th>';
        $datatitle .= '<th><p><b>Designation: </b>'.$value['description'].'</p></th>';
        
    $datatitle .= '</tr>';
        
    $datatitle .= '<tr>';
        $datatitle .= '<th><p><b>Employee Name: </b>'.$value['firstname'].' '.$value['lastname'].'</p></th>';
        $datatitle .= '<th><p><b>Rate: </b>'.$value['rate'].' (Per Month)</p></th>';
    $datatitle .= '<tr>';
$datatitle .= '</table>';



$dataonly = "<br/><br/>";

$dataonly .= '<table style="width: 100%;">';
    $dataonly .= '<tr>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th><b>This Period</b></th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th><b>This Period</b></th>';
    $dataonly .= '</tr>';

    $dataonly .= '<tr>';
        $dataonly .= '<th><b><u>Earnings:</u></b></th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th><b><u>Government Deductions:</u></b></th>';
        $dataonly .= '<th></th>';
    $dataonly .= '</tr>';

    $dataonly .= '<tr>';
        $dataonly .= '<th>REG BASIC</th>';
        $dataonly .= '<th style="text-align:center;">'.number_format(($salary), 2).'</th>';
        $dataonly .= '<th>PAGIBIG</th>';
        $dataonly .= '<th style="text-align:center;">'.number_format($pagibig, 2).'</th>';
    $dataonly .= '</tr>';


    $dataonly .= '<tr>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th>PHILHEALTH</th>';
        $dataonly .= '<th style="text-align:center;">'.number_format($philhealth, 2).'</th>';
    $dataonly .= '</tr>';

    $dataonly .= '<tr>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th>SSS</th>';
        $dataonly .= '<th style="text-align:center;">'.number_format($sss, 2).'</th>';
    $dataonly .= '</tr>';

    $dataonly .= '<tr>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th>TAX</th>';
        $dataonly .= '<th style="text-align:center;">'.number_format($tax, 2).'</th>';
    $dataonly .= '</tr>';

    $dataonly .= '<tr>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th><b>_______________________</b></th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th><b>_______________________</b></th>';
    $dataonly .= '</tr>';
    
    $dataonly .= '<tr>';
        $dataonly .= '<th>Sub Total:</th>';
        $dataonly .= '<th style="text-align:center;">'.number_format(($salary), 2).'</th>';
        $dataonly .= '<th>Sub Total:</th>';
        $dataonly .= '<th style="text-align:center;">'.number_format(($tax+$sss+$philhealth+$pagibig), 2).'</th>';
    $dataonly .= '</tr>';

    $dataonly .= '<tr>';
        $dataonly .= '<th>GROSS PAY:</th>';
        $dataonly .= '<th style="text-align:center;"><b><u>'.number_format(($salary), 2).'</u></b></th>';
        $dataonly .= '<th>NET PAY:</th>';
        $dataonly .= '<th style="text-align:center;"><b><u>'.number_format(($salary) - ($tax+$sss+$philhealth+$pagibig), 2).'</u></b></th>';
    $dataonly .= '</tr>';
    
$dataonly .= '</table>';
ob_end_clean();
// $obj_pdf->writeHTML($topdata . $datatitle . $tbl_header . $tbl . $tbl_footer , true, false, true, false, '');
$obj_pdf->writeHTML($topdata . $datatitle . $dataonly , true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');