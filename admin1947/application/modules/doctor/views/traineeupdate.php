<!DOCTYPE html>
<html>
<style>
  .label-name{
	  text-align:left!important;
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
  .note{
      font-weight:600;margin-top:10px;margin-bottom:20px;
  }
  .othernote{
      font-weight:600;font-size:13px;color:#d20c0c;
  }
  .traineeimage{
	  width:150px;
	  height:160px;
	  margin-left:-14px;
	  border:1px solid #a6a9ab;
  }
  #submit{background:#605ca8;padding: 6px 30px;}
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  </style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<!--there was sidebar -->
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content">
      <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
  
<div class="container bg-3">   
  <br>
  
		<div class="container" style="margin-bottom:10px;">
		<div class="row">
			<h4 style="font-weight:600;margin-bottom:20px;">Trainee Update</h2>
			
			<div class="col-md-6" id="traineeimg">
				
			</div>
			<div class="col-md-6">
				<form class="form-inline" id="searchform">
					<div class="form-group">
					  <label class="control-label" for="email" style="font-size:13px;padding-right:10px;margin-bottom:5px;">Serch by: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
						
						<label class="radio-inline"><input type="radio" value='uid' name="searchby" checked>Aadhar</label>
						<label class="radio-inline"><input type="radio" value='tid' name="searchby">Trainee Id</label>
					 <input type="reset" class="btn btn-primary" onclick="document.getElementById('reset').click()" value="Reset Edit" style="margin-top: -20px;margin-left: 49px;">
					 </div>
					 
					 <div class="form-group">
					  <label class="control-label" for="email" style="font-size:15px;padding-right:10px;margin-top:5px;">Trainee Name </label>
					  <input type="text" class="searchtrainee form-control" id="searchtrainee"  name="searchtrainee"><!--list="searchresult"-->  
					  <datalist id="searchresult" >
					  
					  
					  </datalist>
					  <input type="submit" class="btn btn-primary" id="searchbtn" value="Show Details" style="margin-top:-7px;">
					 </div>
				</form>
			</div>
		</div>
		</div>
  <div class="row">
   
	<div class="container">
	<?=$this->session->flashdata('flashmsg');?>
	
	  <form class="form-horizontal formbody" action="<?=base_url()?>trainee/traineeupdate/update" method="post" enctype="multipart/form-data">
		
		<!--Basic Details-->
		<div class="row mainheadlinefirstrow">
			<div class="col-md-12 mainheadlinefirst">Basic Details</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">DPR<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control dpr input-sm" id="dpr" data-validation="required"
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
				  <label class="control-label col-sm-4 label-name" for="email">Center<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control fddicenter input-sm" id="fddicenter" name="fddicenter" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select</option>
						
					</select>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Sub Center<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm fddi_subcenter" id="fddi_subcenter" data-validation="required"
					data-validation-error-msg="This Field is required" name="fddi_subcenter">
						<option value="">Select</option>
						
					</select>
				  </div>
				</div>
			</div><br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Course<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm" id="coursemenu" name="course">
						<option value="">Select</option>
						
					</select>
				  </div>
				</div>
			</div>
			
		</div>
		
		
		<!--Trainee Name-->
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Trainee Name</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">First Name<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="t_fname" name="t_fname" data-validation="required"
					data-validation-error-msg="This Field is required" readonly>
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Middle Name<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="t_mname" name="t_mname" readonly>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Last Name<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="t_lname" name="t_lname" readonly>
				  </div>
				</div>
			</div>
		</div>
		
		<!--Father's Details-->
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Father's/Husband's Details</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">First Name<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="f_fname" name="f_fname" data-validation="required"
			 data-validation-error-msg="This Field is required">
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Middle Name<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="f_mname" name="f_mname">
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Last Name<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="f_lname" name="f_lname">
				  </div>
				</div>
			</div><br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Occupation<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="f_occupation" name="f_occupation" data-validation="required"
			 data-validation-error-msg="This Field is required">
					<input type="hidden" id="eid" name="eid">
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Contact No.<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="f_contact" name="f_contact"  data-validation="length" data-validation-length="10-12"
			 data-validation-error-msg="Contact no should be of 10-12 Digit"  onkeypress="return isNumber(event)">
				  </div>
				</div>
			</div>
		</div>
		
		<!--Trainee Details-->
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Trainee Details</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Aadhar No.<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="aadhar" name="aadhar" data-validation="required,length" data-validation-length="12-12"					data-validation-error-msg="Aadhar no. must be 12 digits" onkeypress="return isNumber(event)" readonly>
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">DOB<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input id="dob" type="text" class="form-control input-sm traineedob" data-validation="required"
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
			</div><br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email" style="white-space: nowrap;">Phy. Handicapped<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					 <label class="radio-inline"> <input type="radio" id="handyyes" name="handicaped" value="1">Yes</label>
					 <label class="radio-inline"> <input type="radio" id="handyno" name="handicaped" value="0" checked>No</label>
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
			</div>
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
			</div><br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Marital Status<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm" id="marital_status" data-validation="required"
					data-validation-error-msg="This Field is required" name="marital_status">
						<option value="">Select</option>
						<option value="0">Single</option>
						<option value="1">Married</option>
					</select>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">ID Document<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm" id="id_document" name="id_document">
						<option value="">Select</option>
						<?php
						$documentfield=$this->db->get_where('master_document',array('status'=>1));
						foreach($documentfield->result() as $documentfielddata){
						?>
						<option value="<?=$documentfielddata->document_id;?>"><?=$documentfielddata->document_name;?></option>
						<?php } ?>
					</select>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Document No<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="documentno" name="documentno">
				  </div>
				</div>
			</div><br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Address<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="address" name="address" data-validation="required"
					data-validation-error-msg="This Field is required">
				  </div>
				</div>
			</div>
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
			</div><br>
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
				  <label class="control-label col-sm-4 label-name" for="email">Phone No.<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="phone" name="phone" onkeypress="return isNumber(event)">
				  </div>
				</div>
			</div><br>
			
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
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Mobile No.<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="mobile" name="mobile" data-validation="required,number" data-validation-allowing="range[6000000000;9999999999]" data-validation-error-msg="Enter 10 digit valid no." onkeypress="return isNumber(event)">
				  </div>
				</div>
			</div><br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Active<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					 <label class="radio-inline"> <input type="radio" id="activeyes" name="active" class="activeradio" value="1" checked>Yes</label>
					 <label class="radio-inline"> <input type="radio" id="activeno" name="active" class="activeradio" value="0">No</label>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Upload Image<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="file" class="form-control input-sm" id="uploadimage" name="uploadimage">
					<p class="othernote">Image should be jpg or png, less than 50 KB.</p>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-7 label-name" for="email">Aadhar Sedding with Bank<span class="starspan">*</span></label>
				  <div class="col-sm-2">
					 <label class="radio-inline"> <input type="radio" id="aadharbankyes" name="aadharbank" value="1" checked>Yes</label>
				  </div>
				</div>
			</div>
			<br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">BPL<span class="starspan">*</span></label>
				  <div class="col-sm-7" id="updatebpl">
					 <label class="radio-inline"> <input type="radio" id="bplyes" name="bpl" value="1" onchange="bplcardyes(this)">Yes</label>
					 <label class="radio-inline"> <input type="radio" id="bplno" name="bpl" value="0" onchange="bplcardno(this)" checked>No</label>
					 <div id="bplcodediv">
    					
					</div>
				  </div>
				</div>
			</div>
		</div>
		
		
		
		<!--Educational Details-->
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Education Details</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Education<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm" id="education" name="education" data-validation="required"
					data-validation-error-msg="This Field is required">
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
				  <label class="control-label col-sm-4 label-name" for="email" style="white-space: nowrap;">Education Stream<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm" id="educationstream" name="educationstream">
						<option value="">Select</option>
						<option value="Arts">Arts</option>
						<option value="Science">Science</option>
						<option value="Commerce">Commerce</option>
						<option value="Common">Common</option>
					</select>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Pass Year<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="passyear" name="passyear" onkeypress="return isNumber(event)">
				  </div>
				</div>
			</div><br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">% of Marks<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="markobtain" name="markobtain" onkeypress="return isNumber(event)">
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Institute Name<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="institutename" name="institutename">
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Skill (if any)<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="skill" name="skill">
				  </div>
				</div>
			</div>
		</div>
		
		
		<!--Pre-Training Details-->
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Pre-Training Details</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
				  <label class="control-label col-sm-2 label-name" for="email">Objective<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					 <label class="radio-inline"> <input type="radio" id="objectiveself" name="objective" value="SE" checked>Self Employed</label>
					 <label class="radio-inline"> <input type="radio" id="objectivewage" name="objective" value="WE">Wage Employed</label>
					 <label class="radio-inline"> <input type="radio" id="objectiveun" name="objective" value="UE">Un-Employed</label>
				  </div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:5px;">
			<div class="col-md-6">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email" style="white-space: nowrap;">Current Employment<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="currentemployment" name="currentemployment">
				  </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Company Address<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="companyaddress" name="companyaddress">
				  </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Company Contact No.<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="companycontact" name="companycontact" onkeypress="return isNumber(event)">
				  </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Company Email<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="email" class="form-control input-sm" id="companyemail" name="companyemail">
				  </div>
				</div>
			</div>
		</div>
		
		
		<!--Trainee Bank Details-->
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Trainee Bank Details</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Bank Name<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="t_bankname" name="t_bankname" data-validation="required"
					data-validation-error-msg="This Field is required">
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email" style="white-space: nowrap;">Branch<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="t_bankbranch" name="t_bankbranch" data-validation="required"
					data-validation-error-msg="This Field is required">
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Account No.<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="t_accountno" name="t_accountno" data-validation="required"
					data-validation-error-msg="This Field is required">
				  </div>
				</div>
			</div><br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">IFSC Code<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="t_ifsc" name="t_ifsc" data-validation="length" data-validation-length="11"
					data-validation-error-msg="Invalid IFSC Code" >
				  </div>
				</div>
			</div>
			
		</div>
		
		<div class="row">
		<div class="col-md-12">
		
			<div class="form-group">        
				  <div class="col-sm-9">
					<button type="submit" class="btn btn-info" id="submit" name="submit">Update</button>
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

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?=base_url();?>public/assets/dist/js/zebra_datepicker.min.js"></script>
        <script type="text/javascript" src="<?=base_url();?>public/assets/dist/js/examples.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
  $.validate({
   
  });
</script>

<script>
$(document).ready(function(){
	
    $(".delete").click(function(){
		var c=confirm('Are you sure to delete');
		if(c)
		{
			var uid=$(this).attr('data-uid'); 
			var uri='<?=base_url()?>dpr/dprcreate/delete/'+uid
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
$(document).ready(function(){
	
    $("#searchform").submit(function(e){
			e.preventDefault();
			var key=$("#searchtrainee").val();	
			var sb=$('input[name=searchby]:checked').val();
			var uri='<?=base_url()?>trainee/traineeupdate/edit';
			$.ajax({
			 type:"post", 
			 url: uri,
			 dataType:'json',
			 data:{key:key,searchby: sb},
			 success: function(result){
				 if(result['response'] != null)
				 {
					 myalert(result['response_msg']);exit();
				 }
				var eid=result['eid'];
				var dpr=result['dpr'];
				var center=result['center'];
				var centerid=result['centerid'];
				var active=result['active'];
				var uploaded_image=result['uploaded_image'];
				var course=result['course'];
				var courseid=result['courseid'];
				var t_fname=result['t_fname'];
				var t_mname=result['t_mname'];
				var t_lname=result['t_lname'];
				var f_fname=result['f_fname'];
				var f_mname=result['f_mname'];
				var f_lname=result['f_lname'];
				var f_occupation=result['f_occupation'];
				var f_contact=result['f_contactno'];
				var aadhar=result['aadhar'];
				var gender=result['gender'];
				var handicapped=result['handicapped'];
				var objective=result['objective'];
				var dob=result['dob'];
				var category=result['category'];
				var religion=result['religion'];
				var marital_status=result['marital_status'];
				var id_document=result['id_document'];
				var document_no=result['document_no'];
				var address=result['address'];
				var bplnumber=result['bplnumber'];
				var bplfield=result['bplfield'];
				var state=result['state'];
				var phone=result['phone'];
				var pin=result['pin'];
				var email=result['email'];
				var mobile=result['mobile'];
				var education=result['education'];
				var education_stream=result['education_stream'];
				var pass_year=result['pass_year'];
				var mark_obtain=result['mark_obtain'];
				var institute=result['institute'];
				var skill=result['skill'];
				var current_employment=result['current_employment'];
				var company_address=result['company_address'];
				var company_contact=result['company_contact'];
				var company_email=result['company_email'];
				var t_bankname=result['t_bankname'];
				var t_bankbranch=result['t_bankbranch'];
				var t_accountno=result['t_accountno'];
				var t_ifsccode=result['t_ifsccode'];
				
				var subcenter=result['subcenter'];
				var subcenterid=result['subcenterid'];
				var district=result['district'];
				var districtid=result['districtid'];
				var block=result['block'];
				var blockid=result['blockid'];
				var village=result['village'];
				var villageid=result['villageid'];
				
				$("#eid").val(eid);
				$("#dpr").val(dpr);
				
				$("#coursemenu").html(course);
				$("#coursemenu").val(courseid);
				$("#t_fname").val(t_fname);
				$("#t_mname").val(t_mname);
				$("#t_lname").val(t_lname);
				$("#f_fname").val(f_fname);
				$("#f_mname").val(f_mname);
				$("#f_lname").val(f_lname);
				$("#f_occupation").val(f_occupation);
				$("#f_contact").val(f_contact);
				$("#aadhar").val(aadhar);
				$("#dob").val(dob);
				$("#category").val(category);
				$("#religion").val(religion);
				$("#marital_status").val(marital_status);
				$("#id_document").val(id_document);
				$("#documentno").val(document_no);
				$("#address").val(address);
				$("#state").val(state);
				$("#phone").val(phone);
				$("#pin").val(pin);
				$("#email").val(email);
				$("#mobile").val(mobile);
				$("#education").val(education);
				$("#educationstream").val(education_stream);
				$("#passyear").val(pass_year);
				$("#markobtain").val(mark_obtain);
				$("#institutename").val(institute);
				$("#skill").val(skill);
				$("#currentemployment").val(current_employment);
				$("#companyaddress").val(company_address);
				$("#companycontact").val(company_contact);
				$("#companyemail").val(company_email);
				$("#t_bankname").val(t_bankname);
				$("#t_bankbranch").val(t_bankbranch);
				$("#t_accountno").val(t_accountno);
				$("#t_ifsc").val(t_ifsccode);
				
				$("#fddicenter").html(center);
				$("#fddicenter").val(centerid);
				$("#fddi_subcenter").html(subcenter);
				$("#fddi_subcenter").val(subcenterid);
				$("#district").html(district);
				$("#district").val(districtid);
				$("#block").html(block);
				$("#block").val(blockid);
				$("#village").html(village);
				$("#village").val(villageid);
				
				if(bplnumber!=0)
				{
				    $('#bplyes').prop('checked', true);
				     $("#bplcodediv").html(bplfield);
				}
				
				else{
				    $('#bplno').prop('checked', true);
				     $("#bplcodediv").html('');
				}
				if(active=="1")
				{
					$('#activeyes.activeradio').prop('checked', true);
				}
				else if(active=="0")
				{
					$('#activeno.activeradio').prop('checked', true);
				}
				
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
				
				if(handicapped==1)
				{
					$('#handyyes').prop('checked', true);
				}
				else if(handicapped==0)
				{
					$('#handyno').prop('checked', true);
				}
				
				if(objective=="SE")
				{
					$('#objectiveself').prop('checked', true);
				}
				else if(objective=="WE")
				{
					$('#objectivewage').prop('checked', true);
				}
				else if(objective=="UE")
				{
					$('#objectiveun').prop('checked', true);
				}
				var imguri='<?=base_url()?>public/assets/mainpanel/images/traineeregistration/'+uploaded_image;
				$("#traineeimg").html('<img src='+imguri+' class="img-responsive traineeimage">');
				
				
			 }

			});
			
			
			$("#submit").html('Update');
		
    });
    $("#reset").click(function(){
		
			$("#eid").val('');
		$("#traineeimg").html('');
    });
	
/* 	$("#searchtrainee").keyup(function(){
		var serchkey=$("#searchtrainee").val();
		var urisearch='<?=base_url()?>trainee/traineeupdate/search';
		$.ajax({
			 type:"post", 
			 url: urisearch,
			 data:{searchkey:serchkey},
			 success: function(result){
				 $("#searchresult").empty();
				 $("#searchresult").html(result);
			 }
		});
		
	}); */
	
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
<script>		function isNumber(evt) {    evt = (evt) ? evt : window.event;    var charCode = (evt.which) ? evt.which : evt.keyCode;    if (charCode > 31 && (charCode < 48 || charCode > 57)) {        return false;    }    return true;}	</script>
    </section>
    <!-- /.content -->
  </div>
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
