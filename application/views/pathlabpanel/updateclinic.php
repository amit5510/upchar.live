<?php include ("assets/includes/header_pathlab.php"); ?>
    <?php include ("assets/includes/leftmenu_pathlab.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">

                                <div class="col-sm-12 processsstep2">
                                    <h4>Pathlab basic details</h4>
                                </div>

								<form action='' method='post'>
                                <div class="col-sm-5 processsstep2">

                                    <div class="col-sm-12" style="padding: 0px;">
                                        <label>Pathology name</label>

                                        <input type="text" name="clinicname" class="form-control" placeholder="Type clinic name" value='<?=@$data->name;?>' required>
                                    </div>

                                    <div class="col-sm-12 padding0">
                                        <label>City</label>
                                        <select class="form-control" name='cliniccity' required>
                                            <option value="">Select</option>
						<?php
						$citylist=$this->db->get_where('master_city',array('status'=>'1'));
						foreach(@$citylist->result() as $list){
						?>
						<option value="<?=$list->id;?>"  <?php if($list->id==$data->city){echo 'selected';}?>><?=$list->name;?></option>
						<?php } ?>

                                        </select>
                                    </div>

                                    <div class="col-sm-12 padding0">
                                        <label>Locality</label>
                                        <select class="form-control" name='cliniclocality' required>
                                                <?php
						$citylist=$this->db->get_where('master_locality',array('status'=>'1'));
						foreach(@$citylist->result() as $list){
						?>
						<option value="<?=$list->id;?>"  <?php if($list->id==$data->location){echo 'selected';}?>><?=$list->name;?></option>
						<?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12" style="padding: 0px;">
                                        <label>Address</label>

                                        <input type="text" name="address" class="form-control" placeholder="Address" value='<?=$data->address;?>' required>
                                    </div>

                                    <div class="col-sm-8 click_step2 mrt30 padding0">
                                        <a class="backiocn" href="<?=base_url();?>pathlab-dashboard"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
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