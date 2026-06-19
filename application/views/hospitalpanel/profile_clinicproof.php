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
                                    <h4>Hospital Proof</h4>
								
                                </div>

                                <div class="col-sm-5 id_proof">

                                    <div class="col-sm-12 bggrya">
									<p>Upload  Proof</p>
                                         <div class="img-picker"></div>
                                         
										 
                                    </div>
<P>Please provide your Hospital ownership proof to verify your profile, so that no one else can get access to your information.</p>

<ul>
<li><b>Acceptable documents</b></li>
<li>Prescription Pad</li>
<li>  Tax receipt</li>
<li>  Hospital Registration </li>




</ul>
                                   
                                  <div class="col-sm-8 click_step2 mrt30 padding0">
                                        <a class="backiocn" href="<?=base_url();?>hospitalpanel/updateprofile"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
                                    </div>
                                    <div class="col-sm-4 click_step2 mrt20 padding0">
                                        
                                            <button class="continue2"  name='submit' type='submit'>Continue</button>
                                        

                                    </div>

                                </div>

                                <div class="col-sm-5 hoslist_he">
                                    <div class="text-center"><img src="<?=base_url();?>admin1947/public/assets/upload/<?=@$src;?>" class="img-responsive rightImg" alt='No Image'>
									</div>
                                    <p>2.5M patients are looking for a doctor on Upchar. Verify your credentials and reach out to them</p>
									
                                </div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include ("assets/includes/footer_hospital.php"); ?>