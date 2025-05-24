<div class="container-fluid">

          
          <!-- Outer Row -->
          <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

              <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                      <div class="p-5">
                        <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4">Change Profile Picture</h1>
                        </div>
                        <?php if(get_myuser_info_employee('photo') == ''){ ?>
                            <image src="<?=base_url()?>assets/sb-admin/img/undraw_profile.svg" id="imgdatauser" style="width:100%;height:auto">
                        <?php }else{ ?>
                          <image src="<?=base_url()?>userside/<?=user_session_val()?>/<?=get_myuser_info_employee('photo')?>" id="imgdatauser" style="width:100%;height:auto">
                        <?php } ?>
                            <h1 style="width: 100%;text-align: center;"><button class="btn btn-success btn-lg" onclick="upload_background()">Upload</button></h1>
                            </image>
                      </div>
                      <div class="p-5">  
                        <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
                        </div>
                        <form class="userchangepass" id="userchangepass">
                          
                          
                          <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" value="" id="cpassword" class="form-control form-control-user" placeholder="Password" required autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            <input type="checkbox" onclick="myFunction1()"> Show Password
                          </div>
                          <div class="form-group">
                              
                            <label>New Password</label>
                            <input class="form-control" type="password" placeholder="New password" required autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="new_password" id="new_password"/>
                            <input type="checkbox" onclick="myFunction2()"> Show Password
                              
                          </div>

                          <div class="form-group">
                              
                            <label>Retype Password</label>
                            <input class="form-control" type="password" placeholder="Retype password" required autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="retype_password" id="retype_password"/>
                            <input type="checkbox" onclick="myFunction3()"> Show Password
                                  
                              
                          </div>
                          <button type="submit" class="btn btn-primary btn-user btn-block">
                            Submit
                          </button>
                          
                        </form>
                        <form style="display: none;" id="uploadForm2" action="<?=base_url()?>User/upload_image" method="POST" enctype="multipart/form-data">
                          <input type="file" name="file" id="clicked_image_background" accept="image/*">
                        </form>
                      </div>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                      <div class="p-5">  
                        <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4">Change Profile</h1>
                        </div>
                        <form class="userchange" id="userchange">
                          
                          <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" value="<?=get_myuser_info_employee('firstname')?>" id="firstname" class="form-control form-control-user" placeholder="First Name" required autocomplete="off">
                          </div>
                          <div class="form-group">
                            <label>Middlename</label>
                            <input type="text" value="<?=get_myuser_info_employee('middlename')?>" id="middlename" class="form-control form-control-user" placeholder="Middle Name" autocomplete="off">
                          </div>
                          <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" value="<?=get_myuser_info_employee('lastname')?>" id="lastname" class="form-control form-control-user" placeholder="Last Name" required autocomplete="off">
                          </div>

                          <div class="form-group">
                            <label>Address</label>
                            <textarea title="address" id="address" class="form-control form-control-user" placeholder="Address" required autocomplete="off"><?=get_myuser_info_employee('address')?>
                            </textarea>
                          </div>
                          <div class="form-group">
                            <label>Birthdate</label>
                            <input type="date" value="<?=get_myuser_info_employee('birthdate')?>" id="birthdate" class="form-control form-control-user" placeholder="birthdate" required autocomplete="off">
                          </div>
                          <div class="form-group">
                            <label>Contact Info</label>
                            <input type="text" value="<?=get_myuser_info_employee('contact_info')?>" id="contact_info" class="form-control form-control-user" placeholder="" required autocomplete="off">
                          </div>
                          <div class="form-group">
                            <label>Gender</label>
                            <select id="gender" class="form-control form-control-user" placeholder="" required autocomplete="off">
                              <option <?=(get_myuser_info_employee('gender') == 'Male')?'selected':''?>>Male</option>
                              <option <?=(get_myuser_info_employee('gender') == 'Female')?'selected':''?>>Female</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Position</label>
                            <input type="text" value="<?=get_myuser_info_employee('description')?>" id="description" class="form-control form-control-user" placeholder="" required autocomplete="off" readonly>
                          </div>
                          <div class="form-group">
                            <label>Schedule</label>
                            <input type="text" value="<?=date('H:i:s a', strtotime(get_myuser_info_employee('time_in')))?> - <?=date('H:i:s a', strtotime(get_myuser_info_employee('time_out')))?>" id="time_in" class="form-control form-control-user" placeholder="" required autocomplete="off" readonly>
                          </div>


                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" value="<?=get_myuser_info_employee('username')?>" id="username" class="form-control form-control-user" placeholder="username" required autocomplete="off">
                          </div>
                          <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" value="" id="password" class="form-control form-control-user" placeholder="Password" required autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            <input type="checkbox" onclick="myFunction()"> Show Password
                          </div>
                          <button type="submit" class="btn btn-primary btn-user btn-block">
                            Submit
                          </button>
                          
                        </form>
                        <form style="display: none;" id="uploadForm2" action="<?=base_url()?>User/upload_image" method="POST" enctype="multipart/form-data">
                          <input type="file" name="file" id="clicked_image_background" accept="image/*">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>

        


        </div>
        
      </div>


<script>
  
  $(document).on('submit', '#userchange', function(event){
          event.preventDefault();
          var lastname = $('#userchange #lastname').val();
          var firstname = $('#userchange #firstname').val();
          var middlename = $('#userchange #middlename').val();
          var username = $('#userchange #username').val();
          var password = $('#userchange #password').val();
          var address = $('#userchange #address').val();
          var birthdate = $('#userchange #birthdate').val();
          var contact_info = $('#userchange #contact_info').val();
          var gender = $('#userchange #gender').val();

          var data = {
            'lastname':lastname,
            'firstname':firstname,
            'middlename':middlename,
            'username':username,
            // 'password':btoa(password),
            'address' : address,
            'birthdate' : birthdate,
            'contact_info' : contact_info,
            'gender' : gender,
          };
          var truepass = `<?=base64_decode(get_myuser_info_employee('password'))?>`;
          // alert(JSON.stringify(data));
          if(password != truepass){
            alert("Wrong password. please try again");
          }else{
            $.ajax({
              type:'POST',
              dataType:'JSON',
              url:base_url+'User/change_my_info',
              data:data,
              success:function(data)
              {
                if(data == 1){
                  alert('User Info Change');
                  // location.reload();
                }else{
                  alert('There`s something error please reload the page');
                }
              }

            });
          }
        });

  $(document).on('submit', '#userchangepass', function(event){
          event.preventDefault();
          var cpassword = $('#userchangepass #cpassword').val();
          var new_password = $('#userchangepass #new_password').val();
          var retype_password = $('#userchangepass #retype_password').val();
          



          var data = {
            'cpassword':cpassword,
            'new_password':new_password,
            'password':btoa(retype_password),
            
          };
          var truepass = `<?=base64_decode(get_myuser_info_employee('password'))?>`;
          // alert(JSON.stringify(data));
          if(cpassword != truepass){
            alert("Wrong password. please try again");
          }else if(new_password != retype_password){
            alert("New password and current password is not match");
          }else{
            $.ajax({
              type:'POST',
              dataType:'JSON',
              url:base_url+'User/change_my_password',
              data:data,
              success:function(data)
              {
                if(data == 1){
                  alert('Password Successfully Updated');
                  location.reload();
                }else{
                  alert('There`s something error please reload the page');
                }
              }

            });
          }
        });
  function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function myFunction1() {
    var x = document.getElementById("cpassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function myFunction2() {
    var x = document.getElementById("new_password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function myFunction3() {
    var x = document.getElementById("retype_password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
    
  function logout(){
    localStorage.removeItem("id");
    window.location = "login.html";
  }

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
        url: base_url+"User/upload_image",
        beforeSubmit: function(data){
          $('.loader_thumb').removeAttr('style');
        },
        uploadProgress: function (event, position, total, progress){
          $('.loader_thumb').removeAttr('style');
        },
        success: function(data){
            // if(data.status !== 'success'){

            //     if (data.msg == "The filetype you are attempting to upload is not allowed.") {
            //         var pop_msg = ""+'Invalid file type upload files in png, jpeg or jpg format only'+"";
            //     }else{
            //         var pop_msg = data.msg;
            //     }
            //       alert('Error',pop_msg);


            //   } else {
                $('body').removeAttr('style');
                $('.loader_thumb').attr('style','display:none;');
                alert('Upload Success');        
                // alert(JSON.stringify(data));        
                $('#imgdatauser').attr('src',base_url+'userside/'+`<?=user_session_val()?>`+'/'+data.file_data.file_name);
                $('.img-profile.rounded-circle').attr('src',base_url+'userside/'+`<?=user_session_val()?>`+'/'+data.file_data.file_name);
              // }

        },
        resetForm: true
      });
  });
</script>

<style type="text/css">
  .col-lg-12 .p-5 {
    padding: 1rem!important;
  }

  #content{
    height: auto !important;
  }
</style>


<style type="text/css">
  .container-fluid{
    padding-left: 10px !important;
    padding-right: 10px !important;
  }
</style>