<style>
	.border-none {
	  border-collapse: collapse;
	  border: none;
	}

	.border-none td {
	  border: 1px solid black;
	}

	.border-none tr:first-child td {
	  border-top: none;
	}

	.border-none tr:last-child td {
	  border-bottom: none;
	}

	.border-none tr td:first-child {
	  border-left: none;
	}

	.border-none tr td:last-child {
	  border-right: none;
	}
	.tabletd tr{
		line-height: 30px;
	}	
	.bordertop{
		border-top: 1px solid #000 !important;
	}
	[data-title] 
	{
		font-size: 18px;
		position: relative;
		/*cursor: help;*/
	}
	[data-title]:hover::before 
	{
		content: attr(data-title);
		position: absolute;
		bottom: -46px;
		padding: 10px;
		background: #000;
		color: #CCC;
		font-size: 14px;
		white-space: nowrap;
	}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Main content -->
  <section class="content">
    <div class="card card-default color-palette-bo">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"> <i class="fa fa-plus"></i> School Wise MCQs & ERQs Detail </h3>
        </div>
        <div class="d-inline-block float-right"> <a href="<?= base_url('admin/school/schools_report'); ?>" class="btn btn-success"><i class="fa fa-list"></i> District Schools Report</a> </div>
      </div>
      <div class="card-body">
        <table class="tabletd" style="width: 100%; text-align:center" border="2" cellpadding="0">
          <thead>
            <tr>
              <th style="padding: 10px 0;">#</th>
              <th width="40%">Name of School</th>
              <th>Type</th>
              <th>Class wise Generated Paper MCQs
                <table class="border-none" style="width: 100%">
                  <tbody>
                    <tr>
                      <td class="bordertop" width="16.6%"><strong>3</strong></td>
                      <td class="bordertop" width="16.6%"><strong>4</strong></td>
                      <td class="bordertop" width="16.6%"><strong>5</strong></td>
                      <td class="bordertop" width="16.6%"><strong>6</strong></td>
                      <td class="bordertop" width="16.6%"><strong>7</strong></td>
                      <td class="bordertop" width="16.6%"><strong>8</strong></td>
                    </tr>
                  </tbody>
                </table>
              </th>
              <th>Class wise Generated Paper ERQs
                <table class="border-none" style="width: 100%">
                  <tbody>
                    <tr>
                      <td class="bordertop" width="16.6%"><strong>3</strong></td>
                      <td class="bordertop" width="16.6%"><strong>4</strong></td>
                      <td class="bordertop" width="16.6%"><strong>5</strong></td>
                      <td class="bordertop" width="16.6%"><strong>6</strong></td>
                      <td class="bordertop" width="16.6%"><strong>7</strong></td>
                      <td class="bordertop" width="16.6%"><strong>8</strong></td>
                    </tr>
                  </tbody>
                </table>
              </th>
            </tr>
          </thead>
          <tbody>
          
          <?php $i=0;foreach($schools as $row){ $i++;?>
          	<tr>
              <td><?php echo $i;?></td>
              <td data-title = "<?php echo $row['school_name'];?>" style="text-align:left; padding-left:5px"><?php echo substr($row['school_name'],0,40);?></td>
              <td><?php echo $row['school_type'];?></td>
              <td>
                <table class="border-none" style="width: 100%; height: 100%;">
                	<?php $school_mcq = $this->School_model->get_mcq_stats_for_school($row['school_id']); $school_mcq = $school_mcq[0]; ?>
                    <tr>
                      <td width="16.6%"><strong><?php echo $school_mcq['5_mcqs'];?></strong></td>
                      <td width="16.6%"><strong><?php echo $school_mcq['6_mcqs'];?></strong></td>
                      <td width="16.6%"><strong><?php echo $school_mcq['7_mcqs'];?></strong></td>
                      <td width="16.6%"><strong><?php echo $school_mcq['8_mcqs'];?></strong></td>
                      <td width="16.6%"><strong><?php echo $school_mcq['9_mcqs'];?></strong></td>
                      <td width="16.6%"><strong><?php echo $school_mcq['10_mcqs'];?></strong></td>
                    </tr>
                </table>
              </td>
              <td>
               	<table class="border-none" style="width: 100%; height: 100%;">
                	<?php $school_crq = $this->School_model->get_crq_stats_for_school($row['school_id']); $school_crq = $school_crq[0];?>
                    <tr>
                      <td width="16.6%"><strong><?php echo $school_crq['5_crqs'];?></strong></td>
                      <td width="16.6%"><strong><?php echo $school_crq['6_crqs'];?></strong></td>
                      <td width="16.6%"><strong><?php echo $school_crq['7_crqs'];?></strong></td>
                      <td width="16.6%"><strong><?php echo $school_crq['8_crqs'];?></strong></td>
                      <td width="16.6%"><strong><?php echo $school_crq['9_crqs'];?></strong></td>
                      <td width="16.6%"><strong><?php echo $school_crq['10_crqs'];?></strong></td>
                    </tr>
                </table>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
