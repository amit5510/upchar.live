<?php include ("assets/includes/header.php"); ?>
<?php include ("assets/includes/leftmenu.php"); ?>
        <div class="pag_cstm">
         
          <div class="row">
		   <div class="col-lg-12">
              <div class="pag_cstm_panel">
                <div class="pag_cstm_panel_panel_ontent p-t-0">
                  <div class="row paddb40">
                
				
				
					
					<div class="col-sm-12 processsstep2">
							<h4>Connect a practice</h4>
							</div>

            <form action='' method='post'>
                               	<div class="col-sm-5 processsstep2">
				<div class="col-lg-12 padding0"> 
	  <div class="col-lg-12 padding0">  
     <div class="onboarding-radio__item" id="hides_day">
            <div class="o-radio ">
                <input type="radio" class="o-radio--input" name="practicetype" id="SAME_AS_CLINIC" data-qa-id="SAME_AS_CLINIC_input" value="OWN" <?php if($data->clinic_type == 'OWN'){ echo 'checked';}else if($data->clinic_type == ''){ echo 'checked';} ?> >
                <label class="o-radio--label" for="SAME_AS_CLINIC" data-qa-id="SAME_AS_CLINIC_label">I own a clinic</label>
            </div>
        </div>
		<div class="onboarding-radio__item">
            <div class="o-radio ">
                <input type="radio" class="o-radio--input" name="practicetype" id="DIFFERENT_FROM_CLINIC" data-qa-id="DIFFERENT_FROM_CLINIC_input" value="OTHER" onclick="myFunction()" <?php if($data->clinic_type == 'OTHER'){ echo 'checked';} ?>>
                <label class="o-radio--label" for="DIFFERENT_FROM_CLINIC" data-qa-id="DIFFERENT_FROM_CLINIC_label">I visit a clinic
				</label>
            </div>
        </div>
		</div>
		  Note: You can add multiple clinics one by one.
    </div>
<div id="coli_step4"   <?php if($data->clinic_type != 'OTHER'){ echo "style='display:none;'";} ?>>
<div class="col-sm-12 clinic_days padding0">
 <div>
    <div class="onboarding-label">Days</div>
    <div>
        <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
            <input type="checkbox" class="o-checkbox--oval__input" name="checkbox" id="monday-1" value="on">
            <label class="o-checkbox--oval__label" for="monday-1" data-qa-id="clinicTimings-1-monday"><span class="pos-m-m">Mo</span></label>
        </div>
        <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
            <input type="checkbox" class="o-checkbox--oval__input" name="checkbox" id="tuesday-1" value="on">
            <label class="o-checkbox--oval__label" for="tuesday-1" data-qa-id="clinicTimings-1-tuesday"><span class="pos-m-m">Tu</span></label>
        </div>
        <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
            <input type="checkbox" class="o-checkbox--oval__input" name="checkbox" id="wednesday-1" value="on">
            <label class="o-checkbox--oval__label" for="wednesday-1" data-qa-id="clinicTimings-1-wednesday"><span class="pos-m-m">We</span></label>
        </div>
        <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
            <input type="checkbox" class="o-checkbox--oval__input" name="checkbox" id="thursday-1" value="on">
            <label class="o-checkbox--oval__label" for="thursday-1" data-qa-id="clinicTimings-1-thursday"><span class="pos-m-m">Th</span></label>
        </div>
        <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
            <input type="checkbox" class="o-checkbox--oval__input" name="checkbox" id="friday-1" value="on">
            <label class="o-checkbox--oval__label" for="friday-1" data-qa-id="clinicTimings-1-friday"><span class="pos-m-m">Fr</span></label>
        </div>
        <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
            <input type="checkbox" class="o-checkbox--oval__input" name="checkbox" id="saturday-1" value="on">
            <label class="o-checkbox--oval__label" for="saturday-1" data-qa-id="clinicTimings-1-saturday"><span class="pos-m-m">Sa</span></label>
        </div>
        <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
            <input type="checkbox" class="o-checkbox--oval__input" name="checkbox" id="sunday-1" value="on">
            <label class="o-checkbox--oval__label" for="sunday-1" data-qa-id="clinicTimings-1-sunday"><span class="pos-m-m">Su</span></label>
        </div>
    </div>
</div>
 
                                    </div>
                                    <div class="col-sm-12 padding0">
                                        <div class="u-spacer-lg--top">
                                            <div class="onboarding-label" data-qa-id="session1">Sessions 1</div>
                                            <div class="pure-g">
                                                <div class="pure-u-1-2">
                                                    <select class="form-control fixhei">
                                                        <option value="0">From To</option>
                                                        <option value="1">12:15 AM</option>
                                                        <option value="1">12:30 AM</option>
                                                        <option value="1">12:45 AM</option>
                                                        <option value="1">01:00 AM</option>
                                                        <option value="1">01:15 AM</option>
                                                        <option value="1">01:30 AM</option>
                                                        <option value="1">01:45 AM</option>
                                                        <option value="1">02:00 AM</option>
                                                        <option value="1">03:15 AM</option>
                                                        <option value="1">03:30 AM</option>
                                                        <option value="1">03:45 AM</option>
                                                        <option value="1">03:00 AM</option>
                                                    </select>

                                                </div>

                                                <div class="pure-u-1-2">
                                                    <div class="Select e-timings--item e-timings--item-end Select--single has-value">
                                                        <input type="hidden" name="session-timings-end" value="00:30">

                                                        <select class="form-control fixhei">
                                                            <option value="0"> To</option>
                                                            <option value="1">12:15 AM</option>
                                                            <option value="1">12:30 AM</option>
                                                            <option value="1">12:45 AM</option>
                                                            <option value="1">01:00 AM</option>
                                                            <option value="1">01:15 AM</option>
                                                            <option value="1">01:30 AM</option>
                                                            <option value="1">01:45 AM</option>
                                                            <option value="1">02:00 AM</option>
                                                            <option value="1">03:15 AM</option>
                                                            <option value="1">03:30 AM</option>
                                                            <option value="1">03:45 AM</option>
                                                            <option value="1">03:00 AM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-sm-12 padding0">
                                        <div class="u-spacer-lg--top">
                                            <div class="onboarding-label" data-qa-id="session1">Sessions 2</div>
                                            <div class="pure-g">
                                                <div class="pure-u-1-2">
                                                    <select class="form-control fixhei">
                                                        <option value="0">From To</option>
                                                        <option value="1">12:15 AM</option>
                                                        <option value="1">12:30 AM</option>
                                                        <option value="1">12:45 AM</option>
                                                        <option value="1">01:00 AM</option>
                                                        <option value="1">01:15 AM</option>
                                                        <option value="1">01:30 AM</option>
                                                        <option value="1">01:45 AM</option>
                                                        <option value="1">02:00 AM</option>
                                                        <option value="1">03:15 AM</option>
                                                        <option value="1">03:30 AM</option>
                                                        <option value="1">03:45 AM</option>
                                                        <option value="1">03:00 AM</option>
                                                    </select>

                                                </div>

                                                <div class="pure-u-1-2">
                                                    <div class="Select e-timings--item e-timings--item-end Select--single has-value">
                                                        <input type="hidden" name="session-timings-end" value="00:30">

                                                        <select class="form-control fixhei">
                                                            <option value="0"> To</option>
                                                            <option value="1">12:15 AM</option>
                                                            <option value="1">12:30 AM</option>
                                                            <option value="1">12:45 AM</option>
                                                            <option value="1">01:00 AM</option>
                                                            <option value="1">01:15 AM</option>
                                                            <option value="1">01:30 AM</option>
                                                            <option value="1">01:45 AM</option>
                                                            <option value="1">02:00 AM</option>
                                                            <option value="1">03:15 AM</option>
                                                            <option value="1">03:30 AM</option>
                                                            <option value="1">03:45 AM</option>
                                                            <option value="1">03:00 AM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                   
 
 </div>
    
  
  

 <div class="col-sm-8 click_step2 mrt30 padding0"> 
  <a class="backiocn" href="<?=base_url();?>profile_step13"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
 </div>
								   <div class="col-sm-4 click_step2 mrt20" style="padding: 0px;">        
								 <button class="continue2" name='submit' type='submit'>Continue</button>
								 
								  								  </div>
								
						
				</div>
					<form>
		<div class="col-sm-5 mrt35">
                                    <p>
Correct operating hours will help patients in booking appointments only during your availability</p>





                              </div>
                        </div>        
                                
                        
						 </div>  
				   </div>
                </div>
              </div>
            </div>
        
   
	
<?php include ("assets/includes/footer.php"); ?>
					      <script>
		 
function myFunction() {
    var x = document.getElementById("coli_step4");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
	
}

</script>
					<script>
$(document).ready(function(){
    $("#hides_day").click(function(){
        $("#coli_step4").hide();
    });
  });
</script>