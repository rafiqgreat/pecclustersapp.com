  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Exams Center </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/clustercenter'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Exams Centers List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php 
			print_r($_SESSION);
			$this->load->view('admin/includes/_messages.php'); ?>
            <?php echo form_open(base_url('admin/clustercenter/add'), 'class="form-horizontal"');  ?> 
              <div class="row">
                <div class="col-lg-12 col-sm-12">
                	<label for="cc_type" class="col-sm-12 control-label">Type</label>
                    <select name="cc_type" class="form-control form-group" id="cc_type" placeholder="" required="required">
                        <option value="">-- Select Type --</option>
                        <option value="CLUSTER">Exams</option>
                        <option value="PEF">PEIMA</option>
                    </select>
                </div> 
				               
              </div>
              <div class="row">
                <div class="col-lg-3 col-sm-12" >
                	<label for="cc_name" class="col-sm-12 control-label">Exams Center Name</label>
                    <input type="text" name="cc_name" class="form-control form-group" id="cc_name" placeholder="" required="required">
                </div>
              	<div class="col-lg-3 col-sm-12">
                	<label for="cc_address" class="col-sm-12 control-label">Exams Center Address</label>
                    <input type="text" name="cc_address" class="form-control form-group" id="cc_address" placeholder="" required="required">
                </div>
               <div class="col-lg-3 col-sm-12">
                	<label for="cc_district_id" class="col-sm-12 control-label">District</label>
                     <select name="cc_district_id" class="form-control form-group" id="cc_district_id" placeholder="" required="required" <?php if($this->session->userdata('role_id') == 7){?> disabled<?php }?>>
                      <option value="">---Select District---</option>
                     <?php 
					 foreach($districts as $row)
					 {
						 echo '<option value="'.$row['district_id'].'"'.$selectedText.'>'.$row['district_name_en'].'</option>';
					 }
					 ?>
                    </select>
                </div>             
                <div class="col-lg-3 col-sm-12">
                	<label for="cc_tehsil_id" class="col-lg-6 col-sm-12 control-label">Tehsil</label>
					<select name="cc_tehsil_id" class="form-control form-group" id="cc_tehsil_id" placeholder="" required="required">
                    <option value="">---Select Tehsil---</option>
						<?php 
						if($this->session->userdata('role_id') == 7){
							$tehsils  = $this->clustercenter_model->get_tehsil_by_district($this->session->userdata('u_district_id'));
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
                	<label for="cc_level" class="col-sm-12 control-label">Exams Center Level</label>
                    <select name="cc_level" class="form-control form-group" id="cc_level" placeholder="" required="required">
                        <option value="Primary">Primary</option>
                        <option value="Elementary">Elementary</option>
                        <option value="High">High</option>
                        <option value="Higher Secondary">Higher Secondary</option>
                    </select>
                </div>
              	<div class="col-lg-3 col-sm-12">
                	<label for="cc_gender" class="col-sm-12 control-label">Exams Center Gender</label>
                    <select name="cc_gender" class="form-control form-group" id="cc_gender" placeholder="" required="required">
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                        <option value="BOTH">BOTH</option>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="cc_email" class="col-sm-12 control-label">Exams Center Email</label>
                    <input type="email" name="cc_email" class="form-control form-group" id="cc_email" placeholder="" required="required">
                </div>             
             
                <div class="col-lg-3 col-sm-12">
                	<label for="cc_phone" class="col-sm-12 control-label">Phone Number</label>
                    <input type="tel" name="cc_phone" class="form-control form-group" id="cc_phone" placeholder="" required="required">
                </div>
                
			</div>
              
              <div class="row">
				  <div class="col-lg-3 col-sm-12">
                	<label for="cc_contact_name" class="col-sm-12 control-label">Contact Name</label>
                    <input type="text" name="cc_contact_name" class="form-control form-group" id="cc_contact_name" placeholder="" required="required">              
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="cc_contact_mobile" class="col-sm-12 control-label">Contact Mobile</label>
                    <input type="tel" name="cc_contact_mobile" class="form-control form-group" id="cc_contact_mobile" placeholder="" required="required">                
                </div>
				  
			   <div class="col-lg-3 col-sm-12">
                	<label for="cc_location" class="col-lg-6 col-sm-12 control-label">Location</label>
                    <select name="cc_location" class="form-control form-group" id="cc_location" placeholder="" required="required">
                        <option value="URBAN">URBAN</option>
                        <option value="RURAL">RURAL</option>
                    </select>                
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="cc_status" class="col-lg-6 col-sm-12 control-label">Status</label>
                    <select name="cc_status" class="form-control form-group" id="cc_status" placeholder="" required="required">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>                
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add" class="btn btn-info pull-right">
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
$('#cc_district_id').on('change', function() {
      $.post('<?=base_url("admin/clustercenter/tehsil_by_district")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      district_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#cc_tehsil_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#cc_tehsil_id')
         .append($("<option></option>")
                    .attr("value", value.tehsil_id)
                    .text(value.tehsil_name_en)
                  ); 
        });   
    });
});


	$('#cc_emis').on('keypress', function (event) {
		var regex = new RegExp("^[a-zA-Z0-9]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
		   event.preventDefault();
		   return false;
		}
	});
	
	$( '#cc_emis' ).on( 'blur', function () {
			$.post( '<?=base_url("admin/clustercenter/username_exist")?>', {
					'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
					username: this.value
				},
				function ( data ) {
					if ( data == 1 ) {
						alert( 'Username already exist!' );
						$( '#cc_emis' ).select();
					}
				})
		});
</script>
