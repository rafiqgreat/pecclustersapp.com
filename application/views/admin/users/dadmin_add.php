  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New District Admin </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/users/dadmin'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  District Admin List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>

            <?php echo form_open(base_url('admin/users/add_dadmin'), 'class="form-horizontal"');  ?> 
              <div class="form-group row">
                <div class="col-6">
                	<label for="username" class="col-12 control-label">District Admin Name</label>
                  	<input type="text" name="username" class="form-control" id="username" placeholder="">
                </div>
                <div class="col-6">
                	<label for="firstname" class="col-12 control-label">First Name</label>
                  	<input type="text" name="firstname" class="form-control" id="firstname" placeholder="">
                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-6">
                	<label for="lastname" class="col-12 control-label">Last Name</label>
                  	<input type="text" name="lastname" class="form-control" id="lastname" placeholder="">
                </div>
                <div class="col-6">
                 	<label for="email" class="col-12 control-label">Email</label>
                  	<input type="email" name="email" class="form-control" id="email" placeholder="">
                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-6">
                	<label for="mobile_no" class="col-sm-2 control-label">Mobile No</label>
                  	<input type="number" name="mobile_no" class="form-control" id="mobile_no" placeholder="">
                </div>
              
                <div class="col-6">
                	<label for="password" class="col-sm-2 control-label">Password</label>
                  	<input type="password" name="password" class="form-control" id="password" placeholder="">
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
							echo '<option value="'.$district['district_id'].'">'.$district['district_name_en'].'</option>';
						  }
                      ?>
                    </select>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add User" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
    </section> 
  </div>