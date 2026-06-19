<?php include ("assets/includes/header_pathlab.php"); ?>
    <?php include ("assets/includes/leftmenu_pathlab.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
							<form action='' method='post' enctype="multipart/form-data">
                                <div class="col-sm-12 processsstep3">
                                    <h4>Pathology Proof</h4>
									<p></p>
                                </div>

                                <div class="col-sm-5 id_proof">

                                    <div class="col-sm-12 bggrya">
									<p>Upload  Proof</p>
                                         <div class="img-picker"></div>
										 
                                    </div>
<P>Please provide your Pathlab ownership proof to verify your profile, so that no one else can get access to your information.</p>

<ul>
<li><b>Acceptable documents</b></li>
<li>Prescription Pad</li>
<li>  Tax receipt</li>
<li>  Pathology Registration </li>




</ul>
                                   
                                  <div class="col-sm-8 click_step2 mrt30 padding0">
                                        <a class="backiocn" href="<?=base_url();?>pathlabpanel/updateprofile"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
                                    </div>
                                    <div class="col-sm-4 click_step2 mrt20 padding0">
                                        
                                            <button class="continue2"  name='submit' type='submit'>Continue</button>
                                        

                                    </div>

                                </div>

                                <div class="col-sm-5 hoslist_he">
                                    <p>2.5M patients are looking for a doctor on Upchar. Verify your credentials and reach out to them</p>
									<div class="text-center"><img src="<?=base_url();?>admin1947/public/assets/upload/<?=@$src;?>" class="img-responsive img-rounded" alt='No Image'>
									</div>
                                </div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include ("assets/includes/footer_hospital.php"); ?>