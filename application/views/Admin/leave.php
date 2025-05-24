<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
            <div class="table-responsive">
              <table id="table_id" class="table table-striped">
                <thead>
                    <tr>
                      <th>Employee</th>
  		                <th>Date</th>
                      <th>Leave Type</th>
                      <th>Number of Day/s</th>
                      <th>Status</th>
                      <th>Reason</th>
                      <th>Decline Reason</th>
                      <th>File Uploaded</th>
                      <th>Leave Submit</th>
                      <th>Option</th>

                    </tr>
                </thead>
                <tbody>
                  <?php foreach (get_all_leaves_datatables() as $key => $value) { 
                  	
                  ?>
                    <tr>
                        <td><?=$value['firstname']?> <?=$value['lastname']?></td>
                        <td><?=date('M d, Y', strtotime($value['date_leave']))?></td>
                        <td><?=($value['leave_name'])?></td>
                        <td><?=($value['is_half_day'] == '0')?'1':'0.5'?></td>
                        <td><?=($value['hr_approved'] == '1')?'Approved':(($value['hr_approved'] == '2')?'Declined':'Pending')?></td>
                        <td><?=($value['reason'])?></td>
                        <td><?=($value['decline_reason'])?></td>
                        <td>
                          <?php if ($value['file_uploaded'] != ''){ ?>
                              <a href="<?=base_url()?>userside/<?=$value['employee_id']?>/leave_proof/<?=($value['file_uploaded'])?>" download>Download</a>
                          <?php } ?>
                        </td>
                        <td><?=date('M d, Y', strtotime($value['leave_added']))?></td>
                        <td>
                          <button type="button" class="option_110px btn btn-danger" onclick="leave_option('delete',`<?=$value['leave_id']?>`);"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button><br/><br/>
                        </td>
                    </tr>
                  <?php } ?>



                </tbody>
              </table>
            </div>

            

          
      </div>
    </div>
  </div>
</section>


<script>
  function leave_option(crud_type,id){
    if(crud_type == 'delete'){
      if(confirm('do you want to delete this leave?')){
        var data = {'id':id};
        $.ajax({
          type:'POST',
          dataType:'JSON',
          url:base_url+'Admin/delete_leave',
          data:data,
          success:function(datareturn)
          {
            if(datareturn != 0){
              alert_redirection('Success','Leave successfully leave',base_url+'cms/leave','success');
            }
          },
        });
        }
    }
  }
</script>