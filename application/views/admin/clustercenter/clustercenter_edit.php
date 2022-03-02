  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Edit School </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/school'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  School List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/school/edit/'.$school['school_id']), 'class="form-horizontal" method="POST"');  ?> 
            <?php
            	//echo '<PRE>';
				//print_r($school);
            	//die();
			?>
              <div class="form-group row">
                <div class="col-lg-3 col-sm-12">
                	<label for="username" class="col-sm-12 control-label">EMIS Code/Login Name</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="" required="required" value="<?= $school['username'] ?>" readonly>
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="password" class="col-sm-12 control-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="" value="">
                </div>
                <div class="col-lg-3 col-sm-12" >
                	<label for="school_department" class="col-sm-12 control-label">Department/Body</label>
                    <select name="school_department" class="form-control" id="school_department" placeholder="" required="required">
                        <option value="SED" <?= ($school['school_department'] == 'SED')?'selected': '' ?>>SED</option>
                        <option value="FEDERAL" <?= ($school['school_department'] == 'FEDERAL')?'selected': '' ?>>FEDERAL</option>                       
                        <option value="PEF" <?= ($school['school_department'] == 'PEF')?'selected': '' ?>>PEF</option>
                        <option value="COMMUNITY" <?= ($school['school_department'] == 'COMMUNITY')?'selected': '' ?>>COMMUNITY</option>
						<option value="LITERACY" <?= ($school['school_department'] == 'LITERACY')?'selected': '' ?>>LITERACY</option>
						<option value="PSSP" <?= ($school['school_department'] == 'PSSP')?'selected': '' ?>>PSSP</option>
						<option value="OTHER" <?= ($school['school_department'] == 'OTHER')?'selected': '' ?>>OTHER</option>
                    </select>
                </div>
                 <div class="col-lg-3 col-sm-12" >
                	<label for="school_type" class="col-sm-12 control-label">School Type</label>
                    <select name="school_type" class="form-control" id="school_type" placeholder="" required="required">
                        <option value="Public" <?= ($school['school_type'] == 'Public')?'selected': '' ?>>Public</option>
                        <option value="Private" <?= ($school['school_type'] == 'Private')?'selected': '' ?>>Private</option>
                    </select>
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-3 col-sm-12" >
                	<label for="school_name" class="col-sm-12 control-label">School Name</label>
                    <input type="text" name="school_name" class="form-control form-group" id="school_name" placeholder="" required="required" value="<?= $school['school_name'] ?>">
                </div>
              	<div class="col-lg-3 col-sm-12">
                	<label for="school_address" class="col-sm-12 control-label">School Address</label>
                    <input type="text" name="school_address" class="form-control form-group" id="school_address" placeholder="" required="required" value="<?= $school['school_address'] ?>">
                </div>
               <div class="col-lg-3 col-sm-12">
                	<label for="school_district_id" class="col-sm-12 control-label">District</label>
                     <select name="school_district_id" class="form-control" id="school_district_id" placeholder="" required="required" <?php if($this->session->userdata('role_id') == 7 || $this->session->userdata('role_id') == 8){ print 'disabled';}?>>
                      <option value="">---Select District---</option>
                     <?php 
					 foreach($districts as $row)
						 {
							$selectedText = '';
							if($school['school_district_id']==$row['district_id'])
							$selectedText = ' selected="selected" ';
							echo '<option value="'.$row['district_id'].'"'.$selectedText.'>'.$row['district_name_en'].'</option>'; 
						 }
					 ?>
                    </select>
                </div>             
                <div class="col-lg-3 col-sm-12">
                	<label for="school_tehsil_id" class="col-lg-6 col-sm-12 control-label">Tehsil</label>
					<select name="school_tehsil_id" class="form-control form-group" id="school_tehsil_id" placeholder="" required="required" <?php if($this->session->userdata('role_id') == 8){ print 'disabled';}?>>
                    	<option value="">---Select Tehsil---</option>
                    	<?php
							//print_r($tehsils);
							//die(); 
						   $tehsils  = $this->School_model->get_tehsil_by_district($school['school_district_id']);
						   foreach($tehsils as $tehsil)
							  {
								$selectedText = '';
								  if($tehsil['tehsil_id']==$school['school_tehsil_id'])
								  $selectedText = ' selected="selected" ';
								echo '<option value="'.$tehsil['tehsil_id'].'" '.$selectedText.'>'.$tehsil['tehsil_name_en'].'</option>';
							  }
						  ?>
                    </select>
                </div>
                
              </div>
              
              <div class="row">
				  <div class="col-lg-3 col-sm-12">
                	<label for="school_level" class="col-sm-12 control-label">School Level</label>
                    <select name="school_level" class="form-control form-group" id="school_level" placeholder="" required="required">
                        <option value="Primary" <?= ($school['school_level'] == 'Primary')?'selected': '' ?>>Primary</option>
                        <option value="Elementary" <?= ($school['school_level'] == 'Elementary')?'selected': '' ?>>Elementary</option>
                        <option value="High" <?= ($school['school_level'] == 'High')?'selected': '' ?>>High</option>
                        <option value="Higher Secondary" <?= ($school['school_level'] == 'Higher Secondary')?'selected': '' ?>>Higher Secondary</option>
                    </select>
                </div>
              	<div class="col-lg-3 col-sm-12">
                	<label for="school_gender" class="col-sm-12 control-label">School Gender</label>
                    <select name="school_gender" class="form-control form-group" id="school_gender" placeholder="" required="required">
                        <option value="MALE" <?= ($school['school_gender'] == 'MALE')?'selected': '' ?>>MALE</option>
                        <option value="FEMALE" <?= ($school['school_gender'] == 'FEMALE')?'selected': '' ?>>FEMALE</option>
                        <option value="BOTH" <?= ($school['school_gender'] == 'BOTH')?'selected': '' ?>>BOTH</option>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="school_email" class="col-sm-12 control-label">School Email</label>
                    <input type="email" name="school_email" class="form-control form-group" id="school_email" placeholder="" required="required" value="<?= $school['school_email'] ?>">
                </div>             
             
                <div class="col-lg-3 col-sm-12">
                	<label for="school_phone" class="col-sm-12 control-label">Phone Number</label>
                    <input type="tel" name="school_phone" class="form-control form-group" id="school_phone" placeholder="" required="required" value="<?= $school['school_phone'] ?>">
                </div>
                
			</div>
              
              <div class="row">
				  <div class="col-lg-3 col-sm-12">
                	<label for="school_contact_name" class="col-sm-12 control-label">Contact Name</label>
                    <input type="text" name="school_contact_name" class="form-control form-group" id="school_contact_name" value="<?= $school['school_contact_name'] ?>" placeholder="" required="required">              
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="school_contact_mobile" class="col-sm-12 control-label">Contact Mobile</label>
                    <input type="tel" name="school_contact_mobile" class="form-control form-group" id="school_contact_mobile" value="<?= $school['school_contact_mobile'] ?>" placeholder="" required="required">                
                </div>
			   <div class="col-lg-3 col-sm-12">
                	<label for="school_location" class="col-lg-6 col-sm-12 control-label">Location</label>
                    <select name="school_location" class="form-control form-group" id="school_location" placeholder="" required="required">
                        <option value="URBAN" <?= ($school['school_location'] == 'URBAN')?'selected': '' ?>>URBAN</option>
                        <option value="RURAL" <?= ($school['school_location'] == 'RURAL')?'selected': '' ?>>RURAL</option>
                    </select>                
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="school_status" class="col-lg-6 col-sm-12 control-label">Status</label>
                    <select name="school_status" class="form-control form-group" id="school_status" placeholder="" required="required">
                        <option value="1" <?= ($school['school_status'] == '1')?'selected': '' ?>>Active</option>
                        <option value="0" <?= ($school['school_status'] == '0')?'selected': '' ?>>In-Active</option>
                    </select>                
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Edit School" class="btn btn-info pull-right">
                </div>
              </div>
              <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
<script language="javascript" type="text/javascript">
	$('#school_district_id').on('change', function() {
		  $.post('<?=base_url("admin/school/tehsil_by_district")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  district_id : this.value
		},
		function(data){
		  arr = $.parseJSON(data);     
		  console.log(arr);     
		  $('#school_tehsil_id option:not(:first)').remove();
		  $.each(arr, function(key, value) {           
		 $('#school_tehsil_id')
			 .append($("<option></option>")
						.attr("value", value.tehsil_id)
						.text(value.tehsil_name_en)
					  ); 
			});   
		});
	});


	$('#school_emis').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
	/*
	$('#school_emis').keypress(function( e ) {
    if(e.which === 32) 
        return false;
});
*/
</script>
  <!-- DataTables -->
