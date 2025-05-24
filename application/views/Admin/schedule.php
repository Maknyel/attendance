<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
            <div style="text-align: right;width: 100%;">
                <div>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#schedule_modal" onclick="crud_schedule('add','');"><span class="fa fa-plus"></span> Add</button>
                </div>

            </div>
            <div class="table-responsive">
              <table id="table_id" class="table table-striped">
                <thead>
                    <tr>
                      <th>Options</th>
                      <th>Timein</th>
  		                <th>Timeout</th>

                    </tr>
                </thead>
                <tbody>
                  <?php foreach (get_all_schedule_datatables() as $key => $value) { 
                  	
                  ?>
                    <tr>
                        <td>
                          <button type="button" class="option_110px btn btn-warning" data-toggle="modal" data-target="#schedule_modal" onclick="crud_schedule('edit',`<?=$value['id']?>`);"><i class="fa fa-pen" aria-hidden="true"></i> Edit</button><br/><br/>
                          <button type="button" class="option_110px btn btn-danger" onclick="crud_schedule('delete',`<?=$value['id']?>`);"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </td>
                        <td><?=date('H:i:s a', strtotime($value['time_in']))?></td>
                        <td><?=date('H:i:s a', strtotime($value['time_out']))?></td>
                    </tr>
                  <?php } ?>



                </tbody>
              </table>
            </div>

            <script type="text/javascript">
              function crud_schedule(crud_type,id){
                $('#schedule_form #id').val(id);
                $('#schedule_form #crud_type').val(crud_type);
                if(crud_type == 'edit'){
                  var data = {'id':id,'crud_type':'get_by_id'};
                  $.ajax({
                    type:'POST',
                    dataType:'JSON',
                    url:base_url+'Admin/schedule_form',
                    data:data,
                    success:function(datareturn)
                    {
                      $('#schedule_form #time_in').val(datareturn['time_in']);                  
                      $('#schedule_form #time_out').val(datareturn['time_out']);

                    },
                  });
                }else if(crud_type == 'delete'){
                  if(confirm('do you want to delete this schedule?')){
                    var data = {'id':id,'crud_type':'delete'};
                    $.ajax({
                      type:'POST',
                      dataType:'JSON',
                      url:base_url+'Admin/schedule_form',
                      data:data,
                      success:function(datareturn)
                      {
                        if(datareturn != 0){
                          alert_redirection('Success','Schedule successfully deleted',base_url+'cms/schedule','success');
                        }
                      },
                    });
                    }
                }
              }

              $(document).on('submit', '#schedule_form', function(event){
                  $("#schedule_form #schedulebutton").attr("disabled","disabled");
                    event.preventDefault();
                    var crud_type = $('#schedule_form #crud_type').val();
                    var time_in = $('#schedule_form #time_in').val();
                    var time_out = $('#schedule_form #time_out').val();
                    var id = $('#schedule_form #id').val();


                    var data = {
                      'id'              : id,
                      'crud_type'       : crud_type,
                      'time_in'     : time_in,
                      'time_out'     				: time_out,
                    };
                    $.ajax({
                      type:'POST',
                      dataType:'JSON',
                      url:base_url+'Admin/schedule_form',
                      data:data,
                      success:function(datareturn)
                      {
                        $("#schedule_form #schedulebutton").removeAttr("disabled");
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
                              alert_redirection('Success','Schedule successfully '+x,base_url+'cms/schedule','success');

                        }else{
                              alert_redirection('Error','There is something wrong, please press ok to refresh page',base_url+'cms/schedule','error');
                        }
                      },
                    });
                });

              </script>

            <div class="modal fade" id="schedule_modal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Schedule</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form id="schedule_form">
                      <div class="modal-body">
                      		<input type="hidden" class="form-control" id="id">
                            <input type="hidden" class="form-control" id="crud_type">
                          	<div class="form-group">
                              	<label for="time_in">Time In</label>
                              	<input type="text" class="form-control" id="time_in" required>
                                
                          	</div>

                          	<div class="form-group">
                              	<label for="time_out">Time Out</label>
                              	<input type="time_out" class="form-control" id="time_out" required>
                          	</div>

                          	

                      </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" id="schedulebutton" class="btn btn-info submit-btn">Submit</button>
                          
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