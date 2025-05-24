<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=global_title()?></title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>assets/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>assets/sb-admin/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background: url('<?=global_icon()?>');background-size: contain;background-repeat: no-repeat;background-position: center;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?=global_title()?></h1>
                                    </div>
                                    <form id="login_data">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" aria-describedby="emailHelp"
                                                placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>assets/sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>assets/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>assets/sb-admin/js/sb-admin-2.min.js"></script>

</body>

</html>

<script>
  $(document).on('submit','#login_data',function(e){
          e.preventDefault();
          var base_url = `<?=base_url()?>`;
          var username = $('#login_data #username').val();
          var password = $('#login_data #password').val();
              var data_all = {'username':username,'password':password};
            // alert(JSON.stringify(data_all));
            $.ajax({
                type:'POST',
                dataType:'JSON',
                url:base_url+'User/login_submit',
                data:data_all,
                success:function(data_return)
                {


                    if(data_return['is_success'] != 0){
                      alert("Check your email for one time pin.");
                      window.location = base_url+"authentication";
                    }else{
                        alert(data_return['message']);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus);
                    alert(JSON.stringify(XMLHttpRequest));
                    alert(errorThrown);
                    if (textStatus == 'timeout') {

                    alert('Timeout Error');

                    } else {

                    alert('Network problem. Please try again');

                    }
                  }
            });


      });
</script>
