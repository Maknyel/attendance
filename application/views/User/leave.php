

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?=$page?></h1>
                        <h1 class="pull-right">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#leave_modal"><span class="fa fa-plus"></span></button>
                        </h1>
                    </div>


                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Leave Used/ Credits</h6>
                                          
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">

                                        <?php foreach (get_all_leave_type() as $key => $value) { ?>
                                            <div class="col-4">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                        <h6 class="m-0 font-weight-bold text-primary"><?=$value['leave_name']?></h6>     
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <!-- <h1><?=leave_count('annual')?></h1> -->
                                                        <h1><?=minus_leave($value['leave_id'])?></h1>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        


                                        <!-- <div class="col-4">
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary">Sick Leave</h6>     
                                                </div>
                                                <div class="card-body text-center">
                                                    <h1><?=leave_count('sick')?></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary">No Pay Leave</h6>     
                                                </div>
                                                <div class="card-body text-center">
                                                    <h1><?=leave_count('no_pay')?></h1>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>    
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Leave History</h1>
                    </div>
                    <div class="row">
                        <?php foreach (get_all_leaves() as $key => $value) { ?>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary"><?=($value['leave_name'])?></h6> 
                                        <div class="pull-right">
                                            <?php if($value['hr_approved'] != 1 && $value['hr_approved'] != 2){ ?>
                                                <button type="button" class="option_110px btn btn-danger" onclick="leave_option('delete',`<?=$value['leave_id']?>`);"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            <?php } ?>
                                        </div>    
                                    </div>
                                    <div class="card-body">
                                        <p>Date: <?=date('M d, Y', strtotime($value['date_leave']))?></p>
                                        <p>No. of Days: <?=($value['is_half_day'] == '0')?'1':'0.5'?></p>
                                        <p>Reason: <?=($value['reason'])?></p>
                                        <?php if ($value['hr_approved'] == '2'){ ?>
                                            <p>Declined Reason: <?=($value['decline_reason'])?></p>
                                        <?php } ?>
                                        <?php if ($value['file_uploaded'] != ''){ ?>
                                            <p>Proof: <a href="<?=base_url()?>userside/<?=$value['employee_id']?>/leave_proof/<?=($value['file_uploaded'])?>" download>Download</a></p>
                                        <?php } ?>
                                        <p>Status: <?=($value['hr_approved'] == '1')?'Approved':(($value['hr_approved'] == '2')?'Declined':'Pending')?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                            
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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
              alert('Leave successfully leave');
              location.reload();
            }
          },
        });
        }
    }
}
$(window).ready(function(){

});

</script>


<div class="modal fade" id="leave_modal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">File Leave</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form id="leave_form">
                      <div class="modal-body">
                        <div class="form-group">
                            <label for="leave_type">Leave Type</label>
                            <select class="form-control" id="leave_type" required>
                                <?php foreach (get_all_leave_type() as $key => $value) { ?>
                                    <?php if(minus_leave($value['leave_id']) != 0){ ?>
                                        <option value="<?=$value['leave_id']?>"><?=$value['leave_name']?></option>
                                    <?php } ?>
                                <?php } ?>
                                
                                
                                
                                
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="date_leave">Date</label>
                                    <input type="date" min="<?=date('Y-m-d')?>" class="form-control" id="date_leave" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="is_half_day">Half/ Wholeday</label>
                                    <select class="form-control" id="is_half_day" required>
                                        <option value="0">Wholeday</option>
                                        <option value="1">Halfday</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reason">Reason</label>
                            <textarea class="form-control" id="reason" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="file_uploaded">Proof</label>
                            <input type="hidden" class="form-control" id="file_uploaded" required>
                            <div class="text-center">
                                <button id="file_uploaded_upload" class="btn btn-primary text-center" type="button" onclick="upload_background()">Upload</button>
                                <div class="download_option"></div>    
                            </div>
                            
                        </div>                            
                      </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" id="leavebutton" class="btn btn-info submit-btn">Submit</button>
                          
                      </div>
                  </form>
                    <form style="display: none;" id="uploadForm2" action="<?=base_url()?>User/leave_proof" method="POST" enctype="multipart/form-data">
                        <input type="file" name="file" id="clicked_image_background" accept="image/*">
                    </form>
                </div>

              </div>
            </div>


<script type="text/javascript">
    function upload_background(){
        $('#clicked_image_background').click();
    }

    $(document).on('change','#clicked_image_background',function(e){
      e.preventDefault();
      $('.loader_thumb').removeAttr('style');
      $('body').attr('style','overflow:hidden');
      var form = $('#uploadForm2')[0];

      // Create an FormData object
      var dataString = new FormData(form);

      // alert(dataString);
          var uploadtracing = $('#uploadForm2');
          $.ajax({
            type:'POST',
            dataType: "json",
            data: dataString,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            // timeout: 600000,
            url: base_url+"User/leave_proof",
            beforeSubmit: function(data){
              $('.loader_thumb').removeAttr('style');
            },
            uploadProgress: function (event, position, total, progress){
              $('.loader_thumb').removeAttr('style');
            },
            success: function(data){
                if(data.status !== 'success'){

                    if (data.msg == "The filetype you are attempting to upload is not allowed.") {
                        var pop_msg = ""+'Invalid file type upload files in png, jpeg or jpg format only'+"";
                    }else{
                        var pop_msg = data.msg;
                    }
                      alert(pop_msg);


                  } else {
                    $('#leave_form #file_uploaded').val(data.file_data.file_name);
                    $('#file_uploaded_upload').hide();
                    $('.download_option').append('<a href="'+base_url+'userside/'+`<?=user_session_val()?>`+'/leave_proof/'+data.file_data.file_name+'" download>Download</a>');
                    // alert(data.file_data.file_name);
                  }

            },
            resetForm: true
          });
    });
    $(document).on('submit', '#leave_form', function(event){
        $("#leave_form #leavebutton").attr("disabled","disabled");
            event.preventDefault();
            var leave_type = $('#leave_form #leave_type').val();
            var date_leave = $('#leave_form #date_leave').val();
            var is_half_day = $('#leave_form #is_half_day').val();
            var reason = $('#leave_form #reason').val();
            var file_uploaded = $('#leave_form #file_uploaded').val();


            var data = {
              'reason'          : reason,
              'leave_type'      : leave_type,
              'date_leave'      : date_leave,
              'is_half_day'     : is_half_day,
              'file_uploaded'   : file_uploaded
            };
            $.ajax({
              type:'POST',
              dataType:'JSON',
              url:base_url+'User/leave_form',
              data:data,
              success:function(datareturn)
              {
                $("#leave_form #leavebutton").removeAttr("disabled");
                if(datareturn != 0){

                      app.alert_redirection('Success','Leave successfully added',base_url+'leave','success');

                }else{
                      app.alert_redirection('Error','There is something wrong, please press ok to refresh page',base_url+'leave','error');
                }
              },
            });
        });
</script>