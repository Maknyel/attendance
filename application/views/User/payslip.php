<?php
$obj_pdf = new TCPDF('P', PDF_UNIT, auto, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = global_title().""; 


$obj_pdf->SetTitle($title);
$datecondition = date('Y', strtotime($get['date_to'])).'-'.date('m', strtotime($get['date_to'])).'-'.'15';
$obj_pdf->SetHeaderData("", 0, "Cut-off Period: ".date('M d, Y', strtotime($get['date_from'])).' - '.date('M d, Y', strtotime($get['date_to'])).' | '.' Payout Date: '.((date('d', strtotime($get['date_to'])) >= 15)?date('M d, Y', strtotime(lastday_ofthemonth($get['date_to']))):date('M d, Y', strtotime(($datecondition)))), '');
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

$sss = get_value_deduction('sss',$salary,$value['rate'],get_is_parttimer($value['employee_type'],'type'));
$pagibig = get_value_deduction('pagibig',$salary,$value['rate'],get_is_parttimer($value['employee_type'],'type'));
$philhealth = get_value_deduction('philhealth',$salary,$value['rate'],get_is_parttimer($value['employee_type'],'type'));
$tax = get_value_deduction('tax',$salary,$value['rate']);
$basic_salary = $salary - ($sss + $pagibig + $philhealth + $tax);
$compute_per_day = (($value['rate']/2)/$countworking_days);

$get_all_month_attendance_by_employer_overtime = get_all_month_attendance_by_employer_overtime($get['date_from'],$get['date_to'],$value['id']);
$absences = ($compute_per_day * ($countworking_days-(count_available_holidays($get['date_from'],$get['date_to']) + $leaveused + $get_all_month_attendance_by_employer - $get_all_month_attendance_by_employer_overtime)));
$overtime = ($get_all_month_attendance_by_employer_overtime * $compute_per_day);
$datatitle .= '<table style="width: 100%;">';
    $datatitle .= '<tr>';
        $datatitle .= '<th><p style="font-size: 10px;"><b>Employee Code: </b>'.$value['employee_id'].'</p></th>';
        $datatitle .= '<th><p style="font-size: 10px;"><b>Designation: </b>'.$value['description'].'</p></th>';
        
    $datatitle .= '</tr>';
        
    $datatitle .= '<tr>';
        $datatitle .= '<th><p style="font-size: 10px;"><b>Employee Name: </b>'.$value['firstname'].' '.$value['lastname'].'</p></th>';
        $datatitle .= '<th><p style="font-size: 10px;"><b>Rate: </b>'.$value['rate'].' (Per Month)</p></th>';
    $datatitle .= '</tr>';

    $datatitle .= '<tr>';
        $datatitle .= '<th><p style="font-size: 10px;"><b>Email: </b>'.$value['email'].'</p></th>';
    $datatitle .= '</tr>';

    $datatitle .= "<br/>";

    $datatitle .= '<tr>';
        $datatitle .= '<th><p style="font-size: 10px;"><b>SSS: </b>'.$value['sss'].'</p></th>';
    $datatitle .= '</tr>';
    $datatitle .= '<tr>';
        $datatitle .= '<th><p style="font-size: 10px;"><b>PHIC: </b>'.$value['philhealth'].'</p></th>';
    $datatitle .= '</tr>';
    $datatitle .= '<tr>';
        $datatitle .= '<th><p style="font-size: 10px;"><b>HDMF: </b>'.$value['landbank'].'</p></th>';
    $datatitle .= '</tr>';
    $datatitle .= '<tr>';
        $datatitle .= '<th><p style="font-size: 10px;"><b>TIN: </b>'.$value['tin'].'</p></th>';
    $datatitle .= '</tr>';
$datatitle .= '</table>';



$dataonly = "<br/><br/>";



$dataonly .= '<table style="width: 100%;">';
    
    $dataonly .= '<br>';

    $dataonly .= '<tr>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th style="font-size: 10px; text-align: center;"><b>COMPENSATION</b></th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th style="font-size: 10px; text-align: center;"><b>DEDUCTIONS</b></th>';
    $dataonly .= '</tr>';

    $dataonly .= '<br>';

    $dataonly .= '<tr>';
        $dataonly .= '<th style="font-size: 10px;"><b><u>Earnings:</u></b></th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th style="font-size: 10px;"><b><u>Government Deductions:</u></b></th>';
        $dataonly .= '<th></th>';
    $dataonly .= '</tr>';

    $dataonly .= '<tr>';
        $dataonly .= '<th style="font-size: 10px;">REG BASIC</th>';
        $dataonly .= '<th style="font-size: 10px; text-align:center;">'.number_format((($salary+$absences+(0)+(count_available_holidays($get['date_from'],$get['date_to']) * $compute_per_day))-(count_available_holidays($get['date_from'],$get['date_to']) * $compute_per_day)-($leaveused * $compute_per_day) - ($overtime)), 2).'</th>';
        $dataonly .= '<th style="font-size: 10px;">ABSENCES</th>';
        $dataabsent = (($absences) <= 0)?0:($absences+(count_available_holidays($get['date_from'],$get['date_to']) * $compute_per_day));
        $dataonly .= '<th style="text-align:center; font-size: 10px;">'.number_format($dataabsent, 2).'</th>';
    $dataonly .= '</tr>';

    $dataonly .= '<tr>';
        $dataonly .= '<th style="font-size: 10px;">OVERTIME</th>';
        $dataonly .= '<th style="text-align:center; font-size: 10px;">'.number_format($overtime, 2).'</th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th style="text-align:center;"></th>';
    $dataonly .= '</tr>';

     $dataonly .= '<tr>';
        $dataonly .= '<th style="font-size: 10px;">HOLIDAY</th>';
        $dataonly .= '<th style="text-align:center; font-size: 10px;">'.number_format((count_available_holidays($get['date_from'],$get['date_to']) * $compute_per_day), 2).'</th>';
        $dataonly .= '<th style="font-size: 10px;">PAGIBIG</th>';
        $dataonly .= '<th style="text-align:center; font-size: 10px;">'.number_format($pagibig, 2).'</th>';
    $dataonly .= '</tr>';

    $dataonly .= '<tr>';
        $dataonly .= '<th style="font-size: 10px;">PAID LEAVE</th>';
        $dataonly .= '<th style="text-align:center; font-size: 10px;">'.number_format(($leaveused * $compute_per_day), 2).'</th>';
        $dataonly .= '<th  style="font-size: 10px;">PHILHEALTH</th>';
        $dataonly .= '<th style="text-align:center; font-size: 10px;">'.number_format($philhealth, 2).'</th>';
    $dataonly .= '</tr>';

    $dataonly .= '<tr>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th style="font-size: 10px;">SSS</th>';
        $dataonly .= '<th style="text-align:center; font-size: 10px;">'.number_format($sss, 2).'</th>';
    $dataonly .= '</tr>';

    $dataonly .= '<tr>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th style="font-size: 10px;">TAX</th>';
        $dataonly .= '<th style="text-align:center; font-size: 10px;">'.number_format($tax, 2).'</th>';
    $dataonly .= '</tr>';

    $dataonly .= '<tr>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th><b>_______________________</b></th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th><b>_______________________</b></th>';
    $dataonly .= '</tr>';
    
    $dataonly .= '<tr>';
        $dataonly .= '<th style="font-size: 10px;">Total Compensation:</th>';
        $dataonly .= '<th style="text-align:center; font-size: 10px;">'.number_format(($salary+$absences+(0)+(count_available_holidays($get['date_from'],$get['date_to']) * $compute_per_day)), 2).'</th>';
        $dataonly .= '<th style="font-size: 10px;">Total Deductions:</th>';
        $dataonly .= '<th style="text-align:center; font-size: 10px;">'.number_format(($tax+$sss+$philhealth+$pagibig+$absences+(count_available_holidays($get['date_from'],$get['date_to']) * $compute_per_day)), 2).'</th>';
    $dataonly .= '</tr>';

     $dataonly .= '<br>';

    $dataonly .= '<tr>';
        // $dataonly .= '<th>GROSS PAY:</th>';
        // $dataonly .= '<th style="text-align:center;"><b><u>'.number_format(($salary), 2).'</u></b></th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th></th>';
        $dataonly .= '<th style="font-size: 10px;"><b>NET PAY:</b></th>';
        $dataonly .= '<th style="text-align:center; font-size: 11px;"><b><u>'.number_format(($salary+$absences) - ($tax+$sss+$philhealth+$pagibig+$absences), 2).'</u></b></th>';
    $dataonly .= '</tr>';
    
$dataonly .= '</table>';
ob_end_clean();
// $obj_pdf->writeHTML($topdata . $datatitle . $tbl_header . $tbl . $tbl_footer , true, false, true, false, '');
$obj_pdf->writeHTML($topdata . $datatitle . $dataonly , true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');