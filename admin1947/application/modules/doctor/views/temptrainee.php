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
	<h4 style="font-weight:600;margin-bottom:20px;">Partial Enrolled Trainee</h2>
	<button class="btn btn-success btn-sm" style="float:right;margin-top:-40px;">Sync/Update From NIC</button>
	<br>
	
	<table class="table table-bordered" id='mydata' style="border:none;">
    <thead>
      <tr>
        <th class="tableheaddata">Temp Trainee ID</th>
        <th class="tableheaddata">Trainee Name</th>
        <th class="tableheaddata">Father Name</th>
        <th class="tableheaddata">DOB</th>
        <th class="tableheaddata">Aadhar</th>
        <th class="tableheaddata">Center</th>
        <th class="tableheaddata">Sub Center</th>
        <th class="tableheaddata">Action</th>
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
        <td class="tabledata"><?=$traineedata->aadhar?></td>
        <td class="tabledata"><?=$center?></td>
        <td class="tabledata"><?=$subcenter?></td>
		
		<td class="tabledata"><a href="<?=base_url()?>trainee/traineereg" style="font-weight: 600;color: #de0808;">Enroll</a></td>
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
