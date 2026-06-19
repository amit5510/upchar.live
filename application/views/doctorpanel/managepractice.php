<head>
<style>
	.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
cursor: default;
color: #fff !important;
border: 1px solid transparent;
background: red !important;
margin-top:10px;
}
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
color: white !important;
}
.input, button, input, optgroup, select, textarea {
color: black !important;
font: inherit;
margin: 0;
}
</style>
</head>
<?php include ("assets/includes/header.php"); ?>
<?php include ("assets/includes/leftmenu.php"); ?>
<div class="pag_cstm">
	<div class="row">
		<div class="col-lg-12">
			<div class="pag_cstm_panel" style="background: #295771;color:white;">
				<div class="pag_cstm_panel_panel_ontent p-t-0">
					<div class="row paddb40">
						<h4 class="PageTitle">Manage Practice </h4>
						<div class="col-sm-12 processsstep2">
							<a href='<?=base_url();?>addpractice'><button style="color: white !important;" type='submit' name='submit' class="continue2">Add Practice</button></a>
						</div>
						<?php 
						$att=array('class'=>'form-horizontal form-label-left','name'=>'myform');
						echo form_open_multipart("managepractice/", $att);?> 
						<div class="col-sm-12 processsstep2">
							<div class="table-responsive">
								<table id="datatable" class="display" style="width:100%">
									<thead style="color:white;">
										<tr>
											<th><input type="checkbox" style="width:15px;" name="checkall" id="checkall"  onClick="check_uncheck_checkbox(this.checked);"/></th>
											<th>Name</th>
											<th>Address</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($clinic as $p){ ?>
										<tr>
											<td>
												<input style="width:15px;" type="checkbox" name="arr_ids[]" value="<?php echo $p->practice_id;?>" id="check-all" class="flat">
											</td>
											<td> <?=$p->name;?></td>
											<td><?=$p->address;?></td>
											<td><?php if($p->practice_status=='1'){ echo '<a style="float: right;background: #15ab3c;padding: 3px 16px;color: white;font-weight: bold;border-radius: 4px;box-shadow: 0px -1px 4px #0c6824;" href="#" style="float:right;"><span >Accept</span></a>'; }else if($p->practice_status=='0'){ echo'<a style="float: right;background: #f0ad4e;padding: 3px 16px;color: white;font-weight: bold;border-radius: 4px;box-shadow: 0px -1px 4px #0c6824;" href="#" style="float:right;"><span>Pendding</span></a>'; } ?></td>
											<td><a href='profile_consultant_fee/<?=mybase64_encode($p->practice_id);?>'>Update</a></td>
										</tr>
										<?php } ?>
										<?php foreach($hospital as $p){ ?>
										<tr>
											<td>
												<input style="width:15px;" type="checkbox" name="arr_ids[]" value="<?php echo $p->practice_id;?>" id="check-all" class="flat">
											</td>
											<td><?=$p->name;?></td>
											<td><?=$p->address;?></td>
											<td><?php if($p->practice_status=='1'){ echo '<a style="float: right;background: #15ab3c;padding: 3px 16px;color: white;font-weight: bold;border-radius: 4px;box-shadow: 0px -1px 4px #0c6824;" href="#" style="float:right;"><span >Accept</span></a>'; }else if($p->practice_status=='0'){ echo'<a style="float: right;background: #f0ad4e;padding: 3px 16px;color: white;font-weight: bold;border-radius: 4px;box-shadow: 0px -1px 4px #0c6824;" href="#" style="float:right;"><span>Pendding</span></a>'; } ?></td>
											<td><a href='profile_consultant_fee/<?=mybase64_encode($p->practice_id);?>'>Update</a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>  
							</div>
						</div>
						<div class="col-md-7 processsstep2">
							<input name="status_action" style="width: 150px; font-weight: bold;" type="submit" value="Request-Accept" class="button2 btn-sm btn btn-success" id="Request-Accept" onClick="return validcheckstatus('arr_ids[]','Request Accept','Record','u_status_arr[]');"/>
							<input name="status_action" style="width: 150px; font-weight: bold;" type="submit" value="Request-Reject" class="button2 btn-sm btn btn-warning" id="Request-Reject" onClick="return validcheckstatus('arr_ids[]','Request Accept','Record','u_status_arr[]');"/>
							
						</div>
						<div class="col-md-5 processsstep2">
							<div class="pagination"><?php //echo $page_links; ?></div>
						</div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include ("assets/includes/footer.php"); ?>
<link rel="stylesheet" type="text/css"  href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css'>
<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
<script>
$(document).ready(function() {
	$('#datatable').DataTable();
} );
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