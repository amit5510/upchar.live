<!DOCTYPE html>
<html>

	<style>
	  	.label-name{text-align:left!important;margin-top:-5px;}
	  	.starspan{color:#e80909;font-size:18px;}
	  	.mainheadlinerow{padding:5px;margin-top:10px;margin-bottom:10px;}
	  	.mainheadline {background:#605ca8;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;}
	  	.mainheadlinefirstrow{padding:5px; }
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
    		<section class="content-header"> </section>
    		<!-- Main content -->
    			<section class="content">
		  			<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
					<div class="container bg-3 ">  
  						<div class="row text-">
							<div class="container">
								<?=$this->session->flashdata('flashmsg');?>
								<h4 class="mainhead">Hospital Gallery</h4>
	  							<form class="form-horizontal formbody" id='mainform' action=""  method="post" enctype="multipart/form-data">
									
									<!--Father's Details-->
									<div class="row mainheadlinerow">
										<div class="col-md-12 mainheadline">Basic Details</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											  	<label class="control-label col-sm-3 label-name" for="email">Short Description<span class="starspan">*</span></label>
											  	<div class="col-sm-8">
													<textarea class="form-control input-sm" id="shot_description" name="shot_description" ><?=$gallery->shot_description;?></textarea>
											  	</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
											  	<label class="control-label col-sm-3 label-name" for="email">Long Description<span class="starspan">*</span></label>
											  	<div class="col-sm-8">
													<textarea class="form-control input-sm" id="long_description" name="long_description" ><?=$gallery->long_description;?></textarea>
											  	</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
											  	<label class="control-label col-sm-3 label-name" for="email">Image<span class="starspan">*</span></label>
											  	<div class="col-sm-7">
													<input type="file" class="form-control input-sm" id="uploadimage" name="uploadimage" >
													<div class="container">
														<?php	$product_path = "public/assets/upload/".$gallery->image;
														if($gallery->image !='') { ?>
							  							<a data-toggle="modal" data-target="#myModal<?php echo $gallery->id;?>">View Image</a>
													  	<!-- The Modal -->
													  	<div class="modal" id="myModal<?php echo $gallery->id;?>">
													    	<div class="modal-dialog">
													      		<div class="modal-content">
													        		<!-- Modal Header -->
													        		<div class="modal-header">
													          			<button type="button" class="close" data-dismiss="modal">&times;</button>
													        		</div>
													        		<!-- Modal body -->
													        		<div class="modal-body">
													          			<img src="<?php echo base_url().$product_path;?>" style="width:100%;height:auto;"  />
													        		</div>
													      		</div>
													    	</div>
													  	</div>
													  	<?php }else{echo 'No Image';}?>	
													</div>
											  	</div><br>
											</div>
										</div>		
									</div>
									<!--Trainee Details-->
									
									
									<div class="row mainheadlinerow">
										<div class="col-md-12 mainheadline">Gallery Status</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
											  	<div class="radio"><label><input type="radio" name="status" value='A' <?php if($gallery->status=='A'){ echo "checked";}?>>Active</label></div>
											  	<div class="radio"><label><input type="radio" name="status" value='I' <?php if($gallery->status=='I'){ echo "checked";}?>>Inactive</label></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<p class="othernote"><font color="black">Note:</font> Size of image must be less than 50 KB. Only jpg and png file allowed.</p>
											<div class="form-group">        
												<div class="col-sm-9">
													<input type="submit" class="btn btn-info" id="submit" name="submit" value='Add' />
													<button type="reset" class="btn btn-info" id="reset" name="reset">Reset</button>
												</div>
											</div>
										</div>
									</div>
	  							</form>
							</div>		<br><br><br>
  						</div>
					</div><br>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
  $.validate({
   
  }); 

</script>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?=$this->load->view('inc/footer');?>
   <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


</body>
</html>
