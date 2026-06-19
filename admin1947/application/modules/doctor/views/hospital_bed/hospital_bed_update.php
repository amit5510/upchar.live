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
    			<section class="content-header">
					<h1>
						<?php echo $module;?>
						<small>Control panel</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>masters/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
						<li><a href="<?php echo base_url();?>doctor/package"> Back To List</a></li>
						<li class="active"><?php echo $heading_title;?></li>
					</ol>
				</section>
    			<section class="content">
					<div class="container bg-3 ">  
	  					<div class="row text-">
							<div class="container">
								<?=$this->session->flashdata('flashmsg');?>
								<h4 class="mainhead"><?php ?></h4>
		  						<form class="form-horizontal formbody" id='mainform' action=""  method="post" enctype="multipart/form-data">
									<div class="row mainheadlinefirstrow">
										<div class="col-md-12 mainheadlinefirst">Basic Details</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											  	<label class="control-label col-sm-2 label-name" for="email"> Hospital<span class="starspan">*</span></label>
											  	<div class="col-sm-7">
													<select name="hospital_id" class="form-control input-sm" data-validation="required">
														<option value=""> Select </option>
														<?php 
														if(is_array($hospital) && !empty($hospital)){
														foreach($hospital as $val){ ?>
														<option value="<?php echo $val['id'];?>" <?php if($val['id']==set_value('hospital_id',$row['hospital_id'])){ echo "selected";}?>> <?php echo $val['name'];?></option>	
														<?php }} ?>
													</select>
													<span style="color:red;"><?php echo form_error('hospital_id');?></span>
											  	</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
											  	<label class="control-label col-sm-2 label-name" for="email"> Bed Type<span class="starspan">*</span></label>
											  	<div class="col-sm-7">
													<input type="text" class="form-control input-sm" id="bed_type" name="bed_type" data-validation="required" data-validation-error-msg="This Field is required" value="<?php echo set_value('bed_type',$row['bed_type']);?>">
													<span style="color:red;"><?php echo form_error('bed_type');?></span>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group" >
												<label class="control-label col-sm-2 label-name" for="email"> Total Bed<span class="starspan">*</span></label>
												<div class="col-sm-7">
													<input type="text" name="total_bed" id="total_bed"   class="form-control input-sm" value="<?php echo set_value('total_bed',$row['total_bed']);?>" maxlength="60" data-validation="required" data-validation-error-msg="This Field is required" />
													<span style="color:red;"><?php echo form_error('total_bed');?></span>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group" >
												<label class="control-label col-sm-2 label-name" for="email"> Occupied Bed<span class="starspan">*</span></label>
												<div class="col-sm-7">
													<input type="text" name="occupied_bed" id="occupied_bed"   class="form-control input-sm" value="<?php echo set_value('occupied_bed',$row['occupied_bed']);?>" maxlength="60" data-validation="required" data-validation-error-msg="This Field is required" />
													<span style="color:red;"><?php echo form_error('occupied_bed');?></span>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
											  	<label class="control-label col-sm-2 label-name" for="email"> Comment<span class="starspan">*</span></label>
											  	<div class="col-sm-7">
													<textarea class="form-control input-sm" id="comment" name="comment" data-validation="required" data-validation-error-msg="This Field is required" ><?php echo set_value('comment',$row['comment']);?></textarea>
													<span style="color:red;"><?php echo form_error('comment');?></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row mainheadlinerow">
										<div class="col-md-12 mainheadline">Premium Status</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
											  	<div class="radio"><label><input type="radio" name="status" value='1' <?php if($row['status']=='1'){ echo "checked";}?>>Active</label></div>
											  	<div class="radio"><label><input type="radio" name="status" value='0' <?php if($row['status']=='0'){ echo "checked";}?>>Inactive</label></div>
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