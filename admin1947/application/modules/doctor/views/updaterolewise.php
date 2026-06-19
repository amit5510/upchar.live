<!DOCTYPE html>
<html>
  	<style>
		.label-name{text-align:left!important;margin-top:-5px;}
		.starspan{color:#e80909; font-size:18px; }
		.mainheadlinerow{ padding:5px;margin-top:10px;margin-bottom:10px;}
		.mainheadline{background:#605ca8;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;}
		.mainheadlinefirstrow{ padding:5px;}
		.mainheadlinefirst{background:#605ca8;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;}
		.othernote{font-weight:600;font-size:13px;color:#d20c0c;}
		.mainhead{font-weight:600;margin-bottom:20px;}
		.formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
		.note{font-weight:600;margin-top:10px;margin-bottom:20px;}
		#submit{background:#605ca8;padding: 6px 30px;}
		#reset{background:#fff;color:#000;padding: 6px 30px;}
  	</style>
  
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<div class="content-wrapper">
				<section class="content-header"></section>
				<section class="content">
					<div class="container bg-3 ">  
						<div class="row text-">
							<div class="container">
								<?=$this->session->flashdata('flashmsg');?>
								<h4 class="mainhead">Role Edit</h4>
								<form class="form-horizontal formbody" id='mainform' action=""  method="post" enctype="multipart/form-data">
									<!--Basic Details-->
									<div class="row mainheadlinefirstrow">
										<div class="col-md-12 mainheadlinefirst">Basic Details</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-sm-4 label-name" for="email"> Name<span class="starspan">*</span></label>
												<div class="col-sm-7">
													<input type="text" class="form-control input-sm" id="t_fname" name="name" data-validation="required"
													data-validation-error-msg="This Field is required" value="<?=$rolewise->level_name;?>">
												</div>
											</div>
										</div>
									</div>
									<!--Trainee Bank Details-->
									<div class="row mainheadlinerow">
										<div class="col-md-12 mainheadline">Subscription/ Service Plan</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<div class="radio"><label><input type="radio" name="status" value='1' <?php if($rolewise->isStatus=='1'){ echo "checked";}?>>Active</label></div>
												<div class="radio"><label><input type="radio" name="status" value='2' <?php if($rolewise->isStatus=='2'){ echo "checked";}?>>Inactive</label></div>
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
							</div>	<br>	<br>	<br>
						</div>
					</div><br>
				</section>
				<!-- /.content -->
			</div>
			<?=$this->load->view('inc/footer');?>	
			<div class="control-sidebar-bg"></div>
		</div>
		<!-- ./wrapper -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<script> $.validate({  }); </script>
	</body>
</html>
