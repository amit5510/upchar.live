<!DOCTYPE html>
<html>
  <style>
    .tabledata{
      border:1px solid #fff!important;
      font-weight:600;
    }
    .tableheaddata{
      border:1px solid #fff!important;
      background:#605CA8;
      color:#fff;
    }
    .error valid{
      color:green!important;
    }
    .tabledataactive{
      color:green;
    }
    .tabledatainactive{
      color:red;
    }
     table.dataTable tbody tr {
      background-color: #e5e4f1;
  }
  </style>
  <style>
    
    .label-name{
      text-align:left!important;
      margin-top:-5px;
    }
    .starspan
    {
      color:#e80909;
      font-size:18px;
    }
    .mainheadlinerow
    {
      padding:5px;margin-top:10px;margin-bottom:10px;
    }
    .mainheadline
    {
      background:#605ca8;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;
    }
    .mainheadlinefirstrow
    {
      padding:5px;
    }
    .mainheadlinefirst
    {
      background:#605ca8;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;
    }
    .mainhead{font-weight:600;margin-bottom:20px;}
    .formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
    .note{font-weight:600;margin-top:10px;margin-bottom:20px;}
    #submit{background:#605ca8;padding: 6px 30px;}
    #reset{background:#fff;color:#000;padding: 6px 30px;}
  </style>
  <style>
  .label-name{
    text-align:left!important;
    margin-top:-5px;
  }
  .starspan
  {
    color:#e80909;
    font-size:18px;
  }
  .mainheadlinerow
  {
    padding:5px;margin-top:10px;margin-bottom:10px;
  }
  .mainheadline
  {
    background:#3c8dbc;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;
  }
  .mainheadlinefirstrow
  {
    padding:5px;
  }
  .mainheadlinefirst
  {
    background:#3c8dbc;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;
  }
  .othernote{
      font-weight:600;font-size:13px;color:#d20c0c;
  }
  .mainhead{font-weight:600;margin-bottom:20px;}
  .formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
  .note{font-weight:600;margin-top:10px;margin-bottom:20px;}
  
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  </style>
  <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <div class="content-wrapper">
        <section class="content">
          <div class="container bg-3 ">  
            <div class="row text-">
				<?php echo form_open("doctor/pathtest/test_parameter/".$test_id."",'class="form-horizontal formbody"  method="post"');  ?>
				<?=$this->session->flashdata('flashmsg');?>
				<div class="row mainheadlinefirstrow">
					<div class="col-md-12 mainheadlinefirst">Basic Filter</div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
						<label class="control-label col-sm-1 label-name" for="email">Test Parameter Name</label> 
						<div class="col-sm-3">
							<select name="parameter_id" onchange="Addtest_parameter(this.value)" class="form-control input-sm">
								<option value="">Select</option>
								<?php 
								if(is_array($parameter) && !empty($parameter)){
								foreach($parameter as $val){
									?>
								<option value="<?php echo $val['parameter_id']?>"><?php echo $val['parameter_name']?></option>
								<?php }} ?>
							</select>
							<span style="color:red;"><?php echo form_error('parameter_id');?></span>
						</div>
						<label class="control-label col-sm-1 label-name" for="email">Reference Range </label>
						<div class="col-sm-3">
							<input type="text" readonly class="form-control input-sm" id="reference_range" name="reference_range" value="<?php echo $this->input->get_post('reference_range');?>">
							<span style="color:red;"><?php echo form_error('reference_range');?></span>
						</div>
						<label class="control-label col-sm-1 label-name" for="email">Unit </label>
						<div class="col-sm-3">
							<input type="text" readonly class="form-control input-sm" id="unit" name="unit" value="<?php echo $this->input->get_post('unit');?>">
							<span style="color:red;"><?php echo form_error('unit');?></span>
						</div>
						<div class="col-sm-3">
							<input type="submit" class="btn btn-info" id="submit" name="submit" value='Add' />
						</div>
                    </div>
                  </div>
                </div>
				<?php echo form_close();?>
				<div class="table-responsive">
				  <table class="table table-hover table-bordered table-bordered" id='exportTable' style="border:none;">
					<thead>
					  <tr>
						<th class="tableheaddata">Parameter Name</th>
						<th class="tableheaddata">Reference Range</th>
						<th class="tableheaddata">Unit</th>
						<th class="tableheaddata">Delete</th>
					  </tr>
					</thead>
					<tbody id="tviewtablebody">
					  <?php 
					  foreach($data as $p)
					  {	
						echo"<tr>";
						echo"<td>".$p->parameter_name."</td>";
						echo"<td>".$p->reference_range."</td>";
						echo"<td>".$p->unit_name."</td>";
						?>
					   <?php 
						echo "<td><a href=".base_url()."doctor/pathtest/test_parameter_delete?test_parameter_id=".$p->test_parameter_id." style=color:red;><span class='glyphicon glyphicon-trash'></span></a></td>";
						echo"</tr>";
					  }
					  ?>
					</tbody>
					<tfoot>
					  <tr>
						<th class="tableheaddata">Parameter Name</th>
						<th class="tableheaddata">Reference Range</th>
						<th class="tableheaddata">Unit</th>
						<th class="tableheaddata">Delete</th>
					  </tr>
					</tfoot>
				  </table>
				</div>  
				<div class="row">
					<div class="col-md-6">
						
					</div>
					<div class="col-md-6">
						<div class="pagination"><?php echo $page_links; ?></div>
					</div>
				</div>
            </div>
          </div>
        </section>
      </div>
    <div class="control-sidebar-bg"></div>
  </div>
</body>
</html>
<script>
function Addtest_parameter(parameter_id)
{	alert(parameter_id);
	$.ajax({
			type: "post",
			url: "<?php echo base_url();?>doctor/pathtest/get_test_parameter/",
			dataType:'json',
			data: {'parameter_id':parameter_id},
			success:function(res)
			{	
				document.getElementById("reference_range").value = res['reference_range'];
				document.getElementById("unit").value = res['unit_name'];
			}
		});
}	
</script>
<?php $this->load->view('footer');?>
  
