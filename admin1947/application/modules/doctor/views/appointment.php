<!DOCTYPE html>
<html>

  	<style>
  
  	.label-name{text-align:left!important;margin-top:-5px;}
  	.starspan{color:#e80909; font-size:18px; }
  	.mainheadlinerow { padding:5px;margin-top:10px;margin-bottom:10px; }
  	.filecss {background: #3077a0;display: table;color: #fff;border-radius: 23px;padding: 5px 23px; cursor:pointer;}
	/*input[type="file"] {display: none;}*/

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
								<h4 class="mainhead">Appointment Management</h4>
	  							<form class="form-horizontal formbody" id='mainform' action="<?=base_url()?>doctor/appointment/create" method="post">
									<!--Basic Details-->
									<div class="row mainheadlinefirstrow">
										<div class="col-md-12 mainheadlinefirst">Basic Details</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
											  	<label class="control-label col-sm-4 label-name" for="email">Patient Name<span class="starspan"></span></label>
											  	<div class="col-sm-7">
													<input type="text" class="form-control" id="appointment_name" name="appointment_name" data-validation="required" data-validation-error-msg="Please fill Name" value="">
											  	</div>
											</div>
											<div class="form-group">
											  	<label class="control-label col-sm-4 label-name" for="email">Mobile No<span class="starspan"></span></label>
											  	<div class="col-sm-7">
													<input type="text" class="form-control" id="appointment_mobile" name="appointment_mobile" data-validation="required"  data-validation-error-msg="Enter 10 digit valid no." onkeypress="return isNumber(event)" value="<?php echo $row->appointment_mobile;?>">
											  	</div>
											</div>
											<div class="form-group">
											  	<label class="control-label col-sm-4 label-name" for="email">Hospital<span class="starspan"></span></label>
											  	<div class="col-sm-7">
				  	<?php	$hospi_list = $this->db->order_by('name','asc')->where('status','1')->get('hospital')->result_array();   	?>
													<select class="form-control" name="institute_id">
														<option>--Select Hospital--</option>
														<?php if(is_array($hospi_list) && !empty($hospi_list)) { 
															foreach($hospi_list as $p) { ?>
														<option value="<?php echo $p['id'];?>"><?php echo $p['name'];?></option>
													<?php } } ?>
													</select>
											  	</div>
											</div>
											<div class="form-group">
												<div class="col-sm-1"></div>
											  	<label class="control-label col-sm-4 label-name" for="email">Image<span class="starspan"></span></label>
											  	<div class="col-sm-7">
													<input type="file" id="uploadimage" class="form-control input-sm"  name="uploadimage" >
											  	</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<div class="col-sm-1"></div>
											  	<label class="control-label col-sm-4 label-name" for="email">Email<span class="starspan"></span></label>
											  	<div class="col-sm-7">
													<input type="text" class="form-control" id="appointment_email" name="appointment_email" data-validation="required" data-validation-error-msg="Please fill Email." value="">
											  	</div>
											</div>
											<div class="form-group">
												<div class="col-sm-1"></div>
											  	<label class="control-label col-sm-4 label-name" for="email">Amount<span class="starspan"></span></label>
											  	<div class="col-sm-7">
													<input type="text" class="form-control" id="amount" name="amount" value="">
											  	</div>
											</div>
											<div class="form-group">
												<div class="col-sm-1"></div>
										  		<label class="control-label col-sm-4 label-name" for="email">Doctor<span class="starspan"></span></label>
											  	<div class="col-sm-7">
				  	<?php	$doc_list = $this->db->order_by('fname','asc')->where('status','1')->get('profile_dr')->result_array();   	?>
				  									<select class="form-control" name="doctor_id">
														<option>--Select Doctor--</option>
														<?php if(is_array($doc_list) && !empty($doc_list)) { 
															foreach($doc_list as $p) { ?>
														<option value="<?php echo $p['id'];?>"><?php echo $p['fname'];?></option>
													<?php } } ?>
													</select>
											  	</div>
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

</body>
</html>
