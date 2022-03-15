  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Staff </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/staffs'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Staffs List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>

            <?php echo form_open(base_url('admin/staffs/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group row">
              	<div class="col-4">
                	<label for="staffname" class="col-12 control-label">Staff Name</label>
                  	<input type="text" name="staffname" class="form-control" id="staffname" placeholder="">
                </div>
                <div class="col-4">
                	<label for="firstname" class="col-12 control-label">First Name</label>
                  	<input type="text" name="firstname" class="form-control" id="firstname" placeholder="">
                </div>
                <div class="col-4">
                	<label for="lastname" class="col-12 control-label">Last Name</label>
                  <input type="text" name="lastname" class="form-control" id="lastname" placeholder="">
                </div>
                
              </div>
              <div class="form-group row">
              <div class="col-4">
                  <label for="fathername" class="col-sm-12 control-label">Father Name</label>
                  <input type="text" name="fathername" class="form-control" id="fathername" placeholder="">
                </div>
                <div class="col-4">
                  <label for="cnic" class="col-sm-12 control-label">CNIC No</label>
                  <input type="number" name="cnic" class="form-control" id="cnic" placeholder="">
                </div>
                <div class="col-4">
                  <label for="dob" class="col-sm-12 control-label">Date of Birth</label>
                  <input type="date" name="dob" class="form-control" id="dob" placeholder="">
                </div>
              
              </div>
              <div class="form-group row">
                <div class="col-4">
                  <label for="email" class="col-12 control-label">Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="">
                </div>
                <div class="col-4">
                  <label for="type" class="col-sm-12 control-label">Type</label>
                	<select id="type" name="type" class="form-control">
                        <option value="RI">RI</option>
                        <option value="INVIGILATOR">INVIGILATOR</option>
                        <option value="SUPERINTENDENT">SUPERINTENDENT</option>
                	</select>
                </div>
                <div class="col-4">
                  <label for="mobile_no" class="col-sm-12 control-label">Mobile No</label>
                  <input type="number" name="mobile_no" class="form-control" id="mobile_no" placeholder="">
                </div>
              </div>

              <div class="form-group row">
              <div class="col-4">
                  <label for="placeofposting" class="col-sm-12 control-label">Place of Posting</label>
                  <input type="text" name="placeofposting" class="form-control" id="placeofposting" placeholder="">
                </div>
                
                <div class="col-4">
                  <label for="designation" class="col-sm-12 control-label">Designation</label>
                  <input type="text" name="designation" class="form-control" id="designation" placeholder="">
                </div>

                <div class="col-4">
                  <label for="scale" class="col-sm-12 control-label">Scale</label>
                  <input type="number" name="scale" min="1" max="20"class="form-control" id="scale" placeholder="">
                </div>
              </div>

              
              <div class="form-group">
                <div class="col-12">
                  <label for="address" class="col-sm-2 control-label">Address</label>
                  <input type="text" name="address" class="form-control" id="address" placeholder="">
                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-md-4">
                    <label for="district" class="col-12 control-label">District</label>
                    <select id="district" name="district" class="form-control">
                    <option value="" >--Select District--</option>
                    <?php
                    foreach($districts as $dis)
                    {
                      ?>
                      <option value="<?= $dis['district_id']; ?>" ><?= $dis['district_name_en']; ?></option>
                      <?php
                    }
                    ?>         
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="tehsil" class="col-12 control-label">Tehsil</label>
                    <select id="tehsil" name="tehsil" class="form-control">
                    <option value="" >--Select Tehsil--</option>  
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="school_id" class="col-12 control-label">Exams Center Name</label>
                    <select id="school_id" name="school_id" class="form-control">
                    <option value="" >--Select School--</option>  
                    </select>
                </div>
              </div>
             
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Staff" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
    </section>
    
  </div>
  <script language="javascript" type="text/javascript">
$('#div_cs_parent').css('display','none');
$('#district').on('change', function()
{
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
                    .attr("value", value.cs_id)
                    .text(value.cs_name+' '+value.cs_address)
                  ); 
        });   
    });
});
</script>