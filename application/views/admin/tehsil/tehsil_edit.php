  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit Tehsil </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/tehsil'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Tehsil List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/tehsil/edit/'.$tehsils['tehsil_id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
               <label for="tehsil_district_id" class="col-sm-2 control-label">Select District</label>
                <div class="col-12">
                <select name="tehsil_district_id" class="form-control" id="tehsil_district_id"  required>
                  <option value="">--Select District--</option>
                  <?php
                   foreach($districts as $district)
				  {
					  $selectedText = '';
					  if($tehsils['tehsil_district_id']==$district->district_id)
					  $selectedText = ' selected="selected" ';
					  echo '<option value="'.$district->district_id.'" '.$selectedText.' >'.$district->district_name_en.'</option>';
				  }
				  ?>
                  </select>
				</div>
              </div>
              <div class="form-group">
                <label for="tehsil_code" class="col-sm-2 control-label">Tehsil Code</label>
                <div class="col-md-12">
                  <input type="text" name="tehsil_code" value="<?= $tehsils['tehsil_code']; ?>" class="form-control" id="tehsil_code" placeholder="" >
                </div>
              </div>
              
              <div class="form-group">
                <label for="tehsil_name_en" class="col-sm-2 control-label">Tehsil Name (Eng)</label>
                <div class="col-md-12">
                  <input type="text" name="tehsil_name_en" value="<?= $tehsils['tehsil_name_en']; ?>" class="form-control" id="tehsil_name_en" placeholder="">
                </div>
              </div>
              
              <div class="form-group">
                <label for="tehsil_name_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> تحصیل </label>
                <div class="col-md-12">
                  <input type="text" name="tehsil_name_ur" value="<?= $tehsils['tehsil_name_ur']; ?>" class="form-control" id="tehsil_name_ur" placeholder="" dir="rtl">
                </div>
              </div>

              <div class="form-group">
                <label for="tehsil_order" class="col-sm-2 control-label">Tehsil Order</label>
                <div class="col-md-12">
                  <input type="number" name="tehsil_order" value="<?= $tehsils['tehsil_order']; ?>" class="form-control" id="tehsil_order" placeholder="">
                </div>
              </div>
              
              <div class="form-group">
                <label for="tehsil_status" class="col-sm-2 control-label">Select Status</label>
				<div class="col-md-12">
                  <select name="tehsil_status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= ($tehsils['tehsil_status'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($tehsils['tehsil_status'] == 0)?'selected': '' ?>>Deactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update Tehsil" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div> 