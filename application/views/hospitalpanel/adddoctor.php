<?php include ("assets/includes/header_hospital.php"); ?>
<?php include ("assets/includes/leftmenu_hospital.php"); ?>
        <div class="pag_cstm">
         
          <div class="row">
		   <div class="col-lg-12">
              <div class="pag_cstm_panel" style="background:#295771;">
                <div class="pag_cstm_panel_panel_ontent p-t-0">
                  <div class="row paddb40">
                
				
				
												
					<h4 class="colorwhite" style="font-weight:bold;padding:4px 17px">Please Fill Doctor's Mobile & Email First to get if data available</h4>

            <form action='<?=base_url();?>hospitalpanel/linkdoctor' method='POST'>
                	
                               	<div class="col-sm-5 ">

								 <div class="col-sm-12" style="padding: 0px;">
                                        <label class="colorwhite">Mobile</label>
                                        <input type="text" id='mobile' name="mobile" class="form-control2" value=''  placeholder="Mobile Number" required>
                                    </div>

									<hr>
								
								
								
								<div class="col-sm-12 padding0">                    
                                   <label class="colorwhite">Name</label>
                                  <input type="hidden" name="link" value='0' id='link' class="form-control2">	
                                  <input type="hidden" name="link2" value='' id='link2' class="form-control">	
                                  <input type="text" name="name" value='' class="form-control">	
								  </div>
								<div class="col-sm-12 padding0">                    
                                   <label class="colorwhite">Specialization</label>
                                  <select class="form-control" id='spl' name="specialisation[]" multiple  >
					
					<?php
						$citylist=$this->db->get_where('master_specialization',array('status'=>1));
						foreach(@$citylist->result() as $list){
						?>
						<option value="<?=$list->id;?>"><?=$list->name;?></option>
						<?php } ?>
</select>
								  </div>
								  
								  <div class="col-lg-2 padding0">  
								 
      <div class="onboarding-radio__item" style="">
             <label class="colorwhite">Gender</label> 
            <div class="o-radio ">
                <input type="radio" class="o-radio--input" name="gender" id="SAME_AS_CLINIC" data-qa-id="SAME_AS_CLINIC_input" value="M"  >
                <label class="o-radio--label colorwhite" for="SAME_AS_CLINIC" data-qa-id="SAME_AS_CLINIC_label" >Male</label>
            </div>
        </div>
		</div>
		  <div class="col-lg-10 padding0">  
 <div class="onboarding-radio__item" style="margin-top:25px;">
            <div class="o-radio ">
                <input type="radio" class="o-radio--input" name="gender" id="DIFFERENT_FROM_CLINIC" data-qa-id="DIFFERENT_FROM_CLINIC_input" value="F" >
                <label class="o-radio--label colorwhite" for="DIFFERENT_FROM_CLINIC" data-qa-id="DIFFERENT_FROM_CLINIC_label">Female</label>
            </div>
        </div>
    </div>
				
								  <div class="col-sm-12 padding0">                    
                                   <label class="colorwhite">City</label>
                                  <select class="form-control" id='city' name='city'>
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
                                        <label class="colorwhite">College/Institute</label>
                                        <input type="text" name="college" class="form-control" value=''  placeholder="Type & select college/institute" required>
                                            
                                    </div>
									<div class="col-sm-12 padding0">
                                        <label class="colorwhite">Year of experience</label>
                                        <input type="text" name="exp" value=''  class="form-control" placeholder="Type Year of experience" required>
                                    </div>


						
				</div>
					
			<div class="col-sm-6">
				 <div class="col-sm-12" style="padding: 0px;">
                                        <label class="colorwhite">Email</label>
                                        <input type="text" name="email" class="form-control2" id='email'  value=''  placeholder="Type Email Id" required>
                                    </div>
<hr>
                                    <div class="col-sm-12" style="padding: 0px;">
                                        <label class="colorwhite">Registration Number</label>
                                        <input type="text" name="regno" class="form-control" value=''  placeholder="Type Registration Number" required>
                                    </div>

                                    <div class="col-sm-12" style="padding: 0px;">
                                        <label class="colorwhite">Registration Council</label>
                                        <select class="form-control" id="council" name="council" required>
						<option value="">Select</option>
						<?php
						$citylist=$this->db->get_where('master_council',array('status'=>1)); 
						foreach(@$citylist->result() as $list){
						?>
						<option value="<?=$list->id;?>"  ><?=$list->name;?></option>
						<?php } ?>
						</select>
                                    </div>

                                    <div class="col-sm-12" style="padding: 0px;">
                                        <label class="colorwhite">Registration Year</label>
                                        <select class="form-control" id='ryear' name='ryear' required >
										<option value="">Select</option>
										<?php for($i=date('Y');$i>=1960;$i--){ ?>
                                            <option value='<?=$i;?>'  ><?=$i;?></option>
										<?php } ?>
                                        </select>
                                    </div>

				
                                    <div class="col-sm-12 padding0">
                                        <label class="colorwhite">Degree</label>

                                        <select class="form-control" placeholder="Type & select degree" id='qual' name="qualification[]" multiple required >
					
					<?php
						$citylist=$this->db->get_where('master_degree',array('status'=>1));
						foreach(@$citylist->result() as $list){
						?>
						<option value="<?=$list->id;?>" ><?=$list->name;?></option>
						<?php } ?>
                                        </select>
                                    </div>

                                   
                                    <div class="col-sm-12 padding0">
                                        <label class="colorwhite">Year of completion</label>
                                         <select class="form-control" id='year'  name='year' required >
										<option value="">Select</option>
										<?php for($i=date('Y');$i>=1960;$i--){ ?>
                                            <option value='<?=$i;?>'  ><?=$i;?></option>
										<?php } ?>
                                        </select>
                                    </div>

                                    
				
								<div class="col-sm-12 click_step2 mrt20" style="padding: 0px;">
                                        
                                            <button type='submit' name='submit' class="continue2">Add Doctor</button>
                                       

                                    </div>  
								
				
                        </div>        
                                
                           
</form>
                        </div>  
						 </div>  
				   </div>
                </div>
              </div>
            </div>
        
         
          			<?php include ("assets/includes/footer_hospital.php"); ?>
	<script>
	$('body').on('blur','#email,#mobile',function(){
		var value=$(this).val();
		if(value){
		$.ajax({			
			type: "POST",			
			url: '<?=base_url();?>hospitalpanel/checkdoctor',			
			data: {key: value},//myform.serialize(),	
			dataType: "text",			
			success: function( response ) {			 
				response = JSON.parse(response);				
				if(response.status=='success'){
					$('input').attr('readonly','true');				
					$('select').attr('readonly','true');				
					$('#email').attr('readonly','true');				
					$('#mobile').attr('readonly','true');				
					$('#link').val('1');				
					$('#link2').val(response.data.drid);				
					$('input[name=email]').val(response.data.email);				
					$('input[name=mobile]').val(response.data.mobile);				
					$('input[name=name]').val(response.data.name);				
					$('input[name=college]').val(response.data.college);				
					$('input[name=exp]').val(response.data.exp);				
					$('input[name=regno]').val(response.data.regd_no);				
					
					$('input[name=gender][value='+response.data.gender+']').attr('checked', true);
					
					$('#council option[value='+response.data.regd_council+']').attr('selected', true);
					$('#ryear option[value='+response.data.regd_year+']').attr('selected', true);
					$('#year option[value='+response.data.year+']').attr('selected', true);
					$('#city option[value='+response.data.city+']').attr('selected', true);
					
					$.each(response.data.specialization, function( intIndex, objValue ){
						$('#spl option[value=' + objValue + ']').attr('selected', true);
					});
					$.each(response.data.qualification, function( intIndex, objValue ){
						$('#qual option[value=' + objValue + ']').attr('selected', true);
					});
					
					
				}
				else if(response.status=='failed'){					
					//alert(response.msg);									
				}else{					
					//alert('opps'+response.msg);				
				}				
				//console.log( response );			
			}		
		});	
		}
	})
	</script>