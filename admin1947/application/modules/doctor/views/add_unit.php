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
							<h4 class="mainhead">Unit</h4>
							<form class="form-horizontal formbody" id='mainform' action="<?=base_url()?>doctor/pathtest/addunit"  method="post" enctype="multipart/form-data">
								<!--Basic Details-->
								<div class="row mainheadlinefirstrow">
									<div class="col-md-12 mainheadlinefirst">Basic Details</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										  <label class="control-label col-sm-4 label-name" for="email">First Name<span class="starspan">*</span></label>
										  <div class="col-sm-7">
											<input type="text" class="form-control input-sm" id="unit_name" value="<?php echo set_value('unit_name');?>" name="unit_name" data-validation="required"
											data-validation-error-msg="This Field is required" value="<?=$this->session->userdata('unit_name');?>">
											<span style="color:red;"><?php echo form_error('unit_name');?></span>
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
										  <div class="radio"><label><input type="radio" name="status" value='A' checked>Active</label></div>
										  <div class="radio"><label><input type="radio" name="status" value='I'>Inactive</label></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">        
											<div class="col-sm-9">
												<input type="submit" class="btn btn-info" id="submit" name="submit" value='Add' />
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
