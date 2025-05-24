<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
            <div style="text-align: right;width: 100%;">
                <div>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#position_modal" onclick="crud_position('add','');"><span class="fa fa-plus"></span> Add</button>
                </div>

            </div>
            <div class="table-responsive">
              <table id="table_id" class="table table-striped">
                <thead>
                    <tr>
                      <th>Options</th>
                      <th>Position</th>
  		                <th>Rate</th>

                    </tr>
                </thead>
                <tbody>
                  <?php foreach (get_all_position_datatables() as $key => $value) { 
                  	
                  ?>
                    <tr>
                        <td>
                          <button type="button" class="option_110px btn btn-warning" data-toggle="modal" data-target="#position_modal" onclick="crud_position('edit',`<?=$value['id']?>`);"><i class="fa fa-pen" aria-hidden="true"></i> Edit</button><br/><br/>
                          <button type="button" class="option_110px btn btn-danger" onclick="crud_position('delete',`<?=$value['id']?>`);"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </td>
                        <td><?=$value['description']?></td>
                        <td><?=number_format($value['rate'], 2)?></td>
                    </tr>
                  <?php } ?>



                </tbody>
              </table>
            </div>

            <script type="text/javascript">
              function crud_position(crud_type,id){
                $('#position_form #id').val(id);
                $('#position_form #crud_type').val(crud_type);
                if(crud_type == 'edit'){
                  var data = {'id':id,'crud_type':'get_by_id'};
                  $.ajax({
                    type:'POST',
                    dataType:'JSON',
                    url:base_url+'Admin/position_form',
                    data:data,
                    success:function(datareturn)
                    {
                      $('#position_form #description').val(datareturn['description']);                  
                      $('#position_form #rate').val(datareturn['rate']);

                    },
                  });
                }else if(crud_type == 'delete'){
                  if(confirm('do you want to delete this position?')){
                    var data = {'id':id,'crud_type':'delete'};
                    $.ajax({
                      type:'POST',
                      dataType:'JSON',
                      url:base_url+'Admin/position_form',
                      data:data,
                      success:function(datareturn)
                      {
                        if(datareturn != 0){
                          alert_redirection('Success','Position successfully deleted',base_url+'cms/position','success');
                        }
                      },
                    });
                    }
                }
              }

              $(document).on('submit', '#position_form', function(event){
                  $("#position_form #positionbutton").attr("disabled","disabled");
                    event.preventDefault();
                    var crud_type = $('#position_form #crud_type').val();
                    var description = $('#position_form #description').val();
                    var rate = $('#position_form #rate').val();
                    var id = $('#position_form #id').val();


                    var data = {
                      'id'              : id,
                      'crud_type'       : crud_type,
                      'description'     : description,
                      'rate'     				: rate,
                    };
                    $.ajax({
                      type:'POST',
                      dataType:'JSON',
                      url:base_url+'Admin/position_form',
                      data:data,
                      success:function(datareturn)
                      {
                        $("#position_form #positionbutton").removeAttr("disabled");
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
                              alert_redirection('Success','Position successfully '+x,base_url+'cms/position','success');

                        }else{
                              alert_redirection('Error','There is something wrong, please press ok to refresh page',base_url+'cms/position','error');
                        }
                      },
                    });
                });

              </script>

            <div class="modal fade" id="position_modal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Position</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form id="position_form">
                      <div class="modal-body">
                      		<input type="hidden" class="form-control" id="id">
                            <input type="hidden" class="form-control" id="crud_type">
                          	<div class="form-group">
                              	<label for="description">Position</label>
                              	<input type="text" class="form-control" id="description" required>
                                
                          	</div>

                          	<div class="form-group">
                              	<label for="rate">Rate</label>
                              	<input type="rate" class="form-control" id="rate" required>
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


