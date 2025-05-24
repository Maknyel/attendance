<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
            <div style="text-align: right;width: 100%;">
                <div>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#employee_modal" onclick="crud_employee('add','');"><span class="fa fa-plus"></span> Add</button>
                </div>

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
                      <th>SSS</th>
                      <th>PHIC</th>
                      <th>HDMF</th>
                      <th>TIN</th>


                    </tr>
                </thead>
                <tbody>
                  <?php foreach (get_all_employee_datatables() as $key => $value) { 
                  	
                  ?>
                    <tr>
                        <td>
                          <button type="button" class="option_110px btn btn-warning" data-toggle="modal" data-target="#employee_modal" onclick="crud_employee('edit',`<?=$value['id']?>`);"><i class="fa fa-pen" aria-hidden="true"></i> Edit</button><br/><br/>
                          <button type="button" class="option_110px btn btn-danger" onclick="crud_employee('delete',`<?=$value['id']?>`);"><i class="fa fa-archive" aria-hidden="true"></i> Archive</button><br/><br/>

                          <button type="button" class="option_110px btn btn-default" onclick="window.location = `<?=base_url()?>cms/view_employee/<?=$value['id']?>`"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
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
                        <td><?=($value['sss'])?></td>
                        <td><?=($value['philhealth'])?></td>
                        <td><?=($value['landbank'])?></td>
                        <td><?=($value['tin'])?></td>
                    </tr>
                  <?php } ?>



                </tbody>
              </table>
            </div>

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


                      $('#employee_form #sss').val(datareturn['sss']);
                      $('#employee_form #philhealth').val(datareturn['philhealth']);
                      $('#employee_form #landbank').val(datareturn['landbank']);
                      $('#employee_form #tin').val(datareturn['tin']);

                      $('#employee_form #username').val(datareturn['username']);
                      $('#employee_form #password').val(atob(datareturn['password']));
                      $('#employee_form #employee_type').val((datareturn['employee_type']));

                    },
                  });
                }else if(crud_type == 'delete'){
                  if(confirm('do you want to archive this employee?')){
                    var data = {'id':id,'crud_type':'delete'};
                    $.ajax({
                      type:'POST',
                      dataType:'JSON',
                      url:base_url+'Admin/employee_form',
                      data:data,
                      success:function(datareturn)
                      {
                        if(datareturn != 0){
                          alert_redirection('Success','Employee successfully archieved',base_url+'cms/employee','success');
                        }
                      },
                    });
                    }
                }
              }

              $(document).on('submit', '#employee_form', function(event){
                  $("#employee_form #employeebutton").attr("disabled","disabled");
                    event.preventDefault();
                    var crud_type = $('#employee_form #crud_type').val();
                    

                    // var employee_id = $('#employee_form #employee_id').val();
                    // var firstname = $('#employee_form #firstname').val();


                    var employee_id = $('#employee_form #employee_id').val();                  
                    var firstname = $('#employee_form #firstname').val();

                    var lastname = $('#employee_form #lastname').val();
                    var address = $('#employee_form #address').val();
                    var birthdate = $('#employee_form #birthdate').val();
                    var contact_info = $('#employee_form #contact_info').val();
                    var gender = $('#employee_form #gender').val();
                    var position_id = $('#employee_form #position_id').val();
                    var schedule_id = $('#employee_form #schedule_id').val();

                    var username = $('#employee_form #username').val();
                    var password = $('#employee_form #password').val();
                    var email = $('#employee_form #email').val();
                    var employee_type = $('#employee_form #employee_type').val();

                    var sss = $('#employee_form #sss').val();
                    var philhealth = $('#employee_form #philhealth').val();
                    var landbank = $('#employee_form #landbank').val();
                    var tin = $('#employee_form #tin').val();
                    


                    var id = $('#employee_form #id').val();


                    var data = {
                      'id'              : id,
                      'crud_type'       : crud_type,
                      'employee_id'     : employee_id,
                      'firstname'       : firstname,
                      'lastname'        : lastname,
                      'address'         : address,
                      'birthdate'       : birthdate,
                      'contact_info'    : contact_info,
                      'gender'          : gender,
                      'position_id'     : position_id,
                      'schedule_id'     : schedule_id,
                      'username'        : username,
                      'password'        : password,
                      'email'           : email,
                      'employee_type'   : employee_type,
                      'sss'             : sss,
                      'philhealth'      : philhealth,
                      'landbank'        : landbank,
                      'tin'             : tin

                    };
                    $.ajax({
                      type:'POST',
                      dataType:'JSON',
                      url:base_url+'Admin/employee_form',
                      data:data,
                      success:function(datareturn)
                      {
                        $("#employee_form #employeebutton").removeAttr("disabled");
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
                              alert_redirection('Success','Employee successfully '+x,base_url+'cms/employee','success');

                        }else{
                              alert_redirection('Error','There is something wrong, please press ok to refresh page',base_url+'cms/employee','error');
                        }
                      },
                    });
                });

              </script>

            <div class="modal fade" id="employee_modal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Employee</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form id="employee_form">
                      <div class="modal-body">
                      		<input type="hidden" class="form-control" id="id">
                            <input type="hidden" class="form-control" id="crud_type">
                          	<div class="form-group">
                              	<label for="employee_id">Employee Id</label>
                              	<input type="text" class="form-control" id="employee_id" required>
                          	</div>
                            <div class="row">
                              <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" class="form-control" id="firstname" required>
                                </div>
                              </div>
                              <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" required>
                                </div>
                              </div>
                          	</div>
                            <div class="row">
                              <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" class="form-control" id="lastname" required>
                                </div>
                              </div>
                              <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <label for="address">Address</label>
                                  <textarea class="form-control" id="address" required></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-12 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <label for="birthdate">Birthdate</label>
                                  <input type="date" class="form-control" id="birthdate" required>
                                </div>
                              </div>
                              <div class="col-12 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <label for="contact_info">Contact Info</label>
                                  <input type="text" class="form-control" id="contact_info" required>
                                </div>
                              </div>
                              <div class="col-12 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <label for="gender">Gender</label>
                                  <select class="form-control" id="gender" required>
                                    <option>Male</option>
                                    <option>Female</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <label for="position_id">Position</label>
                                  <select class="form-control" id="position_id" required>
                                    <?php foreach (get_all_position_datatables() as $key => $value) { ?>
                                      <option value="<?=$value['id']?>"><?=$value['description']?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <label for="schedule_id">Schedule</label>
                                  <select class="form-control" id="schedule_id" required>
                                    <?php foreach (get_all_schedule_datatables() as $key => $value) { ?>
                                      <option value="<?=$value['id']?>"><?=date('H:i:s a', strtotime($value['time_in']))?> - <?=date('H:i:s a', strtotime($value['time_out']))?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="employee_type">Employee Type</label>
                              <select class="form-control" id="employee_type" required>
                                <?php foreach (get_all_employee_type() as $key => $value) { ?>
                                  <option value="<?=$value['id']?>"><?=$value['type']?></option>
                                <?php } ?>
                              </select>
                            </div>

                            <div class="row">
                              <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="sss">SSS</label>
                                    <input type="text" class="form-control" id="sss" required>
                                </div>
                              </div>

                              <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="philhealth">PHIC</label>
                                    <input type="text" class="form-control" id="philhealth" required>
                                </div>
                              </div>
                              
                              <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="landbank">HDMF</label>
                                    <input type="text" class="form-control" id="landbank" required>
                                </div>
                              </div>
                              
                              <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="tin">TIN</label>
                                    <input type="text" class="form-control" id="tin" required>
                                </div>
                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <label for="username">Username</label>
                                  <input type="text" class="form-control" id="username" required>
                                </div>
                              </div>
                              <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <label for="password">Password</label>
                                  <input type="password" class="form-control" id="password" required>
                                </div>
                              </div>
                            </div>



                          	

                      </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" id="employeebutton" class="btn btn-info submit-btn">Submit</button>
                          
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