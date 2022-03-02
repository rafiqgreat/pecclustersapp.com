<style>
	.schoolpara {
		padding-right: 7.5px;
		padding-left: 7.5px;
	}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"> <i class="fa fa-plus"></i>
               School Detail </h3>
				</div>
				<div class="d-inline-block float-right">
					<a href="<?= base_url('admin/school'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Schools List</a>
				</div>
			</div>
			<div class="card-body">
				<?php 
			$school = $school[0];
			//print '<pre>'; 
			//print_r($school);
			?>
				<!-- For Messages -->
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="username" class="col-sm-12 control-label">EMIS Code/Login Name:</label>
						<p class="schoolpara">
							<?php print $school['username']?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="school_department" class="col-sm-12 control-label">Department/Body:</label>
						<p class="schoolpara">
							<?php print $school['school_department']?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="school_type" class="col-sm-12 control-label">School Type:</label>
						<p class="schoolpara">
							<?php print $school['school_type']?>
						</p>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="school_name" class="col-sm-12 control-label">School Name:</label>
						<p class="schoolpara">
							<?php print $school['school_name']?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="school_address" class="col-sm-12 control-label">School Address:</label>
						<p class="schoolpara">
							<?php print $school['school_address']?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="school_district_id" class="col-sm-12 control-label">District:</label>
						<p class="schoolpara">
							<?php print $school['district_name_en']?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="school_tehsil_id" class="col-lg-6 col-sm-12 control-label">Tehsil:</label>
						<p class="schoolpara">
							<?php print $school['tehsil_name_en']?>
						</p>
					</div>

				</div>

				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="school_level" class="col-sm-12 control-label">School Level:</label>
						<p class="schoolpara">
							<?php print $school['school_level']?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="school_gender" class="col-sm-12 control-label">School Gender:</label>
						<p class="schoolpara">
							<?php print $school['school_gender']?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="school_email" class="col-sm-12 control-label">School Email:</label>
						<p class="schoolpara">
							<?php print $school['school_email']?>
						</p>
					</div>

					<div class="col-lg-3 col-sm-12">
						<label for="school_phone" class="col-sm-12 control-label">Phone Number:</label>
						<p class="schoolpara">
							<?php print $school['school_phone']?>
						</p>
					</div>

				</div>

				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="school_contact_name" class="col-sm-12 control-label">Contact Name:</label>
						<p class="schoolpara">
							<?php print $school['school_contact_name']?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="school_contact_mobile" class="col-sm-12 control-label">Contact Mobile:</label>
						<p class="schoolpara">
							<?php print $school['school_contact_mobile']?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="school_location" class="col-lg-6 col-sm-12 control-label">Location:</label>
						<p class="schoolpara">
							<?php print $school['school_location']?>
						</p>
					</div>
				</div>

				<!-- /.box-body -->
			</div>
		</div>
	</section>
</div>