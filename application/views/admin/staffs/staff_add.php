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

              <div class="form-group">

                <label for="staffname" class="col-sm-2 control-label">Staff Name</label>



                <div class="col-12">

                  <input type="text" name="staffname" class="form-control" id="staffname" placeholder="">

                </div>

              </div>

              <div class="form-group">

                <label for="firstname" class="col-sm-2 control-label">First Name</label>



                <div class="col-12">

                  <input type="text" name="firstname" class="form-control" id="firstname" placeholder="">

                </div>

              </div>

              

              <div class="form-group">

                <label for="lastname" class="col-sm-2 control-label">Last Name</label>



                <div class="col-12">

                  <input type="text" name="lastname" class="form-control" id="lastname" placeholder="">

                </div>

              </div>



              <div class="form-group">

                <label for="email" class="col-sm-2 control-label">Email</label>



                <div class="col-12">

                  <input type="email" name="email" class="form-control" id="email" placeholder="">

                </div>

              </div>

              <div class="form-group">
                <label for="type" class="col-sm-2 control-label">Type</label>

                <div class="col-md-12">
                <select id="type" name="type" class="form-control">
                <option value="RI">RI</option>
                <option value="INVIGILATOR">INVIGILATOR</option>
                <option value="SUPERINTENDENT">SUPERINTENDENT</option>
               </select>
                </div>
              </div>

              <div class="form-group">

                <label for="mobile_no" class="col-sm-2 control-label">Mobile No</label>



                <div class="col-12">

                  <input type="number" name="mobile_no" class="form-control" id="mobile_no" placeholder="">

                </div>

              </div>

             

            <div class="form-group">

                <label for="address" class="col-sm-2 control-label">Address</label>



                <div class="col-12">

                  <input type="text" name="address" class="form-control" id="address" placeholder="">

                </div>

              </div>

              <div class="form-group">
                <label for="school_id" class="col-sm-2 control-label">School Name</label>

                <div class="col-md-12">
                <select id="school_id" name="school_id" class="form-control">
                <option id="1"value="1">test 1</option>
                <option id="2" value="2">test 2</option>
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