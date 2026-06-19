<!DOCTYPE html>
<html>

  <style>
  
  .label-name{text-align:left!important;margin-top:-5px;}
  .starspan{color:#e80909;font-size:18px;}
  .mainheadlinerow{padding:5px;margin-top:10px;margin-bottom:10px;}
  .mainheadline{background:#605ca8;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;}
  .mainheadlinefirstrow{ padding:5px; }
  .mainheadlinefirst {background:#605ca8;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600; }
  .othernote{ font-weight:600;font-size:13px;color:#d20c0c; }
  .mainhead{font-weight:600;margin-bottom:20px;}
  .formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
  .note{font-weight:600;margin-top:10px;margin-bottom:20px;}
  #submit{background:#605ca8;padding: 6px 30px;}
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
							<h4 class="mainhead">Hospital Gallery</h2>
	  						<form class="form-horizontal formbody" action="" method="post" enctype="multipart/form-data">
								<!--Basic Details-->
								<div class="row mainheadlinefirstrow">
									<div class="col-md-12 mainheadlinefirst">Basic Details</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										  	<label class="control-label col-sm-2 label-name" for="email">Short Description<span class="starspan"></span></label>
										  	<div class="col-sm-9">
												<textarea class="form-control input-sm" id="shot_description" name="shot_description" data-validation=""
												data-validation-error-msg="This Field is required"  readonly><?=$hosp_gallery->shot_description;?></textarea>
										  	</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
										  	<label class="control-label col-sm-2 label-name" for="email">Long Description<span class="starspan"></span></label>
										  	<div class="col-sm-9">
												<textarea class="form-control input-sm" id="long_description" name="long_description" data-validation=""
												data-validation-error-msg="This Field is required"  readonly><?=$hosp_gallery->long_description;?></textarea>
										  	</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label col-sm-2 label-name" for="email">Image<span class="starspan"></span></label>
						        			<img src="<?=base_url();?>public/assets/upload/<?=($hosp_gallery->image)? $hosp_gallery->image : 'dummydr.jpg';?>" style="border-radius: 50%; width: 150px; height: 150px; margin-left:104px;">
										</div>
									</div>
								</div>
								
								<div class="row mainheadlinerow">
									<div class="col-md-12 mainheadline">Gallery Status</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
										  	<div class="radio"><label><input type="radio" name="status" value='A' <?php if($hosp_gallery->status=='A'){ echo "checked";}?>>Active</label></div>
										  	<div class="radio"><label><input type="radio" name="status" value='I' <?php if($hosp_gallery->status=='I'){ echo "checked";}?>>Inactive</label></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<br><br>
										<div class="form-group">        
											<div class="col-sm-9">
												<button type="submit" class="btn btn-info" id="submit" name="submit">Add</button>
												<button type="reset" class="btn btn-info" id="reset" name="reset">Reset</button>
											</div>
										</div>
									</div>
								</div>
	  						</form>
						</div> <br><br>	<br>
  					</div>
				</div><br>
    		</section>
    		<!-- /.content -->
  		</div>
   		<?=$this->load->view('inc/footer');?>
  		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->
</body>
</html>
