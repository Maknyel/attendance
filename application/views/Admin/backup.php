<section class="content">
  <div class="">
    <div class="row">
      <div class="col-12 col-sm-12 col-xs-12 col-md-2 col-lg-2 col-xl-2">
      </div>
      <div class="col-12 col-sm-12 col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card">
          <div class="card-body">
                <form method="get" action="<?=base_url()?>Admin/backup_db" style="margin:10px;">
                    <label>Backup Database</label>
                    <div onclick="$('#downloadme').click()" style="text-align:center;cursor: pointer;width: 100%;height: auto;margin-bottom: 100px;border: 3px solid #6f6452;" class="cover_upload" id="upload_file">
                        <i class="fa fa-upload upload_fa" aria-hidden="true" style="font-size: 100px !important;margin: 20px;"></i>
                    </div>
                    <button id="downloadme" class="btn btn-success" type="submit" style="display:none">Backup Database</button>
                </form>

                <form method="get" action="<?=base_url()?>Admin/payroll_per_year" style="margin:10px;">
                    <div class="form-group">
                        <label>Payroll</label>
                        <select class="form-control" name="year" id="year">
                            <?php
                            for($i=date('Y'); $i>=2015; $i--){
                                echo "
                                <option value='".$i."' >".$i."</option>
                                ";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="text-right">
                        <button id="downloadme" class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
               
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-xs-12 col-md-2 col-lg-2 col-xl-2">
      </div>
    </div>
    
  </div>
</section>