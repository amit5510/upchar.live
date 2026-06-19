<!DOCTYPE html>
<html>
	<style>
  	.label-name{text-align:left!important; margin-top:-5px; }
  	.starspan{ color:#e80909; font-size:18px; }
  	.mainheadlinerow{ padding:5px;margin-top:10px;margin-bottom:10px; }
  	.mainheadline{background:#605ca8;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;}
  	.mainheadlinefirstrow{ padding:5px; }
  	.mainheadlinefirst{background:#605ca8;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;}
  	.othernote{ font-weight:600;font-size:13px;color:#d20c0c;}
  	.mainhead{font-weight:600;margin-bottom:20px;}
  	.formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
  	.note{font-weight:600;margin-top:10px;margin-bottom:20px;}
  	#submit{background:#605ca8;padding: 6px 30px;}
  	#reset{background:#fff;color:#000;padding: 6px 30px;}
	</style>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
  			<div class="content-wrapper">
    			<section class="content-header">   </section>
    			<section class="content">
					<div class="container bg-3 ">  
	  					<div class="row text-">
							<div class="container">
								<?=$this->session->flashdata('flashmsg');?>
								<h4 class="mainhead">News Management</h4>
		  						<form class="form-horizontal formbody" id='mainform' action=""  method="post" enctype="multipart/form-data">
									<div class="row mainheadlinefirstrow">
										<div class="col-md-12 mainheadlinefirst">Basic Details</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											  <label class="control-label col-sm-2 label-name" for="email"> Title<span class="starspan">*</span></label>
											  <div class="col-sm-7">
												<input type="text" class="form-control input-sm" id="t_fname" name="name" data-validation="required"
												data-validation-error-msg="This Field is required" value="<?=$news->title;?>">
											  </div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
											  	<label class="control-label col-sm-2 label-name" for="email"> Detail<span class="starspan">*</span></label>
											  	<div class="col-sm-7">
													<textarea class="form-control input-sm" id="description" name="description" data-validation="required"  data-validation-error-msg="This Field is required" ><?=$news->description;?></textarea>
											  	</div>
											</div>
										</div>
										<?php if($news->hospital_id !='') { ?>
										<div class="col-md-12">
											<div class="form-group">
											  <label class="control-label col-sm-2 label-name" for="email"> Hospital<span class="starspan">*</span></label>
											  <div class="col-sm-7">
												<input type="text" readonly="readonly" class="form-control input-sm" id="t_fname" name="hospital_id" data-validation="required"
												data-validation-error-msg="This Field is required" value="<?=$news->name;?>">
											  </div>
											</div>
										</div>
										<?php } ?>
										<?php if($news->doctor_id !='') { ?>
										<div class="col-md-12">
											<div class="form-group">
											  <label class="control-label col-sm-2 label-name" for="email"> Doctor<span class="starspan">*</span></label>
											  <div class="col-sm-7">
												<input type="text" readonly="readonly" class="form-control input-sm" id="t_fname" name="doctor_id" data-validation="required"
												data-validation-error-msg="This Field is required" value="<?=$news->fname;?>">
											  </div>
											</div>
										</div>
										<?php } ?>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label col-sm-2 label-name" for="email"> Type<span class="starspan">*</span></label>
												<div class="col-sm-7">
													<select name="type" id="type" onchange="mytype()" class="form-control input-sm">
													<option value="">Select</option>
													<option value="1" <?php if(set_value('type',$news->type)=='1'){ echo "selected";}?>>Image</option>
													<option value="2" <?php if(set_value('type',$news->type)=='2'){ echo "selected";}?>>Video</option>	
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group" id="image" <?php if($news->type!='1'){ ?> style="display: none;" <?php } ?>>
												<label class="control-label col-sm-2 label-name" for="email"> Image<span class="starspan">*</span></label>
												<div class="col-sm-7">
													<input type="file" name="uploadimage" id="uploadimage" class="form-control"  />
													<div class="container">
														<?php	$product_path = "public/assets/upload/".$news->image;
														if($news->image !='') { ?>
							  							<a data-toggle="modal" data-target="#myModal<?php echo $news->id;?>">View Image</a>
													  	<!-- The Modal -->
													  	<div class="modal" id="myModal<?php echo $news->id;?>">
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
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group" id="video" <?php if($news->type!='2'){ ?> style="display: none;" <?php } ?>>
												<label class="control-label col-sm-2 label-name" for="email"> Video<span class="starspan">*</span></label>
												<div class="col-sm-7">
													<input type="text" name="video_url" id="video_url"  placeholder="Video Url" class="form-control input-sm" value="<?php echo set_value('video_url',$news->video_url);?>" maxlength="100" />
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
													<input type="submit" class="btn btn-info" id="submit" name="submit" value='Update' />
													<button type="reset" class="btn btn-info" id="reset" name="reset">Reset</button>
											  	</div>
											</div>
										</div>
									</div>
								</form>
							</div><br><br><br>
	  					</div>
					</div><br>
				</section>
  			</div>
  			<div class="control-sidebar-bg"></div>
		</div>
	</body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>  $.validate({  }); </script>
<?=$this->load->view('inc/footer');?>	
<script>
	function mytype() 
	{
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

