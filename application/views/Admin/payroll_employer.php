<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
            
            <div class="table-responsive">
              <table id="table_id" class="table table-striped">
                <thead>
                    <tr>
                      <th>Options</th>
                      <th>Employee Id</th>
                      <th>Fullname</th>
                      <th>Position/ Salary (Per Month)</th>
                      <th>Total Number of Days</th>  
                      <th>Overtime (Hours)</th>
                      <th>Days Rendered</th>
                      <th>Absent</th>
                      <th>Leave's</th>
                      <th>Holiday</th>
                      <th>Total Compensation</th>
                      <th>SSS</th>
                      <th>PAGIBIG</th>
                      <th>Philhealth</th>
                      <th>Tax</th>
                      <th>TOTAL</th>  		                
                      <th>Schedule</th>
                      
                    </tr>
                    
                </thead>
                <tbody>
                  <?php foreach (get_all_employee_datatables_payroll() as $key => $value) { 
                  	$countworking_days = getWorkingDays($get['date_from'],$get['date_to'],[]);
                    $get_all_month_attendance_by_employer = get_all_month_attendance_by_employer($get['date_from'],$get['date_to'],$value['id']);
                    $get_all_month_attendance_by_employer_overtime = get_all_month_attendance_by_employer_overtime($get['date_from'],$get['date_to'],$value['id']);
                    $leaveused = countleave_perid($get['date_from'],$get['date_to'],$value['id']);
                    $salary = total_salary($value['rate'],$get_all_month_attendance_by_employer,$countworking_days,$leaveused,count_available_holidays($get['date_from'],$get['date_to']));

                    $sss = get_value_deduction('sss',$salary,$value['rate'],get_is_parttimer($value['employee_type'],'type'));
                    $pagibig = get_value_deduction('pagibig',$salary,$value['rate'],get_is_parttimer($value['employee_type'],'type'));
                    $philhealth = get_value_deduction('philhealth',$salary,$value['rate'],get_is_parttimer($value['employee_type'],'type'));
                    $tax = get_value_deduction('tax',$salary,$value['rate']);
                    $compute_per_day = (($value['rate']/2)/$countworking_days);
                    $absences = ($compute_per_day * ($countworking_days-(count_available_holidays($get['date_from'],$get['date_to']) + $leaveused + $get_all_month_attendance_by_employer - $get_all_month_attendance_by_employer_overtime)));
                    $basic_salary = $salary - ($sss + $pagibig + $philhealth + $tax);
                    $absent = $countworking_days-(count_available_holidays($get['date_from'],$get['date_to']) + $leaveused + $get_all_month_attendance_by_employer - $get_all_month_attendance_by_employer_overtime);
                    $absentdata = ($absent <= 0)?0:$absent;



                    
                    $overtime = ($get_all_month_attendance_by_employer_overtime * $compute_per_day);
                  ?>
                    <?php if($basic_salary > '0'){ ?>
                      <tr>
                          <td>
                            <a href="<?=base_url()?>cms/payslip?date_from=<?=$get['date_from']?>&date_to=<?=$get['date_to']?>&employee_id=<?=$value['id']?>" class="option_110px btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i> Payslip</a>
                          </td>

                          <td><?=$value['employee_id']?></tds>
                          <td><?=($value['firstname'])?> <?=($value['lastname'])?></td>
                          <td><?=$value['description']?>/ ₱<?=$value['rate']?></td>
                          <td><?=$countworking_days?></td>
                          <td><?=number_format((float)$get_all_month_attendance_by_employer_overtime, 2)?> Day (<?=$get_all_month_attendance_by_employer_overtime*8?>) Hours</td>
                          <td><?=number_format((float)$get_all_month_attendance_by_employer-$get_all_month_attendance_by_employer_overtime, 2)?></td>
                          <td><?=number_format((float)$absentdata, 2)?> (₱ <?=number_format((float)$absences+(count_available_holidays($get['date_from'],$get['date_to']) * $compute_per_day), 2)?>)</td>
                          <td><?=$leaveused?></td>
                          <td><?=count_available_holidays($get['date_from'],$get['date_to'])?></td>
                          <td>₱ <?=number_format(($salary+$absences+(0)+(count_available_holidays($get['date_from'],$get['date_to']) * $compute_per_day)), 2)?></td>
                          <td>₱ <?=number_format((float)$sss, 2)?></td>
                          <td>₱ <?=number_format((float)$pagibig, 2)?></td>
                          <td>₱ <?=number_format((float)$philhealth, 2)?></td>
                          <td>₱ <?=number_format((float)$tax, 2)?></td>
                          <td>₱ <?=number_format((float)$basic_salary, 2)?></td>
                          <td><?=date('H:i:s a', strtotime($value['time_in']))?> - <?=date('H:i:s a', strtotime($value['time_out']))?></td>
                      </tr>
                    <?php } ?>
                  <?php } ?>



                </tbody>
              </table>
            </div>


         
          
      </div>
    </div>
  </div>
</section>
