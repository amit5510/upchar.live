<?php include ("assets/includes/header_pathdoctor.php"); ?>
<?php include ("assets/includes/pathdoctorleftmenu.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel"  style="background: #295771;">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
							<div class="col-sm-12 processsstep2">
							<h4 style="
    color: white;
    padding: 9px;border-radius: 0px 15px;
">Medical Registration</h4>

							</div>
							<form action =''method='post'>
                                <div class="col-sm-5 processsstep2">
                                   
                                    <div class="col-sm-12" style="padding: 0px;">
                                        <label>Registration Number</label>
                                        <input type="text" name="regno" class="form-control" value='<?=$data->regd_no;?>'  placeholder="Type Registration Number" required>
                                    </div>

                                    <div class="col-sm-12" style="padding: 0px;">
                                        <label>Registration Council</label>
                                        <select class="form-control" name="council" required>
					<option value="">Select</option>
					<?php
						$citylist=$this->db->get_where('master_council',array('status'=>1)); 
						foreach(@$citylist->result() as $list){
						?>
						<option value="<?=$list->id;?>"  <?php if($data->regd_council == $list->id){ echo 'selected';} ?>><?=$list->name;?></option>
						<?php } ?>
						</select>
                                    </div>

                                    <div class="col-sm-12" style="padding: 0px;">
                                        <label>Registration Year</label>
                                        <select class="form-control" name='year' required >
										<option value="">Select</option>
										<?php for($i=date('Y');$i>=1960;$i--){ ?>
                                            <option value='<?=$i;?>'  <?php if($data->regd_year == $i){ echo 'selected';} ?>><?=$i;?></option>
										<?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-8 click_step2 mrt30" style="padding: 0px;">
                                        <a class="backiocn" href="<?=base_url();?>profile_step11"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
                                    </div>
                                    <div class="col-sm-4 click_step2 mrt20" style="padding: 0px;">
                                        
                                            <button type='submit' name='submit' class="continue2">Continue</button>
                                       

                                    </div>

                                </div>
								</form>

                                <div class="col-sm-5 hoslist_he mrgt30">
                                  
                                        <p style="word-spacing: 16px;color: #ffffff;background: #043d5b;padding: 20px;border-radius: 2px 21px;">
                                            This information helps to perform critical checks to ensure that only licensed and genuine medical practitioners are listed on Upchar . Your profile will get a “Verified” badge on verification. Doctors with verified profiles get 95% more patient views on Upchar.</p>
                                   
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include ("assets/includes/footer.php"); ?>