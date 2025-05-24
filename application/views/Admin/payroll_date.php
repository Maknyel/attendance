<section class="content">
  <div class="">
    <div class="row">
      <div class="col-12 col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
      </div>
      <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card">
          <div class="card-body">
            <form method="get" action="<?=base_url()?>cms/payroll_employers" style="margin:10px;">
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
        <div class="card">
          <div class="card-body">
                <ul class="list-group">
                  <?php for ($i=(date('m'))-1; $i > -1; $i--) { ?>
                        <?php
                        $iplus = $i + 1; 
                        if($iplus <= 9){
                          $monthdata = '0'.$iplus;
                        }else{
                          $monthdata = $iplus;
                        }

                        $iplus2 = $i + 2; 
                        if($iplus2 <= 9){
                          $monthdata2 = '0'.$iplus2;
                        }else{
                          $monthdata2 = $iplus2;
                        }

                        $firstday_firstdaymonth = date('Y').'-'.$monthdata.'-09';
                        $firstday_lastdaymonth = date('Y').'-'.$monthdata.'-28';
                        $v1label = date('M d, Y', strtotime($firstday_firstdaymonth));
                        $v2label = date('M d, Y', strtotime($firstday_lastdaymonth));

                        $last_lastmonth = date('Y').'-'.$monthdata.'-28';
                        $last_lastdaymonth = date('Y').'-'.$monthdata2.'-09';
                        $v3label = date('M d, Y', strtotime($last_lastmonth));
                        $v4label = date('M d, Y', strtotime($last_lastdaymonth));

                        ?>
                        <?php if(date('Y-m-d') >= $last_lastdaymonth){ ?>
                          <li class="list-group-item"><a href="<?=base_url()?>cms/payroll_employers?date_from=<?=$last_lastmonth?>&date_to=<?=$last_lastdaymonth?>"><?=$v3label?> - <?=$v4label?></a></li>
                        <?php } ?>
                        <?php if(date('Y-m-d') >= $firstday_lastdaymonth){ ?>
                          <li class="list-group-item"><a href="<?=base_url()?>cms/payroll_employers?date_from=<?=$firstday_firstdaymonth?>&date_to=<?=$firstday_lastdaymonth?>"><?=$v1label?> - <?=$v2label?></a></li>
                        <?php } ?>
                        
                      <?php } ?>

                      <?php for ($i=11; $i > -1; $i--) { ?>
                        <?php
                        $iplus = $i + 1; 
                        if($iplus <= 9){
                          $monthdata = '0'.$iplus;
                        }else{
                          $monthdata = $iplus;
                        }

                        $iplus2 = $i + 2; 
                        if($iplus2 <= 9){
                          $monthdata2 = '0'.$iplus2;
                        }else{
                          $monthdata2 = $iplus2;
                        }

                        $firstday_firstdaymonth = (date('Y')-1).'-'.$monthdata.'-09';
                        $firstday_lastdaymonth = (date('Y')-1).'-'.$monthdata.'-28';
                        $v1label = date('M d, Y', strtotime($firstday_firstdaymonth));
                        $v2label = date('M d, Y', strtotime($firstday_lastdaymonth));

                        $last_lastmonth = (date('Y')-1).'-'.$monthdata.'-28';
                        if($monthdata2 == 13){
                          $last_lastdaymonth = (date('Y')).'-'.'01'.'-09';  
                        }else{
                          $last_lastdaymonth = (date('Y')-1).'-'.$monthdata2.'-09';
                        }
                        
                        $v3label = date('M d, Y', strtotime($last_lastmonth));
                        $v4label = date('M d, Y', strtotime($last_lastdaymonth));

                        ?>
                        <?php if(date('Y-m-d') >= $last_lastdaymonth){ ?>
                          <li class="list-group-item"><a href="<?=base_url()?>cms/payroll_employers?date_from=<?=$last_lastmonth?>&date_to=<?=$last_lastdaymonth?>"><?=$v3label?> - <?=$v4label?></a></li>
                        <?php } ?>
                        <li class="list-group-item"><a href="<?=base_url()?>cms/payroll_employers?date_from=<?=$firstday_firstdaymonth?>&date_to=<?=$firstday_lastdaymonth?>"><?=$v1label?> - <?=$v2label?></a></li>
                        
                      <?php } ?>
                </ul>
                <ul class="list-group" style="display:none">
                  

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
                        <li class="list-group-item"><a href="<?=base_url()?>cms/payroll_employers?date_from=<?=$last_lastmonth?>&date_to=<?=$last_lastdaymonth?>"><?=$v3label?> - <?=$v4label?></a></li>
                      <?php } ?>
                    <?php }else{ ?>
                      <li class="list-group-item"><a href="<?=base_url()?>cms/payroll_employers?date_from=<?=$last_lastmonth?>&date_to=<?=$last_lastdaymonth?>"><?=$v3label?> - <?=$v4label?></a></li>
                    <?php } ?>
                    <li class="list-group-item"><a href="<?=base_url()?>cms/payroll_employers?date_from=<?=$firstday_firstdaymonth?>&date_to=<?=$firstday_lastdaymonth?>"><?=$v1label?> - <?=$v2label?></a></li>
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
                          <li class="list-group-item"><a href="<?=base_url()?>cms/payroll_employers?date_from=<?=$last_lastmonth?>&date_to=<?=$last_lastdaymonth?>"><?=$v3label?> - <?=$v4label?></a></li>
                        <?php } ?>
                      <?php }else{ ?>
                        <li class="list-group-item"><a href="<?=base_url()?>cms/payroll_employers?date_from=<?=$last_lastmonth?>&date_to=<?=$last_lastdaymonth?>"><?=$v3label?> - <?=$v4label?></a></li>
                      <?php } ?>
                      <li class="list-group-item"><a href="<?=base_url()?>cms/payroll_employers?date_from=<?=$firstday_firstdaymonth?>&date_to=<?=$firstday_lastdaymonth?>"><?=$v1label?> - <?=$v2label?></a></li>
                      
                  <?php } ?>
                </ul>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
      </div>
    </div>
    
  </div>
</section>