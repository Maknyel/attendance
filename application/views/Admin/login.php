<!DOCTYPE html>
<html lang="en">
<head>
  <title><?=$title?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_login/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_login/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_login/css/main.css">
<!--===============================================================================================-->



        <!-- sweetalert -->
        <link href="<?php echo base_url(); ?>assets/admin_login/plugin/sweetalert/sweetalert2.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/admin_login/plugin/sweetalert/sweetalert2.all.min.js" rel="stylesheet"></script>
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="<?=global_icon()?>" alt="IMG" style="width:100%;height:auto;">
        </div>

        <form id="login" class="login100-form validate-form">
          <span class="login100-form-title">
            Login
          </span>

          <div class="wrap-input100">
            <input class="input100" type="text" id="username" name="username" placeholder="Username" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100">
            <input class="input100" type="password" id="password" name="pass" placeholder="Password" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" id="loginbutton">
              Login
            </button>

            <div class="text-center p-t-12">
            <span class="txt1">
            
            </span>
            <!-- <a class="txt2" href="#" data-toggle="modal" data-target="#forgetpass">
            Forgot Password
            </a> -->
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->  
  <script src="<?=base_url()?>assets/admin_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url()?>assets/admin_login/vendor/bootstrap/js/popper.js"></script>
  <script src="<?=base_url()?>assets/admin_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url()?>assets/admin_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url()?>assets/admin_login/vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="<?=base_url()?>assets/admin_login/js/main.js"></script>

</body>
</html>

<script type="text/javascript">
  var base_url = '<?=base_url()?>';
  
  $(document).on('submit', '#login', function(event){
    $("#loginbutton").attr("disabled","disabled");
    event.preventDefault();
    var username = $('#login #username').val();
    var password = $('#login #password').val();

    var data = {'username':username,'password':password};
    $.ajax({
      type:'POST',
      dataType:'JSON',
      url:base_url+'Admin/login_submit',
      data:data,
      success:function(datareturn)
      {
        $("#loginbutton").removeAttr("disabled");
        if(datareturn['is_success'] != 0){
          alert_redirection('Success','Welcome!',base_url+'cms','success');
        }else{
          alertfunction('Error',datareturn['message'],'error');
        }
      },
          error: function(XMLHttpRequest, textStatus, errorThrown) {

              // alert(textStatus);
              // alert(JSON.stringify(XMLHttpRequest));
              // alert(errorThrown);
            }

    });
  });



  function alertfunction(title,content,smile_emo){
      setTimeout(function () {
          Swal.fire({
          allowOutsideClick: false,
            title: title,
            text: content,
            icon: smile_emo,
            confirmButtonText: 'OK',
          })
      }, 100);
  };

  function alert_redirection(title,content,redirect,smile_emo){
      setTimeout(function () {
          Swal.fire({
          allowOutsideClick: false,
            title: title,
            text: content,
            icon: smile_emo,
            confirmButtonText: 'OK',
          }).then(function() {
              window.location = redirect;
          })
      }, 100);
  };          
</script>