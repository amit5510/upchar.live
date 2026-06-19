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
							<h4 class="mainhead">Doctor Registration</h4>
							<form class="form-horizontal formbody" id='mainform' action="<?=base_url()?>doctor/doctorreg/index"  method="post" enctype="multipart/form-data">
								<!--Basic Details-->
								<div class="row mainheadlinefirstrow">
									<div class="col-md-12 mainheadlinefirst">Basic Details</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										  <label class="control-label col-sm-4 label-name" for="email">First Name<span class="starspan">*</span></label>
										  <div class="col-sm-7">
											<input type="text" class="form-control input-sm" id="t_fname" value="<?php echo set_value('t_fname');?>" name="t_fname" data-validation="required"
											data-validation-error-msg="This Field is required" value="<?=$this->session->userdata('fname');?>">
											<span style="color:red;"><?php echo form_error('t_fname');?></span>
										  </div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										  <label class="control-label col-sm-4 label-name" for="email">Last Name<span class="starspan"></span></label>
										  <div class="col-sm-7">
											<input type="text" class="form-control input-sm" id="t_lname" value="<?php echo set_value('t_lname');?>" name="t_lname" value="<?=$this->session->userdata('lname');?>">
											<span style="color:red;"><?php echo form_error('t_lname');?></span>
										  </div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Gender<span class="starspan">*</span></label>
											<div class="col-sm-7">
												<label class="radio-inline"> <input type="radio" id="genderm" name="gender" value="M" <?php if(set_value('gender')=='M'){ echo "checked"; } ?>>Male</label>
												<label class="radio-inline"> <input type="radio" id="genderf" name="gender" value="F" <?php if(set_value('gender')=='F'){ echo "checked"; } ?>>Female</label>
												<span style="color:red;"><?php echo form_error('gender');?></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Email<span class="starspan"></span></label>
											<div class="col-sm-7">
												<input type="email" class="form-control input-sm" id="email" name="email" value="<?php echo set_value('email');?>">
												<span style="color:red;"><?php echo form_error('email');?></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										  <label class="control-label col-sm-4 label-name" for="email">Mobile No.<span class="starspan">*</span></label>
										  <div class="col-sm-7">
											<input type="text" class="form-control input-sm" id="mobile" name="mobile" data-validation="required,number" data-validation-allowing="range[0000000000;9999999999]" data-validation-error-msg="Enter 10 digit valid no." onkeypress="return isNumber(event)"  value="<?php echo set_value('mobile');?>">
											<span style="color:red;"><?php echo form_error('mobile');?></span>
										 </div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										<label class="control-label col-sm-4 label-name" for="email">Password<span class="starspan">*</span></label>
											<div class="col-sm-7">
												<input type="password" class="form-control input-sm" id="password" name="password" data-validation="required"   value="<?=set_value('password');?>">
												<span style="color:red;"><?php echo form_error('password');?></span>
											</div>
										</div>
									</div>
								</div>
								<!--Trainee Name-->
								<div class="row mainheadlinerow">
									<div class="col-md-12 mainheadline">Profesional Detail</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Regd. No<span class="starspan">*</span></label>
											<div class="col-sm-7">
												<input type="text" class="form-control input-sm" id="regno" name="regno" value="<?=set_value('regno');?>">
												<span style="color:red;"><?php echo form_error('regno');?></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Regd Council<span class="starspan"></span></label>
											<div class="col-sm-7">
												<select class="form-control input-sm" id="council" data-validation="required"
													data-validation-error-msg="This Field is required" name="council">
													<option value="">Select</option>
													<?php
													$citylist=$this->db->get_where('master_council',array('status'=>1)); 
													foreach(@$citylist->result() as $list){
													?>
													<option value="<?=$list->id;?>" <?php if(set_value('council')==$list->id){ echo "selected"; } ?> ><?=$list->name;?></option>
													<?php } ?>
												</select>
												<span style="color:red;"><?php echo form_error('council');?></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">City<span class="starspan">*</span></label>
											<div class="col-sm-7">
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
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Year<span class="starspan">*</span></label>
											<div class="col-sm-7">
												<input type="text" class="form-control input-sm" id="year" value="<?=set_value('year');?>" onkeypress="return isNumber(event)" name="year" value="<?=$this->session->userdata('year');?>">
												<span style="color:red;"><?php echo form_error('year');?></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Exprience <span class="starspan">*</span></label>
											<div class="col-sm-7">
												<input type="text" class="form-control input-sm" onkeypress="return isNumber(event)" id="exprience" name="exprience" value="<?=set_value('exprience');?>">
												<span style="color:red;"><?php echo form_error('exprience');?></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Achievement<span class="starspan"></span></label>
											<div class="col-sm-7">
												<input type="text" class="form-control input-sm" id="achievement" name="achievement" value="<?=set_value('achievement');?>">
												<span style="color:red;"><?php echo form_error('achievement');?></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Qualifications<span class="starspan">*</span></label>
											<div class="col-sm-7">
												<select class="form-control input-sm" id="qualification" data-validation="required"
												data-validation-error-msg="This Field is required" name="qualification[]" multiple >
													<?php
													$citylist=$this->db->get_where('master_degree',array('status'=>1));
													foreach(@$citylist->result() as $list){
													?>
													<option value="<?=$list->id;?>" ><?=$list->name;?></option>
													<?php } ?>
												</select>
												<span style="color:red;"><?php echo form_error('qualification');?></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Specialization<span class="starspan">*</span></label>
											<div class="col-sm-7">
												<select class="form-control input-sm  show-menu-arrow " id="specialisation[]" data-validation="required"
												data-validation-error-msg="This Field is required" name="specialisation[]" multiple  data-actions-box="true"  readonly >
													<?php
													$citylist=$this->db->get_where('master_specialization',array('status'=>1));
													foreach(@$citylist->result() as $list){
													?>
													<option value="<?=$list->id;?>" ><?=$list->name;?></option>
													<?php } ?>
												</select>
												<span style="color:red;"><?php echo form_error('specialisation');?></span>
											</div>
										</div>
									</div>
								</div>
								<!--Father's Details-->
								<div class="row mainheadlinerow">
									<div class="col-md-12 mainheadline">Upload Images</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Profile Picture<span class="starspan">*</span></label>
											<div class="col-sm-7">
												<input type="file" class="form-control input-sm" id="uploadimage" name="uploadimage" data-validation="required"
												data-validation-error-msg="This Field is required">
												<p class="othernote">Image should be jpg or png, less than  1MB.</p>
												<span style="color:red;"><?php echo form_error('uploadimage');?></span>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										  <label class="control-label col-sm-4 label-name" for="email">ID Proof<span class="starspan"></span></label>
										  <div class="col-sm-7">
											<input type="file" class="form-control input-sm" id="idproof" name="idproof" data-validation=""
											data-validation-error-msg="This Field is required">
											<p class="othernote">Image should be jpg or png, less than  1MB.</p>
											<span style="color:red;"><?php echo form_error('idproof');?></span>
										  </div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Medi. Reg. Proof<span class="starspan"></span></label>
											<div class="col-sm-7">
												<input type="file" class="form-control input-sm" id="regpoof" name="regproof" data-validation=""
												data-validation-error-msg="This Field is required">
												<p class="othernote">Image should be jpg or png, less than  1MB.</p>
												<span style="color:red;"><?php echo form_error('regpoof');?></span>
											</div>
										</div>
									</div>
								</div>
								<!-- removed closing of div to fix submit ajax issue-->
								
								<!--Trainee Details-->
								<div class="row mainheadlinerow">
									<div class="col-md-12 mainheadline">About Doctor</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label col-sm-3 label-name" for="email">About<span class="starspan"></span></label>
											<div class="col-sm-8">
												<textarea class="form-control input-sm" id="about" name="about" data-validation=""
												data-validation-error-msg="This Field is required" ><?=$this->session->userdata('about');?></textarea>
												<span style="color:red;"><?php echo form_error('about');?></span>
											</div>
										</div>
									</div>
								</div>
								<!--Pre-Training Details-->
								<div class="row mainheadlinerow">
									<div class="col-md-12 mainheadline">Practice Details </div>
								</div>
								<div class="practicewrapper">
									<div class="row" style="margin-top:5px;">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-sm-2 label-name" for="email">Type<span class="starspan">*</span></label>
												<div class="col-sm-7">
													<label class="radio-inline"> <input type="radio" class='objective' data-objectiveid='0' id="objectiveself" name="objective[0]" value="H" >Hospital</label>
													<label class="radio-inline"> <input type="radio" class='objective' data-objectiveid='0'  id="objectivewage" name="objective[0]" value="C">Clinic</label>
													<span style="color:red;"><?php echo form_error('objective[0]');?></span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-sm-4 label-name" for="email" style="white-space: nowrap;">Clinic/Hospital<span class="starspan wg"></span></label>
												<div class="col-sm-7" id="cemp">
													<select class="form-control input-sm" id="clinic" name="clinic[0]" >
													</select>
													<input type='hidden' id='hiddenday_0' name='hiddenday[0]' value='1'>
													<span style="color:red;"><?php echo form_error('clinic');?></span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
											  <label class="control-label col-sm-4 label-name" for="email">Fee<span class="starspan wg"></span></label>
											  <div class="col-sm-7" id="cadd">
												<input type="text" class="form-control input-sm" id="fee" name="fee[]" value="<?=$this->session->userdata('companyadd');?>">
												<span style="color:red;"><?php echo form_error('fee');?></span>
												</div>
											</div>
										</div>
										<div class="timmingwrapper">
											<div class="col-md-8">
												<div class="form-group">
												  <label class="control-label col-sm-4 label-name" for="email">Select Day<span class="starspan wg"></span></label>
												  <div class="col-sm-7" id="cadd">
													<label class="checkbox-inline"><input type="checkbox" name='sun[0][0]' value="1">Sun</label>
													<label class="checkbox-inline"><input type="checkbox" name='mon[0][0]' value="1">Mon</label>
													<label class="checkbox-inline"><input type="checkbox" name='tue[0][0]' value="1">Tue</label>
													<label class="checkbox-inline"><input type="checkbox" name='wed[0][0]' value="1">Wed</label>
													<label class="checkbox-inline"><input type="checkbox" name='thu[0][0]' value="1">Thus</label>
													<label class="checkbox-inline"><input type="checkbox" name='fri[0][0]' value="1">Fri</label>
													<label class="checkbox-inline"><input type="checkbox" name='sat[0][0]' value="1">Sat</label>
												  </div>
												</div>
											</div>
											<br>
											<br>
											<div class='sessionwrapper'>
												<div class="col-md-4">
													<div class="form-group">
													  <label class="control-label col-sm-4 label-name" for="email">From<span class="starspan wg"></span></label>
													  <div class="col-sm-7" id="ccont">
														<input type="time" class="form-control input-sm timepicker" id="fromtime[0][0][]" name="fromtime[0][0][]"  value="">
													  </div>
													</div>
												</div>
												<div class="col-md-4">
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
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">        
											  <div class="col-sm-9 float-right">
												<button type="button" class="btn btn-info  btn-xs" id="addclinic" name="" data-clinicblock-id='0'   data-dayblock-id='0'>Add More Clinic / Hospital</button>
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
											<div class="radio"><label><input type="radio" name="package" value='B' checked>Basic (Free)</label></div>
											<div class="radio"><label><input type="radio" name="package" value='P'>Premium (Paid)</label></div>
										</div>
									</div>
									<br>
									<div class="col-md-8">
										<div class="form-group">
										  <div class="radio"><label><input type="radio" name="status" value='A' checked>Active</label></div>
										  <div class="radio"><label><input type="radio" name="status" value='I'>Inactive</label></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<p class="note">Note: Size of image must be less than 50 KB. Only jpg and png file allowed.</p>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
  $.validate({
   
  }); 
/*   // this is the id of the form
$("#mainform").submit(function(e) {


    var form = $(this);
    var url = form.attr('action');

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
}); */
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
				var code = '<br><div class="col-md-4">' +
				'	<div class="form-group">' +
				'	  <label class="control-label col-sm-4 label-name" for="email">From<span class="starspan wg"></span></label>' +
				'	  <div class="col-sm-7" id="ccont">' +
				'		<input type="time" class="form-control input-sm timepicker" id="" name="fromtime['+cblockid+']['+dblockid+'][]" value="">' +
				'	  </div>' +
				'	</div>' +
				'</div>' +
				'<div class="col-md-4">' +
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
						'<label class="checkbox-inline"><input type="checkbox" name="sun['+cblockid+']['+hiddendayseq+']" value="1">Sun</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="mon['+cblockid+']['+hiddendayseq+']" value="1">Mon</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="tue['+cblockid+']['+hiddendayseq+']" value="1">Tue</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="wed['+cblockid+']['+hiddendayseq+']" value="1">Wed</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="thu['+cblockid+']['+hiddendayseq+']" value="1">Thus</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="fri['+cblockid+']['+hiddendayseq+']" value="1">Fri</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="sat['+cblockid+']['+hiddendayseq+']" value="1">Sat</label>' +
						
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
			'		<input type="hidden" id="hiddenday_'+cblockid+'" name="hiddenday['+cblockid+']" value="1">'+
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
						'<label class="checkbox-inline"><input type="checkbox" name="sun['+cblockid+'][0]" value="1">Sun</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="mon['+cblockid+'][0]" value="1">Mon</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="tue['+cblockid+'][0]" value="1">Tue</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="wed['+cblockid+'][0]" value="1">Wed</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="thu['+cblockid+'][0]" value="1">Thus</label>'+
						'<label class="checkbox-inline"><input type="checkbox" name="fri['+cblockid+'][0]" value="1">Fri</label>' +
						'<label class="checkbox-inline"><input type="checkbox" name="sat['+cblockid+'][0]" value="1">Sat</label>' +
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
