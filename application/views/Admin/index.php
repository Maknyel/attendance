<?php
// echo getWorkingDays("2021-10-01","2021-10-15",pushallholiday());
?>

<?php
if(isset($_GET['year'])){
    $year = $_GET['year'];
}else{
    $year = current_ph_date_year();
}
?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?=dashboard_count('employees')?></h3>

                <p>Total Employees</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="employee.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
               
                <h3><?=dashboard_count('on_time_percentage')?><sup style='font-size: 20px'>%</sup></h3>
                <p>On Time Percentage</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?=dashboard_count('on_time_today')?></h3>
                
                <p>On Time Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-clock"></i>
              </div>
              <a href="attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?=dashboard_count('late_today')?></h3>
                <p>Late Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-alert-circled"></i>
              </div>
              <a href="attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header with-border">
                <h3 class="card-title">Monthly Attendance Report</h3>
                <div class="card-tools pull-right">
                  <form class="form-inline">
                    <div class="form-group">
                      <label>Select Year: </label>
                      <select class="form-control input-sm" id="select_year">
                        <?php
                          for($i=2015; $i<=date('Y'); $i++){
                            $selected = ($i==$year)?'selected':'';
                            echo "
                              <option value='".$i."' ".$selected.">".$i."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <br>
                  <div id="legend" class="text-center"></div>
                  <canvas id="barChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php
  $months = array();
  $ontime = array();
  $late = array();
  for( $m = 1; $m <= 12; $m++ ) {
    $oquery = dashboard_data_count($year,$m,1);
    array_push($ontime, $oquery);

    $lquery = $oquery = dashboard_data_count($year,$m,0);
    array_push($late, $lquery);

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $late = json_encode($late);
  $ontime = json_encode($ontime);

?>
<script>


$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Late',
        fillColor           : 'rgba(210, 214, 222, 1)',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : <?php echo $late; ?>
      },
      {
        label               : 'Ontime',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $ontime; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#00a65a'
  barChartData.datasets[1].strokeColor = '#00a65a'
  barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    scaleBeginAtZero        : true,
    scaleShowGridLines      : true,
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    scaleGridLineWidth      : 1,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines  : true,
    barShowStroke           : true,
    barStrokeWidth          : 2,
    barValueSpacing         : 5,
    barDatasetSpacing       : 1,
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});

$(function(){
  $('#select_year').change(function(){
    window.location.href = '?year='+$(this).val();
  });
});
</script>