<!DOCTYPE html>
<html>
<style>
.tabledata
{
	border:1px solid #fff!important;
	font-weight:600;
}
.tableheaddata
{
	border:1px solid #fff!important;
	background:#605CA8;
	color:#fff;
}
  
a 
{
    color: #11ff00;
}
.error valid
{
	color:green!important;
}
.tabledataactive
{
	color:green;
}
  .tabledatainactive{
	  color:red;
  }
   table.dataTable tbody tr {
    background-color: #e5e4f1;
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

#reset{background:#fff;color:#000;padding: 6px 30px;}
</style>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<!--there was sidebar -->
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content-header">
				<h1>
					<?php echo $module;?>
					<small>Control panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url();?>masters/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active"><?php echo $module;?></li>
				</ol>
			</section>
			<section class="content">
				<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
				<link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
				<div class="container bg-3 "> 
					<?php $hospital_id = $this->uri->segment(4);
					echo form_open("doctor/clinicreg/hospital_doctor/".$hospital_id."",'class="form-horizontal formbody" id="search_form" method="get"');  ?>
					<div class="row mainheadlinefirstrow">
						<div class="col-md-12 mainheadlinefirst">Basic Filter
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label col-sm-2 label-name" for="email">Records Per Page</label> 
								<div class="col-sm-2"><?php echo display_record_per_page();?></div>
								<label class="control-label col-sm-1 label-name" for="email">Name</label>
								<div class="col-sm-3">
									<input type="text" class="form-control input-sm" name="keyword" value="<?php echo $this->input->get_post('keyword');?>">
								</div>
								<label class="control-label col-sm-1 label-name" for="email"></label>
								<div class="col-sm-3">
									<a  onclick="$('#search_form').submit();" style="padding-top:1px" class="button2 btn-lg btn btn-info" ><span> Search </span></a>
									<?php 
									if($this->input->get_post('keyword')!='' || $this->input->get_post('type')!='')
									{ 
										echo anchor("doctor/clinicreg/hospital_doctor/".$hospital_id."",'<span>Clear Search</span>');    
									} 
									?>
								</div>
							</div>
						</div>
					</div>
					<?php echo form_close();?>
					<div class="row text-">
						<div class="col-sm-12">
							<?=$this->session->flashdata('flashmsg');?>
							<h4 style="font-weight:600;margin-bottom:20px;"><?=$module;?> List</h2>
						</div>
					</div>
					<?php $att=array('class'=>'form-horizontal form-label-left','name'=>'myform');
					echo form_open_multipart("doctor/clinicreg/hospital_doctor/".$hospital_id."", $att);?>
					<div class="table-responsive">
						<table class="table table-hover table-bordered table-bordered" id='neodatatable' style="border:none;">
							<thead>
								<tr>
									<th><input type="checkbox" style="width:15px;" name="checkall" id="checkall"  onClick="check_uncheck_checkbox(this.checked);"/></th>
									<th class="tableheaddata"><?=$module;?> ID</th>
									<th class="tableheaddata">Hospital Name</th>
									<th class="tableheaddata">Doctor Name</th>
									<th class="tableheaddata">City</th>
									<th class="tableheaddata">Email</th>
									<th class="tableheaddata">Mobile</th>
									<th class="tableheaddata">Status</th>
									<th class="tableheaddata">View</th>
								</tr>
							</thead>
							<?php
							if(is_array($doctor) && !empty($doctor))
							{
							foreach($doctor as $val)
							{
							?>
							<tbody>
								<tr>
									<td><input style="width:15px;" type="checkbox" name="arr_ids[]" value="<?php echo $val['id'];?>" id="check-all" class="flat"></td>
									<td class="tableheaddata"><?php echo $val['id']?></td>
									<td class="tableheaddata"><?php echo $val['name']?></td>
									<td class="tableheaddata"><?php echo $val['fname'].' '.$val['lname'];?></td>
									<td class="tableheaddata"><?php echo getCityName($val['city']);?></td>
									<td class="tableheaddata"><?php echo $val['email']?></td>
									<td class="tableheaddata"><?php echo $val['mobile']?></td>
									<td class="tableheaddata"><?php if($val['status']==1){ echo '<font color="green">Accept</font>';}else{ echo '<font color="red">Pending</font>'; }?></td>
									<td class="tableheaddata"><a href="<?php echo base_url().'doctor/clinicreg/doctor_fee_time/'.$val['id']?>" >Doctor Fee & Time <a></td>
								</tr>
							</tbody>
							<?php 
							}
							}
							?>
							<tfoot>
							  <tr>
								<th><input type="checkbox" style="width:15px;" name="checkall" id="checkall"  onClick="check_uncheck_checkbox(this.checked);"/></th>
								<th class="tableheaddata"><?=$module;?> ID</th>
								<th class="tableheaddata">Hospital Name</th>
								<th class="tableheaddata">Doctor Name</th>
								<th class="tableheaddata">City</th>
								<th class="tableheaddata">Email</th>
								<th class="tableheaddata">Mobile</th>
								<th class="tableheaddata">Status</th>
								<th class="tableheaddata">View</th>
							  </tr>
							</tfoot>
						</table>
					</div>
					<div class="row">
						<div class="col-md-7">
							<input name="status_action" style="width: 150px; font-weight: bold;" type="submit" value="Activate" class="button2 btn-sm btn btn-success" id="Active" onClick="return validcheckstatus('arr_ids[]','Request Accept','Record','u_status_arr[]');"/>
							<input name="status_action" style="width: 150px; font-weight: bold;" type="submit" value="Deactivate" class="button2 btn-sm btn btn-warning" id="Deactivate" onClick="return validcheckstatus('arr_ids[]','Request Accept','Record','u_status_arr[]');"/>
							<input name="status_action" style="width: 150px; font-weight: bold;" type="submit" value="Delete" class="button2 btn-sm btn btn-danger" id="Delete" onClick="return validcheckstatus('arr_ids[]','Request Accept','Record','u_status_arr[]');"/>
						</div>
						<div class="col-md-5">
							<div class="pagination"><?php echo $page_links; ?></div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php $this->load->view('footer');?>
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->
</body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
function check_uncheck_checkbox(isChecked) 
{
	if(isChecked) {
		$('input[name="arr_ids[]"]').each(function() { 	this.checked = isChecked; });
	}else{
		$('input[name="arr_ids[]"]').each(function() { 	this.checked = isChecked; });
	}
}
function validcheckstatus(name,action,text)
{
	var chObj	=	document.getElementsByName(name);
	var result	=	false;	
	for(var i=0;i<chObj.length;i++){
	
		if(chObj[i].checked){
		  result=true;
		  break;
		}
	}
	if(!result){
		 alert("Please select atleast one "+text+" to "+action+".");
		 return false;
	}else if(action=='delete'){
			 if(!confirm("Are you sure you want to delete this.")){
			   return false;
			 }else{
				return true;
			 }
	}else{
		return true;
	}
}
</script>
