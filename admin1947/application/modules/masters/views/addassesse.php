<!DOCTYPE html>
<html>
 <style>
  .tabledata{
	  border:1px solid #fff!important;
	  font-weight:600;
  }
  .tableheaddata{
	  border:1px solid #fff!important;
	  background:#605CA8;
	  color:#fff;
  }
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
	  background:#605CA8;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;
  }
  .mainheadlinefirstrow
  {
	  padding:5px;
  }
  .mainheadlinefirst
  {
	  background:#605CA8;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;
  }
  .mainhead{
      font-weight:600;margin-bottom:20px;
  }
  .formbody{
      border:1px solid #d6d2d2;padding:10px;border-radius:4px;
  }
  #submit{background:#605ca8;padding: 6px 30px;}
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  @media only screen and (min-width: 1350px) and (max-width: 1408px) {
	#mainform{
		max-width:94%!important;
	}
  }
   @media only screen and (min-width: 1300px) and (max-width: 1349px) {
	#mainform{
		max-width:89%!important;
	}
	
  }
  @media only screen and (min-width: 1246px) and (max-width: 1299px) {
    #mainform{
		max-width:85%!important;
	}
	
  }
   @media only screen and (min-width: 1200px) and (max-width: 1245px) {
    #mainform{
		max-width:81%!important;
	}
	
  }
  @media only screen and (min-width: 1065px) and (max-width: 1199px) {
    #mainform{
		max-width:83%!important;
	}
  }
  
  @media only screen and (min-width: 1000px) and (max-width: 1064px) {
    #mainform{
		max-width:77%!important;
	}
  }
  </style>
 
<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
 <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<!--there was sidebar -->
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assessee Registration
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
        <li class="active">Add Assessee</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  
<div class="container bg-3 ">  

<br>  
  <br>
  <div class="row text-">
    
	<div class="container">
	<?=$this->session->flashdata('flashmsg');?>

	  <form class="form-horizontal formbody" action="<?=base_url()?>masters/addassesse/create" method="post" enctype="multipart/form-data" id="mainform">
		
		<!--Basic Details-->
		<div class="row mainheadlinefirstrow">
			<div class="col-md-12 mainheadlinefirst">Basic Details</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">DPR<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control dpr" id="dpr" data-validation="required"
					data-validation-error-msg="This Field is required" name="dpr">
						<option value="">Select</option>
						<?php
						$dprfield=$this->db->get_where('dpr_create',array('active'=>1));
						foreach($dprfield->result() as $dprfielddate){
						?>
						<option value="<?=$dprfielddate->dpr_id;?>"><?=$dprfielddate->dpr_name;?></option>
						<?php } ?>
					</select>
				  </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Agency<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control agency input-sm" id="assessagency" name="agency" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select</option>
						
					</select>
				  </div>
				</div>
			</div>
			
		</div>
		
		
		
		<!--Trainee Details-->
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Assessee Details</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Name<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="name" name="name" data-validation="required"
					data-validation-error-msg="This Field is required">
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Aadhar No.<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="aadhar" name="aadhar" data-validation="required,length" data-validation-length="12-12"
					data-validation-error-msg="Aadhar no. must be 12 digits" onkeypress="return isNumber(event)">
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Father's Name<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="fathername" name="fathername" data-validation="required"
					data-validation-error-msg="This Field is required">
					<input type="hidden" id="eid" name="eid">
				  </div>
				</div>
			</div>
			<br>
			
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">DOB<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input id="dob" type="text" class="form-control input-sm facultydob" data-validation="required"
		 data-validation-error-msg="This Field is required" name="dob">
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Gender<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					 <label class="radio-inline"> <input type="radio" id="genderm" class="gender" name="gender" value="M" checked>Male</label>
					 <label class="radio-inline"> <input type="radio" id="genderf" class="gender" name="gender" value="F">Female</label>
					 <label class="radio-inline"> <input type="radio" id="gendero" class="gender" name="gender" value="O">Others</label>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Category<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm" id="category" data-validation="required"
					data-validation-error-msg="This Field is required" name="category">
						<option value="">Select</option>
						<?php
						$categoryfield=$this->db->get_where('master_category',array('status'=>1));
						foreach($categoryfield->result() as $categoryfielddata){
						?>
						<option value="<?=$categoryfielddata->category_id;?>"><?=$categoryfielddata->category_name;?></option>
						<?php } ?>
					</select>
				  </div>
				</div>
			</div><br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Religion<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm" id="religion" data-validation="required"
					data-validation-error-msg="This Field is required" name="religion">
						<option value="">Select</option>
						<?php
						$religionfield=$this->db->get_where('master_religion',array('status'=>1));
						foreach($religionfield->result() as $religionfielddata){
						?>
						<option value="<?=$religionfielddata->religion_id;?>"><?=$religionfielddata->religion_name;?></option>
						<?php } ?>
					</select>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Education<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm" id="education" name="education">
						<option value="">Select</option>
						<?php
						$masterdatas=$this->db->get_where('master_education',array('status'=>1));
						foreach($masterdatas->result() as $masterdata){
						?>
						<option value="<?=$masterdata->education_id;?>" ><?=$masterdata->education_name;?></option>
						<?php } ?>
					</select>
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Address<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="address" name="address" data-validation="required"
					data-validation-error-msg="This Field is required">
				  </div>
				</div>
			</div>
			<br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">State<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control state input-sm" id="state" name="state" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select</option>
						<?php
						$statedatas=$this->db->order_by('state_name','ASC')->get_where('lgd_states');
						foreach($statedatas->result() as $statedata){
						?>
						<option value="<?=$statedata->state_code;?>" data-uid="<?=$statedata->state_code;?>"><?=$statedata->state_name;?></option>
						<?php } ?>
					</select>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">District<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control district input-sm" id="district" name="district" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select</option>
					</select>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Block<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control block input-sm" id="block" name="block" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select</option>
					</select>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Village<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control village input-sm" id="village" name="village" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select</option>
					</select>
				  </div>
				</div>
			</div>
			
			
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Pin<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="pin" name="pin" data-validation="required,length" data-validation-length="6-6" data-validation-error-msg="PINCODE must be 6 digit" onkeypress="return isNumber(event)">
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Email<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="email" class="form-control input-sm" id="email" name="email">
				  </div>
				</div>
			</div><br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Phone No.<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="phone" name="phone" onkeypress="return isNumber(event)">
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Mobile No.<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="mobile" name="mobile" data-validation="required,number" data-validation-allowing="range[6000000000;9999999999]" data-validation-error-msg="Enter 10 digit valid no." onkeypress="return isNumber(event)">
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Active<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					 <label class="radio-inline"> <input type="radio" id="activeyes" class="activeradio" name="active" value="1" checked>Yes</label>
					 <label class="radio-inline"> <input type="radio" id="activeno" class="activeradio" name="active" value="0">No</label>
				  </div>
				</div>
			</div><br>
			
		</div>
		
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Types of Assessee</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label class="checkbox-inline" style="margin-right:20px;"><input type="checkbox" id="mcheck" style="margin-top:2px;" onchange="leadassessor(this)" checked>Lead Assessor</label>
				<div class="col-md-6" id="lassessorbox">
					<input type="text" class="form-control input-sm" id="lassessor" name="lassessor" data-validation="required" data-validation-error-msg="Enter Certificate Number" placeholder="Enter Certificate No." value="<?=$this->session->userdata('lassessor');?>">
				</div>
			</div>
			
			<div class="col-md-6">
				<label class="checkbox-inline" style="margin-right:20px;"><input type="checkbox" id="tcheck" style="margin-top:2px;" onchange="assessors(this)" checked>Assessor</label>
				<div class="col-md-6" id="assessorsbox">
					<input type="text" class="form-control input-sm" id="assessor" name="assessor" placeholder="Enter Certificate No." data-validation="required" data-validation-error-msg="Enter Certificate Number" value="<?=$this->session->userdata('assessor');?>">
				</div>
			</div>
		</div>
		
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Select Courses</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php 
					$getcourses=$this->db->get_where('master_course',array('status'=>1))->result();
					foreach($getcourses as $getcourse){
					
				?>
				<label class="checkbox-inline" style="margin-right:20px;"><input type="checkbox" id="course<?=$getcourse->course_id?>" name="course[]" value="<?=$getcourse->course_id?>" style="margin-top:2px;" checked><?=$getcourse->course_name?></label>
				<?php } ?>
				
			</div>
		</div>
		
		<!--Professional Details-->
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Professional Details</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Programe Name<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="programname" name="programname">
				  </div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Institution/University<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="institute" name="institute">
				  </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Passing Year<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="passingyear" name="passingyear"  onkeypress="return isNumber(event)">
				  </div>
				</div>
			</div>
		</div>
		
		
		<!--Pre-Training Details-->
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Experience Details</div>
		</div>
		
		
		<div class="row" style="margin-top:5px;">
			<div class="col-md-6">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Area of Specialization<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="specialization" name="specialization" data-validation="required"
					data-validation-error-msg="This Field is required">
				  </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Year<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="year" name="year" data-validation="required"
					data-validation-error-msg="This Field is required" onkeypress="return isNumber(event)">
				  </div>
				</div>
			</div>
		</div>
		
		
		
		<div class="row">
		<div class="col-md-12">
			<div class="form-group">        
				  <div class="col-sm-9">
					<button type="submit" class="btn btn-info" id="submit" name="submit">Add</button>
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

<!--Assesse details-->
<div class="container" style="border:1px solid #ccc">
<div class="row mainheadlinefirstrow" style="padding:0px;">
			<div class="col-md-12 mainheadlinefirst" style="margin-top:0px;">Assesse Details</div>
		</div>
	<div class="row" style="border-bottom:1px solid #d5d6d8;">
		  <div class="col-md-4">
			<div class="form-group">
				  <label class="control-label col-sm-4 label-name" style="margin-top:4px;">DPR<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control facultydpr fddi_assessedetails" id="dpr" data-validation="required"
					data-validation-error-msg="This Field is required" name="dpr">
						<option value="">Select</option>
						<?php
						$dprfield=$this->db->get_where('dpr_create',array('active'=>1));
						foreach($dprfield->result() as $dprfielddate){
						?>
						<option value="<?=$dprfielddate->dpr_id;?>"><?=$dprfielddate->dpr_name;?></option>
						<?php } ?>
					</select>
				  </div>
				</div>
		  </div>
		  
		  <div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" style="margin-top:4px;">Agency<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control assesseagency fddi_assessedetails" id="fddicenter" name="fddicenter" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select</option>
						
					</select>
				  </div>
				</div>
		  </div>
		  
			
			<br><br>
	</div>
	<hr>
	
	<div class="row">
		<table class="table table-bordered tab" id='mydata' style="border:none;">
    <thead>
      <tr>
        <th class="tableheaddata">DPR</th>
		<th class="tableheaddata">Agency</th>
        <th class="tableheaddata">Name</th>
		<th class="tableheaddata">Aadhar No.</th>
        <th class="tableheaddata">Email</th>
        <th class="tableheaddata">Mobile</th>
		<th class="tableheaddata">State</th>
        <th class="tableheaddata">Status</th>
        <th class="tableheaddata">Select</th>
        <th class="tableheaddata">Delete</th>
      </tr>
    </thead>
    <tbody id="assessebody">
	
    </tbody>
  </table>
	</div>
</div>
<!--End Assesse Details-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script>
  $.validate({
   
  });
</script>
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
	
   $("body").on('click','.select',function(){
		$('input:checkbox').removeAttr('checked');
			var uid=$(this).attr('data-uid');  
			var uri='<?=base_url()?>masters/addassesse/edit';
			$.ajax({
			 type:"post", 
			 url: uri,
			 dataType: 'json',
			 data:{uid:uid},
			 success: function(result){
				
				var eid=result['id'];
				//var dpr=result['dpr'];
				var dpr=$('.facultydpr').val();
				var agency=result['agency'];
				var agencyid=result['agencyid'];
				var name=result['assesseename'];
				var aadhar=result['aadhar'];
				var fname=result['fname'];
				var dob=result['dob'];
				var gender=result['gender'];
				var category=result['category'];
				var religion=result['religion'];
				var education=result['education'];
				var address=result['address'];
				var state=result['state'];
				var district=result['district'];
				var districtid=result['districtid'];
				var block=result['block'];
				var blockid=result['blockid'];
				var village=result['village'];
				var villageid=result['villageid'];
				var pin=result['pin'];
				var email=result['assesseeemail'];
				var phone=result['assesseephone'];
				var mobile=result['assesseemobile'];
				var active=result['active'];
				var leadassessor=result['leadassessor'];
				var assessor=result['assessor'];
				var program_name=result['program_name'];
				var institute=result['institute'];
				var passing_year=result['passing_year'];
				var specialization=result['specialization'];
				var year=result['year'];
				
				$("#eid").val(eid);
				$("#dpr").val(dpr);
				$("#assessagency").html(agency);
				$("#assessagency").val(agencyid);
				$("#name").val(name);
				$("#aadhar").val(aadhar);
				$("#fathername").val(fname);
				$("#dob").val(dob);
				if(gender=="M")
				{
					$('#genderm.gender').prop('checked', true);
				}
				else if(gender=="F")
				{
					$('#genderf.gender').prop('checked', true);
				}
				else if(gender=="O")
				{
					$('#gendero.gender').prop('checked', true);
				}
				$("#category").val(category);
				$("#religion").val(religion);
				$("#education").val(education);
				$("#address").val(address);
				$("#state").val(state);
				$("#district").html(district);
				$("#district").val(districtid);
				$("#block").html(block);
				$("#block").val(blockid);
				$("#village").html(village);
				$("#village").val(villageid);
				$("#pin").val(pin);
				$("#email").val(email);
				$("#phone").val(phone);
				$("#mobile").val(mobile);
				if(active=="1")
				{
					$('#activeyes.activeradio').prop('checked', true);
				}
				else if(active=="0")
				{
					$('#activeno.activeradio').prop('checked', true);
				}
				
				var course=result['course'];
				var courseindi = course.split(",");
				for(var i = 0; i < courseindi.length; i++){
					 $("#course"+courseindi[i]).attr("checked", "checked");
				}
				$("#programname").val(program_name);
				$("#institute").val(institute);
				$("#passingyear").val(passing_year);
				$("#specialization").val(specialization);
				$("#year").val(year);
				
				$("#mcheck").attr("checked", "checked");
				$("#tcheck").attr("checked", "checked");
				if(leadassessor!=0)
				{
					$("#lassessor").val(leadassessor);
				}
				else{
					$("#lassessor").val('');
				}
				
				if(assessor!=0)
				{
					$("#assessor").val(assessor);
				}
				else{
					$("#assessor").val('');
				}
				
				
			 }

			});
			$("#submit").html('Update');
    });
    $("#reset").click(function(){
		
			$("#eid").val('');
			$("#submit").html('Add');
		
    });
});
</script>
<script>
$(document).ready(function(){
	  $("body").on('click','.delete',function(){
		var c=confirm('Are you sure to delete');
		if(c)
		{
			var uid=$(this).attr('data-uid'); 
			var uri='<?=base_url()?>masters/addassesse/delete/'+uid
			$.ajax({
			 type:"post", 
			 url: uri,
			 success: function(result){
			   if(result=='Y')
			   {
				    location.reload();
				}
			 }
			});
		}
     });
});
</script>
 <script>
 function leadassessor(checkboxElem) {
  if (checkboxElem.checked) {
    $("#lassessorbox").html('<input type="text" class="form-control input-sm" placeholder="Enter Certificate No." id="lassessor" name="lassessor" data-validation="required" data-validation-error-msg="Enter Certificate Number">');
  } else {
    $("#lassessorbox").html('');
  }
}

 function assessors(checkboxElem) {
  if (checkboxElem.checked) {
    $("#assessorsbox").html('<input type="text" class="form-control input-sm" placeholder="Enter Certificate No." id="assessor" name="assessor" data-validation="required" data-validation-error-msg="Enter Certificate Number">');
  } else {
    $("#assessorsbox").html('');
  }
}
</script>
    </section>
    <!-- /.content -->
  </div>
  
  <script>
		$(document).ready(function(){
			$(".fddi_assessedetails").change(function(){
					var vid=this.value; 
					var uri="<?=base_url()?>others/other/getassesseview";
					var dpr=$(".facultydpr").val(); 
					if ( $(this).hasClass("facultydpr") ) 
					{   
						var type='dpr'; 
					}
					else if ( $(this).hasClass("assesseagency") ) 
					{   
						var type='agency';  
					}
					
					$.ajax({
					 type:"post", 
					 url: uri,
					 data:{vid:vid,type:type,dpr:dpr},
					 success: function(result){
						 $("#assessebody").html(result);
					}

					});			
			});
		});
	</script>
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2018 <a href="#">Fddi</a>.</strong> All rights
    reserved.
  </footer>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


</body>
</html>
