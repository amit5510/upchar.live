<?php include ("assets/includes/header_hospital.php"); ?>
    <?php include ("assets/includes/leftmenu_hospital.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">

                                <div class="col-sm-12 processsstep2">
                                    <h4>Hospital basic details</h4>
                                </div>

								<form action='' method='post'>
                                <div class="col-sm-5 processsstep2">

                                    <div class="col-sm-12" style="padding: 0px;">
                                        <label>Hospital name</label>

                                        <input type="text" name="clinicname" class="form-control" placeholder="Type clinic name" required>
                                    </div>

                                    <div class="col-sm-12 padding0">
                                        <label>City</label>
                                        <select class="form-control" name='cliniccity' required>
                                            <option value="">Select</option>
						<?php
						$citylist=$this->db->get_where('master_city',array('status'=>'1'));
						foreach(@$citylist->result() as $list){
						?>
						<option value="<?=$list->id;?>" ><?=$list->name;?></option>
						<?php } ?>

                                        </select>
                                    </div>

                                    <div class="col-sm-12 padding0">
                                        <label>Locality</label>
                                        <select class="form-control" name='cliniclocality' required>
                                            <option>Select locality</option>
                                            <option  value='1'>Yamuna Vihar</option>

                                        </select>
                                    </div>

                                    <div class="col-sm-8 click_step2 mrt30 padding0">
                                        <a class="backiocn" href="<?=base_url();?>manageownclinic"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
                                    </div>
                                    <div class="col-sm-4 click_step2 mrt20 padding0">
                                        <button class="continue2" name='submit' type='submit'>Continue</button>
                                       

                                    </div>

                                </div>
</form>
                                <div class="col-sm-5 hoslist_he mrgt30">
                                    <p>Basic details about your practice helps patients reach you easily for appointment booking and inquiries.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include ("assets/includes/footer_hospital.php"); ?>