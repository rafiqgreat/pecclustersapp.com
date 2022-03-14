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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; PEIMA School List</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
			<a href="<?= base_url('admin/clusterschool/create_pefschool_pdf')?>" class="btn btn-secondary" style="margin-right:05px" >Export as PDF</a>
            <a href="<?= base_url('admin/clusterschool/export_pefschool_csv') ?>" class="btn btn-secondary">Export as CSV</a>
          </div>
			<?php if($this->session->userdata('admin_role_id') == 1){?>
          	<a href="<?= base_url('admin/clusterschool/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New School</a>
			<?php }?>
        </div>
      </div>
    </div>
	<div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Type</th>
              <th>Exams Center</th>
              <th>Name</th>
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
  /*< ?=base_url('admin/school/datatable_json?school_district_id='.$school_district_id.'&school_tehsil_id='.$school_tehsil_id.'&school_type='.$school_type.'&school_gender='.$school_gender)?>*/
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('admin/clusterschool/datatable_json_pef_school')?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "cs_id", 'searchable':false, 'orderable':false},
	{ "targets": 1, "name": "cs_type", 'searchable':true, 'orderable':true},
	{ "targets": 2, "name": "cs_parent", 'searchable':true, 'orderable':true},
	{ "targets": 3, "name": "cs_name", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "cs_address", 'searchable':true, 'orderable':true},
    { "targets": 5, "name": "district_name_en", 'searchable':true, 'orderable':true},
	{ "targets": 6, "name": "tehsil_name_en", 'searchable':true, 'orderable':true},
	{ "targets": 7, "name": "cs_gender", 'searchable':true, 'orderable':true},
	{ "targets": 8, "name": "cs_status", 'searchable':false, 'orderable':true},
    { "targets": 9, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ]
  });
</script>


<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/clusterschool/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : $(this).data('id'),
      cs_status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("School Status Changed Successfully", "success");
    });
  });
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
</script>


