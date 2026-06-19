<?php include ("assets/includes/header_hospital.php"); ?>

    <?php include ("assets/includes/leftmenu_hospital.php"); ?>

        <div class="pag_cstm">



            <div class="row">

                <div class="col-lg-12">

                    <div class="pag_cstm_panel">

                        <div class="pag_cstm_panel_panel_ontent p-t-0">

                            <div class="row paddb40">

							<div class="col-sm-12 processsstep2">

							<h4>Manage Doctors 

							<!--<a href='<?=base_url();?>hospitalpanel/adddoctor'><button type='submit' name='submit' class="btn btn-primary pull-right">Add Doctor</button></a>--></h4>



							</div>

							

                                <div class="col-sm-12 processsstep2">

                                  
								<?php foreach($doctorlist as $d){ ?>

								 <div class="col-sm-9 col-xs-12 box_sh_bg">
                    <div class="">
                        <div class="col-sm-2 col-xs-2 paddl0 docimg"><img src="<?=admin_url();?>public/assets/upload/<?=($d->drimage)? $d->drimage : 'dummydr.jpg';?>" alt="<?=$d->fname.' '.$d->lname;?>">
                        </div>

                        <div class="col-sm-7 col-xs-10">
                            <div class="doc_nam">
                                <span><?=$d->fname.' '.$d->lname;?></span>
                                <ul>
                                    <li><?php $quastring='';
										$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$d->id));
										foreach(@$qu->result() as $q)
											$quastring.=getQualificationName($q->qualification_id).', ';
										echo $quastring=rtrim($quastring,', ');
										?>
									</li>
                                    <li><?=$d->exp;?> years experience</li>
                                    <li><?php $splstring=''; $sp=$this->db->get_where('dr_specialization',array('user_id'=>$d->id))->result();
										foreach($sp as $s)
											$splstring.=getSpecilizationName($s->specialization_id).', ';
										echo $splstring=rtrim($splstring,', ');
										/* <?php } */ ?>
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
							
							$institutiondata=$this->db->get_where(@$institution_table, array('id'=>@$pract->institution_id,'status'=>'1'));
							$institutioncount=@$institutiondata->num_rows();
							$institution=@$institutiondata->row();
							
							?>
                            <div class="hosp_name">
                                <span><a href="#"><?=@$institution->name;?></a> <?php if($practcount > 1){ echo 'and '.($practcount-1).' more places'; } ?> </span>
                                <ul> 
                                    <li><img src="images/fac1.jpg" alt=""></li>
                                    <li><img src="images/images.jpg" alt=""></li>
                                    <li><img src="extra-images/blog-grid-img1.jpg" alt=""></li>
                                </ul>
                                <p>″He is very friendly, approachable and efficient doctor. ″ — Manish Shewani, visited for kidney stone removal</p>

                                <P><b>services</b></p>
                            </div>

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

                            <P>30 mins or less wait time assured</p>
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

                            <a href="#" class="view_profile">Contact Hospital</a>
                            <a href="<?=base_url();?>doctor/<?=$d->id;?>" class="view_profile">View Profile</a> 
                            <button type="button" class="btn-lg view_profile getappointment" data-upchar-did='<?=$d->id;?>' data-toggle="modal" data-target="#myModal">Book Appointment</button>

                        </div>
                    </div>

                </div>
				
				
								<?php } ?>

					

					

                                </div>

								



                               <!-- <div class="col-sm-5 hoslist_he mrgt30">

                                  

                                        <p>

                                            This information helps us perform critical checks to ensure that only licensed and genuine medical practitioners are listed on Upchaar . Your profile will get a “Verified” badge on verification. Doctors with verified profiles get 95% more patient views on Upchaar.</p>

                                   

                                </div>-->



                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <?php include ("assets/includes/footer_hospital.php"); ?>

		<link rel="stylesheet" type="text/css"  href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css'>
		<link rel="stylesheet" type="text/css"  href='https://www.upcharr.com/css/coustm.css'>

		<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>

		<script>

		$(document).ready(function() {

			$('#datatable').DataTable();

		} );

		</script>