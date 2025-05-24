<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
            <div style="text-align: right;width: 100%;">
                <div>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#holiday_modal" onclick="crud_holiday('add','');"><span class="fa fa-plus"></span> Add</button>
                </div>

            </div>
            <div class="table-responsive">
              <table id="table_id" class="table table-striped">
                <thead>
                    <tr>
                      <th>Options</th>
                      <th>Name</th>
                      <th>Holiday</th>

                    </tr>
                </thead>
                <tbody>
                  <?php foreach (get_all_holiday_datatables() as $key => $value) { 
                  	
                  ?>
                    <tr>
                        <td>
                          <button type="button" class="option_110px btn btn-warning" data-toggle="modal" data-target="#holiday_modal" onclick="crud_holiday('edit',`<?=$value['regular_holiday']?>`);"><i class="fa fa-pen" aria-hidden="true"></i> Edit</button><br/><br/>
                          <button type="button" class="option_110px btn btn-danger" onclick="crud_holiday('delete',`<?=$value['regular_holiday']?>`);"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </td>
                        <td><?=$value['name']?></td>
                        <td><?=$value['holiday_date']?></td>
                    </tr>
                  <?php } ?>



                </tbody>
              </table>
            </div>

            <script type="text/javascript">
              function crud_holiday(crud_type,regular_holiday){
                $('#holiday_form #regular_holiday').val(regular_holiday);
                $('#holiday_form #crud_type').val(crud_type);
                if(crud_type == 'edit'){
                  var data = {'regular_holiday':regular_holiday,'crud_type':'get_by_id'};
                  $.ajax({
                    type:'POST',
                    dataType:'JSON',
                    url:base_url+'Admin/holiday_form',
                    data:data,
                    success:function(datareturn)
                    {
                      $('#holiday_form #holiday_date').val(datareturn['holiday_date']);                  
                      $('#holiday_form #name').val(datareturn['name']);
                    },
                  });
                }else if(crud_type == 'delete'){
                  if(confirm('do you want to delete this holiday?')){
                    var data = {'regular_holiday':regular_holiday,'crud_type':'delete'};
                    $.ajax({
                      type:'POST',
                      dataType:'JSON',
                      url:base_url+'Admin/holiday_form',
                      data:data,
                      success:function(datareturn)
                      {
                        if(datareturn != 0){
                          alert_redirection('Success','holiday successfully deleted',base_url+'cms/holiday','success');
                        }
                      },
                    });
                    }
                }
              }

              $(document).on('submit', '#holiday_form', function(event){
                  $("#holiday_form #holidaybutton").attr("disabled","disabled");
                    event.preventDefault();
                    var crud_type = $('#holiday_form #crud_type').val();
                    var name = $('#holiday_form #name').val();
                    var holiday_date = $('#holiday_form #holiday_date').val();
                    var regular_holiday = $('#holiday_form #regular_holiday').val();


                    var data = {
                      'regular_holiday'              : regular_holiday,
                      'crud_type'       : crud_type,
                      'holiday_date'     : holiday_date,
                      'name'     : name,
                    };
                    $.ajax({
                      type:'POST',
                      dataType:'JSON',
                      url:base_url+'Admin/holiday_form',
                      data:data,
                      success:function(datareturn)
                      {
                        $("#holiday_form #holidaybutton").removeAttr("disabled");
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
                              alert_redirection('Success','holiday successfully '+x,base_url+'cms/holiday','success');

                        }else{
                              alert_redirection('Error','There is something wrong, please press ok to refresh page',base_url+'cms/holiday','error');
                        }
                      },
                    });
                });

              </script>

            <div class="modal fade" id="holiday_modal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Holiday</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form id="holiday_form">
                      <div class="modal-body">
                      		<input type="hidden" class="form-control" id="regular_holiday">
                            <input type="hidden" class="form-control" id="crud_type">
                            <div class="form-group">
                              	<label for="name">Name</label>
                              	<input type="text" class="form-control" id="name" required>
                                
                          	</div>

                          	<div class="form-group">
                              	<label for="holiday_date">Holiday</label>
                              	<input type="date" class="form-control" id="holiday_date" required>
                                
                          	</div>
                            

                          	

                      </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" id="holidaybutton" class="btn btn-info submit-btn">Submit</button>
                          
                      </div>
                  </form>
                </div>

              </div>
            </div>
          
      </div>
    </div>
  </div>
</section>


