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
                                   <h4>Hospital Location</h4>
									<p> </p>
                                </div>
                                <div class="col-sm-5 processsstep2">

                                    <div class="col-sm-12 padding0">
                                        <label>Phone number</label>

                                        <input type="text" name="mobile" class="form-control" placeholder="Type clinic phone No" value='<?=@$data->mobile;?>'>
										
                                    </div>
									 <!--<div class="col-sm-4 verfi"><a href="#">VERIFY	</a></div>-->
									 <div class="col-sm-12 col-xs-12  padding0"><p class="step3p">Note: Patient calls will be directed to this number. You can update it later also.</p></div>
									 <div class="col-sm-12 padding0">
                                        <label>Email Address</label>

                                        <input type="text" name="email" class="form-control" placeholder="Enter email address" value='<?=@$data->email;?>'>
										</div>

 <div class="col-sm-12 padding0">
                                        <label> Address</label>

                                        <input type="text" name="address" class="form-control" placeholder="Type street address" value='<?=@$data->address;?>'>
										</div>

									
                                    <div class="col-sm-8 click_step2 mrt30 padding0">
                                        <a class="backiocn" href="<?=base_url();?>hospitalpanel/profile_clinicproof"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
                                    </div>
                                    <div class="col-sm-4 click_step2 mrt20 padding0">
                                       
                                            <button class="continue2"  name='submit' type='submit'>Continue</button>
                                        

                                    </div>

                                </div>

                                <div class="col-sm-7 col-xs-12 mrgt30 weigh">
                                   
									   <p>Drag n drop the pin to your location:</p>
									   <p><a href="#">Use Current Location</a></p>
									   
									   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13998.64059657685!2d77.26558771700856!3d28.699811139920246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfc139c6f8aab%3A0x409d254e45870ea3!2sYamuna+Vihar%2C+Shahdara%2C+Delhi%2C+110053!5e0!3m2!1sen!2sin!4v1537967067552" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include ("assets/includes/footer_hospital.php"); ?>