<?php include ("assets/includes/header_pathlab.php"); ?>
<?php include ("assets/includes/leftmenu_pathlab.php"); ?>
<style>
.docimg {
	margin-bottom: 30px;
	height: 134px;
	border-radius: 14px;
	box-shadow: 0px -5px 4px -1px #848181;
	width: 122px;
}
.doc_nam_inf ul li {
	font-size: 13px;
	/*color: #868686;
	 letter-spacing: 0.8px; */
	list-style: none;
	line-height: 20px;
}
.right_box {
	padding: 13px 0px;
	margin-top: 10px;
	margin-bottom: 10px;
	border-bottom: 1px solid #e8e8e8;
}
								
.right_box img {
border-radius: 8px;
}
.doc_nam_inf span {
	font-size: 12px;
	color: #9bc03c;
	letter-spacing: 0.8px;
	font-size: 16px;
	font-weight: 600;
	font-family: 'Lato', sans-serif;
}
.doc_nam_inf ul {
	margin-top: 4px;
}
</style>
<div class="pag_cstm">
    <div class="row">
		<div class="col-lg-12">
            <div class="pag_cstm_panel" style="background:#295771;">
                <div class="pag_cstm_panel_panel_ontent p-t-0">
					<div class="row paddb40">
						<h4 class="colorwhite" style="font-weight:bold;padding:4px 17px">Booking Details</h4>
                        <?php echo form_open_multipart("pathlabpanel/book_test", 'class="form-horizontal form-label-left" id="form"');?>
						<div class="col-sm-12">
							<?=$this->session->flashdata('flashmsg');?>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12 padding0">                    
								<label class="colorwhite">Pathology</label> <label style="color:red;"> *</label>
								<input type="text" name="pathlab_name" readonly  id='pathlab_name' placeholder="Pathology Name"  value="<?php echo set_value('pathlab_name',$booking['pathlab_name']);?>" class="form-control">	
								<span style="color:red;"><?php echo form_error('pathlab_name');?></span>
							</div>
						</div>	
						<div class="col-sm-6">
							<div class="col-sm-12 padding0">                    
								<label class="colorwhite">City Name</label> <label style="color:red;"> *</label>
								<input type="text" name="city_name" readonly  id='city_name' placeholder="City Name"  value="<?php echo set_value('city_name',$booking['city_name']);?>" class="form-control">	
								<span style="color:red;"><?php echo form_error('city_name');?></span>
							</div>
						</div>	
						<div class="col-sm-6">
							<div class="col-sm-12 padding0"  >
								<label class="colorwhite">Patient Name</label>
								<input type="text"  id='patient_name' readonly name="patient_name" class="form-control2" value="<?php echo set_value('patient_name',$booking['patient_name']); ?>"  >
								<span style="color:red;"><?php echo form_error('patient_name');?></span>
							</div>
						</div>	
						<div class="col-sm-6">
							<div class="col-sm-12 padding0"  >
								<label class="colorwhite">Patient Mobile</label> <label style="color:red;"> *</label>
								<input type="text" readonly  id='patient_mobile' name="patient_mobile" class="form-control2" value="<?php echo set_value('patient_mobile',$booking['patient_mobile']); ?>"  >
								<span style="color:red;"><?php echo form_error('patient_mobile');?></span>
							</div>
						</div>	
						<div class="col-sm-6">
							<div class="col-sm-12 padding0"  >
								<label class="colorwhite">Patient Email</label> <label style="color:red;"> *</label>
								<input type="text" readonly id='patient_email'  name="patient_email" class="form-control2" value="<?php echo set_value('patient_email',$booking['patient_email']); ?>"  >
								<span style="color:red;"><?php echo form_error('patient_email');?></span>
							</div>
						</div>	
						
						<div class="col-sm-12 processsstep2">
							<div class="table-responsive">
								<table id="datatable" class="table table-bordered" style="width:100%">
									<thead style="color:white;">
										<tr>
											<th>Sr. No.</th>
											<th>Test Name</th>
											<th>Test Short Name</th>
											<th>Method</th>
											<th>Amount</th>
										</tr>
									</thead>
									<tbody style="color:white;">
										<?php $i=1;
										if(is_array($booking_test) && !empty($booking_test))
										{
										foreach($booking_test as $val)
										{ 
										echo"<tr>";
										?>
										<td>
											<?php echo $i; ?>
										</td>
										<?php echo"<td>".$val['test_name']."</td>";
										echo"<td>".$val['short_name']."</td>";
										echo"<td>".$val['method']."</td>";
										echo"<td>";?><?php echo $val['amount'];?> ₹.<?php echo "</td>";
										?>
										<?php echo"</tr>";
										$i++;
										}
										}else{
										?>
										<tr>
											<td colspan="15">
												<center>No Record Found</center>
											</td>
										</tr>
										<?php } ?>
										<tr>
											<td colspan="4">
												<center>Total</center>
											</td>
											<td> <?php echo $booking['total_amount']?> ₹.</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-sm-6"></div>	
						<?php echo form_close(); ?> 
                    </div>  
				</div>  
			</div>
		</div>
	</div>
</div>
<?php include ("assets/includes/footer_hospital.php"); ?>
