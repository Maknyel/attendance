<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
            <div style="text-align: right;width: 100%;">
                <div>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#employee_modal" onclick="crud_employee_type('add','');"><span class="fa fa-plus"></span> Add</button>
                </div>

            </div>
            <div class="table-responsive">
              <table id="table_id" class="table table-striped">
                <thead>
                    <tr>
                      <th>Options</th>
                      <th>Employee Type</th>
  		              
                    </tr>
                </thead>
                <tbody>
                  <?php foreach (get_all_employee_type() as $key => $value) { 
                  	
                  ?>
                    <tr>
                        <td>
                          <button type="button" class="option_110px btn btn-warning" data-toggle="modal" data-target="#employee_modal" onclick="crud_employee_type('edit',`<?=$value['id']?>`);"><i class="fa fa-pen" aria-hidden="true"></i> Edit</button><br/><br/>
                        </td>
                        <td><?=$value['type']?></td>
                    </tr>
                  <?php } ?>



                </tbody>
              </table>
            </div>

            <script type="text/javascript">
              function crud_employee_type(crud_type,id){
                $('#employee_type_form #id').val(id);
                $('#employee_type_form #crud_type').val(crud_type);
                if(crud_type == 'edit'){
                  var data = {'id':id,'crud_type':'get_by_id'};
                  $.ajax({
                    type:'POST',
                    dataType:'JSON',
                    url:base_url+'Admin/employee_type_form',
                    data:data,
                    success:function(datareturn)
                    {
                      $('#employee_type_form #type').val(datareturn['type']);                  
                     
                    },
                  });
                }else if(crud_type == 'delete'){
                  if(confirm('do you want to delete this position?')){
                    var data = {'id':id,'crud_type':'delete'};
                    $.ajax({
                      type:'POST',
                      dataType:'JSON',
                      url:base_url+'Admin/employee_type_form',
                      data:data,
                      success:function(datareturn)
                      {
                        if(datareturn != 0){
                          alert_redirection('Success','Employee Type successfully deleted',base_url+'cms/employee_type','success');
                        }
                      },
                    });
                    }
                }
              }

              $(document).on('submit', '#employee_type_form', function(event){
                  $("#employee_type_form #positionbutton").attr("disabled","disabled");
                    event.preventDefault();
                    var crud_type = $('#employee_type_form #crud_type').val();
                    var type = $('#employee_type_form #type').val();
                    var id = $('#employee_type_form #id').val();


                    var data = {
                      'id'              : id,
                      'crud_type'       : crud_type,
                      'type'     : type,
                    };
                    $.ajax({
                      type:'POST',
                      dataType:'JSON',
                      url:base_url+'Admin/employee_type_form',
                      data:data,
                      success:function(datareturn)
                      {
                        $("#employee_type_form #positionbutton").removeAttr("disabled");
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
                              alert_redirection('Success','Employee Type successfully '+x,base_url+'cms/employee_type','success');

                        }else{
                              alert_redirection('Error','There is something wrong, please press ok to refresh page',base_url+'cms/employee_type','error');
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
                    <h4 class="modal-title">Employee Type</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form id="employee_type_form">
                      <div class="modal-body">
                      		<input type="hidden" class="form-control" id="id">
                            <input type="hidden" class="form-control" id="crud_type">
                          	<div class="form-group">
                              	<label for="type">Employee Type</label>
                              	<input type="text" class="form-control" id="type" required>
                                
                          	</div>


                          	

                      </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" id="positionbutton" class="btn btn-info submit-btn">Submit</button>
                          
                      </div>
                  </form>
                </div>

              </div>
            </div>
          
      </div>
    </div>
  </div>
</section>


