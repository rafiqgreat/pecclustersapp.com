  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New School </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/school'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Schools List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/school/add'), 'class="form-horizontal"');  ?> 
              <div class="row">
                <div class="col-lg-3 col-sm-12">
                	<label for="username" class="col-sm-12 control-label">EMIS Code/Login Name</label>
                    <input type="text" name="username" class="form-control form-group" id="school_emis" placeholder="" required="required">
                </div>
				<div class="col-lg-3 col-sm-12">
                	<label for="password" class="col-sm-12 control-label">Password</label>
                    <input type="password" name="password" class="form-control form-group" id="password" placeholder="" required="required">
                </div>
				  <div class="col-lg-3 col-sm-12">
                	<label for="school_department" class="col-sm-12 control-label">Department/Body</label>
                    <select name="school_department" class="form-control form-group" id="school_department" placeholder="" required="required">
						<option value="SED">SED</option>
                        <option value="FEDERAL">FEDERAL</option>                       
                        <option value="PEF">PEIMA</option>
                        <option value="COMMUNITY">COMMUNITY</option>
						<option value="LITERACY">LITERACY</option>
						<option value="PSSP">PSSP</option>
						<option value="OTHER">OTHER</option>
                    </select>
                </div> 
				<div class="col-lg-3 col-sm-12">
                	<label for="school_type" class="col-sm-12 control-label">School Type</label>
                    <select name="school_type" class="form-control form-group" id="school_type" placeholder="" required="required">
                        <option value="Public">Public</option>
                        <option value="Private">Private</option>
                    </select>
                </div> 
				               
              </div>
              
              <div class="row">
                <div class="col-lg-3 col-sm-12" >
                	<label for="school_name" class="col-sm-12 control-label">School Name</label>
                    <input type="text" name="school_name" class="form-control form-group" id="school_name" placeholder="" required="required">
                </div>
              	<div class="col-lg-3 col-sm-12">
                	<label for="school_address" class="col-sm-12 control-label">School Address</label>
                    <input type="text" name="school_address" class="form-control form-group" id="school_address" placeholder="" required="required">
                </div>
               <div class="col-lg-3 col-sm-12">
                	<label for="school_district_id" class="col-sm-12 control-label">District</label>
                     <select name="school_district_id" class="form-control form-group" id="school_district_id" placeholder="" required="required" <?php if($this->session->userdata('role_id') == 7){?> disabled<?php }?>>
                      <option value="">---Select District---</option>
                     <?php 
					 foreach($districts as $row)
					 {
						 $selectedText = '';
						 if($this->session->userdata('role_id') == 7)
							if($this->session->userdata('u_district_id') == $row['district_id'])
							$selectedText = ' selected="selected" ';
							echo '<option value="'.$row['district_id'].'"'.$selectedText.'>'.$row['district_name_en'].'</option>'; 
						//echo '<option value="'.$row['district_id'].'">'.$row['district_name_en'].'</option>'; 
					 }
					 ?>
                    </select>
                </div>             
                <div class="col-lg-3 col-sm-12">
                	<label for="school_tehsil_id" class="col-lg-6 col-sm-12 control-label">Tehsil</label>
					<select name="school_tehsil_id" class="form-control form-group" id="school_tehsil_id" placeholder="" required="required">
                    <option value="">---Select Tehsil---</option>
						<?php 
						if($this->session->userdata('role_id') == 7){
							$tehsils  = $this->School_model->get_tehsil_by_district($this->session->userdata('u_district_id'));
						   foreach($tehsils as $tehsil)
							  {
								$selectedText = '';
								echo '<option value="'.$tehsil['tehsil_id'].'" '.$selectedText.'>'.$tehsil['tehsil_name_en'].'</option>';
							  }
						}
						?>
                    </select>
                </div>
                
              </div>
              
              <div class="row">
				  <div class="col-lg-3 col-sm-12">
                	<label for="school_level" class="col-sm-12 control-label">School Level</label>
                    <select name="school_level" class="form-control form-group" id="school_level" placeholder="" required="required">
                        <option value="Primary">Primary</option>
                        <option value="Elementary">Elementary</option>
                        <option value="High">High</option>
                        <option value="Higher Secondary">Higher Secondary</option>
                    </select>
                </div>
              	<div class="col-lg-3 col-sm-12">
                	<label for="school_gender" class="col-sm-12 control-label">School Gender</label>
                    <select name="school_gender" class="form-control form-group" id="school_gender" placeholder="" required="required">
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                        <option value="BOTH">BOTH</option>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="school_email" class="col-sm-12 control-label">School Email</label>
                    <input type="email" name="school_email" class="form-control form-group" id="school_email" placeholder="" required="required">
                </div>             
             
                <div class="col-lg-3 col-sm-12">
                	<label for="school_phone" class="col-sm-12 control-label">Phone Number</label>
                    <input type="tel" name="school_phone" class="form-control form-group" id="school_phone" placeholder="" required="required">
                </div>
                
			</div>
              
              <div class="row">
				  <div class="col-lg-3 col-sm-12">
                	<label for="school_contact_name" class="col-sm-12 control-label">Contact Name</label>
                    <input type="text" name="school_contact_name" class="form-control form-group" id="school_contact_name" placeholder="" required="required">              
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="school_contact_mobile" class="col-sm-12 control-label">Contact Mobile</label>
                    <input type="tel" name="school_contact_mobile" class="form-control form-group" id="school_contact_mobile" placeholder="" required="required">                
                </div>
				  
			   <div class="col-lg-3 col-sm-12">
                	<label for="school_location" class="col-lg-6 col-sm-12 control-label">Location</label>
                    <select name="school_location" class="form-control form-group" id="school_location" placeholder="" required="required">
                        <option value="URBAN">URBAN</option>
                        <option value="RURAL">RURAL</option>
                    </select>                
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="school_status" class="col-lg-6 col-sm-12 control-label">Status</label>
                    <select name="school_status" class="form-control form-group" id="school_status" placeholder="" required="required">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>                
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add School" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
  <!-- DataTables -->
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
	
	$( '#school_emis' ).on( 'blur', function () {
			$.post( '<?=base_url("admin/school/username_exist")?>', {
					'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
					username: this.value
				},
				function ( data ) {
					if ( data == 1 ) {
						alert( 'Username already exist!' );
						$( '#school_emis' ).select();
					}
				})
		});
	/*
	$('#school_emis').keypress(function( e ) {
    if(e.which === 32) 
        return false;
});
*/
</script>
