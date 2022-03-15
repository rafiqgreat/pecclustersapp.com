  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit User </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Users List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
           
            <?php echo form_open(base_url('admin/users/dadmin_edit/'.$user['admin_id']), 'class="form-horizontal"' )?> 
              <div class="form-group row">
                <div class="col-6">
                	<label for="username" class="col-sm-2 control-label">User Name</label>
                  <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" id="username" placeholder="">
                </div>
                <div class="col-6">
                	<label for="firstname" class="col-sm-2 control-label">First Name</label>
                  <input type="text" name="firstname" value="<?= $user['firstname']; ?>" class="form-control" id="firstname" placeholder="">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-6">
                	<label for="lastname" class="col-sm-2 control-label">Last Name</label>
                  <input type="text" name="lastname" value="<?= $user['lastname']; ?>" class="form-control" id="lastname" placeholder="">
                </div>
                <div class="col-6">
                	<label for="email" class="col-sm-2 control-label">Email</label>
                  <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control" id="email" placeholder="">
                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-6">
                	<label for="mobile_no" class="col-sm-2 control-label">Mobile No</label>
                  <input type="number" name="mobile_no" value="<?= $user['mobile_no']; ?>" class="form-control" id="mobile_no" placeholder="">
                </div>
                <div class="col-6">
                	<label for="role" class="col-sm-2 control-label">Select Status</label>
                  <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= ($user['is_active'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($user['is_active'] == 0)?'selected': '' ?>>Deactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-6">
                	<label for="district_dadmin" class="col-sm-2 control-label">Select District</label>
                  	<select name="district_dadmin" class="form-control form-group" id="district_dadmin"  required>
                    <option value="">--Select District--</option>
                      <?php
					   foreach($districts as $district)
						  {
							  $selectedText = '';
							  if($user['district_dadmin']==$district['district_id'])
							  $selectedText = ' selected="selected" ';
							  echo '<option value="'.$district['district_id'].'" '.$selectedText.' >'.$district['district_name_en'].'</option>';
						  }
					  ?>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update User" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div> 