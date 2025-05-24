<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
            
            <div class="table-responsive">
              <table id="payroll_datatables" class="table table-striped">
                <thead>
                    <tr>
                      <th>Date</th>
                      <th>Employee Id</th>
                      <th>Fullname</th>
                      <th>Position/ Salary (Per Month)</th>
                      <th>Total Number of Days</th>  
                      <th>Days Rendered</th>
                      <th>Leave's</th>
                      <th>Holidays</th>
                      <th>Gross Salary</th>
                      <th>SSS</th>
                      <th>PAGIBIG</th>
                      <th>Philhealth</th>
                      <th>Tax</th>
                      <th>TOTAL</th>  		                
                      <th>Schedule</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < 11; $i++) { ?>
                        <?php
                        $iplus = $i + 1; 
                        if($iplus <= 9){
                        $monthdata = '0'.$iplus;
                        }else{
                        $monthdata = $iplus;
                        }

                        $iplus2 = $i + 2; 
                        if($iplus2 <= 9){
                          $monthdata2 = '0'.$iplus2;
                        }else{
                          $monthdata2 = $iplus2;
                        }

                        $firstday_firstdaymonth = $_GET['year'].'-'.$monthdata.'-09';
                        $firstday_lastdaymonth = $_GET['year'].'-'.$monthdata.'-28';
                        $v1label = date('Y, m(M) d', strtotime($firstday_firstdaymonth));
                        $v2label = date('Y, m(M) d', strtotime($firstday_lastdaymonth));

                        $lastdayofthemonth = lastday_ofthemonth($_GET['year'].'-'.$monthdata.'-20');
                        $last_lastmonth = $_GET['year'].'-'.$monthdata.'-28';
                        $last_lastdaymonth = $_GET['year'].'-'.$monthdata2.'-09';
                        $v3label = date('Y, m(M) d', strtotime($last_lastmonth));
                        $v4label = date('Y, m(M) d', strtotime($last_lastdaymonth));

                        ?>
                        
                        
                        <?php foreach (get_all_employee_datatables_payroll() as $key => $value) { 
                            $countworking_days = getWorkingDays($firstday_firstdaymonth,$firstday_lastdaymonth,[]);
                            $get_all_month_attendance_by_employer = get_all_month_attendance_by_employer($firstday_firstdaymonth,$firstday_lastdaymonth,$value['id']);
                            $leaveused = countleave_perid($firstday_firstdaymonth,$firstday_lastdaymonth,$value['id']);
                            $salary = total_salary($value['rate'],$get_all_month_attendance_by_employer,$countworking_days,$leaveused,count_available_holidays($firstday_firstdaymonth,$firstday_lastdaymonth));

                            $sss = get_value_deduction('sss',$salary,$value['rate']);
                            $pagibig = get_value_deduction('pagibig',$salary,$value['rate']);
                            $philhealth = get_value_deduction('philhealth',$salary,$value['rate']);
                            $tax = get_value_deduction('tax',$salary,$value['rate']);
                            $basic_salary = $salary - ($sss + $pagibig + $philhealth + $tax);
                        ?>
                        <?php if(total_salary($value['rate'],$get_all_month_attendance_by_employer,$countworking_days,$leaveused) != '0.00'){ ?>
                            <?php if(current_ph_date() >= $firstday_lastdaymonth){ ?>
                                <tr>
                                    <td>
                                        <?=$v1label?> - <?=$v2label?>
                                    </td>
                                    <td><?=$value['employee_id']?></td>
                                    <td><?=($value['firstname'])?> <?=($value['lastname'])?></td>
                                    <td><?=$value['description']?>/ ₱<?=$value['rate']?></td>
                                    <td><?=$countworking_days?></td>
                                    <td><?=$get_all_month_attendance_by_employer?></td>
                                    <td><?=$leaveused?></td>
                                    <td><?=count_available_holidays($firstday_firstdaymonth,$firstday_lastdaymonth)?></td>
                                    <td>₱ <?=number_format((float)$salary, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$sss, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$pagibig, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$philhealth, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$tax, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$basic_salary, 2, '.', '')?></td>
                                    <td><?=date('H:i:s a', strtotime($value['time_in']))?> - <?=date('H:i:s a', strtotime($value['time_out']))?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                        <?php } ?>



                        <?php if(date('m') == $monthdata){ ?>
                        <?php if(current_ph_date() >= $last_lastdaymonth){ ?>

                            <?php foreach (get_all_employee_datatables_payroll() as $key => $value) { 
                                $countworking_days = getWorkingDays($last_lastmonth,$last_lastdaymonth,[]);
                                $get_all_month_attendance_by_employer = get_all_month_attendance_by_employer($last_lastmonth,$last_lastdaymonth,$value['id']);
                                $leaveused = countleave_perid($last_lastmonth,$last_lastdaymonth,$value['id']);
                                $salary = total_salary($value['rate'],$get_all_month_attendance_by_employer,$countworking_days,$leaveused,count_available_holidays($last_lastmonth,$last_lastdaymonth));

                                $sss = get_value_deduction('sss',$salary,$value['rate']);
                                $pagibig = get_value_deduction('pagibig',$salary,$value['rate']);
                                $philhealth = get_value_deduction('philhealth',$salary,$value['rate']);
                                $tax = get_value_deduction('tax',$salary,$value['rate']);
                                $basic_salary = $salary - ($sss + $pagibig + $philhealth + $tax);
                            ?>
                            <?php if(total_salary($value['rate'],$get_all_month_attendance_by_employer,$countworking_days,$leaveused) != '0.00'){ ?>
                                <tr>
                                    <td>
                                        <?=$v3label?> - <?=$v4label?>
                                    </td>
                                    <td><?=$value['employee_id']?></td>
                                    <td><?=($value['firstname'])?> <?=($value['lastname'])?></td>
                                    <td><?=$value['description']?>/ ₱<?=$value['rate']?></td>
                                    <td><?=$countworking_days?></td>
                                    <td><?=$get_all_month_attendance_by_employer?></td>
                                    <td><?=$leaveused?></td>
                                    <td><?=count_available_holidays($last_lastmonth,$last_lastdaymonth)?></td>
                                    <td>₱ <?=number_format((float)$salary, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$sss, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$pagibig, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$philhealth, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$tax, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$basic_salary, 2, '.', '')?></td>
                                    <td><?=date('H:i:s a', strtotime($value['time_in']))?> - <?=date('H:i:s a', strtotime($value['time_out']))?></td>
                                </tr>
                            <?php } ?>
                            <?php } ?>

                        <?php } ?>
                        <?php }else{ ?>
                            <?php foreach (get_all_employee_datatables_payroll() as $key => $value) { 
                                $countworking_days = getWorkingDays($last_lastmonth,$last_lastdaymonth,[]);
                                $get_all_month_attendance_by_employer = get_all_month_attendance_by_employer($last_lastmonth,$last_lastdaymonth,$value['id']);
                                $leaveused = countleave_perid($last_lastmonth,$last_lastdaymonth,$value['id']);
                                $salary = total_salary($value['rate'],$get_all_month_attendance_by_employer,$countworking_days,$leaveused,count_available_holidays($last_lastmonth,$last_lastdaymonth));

                                $sss = get_value_deduction('sss',$salary,$value['rate']);
                                $pagibig = get_value_deduction('pagibig',$salary,$value['rate']);
                                $philhealth = get_value_deduction('philhealth',$salary,$value['rate']);
                                $tax = get_value_deduction('tax',$salary,$value['rate']);
                                $basic_salary = $salary - ($sss + $pagibig + $philhealth + $tax);
                            ?>
                            <?php if(total_salary($value['rate'],$get_all_month_attendance_by_employer,$countworking_days,$leaveused) != '0.00'){ ?>
                                <tr>
                                    <td>
                                        <?=$v3label?> - <?=$v4label?>
                                    </td>
                                    <td><?=$value['employee_id']?></td>
                                    <td><?=($value['firstname'])?> <?=($value['lastname'])?></td>
                                    <td><?=$value['description']?>/ ₱<?=$value['rate']?></td>
                                    <td><?=$countworking_days?></td>
                                    <td><?=$get_all_month_attendance_by_employer?></td>
                                    <td><?=$leaveused?></td>
                                    <td><?=count_available_holidays($last_lastmonth,$last_lastdaymonth)?></td>
                                    <td>₱ <?=number_format((float)$salary, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$sss, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$pagibig, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$philhealth, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$tax, 2, '.', '')?></td>
                                    <td>₱ <?=number_format((float)$basic_salary, 2, '.', '')?></td>
                                    <td><?=date('H:i:s a', strtotime($value['time_in']))?> - <?=date('H:i:s a', strtotime($value['time_out']))?></td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                        



                </tbody>
              </table>
            </div>


         
          
      </div>
    </div>
  </div>
</section>

<script>
    $(document).ready( function () {
    $('#payroll_datatables').DataTable({
        "order": [[ 0, "desc" ]],
      dom: 'Bfrtip',
          lengthMenu: [
                [ 10, 25, 50, 100, 500, 1000 ],
                [ '10 rows', '25 rows', '50 rows', '100 rows', '500 rows', '1000 rows' ]
            ],
          buttons: [
            {
              extend: 'pageLength'
            },
            // {
            //   extend: 'pdf',
            //   title: 'Report',
            //   exportOptions: {
            //       modifier: {
            //           page: 'current',
            //       },
            //       // columns: [0, 1]
            //   }
            // },
            {
              extend: 'excelHtml5',
              title: 'Report',
              exportOptions: {
                // columns: [0, 1]
              }
            },
            {
              extend: 'copyHtml5',
              exportOptions: {
                // columns: [0, 1]
              }
            },
          ],
    });
} );
</script>