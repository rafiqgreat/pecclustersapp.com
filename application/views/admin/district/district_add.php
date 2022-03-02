  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New District </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/district'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Districts List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/district/add'), 'class="form-horizontal"');  ?> 
              <div class="row">
                <div class="col-lg-12 col-sm-12">
                	<label for="district_code" class="col-sm-12 control-label">District Code</label>
                    <input type="text" name="district_code" class="form-control form-group" id="district_code" placeholder="" required="required">
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                	<label for="district_name_en" class="col-sm-12 control-label">District Name (Eng)</label>
                    <input type="text" name="district_name_en" class="form-control form-group" id="district_name_en" placeholder="" required="required">
                </div>
                <div class="col-lg-6 col-sm-12">
                	<label for="district_name_ur" class="col-sm-12 control-label urdufont-right"  dir="rtl" lang="ar" style="text-align:right">ضلع کا نام(ڈسٹرکٹ)</label>
                    <input type="text" name="district_name_ur" class="form-control form-group" id="district_name_ur" placeholder="" required="required">
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                	<label for="district_latitude" class="col-sm-12 control-label">District Latitude</label>
                    <input type="text" name="district_latitude" class="form-control form-group" id="district_latitude" placeholder="" required="required">
                </div>
                <div class="col-lg-6 col-sm-12">
                	<label for="district_longitude" class="col-sm-12 control-label">District Longitude</label>
                    <input type="text" name="district_longitude" class="form-control form-group" id="district_longitude" placeholder="" required="required">
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-12 col-sm-12">
                	<label for="district_status" class="col-lg-6 col-sm-12 control-label">Status</label>
                    <select name="district_status" class="form-control form-group" id="district_status" placeholder="" required="required">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>                
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-lg-12">
                  <input type="submit" name="submit" value="Add School" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
    </section> 
  </div>

  <!-- DataTables -->
</script>
