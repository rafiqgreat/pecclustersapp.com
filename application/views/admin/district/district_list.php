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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; District List</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/district/create_district_pdf" class="btn btn-secondary">Export as PDF</a>
            <a href="<?= base_url() ?>admin/district/export_district_csv" class="btn btn-secondary">Export as CSV</a>
          </div>
          <a href="<?= base_url('admin/district/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New District</a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Code</th>
              <th>Name</th>
              <th>نام</th>
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
    "ajax": "<?=base_url('admin/district/datatable_json')?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "district_id", 'searchable':true, 'orderable':true},
	{ "targets": 1, "name": "district_code", 'searchable':true, 'orderable':true},
	{ "targets": 2, "name": "district_name_en", 'searchable':true, 'orderable':true},
	{ "targets": 3, "name": "district_name_ur", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "district_status", 'searchable':true, 'orderable':true},
	{ "targets": 5, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ]
  });
</script>


<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/district/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      district_id : $(this).data('id'),
      district_status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("District Status Changed Successfully", "success");
    });
  });

</script>


