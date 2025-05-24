<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
            <div class="table-responsive">
              <table id="table_id" class="table table-striped">
                <thead>
                    <tr>
                      <th>Option</th>
                      <th>Employee</th>
  		                <th>Date</th>
                      <th>Leave Type</th>
                      <th>Number of Day/s</th>
                      <th>Status</th>
                      <th>Reason</th>
                      <th>File Uploaded</th>
                      <th>Leave Submit</th>

                    </tr>
                </thead>
                <tbody>
                  <?php foreach (get_all_leaves_datatables_pending() as $key => $value) { 
                  	
                  ?>
                    <tr>
                        <td>
                          <!-- <button type="button" class="option_110px btn btn-danger" onclick="crud_leave('2',`<?=$value['leave_id']?>`);"><i class="fa fa-trash" aria-hidden="true"></i>  Decline</button><br/><br/> -->

                          <button type="button" class="option_110px btn btn-danger" onclick="onclickleave('2',`<?=$value['leave_id']?>`);" data-toggle="modal" data-target="#leave_modal"><i class="fa fa-trash" aria-hidden="true"></i>  Decline</button><br/><br/>
                          <button type="button" class="option_110px btn btn-info" onclick="crud_leave('1',`<?=$value['leave_id']?>`);"><i class="fa fa-check" aria-hidden="true"></i>  Approve</button>
                        </td>
                        <td><?=$value['firstname']?> <?=$value['lastname']?></td>
                        <td><?=date('M d, Y', strtotime($value['date_leave']))?></td>
                        <td><?=($value['leave_name'])?></td>
                        <td><?=($value['is_half_day'] == '0')?'1':'0.5'?></td>
                        <td><?=($value['hr_approved'] == '1')?'Approved':(($value['hr_approved'] == '2')?'Declined':'Pending')?></td>
                        <td><?=($value['reason'])?></td>
                        <td>
                          <?php if ($value['file_uploaded'] != ''){ ?>
                              <a href="<?=base_url()?>userside/<?=$value['employee_id']?>/leave_proof/<?=($value['file_uploaded'])?>" download>Download</a>
                          <?php } ?>
                        </td>
                        <td><?=date('M d, Y', strtotime($value['leave_added']))?></td>
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
  function onclickleave(hr_approved,leave_id){
    $('#leave_form #hr_approved').val(hr_approved);
    $('#leave_form #leave_id').val(leave_id);
  }

  function crud_leave(hr_approved,leave_id){
    if(hr_approved == '2'){
      var message = "Do you want to decline this request?";
      var successful = "Successfully Declined leave request";
    }else{
      var message = "Do you want to approve this request?";
      var successful = "Successfully Approved leave request";
    }
    if(confirm(message)){
      var data = {'leave_id':leave_id,'hr_approved':hr_approved,'reason': ""};
        $.ajax({
          type:'POST',
          dataType:'JSON',
          url:base_url+'Admin/update_leave',
          data:data,
          success:function(datareturn)
          {
            if(datareturn != 0){
              alert_redirection('Success',message,base_url+'cms/pending_leaves','success');
            }
          },
        });
    }
  }

  $(document).on('submit', '#leave_form', function(event){
        $("#leave_form #leavebutton").attr("disabled","disabled");
            event.preventDefault();
            var hr_approved = $('#leave_form #hr_approved').val();
            var leave_id = $('#leave_form #leave_id').val();
            var reason = $('#leave_form #reason').val();


            var data = {
              'reason'          : reason,
              'hr_approved'     : hr_approved,
              'leave_id'        : leave_id,
            };
            $.ajax({
              type:'POST',
              dataType:'JSON',
              url:base_url+'Admin/update_leave',
              data:data,
              success:function(datareturn)
              {
                $("#leave_form #leavebutton").removeAttr("disabled");
                if(datareturn != 0){


                      alert_redirection('Success',"Successfully Declined leave request",base_url+'cms/pending_leaves','success');

                }else{
                      alert_redirection('Error','There is something wrong, please press ok to refresh page',base_url+'leave','error');
                }
              },
            });
        });
</script>

<div class="modal fade" id="leave_modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Decline Leave</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="leave_form">
          <div class="modal-body">
           
                <input type="hidden" name="leave_id" id="leave_id">
                <input type="hidden" name="hr_approved" id="hr_approved">
                <div class="form-group">
                    <label for="reason">Reason</label>
                    <textarea class="form-control" id="reason" required></textarea>
                </div>

                

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" id="leavebutton" class="btn btn-info submit-btn">Submit</button>
              
          </div>
      </form>
    </div>

  </div>
</div>

