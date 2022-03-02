  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <?php $var_div_cs_type ="";?>
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Edit Cluster Center/School </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/clusterschool'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Cluster Centers List</a>
          </div>
          <div class="d-inline-block float-right" style="margin-right:05px">
            <a href="<?= base_url('admin/clusterschool/school'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  School List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/clusterschool/edit/'.$culsch['cs_id']), 'class="form-horizontal" method="POST"');  
				$var_div_cs_type = $culsch['cs_type'];
			?> 
              <div class="form-group row">
                 <div class="col-lg-12 col-sm-12" >
                	<label for="cs_type" class="col-sm-12 control-label"> Type</label>
                    <select name="cs_type" class="form-control" id="cs_type" placeholder="" required="required">
                        <option value="CLUSTER" <?= ($culsch['cs_type'] == 'CLUSTER')?'selected': '' ?>>CLUSTER</option>
                        <option value="PEF" <?= ($culsch['cs_type'] == 'PEF')?'selected': '' ?>>PEF</option>
                    </select>
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-3 col-sm-12" >
                	<label for="cs_name" class="col-sm-12 control-label">School Name</label>
                    <input type="text" name="cs_name" class="form-control form-group" id="cs_name" placeholder="" required="required" value="<?= $culsch['cs_name'] ?>">
                </div>
              	<div class="col-lg-3 col-sm-12">
                	<label for="cs_address" class="col-sm-12 control-label">School Address</label>
                    <input type="text" name="cs_address" class="form-control form-group" id="cs_address" placeholder="" required="required" value="<?= $culsch['cs_address'] ?>">
                </div>
               <div class="col-lg-3 col-sm-12">
                	<label for="cs_district_id" class="col-sm-12 control-label">District</label>
                     <select name="cs_district_id" class="form-control" id="cs_district_id" placeholder="" required="required">
                      <option value="">---Select District---</option>
                     <?php 
					 foreach($districts as $row)
						 {
							$selectedText = '';
							if($culsch['cs_district_id']==$row['district_id'])
							$selectedText = ' selected="selected" ';
							echo '<option value="'.$row['district_id'].'"'.$selectedText.'>'.$row['district_name_en'].'</option>'; 
						 }
					 ?>
                    </select>
                </div>             
                <div class="col-lg-3 col-sm-12">
                	<label for="cs_tehsil_id" class="col-lg-6 col-sm-12 control-label">Tehsil</label>
					<select name="cs_tehsil_id" class="form-control form-group" id="cs_tehsil_id" placeholder="" required="required" <?php if($this->session->userdata('role_id') == 8){ print 'disabled';}?>>
                    	<option value="">---Select Tehsil---</option>
                    	<?php
							//print_r($tehsils);
							//die(); 
						   $tehsils  = $this->Clusterschool_model->get_tehsil_by_district($culsch['cs_district_id']);
						   foreach($tehsils as $tehsil)
							  {
								$selectedText = '';
								  if($tehsil['tehsil_id']==$culsch['cs_tehsil_id'])
								  $selectedText = ' selected="selected" ';
								echo '<option value="'.$tehsil['tehsil_id'].'" '.$selectedText.'>'.$tehsil['tehsil_name_en'].'</option>';
							  }
						  ?>
                    </select>
                </div>
                
              </div>
              
              <div class="row">
				  <div class="col-lg-3 col-sm-12">
                	<label for="cs_level" class="col-sm-12 control-label">School Level</label>
                    <select name="cs_level" class="form-control form-group" id="cs_level" placeholder="" required="required">
                        <option value="Primary" <?= ($culsch['cs_level'] == 'Primary')?'selected': '' ?>>Primary</option>
                        <option value="Elementary" <?= ($culsch['cs_level'] == 'Elementary')?'selected': '' ?>>Elementary</option>
                        <option value="High" <?= ($culsch['cs_level'] == 'High')?'selected': '' ?>>High</option>
                        <option value="Higher Secondary" <?= ($culsch['cs_level'] == 'Higher Secondary')?'selected': '' ?>>Higher Secondary</option>
                    </select>
                </div>
              	<div class="col-lg-3 col-sm-12">
                	<label for="cs_gender" class="col-sm-12 control-label">School Gender</label>
                    <select name="cs_gender" class="form-control form-group" id="cs_gender" placeholder="" required="required">
                        <option value="MALE" <?= ($culsch['cs_gender'] == 'MALE')?'selected': '' ?>>MALE</option>
                        <option value="FEMALE" <?= ($culsch['cs_gender'] == 'FEMALE')?'selected': '' ?>>FEMALE</option>
                        <option value="BOTH" <?= ($culsch['cs_gender'] == 'BOTH')?'selected': '' ?>>BOTH</option>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="cs_email" class="col-sm-12 control-label">School Email</label>
                    <input type="email" name="cs_email" class="form-control form-group" id="cs_email" placeholder="" required="required" value="<?= $culsch['cs_email'] ?>">
                </div>             
             
                <div class="col-lg-3 col-sm-12">
                	<label for="cs_phone" class="col-sm-12 control-label">Phone Number</label>
                    <input type="tel" name="cs_phone" class="form-control form-group" id="cs_phone" placeholder="" required="required" value="<?= $culsch['cs_phone'] ?>">
                </div>
                
			</div>
              
              <div class="row">
				  <div class="col-lg-3 col-sm-12">
                	<label for="cs_contact_name" class="col-sm-12 control-label">Contact Name</label>
                    <input type="text" name="cs_contact_name" class="form-control form-group" id="cs_contact_name" value="<?= $culsch['cs_contact_name'] ?>" placeholder="" required="required">              
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="cs_contact_mobile" class="col-sm-12 control-label">Contact Mobile</label>
                    <input type="tel" name="cs_contact_mobile" class="form-control form-group" id="cs_contact_mobile" value="<?= $culsch['cs_contact_mobile'] ?>" placeholder="" required="required">                
                </div>
			   <div class="col-lg-3 col-sm-12">
                	<label for="cs_location" class="col-lg-6 col-sm-12 control-label">Location</label>
                    <select name="cs_location" class="form-control form-group" id="cs_location" placeholder="" required="required">
                        <option value="URBAN" <?= ($culsch['cs_location'] == 'URBAN')?'selected': '' ?>>URBAN</option>
                        <option value="RURAL" <?= ($culsch['cs_location'] == 'RURAL')?'selected': '' ?>>RURAL</option>
                    </select>                
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="cs_status" class="col-lg-6 col-sm-12 control-label">Status</label>
                    <select name="cs_status" class="form-control form-group" id="cs_status" placeholder="" required="required">
                        <option value="1" <?= ($culsch['cs_status'] == '1')?'selected': '' ?>>Active</option>
                        <option value="0" <?= ($culsch['cs_status'] == '0')?'selected': '' ?>>In-Active</option>
                    </select>                
                </div>
              </div>
              <div class="row" id="div_cs_parent">
                	<label for="cs_parent" class="col-sm-12 control-label">Select Cluster Center</label>
                    <select name="cs_parent" class="form-control form-group" id="cs_parent">
                        <option value="">---Select Cluster Center---</option>
                        <?php
                        $clustercenters = $this->Clusterschool_model->get_all_clustercenters($culsch['cs_district_id']);
						foreach($clustercenters as $clustercenter)
							  {
								$selectedText = '';
								  if($clustercenter['cs_id']==$culsch['cs_parent'])
								  $selectedText = ' selected="selected" ';
								echo '<option value="'.$clustercenter['cs_id'].'" '.$selectedText.'>'.$clustercenter['cs_name'].'</option>';
							  }
						?>
                    </select>
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
<?php if($var_div_cs_type == "CLUSTER"){?>
	$('#div_cs_parent').css('display','none');
<?php } ?>
	$('#cs_district_id').on('change', function() {
		  $.post('<?=base_url("admin/clusterschool/tehsil_by_district")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  district_id : this.value
		},
		function(data){
		  arr = $.parseJSON(data);     
		  console.log(arr);     
		  $('#cs_tehsil_id option:not(:first)').remove();
		  $.each(arr, function(key, value) {           
		 $('#cs_tehsil_id')
			 .append($("<option></option>")
						.attr("value", value.tehsil_id)
						.text(value.tehsil_name_en)
					  ); 
			});   
		});
	});
	
$('#cs_district_id').on('change', function() {
      $.post('<?=base_url("admin/clusterschool/clustercenter_by_district")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      district_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#cs_parent option:not(:first)').remove();
      $.each(arr, function(key, value) {           
      $('#cs_parent')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_name)
                  ); 
        });   
    });
});

$('#cs_type').on('change', function() {
	if(this.value == 'PEF'){
		$('#div_cs_parent').css('display','block');
		$("#div_cs_parent").prop('required',true);
	}else{
		$('#div_cs_parent').css('display','none');
		$("#div_cs_parent").prop('required',false);
	}
});
	$('#cs_emis').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
</script>
  <!-- DataTables -->
