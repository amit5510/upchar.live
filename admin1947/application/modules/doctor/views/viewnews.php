<!DOCTYPE html>
<html>

<style>
  	.label-name{text-align:left!important;margin-top:-5px;}
  	.starspan { color:#e80909; font-size:18px;  }
  	.mainheadlinerow{ padding:5px;margin-top:10px;margin-bottom:10px; }
  	.mainheadline{background:#3c8dbc;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600; }
  	.mainheadlinefirstrow{padding:5px;}
  	.mainheadlinefirst{background:#605ca8;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;}
  	.othernote{font-weight:600;font-size:13px;color:#d20c0c;}
  	.mainhead{font-weight:600;margin-bottom:20px;}
  	.formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
  	.note{font-weight:600;margin-top:10px;margin-bottom:20px;}
  	#reset{background:#fff;color:#000;padding: 6px 30px;}
</style>
  
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
  		<div class="content-wrapper">
    		<section class="content-header"> </section>
    		<!-- Main content -->
    		<section class="content">
				<div class="container bg-3 ">  
  					<div class="row text-">
						<div class="container">
							<?=$this->session->flashdata('flashmsg');?>
							<h4 class="mainhead">News Management</h4>
	  						<form class="form-horizontal formbody" id='mainform' action=""  method="post" enctype="multipart/form-data">
								<!--Basic Details-->
								<div class="row mainheadlinefirstrow">
									<div class="col-md-12 mainheadlinefirst">Basic Details</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<?php if($news->hospital_id !='') { ?>
										  	<label class="control-label col-sm-2 label-name" for="email"> Hospital<span class="starspan">*</span></label>
										  	<div class="col-sm-7">
												<input type="text" class="form-control input-sm" id="t_fname" name="name" value="<?= gethospitalName($news->hospital_id);?>" readonly="">
										  	</div>
										  <?php } ?>
										  <?php if($news->doctor_id !='') { ?>
										  	<label class="control-label col-sm-2 label-name" for="email"> Doctor<span class="starspan">*</span></label>
										  	<div class="col-sm-7">
												<input type="text" class="form-control input-sm" id="t_fname" name="name" value="<?=getdoctorName($news->doctor_id);?>" readonly="">
										  	</div>
										  <?php } ?>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
										  	<label class="control-label col-sm-2 label-name" for="email"> Title<span class="starspan">*</span></label>
										  	<div class="col-sm-7">
												<input type="text" class="form-control input-sm" id="t_fname" name="name" value="<?=$news->title;?>" readonly="">
										  	</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
										  	<label class="control-label col-sm-2 label-name" for="email"> Detail<span class="starspan">*</span></label>
										  	<div class="col-sm-7">
												<textarea class="form-control input-sm" id="description" readonly="" name="description" data-validation="" data-validation-error-msg="This Field is required" ><?=$news->description;?></textarea>
										  	</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
										  	<label class="control-label col-sm-2 label-name" for="email"> Type<span class="starspan">*</span></label>
										  	<div class="col-sm-7">
												<select name="type" id="type" onchange="mytype()" class="form-control input-sm" disabled="">
												<option value="">Select</option>
												<option value="1" <?php if(set_value('type',$news->type)=='1'){ echo "selected";}?>>Image</option>
												<option value="2" <?php if(set_value('type',$news->type)=='2'){ echo "selected";}?>>Video</option>	
												</select>
											</div>
										</div>
									</div>
								</div>
								<!--Father's Details-->
								<div class="row mainheadlinerow">
									<div class="col-md-12 mainheadline">Images/Video</div>
								</div>
								<div class="row">
									<?php if($news->image !='') { ?>
									<div class="col-md-4">
										<div class="form-group">
        									<img src="<?=base_url();?>public/assets/upload/<?=($news->image)? $news->image : 'dummydr.jpg';?>" style="border-radius: 50%; width: 150px; height: 150px; margin-left: 60px;">
										</div>
									</div>
									<?php } ?>
									<?php if($news->video_url !='') { ?>
										<div class="col-md-12">
											<div class="col-md-2"></div>
											<div class="col-md-4">
											<div class="form-group">
	        									<iframe width="560" height="315" src="<?php echo $news->video_url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
										</div>
										</div>	
									<?php } ?>
								</div>
								<div class="row mainheadlinerow">
									<div class="col-md-12 mainheadline">News Status</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
										  	<div class="radio"><label><input type="radio" name="status" value='1' <?php if($news->status=='1'){ echo "checked";}?>>Active</label></div>
										  	<div class="radio"><label><input type="radio" name="status" value='0' <?php if($news->status=='0'){ echo "checked";}?>>Inactive</label></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
										  	<div class="radio"><label><input type="radio" name="approved" value='1' <?php if($news->approved=='1'){ echo "checked";}?>>Approved</label></div>
										  	<div class="radio"><label><input type="radio" name="approved" value='0' <?php if($news->approved=='0'){ echo "checked";}?>>Not Approved</label></div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">        
										  	<div class="col-sm-9">
												<a href="<?php echo base_url();?>/doctor/newsreg/newsupdate/<?php echo $this->uri->segment(4);?>" class="btn btn-info" id="submit">Edit</a>
										  	</div>
										</div>
									</div>
								</div>
	  						</form>
						</div>	<br><br><br>
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

</body>
</html>
