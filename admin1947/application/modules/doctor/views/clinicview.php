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
					<?php echo form_open("doctor/clinicreg/viewclinic",'class="form-horizontal formbody" id="search_form" method="get"');  ?>
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
								<label class="control-label col-sm-1 label-name" for="email"></label>
								<div class="col-sm-3">
									<a  onclick="$('#search_form').submit();" style="padding-top:1px" class="button2 btn-lg btn btn-info" ><span> Search </span></a>
									<?php 
									if($this->input->get_post('keyword')!='' || $this->input->get_post('type')!='')
									{ 
										echo anchor("doctor/clinicreg/viewclinic/",'<span>Clear Search</span>');    
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
					echo form_open_multipart("users/viewclinic/", $att);?>
					<div class="table-responsive">
						<table class="table table-hover table-bordered table-bordered" id='neodatatable' style="border:none;">
							<thead>
							  <tr>
								<th class="tableheaddata"><?=$module;?> ID</th>
								<th class="tableheaddata">Name</th>
								<th class="tableheaddata">City</th>
								<th class="tableheaddata">Email</th>
								<th class="tableheaddata">Mobile</th>
								<th class="tableheaddata">Subscription</th>
								<th class="tableheaddata">Reg. Date</th>
								<th class="tableheaddata">Actions</th>
							  </tr>
							</thead>
							<?php
							if(is_array($clinic) && !empty($clinic))
							{
							foreach($clinic as $val)
							{
								
							$update="<a href='".base_url()."doctor/clinicreg/updatehospital/".$val['id']."' data-did=\"".$val['id']."\"><span class='glyphicon glyphicon-edit'></span></a> ";
					
							//$update="<a href=\"#\" data-upcahr-did=\"".$rowdata->id."\">Update</a> ";
							$View="<a href='".base_url()."doctor/clinicreg/clinicview/".$val['id']."' data-did=\"".$val['id']."\"><span class='glyphicon glyphicon-eye-open'></span></a> ";
							$delete="<a href='".base_url()."doctor/clinicreg/delete_clinic/".$val['id']."' data-did=\"".$val['id']."\"><span class='glyphicon glyphicon-trash'></span></a> ";
				
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
									<td class="tableheaddata"><?php echo $val['name']?></td>
									<td class="tableheaddata"><?php echo getCityName($val['city']);?></td>
									<td class="tableheaddata"><?php echo $val['email']?></td>
									<td class="tableheaddata"><?php echo $val['mobile']?></td>
									<td class="tableheaddata"><?php if($val['subscription']=='0'){ echo "Basic (Free)";}else{ echo "Premium (Paid)"; }?></td>
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
									<th class="tableheaddata"><?=$module;?> ID</th>
									<th class="tableheaddata">Name</th>
									<th class="tableheaddata">City</th>
									<th class="tableheaddata">Email</th>
									<th class="tableheaddata">Mobile</th>
									<th class="tableheaddata">Reg. Date</th>
									<th class="tableheaddata">Subscription</th>
									<th class="tableheaddata">Actions</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="row">
						<div class="col-md-5">
							<!--<input name="status_action" style="width: 150px; font-weight: bold;" type="submit" value="Active" class="button2 btn-sm btn btn-success" id="Active" onClick="return validcheckstatus('arr_ids[]','Record','Record','u_status_arr[]');"/>
							<input name="status_action" style="width: 150px; font-weight: bold;" type="submit" value="Deactivate" class="button2 btn-sm btn btn-warning" id="Deactivate" onClick="return validcheckstatus('arr_ids[]','Record','Record','u_status_arr[]');"/>
							<input name="status_action" style="width: 150px; font-weight: bold;" type="submit" value="Delete" class="button2 btn-sm btn btn-danger" id="Delete" onClick="return validcheckstatus('arr_ids[]','Record','Record','u_status_arr[]');"/>
							-->
						</div>
						<div class="col-md-7">
							<div class="pagination"><?php echo $page_links; ?></div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<!-- /.content-wrapper -->
		<?php $this->load->view('footer');?>
		<div class="control-sidebar-bg"></div>
	</div>
</body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () 
{
	/* $(".listingdpr, .listingcenter, .listingsubcenter, .listingcourse").change(function(){

			$('#neodatatable').DataTable().draw();
		
	}); */

	/*$('#neodatatable').DataTable({
		"ordering": false,
		"processing": true,
		"serverSide": true,
		"ajax": {
			url: '<?=base_url();?>others/data_view/<?=$module;?>view',
			type: 'POST',
			data: function(d){
				d.dpr = $(".listingdpr").val()
				d.center = $(".listingcenter").val()
				d.subcenter = $(".listingsubcenter").val()
				d.course = $(".listingcourse").val() 
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
		var uri='<?=base_url()?>doctor/clinicreg/<?=$module;?>approve';
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
		var uri='<?=base_url()?>doctor/clinicreg/<?=$module;?>verify';
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
	
	
  