

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?=$page?></h1>

                    </div>


                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card shadow mb-4" style="max-width: 500px;">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
                                    <div class="dropdown no-arrow">

                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                      <div class="col-6 text-center">
                                        <p>Time In</p>
                                        <span class="btn btn-info btn-sm" id="time_in"></span>
                                      </div>
                                      <div class="col-6 text-center">
                                        <p>Time Out</p>
                                        <span class="btn btn-info btn-sm" id="time_out"></span>
                                      </div>
                                    </div>
                                    <img src="<?=global_icon()?>" width="100%" height="auto;">
                                    <div id="timeinorout" style="width:100%;text-align:center;padding:10px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        </div>


                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<script>

$(window).ready(function(){
    firstload();
});
  function firstload(){
      // $('#sidebarToggleTop').click();

      $.ajax({
          type:'POST',
          dataType:'JSON',
          url:base_url+'User/check_timein_record_user',
          data:{},
          success:function(data_return)
          {
            if(data_return['message'] == ""){
                $('#timeinorout').html("<button onclick='timeinout()' class='btn btn-info'>TIMEIN</button>");
                $('#time_in').html("N/A");
                $('#time_out').html("N/A");
            }else{
              if(data_return['message']['time_out'] == "00:00:00"){
                $('#timeinorout').html("<button onclick='timeinout_function()' class='btn btn-info'>TIMEOUT</button>");
              }
              if(data_return['message']['time_in'] != "00:00:00"){
                $('#time_in').html(data_return['message']['time_in']);
              }else{
                $('#time_in').html("N/A");
              }

              if(data_return['message']['time_out'] != "00:00:00"){
                $('#time_out').html(data_return['message']['time_out']);
              }else{
                $('#time_out').html("N/A");
              }

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


  }

  function timeinout_function(){
    // var person = prompt("Please type your report");
    // if (person != null) {
      $.ajax({
          type:'POST',
          dataType:'JSON',
          url:base_url+'User/attendance_post',
          data:{},
          success:function(data_return)
          {
              alert(data_return['message']);
              location.reload();
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
    // }

  }

  function timeinout(){
    $.ajax({
        type:'POST',
        dataType:'JSON',
        url:base_url+'User/attendance_post',
        data:{'id':localStorage.getItem("username")},
        success:function(data_return)
        {
            alert(data_return['message']);
            location.reload();
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
  }
</script>
