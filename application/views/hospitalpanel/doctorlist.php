<style>
.confirmClick {
    background: #55ad27;
    color: white;
    font-weight: bold;
    padding: 5px 20px;
    border: none;
    border-radius: 23px;
}
</style>
<?php include ("assets/includes/header_hospital.php"); ?>
<?php include ("assets/includes/leftmenu_hospital.php"); ?>
<div class="pag_cstm">
	<div class="row">
		<div class="col-lg-12">
			<div class="pag_cstm_panel">
				<div class="pag_cstm_panel_panel_ontent p-t-0">
					<div class="row paddb40">
						<div class="col-sm-12 processsstep2">
							<h4><?php echo $heading_title;?> </h4>
						</div>
						<div class="col-sm-12 processsstep2">
							<?php echo form_open("hospitalpanel/doctorlist/",'class="form-horizontal formbody" id="search_form" method="get"');  ?>
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
								<input style="border-radius: 23px;padding:0px 23px;" name='doctor_name' value="<?php echo $this->input->get_post('doctor_name')?>" placeholder="Doctor Name" >
							</div>
							<div class="col-md-2">
								<a  onclick="$('#search_form').submit();" style="letter-spacing: 1px;text-shadow: 3px -1px 2px #666;font-weight:900;color:white;background:#1fc61f;padding:9px 23px;border-radius: 23px;float: right;border:none;" class="btn btn-success btn-md"><span> Search </span></a>
							</div>
							<div class="col-sm-2 col-xs-12">
								<?php 
								if( $this->input->get_post('doctor_name')!='' || $this->input->get_post('specialization_id')!='' || $this->input->get_post('qualification_id')!='' )
								{ 
									echo anchor("hospitalpanel/doctorlist/",'<span>Clear Search</span>'); 	  
								} 
								?>
							</div>
							<?php echo form_close();?>
						</div>
						<div class="col-sm-12 processsstep2">
							<?php 	
							if(is_array($doctorlist) && !empty($doctorlist))
							{
							foreach($doctorlist as $d) { ?>		
							<div class="col-xs-12 box_sh_bg">
								<div class="">
									<div class="col-sm-2 docimg">
										<img src="<?=admin_url();?>public/assets/upload/<?=($d->drimage)? $d->drimage : 'dummydr.jpg';?>" alt="<?=$d->fname.' '.$d->lname;?>">
									</div>
									<div class="col-sm-7">
										<div class="doc_nam">
											<span><?=$d->fname.' '.$d->lname;?></span>
											<ul>
												<li><?php 	
													$quastring='';
													$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$d->id));
													foreach(@$qu->result() as $q)
													$quastring.=getQualificationName($q->qualification_id).', ';
												  echo $quastring=rtrim($quastring,', ');	?>
												</li>
												<li><?=$d->exp;?> years experience</li>
												<li><?php $splstring=''; $sp=$this->db->get_where('dr_specialization',array('user_id'=>$d->id))->result();
													foreach($sp as $s)
													$splstring.=getSpecilizationName($s->specialization_id).', ';
													echo $splstring=rtrim($splstring,', ');	?>
												</li>
											</ul>
										</div>
										<?php $practdata=$this->db->get_where('dr_practice',array('user_id'=>$d->id,'status'=>'1'));
										$practcount=$practdata->num_rows(); 
										$pract=$practdata->row(); 
										if(@$pract->type=='C')
										$institution_table='clinic';
										else if(@$pract->type=='H')
										$institution_table='hospital';
										if($practcount)
										{
										$institutiondata=$this->db->get_where(@$institution_table, array('id'=>@$pract->institution_id,'status'=>'1'));
										$institutioncount=@$institutiondata->num_rows();
										$institution=@$institutiondata->row(); 	 ?> 	
										<div class="hosp_name">
											<span>
												<a href="#"><?=@$institution->name;?></a> 
												<?php if($practcount > 1){ echo 'and '.($practcount-1).' more places'; } ?> 
											</span>
											<!--  <ul> 
												<li><img src="images/fac1.jpg" alt=""></li>
												<li><img src="images/images.jpg" alt=""></li>
												<li><img src="extra-images/blog-grid-img1.jpg" alt=""></li>
											</ul>
											<p>â€³He is very friendly, approachable and efficient doctor. â€³ â€” Manish Shewani, visited for kidney stone removal</p>
											<P><b>services</b></p>-->
										</div>							
										<?php } ?>
									</div>
									<div class="col-sm-3 padd0">
										<ul class="add_list">
											<li><i class="fa fa-thumbs-o-up"></i>
												<span><b>93%</b> (15 votes)</span></li>
											<li><i class="fa fa-map-marker"></i>
												<span><?=@$institution->address;?></span></li>
											<li><i class="fa fa-money"></i>
												<span><?=@$pract->fee;?></span></li>
											<li><i class="fa fa-clock-o"></i>
												<span>Available Today</span></li>
										</ul>
										<p>30 mins or less wait time assured</p>
									</div>
									<div class="col-sm-3 col-md-offset-3 padd0">
										<ul class="doc_servic">
											<?php 
											$inst_service=$this->db->select('master_services.name')->join('master_services','master_services.id=instition_services.services_id')->get_where('instition_services',array('institution_id'=>@$pract->institution_id,'institution_type'=>@$pract->type))->result();
											//last_query();
											foreach($inst_service as $is){
											?>
											<li><?=$is->name;?></li>
											<?php } ?>
											<!-- <li>Open Prostatectomy</li>
											<li>Ureteroscopy (URS)</li>
											<li>Urologic Oncology</li>-->
										</ul>
									</div>
									<div class="col-sm-3 padd0">
										<ul class="doc_servic">
											<!-- <li>Urological Surgeon</li>
											<li>Laparoscopic Surgeon</li>
											<li>Cystoscopy</li>-->
										</ul>
									</div>
									<div class="col-sm-3 padd0">
										<ul class="doc_servic">
											<!--<li>Genitourinary Surgery</li>
											<li>Kidney Stone Treatment</li>
											<li>Laparoscopy</li>
											<li>Transurethral Incision</li>-->
										</ul>
									</div>
									<div class="col-sm-12 padd0">
										<?php if($d->p_status==null){ ?>
										<form action='<?=base_url();?>hospitalpanel/linkdoctor' method='POST'>
											<input type="hidden" name="link" value='1' id='link' class="form-control">	
											<input type="hidden" name="link2" value='<?=$d->id;?>' id='link2' class="form-control">	 
											<button type="submit" id="btn-lg view_profile getappointment" class="confirmClick" data-upchar-did='<?=$d->id;?>' >Link To Hospital</button>
										</form>
										<?php }else{
										if($d->p_status==0){ ?>
										<div class="col-md-6"></div>
										<div class="col-md-3"> 
											<form action='<?=base_url();?>hospitalpanel/unlinkdoctor' method='POST'>
												<input type="hidden" name="link" value='1' id='link' class="form-control">	
												<input type="hidden" name="link2" value='<?=$d->id;?>' id='link2' class="form-control">	
												<input type="submit" class="LinkBTN confirmClick" value="Doctor Request Cancel">
											</form>
										</div>
										<div class="col-md-3 ">
											<a class="view_profile">Link Request Pending</a> 
										</div>
										
										<?php }else{ ?>
										<div class="col-md-6"></div>
										<div class="col-md-3"> 
											<form action='<?=base_url();?>hospitalpanel/unlinkdoctor' method='POST'>
												<input type="hidden" name="link" value='1' id='link' class="form-control">	
												<input type="hidden" name="link2" value='<?=$d->id;?>' id='link2' class="form-control">	
												<input type="submit" class="LinkBTN confirmClick" value="UnLink Doctor">
											</form>
										</div>
										<div class="col-md-3">
											<a href="<?=base_url();?>doctor/<?=$d->id;?>" target='_blank' class="view_profile">View Profile</a> 
										</div>
										 <?php } } ?>
									</div>
								</div>
							</div>
							<?php } } else { ?>
							<div class="col-xs-12 box_sh_bg">
								<div class="">
									<div class="col-sm-7">
										<div class="doc_nam">
											<span>No Record Founds</span>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="col-md-4 processsstep2"></div>
						<div class="col-md-8 processsstep2">
							<div class="pagination"><?php echo $page_links; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include ("assets/includes/footer_hospital.php"); ?>
<link rel="stylesheet" type="text/css"  href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css'>
<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" type="text/css"  href='https://www.upchar.shop/css/coustm.css'>		
<style>		
.docimg img {
    width: 121px;
    height: 121px;
    border-radius: 72px;
}
.LinkBTN {
    color: white;
    font-weight: bold;
    border: none;
    background: red;
}
.view_profile {
    padding: 6px 16px;
    color: #ffffff;
    background: #55ad27;
    float: left;
    border-radius: 37px;
    width: 100%;
    text-align: center;
}
</style>
<script>
$(document).ready(function() {
	$('#datatable').DataTable();
} );
</script>
<script>
$('.confirmClick').click(()=> {
var sure = confirm('Are you sure ?');
if(sure)
{
return true;
}
return false;
})
</script>
       
