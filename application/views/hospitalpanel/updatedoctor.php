<?php include ("assets/includes/header_hospital.php"); ?>
<?php include ("assets/includes/leftmenu_hospital.php"); ?>
        <div class="pag_cstm">
         
          <div class="row">
		   <div class="col-lg-12">
              <div class="pag_cstm_panel" style="background: #295771;">
                <div class="pag_cstm_panel_panel_ontent p-t-0">
                  <div class="row paddb40">
                
				
				
					
					

            <form action='' method='POST'>
                               	<div class="col-sm-5 ">
								<p>Please Fill Doctor's Mobile & Email First to get if data available</p>
								 <div class="col-sm-12" style="padding: 0px;">
                                        <label>Mobile</label>
                                        <input type="text" name="mobile" class="form-control" value='<?=$data->regd_no;?>'  placeholder="Type Mobile Number" required>
                                    </div>

									<hr>
								
								
								
								<div class="col-sm-12 padding0">                    
                                   <label>Name</label>
                                  <input type="text" name="name" value='<?=$data->fname;?>' class="form-control">	
								  </div>
								<div class="col-sm-12 padding0">                    
                                   <label>Specialization</label>
                                  <select class="form-control" name="specialisation[]" multiple  >
					
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
                <label class="o-radio--label" for="SAME_AS_CLINIC" data-qa-id="SAME_AS_CLINIC_label">Male</label>
            </div>
        </div>
		</div>
		  <div class="col-lg-10 padding0">  
 <div class="onboarding-radio__item" style="    border-bottom: 0px solid #b4b4be;">
            <div class="o-radio ">
                <input type="radio" class="o-radio--input" name="gender" id="DIFFERENT_FROM_CLINIC" data-qa-id="DIFFERENT_FROM_CLINIC_input" value="F" <?php if($data->gender == 'F'){ echo 'checked';} ?>>
                <label class="o-radio--label" for="DIFFERENT_FROM_CLINIC" data-qa-id="DIFFERENT_FROM_CLINIC_label">Female</label>
            </div>
        </div>
    </div>
				
								  <div class="col-sm-12 padding0">                    
                                   <label>city</label>
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
								
	
	
								<div class="col-sm-12 padding0">
                                        <label>College/Institute</label>
                                        <input type="text" name="college" class="form-control" value='<?=$data->college;?>'  placeholder="Type & select college/institute" required>
                                            
                                    </div>
									<div class="col-sm-12 padding0">
                                        <label>Year of experience</label>
                                        <input type="text" name="exp" value='<?=$data->exp;?>'  class="form-control" placeholder="Type Year of experience" required>
                                    </div>


						
				</div>
					</form>
			<div class="col-sm-6">
				 <div class="col-sm-12" style="padding: 0px;">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value='<?=$data->regd_no;?>'  placeholder="Type Email Id" required>
                                    </div>
<hr>
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

				
                                    <div class="col-sm-12 padding0">
                                        <label>Degree</label>

                                        <select class="form-control" placeholder="Type & select degree" name="qualification[]" multiple required >
					
					<?php
						$citylist=$this->db->get_where('master_degree',array('status'=>1));
						foreach(@$citylist->result() as $list){
						?>
						<option value="<?=$list->id;?>"<?php /* if(in_array($list->id,@$data_qua)){echo 'selected';}  */?> ><?=$list->name;?></option>
						<?php } ?>
                                        </select>
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

                                    
				
								<div class="col-sm-12 click_step2 mrt20" style="padding: 0px;">
                                        
                                            <button type='submit' name='submit' class="continue2">Continue</button>
                                       

                                    </div>  
								
				
                        </div>        
                                
                           

                        </div>  
						 </div>  
				   </div>
                </div>
              </div>
            </div>
        
         
          			<?php include ("assets/includes/footer_hospital.php"); ?>