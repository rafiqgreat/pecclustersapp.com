<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php $this->load->view('admin/includes/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Schools List</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
			  
            <a href="<?= base_url('admin/school/create_school_pdf?school_district_id='.$school_district_id.'&school_tehsil_id='.$school_tehsil_id.'&school_type='.$school_type.'&school_gender='.$school_gender) ?>" class="btn btn-secondary">Export as PDF</a>
            <a href="<?= base_url('admin/school/export_school_csv?school_district_id='.$school_district_id.'&school_tehsil_id='.$school_tehsil_id.'&school_type='.$school_type.'&school_gender='.$school_gender) ?>" class="btn btn-secondary">Export as CSV</a>
          </div>
			<?php if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 7){?>
          <a href="<?= base_url('admin/school/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New School</a>
			<?php }?>
        </div>
      </div>
    </div>
	  <div class="card">
      <div class="card-header">
            <?php echo form_open(base_url('admin/school'), 'class="form-horizontal" method="post"');  ?>
              <div class="row" style="width:100%">
              <div class ="col-12" style="font-size:18px; font-weight:bold">Advance Search :</div>
              <div class ="col-12">
              	<div class ="row" style="padding-top:25px">
                    <div class ="col-3" <?php if($this->session->userdata('role_id') == 7 || $this->session->userdata('role_id') == 8){?> style="display: none;"<?php }?>>
                    	<select name="school_district_id" class="form-control" id="school_district_id" placeholder="">
                      <option value="">---Select All District---</option>
                     <?php 
					 foreach($districts as $district)
						 {
							$selectedText = '';
						 	if($this->session->userdata('role_id') == 7 || $this->session->userdata('role_id') == 8){
								if($this->session->userdata('u_district_id') == $district['district_id'])
								$selectedText = ' selected="selected" ';
							}else{
								if($school_district_id == $district['district_id'])
								$selectedText = ' selected="selected" ';
							}
							echo '<option value="'.$district['district_id'].'"'.$selectedText.'>'.$district['district_name_en'].'</option>'; 
						 }
					 ?>
                    </select>
                    </div>
                    <div class ="col-3" <?php if($this->session->userdata('role_id') == 8){?> style="display: none;"<?php }?>>
                    	<select name="school_tehsil_id" class="form-control form-group" id="school_tehsil_id" placeholder="">
							<option value="">---Select All Tehsil---</option>
								<?php 
								if($this->session->userdata('role_id') == 7 || $this->session->userdata('role_id') == 8){
								   $tehsils  = $this->School_model->get_tehsil_by_district($this->session->userdata('u_district_id'));
								   foreach($tehsils as $tehsil)
									  {
										$selectedText = '';
									   if($this->session->userdata('role_id') == 8){
										   if($this->session->userdata('u_tehsil_id') == $tehsil['tehsil_id'])
											$selectedText = ' selected="selected" ';
									   }else{
										   if($school_tehsil_id == $tehsil['tehsil_id'])
											$selectedText = ' selected="selected" ';
									   }
										echo '<option value="'.$tehsil['tehsil_id'].'" '.$selectedText.'>'.$tehsil['tehsil_name_en'].'</option>';
									  }
								}else{
								   $tehsils  = $this->School_model->get_tehsil_by_district($school_district_id);
								   foreach($tehsils as $tehsil)
									  {
										$selectedText = '';
									   if($school_tehsil_id == $tehsil['tehsil_id'])
											$selectedText = ' selected="selected" ';
									  
										echo '<option value="'.$tehsil['tehsil_id'].'" '.$selectedText.'>'.$tehsil['tehsil_name_en'].'</option>';
									  }
								}
								?>
							</select>
                    </div>
                    <div class ="col-3">
						<select name="school_type" class="form-control form-group" id="school_type" placeholder="">
							<option value="">---Select All School Type---</option>
							<option value="Public" <?php if($school_type === 'Public'){?> selected="selected"<?php }?>>Public</option>
							<option value="Private" <?php if($school_type === 'Private'){?> selected="selected"<?php }?>>Private</option>
						</select>
                    </div>
					<div class ="col-3">
						<select name="school_gender" class="form-control form-group" id="school_gender" placeholder="">
							<option value="">---Select School Gender---</option>
							<option value="MALE" <?php if($school_gender === 'MALE'){?> selected="selected"<?php }?>>MALE</option>
							<option value="FEMALE" <?php if($school_gender === 'FEMALE'){?> selected="selected"<?php }?>>FEMALE</option>
							<option value="BOTH" <?php if($school_gender === 'BOTH'){?> selected="selected"<?php }?>>BOTH</option>
						</select>
                    </div>
					<?php if($this->session->userdata('role_id') == 7 || $this->session->userdata('role_id') == 8){?>
						
					<?php }else{?>
						<div class ="col-3">&nbsp;</div>
						<div class ="col-3">&nbsp;</div>
						<div class ="col-3">&nbsp;</div>
					<?php }?>
					<div class ="col-3" style="float:right"> 
						<input type="submit" id="search_school" name="search_school" class="btn btn-success" value="Search" style="width:120px; float:right"/>
					</div> 
                </div>
              </div>
              
              </div>
            <?php echo form_close( ); ?>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>EMIS Code/Login Name</th>
              <th>Type</th>
              <th>School Name</th>
              <th>Address</th>
              <th>District</th>
              <th>Tehsil</th>
			  <th>Gender</th>
              <th>Status</th>
              <th width="100" class="text-right">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>  
</div>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>
<script>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('admin/school/datatable_json?school_district_id='.$school_district_id.'&school_tehsil_id='.$school_tehsil_id.'&school_type='.$school_type.'&school_gender='.$school_gender)?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "school_id", 'searchable':false, 'orderable':false},
	{ "targets": 1, "name": "ci_schools.username", 'searchable':true, 'orderable':true},
	{ "targets": 2, "name": "school_type", 'searchable':true, 'orderable':true},
	{ "targets": 3, "name": "school_name", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "school_address", 'searchable':true, 'orderable':true},
    { "targets": 5, "name": "district_name_en", 'searchable':true, 'orderable':true},
	{ "targets": 6, "name": "tehsil_name_en", 'searchable':true, 'orderable':true},
	{ "targets": 7, "name": "school_gender", 'searchable':true, 'orderable':true},
	{ "targets": 8, "name": "school_status", 'searchable':false, 'orderable':true},
    { "targets": 9, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ]
  });
</script>


<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/school/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      school_id : $(this).data('id'),
      school_status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("School Status Changed Successfully", "success");
    });
  });
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
</script>


