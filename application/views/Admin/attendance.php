<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
            <div style="text-align: right;width: 100%;">
                <div>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#attendance_modal" onclick="crud_attendance('add','');"><span class="fa fa-plus"></span> Add</button>
                </div>

            </div>
            <div class="table-responsive">
              <table id="table_id" class="table table-striped">
                <thead>
                    <tr>
                      <th>Options</th>
                      <th>Date</th>
  		                <th>Employee ID</th>
  		                <th>Name</th>
  		                <th>Time In</th>
  		                <th>Time Out</th>
                      <th>Total Hour</th>
                      <th>Overtime</th>
                      <th>Total Day</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach (get_all_attendance_datatables() as $key => $value) { 
                  	$status = ($value['time_in'] <= $value['time_inn'])?' <span class="badge badge-warning pull-right">ontime</span>':'<br/>'.minus_late_minhour($value['time_in'],$value['time_inn']).' <span class="badge badge-danger pull-right">late</span>';
                  ?>
                    <tr>
                        <td>
                          <button type="button" class="option_110px btn btn-warning" data-toggle="modal" data-target="#attendance_modal" onclick="crud_attendance('edit',`<?=$value['attid']?>`);"><i class="fa fa-pen" aria-hidden="true"></i> Edit</button><br/><br/>
                          <button type="button" class="option_110px btn btn-danger" onclick="crud_attendance('delete',`<?=$value['attid']?>`);"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </td>
                        <td><?=date('M d, Y', strtotime($value['date']))?></td>
                        <td><?=$value['empid']?></td>
                        <td><?=$value['firstname'].' '.$value['lastname']?></td>
                        <td><?=date('h:i A', strtotime($value['time_in'])).$status?></td>
                        <td><?=($value['time_out'] != '00:00:00')?date('h:i A', strtotime($value['time_out'])):''?></td>
                        <td><?=($value['time_out'] != '00:00:00')?converttimeintimeout($value['time_in'],$value['time_out']):''?></td>
                        <td><?=($value['time_out'] != '00:00:00')?converttimeintimeout($value['time_in'],$value['time_out'],'is_overtime'):''?></td>
                        <td><?=($value['time_out'] != '00:00:00')?(int)converttimeintimeout_day(converttimeintimeoutv2($value['time_in'],$value['time_out'])):''?></td>
                    </tr>
                  <?php } ?>



                </tbody>
              </table>
            </div>

            <script type="text/javascript">
              function crud_attendance(crud_type,id){
                $('#attendance_form #id').val(id);
                $('#attendance_form #crud_type').val(crud_type);
                if(crud_type == 'edit'){
                  var data = {'id':id,'crud_type':'get_by_id'};
                  $.ajax({
                    type:'POST',
                    dataType:'JSON',
                    url:base_url+'Admin/attendance_form',
                    data:data,
                    success:function(datareturn)
                    {
                      $('#attendance_form #employee_id').val(datareturn['employee_id']);                  
                      $('#attendance_form #date').val(datareturn['date']);
                      $('#attendance_form #time_in').val(datareturn['time_in']);
                      $('#attendance_form #time_out').val(datareturn['time_out']);

                    },
                  });
                }else if(crud_type == 'delete'){
                  if(confirm('do you want to delete this attendance?')){
                    var data = {'id':id,'crud_type':'delete'};
                    $.ajax({
                      type:'POST',
                      dataType:'JSON',
                      url:base_url+'Admin/attendance_form',
                      data:data,
                      success:function(datareturn)
                      {
                        if(datareturn != 0){
                          alert_redirection('Success','Attendance successfully deleted',base_url+'cms/attendance','success');
                        }
                      },
                    });
                    }
                }
              }

              $(document).on('submit', '#attendance_form', function(event){
                  $("#attendance_form #attendancebutton").attr("disabled","disabled");
                    event.preventDefault();
                    var crud_type = $('#attendance_form #crud_type').val();
                    var employee_id = $('#attendance_form #employee_id').val();
                    var date = $('#attendance_form #date').val();
                    var time_in = $('#attendance_form #time_in').val();
                    var time_out = $('#attendance_form #time_out').val();
                    var id = $('#attendance_form #id').val();


                    var data = {
                      'id'              : id,
                      'crud_type'       : crud_type,
                      'employee_id'     : employee_id,
                      'date'     				: date,
                      'time_in'         : time_in,
                      'time_out'        : time_out,
                    };
                    $.ajax({
                      type:'POST',
                      dataType:'JSON',
                      url:base_url+'Admin/attendance_form',
                      data:data,
                      success:function(datareturn)
                      {
                        $("#attendance_form #attendancebutton").removeAttr("disabled");
                        if(datareturn != 0){
                          var x = "";
                          switch(crud_type) {
                            case 'add':
                              x = 'Added';
                            break;
                            case 'edit':
                              x = 'Updated';
                            break;
                          }
                              alert_redirection('Success','Attendance successfully '+x,base_url+'cms/attendance','success');

                        }else{
                              alert_redirection('Error','There is something wrong, please press ok to refresh page',base_url+'cms/attendance','error');
                        }
                      },
                    });
                });

              </script>

            <div class="modal fade" id="attendance_modal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Attendance</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form id="attendance_form">
                      <div class="modal-body">
                      		<input type="hidden" class="form-control" id="id">
                            <input type="hidden" class="form-control" id="crud_type">
                          	<div class="form-group">
                              	<label for="employee_id">Employee</label>
                              	<select class="form-control" id="employee_id" required>
                                  <?php foreach (get_all_employee_datatables() as $key => $value) { ?>
                                    <option value="<?=$value['id']?>"><?=$value['firstname']?> <?=$value['lastname']?></option>
                                  <?php } ?>
                                </select>
                          	</div>

                          	<div class="form-group">
                              	<label for="date">Date</label>
                              	<input type="date" class="form-control" id="date" required>
                          	</div>

                          	<div class="form-group">
                              	<label for="time_in">Time in</label>
                              	<input type="text" class="form-control" id="time_in" required>
                          	</div>

                          	<div class="form-group">
                              	<label for="time_out">Time out</label>
                              	<input type="text" class="form-control" id="time_out" required>
                          	</div>

                      </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" id="attendancebutton" class="btn btn-info submit-btn">Submit</button>
                          
                      </div>
                  </form>
                </div>

              </div>
            </div>
          
      </div>
    </div>
  </div>
</section>


<script type="text/javascript">
	$('#time_in').daterangepicker({
      timePicker : true,
            singleDatePicker:true,
            timePicker24Hour : false,
            timePickerIncrement : 1,
            timePickerSeconds : true,
            locale : {
                format : 'HH:mm:ss A'
            }
	}).on('show.daterangepicker', function(ev, picker) {
            picker.container.find(".calendar-table").hide();
   });
	  $('#time_out').daterangepicker({
      timePicker : true,
            singleDatePicker:true,
            timePicker24Hour : false,
            timePickerIncrement : 1,
            timePickerSeconds : true,
            locale : {
                format : 'HH:mm:ss A'
            }
	}).on('show.daterangepicker', function(ev, picker) {
            picker.container.find(".calendar-table").hide();
   });
</script>