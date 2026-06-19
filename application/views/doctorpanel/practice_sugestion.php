<?php include ("assets/includes/header.php"); ?>
<?php include ("assets/includes/leftmenu.php"); ?>
	
	
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
						<form action='<?=base_url();?>linkpractice' method='post'>
                            <div class="row paddb40">
                                <h4 class="PageTitle">Matching profiles</h4>
							<div class="col-sm-12 processsstep2">
							
<p>Select your best matching profile</p>
							</div>
							 <div class="col-sm-4 padding0 paddmo">
                               
						<?php foreach($suggestedclinic as $clinic){ ?>
                                    <div class="col-sm-12 processsstep2 paddri0 paddmo">

                                        <div class="col-sm-12 col-xs-12 docto_list">
                                            <div class="col-sm-2 col-xs-2 padding0">
                                                <img src="assets/images/doctorclicniclogo/lofh2.jpg" class="img-responsive" />
                                            </div>
                                            <div class="col-sm-10 col-xs-10">
                                                <h3><?=$clinic->name;?></h3>
                                                <p><?=$clinic->address;?></p>
                                               <!-- <p>Dr. Sugandha Gupta & <a href="#">1 more doctors</a> </p>-->
                                            </div>

                                            <div class="border2">
                                                <div class="col-lg-6 col-xs-6">
                                                    <div class="btn-group mrlt" data-toggle="buttons">
                                                        <label class="btn active3">
                                                           	<a href="#" class="trigger_popup_fricc"> <input type="radio" name="hospclinicid" value="C-<?=$clinic->id;?>" checked="" >
														<i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span>  I own a clinic</span></a> 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="borders1" style="display: none;">
                                                    <div class="btn-group mrl4" data-toggle="buttons">
                                                          <label class="btn active3">
                                                           	<a href="#" class="trigger_popup_fricc"> <input type="radio" name="gender1" checked="">
														<i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span>  I own a clinic</span></a> 
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-xs-6">
                                                    <a href="#" class="check_profile">Check Profile</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
									
							<?php } ?>


						<?php foreach($suggestedhospital as $clinic){ ?>
                                    <div class="col-sm-6 processsstep2 paddri0 paddmo">

                                        <div class="col-sm-12 col-xs-12 docto_list">
                                            <div class="col-sm-2 col-xs-2 padding0">
                                                <img src="assets/images/doctorclicniclogo/lofh2.jpg" class="img-responsive" />
                                            </div>
                                            <div class="col-sm-10 col-xs-10">
                                                <h3><?=$clinic->name;?></h3>
                                                <p><?=$clinic->address;?></p>
                                               <!-- <p>Dr. Sugandha Gupta & <a href="#">1 more doctors</a> </p>-->
                                            </div>

                                            <div class="border2">
                                                <div class="col-lg-6 col-xs-6">
                                                    <div class="btn-group mrlt" data-toggle="buttons">
                                                        <label class="btn active3">
                                                           	<a href="#" class="trigger_popup_fricc"> <input type="radio" name="hospclinicid" value="H-<?=$clinic->id;?>" checked="" >
														<i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span>  I own a clinic</span></a> 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="borders1" style="display: none;">
                                                    <div class="btn-group mrl4" data-toggle="buttons">
                                                          <label class="btn active3">
                                                           	<a href="#" class="trigger_popup_fricc"> <input type="radio" name="gender1" checked="">
														<i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span>  I own a clinic</span></a> 
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-xs-6">
                                                    <a href="#" class="check_profile">Check Profile</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
									
							<?php } ?>

									

                                   
									<div class="col-sm-12 col-xs-6 click_step2"> 
  <a class="backiocn" href="<?=base_url();?>profile_step3"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
  	  <button class="continue2" name='submit' type='submit'>Next</button>
 </div>
								  
                                </div>
                            <div class="col-sm-1"></div>                                
                                
<div class="col-sm-4 hoslist_he">
<p>
We may already have your profile with patient feedbacks & reviews. If you see a match in suggested results, you can gain its control and update any information</p>
</div>
                            </div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include ("assets/includes/footer.php"); ?>