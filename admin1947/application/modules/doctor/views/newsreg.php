<!DOCTYPE html>
<html>
  	<style>
  	.label-name{text-align:left!important;margin-top:-5px;}
  	.starspan{color:#e80909; font-size:18px; }
  	.mainheadlinerow { padding:5px;margin-top:10px;margin-bottom:10px; }
  	.filecss {background: #3077a0;display: table;color: #fff;border-radius: 23px;padding: 5px 23px; cursor:pointer;}
	input[type="file"] {display: none;}

  	.mainheadline{background:#3c8dbc;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;}
  	.mainheadlinefirstrow{ padding:5px; }
  	.mainheadlinefirst{background:#3c8dbc;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;}
  	.othernote{font-weight:600;font-size:13px;color:#d20c0c;}
  	.mainhead{font-weight:600;margin-bottom:20px;}
  	.formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
  	.note{font-weight:600;margin-top:10px;margin-bottom:20px;}
  	#reset{background:#fff;color:#000;padding: 6px 30px;}
  	</style> 
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
  			<div class="content-wrapper">
    			<!-- Content Header (Page header) -->
    			<section class="content-header">  </section>
    			<!-- Main content -->
    			<section class="content">
					<div class="container bg-3 ">  
  						<div class="row text-">
							<div class="container">
								<?=$this->session->flashdata('flashmsg');?>
								<h4 class="mainhead">News Management</h4>
	  							<form class="form-horizontal formbody" id='mainform' action="<?=base_url()?>doctor/newsreg/create" method="post" enctype="multipart/form-data">
									<!--Basic Details-->
									<div class="row mainheadlinefirstrow">
										<div class="col-md-12 mainheadlinefirst">Basic Details</div>
									</div>
									<div class="row">
										
										<div class="col-md-12">
											<div class="form-group">
											  	<label class="control-label col-sm-2 label-name" for="email"> Title<span class="starspan">*</span></label>
											  	<div class="col-sm-7">
													<input type="text" class="form-control input-sm" id="t_fname" name="name" data-validation="required"
													data-validation-error-msg="This Field is required" value="">
											  	</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
											  	<label class="control-label col-sm-2 label-name" for="email"> Detail<span class="starspan">*</span></label>
											  	<div class="col-sm-7">
													<textarea class="form-control input-sm" id="description" name="description" data-validation="required" data-validation-error-msg="This Field is required" ></textarea>
											  	</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
											  	<label class="control-label col-sm-2 label-name" for="email"> Type<span class="starspan">*</span></label>
											  	<div class="col-sm-7">
													<select name="type" class="form-control input-sm" id="type" onchange="mytype()" data-validation="required"
													data-validation-error-msg="This Field is required">
														<option value="">Select</option>
														<option value="1" <?php if(set_value('type')=='1'){ echo "selected";}?>>Image</option>
														<option value="2" <?php if(set_value('type')=='2'){ echo "selected";}?>>Video</option>
													</select>
											  	</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group" id="image" style="display: none;">
											  	<label class="control-label col-sm-2 label-name" for="email">Image<span class="starspan">*</span></label>
											  	<div class="col-sm-7">
											       	<label class="filecss">Choose Photo
														<input type="file" class="form-control input-sm" id="uploadimage" name="uploadimage">
													</label>
											  </div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group" id="video" style="display: none;">
												<label class="control-label col-sm-2 label-name" for="email"> Video<span class="starspan">*</span></label>
												<div class="col-sm-7">
													<input type="text" name="video_url" id="video_url"  placeholder="Youtube Video Url" class="form-control input-sm" value="<?php echo set_value('video_url');?>" maxlength="60" />
												</div>
											</div>
										</div>
									</div>
									<div class="row mainheadlinerow">
										<div class="col-md-12 mainheadline">News Status</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
											  	<div class="radio"><label><input type="radio" name="status" value='1' checked="" >Active</label></div>
											  	<div class="radio"><label><input type="radio" name="status" value='0' >Inactive</label></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
											  	<div class="radio"><label><input type="radio" name="approved" value='1' checked="" >Approved</label></div>
											  	<div class="radio"><label><input type="radio" name="approved" value='0' >Not Approved</label></div>
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
  						</div>
					</div><br>
    			</section>
  			</div>
		   	<?=$this->load->view('inc/footer');?>
		  	<div class="control-sidebar-bg"></div>
		</div>
		
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script> $.validate({  }); </script>
<script>
	function mytype() {
  
  var type = document.getElementById('type').value;		
  if(type==1)
  {
	 document.getElementById("image").style.display = "block";
	 document.getElementById("video").style.display = "none";;
  }
  else if(type==2)
  {
	 
	  document.getElementById("video").style.display = "block";
	  document.getElementById("image").style.display = "none";;
  }
  else
  {
	 document.getElementById("image").style.display = "none";
	 document.getElementById("video").style.display = "none";
  }	 
  
}

</script>
</body>
</html>
