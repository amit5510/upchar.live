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
								<h5 style="color:#34c22b;">Hi 
								<span style="margin-left: 5px;border-radius: 0px 12px;padding: 5px 11px;background: #34c22b;color: white;font-weight:bold;" id="drname"> Dr. <?=$this->session->userdata('drusername');?><?=$this->session->userdata('druserlname');?> </span> <br><br>Lets build your dedicated profile.</h5>
								<p class="step1">Section A: Profile details</p>
								<div class="col-sm-12 padding0">                    
                                   <label style="color:black;">Doctor Name</label>
                                  <input type="text" name="name" value='<?=$data->fname;?>' class="form-control">	
								  </div>
								  <div class="col-sm-12 padding0">                    
                                   <label style="color:black;">E-mail</label>
                                  <input type="text" name="email" value='<?=$data->email;?>' class="form-control">	
								  </div>
								
								
								<div class="col-sm-12 padding0">                    
                                   <label style="color:black;">Specialization</label>
                                  <select class="form-control" name="specialisation[]" required >
					
					<?php
						$citylist=$this->db->get_where('master_specialization',array('status'=>1));
						foreach(@$citylist->result() as $list){
						?>
						<option value="<?=$list->id;?>" <?php if(in_array($list->id,$data_spl)){echo 'selected';} ?>><?=$list->name;?></option>
						<?php } ?>
</select>


								  </div>
								  
								
  
								  <div class="col-lg-12 padding0">  
								  <label style="color:black;">Gender</label>
								  
   
		</div>
		

		  <div class="col-lg-10 padding0">  
		     <div class="col-lg-4 onboarding-radio__item">
            <div class="o-radio ">
                <input type="radio" class="o-radio--input" name="gender" id="SAME_AS_CLINIC" data-qa-id="SAME_AS_CLINIC_input" value="M" <?php if($data->gender == 'M'){ echo 'checked';}else if($data->gender == ''){ echo 'checked';} ?> >
                <label class="o-radio--label" for="SAME_AS_CLINIC" data-qa-id="SAME_AS_CLINIC_label" style="color:black;">Male</label>
            </div>
        </div>
        
 <div class="col-lg-4 onboarding-radio__item">
            <div class="o-radio ">
                <input type="radio" class="o-radio--input" name="gender" id="DIFFERENT_FROM_CLINIC" data-qa-id="DIFFERENT_FROM_CLINIC_input" value="F" <?php if($data->gender == 'F'){ echo 'checked';} ?>>
                <label class="o-radio--label" for="DIFFERENT_FROM_CLINIC" data-qa-id="DIFFERENT_FROM_CLINIC_label" style="color:black;">Female</label>
            </div>
        </div>
    </div>

								  <div class="col-sm-12" style="padding:17px 0px;">                    
                                   <label style="color:black;">Location</label>
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
								   </div>
								   
								  <div class="col-sm-12 text-center" style="padding:23px;">
								      <!-- <p style="color: #33ba2b;font-weight: bold;text-align:center;">If you are not a doctor and owns an establishment </p>
								  <a href="#" style="background: #32b22a;padding:9px 33px;color:white;border-radius: 0px 8px;font-weight: bold;">Click here</a>
								-->//
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