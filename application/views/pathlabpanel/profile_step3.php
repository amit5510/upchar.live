<?php include ("assets/includes/header.php"); ?>
    <?php include ("assets/includes/leftmenu.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">

                                <div class="col-sm-12 processsstep2">
                                    <h4>Education Qualification</h4>
                                </div>

								<form action='' method='post'>
                                <div class="col-sm-5 processsstep2">

                                    <div class="col-sm-12 padding0">
                                        <label>Degree</label>

                                        <select class="form-control" placeholder="Type & select degree" name="qualification[]" multiple required >
					
					<?php
						$citylist=$this->db->get_where('master_degree',array('status'=>1));
						foreach(@$citylist->result() as $list){
						?>
						<option value="<?=$list->id;?>"<?php if(in_array($list->id,$data_qua)){echo 'selected';} ?> ><?=$list->name;?></option>
						<?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-12 padding0">
                                        <label>College/Institute</label>
                                        <input type="text" name="college" class="form-control" value='<?=$data->college;?>'  placeholder="Type & select college/institute" required>
                                            
                                    </div>

                                    <div class="col-sm-12 padding0">
                                        <label>Year of completion</label>
                                         <select class="form-control" name='year' required >
										<option value="">Select</option>
										<?php for($i=date('Y');$i>=1960;$i--){ ?>
                                            <option value='<?=$i;?>'  <?php if($data->year == $i){echo 'selected'; } ?>><?=$i;?></option>
										<?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-12 padding0">
                                        <label>Year of experience</label>
                                        <input type="text" name="exp" value='<?=$data->exp;?>'  class="form-control" placeholder="Type Year of experience" required>
                                    </div>

                                    <div class="col-sm-8 click_step2 mrt30 padding0">
                                        <a class="backiocn" href="<?=base_url();?>profile_step2"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
                                    </div>
                                    <div class="col-sm-4 click_step2 mrt20 padding0">
                                       <button type='submit' name='submit'  class="continue2">Continue</button>
                                        </a>

                                    </div>

                                </div>
						</form>
                                <div class="col-sm-5 hoslist_he mrgt30">

                                    <p>
                                        This information helps us perform critical checks to ensure that only licensed and genuine medical practitioners are listed on Upchaar . Your profile will get a “Verified” badge on verification. Doctors with verified profiles get 95% more patient views on Upchaar.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include ("assets/includes/footer.php"); ?>