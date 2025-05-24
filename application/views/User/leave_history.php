

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Leave</h1>
                        
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
                        <h1 class="h3 mb-0 text-gray-800">Leave Types</h1>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Paid Leaves</h3>
                                    <ul class="list-group">
                                        <?php foreach (get_all_leave_type_bytype('paid') as $key => $value) { ?>
                                            <li class="list-group-item"><a href="<?=base_url()?>leave/<?=$value['leave_id']?>"><?=$value['leave_name']?> - <?=count(get_all_leaves($value['leave_id']))?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                                    
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Not Paid Leaves</h3>

                                    <ul class="list-group">
                                        <?php foreach (get_all_leave_type_bytype('not_paid') as $key => $value) { ?>
                                            <li class="list-group-item"><a href="<?=base_url()?>leave/<?=$value['leave_id']?>"><?=$value['leave_name']?> - <?=count(get_all_leaves($value['leave_id']))?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                                    
                        </div>
                        
                            
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
