<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
            <div style="text-align: right;width: 100%;">
                

            </div>
            <div class="table-responsive">
              <table id="table_id" class="table table-striped">
                <thead>
                    <tr>
                      <th>Options</th>
                      <th>Employee Id</th>
                      <th>Fullname</th>
  		                <th>Email</th>
                      <th>Address</th>
                      <th>Birthdate</th>
                      <th>Contact Info</th>
                      <th>Gender</th>
                      <th>Description</th>
                      <th>Schedule</th>
                      <th>Username</th>
                      <th>Employee Type</th>

                    </tr>
                </thead>
                <tbody>
                  <?php foreach (get_all_employee_datatables_a() as $key => $value) { 
                  	
                  ?>
                    <tr>
                        <td>
                          <button type="button" class="option_110px btn btn-danger" onclick="crud_employee('retrieve',`<?=$value['id']?>`);"><i class="fa fa-retrieve" aria-hidden="true"></i> Retrieve</button><br/><br/>

                        </td>
                        <td><?=$value['employee_id']?></td>
                        <td><?=($value['firstname'])?> <?=($value['lastname'])?></td>
                        <td><?=($value['email'])?></td>
                        <td><?=($value['address'])?></td>
                        <td><?=date('M d, Y', strtotime($value['birthdate']))?></td>
                        <td><?=($value['contact_info'])?></td>
                        <td><?=($value['gender'])?></td>
                        <td><?=($value['description'])?></td>
                        <td><?=date('H:i:s a', strtotime($value['time_in']))?> - <?=date('H:i:s a', strtotime($value['time_out']))?></td>
                        <td><?=($value['username'])?></td>
                        <td><?=($value['type'])?></td>
                    </tr>
                  <?php } ?>



                </tbody>
              </table>
            </div>

          
      </div>
    </div>
  </div>
</section>


<script type="text/javascript">
  // $('#employee_id').daterangepicker({
  //     timePicker : true,
  //           singleDatePicker:true,
  //           timePicker24Hour : false,
  //           timePickerIncrement : 1,
  //           timePickerSeconds : true,
  //           locale : {
  //               format : 'HH:mm:ss A'
  //           }
  // }).on('show.daterangepicker', function(ev, picker) {
  //           picker.container.find(".calendar-table").hide();
  //  });
  //   $('#firstname').daterangepicker({
  //     timePicker : true,
  //           singleDatePicker:true,
  //           timePicker24Hour : false,
  //           timePickerIncrement : 1,
  //           timePickerSeconds : true,
  //           locale : {
  //               format : 'HH:mm:ss A'
  //           }
  // }).on('show.daterangepicker', function(ev, picker) {
  //           picker.container.find(".calendar-table").hide();
  //  });
</script>


<script type="text/javascript">
function crud_employee(crud_type,id){
  $('#employee_form #id').val(id);
  $('#employee_form #crud_type').val(crud_type);
  if(crud_type == 'edit'){
    var data = {'id':id,'crud_type':'get_by_id'};
    $.ajax({
      type:'POST',
      dataType:'JSON',
      url:base_url+'Admin/employee_form',
      data:data,
      success:function(datareturn)
      {
        $('#employee_form #employee_id').val(datareturn['employee_id']);                  
        $('#employee_form #firstname').val(datareturn['firstname']);

        $('#employee_form #lastname').val(datareturn['lastname']);
        $('#employee_form #address').val(datareturn['address']);
        $('#employee_form #email').val(datareturn['email']);
        $('#employee_form #birthdate').val(datareturn['birthdate']);
        $('#employee_form #contact_info').val(datareturn['contact_info']);
        $('#employee_form #gender').val(datareturn['gender']);
        $('#employee_form #position_id').val(datareturn['position_id']);
        $('#employee_form #schedule_id').val(datareturn['schedule_id']);

        $('#employee_form #username').val(datareturn['username']);
        $('#employee_form #password').val(atob(datareturn['password']));

      },
    });
  }else if(crud_type == 'retrieve'){
    if(confirm('do you want to retrieve this employee?')){
      var data = {'id':id,'crud_type':'retrieve'};
      $.ajax({
        type:'POST',
        dataType:'JSON',
        url:base_url+'Admin/employee_form',
        data:data,
        success:function(datareturn)
        {
          if(datareturn != 0){
            alert_redirection('Success','Employee successfully retrieved',base_url+'cms/a_employee','success');
          }
        },
      });
      }
  }
}
</script>