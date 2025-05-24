

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?=$page?></h1>
                        
                    </div>


                    <div class="row">
                        <?php foreach (get_myyear_all_attendance_datatables() as $key => $value) { ?>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <?php
                                            $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday');
                                            ?>
                                            <?=$days[date('w', strtotime($value['date']))]?>
                                        </h6>     
                                    </div>
                                    <div class="card-body">
                                        <p>Date: <?=date('M d, Y', strtotime($value['date']))?></p>
                                        <p>Time: <?=date('h:i A', strtotime($value['time_in']))?> - <?=date('h:i A', strtotime($value['time_out']))?></p>
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

$(window).ready(function(){

});

</script>


