  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Flot Charts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Flot</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">        

        <div class="row">
          <div class="col-md-12">
            <!-- Line chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-bar-chart-o"></i>
                  Line Chart
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="line-chart" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->

            <!-- Area chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-bar-chart-o"></i>
                  Quantile plot data
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="area-chart" style="height: 338px;" class="full-width-chart">
                  <table border="1" cellspacing="0" cellpadding="0" class="table table-hover">
					  <tbody>
                    <tr>
                      <th width="64" valign="top"><p>Option</p></th>
                      <th width="59" valign="top"><p>N</p></th>
                      <th width="59" valign="top"><p>0-20%</p></th>
                      <th width="59" valign="top"><p>20-40%</p></th>
                      <th width="59" valign="top"><p>40-60%</p></th>
                      <th width="59" valign="top"><p>60-80%</p></th>
                      <th width="64" valign="top"><p>80-100%</p></th>
                      <th width="59" valign="top"><p>Color</p></th>
                      <th width="59" valign="top"><p>&nbsp;</p></th>
                    </tr>
						  </tbody>
                    <tr>
                      <td width="64" valign="top"><p>A</p></td>
                      <td width="59" valign="top"><p>89</p></td>
                      <td width="59" valign="top"><p>0.339</p></td>
                      <td width="59" valign="top"><p>0.227</p></td>
                      <td width="59" valign="top"><p>0.164</p></td>
                      <td width="59" valign="top"><p>0.141</p></td>
                      <td width="64" valign="top"><p>0.429</p></td>
                      <td width="59" valign="top"><p>Maroon</p></td>
                      <td width="59" valign="top"><p>&nbsp;</p></td>
                    </tr>
                    <tr>
                      <td width="64" valign="top"><p>B</p></td>
                      <td width="59" valign="top"><p>50</p></td>
                      <td width="59" valign="top"><p>0.177</p></td>
                      <td width="59" valign="top"><p>0.200</p></td>
                      <td width="59" valign="top"><p>0.134</p></td>
                      <td width="59" valign="top"><p>0.113</p></td>
                      <td width="64" valign="top"><p>0.100</p></td>
                      <td width="59" valign="top"><p>Green</p></td>
                      <td width="59" valign="top"><p>&nbsp;</p></td>
                    </tr>
                    <tr>
                      <td width="64" valign="top"><p>C</p></td>
                      <td width="59" valign="top"><p>59</p></td>
                      <td width="59" valign="top"><p>0.274</p></td>
                      <td width="59" valign="top"><p>0.307</p></td>
                      <td width="59" valign="top"><p>0.104</p></td>
                      <td width="59" valign="top"><p>0.099</p></td>
                      <td width="64" valign="top"><p>0.071</p></td>
                      <td width="59" valign="top"><p>Blue</p></td>
                      <td width="59" valign="top"><p>&nbsp;</p></td>
                    </tr>
                    <tr>
                      <td width="64" valign="top"><p>D</p></td>
                      <td width="59" valign="top"><p>147</p></td>
                      <td width="59" valign="top"><p>0.210</p></td>
                      <td width="59" valign="top"><p>0.267</p></td>
                      <td width="59" valign="top"><p>0.597</p></td>
                      <td width="59" valign="top"><p>0.648</p></td>
                      <td width="64" valign="top"><p>0.400</p></td>
                      <td width="59" valign="top"><p>Olive</p></td>
                      <td width="59" valign="top"><p>**KEY**</p></td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- FLOT CHARTS -->
<script src="<?= base_url()?>assets/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?= base_url()?>assets/plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?= base_url()?>assets/plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?= base_url()?>assets/plugins/flot/jquery.flot.categories.min.js"></script>
<!-- Page script -->
<script>
   

    /*
     * LINE CHART
     * ----------
	  var a = [0.565,0.526,0.412,0.472,0.600],
        b = [0.145,0.263,0.324,0.236,0.200], 
		c = [0.177,0.145,0.235,0.139,0.186], 
		d = [0.113,0.066,0.029,0.153,0.014];
     */
    //LINE randomly generated data
	var a = [], b=[], c=[], d=[];
	  a.push([0,]);
	  a.push([1,0.565]);
	  a.push([2,0.526]);
	  a.push([3,0.412]);
	  a.push([4,0.472]);
	  a.push([5,0.600]);
	  a.push([6,]);
	  
	  b.push([1,0.145]);
	  b.push([2,0.263]);
	  b.push([3,0.324]);
	  b.push([4,0.236]);
	  b.push([5,0.186]);
	  
	  c.push([1,0.177]);
	  c.push([2,0.145]);
	  c.push([3,0.235]);
	  c.push([4,0.139]);
	  c.push([5,0.186]);
	  
	  d.push([1,0.113]);
	  d.push([2,0.066]);
	  d.push([3,0.029]);
	  d.push([4,0.153]);
	  d.push([5,0.014]);
	  
  
   var line_data1 = {
      data : a,
      color: '#551d20'
    }
    var line_data2 = {
      data : b,
      color: '#01800b'
    }
	var line_data3 = {
      data : c,
      color: '#0000d1'
    }
    var line_data4 = {
      data : d,
      color: '#6d7636'
    }
    $.plot('#line-chart', [line_data1, line_data2, line_data3, line_data4], {
      grid  : {
        hoverable  : true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0,
        lines     : {
          show: true
        },
        points    : {
          show: true
        }
      },
      lines : {
        fill : false,
        color: ['#3c8dbc', '#f56954']
      },
      yaxis : {
        show: true
      },
      xaxis : {
        show: true
      }
    })
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: 'absolute',
      display : 'none',
      opacity : 0.8
    }).appendTo('body')
    $('#line-chart').bind('plothover', function (event, pos, item) {

      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2)

        $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
          .css({
            top : item.pageY + 5,
            left: item.pageX + 5
          })
          .fadeIn(200)
      } else {
        $('#line-chart-tooltip').hide()
      }

    })
    /* END LINE CHART */
  
</script>