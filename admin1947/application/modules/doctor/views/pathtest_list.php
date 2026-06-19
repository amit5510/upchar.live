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
<!DOCTYPE html>
<html>
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
					<div class="container bg-3 ">
						<?php echo form_open("doctor/pathtest/",'class="form-horizontal formbody" id="search_form" method="get"');  ?>
						<div class="row mainheadlinefirstrow">
							<div class="col-md-12 mainheadlinefirst">Basic Filter
								<a  href="<?php echo base_url();?>doctor/pathtest/add" class="btn btn-info" style="float:right;" id="submit" >Test Add</a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-sm-2 label-name" for="email">Records Per Page</label> 
									<div class="col-sm-2"><?php echo display_record_per_page();?></div>
									<label class="control-label col-sm-1 label-name" for="email">Title</label>
									<div class="col-sm-3">
										<input type="text" class="form-control input-sm" name="title" value="<?php echo $this->input->get_post('title');?>">
									</div>
									<label class="control-label col-sm-1 label-name" for="email"></label>
									<div class="col-sm-3">
										<a  onclick="$('#search_form').submit();" style="padding-top:1px" class="button2 btn-lg btn btn-info" ><span> Search </span></a>
										<?php 
										if( $this->input->get_post('title')!='')
										{ 
											echo anchor("doctor/pathtest/",'<span>Clear Search</span>');    
										} 
										?>
									</div>
								</div>
							</div>
						</div>
						<?php echo form_close();?>
						<div class="row">
							<div class="col-sm-12">
							<?=$this->session->flashdata('flashmsg');?>
							<h4 style="font-weight:600;margin-bottom:20px;"><?php echo $heading_title;?></h2>
							</div>
						</div>
						<?php $att=array('class'=>'form-horizontal form-label-left','name'=>'myform');
						echo form_open_multipart("doctor/pathtest/", $att);?>
						<div class="table-responsive">
							<table class="table table-hover table-bordered table-bordered" id='example' style="border:none;">
								<thead>
									<tr>
										<th><input type="checkbox" style="width:15px;" name="checkall" id="checkall"  onClick="check_uncheck_checkbox(this.checked);"/></th>
										<th class="tableheaddata">Pathology </th>
										<th class="tableheaddata">Category </th>
										<th class="tableheaddata">Test Name</th>
										<th class="tableheaddata">Short Name</th>
										<th class="tableheaddata">Test Type</th>
										<th class="tableheaddata">Sub Category</th>
										<th class="tableheaddata">Method</th>
										<th class="tableheaddata">Report Day</th>
										<th class="tableheaddata">Charge Category</th>
										<th class="tableheaddata">Code</th>
										<th class="tableheaddata">Amount</th>
										<th class="tableheaddata">Parameter</th>
										<th class="tableheaddata">Status</th>
										<th class="tableheaddata">Approved</th>
										<th class="tableheaddata">Date</th>
										<th class="tableheaddata">Action</th>
									</tr>
								</thead>
								<tbody id="tviewtablebody">
									<?php 
									if(is_array($result) && !empty($result))
									{
									foreach($result as $val)
									{ ?>
									<tr>
										<td>
											<input style="width:15px;" type="checkbox" name="arr_ids[]" value="<?php echo $val['test_id'];?>" id="check-all" class="flat">
										</td>
										<td><?php echo $val['pathlab_name']?></td>
										<td><?php echo $val['category_name']?></td>
										<td><?php echo $val['test_name']?></td>
										<td><?php echo $val['short_name']?></td>
										<td><?php echo $val['test_type']?></td>
										<td><?php echo $val['sub_category']?></td>
										<td><?php echo $val['method']?></td>
										<td><?php echo $val['report_day']?></td>
										<td><?php echo $val['charge_category']?></td>
										<td><?php echo $val['code']?></td>
										<td><?php echo $val['amount']?></td>
										<td><a href="<?php echo base_url();?>doctor/pathtest/test_parameter/<?php echo $val['test_id']; ?>" style="color:red;">Add</a></td>
										<td>
											<?php 
											if($val['status']=='1')
											{
												echo'<font color="green">Active</font>';
											}
											else
											{ 
												echo'<font color="red">In Active</font>';
											}
											?>
										</td>
										<td>
										<?php 
										if($val['approved']=='1')
										{
											echo'<font color="green">Yes</font>';
										}
										else
										{	
											echo '<font color="red">No</font>';
										} 
										?>
										</td>
										<td><?php echo formatedate($val['creat_date']) ?></td>
										<td><a href="<?php echo base_url();?>doctor/pathtest/edit/<?php echo $val['test_id']; ?>" style="color:red;">Edit</a></td>
									</tr>
									<?php 
									} 
									}?>
								</tbody>
								<tfoot>
									<tr>
										<th><input type="checkbox" style="width:15px;" name="checkall" id="checkall"  onClick="check_uncheck_checkbox(this.checked);"/></th>
										<th class="tableheaddata">Pathology </th>
										<th class="tableheaddata">Category </th>
										<th class="tableheaddata">Test Name</th>
										<th class="tableheaddata">Short Name</th>
										<th class="tableheaddata">Test Type</th>
										<th class="tableheaddata">Sub Category</th>
										<th class="tableheaddata">Method</th>
										<th class="tableheaddata">Report Day</th>
										<th class="tableheaddata">Charge Category</th>
										<th class="tableheaddata">Code</th>
										<th class="tableheaddata">Amount</th>
										<th class="tableheaddata">Parameter</th>
										<th class="tableheaddata">Status</th>
										<th class="tableheaddata">Approved</th>
										<th class="tableheaddata">Date</th>
										<th class="tableheaddata">Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="row">
							<div class="col-md-7">
								<!--<input name="status_action" style="width: 150px; font-weight: bold;" type="submit" value="Active" class="button2 btn-sm btn btn-success" id="Active" onClick="return validcheckstatus('arr_ids[]','Record','Record','u_status_arr[]');"/>
								<input name="status_action" style="width: 150px; font-weight: bold;" type="submit" value="Deactivate" class="button2 btn-sm btn btn-warning" id="Deactivate" onClick="return validcheckstatus('arr_ids[]','Record','Record','u_status_arr[]');"/>-->
								<input name="status_action" style="width: 150px; font-weight: bold;" type="submit" value="Delete" class="button2 btn-sm btn btn-danger" id="Delete" onClick="return validcheckstatus('arr_ids[]','Record','Record','u_status_arr[]');"/>
							</div>
							<div class="col-md-5">
								<div class="pagination"><?php echo $page_links; ?></div>
							</div>
						</div>
						<?php echo form_close();?>
					</div>
				</section>
			</div>
			<div class="control-sidebar-bg"></div>
			<?php $this->load->view('footer');?>
		</div>
	</body>
</html>
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

