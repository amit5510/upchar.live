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
  background:#605ca8;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;
}
.mainheadlinefirstrow
{
  padding:5px;
}
.mainheadlinefirst
{
  background:#605ca8;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;
}
.othernote{
  font-weight:600;font-size:13px;color:#d20c0c;
}
.mainhead{font-weight:600;margin-bottom:20px;}
.formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
.note{font-weight:600;margin-top:10px;margin-bottom:20px;}
#submit{background:#605ca8;padding: 6px 30px;}
#reset{background:#fff;color:#000;padding: 6px 30px;}
</style>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<!--there was sidebar -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<?php echo $module;?>
					<small>Control panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url();?>masters/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
					<li><a href="<?php echo base_url();?>doctor/clinicreg/viewclinic"> Back To List</a></li>
					<li class="active"><?php echo $heading_title;?></li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
				<link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
				<div class="container bg-3 ">  
					<div class="row text-">
						<div class="container">
							<?=$this->session->flashdata('flashmsg');?>
							<?php //echo validation_errors();?>
							<?php //echo error_message(); ?>  
							<form class="form-horizontal formbody" action="<?=base_url()?>doctor/clinicreg/add" method="post" enctype="multipart/form-data">
								<!--Basic Details-->
								<div class="row mainheadlinefirstrow">
									<div class="col-md-12 mainheadlinefirst">Basic Details</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label col-sm-2 label-name" for="email">Type<span class="starspan">*</span></label>
											<div class="col-sm-4">
												<select name="objective" id="objective" class="form-control" data-validation="required"
												data-validation-error-msg="This Field is required">
													<option value="">Select</option>
													<option value="H" <?php if(set_value('objective')=='H'){ echo "selected"; } ?> >Hospital</option>
													<option value="C" <?php if(set_value('objective')=='C'){ echo "selected"; } ?>>Clinic</option>
												</select>
												<span style="color:red;"><?php echo form_error('objective');?></span>
											</div>
											<label class="control-label col-sm-2 label-name" for="email">Hospital Type<span class="starspan">*</span></label>
											<div class="col-sm-4">
												<select name="type" id="type" class="form-control" data-validation="required"
												data-validation-error-msg="This Field is required">
													<option value="">Select</option>
													<option value="1" <?php if(set_value('type')=='1'){ echo "selected"; } ?>>Private Hospital</option>
													<option value="2" <?php if(set_value('type')=='2'){ echo "selected"; } ?>>Government Hospital</option>
												</select>
												<span style="color:red;"><?php echo form_error('type');?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-2 label-name" for="email"> Name<span class="starspan">*</span></label>
											<div class="col-sm-4">
												<input type="text" class="form-control input-sm" id="name" name="name" data-validation="required"
												data-validation-error-msg="This Field is required" value="<?=set_value('name');?>">
												<span style="color:red;"><?php echo form_error('name');?></span>
											</div>
											<label class="control-label col-sm-2 label-name" for="email">Website<span class="starspan"></span></label>
											<div class="col-sm-4">
												<input type="text" class="form-control input-sm" id="website" name="website" value="<?=set_value('website');?>">
												<span style="color:red;"><?php echo form_error('website');?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-2 label-name" for="email">City<span class="starspan">*</span></label>
											<div class="col-sm-4">
												<select class="form-control input-sm" id="city" data-validation="required"
												data-validation-error-msg="This Field is required" name="city">
													<option value="">Select</option>
													<?php
													$citylist=$this->db->get_where('master_city',array('status'=>'1'));
													foreach(@$citylist->result() as $list){
													?>
													<option value="<?=$list->id;?>" <?php if(set_value('city')==$list->id){ echo "selected"; }?> ><?=$list->name;?></option>
													<?php } ?>
												</select>
												<span style="color:red;"><?php echo form_error('city');?></span>
											</div>
											<label class="control-label col-sm-2 label-name" for="email">Location<span class="starspan"></span></label>
											<div class="col-sm-4">
												<input type="text" class="form-control input-sm" id="location" name="location" value="<?=set_value('location');?>">
												<span style="color:red;"><?php echo form_error('location');?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-2 label-name" for="email">Address<span class="starspan"></span></label>
											<div class="col-sm-4">
												<input type="text" class="form-control input-sm" id="address" name="address" value="<?=set_value('address');?>">
												<span style="color:red;"><?php echo form_error('address');?></span>
											</div>
											<label class="control-label col-sm-2 label-name" for="email">Email<span class="starspan">*</span></label>
											<div class="col-sm-4">
												<input type="email" class="form-control input-sm" id="email" name="email" data-validation="required" value="<?=set_value('email');?>">
												<span style="color:red;"><?php echo form_error('email');?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-2 label-name" for="email">Mobile No.<span class="starspan">*</span></label>
											<div class="col-sm-4">
												<input type="text" class="form-control input-sm" id="mobile" name="mobile" data-validation="required,number" data-validation-allowing="range[0000000000;9999999999]" data-validation-error-msg="Enter 10 digit valid no." onkeypress="return isNumber(event)" value="<?=set_value('mobile');?>">
												<span style="color:red;"><?php echo form_error('mobile');?></span>
											</div>
											<label class="control-label col-sm-2 label-name" for="email">Password<span class="starspan">*</span></label>
											<div class="col-sm-4">
												<input type="password" class="form-control input-sm" id="password" name="password" data-validation="required"   value="<?=set_value('password');?>">
												<span style="color:red;"><?php echo form_error('password');?></span>
											</div>
										</div>
										<!--Father's Details-->
										<div class="row mainheadlinerow">
											<div class="col-md-12 mainheadline">Upload About , Images & Other</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-2 label-name" for="email">About<span class="starspan"></span></label>
											<div class="col-sm-4">
												<textarea class="form-control input-sm" id="about" name="about" data-validation=""
												data-validation-error-msg="This Field is required" ><?=set_value('about');?></textarea>
												<span style="color:red;"><?php echo form_error('about');?></span>
											</div>
											<label class="control-label col-sm-2 label-name" for="email">Tags<span class="starspan"></span></label>
											<div class="col-sm-4">
												<input type="text" class="form-control input-sm" id="tags" name="tags" value="<?=set_value('tags');?>">
												<span style="color:red;"><?php echo form_error('tags');?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-2 label-name" for="email">Passport size Image<span class="starspan">*</span></label>
											<div class="col-sm-4">
												<input type="file" class="form-control input-sm" id="uploadimage" name="uploadimage" data-validation="required"
												data-validation-error-msg="This Field is required">
												<p class="othernote">Image should be jpg or png, less than  1MB.</p>
											</div>
											<label class="control-label col-sm-2 label-name" for="email">ID Proof<span class="starspan"></span></label>
											<div class="col-sm-4">
												<input type="file" class="form-control input-sm" id="idproof" name="idproof" data-validation=""
												data-validation-error-msg="This Field is required">
												<p class="othernote">Image should be jpg or png, less than  1MB.</p>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-2 label-name" for="email">Medi. Reg. Proof<span class="starspan"></span></label>
											<div class="col-sm-4">
												<input type="file" class="form-control input-sm" id="regpoof" name="regproof" data-validation=""
												data-validation-error-msg="This Field is required">
												<p class="othernote">Image should be jpg or png, less than 1MB.</p>
											</div>
											<label class="control-label col-sm-2 label-name" for="email">Services<span class="starspan">*</span></label>
											<div class="col-sm-4">
												<select class="form-control input-sm  show-menu-arrow " id="services[]" data-validation="required"
												data-validation-error-msg="This Field is required" name="services"   data-actions-box="true"  readonly >
												<?php
													$servicelist=$this->db->get_where('master_services',array('status'=>1))->result();
													if(is_array($servicelist) && !empty($servicelist)){
													foreach($servicelist as $list){
													?>
													<option value="<?=$list->id;?>" <?php if(set_value('services')==$list->id){ echo "selected"; } ?> ><?=$list->name;?></option>
													<?php }} ?>
												</select>
											</div>
										</div>
										<!--Pre-Training Details-->
										<div class="row mainheadlinerow">
											<div class="col-md-12 mainheadline">Timing Details </div>
										</div>
										<div class="practicewrapper">
											<div class="row" style="margin-top:5px;">
												<input type='hidden' id='hiddenday_0' name='hiddenday[0]' value='1'>
												<div class="timmingwrapper">
													<div class="col-md-8">
														<div class="form-group">
														  <label class="control-label col-sm-4 label-name" for="email">Select Day<span class="starspan wg"></span></label>
														  <div class="col-sm-8" id="cadd">
															<label class="checkbox-inline"><input type="checkbox" name='sun[0][0]' value="S">Sun</label>
															<label class="checkbox-inline"><input type="checkbox" name='mon[0][0]' value="M">Mon</label>
															<label class="checkbox-inline"><input type="checkbox" name='tue[0][0]' value="T">Tue</label>
															<label class="checkbox-inline"><input type="checkbox" name='wed[0][0]' value="W">Wed</label>
															<label class="checkbox-inline"><input type="checkbox" name='thu[0][0]' value="TH">Thus</label>
															<label class="checkbox-inline"><input type="checkbox" name='fri[0][0]' value="F">Fri</label>
															<label class="checkbox-inline"><input type="checkbox" name='sat[0][0]' value="SA">Sat</label>
														  </div>
														</div>
													</div>
													<br>
													<br>
													<div class='sessionwrapper'>
														<div class="col-md-5">
															<div class="form-group">
															  <label class="control-label col-sm-4 label-name" for="email">From<span class="starspan wg"></span></label>
															  <div class="col-sm-7" id="ccont">
																<input type="time" class="form-control input-sm timepicker" id="fromtime[0][0][]" name="fromtime[0][0][]"  value="">
															  </div>
															</div>
														</div>
														<div class="col-md-5">
															<div class="form-group">
															  <label class="control-label col-sm-4 label-name" for="email">To<span class="starspan wg"></span></label>
															  <div class="col-sm-7" id="cema">
																<input type="time" class="form-control input-sm timepicker" id="totime[0][0][]" name="totime[0][0][]" value="">
															  </div>
															</div>
														</div>
													</div>
													<button type="button" class="btn btn-info btn-xs addsession" name="" data-clinicblock-id='0' data-dayblock-id='0'>Add More Session</button>
												</div>
												<button type="button" class="btn btn-info btn-xs addtiming" name=""  data-clinicblock-id='0'   data-dayblock-id='0' >Add Timing For Remaining Day</button>
											</div>
										</div>
										<!--Trainee Bank Details-->
										<div class="row mainheadlinerow">
											<div class="col-md-12 mainheadline">Subscription/ Service Plan</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
												  <div class="radio"><label><input type="radio" name="package" value='0' checked>Basic (Free)</label></div>
												  <div class="radio"><label><input type="radio" name="package" value='1'>Premium (Paid)</label></div>
												</div>
											</div>
											<br>
											<div class="col-md-12">
												<div class="form-group">
												  <div class="radio"><label><input type="radio" name="status" value='1' checked>Active</label></div>
												  <div class="radio"><label><input type="radio" name="status" value='0'>Inactive</label></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<!--<p class="note">Note: Size of image must be less than 50 KB. Only jpg and png file allowed.</p>-->
												<br><br>
												<div class="form-group">        
													<div class="col-sm-9">
														<button type="submit" class="btn btn-info" id="submit" name="submit">Add</button>
														<button type="reset" class="btn btn-info" id="reset" name="reset">Reset</button>
													</div>
												</div>
											</div>
										</div>
									</div>	
								</div>		
							</form>
						</div>
						<br>
					</div>
				</div>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
  $.validate({
   
  });
</script>
<script>
 function bplcardyes(checkboxElem) {
  if (checkboxElem.checked) {
    $("#bplcodediv").html(' <input type="text" class="form-control input-sm" id="bplcode" name="bplcode" data-validation="required" data-validation-error-msg="This Field is required">');
  } 
 }

 function bplcardno(checkboxElem) {
  if (checkboxElem.checked) {
    $("#bplcodediv").html('');
  } 
 }
 
</script>
<script src="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/zebra_datepicker.min.js"></script>
<script>
		function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<script>
		$(document).ready(function(){
			$(document).on('click','.addsession',function(){
				var dblockid = $(this).attr('data-dayblock-id');
				var cblockid = $(this).attr('data-clinicblock-id');
					var code ='<br><div class="col-md-5">' +
				'	<div class="form-group">' +
				'	  <label class="control-label col-sm-4 label-name" for="email">From<span class="starspan wg"></span></label>' +
				'	  <div class="col-sm-7" id="ccont">' +
				'		<input type="time" class="form-control input-sm timepicker" id="" name="fromtime['+cblockid+']['+dblockid+'][]" value="">' +
				'	  </div>' +
				'	</div>' +
				'</div>' +
				'<div class="col-md-5">' +
				'	<div class="form-group">' +
				'	  <label class="control-label col-sm-4 label-name" for="email">To<span class="starspan wg"></span></label>' +
				'	  <div class="col-sm-7" id="cema">' +
				'		<input type="time" class="form-control input-sm timepicker" id="" name="totime['+cblockid+']['+dblockid+'][]" value="">' +
				'	  </div>' +
				'	</div>' +
				'</div>';
				$(this).parent().find(".sessionwrapper:eq( "+dblockid+" )").append(code);
			});
			
			$(document).on('click','.addtiming',function(){
				var dblockid = $(this).attr('data-dayblock-id');
				dblockid=  parseInt(dblockid)+1;
				$(this).attr('data-dayblock-id',dblockid);
				var cblockid = $(this).attr('data-clinicblock-id');
				
				var hiddendayseq = parseInt($('#hiddenday_'+cblockid).val());
				$('#hiddenday_'+cblockid).val( parseInt($('#hiddenday_'+cblockid).val()) +1 );
				
				var code = '<br><hr  style="width:60%;border-top-color:black;"><br><div class="col-md-8">' +
					'<div class="form-group">' +
					 ' <label class="control-label col-sm-4 label-name" for="email">Select Day<span class="starspan wg"></span></label>' +
					  '<div class="col-sm-7" id="cadd">' +
						'<label class="checkbox-inline"><input type="checkbox" name="sun['+cblockid+']['+hiddendayseq+']" value="S">Sun</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="mon['+cblockid+']['+hiddendayseq+']" value="M">Mon</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="tue['+cblockid+']['+hiddendayseq+']" value="T">Tue</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="wed['+cblockid+']['+hiddendayseq+']" value="W">Wed</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="thu['+cblockid+']['+hiddendayseq+']" value="TH">Thus</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="fri['+cblockid+']['+hiddendayseq+']" value="F">Fri</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="sat['+cblockid+']['+hiddendayseq+']" value="SA">Sat</label>' +
						
					  '</div>' +
					'</div>' +
				'</div>' +
				
				'<br>' +
				'<br>' +
				'<div class="sessionwrapper">' +
				'	<div class="col-md-4">' +
				'		<div class="form-group">' +
				'		  <label class="control-label col-sm-4 label-name" for="email">From<span class="starspan wg"></span></label>' +
				'		  <div class="col-sm-7" id="ccont">' +
				'			<input type="time" class="form-control input-sm timepicker" id="" name="fromtime['+cblockid+']['+dblockid+'][]"  value="">' +
				'		  </div>' +
				'		</div>' +
				'	</div>' +
				'	<div class="col-md-4">' +
				'		<div class="form-group">' +
				'		  <label class="control-label col-sm-4 label-name" for="email">To<span class="starspan wg"></span></label>' +
				'		  <div class="col-sm-7" id="cema">' +
				'			<input type="time" class="form-control input-sm timepicker" id="" name="totime['+cblockid+']['+dblockid+'][]" value="">' +
				'		  </div>' +
				'		</div>' +
				'	</div>' +
				'</div>' +
				
				'<button type="button" class="btn btn-info btn-xs addsession" name="" data-clinicblock-id="'+cblockid+'" data-dayblock-id="'+dblockid+'">Add More Session</button>';
				
				
				$(this).parent().find(".timmingwrapper").append(code);
			});
			
			$("#addclinic").click(function(){
				
				
				var cblockid = $(this).attr('data-clinicblock-id');
				cblockid=  parseInt(cblockid)+1;
				$(this).attr('data-clinicblock-id',cblockid);
				var dblockid = $(this).attr('data-dayblock-id');
				var code = '<br><hr style="border-top-color:blue;"><br>'+
		'<div class="row" style="margin-top:5px;">'+
		'<div class="col-md-12">'+
			'	<div class="form-group">'+
			'	  <label class="control-label col-sm-2 label-name" for="email">Type<span class="starspan">*</span></label>'+
			'	  <div class="col-sm-7">'+
			'		 <label class="radio-inline"> <input type="radio" class="objective" data-objectiveid="'+cblockid+'"  id="objectiveself" name="objective['+cblockid+']" value="H" >Hospital</label>'+
			'		 <label class="radio-inline"> <input type="radio" class="objective" data-objectiveid="'+cblockid+'"  id="objectivewage" name="objective['+cblockid+']" value="C">Clinic</label>'+
			'	  </div>'+
			'	</div>'+
			'</div>'+
			'<br><br>'+
			'<div class="col-md-4">'+
			'	<div class="form-group">'+
			'	  <label class="control-label col-sm-4 label-name" for="email" style="white-space: nowrap;">Clinic/Hospital<span class="starspan wg"></span></label>'+
			'	  <div class="col-sm-7" id="cemp">'+
			'		<select class="form-control input-sm" id="clinic" name="clinic['+cblockid+']" >'+
			'		</select>'+
			'	  </div>'+
			'	</div>'+
			'</div>'+
			'<div class="col-md-4">'+
			'	<div class="form-group">'+
			'	  <label class="control-label col-sm-4 label-name" for="email">Fee<span class="starspan wg"></span></label>'+
			'	  <div class="col-sm-7" id="cadd">'+
			'		<input type="text" class="form-control input-sm" id="fee" name="fee[]" value="">'+
			'	  </div>'+
			'	</div>'+
			'</div>'+
			'<br>			<br>'+
			'<div class="timmingwrapper">'+
				'<div class="col-md-8">' +
					'<div class="form-group">' +
					 ' <label class="control-label col-sm-4 label-name" for="email">Select Day<span class="starspan wg"></span></label>' +
					  '<div class="col-sm-7" id="cadd">' +
						'<label class="checkbox-inline"><input type="checkbox" name="sun['+cblockid+'][]" value="S">Sun</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="mon['+cblockid+'][]" value="M">Mon</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="tue['+cblockid+'][]" value="T">Tue</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="wed['+cblockid+'][]" value="W">Wed</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="thu['+cblockid+'][]" value="TH">Thus</label>'+
						'<label class="checkbox-inline"><input type="checkbox" name="fri['+cblockid+'][]" value="F">Fri</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="sat['+cblockid+'][]" value="SA">Sat</label>' +
					  '</div>' +
					'</div>' +
				'</div>' +
				'<br>' +
				'<br>' +
				'<div class="sessionwrapper">' +
				'	<div class="col-md-4">' +
				'		<div class="form-group">' +
				'		  <label class="control-label col-sm-4 label-name" for="email">From<span class="starspan wg"></span></label>' +
				'		  <div class="col-sm-7" id="ccont">' +
				'			<input type="time" class="form-control input-sm timepicker" id="" name="fromtime['+cblockid+']['+dblockid+'][]"  value="">' +
				'		  </div>' +
				'		</div>' +
				'	</div>' +
				'	<div class="col-md-4">' +
				'		<div class="form-group">' +
				'		  <label class="control-label col-sm-4 label-name" for="email">To<span class="starspan wg"></span></label>' +
				'		  <div class="col-sm-7" id="cema">' +
				'			<input type="time" class="form-control input-sm timepicker" id="" name="totime['+cblockid+']['+dblockid+'][]" value="">' +
				'		  </div>' +
				'		</div>' +
				'	</div>' +
				'</div>' +
				'<button type="button" class="btn btn-info btn-xs addsession" name="" data-clinicblock-id="'+cblockid+'" data-dayblock-id="'+dblockid+'">Add More Session</button>'+
				'</div>'+
				'<button type="button" class="btn btn-info btn-xs addtiming" name=""  data-clinicblock-id="'+cblockid+'"   data-dayblock-id="'+dblockid+'" >Add Timing For Remaining Day</button>'+
				'</div>';
				
				
				
				$(".practicewrapper").append(code);
			});
				
				
				
			$(document).on('change','.objective',function(){
				var oid = $(this).attr('data-objectiveid');
				var type= $("input[name='objective["+oid+"]']:checked").val();
				var uri='<?=base_url();?>doctor/doctorreg/getobjectivelist';
				$.ajax({
				 type:"post", 
				 url: uri,
				 //dataType: 'json',
				 data:{type:type},
				 success: function(result){

					
					$("select[name='clinic["+oid+"]']").html(result);
				 }
				});
			});
		});
		
		$('.timepicker').Zebra_DatePicker({

    format: 'H:i'
});

/*  $("body").on("click", ".timepicker", function(){
        if (!$(this).hasClass("hasDatepicker"))
        {
            $(this).Zebra_DatePicker();
            $(this).Zebra_DatePicker("show");
        }
    }); */
</script>
	 
    
  
 
