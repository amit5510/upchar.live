<!DOCTYPE html>
<html>
<style>
.tabledata{
  border:1px solid #fff!important;
  font-weight:600;
}
a {
color: #11ff00;
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
		<div class="content-wrapper">
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
					<?php echo form_open("doctor/doctorview",'class="form-horizontal formbody" id="search_form" method="get"');  ?>
					<div class="row mainheadlinefirstrow">
						<div class="col-md-12 mainheadlinefirst">Basic Filter
							<a  href="<?php echo base_url();?>doctor/clinicreg/add" class="btn btn-info" style="float:right;" id="submit" >Add Clinic</a>
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
								<label class="control-label col-sm-1 label-name" for="email">Mobile</label>
								<div class="col-sm-3">
									<input type="text" class="form-control input-sm" name="mobile" value="<?php echo $this->input->get_post('mobile');?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-1 label-name" for="email">City</label>
								 <div class="col-sm-3">
									<select class="form-control input-sm"  name="city_name">
									  <option value="">Select City</option>
									  <?php 
									  if(is_array($city) && !empty($city)){
									  foreach ($city as $key => $value) {?>
									  <option value="<?php echo $value['id']; ?>" <?php if($this->input->get_post('city_name')==$value['id']){ echo "selected"; } ?>><?php echo $value['name']; ?></option>
									<?php } } ?>
									</select>
								  </div>
								<label class="control-label col-sm-1 label-name" for="email"></label>
								<div class="col-sm-3">
									<a  onclick="$('#search_form').submit();" style="padding-top:1px" class="button2 btn-lg btn btn-info" ><span> Search </span></a>
									<?php 
									if($this->input->get_post('keyword')!='' || $this->input->get_post('mobile')!='' || $this->input->get_post('city_name')!='')
									{ 
										echo anchor("doctor/doctorview/",'<span>Clear Search</span>');    
									} 
									?>
								</div>
							</div>
						</div>
					</div>
					<?php echo form_close();?>
					<?=$this->session->flashdata('flashmsg');?>
					<h4 style="font-weight:600;margin-bottom:20px;">Doctor List</h2>
					<div class="table-responsive">
						<table class="table table-hover table-bordered table-bordered" id='neodatatable' style="border:none;">
							<thead>
								<tr>
									<th class="tableheaddata">Doctor ID</th>
									<th class="tableheaddata">Name</th>
									<th class="tableheaddata">City</th>
									<th class="tableheaddata">Email</th>
									<th class="tableheaddata">Mobile</th>
									<th class="tableheaddata">Reg. Date</th>
									<th class="tableheaddata">Actions</th>
								</tr>
							</thead>
							<?php
							if(is_array($doctor) && !empty($doctor))
							{
							foreach($doctor as $val)
							{
								$delete="<a href=\"".base_url()."doctor/doctorview/deletedoctor/".$val['id']."\" data-upcahr-did=\"".$val['id']."\"><span class='glyphicon glyphicon-trash'></span></a> ";
								$update="<a href=\"".base_url()."doctor/doctorview/updatedoctor/".$val['id']."\" data-upcahr-did=\"".$val['id']."\"><span class='glyphicon glyphicon-edit'></span></a> ";
								$View="<a href=\"".base_url()."doctor/doctorview/viewdoctor/".$val['id']."\" data-upcahr-did=\"".$val['id']."\"><span class='glyphicon glyphicon-eye-open'></span></a> ";
										
								if($val['approved'])
									$approval="<a class='actionapprove' style='color:#097d0d;cursor:pointer;' data-upcahr-did='".$val['id']."'>Approved</a> ";
								else
									$approval="<a class='actionapprove' style='color:#f00;cursor:pointer;' data-upcahr-did='".$val['id']."'>Not Approved</a>  ";
								if($val['verified'])
									$verification="<a class='actionverify' style='color:#097d0d;cursor:pointer;' data-upcahr-did='".$val['id']."'>Verified</a> ";
								else
									$verification="<a class='actionverify' style='color:#f00;cursor:pointer;' data-upcahr-did='".$val['id']."'>Not Verified</a> ";
								 $action="$update | $verification | $approval | $View | $delete";
							
							?>
							<tbody>
								<tr>
									<td class="tableheaddata"><?php echo $val['id']?></td>
									<td class="tableheaddata"><?php echo $val['fname']?></td>
									<td class="tableheaddata"><?php echo getCityName($val['city']);?></td>
									<td class="tableheaddata"><?php echo $val['email']?></td>
									<td class="tableheaddata"><?php echo $val['mobile']?></td>
									<td class="tableheaddata"><?php echo $val['creat_date']?></td>
									<td class="tableheaddata"><?php echo $action;?></td>
								</tr>
							</tbody>
							<?php 
							}
							}
							?>
							<tfoot>
								<tr>
									<th class="tableheaddata">Doctor ID</th>
									<th class="tableheaddata">Name</th>
									<th class="tableheaddata">City</th>
									<th class="tableheaddata">Email</th>
									<th class="tableheaddata">Mobile</th>
									<th class="tableheaddata">Reg. Date</th>
									<th class="tableheaddata">Actions</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="row">
						<div class="col-md-5">
							<a class="pull-right btn btn-warning btn-large" href="<?php echo base_url(); ?>doctor/doctorview/createExcel?keyword=<?php echo $this->input->get_post('keyword');?>&mobile=<?php echo $this->input->get_post('mobile');?>&city_name=<?php echo $this->input->get_post('city_name');?>"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
						</div>
						<div class="col-md-7">
							<div class="pagination"><?php echo $page_links; ?></div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php $this->load->view('footer');?>
		<div class="control-sidebar-bg"></div>
	</div>
</body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () 
{
	/*$('#neodatatable').DataTable({
		"ordering": false,
		"processing": true,
		"serverSide": true,
		"ajax": {
			url: '<?=base_url();?>others/data_view/doctorview',
			type: 'POST',
			data: function(d){
				
			}
		},
		columnDefs: [
			{ targets: [0, 1], orderable: false},
		]
	});*/
		
			
	$("#neodatatable").on('click','.actionapprove',function(e)
	{
		e.preventDefault();
		var $t = $(this);
		var key=$(this).attr('data-upcahr-did');	
		var uri='<?=base_url()?>doctor/doctorview/approve';
		$.ajax({
			 type:"post", 
			 url: uri,
			 dataType:'json',
			 data:{did:key},
			 success: function(result){
				
				 if(result['status'] == 1)
				 {
					  $t.css('color','#097d0d')
					$t.text('Approved')
				 }else if(result['status'] == 0){
					 $t.css('color','#f00')
					  $t.css('color','Not Approved')
				 }else{
					 alert('Something went wrong');
				 }
			 }
		 });
	});
				
	$("#neodatatable").on('click','.actionverify',function(e)
	{
		e.preventDefault();
		var $t = $(this);
		var key=$(this).attr('data-upcahr-did');	
		var uri='<?=base_url()?>doctor/doctorview/verify';
		$.ajax({
			 type:"post", 
			 url: uri,
			 dataType:'json',
			 data:{did:key},
			 success: function(result){
				
				 if(result['status'] == 1)
				 {
					  $t.css('color','#097d0d')
					$t.text('Verified')
				 }else if(result['status'] == 0){
					 $t.css('color','#f00')
					  $t.css('color','Not Verified')
				 }else{
					 alert('Something went wrong');
				 }
			 }
		 });
	});
});
</script>