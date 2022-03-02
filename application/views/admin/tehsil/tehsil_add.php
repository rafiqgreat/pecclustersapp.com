  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Tehsil </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/tehsil'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Tehsils List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/tehsil/add'), 'class="form-horizontal"');  ?> 
              <div class="row">
              <div class="col-lg-6 col-sm-12">
              	<label for="tehsil_district_id" class="col-sm-12 control-label">Select District</label>
                <select name="tehsil_district_id" class="form-control form-group" id="tehsil_district_id"  required>
                  <option value="">--Select District--</option>
                  <?php
                   foreach($districts as $district)
                  {
                    echo '<option value="'.$district->district_id.'">'.$district->district_name_en.'</option>';
                  }
                  ?>
                </select>
              </div>
                <div class="col-lg-6 col-sm-12">                         
                    <label for="tehsil_code" class="col-sm-6 control-label">Tehsil Code</label>
                    <div class="col-12">
                      <input type="text" name="tehsil_code" class="form-control" id="tehsil_code" placeholder="" required="required">
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label for="tehsil_name_en" class="col-sm-12 control-label">Tehsil Name (Eng)</label>
                <div class="col-12">
                  <input type="text" name="tehsil_name_en" class="form-control" id="tehsil_name_en" placeholder="" required="required">
                </div>
              </div>
              
              <div class="form-group">
                <label for="tehsil_name_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> تحصیل </label>
                <div class="col-12">
                  <input type="text" name="tehsil_name_ur" class="form-control" id="tehsil_name_ur" placeholder="" required="required" dir="rtl">
                </div>
              </div>
              
              <div class="form-group">
                <label for="tehsil_order" class="col-sm-12 control-label"> Tehsil Order </label>
                <div class="col-12">
                  <input type="number" name="tehsil_order" class="form-control" id="tehsil_order" placeholder="" required="required">
                </div>
              </div>
              
              <div class="form-group">
                <label for="tehsil_status" class="col-sm-12 control-label">Tehsil Status</label>
                <div class="col-12">
                    <select name="tehsil_status" class="form-control" id="tehsil_status" placeholder="" required="required">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Tehsil" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>