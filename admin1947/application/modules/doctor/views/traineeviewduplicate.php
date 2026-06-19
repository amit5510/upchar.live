<!DOCTYPE html>
<html>
<style>
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
  .error valid{
	  color:green!important;
  }
  .tabledataactive{
	  color:green;
  }
  .tabledatainactive{
	  color:red;
  }
  </style>

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
  .mainhead{font-weight:600;margin-bottom:20px;}
  .formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
  .note{font-weight:600;margin-top:10px;margin-bottom:20px;}
  #submit{background:#605ca8;padding: 6px 30px;}
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  </style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<!--there was sidebar -->
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      
		  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
  
<div class="container bg-3 ">  
<br>  
  <br>
  <div class="row text-">
    
	
	<?=$this->session->flashdata('flashmsg');?>
	<h4 style="font-weight:600;margin-bottom:20px;">Duplicate TRAINEE DETAILS</h2>
	<br>
	<form class='formbody'>
	<div class="row mainheadlinefirstrow">
			<div class="col-md-12 mainheadlinefirst">Duplicate Trainee Details</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">DPR<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control dpr input-sm" id="dpr" data-validation="required" data-validation-error-msg="This Field is required" name="dpr">
						<option value="">Select</option>
												<option value="11">DPR DETAILS</option>
												<option value="12">DPR 2018 Test</option>
											</select>
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Center<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control fddicenter input-sm" id="fddicenter" name="fddicenter" data-validation="required" data-validation-error-msg="This Field is required">
						<option value="">Select</option>
						
					</select>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Sub Center<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm fddi_subcenter" id="fddi_subcenter" data-validation="required" data-validation-error-msg="This Field is required" name="fddi_subcenter">
						<option value="">Select</option>
						
					</select>
				  </div>
				</div>
			</div><br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Course<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm" id="coursemenu" name="coursemenu">
						<option value="">Select</option>
						
					</select>
				  </div>
				</div>
			</div>
			
		</div>
		
	</div><br><br><br>
	
	<table class="table table-bordered" id='mydata' style="border:none;">
    <thead>
      <tr>
        <th class="tableheaddata">Trainee ID</th>
        <th class="tableheaddata">Trainee Name</th>
        <th class="tableheaddata">Father Name</th>
        <th class="tableheaddata">DOB</th>
        <th class="tableheaddata">Address</th>
        <th class="tableheaddata">Document No</th>
        <th class="tableheaddata">DPR</th>
        <th class="tableheaddata">Center</th>
        <th class="tableheaddata">Sub Center</th>
        <th class="tableheaddata">Course</th>
      </tr>
    </thead>
    <tbody>
	<?php
	foreach($traineeview->result() as $traineedata){ 
		$dpr=$this->db->get_where('dpr_create',array('dpr_id'=>$traineedata->dpr))->row('dpr_name');
		$center=$this->db->get_where('fddi_center',array('id'=>$traineedata->center))->row('center_name');
		$subcenter=$this->db->get_where('fddi_subcenter',array('subcenter_id'=>$traineedata->subcenter))->row('subcenter_name');
		$course=$this->db->get_where('master_course',array('course_id'=>$traineedata->course))->row('course_name');
	?>
      <tr class="active">
        <td class="tabledata"><?=$traineedata->id?></td>
        <td class="tabledata"><?=$traineedata->t_first_name?></td>
		<td class="tabledata"><?=$traineedata->f_first_name?></td>
        <td class="tabledata"><?=$traineedata->dob?></td>
		<td class="tabledata"><?=$traineedata->address?></td>
        <td class="tabledata"><?=$traineedata->aadhar?></td>
		<td class="tabledata"><?=$dpr?></td>
        <td class="tabledata"><?=$center?></td>
        <td class="tabledata"><?=$subcenter?></td>
        <td class="tabledata"><?=$course?></td>
      </tr>
	<?php } ?>
    </tbody>
  </table>
	
  </div>
</div><br>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

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
