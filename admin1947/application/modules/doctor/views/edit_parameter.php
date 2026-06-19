<!DOCTYPE html>
<html>
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
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<!--there was sidebar -->
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header"></section>
			<!-- Main content -->
			<section class="content">
				<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
				<link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
				<div class="container bg-3 ">  
					<div class="row text-">
						<div class="container">
							<?=$this->session->flashdata('flashmsg');?>
							<h4 class="mainhead">Parameter</h4>
							<form class="form-horizontal formbody" id='mainform' action="<?=base_url()?>doctor/pathtest/editparameter/<?php echo $res->parameter_id; ?>"  method="post" enctype="multipart/form-data">
								<!--Basic Details-->
								<div class="row mainheadlinefirstrow">
									<div class="col-md-12 mainheadlinefirst">Basic Details</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Unit <span class="starspan">*</span></label>
											<div class="col-sm-8">
												<select name="unit_id" class="form-control input-sm" id="unit_id">
													<option value="">Select</option>
													<?php if(is_array($unit) && !empty($unit)){
														foreach($unit as $val){?>
													<option value="<?php echo $val['unit_id']?>" <?php if(set_value('unit_id',$res->unit_id)==$val['unit_id']){ echo "selected";}?>><?php echo $val['unit_name']?></option>
													<?php }} ?>
												</select>
												<span style="color:red;"><?php echo form_error('unit_id');?></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										  <label class="control-label col-sm-4 label-name" for="email">Name<span class="starspan">*</span></label>
										  <div class="col-sm-8">
											<input type="text" class="form-control input-sm" id="parameter_name" value="<?php echo set_value('parameter_name',$res->parameter_name);?>" name="parameter_name" >
											<span style="color:red;"><?php echo form_error('parameter_name');?></span>
										  </div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Reference Range <span class="starspan"></span></label>
											<div class="col-sm-8">
												<input type="text" class="form-control input-sm" id="reference_range" value="<?php echo set_value('reference_range',$res->reference_range);?>" name="reference_range" data-validation="required"
												data-validation-error-msg="This Field is required" value="<?=set_value('reference_range');?>">
												<span style="color:red;"><?php echo form_error('reference_range');?></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Description <span class="starspan"></span></label>
											<div class="col-sm-8">
												<input type="text" class="form-control input-sm" id="description" value="<?php echo set_value('description',$res->description);?>" name="description" data-validation="required"
												data-validation-error-msg="This Field is required" value="<?=set_value('description');?>">
												<span style="color:red;"><?php echo form_error('description');?></span>
											</div>
										</div>
									</div>
								</div>
								<!--Trainee Bank Details-->
								<div class="row mainheadlinerow">
									<div class="col-md-12 mainheadline">Status</div>
								</div>
								<div class="row">
									
									<div class="col-md-8">
										<div class="form-group">
										  <div class="radio"><label><input type="radio" name="status" value='1' checked>Active</label></div>
										  <div class="radio"><label><input type="radio" name="status" value='0'>Inactive</label></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">        
											  <div class="col-sm-9">
												<input type="submit" class="btn btn-info" id="submit" name="submit" value='Update' />
												<button type="reset" class="btn btn-info" id="reset" name="reset">Reset</button>
											  </div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<br>
						<br>
						<br>
					</div>
				</div><br>

	 
    </section>
    <!-- /.content -->
  </div>
  
  
  <!-- /.content-wrapper -->
   <?=$this->load->view('inc/footer');?>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


</body>
</html>
