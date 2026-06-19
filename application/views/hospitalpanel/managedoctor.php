<?php include ("assets/includes/header_hospital.php"); ?>
<?php include ("assets/includes/leftmenu_hospital.php"); ?>
<div class="pag_cstm">
	<div class="row">
		<div class="col-lg-12">
			<div class="pag_cstm_panel" style="background: #295771;">
				<div class="pag_cstm_panel_panel_ontent p-t-0">
					<div class="row paddb40">
						<div class="col-sm-12 processsstep2">
							<a href='<?=base_url();?>hospitalpanel/adddoctor'><button type='submit' name='submit' style="letter-spacing: 1px;text-shadow: 3px -1px 2px #666;font-weight:900;color:white;background:#1fc61f;padding:9px 23px;border-radius: 23px;float: right;border:none;">Add Doctor</button></a>
							<h4><?php echo $heading_title;?></h4>
						</div>
						<div class="col-sm-12 processsstep2">
							<?php echo form_open("hospitalpanel/managedoctor/",'class="form-horizontal formbody" id="search_form" method="get"');  ?>
							<div class="col-sm-1"><?php echo display_record_per_page();?></div>
							<div class="col-md-3">
								<select class="form-control" name="specialization_id" >
									<option value="">Select Specialization</option>
									<?php if(is_array($specialization) && !empty($specialization)){
										foreach($specialization as $val){?>
									<option value="<?php echo $val['id']; ?>" <?php if($this->input->get_post('specialization_id')==$val['id']){ echo "selected";}?>><?php echo $val['name']; ?></option>
									<?php }}  ?>
								</select>
							</div>
							<div class="col-md-3">
								<select class="form-control" name="qualification_id" >
									<option value="">Select Degree</option>
									<?php if(is_array($degree) && !empty($degree)){
										foreach($degree as $val){?>
									<option value="<?php echo $val['id']; ?>" <?php if($this->input->get_post('qualification_id')==$val['id']){ echo "selected";}?>><?php echo $val['name']; ?></option>
									<?php }}  ?>
								</select>
							</div>
							<div class="col-md-3">
								<input style="border-radius: 23px;padding:0px 23px;" name='doctor_name' value="<?php echo $this->input->get_post('doctor_name')?>" placeholder="Dr. Name" >
							</div>
							<div class="col-md-2">
								<a  onclick="$('#search_form').submit();" style="letter-spacing: 1px;text-shadow: 3px -1px 2px #666;font-weight:900;color:white;background:#1fc61f;padding:9px 23px;border-radius: 23px;float: right;border:none;" class="btn btn-success btn-md"><span> Search </span></a>
							</div>
							<div class="col-sm-2 col-xs-12">
								<?php 
								if( $this->input->get_post('specialization_id')!='' || $this->input->get_post('qualification_id')!='' || $this->input->get_post('doctor_name')!='' )
								{ 
									echo anchor("hospitalpanel/managedoctor/",'<span>Clear Search</span>'); 	  
								} 
								?>
							</div>
							<?php echo form_close();?>
						</div>
						<div class="col-sm-12 processsstep2">
							<div class="table-responsive">
								<?php 
								$att=array('class'=>'form-horizontal form-label-left','name'=>'myform');
								echo form_open_multipart("hospitalpanel/manageappointment/", $att);?> 
								<table id="datatable" class="table table-bordered" style="width:100%">
									<thead style="color:white;">
										<tr>
											<th>Doctor Name</th>
											<th>Qualification</th>
											<th>Specialization</th>
											<th>Mobile</th>
											<th>Email</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody style="color:white;">
										<?php 
										if(is_array($clinic) && !empty($clinic))
										{
										foreach($clinic as $val)
										{ ?>
										<tr>
											<td><?=$val->fname.' '.$val->lname;?></td>
											<td><?php 	
												$quastring='';
												$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$val->id));
												foreach(@$qu->result() as $q)
												$quastring.=getQualificationName($q->qualification_id).', ';
												echo $quastring=rtrim($quastring,', ');	?>
											</td>
											<td><?php 
												$splstring=''; $sp=$this->db->get_where('dr_specialization',array('user_id'=>$val->id))->result();
												foreach($sp as $s)
												$splstring.=getSpecilizationName($s->specialization_id).', ';
												echo $splstring=rtrim($splstring,', ');	?>
											</td>
											<td><?=$val->mobile;?></td>
											<td><?=$val->email;?></td>
											<td><h5 class="StatusBTN"><?=($val->p_status)? '<span>Approved Active</span>' : '<span>Approval Pending</span>';?></h5></td>
											<td><?php if($val->p_status==1){ ?>
											<a style="color:red;" href='<?=base_url()?>hospitalpanel/updatedoctor/<?=mybase64_encode($val->id);?>'>Update Timing & Fee</a>
											<?php  }elseif($val->p_status==0){ ?>
											<a href=#>Update Timing & Fee</a>
											<?php } ?></td>
										</tr>
										<?php 
										} } else {
										?>
										<tr><td colspan="7" align="center">No Record Founds</td></tr>
										<?php }?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-7 processsstep2"></div>
						<div class="col-md-5 processsstep2">
							<div class="pagination"><?php echo $page_links; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include ("assets/includes/footer_hospital.php"); ?>