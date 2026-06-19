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
  .error valid{
    color:green!important;
  }
  .tabledataactive{
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
					<!--<form class="form-horizontal formbody" id='mainform' action="<?=base_url()?>doctor/appointment/upcomming" method="get" enctype="multipart/form-data">-->
					<?php echo form_open("doctor/appointment/todayappointment/",'class="form-horizontal formbody" id="search_form" method="get"');  ?>
					<div class="row mainheadlinefirstrow">
						<div class="col-md-12 mainheadlinefirst">Basic Filter
							<a  href="<?php echo base_url();?>doctor/appointment/addappointment" class="btn btn-info" style="float:right;" id="submit" >Add Appointment</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label col-sm-1 label-name" for="email">Records Per Page</label> 
								<div class="col-sm-3"><?php echo display_record_per_page();?></div>
							  <label class="control-label col-sm-1 label-name" for="email">Hospital Name</label>
							  <div class="col-sm-3">
								<input type="text" class="form-control input-sm" name="hospital_name" value="<?php echo $this->input->get_post('hospital_name');?>">
							  </div>
							  <label class="control-label col-sm-1 label-name" for="email">Doctor Name</label>
							  <div class="col-sm-3">
								<input type="text" class="form-control input-sm"  name="doctor_name" value="<?php echo $this->input->get_post('doctor_name');?>">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-sm-1 label-name" for="email">Paient Name</label>
							  <div class="col-sm-3">
								<input type="text" class="form-control input-sm"  name="paient_name" value="<?php echo $this->input->get_post('paient_name');?>">
							  </div>
							  <label class="control-label col-sm-1 label-name" for="email">Patient Phone</label>
							  <div class="col-sm-3">
								<input type="text" class="form-control input-sm"  name="paient_phone" value="<?php echo $this->input->get_post('paient_phone');?>">
							  </div>
							  <label class="control-label col-sm-1 label-name" for="email">Patient Email</label>
							  <div class="col-sm-3">
								<input type="text" class="form-control input-sm"  name="paient_email" value="<?php echo $this->input->get_post('paient_email');?>">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-sm-1 label-name" for="email">Appointment. Id</label>
							  <div class="col-sm-3">
								<input type="text" class="form-control input-sm"  name="appointment_id" value="<?php echo $this->input->get_post('appointment_id');?>">
							  </div>
							  <label class="control-label col-sm-1 label-name" for="email">Date From</label>
							  <div class="col-sm-3">
								<input type="text" class="form-control datepicker"  name="date_from" value="<?php echo $this->input->get_post('date_from');?>" onkeypress="return isNumber(event)" data-validation="required"
								data-validation-error-msg="This Field is required">
							  </div>
							  <label class="control-label col-sm-1 label-name" for="email">Date To</label>
							  <div class="col-sm-3">
								<input type="text" class="form-control datepicker"  name="date_to" value="<?php echo $this->input->get_post('date_to');?>" onkeypress="return isNumber(event)" data-validation="required"
								data-validation-error-msg="This Field is required">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-sm-1 label-name" for="email"></label>
							  <div class="col-sm-3">
								 <a  onclick="$('#search_form').submit();" style="padding-top:1px" class="btn btn-info"><span> Search </span></a>
								 <?php 
								 if( $this->input->get_post('hospital_name')!=''||  $this->input->get_post('paient_name')!='' ||  $this->input->get_post('paient_email')!='' ||  $this->input->get_post('paient_phone')!='' ||  $this->input->get_post('appointment_id')!='' ||  $this->input->get_post('date_from')!='' ||  $this->input->get_post('date_to')!='' ||  $this->input->get_post('time_from')!='' ||  $this->input->get_post('time_to')!='' ||  $this->input->get_post('doctor_name')!='' )
								  { 
									echo anchor("doctor/appointment/todayappointment/",'<span>Clear Search</span>');    
								  } 
								?>
							  </div>
							</div>
						</div>
					</div>
					<?php echo form_close();?>
					<div class="row">
						<div class="col-sm-12">
							<h4 style="font-weight:600;margin-bottom:20px;"><?php echo $heading_title;?></h2>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table table-hover table-bordered table-bordered" id='example'>
							<thead>
								<tr>
									<th class="tableheaddata">ID</th>
									<th class="tableheaddata">Date</th>
									<th class="tableheaddata">Name</th>
									<th class="tableheaddata">Email</th>
									<th class="tableheaddata">Mobile</th>
									<th class="tableheaddata">Hospital Name</th>
									<th class="tableheaddata">Doctor Name</th>
									<th class="tableheaddata">Payment Status</th>
									<th class="tableheaddata">Appointment Status</th>
									<th class="tableheaddata">View Profile</th>
								</tr>
							</thead>
							<tbody id="tviewtablebody">
								<?php 
								if(is_array($data) && !empty($data)){
								foreach($data as $p)
								{
									echo"<tr>";
									echo"<td>".$p->appointment_id."</td>";
									echo"<td>".$p->appointment_date."</td>";
									echo"<td>".$p->appointment_name."</td>";
									echo"<td>".$p->appointment_email."</td>";
									echo"<td>".$p->appointment_mobile."</td>";
									echo "<td>".$p->name."</td>";
									echo "<td>".$p->fname."</td>"; ?>
									<td><span style="color:red;"> <?php echo $p->payment_status ?> </span></td>
									<td><?php if($p->appointment_status=='0'){ echo '<span style="color:red;">Pending</span>'; } else{ echo '<span style="color:green;">Done</span>'; } ?></td>
									<?php echo "<td><a href='data?appointment_id=".$p->appointment_id."' style=color:red;>View Profile</a></td>";
									echo"</tr>";
								}
								}else{
								?>
								<td colspan="10"><center>No Record Found!</center></td>
								<?php }?>
							</tbody>
							<tfoot>
								<tr>
									<th class="tableheaddata">ID</th>
									<th class="tableheaddata">Date</th>
									<th class="tableheaddata">Name</th>
									<th class="tableheaddata">Email</th>
									<th class="tableheaddata">Mobile</th>
									<th class="tableheaddata">Hospital Name</th>
									<th class="tableheaddata">Doctor Name</th>
									<th class="tableheaddata">Payment Status</th>
									<th class="tableheaddata">Appointment Status</th>
									<th class="tableheaddata">View Profile</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="row">
						<div class="col-md-6">
							<!--<input name="status_action" type="submit" class="button2 btn-sm btn btn-danger" id="Delete" value="Delete" onclick="return validcheckstatus('arr_ids[]','delete','Record');"/>-->
						</div>
						<div class="col-md-6">
							<div class="pagination"><?php echo $page_links; ?></div>
						</div>
					</div>
				</div>
			</section>
		</div><br>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<!-- /.content -->
	</div>
<?php $this->load->view('footer');?>
<div class="control-sidebar-bg"></div>
<!-- ./wrapper -->
</body>
</html>
