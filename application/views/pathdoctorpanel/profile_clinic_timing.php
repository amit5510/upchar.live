<?php include ("assets/includes/header.php"); ?>
<?php include ("assets/includes/leftmenu.php"); ?>
<style>
   .add_tims_day {
      border-bottom: 1px solid #d6d6d6;
      margin-top: 19px;
      cursor: pointer;
      padding-bottom: 15px;
      font-weight: bold;
  }
  
  .mrgt25 {
      margin-top: 25px;
  }
  
.remove_project_file img {
      width: 26px;
      margin-top: 14px;
  }



</style>
        <div class="pag_cstm">
         
          <div class="row">
		   <div class="col-lg-12">
              <div class="pag_cstm_panel">
                <div class="pag_cstm_panel_panel_ontent p-t-0">
                  <div class="row paddb40">
                
				<form action='' method='post' enctype="multipart/form-data">
				
					
					

            
                               	<div class="col-sm-5 processsstep2">
								<h4>Clinic Timings</h4>
								
								<p class="step1">Dr. <?=$this->session->userdata('drusername');?></p>
								
								  
								  <div class="u-spacer-lg--top">
			
    <div class="onboarding-label u-spacer-lg--top">Clinic hours</div>
    <div class="col-sm-12 padding0 mrtop4">

	
                     <div class="col-sm-12 processsstep2" id="days_wrapper">
	
		<?php if(@$timing_count>0){ 
			foreach($timings as $key=>$timing){
		?>
              
                                    <div id="add_div"  class='add_div'>
                                        <div class="col-sm-12 clinic_days padding0">
                                            <div>
											<input type='hidden' id='hiddenday' name='hiddenday' value='<?=$timing_count;?>'>
                                                <div class="onboarding-label">Days:</div>
                                                <div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input" name='mon[<?=$key;?>]' id="monday-<?=$key-1;?>-1" value="1" <?=($timing->M)?'checked' : ''; ?> >
                                                        <label class="o-checkbox--oval__label" for="monday-<?=$key-1;?>-1" data-qa-id="clinicTimings-1-monday"><span class="pos-m-m">Mo</span></label>
                                                    </div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input"  name='tue[<?=$key;?>]' id="tuesday-<?=$key-1;?>-1" value="1"  <?=($timing->T)?'checked' : ''; ?>>
                                                        <label class="o-checkbox--oval__label" for="tuesday-<?=$key-1;?>-1" data-qa-id="clinicTimings-1-tuesday"><span class="pos-m-m">Tu</span></label>
                                                    </div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input"  name='wed[<?=$key;?>]' id="wednesday-<?=$key-1;?>-1" value="1"  <?=($timing->W)?'checked' : ''; ?>>
                                                        <label class="o-checkbox--oval__label" for="wednesday-<?=$key-1;?>-1" data-qa-id="clinicTimings-1-wednesday"><span class="pos-m-m">We</span></label>
                                                    </div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input"  name='thu[<?=$key;?>]' id="thursday-<?=$key-1;?>-1" value="1"  <?=($timing->TH)?'checked' : ''; ?>>
                                                        <label class="o-checkbox--oval__label" for="thursday-<?=$key-1;?>-1" data-qa-id="clinicTimings-1-thursday"><span class="pos-m-m">Th</span></label>
                                                    </div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input"  name='fri[<?=$key;?>]' id="friday-<?=$key-1;?>-1" value="1"  <?=($timing->F)?'checked' : ''; ?>>
                                                        <label class="o-checkbox--oval__label" for="friday-<?=$key-1;?>-1" data-qa-id="clinicTimings-1-friday"><span class="pos-m-m">Fr</span></label>
                                                    </div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input" name='sat[<?=$key;?>]' id="saturday-<?=$key-1;?>-1" value="1"  <?=($timing->SA)?'checked' : ''; ?>>
                                                        <label class="o-checkbox--oval__label" for="saturday-<?=$key-1;?>-1" data-qa-id="clinicTimings-1-saturday"><span class="pos-m-m">Sa</span></label>
                                                    </div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input"  name='sun[<?=$key;?>]' id="sunday-<?=$key-1;?>-1" value="1"  <?=($timing->S)?'checked' : ''; ?>>
                                                        <label class="o-checkbox--oval__label" for="sunday-<?=$key-1;?>-1" data-qa-id="clinicTimings-1-sunday"><span class="pos-m-m">Su</span></label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-12 padding0 sessions_wrapper" id="sessions_wrapper">
				<?php 
			$sessions=$this->db->get_where('timing_session',array('timing_id'=>@$timing->id))->result();
							foreach($sessions as $session){ ?>
                                            <div class="u-spacer-lg--top" id="session_box">
                                                <div class="onboarding-label" data-qa-id="session1">Sessions </div>
                                                <div class="pure-g">
                                                    <div class="pure-u-1-2">
                                                        <select class="form-control fixhei"  name="fromtime[<?=$key;?>][]" required>
                                                            <option value="">From </option>
															<?php
											$start = "00:00"; //you can write here 00:00:00 but not need to it
											$end = "23:30";

											$tStart = strtotime($start);
											$tEnd = strtotime($end);
											$tNow = $tStart;
											$timeoption='';
											while($tNow <= $tEnd){
												$timeoption.= '<option value=\''.date("H:i",$tNow).'\'>'.date("h:i A",$tNow).'</option>';
												$tNow = strtotime('+15 minutes',$tNow);
											}
											echo $timeoption;
										?>
											<option value="<?=date("H:i",strtotime($session->from_timing));?>" selected><?=date("h:i A",strtotime($session->from_timing));?></option>				
                                                        </select>

                                                    </div>

                                                    <div class="pure-u-1-2">
                                                        <div class="Select e-timings--item e-timings--item-end Select--single has-value">
                                                            <input type="hidden" name="session-timings-end" value="00:30">

                                                            <select class="form-control fixhei"  name="totime[<?=$key;?>][]" required>
                                                                <option value=""> To</option>
                                                  	<?=$timeoption;?>	
													<option value="<?=date("H:i",strtotime($session->to_timing));?>" selected><?=date("h:i A",strtotime($session->to_timing));?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
			<?php } ?>
											 
											 
                                        </div>
 <button type='button' class="continue2 addmore_sessions"  data-dayblock-id='<?=$key;?>'>Add More Sessions </button>
                                      

                                    </div>
                                

                               
								
        
		<?php 
			}
		}else{ ?>
              
                                    <div id="add_div"  class='add_div'>
                                        <div class="col-sm-12 clinic_days padding0">
                                            <div>
											<input type='hidden' id='hiddenday' name='hiddenday' value='1'>
                                                <div class="onboarding-label">Days</div>
                                                <div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input" name='mon[0]' id="monday-0-1" value="on" >
                                                        <label class="o-checkbox--oval__label" for="monday-0-1" data-qa-id="clinicTimings-1-monday"><span class="pos-m-m">Mo</span></label>
                                                    </div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input"  name='tue[0]' id="tuesday-0-1" value="on">
                                                        <label class="o-checkbox--oval__label" for="tuesday-0-1" data-qa-id="clinicTimings-1-tuesday"><span class="pos-m-m">Tu</span></label>
                                                    </div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input"  name='wed[0]' id="wednesday-0-1" value="on">
                                                        <label class="o-checkbox--oval__label" for="wednesday-0-1" data-qa-id="clinicTimings-1-wednesday"><span class="pos-m-m">We</span></label>
                                                    </div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input"  name='thu[0]' id="thursday-0-1" value="on">
                                                        <label class="o-checkbox--oval__label" for="thursday-0-1" data-qa-id="clinicTimings-1-thursday"><span class="pos-m-m">Th</span></label>
                                                    </div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input"  name='fri[0]' id="friday-0-1" value="on">
                                                        <label class="o-checkbox--oval__label" for="friday-0-1" data-qa-id="clinicTimings-1-friday"><span class="pos-m-m">Fr</span></label>
                                                    </div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input" name='sat[0]' id="saturday-0-1" value="on">
                                                        <label class="o-checkbox--oval__label" for="saturday-0-1" data-qa-id="clinicTimings-1-saturday"><span class="pos-m-m">Sa</span></label>
                                                    </div>
                                                    <div class="o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop">
                                                        <input type="checkbox" class="o-checkbox--oval__input"  name='sun[0]' id="sunday-0-1" value="on">
                                                        <label class="o-checkbox--oval__label" for="sunday-0-1" data-qa-id="clinicTimings-1-sunday"><span class="pos-m-m">Su</span></label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-12 padding0 sessions_wrapper" id="sessions_wrapper">
                                            <div class="u-spacer-lg--top" id="session_box">
                                                <div class="onboarding-label" data-qa-id="session1">Sessions </div>
                                                <div class="pure-g">
                                                    <div class="pure-u-1-2">
                                                        <select class="form-control fixhei"  name="fromtime[0][]" required>
                                                            <option value="">From </option>
															<?php
											$start = "00:00"; //you can write here 00:00:00 but not need to it
											$end = "23:30";

											$tStart = strtotime($start);
											$tEnd = strtotime($end);
											$tNow = $tStart;
											$timeoption='';
											while($tNow <= $tEnd){
												$timeoption.= '<option value=\''.date("H:i:s",$tNow).'\'>'.date("h:i A",$tNow).'</option>';
												$tNow = strtotime('+15 minutes',$tNow);
											}
											echo $timeoption;
										?>
															
                                                        </select>

                                                    </div>

                                                    <div class="pure-u-1-2">
                                                        <div class="Select e-timings--item e-timings--item-end Select--single has-value">
                                                            <input type="hidden" name="session-timings-end" value="00:30">

                                                            <select class="form-control fixhei"  name="totime[0][]" required>
                                                                <option value=""> To</option>
                                                  	<?=$timeoption;?>	
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
											
											 <div class="u-spacer-lg--top" id="session_box2">
                                                <div class="onboarding-label" data-qa-id="session1">Sessions</div>
                                                <div class="pure-g">
                                                    <div class="pure-u-1-2">
                                                        <select class="form-control fixhei"  name="fromtime[0][]">
                                                            <option value="">From To</option>
                                                           	<?=$timeoption;?>
                                                        </select>

                                                    </div>

                                                    <div class="pure-u-1-2">
                                                        <div class="Select e-timings--item e-timings--item-end Select--single has-value">
                                                            <input type="hidden" name="session-timings-end" value="00:30">

                                                            <select class="form-control fixhei"  name="totime[0][]">
                                                                <option value=""> To</option>
                                                            <?=$timeoption;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                   
                                           
                                  
                                            </div>

                                        </div>
 <button type='button' class="continue2 addmore_sessions" data-dayblock-id='0'>Add More Sessions </button>
                                      

                                    </div>
                                

                               
                                   
			<?php } ?>	
 </div>
								

                                <div class="col-sm-12 hoslist_he mrtop">
                                    <span>
Correct operating hours will help patients in booking appointments only during your availability</span>
                                    <div class="box">In a big box</div>
                                </div>
								
								<div class="col-sm-12 padd0">                                        
                                            <p class="add_tims_day"  data-dayblock-id='<?php if($timing_count>0){echo $timing_count-1;}else{echo '0';}?>'> ADD TIMING FOR REMAINING DAYS</p>
                                   
                                    </div>
                                    </div>
			
                                  <div class="col-sm-8 click_step2  padding0">
                                        <a class="backiocn" href="<?=base_url();?>profile_clinic_timing"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
                                    </div>
                                    <div class="col-sm-4 click_step2  padding0">
                                        
                                            <button class="continue2"  name='submit' type='submit'>Continue</button>
                                        

                                    </div>
									 

                                </div>
</div>
								
						
				 

                           

                                <div class="col-sm-5 hoslist_he ">
                                    <p>2.5M patients are looking for a doctor on Upchar. Verify your credential and reach out to them</p>
                                </div>       
                                
                           

                        </div>  
						 </div>  
				   </div>
                </div>
              </div>
            </div>
        
         
          			<?php include ("assets/includes/footer.php"); ?>
		
            <script>
                $(document).ready(function() {
                    $("body").on('click','.add_tims_day',function() {
						
				var dblockid = $(this).attr('data-dayblock-id');
				dblockid=  parseInt(dblockid)+1;
				$(this).attr('data-dayblock-id',dblockid);
				
				//	var hiddendayseq = parseInt($('#hiddenday').val());
				$('#hiddenday').val( parseInt($('#hiddenday').val()) +1 );
				
                        $("#days_wrapper").append("<hr><div id='add_div' class='add_div'><div class='col-sm-12 clinic_days padding0 mrgt25 deepak1'> <div> <div class='onboarding-label'>Days</div><div> <div class='o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop'> <input type='checkbox' class='o-checkbox--oval__input' name='mon["+dblockid+"]' id='monday-"+dblockid+"-1' value='on'> <label class='o-checkbox--oval__label' for='monday-"+dblockid+"-1' data-qa-id='clinicTimings-1-monday'><span class='pos-m-m'>Mo</span></label> </div><div class='o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop'> <input type='checkbox' class='o-checkbox--oval__input' name='tue["+dblockid+"]' id='tuesday-"+dblockid+"-1' value='on'> <label class='o-checkbox--oval__label' for='tuesday-"+dblockid+"-1' data-qa-id='clinicTimings-1-tuesday'><span class='pos-m-m'>Tu</span></label> </div><div class='o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop'> <input type='checkbox' class='o-checkbox--oval__input' name='wed["+dblockid+"]' id='wednesday-"+dblockid+"-1' value='on'> <label class='o-checkbox--oval__label' for='wednesday-"+dblockid+"-1' data-qa-id='clinicTimings-1-wednesday'><span class='pos-m-m'>We</span></label> </div><div class='o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop'> <input type='checkbox' class='o-checkbox--oval__input' name='thu["+dblockid+"]' id='thursday-"+dblockid+"-1' value='on'> <label class='o-checkbox--oval__label' for='thursday-"+dblockid+"-1' data-qa-id='clinicTimings-1-thursday'><span class='pos-m-m'>Th</span></label> </div><div class='o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop'> <input type='checkbox' class='o-checkbox--oval__input' name='fri["+dblockid+"]' id='friday-"+dblockid+"-1' value='on'> <label class='o-checkbox--oval__label' for='friday-"+dblockid+"-1' data-qa-id='clinicTimings-1-friday'><span class='pos-m-m'>Fr</span></label> </div><div class='o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop'> <input type='checkbox' class='o-checkbox--oval__input' name='sat["+dblockid+"]' id='saturday-"+dblockid+"-1' value='on'> <label class='o-checkbox--oval__label' for='saturday-"+dblockid+"-1' data-qa-id='clinicTimings-1-saturday'><span class='pos-m-m'>Sa</span></label> </div><div class='o-checkbox--oval u-d-inlineblock u-spacer-sm--right__mobile u-spacer-lg--right__desktop'> <input type='checkbox' class='o-checkbox--oval__input' name='sun["+dblockid+"]' id='sunday-"+dblockid+"-1' value='on'> <label class='o-checkbox--oval__label' for='sunday-"+dblockid+"-1' data-qa-id='clinicTimings-1-sunday'><span class='pos-m-m'>Su</span></label> </div></div></div></div><div class='col-sm-12 padding0 sessions_wrapper'> <div class='u-spacer-lg--top'> <div class='onboarding-label' data-qa-id='session1'>Sessions </div><div class='pure-g'> <div class='pure-u-1-2'> <select class='form-control fixhei' name='fromtime["+dblockid+"][]' ><option value=''> From</option><?=$timeoption;?></select>  </div><div class='pure-u-1-2'> <div class='Select e-timings--item e-timings--item-end Select--single has-value'> <input type='hidden' name='session-timings-end' value='00:30'> <select class='form-control fixhei' name='totime["+dblockid+"][]' ><option value=''> To</option><?=$timeoption;?></select> </div></div></div></div></div><button type='button' class='continue2 addmore_sessions' data-dayblock-id='"+dblockid+"'>Add More Sessions </button><a href='#' class='remove_project_file' border='2'><img src='/assets/images/delete.png' /></a></div>");
                    });
					
					$('#days_wrapper').on('click', '.remove_project_file', function(e) {
    e.preventDefault();

    $(this).parent().remove();
});
                });
            </script>
			
			
			<script>
                $(document).ready(function() {
                    $("body").on('click','.addmore_sessions',function() {
						var dblockid = $(this).attr('data-dayblock-id');
				
                       // $("#sessions_wrapper").
						$(this).parent().find('.sessions_wrapper').append("<div class='u-spacer-lg--top' id='session_box2'> <div class='onboarding-label' data-qa-id='session1'>Sessions</div><div class='pure-g'> <div class='pure-u-1-2'>  <select class='form-control fixhei'  name='fromtime["+dblockid+"][]' ><option value=''> From</option><?=$timeoption;?></select> </div><div class='pure-u-1-2'> <div class='Select e-timings--item e-timings--item-end Select--single has-value'> <input type='hidden' name='session-timings-end' value='00:30'>  <select class='form-control fixhei'  name='totime["+dblockid+"][]' ><option value=''> To</option>   <?=$timeoption;?></select> </div></div></div><a href='#' class='remove_project_file' border='2'><img src='/assets/images/delete.png' /></a> </div>");
                    });
					
					$('#days_wrapper').on('click', '.remove_project_file', function(e) {
    e.preventDefault();

    $(this).parent().remove();
});
                });
            </script>