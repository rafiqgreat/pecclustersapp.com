  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit Staff </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/staffs'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Staffs List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
           
            <?php echo form_open(base_url('admin/staffs/edit/'.$staff['id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="staffname" class="col-sm-2 control-label">Staff Name</label>

                <div class="col-md-12">
                  <input type="text" name="staffname" value="<?= $staff['staffname']; ?>" class="form-control" id="staffname" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">First Name</label>

                <div class="col-md-12">
                  <input type="text" name="firstname" value="<?= $staff['firstname']; ?>" class="form-control" id="firstname" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">Last Name</label>
                <div class="col-md-12">
                  <input type="text" name="lastname" value="<?= $staff['lastname']; ?>" class="form-control" id="lastname" placeholder="">
                </div>
              </div>
              <div class="form-group">
              <label for="fathername" class="col-sm-2 control-label">Father Name</label>
              <div class="col-md-12">
                  <input type="fathername" name="fathername" value="<?= $staff['fathername']; ?>" class="form-control" id="fathername" placeholder="">
                </div>
              </div>

              <div class="form-group">
              <label for="cnic" class="col-sm-2 control-label">CNIC No</label>
              <div class="col-md-12">
                  <input type="number" name="cnic" value="<?= $staff['cnic']; ?>" class="form-control" id="cnic" placeholder="">
                </div>
              </div>
              
              <div class="form-group">
              <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
              <div class="col-md-12">
                  <input type="date" name="dob" value="<?= $staff['dob']; ?>" class="form-control" id="dob" placeholder="">
                </div>
              </div>
             
              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>

                <div class="col-md-12">
                  <input type="email" name="email" value="<?= $staff['email']; ?>" class="form-control" id="email" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="placeofposting" class="col-sm-2 control-label">Place of Posting</label>
                <input type="text" name="placeofposting" value="<?= $staff['placeofposting']; ?>" class="form-control" id="placeofposting" placeholder="">
              </div>

              <div class="form-group">
                <label for="designation" class="col-sm-2 control-label">Designation</label>
                <input type="text" name="designation" value="<?= $staff['designation']; ?>" class="form-control" id="designation" placeholder="">
              </div>
              <div class="form-group">
                <label for="scale" class="col-sm-2 control-label">Scale</label>
                <input type="number" name="scale" value="<?= $staff['scale']; ?>" min="1" max="20" class="form-control" id="scale" placeholder="">
              </div>
             
              <div class="form-group">
                <label for="type" class="col-sm-2 control-label">Type</label>
           
                <div class="col-md-12">
                <select id="type" name="type" class="form-control">
                <option value="RI" <?= ($staff['type'] == "RI")?'selected': '' ?>>RI</option>
                <option value="INVIGILATOR" <?= ($staff['type'] == "INVIGILATOR")?'selected': '' ?>>INVIGILATOR</option>
                <option value="SUPERINTENDENT" <?= ($staff['type'] == "SUPERINTENDENT")?'selected': '' ?>>SUPERINTENDENT</option>
               </select>
                </div>
              </div>

              <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Mobile No</label>
                <div class="col-md-12">
                  <input type="number" name="mobile_no" value="<?= $staff['mobile_no']; ?>" class="form-control" id="mobile_no" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="district" class="col-sm-2 control-label">District</label>

                <div class="col-md-12">
                <select id="district" name="district" class="form-control">
                 <?php
                	foreach($districts as $district)
                          {
                              $selectedText = '';
					          if($district['district_id']==$staff['district'])
					          $selectedText = ' selected="selected" ';
                   			  echo '<option value="'.$district['district_id'].'" '.$selectedText.'>'.$district['district_name_en'].'</option>';
                          }
				?>    
               </select>
                </div>
              </div>
              <div class="form-group">
                <label for="tehsil" class="col-sm-2 control-label">Tehsil</label>

                <div class="col-md-12">
                <select id="tehsil" name="tehsil" class="form-control">
                 <?php
                	foreach($tehsils as $tehsil)
                          {
                              $selectedText = '';
					          if($tehsil['tehsil_id']==$staff['tehsil'])
					          $selectedText = ' selected="selected" ';
                   			  echo '<option value="'.$tehsil['tehsil_id'].'" '.$selectedText.'>'.$tehsil['tehsil_name_en'].'</option>';
                          }
				?>
               </select>
                </div>

              </div>

              <div class="form-group">
                <label for="school_id" class="col-sm-2 control-label">Exams Center Name</label>
                <div class="col-md-12">
                <select id="school_id" name="school_id" class="form-control">
                <?php
                	foreach($schools as $school)
                          {
                              $selectedText = '';
					          if($school['cs_id']==$staff['school_id'])
					          $selectedText = ' selected="selected" ';
                   			  echo '<option value="'.$school['cs_id'].'" '.$selectedText.'>'.$school['cs_name'].'</option>';
                          }
				?>
                </select>
                </div>
              </div>

              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Select Status</label>

                <div class="col-md-12">
                  <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= ($staff['is_active'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($staff['is_active'] == 0)?'selected': '' ?>>Deactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update Staff" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div> 
  <script language="javascript" type="text/javascript">
$('#div_cs_parent').css('display','none');
$('#district').on('change', function() {

      
      $.post('<?=base_url("admin/staffs/tehsil_by_district")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      district_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#tehsil option:not(:first)').remove();
      $.each(arr, function(key, value) {           
      $('#tehsil')
         .append($("<option></option>")
                    .attr("value", value.tehsil_id)
                    .text(value.tehsil_name_en)
                  ); 
        });   
    });
});
$('#tehsil').on('change', function()
{
    $.post('<?=base_url("admin/staffs/cluster_schools_by_tehsil")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      tehsil_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#school_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
      $('#school_id')
         .append($("<option></option>")
                    .attr("value", value.school_id)
                    .text(value.cs_name+' '+value.cs_address)
                  ); 
        });   
    });
});
</script>