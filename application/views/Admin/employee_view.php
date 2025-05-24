<section class="content">
  <div class="container-fluid">
    <div class="row" >
        <div class="col-xl-12 col-lg-12 col-md-12">

              <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-12">
                      <div class="p-5 text-center">
                        <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4"></h1>
                        </div>
                        <?php if(get_myuser_info_employee_by_id($id,'photo') == ''){ ?>
                            <image src="<?=base_url()?>assets/sb-admin/img/undraw_profile.svg" id="imgdatauser" style="width:100%;height:auto;overflow: hidden;background: none;border: 4px solid #222d32;max-width: 300px;">
                        <?php }else{ ?>
                          <image src="<?=base_url()?>userside/<?=get_myuser_info_employee_by_id($id,'id')?>/<?=get_myuser_info_employee_by_id($id,'photo')?>" id="imgdatauser" style="width:100%;height:auto;overflow: hidden;background: none;border: 4px solid #222d32;max-width: 300px;">
                        <?php } ?>
                            </image>
                      </div>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                      <div class="p-5">
                        <div class="form-group">
                            <label>Firstname: </label>
                            <input type="text" value="<?=get_myuser_info_employee_by_id($id,'firstname')?>" id="firstname" class="form-control form-control-user" placeholder="First Name" required autocomplete="off" readonly>
                          </div>
                          <div class="form-group">
                            <label>Middlename</label>
                            <input type="text" value="<?=get_myuser_info_employee_by_id($id,'middlename')?>" id="middlename" class="form-control form-control-user" placeholder="Middle Name" autocomplete="off" readonly>
                          </div>
                          <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" value="<?=get_myuser_info_employee_by_id($id,'lastname')?>" id="lastname" class="form-control form-control-user" placeholder="Last Name" required autocomplete="off" readonly>
                          </div>

                          
                          <div class="form-group">
                            <label>Birthdate</label>
                            <input type="date" readonly value="<?=get_myuser_info_employee_by_id($id,'birthdate')?>" id="birthdate" class="form-control form-control-user" placeholder="birthdate" required autocomplete="off">
                          </div>
                          <div class="form-group">
                            <label>Address</label>
                            <textarea readonly title="address" id="address" class="form-control form-control-user" placeholder="Address" required autocomplete="off"><?=get_myuser_info_employee_by_id($id,'address')?>
                            </textarea>
                          </div>
                      </div>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                      <div class="p-5">  
                        
                          
                          
                          
                          <div class="form-group">
                            <label>Contact Info</label>
                            <input type="text" readonly value="<?=get_myuser_info_employee_by_id($id,'contact_info')?>" id="contact_info" class="form-control form-control-user" placeholder="" required autocomplete="off">
                          </div>
                          <div class="form-group">
                            <label>Gender</label>
                            <input type="text" value="<?=get_myuser_info_employee_by_id($id,'gender')?>" readonly class="form-control form-control-user" placeholder="" required autocomplete="off">
                             
                          </div>
                          <div class="form-group">
                            <label>Position</label>
                            <input type="text" value="<?=get_myuser_info_employee_by_id($id,'description')?>" id="description" class="form-control form-control-user" placeholder="" required autocomplete="off" readonly>
                          </div>
                          <div class="form-group">
                            <label>Schedule</label>
                            <input type="text" value="<?=date('H:i:s a', strtotime(get_myuser_info_employee_by_id($id,'time_in')))?> - <?=date('H:i:s a', strtotime(get_myuser_info_employee_by_id($id,'time_out')))?>" id="time_in" class="form-control form-control-user" placeholder="" required autocomplete="off" readonly>
                          </div>


                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" value="<?=get_myuser_info_employee_by_id($id,'username')?>" id="username" class="form-control form-control-user" placeholder="username" required autocomplete="off" readonly>
                          </div>
                          
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
    </div>
  </div>
</section>