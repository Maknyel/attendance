

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <!-- small box -->
            <div class="small-box bg-default">
              <div class="inner">
                <h3>Change Profile information</h3>

              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>


              <form id="update_profile_admin" style="margin:10px;">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>First name</label>
                            <input class="form-control" type="text" value="<?=get_myuser_info_cms('firstname')?>" placeholder="Firstname" required name="firstname" id="firstname"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Middle name</label>
                            <input class="form-control" type="text" value="<?=get_myuser_info_cms('middlename')?>" placeholder="Middlename" name="middlename" id="middlename"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Last name</label>
                            <input class="form-control" type="text" value="<?=get_myuser_info_cms('lastname')?>" placeholder="Lastname" required name="lastname" id="lastname"/>
                        </div>
                    </div>

                   
                    
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Username</label>
                            <input class="form-control" type="username" value="<?=get_myuser_info_cms('username')?>" placeholder="username" required name="username" id="username"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Confirmation Password</label>
                            <input class="form-control" type="password" placeholder="Confirmation password" required name="password" id="password"/>
                            <input class="form-control" type="hidden" id="curr_password" value="<?=base64_decode(get_myuser_info_cms('password'))?>"/>
                        </div>
                    </div>
                    <div class="control-group"><br><br>
                        <button type="submit" class="btn btn-success btn-lg pull-right">Submit</button>
                    </div>
                </form><br>


            </div>
          </div>

          <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <!-- small box -->
            <div class="small-box bg-default">
              <div class="inner">
                <h3>Change Profile Picture</h3>

              </div>
              <div class="icon">
                <i class="fa fa-image"></i>
              </div>


                    <form style="display: none;" id="uploadForm2" action="<?php echo base_url();?>Uploadmyimageadmin" method="POST" enctype="multipart/form-data">
                          <input type="file" name="file" id="clicked_image_background" accept="image/*">
                    </form>

                    <div class="container">
                            <div class="div-01">
                                <h5>My Display Image</h5>
                                <image src="<?=base_url()?>user_image_semi/<?=get_myuser_info_cms('id')?>/<?=get_myuser_info_cms('photo')?>" onerror="this.src='<?php echo base_url().'assets/admin_template/dist/img/user2-160x160.jpg' ?>';" id="imgdatauser" style="width:100%;height:auto;">
                                <div style="text-align: center;width: 100%;padding: 10px;">
                                  <h1><a class="btn btn-success btn-lg" onclick="upload_background()">Upload</a></h1>
                                </div>
                            </div>
                          </div>
              

            </div>


            <!-- small box -->
            <div class="small-box bg-default">
              <div class="inner">
                <h3>Change Password</h3>

              </div>
              <div class="icon">
                <i class="fa fa-lock"></i>
              </div>


              <form id="update_password_admin" style="margin:10px;">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Current Password</label>
                            <input class="form-control" type="password" placeholder="Current password" required name="cpassword" id="cpassword"/>
                            <input class="form-control" type="hidden" id="curr_password" value="<?=base64_decode(get_myuser_info_cms('password'))?>"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>New Password</label>
                            <input class="form-control" type="password" placeholder="New password" required name="new_password" id="new_password"/>
                            
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Retype Password</label>
                            <input class="form-control" type="password" placeholder="Retype password" required name="password" id="password"/>
                            
                        </div>
                    </div>


                    <div class="control-group"><br><br>
                        <button type="submit" class="btn btn-success btn-lg pull-right">Submit</button>
                    </div>
                </form><br>


            </div>
          </div>
          
        </div>
        <!-- /.row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->









 <script type="text/javascript">
  function upload_background(){
    $('#clicked_image_background').click();
  }

  $(document).on('change','#clicked_image_background',function(e){
        e.preventDefault();
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
              url: base_url+"Uploadmyimageadmin",
              beforeSubmit: function(data){
                $('.loader_thumb').show();
              },
              uploadProgress: function (event, position, total, progress){
                $('.loader_thumb').show();
              },
              success: function(data){
                  if(data.status !== 'success'){

                      if (data.msg == "The filetype you are attempting to upload is not allowed.") {
                          var pop_msg = ""+'Invalid file type upload files in png, jpeg or jpg format only'+"";
                      }else{
                          var pop_msg = data.msg;
                      }
                        app.alert('Error',pop_msg,'error');


                    } else {
                      location.reload();
                    }

              },
              resetForm: true
            });
        });








   $(document).on('submit', '#update_profile_admin', function(event){
        event.preventDefault();
            var firstname= $('#update_profile_admin #firstname').val();
            var middlename = $('#update_profile_admin #middlename').val();
            var lastname= $('#update_profile_admin #lastname').val();
            var username = $('#update_profile_admin #username').val();
            var password= $('#update_profile_admin #password').val();
            var curr_password= $('#update_profile_admin #curr_password').val();
            var data = {'firstname':firstname,'middlename':middlename,'lastname':lastname,'username':username};
            // alert(JSON.stringify(data));
            if(curr_password != password){
              app.alert('failed','Password is incorrect','error');
            }else{
              $.ajax({
                type:'POST',
                dataType:'JSON',
                url:base_url+'update_profile_admin',
                data:data,
                success:function(data)
                {
                  if(data == 1){
                    app.alert_redirection('Success','Profile Updated',base_url+'cms/profile','success');
                  }else{
                    app.alert('Error','Update profile error','error');
                  }
                },
                  error: function(XMLHttpRequest, textStatus, errorThrown) {

                      if (textStatus == 'timeout') {

                      app.alert('failed','Timeout Error','error');

                      } else {

                      app.alert('failed','Network problem. Please try again','error');

                      }
                    }
              });
            }
        });
   $(document).on('submit', '#update_password_admin', function(event){
        event.preventDefault();
            var cpassword= $('#update_password_admin #cpassword').val();
            var new_password = $('#update_password_admin #new_password').val();
            var password= $('#update_password_admin #password').val();
            var curr_password= $('#update_password_admin #curr_password').val();
            var data = {'password':password};
            // alert(JSON.stringify(data));
            if(curr_password != cpassword){
              app.alert('failed','Password is incorrect','error');
            }else if(new_password != password){
              app.alert('failed','New password and current password is not match','error');
            }else{
              $.ajax({
                type:'POST',
                dataType:'JSON',
                url:base_url+'update_password_admin',
                data:data,
                success:function(data)
                {
                  if(data == 1){
                    app.alert_redirection('Success','Password Updated',base_url+'cms/profile','success');
                  }else{
                    app.alert('Error','Update profile error','error');
                  }
                },
                  error: function(XMLHttpRequest, textStatus, errorThrown) {

                      if (textStatus == 'timeout') {

                      app.alert('failed','Timeout Error','error');

                      } else {

                      app.alert('failed','Network problem. Please try again','error');

                      }
                    }
              });
            }
        });
 </script>