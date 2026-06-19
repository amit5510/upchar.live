<?php include ("assets/includes/header_hospital.php"); ?>
    <?php include ("assets/includes/leftmenu_hospital.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel" style="background: #295771;color:white;">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
							<form action='' method='post' enctype="multipart/form-data">
                                <div class="col-sm-12 processsstep3">
                                    <h4>Hospital Display Picture</h4>
									<p><?=$this->session->userdata('hospitalname');?></p>
                                </div>

                                <div class="col-sm-5 id_proof">

                                    <div class="col-sm-12 bggrya">
									<p>Upload Profile Picture</p>
                                         <div class="img-picker"></div>
										 
                                    </div>
<P>Please upload your Profile picture it will be displayed in  your profile .<br/>
                             
                                  <div class="col-sm-8 click_step2 mrt30 padding0">
                                        <a class="backiocn" href="<?=base_url();?>hospitalpanel/profile_clinicproof"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
                                    </div>
                                    <div class="col-sm-4 click_step2 mrt20 padding0">
                                        
                                            <button class="continue2"  name='submit' type='submit'>Continue</button>
                                        

                                    </div>

                                </div>

                                <div class="col-sm-5 hoslist_he">
                                    <div class="text-center">
                                    <img src="<?=base_url();?>admin1947/public/assets/upload/<?=$src;?>" class="img-responsive rightImg" alt='No Profile Image'>
                                    </div>
                                    <p>2.5M patients are looking for a doctor on Upchar. Verify your credential and reach out to them</p>
									
									<div class="text-center">
									</div>
                                </div>
								<form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include ("assets/includes/footer_hospital.php"); ?>