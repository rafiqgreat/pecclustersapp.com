  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Edit District </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/district'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  District List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/district/edit/'.$district['district_id']), 'class="form-horizontal"');  ?> 
            
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                	<label for="district_code" class="col-sm-12 control-label">District Code</label>
                    <input type="text" name="district_code" class="form-control form-group" id="district_code" required="required" value="<?= $district['district_code'] ?>">
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                	<label for="district_name_en" class="col-sm-12 control-label">District Name (Eng)</label>
                    <input type="text" name="district_name_en" class="form-control form-group" id="district_name_en" required="required" value="<?= $district['district_name_en'] ?>">
                </div>
                <div class="col-lg-6 col-sm-12">
                	<label for="district_name_ur" class="col-sm-12 control-label"  dir="rtl" lang="ar" style="text-align:right">ضلع کا نام(ڈسٹرکٹ)</label>
                    <input type="text" name="district_name_ur" class="form-control form-group" id="district_name_ur" required="required" value="<?= $district['district_name_ur'] ?>">
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                	<label for="district_latitude" class="col-sm-12 control-label">District Latitude</label>
                    <input type="text" name="district_latitude" class="form-control form-group" id="district_latitude" required="required" value="<?= $district['district_latitude'] ?>">
                </div>
                <div class="col-lg-6 col-sm-12">
                	<label for="district_longitude" class="col-sm-12 control-label">District Longitude</label>
                    <input type="text" name="district_longitude" class="form-control form-group" id="district_longitude" required="required" value="<?= $district['district_longitude'] ?>">
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-12 col-sm-12">
                	<label for="district_status" class="col-lg-6 col-sm-12 control-label">Status</label>
                    <select name="district_status" class="form-control form-group" id="district_status" required="required">
                        <option value="1" <?= ($district['district_status'] == 1)?'selected': '' ?> >Active</option>
                    	<option value="0" <?= ($district['district_status'] == 0)?'selected': '' ?>>Deactive</option>
                    </select>                
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Edit District" class="btn btn-info pull-right">
                </div>
              </div>
              <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
    </section> 
  </div>

  <!-- DataTables -->
