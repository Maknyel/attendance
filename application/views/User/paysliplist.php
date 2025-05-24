<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$page?></h1>
        
    </div>


    <div class="row">

        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-4">
                
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Payslip List <?=date('Y')?> & <?=date('Y')-1?></h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="card">
                    <div class="card-body">
                      <form method="get" action="<?=base_url()?>payslip" style="margin:10px;">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>From</label>
                                <input class="form-control" type="date" required name="date_from" id="date_from"/>
                            </div>

                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>To</label>
                                <input class="form-control" type="date" required name="date_to" id="date_to"/>
                            </div>
                        </div>
                        <button class="btn btn-success">Submit</button>
                      </form>
                    </div>
                  </div>
                    <ul class="list-group">
                      

                      

                      <?php for ($i=(date('m'))-1; $i > -1; $i--) { ?>
                        <?php
                        $iplus = $i + 1; 
                        if($iplus <= 9){
                          $monthdata = '0'.$iplus;
                        }else{
                          $monthdata = $iplus;
                        }

                        $firstday_firstdaymonth = date('Y').'-'.$monthdata.'-01';
                        $firstday_lastdaymonth = date('Y').'-'.$monthdata.'-15';
                        $v1label = date('M d, Y', strtotime($firstday_firstdaymonth));
                        $v2label = date('M d, Y', strtotime($firstday_lastdaymonth));

                        $lastdayofthemonth = lastday_ofthemonth(date('Y').'-'.$monthdata.'-20');
                        $last_lastmonth = date('Y').'-'.$monthdata.'-16';
                        $last_lastdaymonth = $lastdayofthemonth;
                        $v3label = date('M d, Y', strtotime($last_lastmonth));
                        $v4label = date('M d, Y', strtotime($last_lastdaymonth));

                        ?>
                        
                        <?php if(date('m') == $monthdata){ ?>
                          <?php if(current_ph_date() > $lastdayofthemonth){ ?>
                            <li class="list-group-item"><a href="<?=base_url()?>payslip?date_from=<?=$last_lastmonth?>&date_to=<?=$last_lastdaymonth?>"><?=$v3label?> - <?=$v4label?></a></li>
                          <?php } ?>
                        <?php }else{ ?>
                          <li class="list-group-item"><a href="<?=base_url()?>payslip?date_from=<?=$last_lastmonth?>&date_to=<?=$last_lastdaymonth?>"><?=$v3label?> - <?=$v4label?></a></li>
                        <?php } ?>
                        <li class="list-group-item"><a href="<?=base_url()?>payslip?date_from=<?=$firstday_firstdaymonth?>&date_to=<?=$firstday_lastdaymonth?>"><?=$v1label?> - <?=$v2label?></a></li>
                      <?php } ?>

                      <?php for ($i=11; $i > -1; $i--) { ?>
                        <?php
                        $iplus = $i + 1; 
                        if($iplus <= 9){
                          $monthdata = '0'.$iplus;
                        }else{
                          $monthdata = $iplus;
                        }

                        $firstday_firstdaymonth = (date('Y')-1).'-'.$monthdata.'-01';
                        $firstday_lastdaymonth = (date('Y')-1).'-'.$monthdata.'-15';
                        $v1label = date('M d, Y', strtotime($firstday_firstdaymonth));
                        $v2label = date('M d, Y', strtotime($firstday_lastdaymonth));

                        $lastdayofthemonth = lastday_ofthemonth((date('Y')-1).'-'.$monthdata.'-20');
                        $last_lastmonth = (date('Y')-1).'-'.$monthdata.'-16';
                        $last_lastdaymonth = $lastdayofthemonth;
                        $v3label = date('M d, Y', strtotime($last_lastmonth));
                        $v4label = date('M d, Y', strtotime($last_lastdaymonth));

                        ?>
                        <?php if(date('m') == $monthdata){ ?>
                          <?php if(current_ph_date() > $lastdayofthemonth){ ?>
                            <li class="list-group-item"><a href="<?=base_url()?>payslip?date_from=<?=$last_lastmonth?>&date_to=<?=$last_lastdaymonth?>"><?=$v3label?> - <?=$v4label?></a></li>
                          <?php } ?>
                        <?php }else{ ?>
                          <li class="list-group-item"><a href="<?=base_url()?>payslip?date_from=<?=$last_lastmonth?>&date_to=<?=$last_lastdaymonth?>"><?=$v3label?> - <?=$v4label?></a></li>
                        <?php } ?>
                        <li class="list-group-item"><a href="<?=base_url()?>payslip?date_from=<?=$firstday_firstdaymonth?>&date_to=<?=$firstday_lastdaymonth?>"><?=$v1label?> - <?=$v2label?></a></li>
                        
                      <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>