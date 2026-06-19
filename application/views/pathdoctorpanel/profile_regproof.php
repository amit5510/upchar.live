<?php include ("assets/includes/header_pathdoctor.php"); ?>
<?php include ("assets/includes/pathdoctorleftmenu.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel" style="background: #295771;color:white;">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
						<form action='' method='post' enctype="multipart/form-data">
                            <div class="row paddb40">

                                <div class="col-sm-12 processsstep3">
                                    <h4>Medical Registration Proof</h4>
									<p>Dr. <?=$this->session->userdata('drusername');?></p>
                                </div>

                                <div class="col-sm-5 id_proof">

                                    <div class="col-sm-12 bggrya">
									<p>Upload Identity Proof</p>
                                         <div class="img-picker"></div>
										 
                                    </div>
<P>Please upload your medical registration proof. Only licensed and genuine doctors are listed on Upchar.</p>


                                   
                                  <div class="col-sm-8 click_step2 mrt30 padding0">
                                        <a class="backiocn" href="<?=base_url();?>mci_proof1"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
                                    </div>
                                    <div class="col-sm-4 click_step2 mrt20 padding0">
                                       
                                            <button class="continue2"  name='submit' type='submit'>Continue</button>
                                       

                                    </div>

                                </div>

                                <div class="col-sm-5 hoslist_he">
                                    <p>2.5M patients are looking for a doctor on Upchar. Verify your credential and reach out to them</p>
									<div class="text-center"><img src="<?=base_url();?>admin1947/public/assets/upload/<?=$src;?>" class="img-responsive img-rounded" alt='No Profile Image'>
									</div>
                                </div>

                            </div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>		

var imagefilerequired='required';
</script>
        <?php include ("assets/includes/footer.php"); ?>
		

