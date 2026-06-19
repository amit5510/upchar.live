<?php include ("assets/includes/header.php"); ?>
<?php include ("assets/includes/leftmenu.php"); ?>
        <div class="pag_cstm">
         
          <div class="row">
		   <div class="col-lg-12">
              <div class="pag_cstm_panel" style="background:white;">
                <div class="pag_cstm_panel_panel_ontent p-t-0"> 
                  <div class="row paddb40">
                
				
				
					
					

            <form action='' method='POST'>
                               	<div class="col-sm-5 processsstep2">
								<h4>Hi <span style="margin-left: 16px;border-radius: 0px 12px;padding: 2px 9px;background: #ed3237;" id="drname"> Dr. <?=$this->session->userdata('drusername');?> </span> <br><br>Lets build your dedicated profile.</h4>
								
								<p class="step1">Section A: Profile details</p>
								<div class="col-sm-12 padding0">                    
                                   <label style="color:black;">Name</label>
                                  <input type="text" name="name" value='<?=$data->fname;?>' class="form-control">	
								  </div>
								  <div class="col-sm-12 padding0">                    
                                   <label style="color:black;">Email</label>
                                  <input type="text" name="email" value='<?=$data->email;?>' class="form-control">	
								  </div>
								
								
								<div class="col-sm-12 padding0">                    
                                   <label style="color:black;">Specialization</label>
                                  <select class="form-control" name="specialisation[]" multiple required >
					
					<?php
						$citylist=$this->db->get_where('master_specialization',array('status'=>1));
						foreach(@$citylist->result() as $list){
						?>
						<option value="<?=$list->id;?>" <?php if(in_array($list->id,$data_spl)){echo 'selected';} ?>><?=$list->name;?></option>
						<?php } ?>
</select>
								  </div>
								
								  
								  <div class="col-lg-2 padding0">  
      <div class="onboarding-radio__item" style="    border-bottom: 0px solid #b4b4be;">
            <div class="o-radio ">
                <input type="radio" class="o-radio--input" name="gender" id="SAME_AS_CLINIC" data-qa-id="SAME_AS_CLINIC_input" value="M" <?php if($data->gender == 'M'){ echo 'checked';}else if($data->gender == ''){ echo 'checked';} ?> >
                <label class="o-radio--label" for="SAME_AS_CLINIC" data-qa-id="SAME_AS_CLINIC_label" style="color:black;">Male</label>
            </div>
        </div>
		</div>
		  <div class="col-lg-10 padding0">  
 <div class="onboarding-radio__item" style="    border-bottom: 0px solid #b4b4be;">
            <div class="o-radio ">
                <input type="radio" class="o-radio--input" name="gender" id="DIFFERENT_FROM_CLINIC" data-qa-id="DIFFERENT_FROM_CLINIC_input" value="F" <?php if($data->gender == 'F'){ echo 'checked';} ?>>
                <label class="o-radio--label" for="DIFFERENT_FROM_CLINIC" data-qa-id="DIFFERENT_FROM_CLINIC_label" style="color:black;">Female</label>
            </div>
        </div>
    </div>

								  <div class="col-sm-12 padding0">                    
                                   <label style="color:black;">city</label>
                                  <select class="form-control" name='city'>
								 <option value="">Select</option>
						<?php
						$citylist=$this->db->get_where('master_city',array('status'=>'1'));
						foreach(@$citylist->result() as $list){
						?>
						<option value="<?=$list->id;?>" <?php if($data->city == $list->id){ echo 'selected';} ?>><?=$list->name;?></option>
						<?php } ?>
</select>
								  </div>
								   <div class="col-sm-12 click_step2 padding0">        
								  <button class="continue2" type='submit' name='submit'>Continue</button>
								  <p>If you are not a doctor and owns an establishment <a href="#" style="background: white;padding: 3px 9px;color: #043d5b;    border-radius: 0px 8px;">Click here</a></p>
								  
								  								  </div>
								
						
				</div>
					</form>
			<div class="col-sm-7">
				<img src="assets/images/Tv_Banner.png" class="img-responsive"/>
                        </div>        
                                
                           

                        </div>  
						 </div>  
				   </div>
                </div>
              </div>
            </div>
        
         
          			<?php include ("assets/includes/footer.php"); ?>