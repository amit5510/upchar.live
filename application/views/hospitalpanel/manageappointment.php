<head>
</head>
<?php include ("assets/includes/header_hospital.php"); ?>
<?php include ("assets/includes/leftmenu_hospital.php"); ?>
<div class="pag_cstm">
    <div class="row">
        <div class="col-lg-12">
            <div class="pag_cstm_panel">
				<div class="pag_cstm_panel_panel_ontent p-t-0">
                    <div class="row paddb40">
						<div class="col-sm-12 processsstep2">
							<a href='<?=base_url();?>hospitalpanel/addappointment'><button type='submit' name='submit' style="letter-spacing: 1px;text-shadow: 3px -1px 2px #666;font-weight:900;color:white;background:#1fc61f;padding:9px 23px;border-radius: 23px;float: right;border:none;">Add Appointment</button></a>
							<h4>Manage Appointment</h4>
						</div>
						<div class="row paddb40">
                            <div class="col-sm-12 processsstep2">
								<?php echo form_open("hospitalpanel/manageappointment/",'class="form-horizontal formbody" id="search_form" method="get"');  ?>
									<div class="col-md-3">
										<select style="border-radius: 23px;padding:0px 23px;"  name='day_category' class="form-control">
											<option value="">Select</option>
											<option <?php if($this->input->get_post('day_category')=='Today'){ echo "selected"; }?> value="Today">Today</option>
											<option <?php if($this->input->get_post('day_category')=='Upcomming'){ echo "selected"; }?> value="Upcomming">Upcomming</option>
										</select>
									</div>
									<div class="col-md-3">
										<input style="border-radius: 23px;padding:0px 23px;" name='date_from' value="<?php echo $this->input->get_post('date_from')?>" placeholder="From Date" >
									</div>
									<div class="col-md-3">
										<input style="border-radius: 23px;padding:0px 23px;" name='date_to' placeholder="To Date" value="<?php echo $this->input->get_post('date_to')?>" >
									</div>
									<div class="col-md-2">
										<a  onclick="$('#search_form').submit();" style="letter-spacing: 1px;text-shadow: 3px -1px 2px #666;font-weight:900;color:white;background:#1fc61f;padding:9px 23px;border-radius: 23px;float: right;border:none;" class="btn btn-success btn-md"><span> Search </span></a>
									</div>
									<div class="col-sm-1 col-xs-12">
										<?php 
										if( $this->input->get_post('day_category')!='' || $this->input->get_post('date_from')!='' || $this->input->get_post('date_to')!='' )
										{ 
											echo anchor("hospitalpanel/manageappointment/",'<span>Clear Search</span>'); 	  
										} 
										?>
									</div>
								<?php echo form_close();?>
								<div class="col-sm-12 processsstep2">
									<div class="table-responsive">
										<?php 
										$att=array('class'=>'form-horizontal form-label-left','name'=>'myform');
										echo form_open_multipart("hospitalpanel/manageappointment/", $att);?> 
										<table id="datatable" class="table table-bordered" style="width:100%">
											<thead style="color:white;">
												<tr>
													<th><input type="checkbox" style="width:15px;" name="checkall" id="checkall"  onClick="check_uncheck_checkbox(this.checked);"/></th>
													<th>Appoint. Id</th>
													<th>Doctor Name</th>
													<th>Paient Name</th>
													<th>Mobile</th>
													<th>Appointment Date</th>
													<th>Appointment Time</th>
													<th>Appointment Fee</th>
													<th>Payment Status</th>
													<th>Appointment Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody style="color:white;">
												<?php 
												foreach($appointments as $p)
												{ 
												echo"<tr>";
												?>
												<td>
													<input style="width:15px;" type="checkbox" name="arr_ids[]" value="<?php echo $p->appointment_id;?>" id="check-all" class="flat">
												</td>
												<?php
												echo"<td>".$p->appointment_id."</td>";
												echo"<td>";?><a style='color:white;' href='<?=base_url();?>doctor/<?=$p->doctor_id;?>' target="_blank"><?=prefixdr($p->fname).' '.$p->lname;?></a></td>
												<?php echo"<td>".$p->patient_name."</td>";
												echo"<td>".$p->appointment_mobile."</td>";
												echo"<td>".$p->appointment_date."</td>";
												echo"<td>".$p->from_timing.' - '.$p->to_timing."</td>";
												echo"<td>";?>Paid <?=$p->amount;?> ₹.<?php echo "</td>";
												echo"<td>";?> <a style="float: right;background: #15ab3c;padding: 3px 16px;color: white;font-weight: bold;border-radius: 4px;box-shadow: 0px -1px 4px #0c6824;" href="#" style="float:right;"> <?php if($p->payment_status=='DONE'){echo "<span style='color: red'>Paid</span>";}else if($p->payment_status=='UNPAID'){echo'Not Paid';} echo "</a></td>";
												echo"<td>";?> <a style="float: right;background: #15ab3c;padding: 3px 16px;color: white;font-weight: bold;border-radius: 4px;box-shadow: 0px -1px 4px #0c6824;" href="#" style="float:right;"> <?php if($p->appointment_status=='1'){echo "<span style='color: red'>Done</span>";}else if($p->appointment_status=='0'){echo'Pendding';} echo "</a></td>";
												echo"<td>";?><a style='color:red;' href='<?=base_url();?>patient/<?=$p->appointment_id;?>'>Update</a></td>
												<?php echo"</tr>";
												}
												?>
											</tbody>
										</table>
									</div>
                                </div>
								<div class="col-md-7 processsstep2">
									<input name="status_action" style="width: 150px; font-weight: bold;" type="submit" value="Payment Done" class="button2 btn-sm btn btn-success" id="Payment" onClick="return validcheckstatus('arr_ids[]','Payment Done','Record','u_status_arr[]');"/>
									<input name="status_action" style="width: 150px; font-weight: bold;" type="submit" value="Appointment Done" class="button2 btn-sm btn btn-success" id="Appointment" onClick="return validcheckstatus('arr_ids[]','Appointment Done','Record','u_status_arr[]');"/>
								</div>
								<div class="col-md-5 processsstep2">
									<div class="pagination"><?php echo $page_links; ?></div>
								</div>
                            </div>
						</div>
						<?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ("assets/includes/footer_hospital.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
