<head>
    <style>
.headingrefound {
    background: #295771;
    color: white;
    padding: 2px 23px;
}
.firstletterfont::first-letter { 
  font-size: 150%;
  color: #295771;
}
#searchBTN {
    width: 100%;
    margin-top: 0px;
    box-shadow: 0px -4px 6px #00000091;
    padding: 12px;
    border: none;
    background-color: #043d5b;
    color: white;
    margin-top: 5px;
}
    </style>
</head>
<?php include ("includes/header_new.php"); ?>


<div class="clearfix"></div>

<form action='<?=base_url();?>search' method='GET'>
                <div class="box-form">
                      
      
                    <div class="col-sm-2 col-sm-offset-1">
                        <div class="input-group shadow">
                            <span class="input-group-addon"> <i class="fa fa-map-marker"> &nbsp; &nbsp; </i></span>
                            <input type="text" class="form-control ui-autocomplete-input" name="location" placeholder="Location" id="hintcity" autocomplete="off">
                            <input type="hidden" class="form-control" name="city" id="city">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" id="hint" class="form-control ui-autocomplete-input" name="keyword" placeholder="Search Hospitals/Doctors/Clinics etc" autocomplete="off">
                        </div>
                        
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                            <select class="form-control" name="spl">
              <option value="">-Specialization-</option>
                                              <?php foreach($specialization as $s){ ?>
                                <option value='<?=$s->id;?>'><?=$s->name;?></option>
							<?php } ?>
                                               
                            </select>
                        </div>
                        
                    </div>
            <div class="col-sm-1">
                <button class="careplus-booking-btn careplus-bgcolor-two" id="searchBTN"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>




                    <div class="clearfix"></div>
                </div>
                </form>

                <div class="container" style="margin-top:43px;">
                            <div class="row">
                               
                                <!--  <img src="images/logo.png" class="centerLogo">  -->
                            </div>


                              <div class="col-md-12" style="padding: 18px 29px;border-radius:0px 52px;box-shadow:0px -3px 11px 0px #08080873;background: #fff;">  

                              <div class="">
                                <h3 class="text-center" style="color: #2a5872;font-weight: bold;">Refund and Cancellation Policy</h3>
                                
                               

								
								
								
<h4 class="headingrefound">Cancellation and Refund Policy</h4>
<p class="firstletterfont">For cancellation and refund policy, read more.</span></strong></p>
<h4 class="headingrefound">Express Disclaimers</h4>
<p class="firstletterfont">Consult is intended for general purposes only and is not meant to be used in emergencies/serious illnesses requiring physical consultation. Further, if the Practitioner adjudges that a physical examination would be required and advises &lsquo;in-person consultation&rsquo;, it is the sole responsibility of the User, to book an appointment for physical examination and in-person consultation whether the same is with the Practitioner listed on the Website or otherwise. In case of any negligence on the part of the User in acting on the same and the condition of the User deteriorates, Upchar shall not be held liable.</p>
<p>Upchar is not a medical service provider, nor is it involved in providing any healthcare or medical advice or diagnosis, it shall hence not be responsible and owns no liability to either Users or Practitioners for any outcome from the consultation between the User and the Practitioner.</p>
<p>Consult is a platform being made available to Users to assist them to obtain consultation from Practitioners and does not intend to replace the physical consultation with the Practitioner.</p>
<h4 class="headingrefound">Terms for Practitioners</h4>
<p class="firstletterfont">The Practitioner shall promptly reply to the User after receiving User&rsquo;s communication. In case of non-compliance with regard to adhering to the applicable laws/rules/regulations/guidelines by the Practitioner, Upchar shall have the right to replace such Practitioners for the purpose of consultation to the User or remove such Practitioners from the platform/Upchar application/site; Read more on guidelines here.</p>
<p>The Practitioner understands and agrees that, Upchar shall at its sole discretion, at any time be entitled to, show as other Practitioners available for consultation.</span></strong></p>
<p>The Practitioner further understands that, there is a responsibility on the Practitioner to treat the User, paripassu, as the Practitioner would have otherwise treated the User on a physical one-on-one consultation model.</span></strong></p>
<p>The Practitioner has the discretion to cancel any consultation at any point in time in cases where the Practitioner feels, it is beyond his/her expertise or his/her capacity to treat the User. In such cases, it may trigger a refund to the User and the User has the option of choosing other Practitioners. However, it is strongly recommended that the Practitioner advise the User and explain appropriately for next steps.</p>
<p>The Practitioner shall at all times ensure that all the applicable laws that govern the Practitioner shall be followed and utmost care shall be taken in terms of the consultation being rendered.</span></strong></p>
<p>The Practitioner acknowledges that should Upchar find the Practitioner to be in violation of any of the applicable laws/rules/ regulations/guidelines set out by the authorities then Upchar shall be entitled to cancel the consultation with such Practitioner or take such other legal action as may be required.</span></strong></p>
<p>The payment gateway option is being provided to the Users to make payment easier. In case wrong bank account details are provided by Practitioner, Upchar will not be responsible for loss of money, if any. In case of there being any technical failure, at the time of transaction and there is a problem in making payment, you could contact support@upchar.shop.</p>
<p>It is further understood by the Practitioner that the information that is disclosed by the User at the time of consultation is personal information and is subject to all applicable privacy laws, shall be confidential in nature and subject to User and Practitioner privilege.</span></strong></p>
<p>The Practitioner understands that the certain Consult features (such as follow-up feature) shall be available only if the same has been enabled by the Practitioner and that the maximum number of messages that Practitioner can send and the number of days for which follow-up will be active for, shall be as set by the Practitioner.</p>
<p>The Practitioner understands that when a User books a time-slot with the Practitioner for online consultation, the Practitioner must comply with the time slot to the best of their availability. In case of delay, the doctor must notify User to their best possible ability.</span></strong></p>
<p>The Practitioner understands that Upchar makes no promise or guarantee for any uninterrupted communication and the Practitioner shall not hold Upchar liable, if for any reason the communication is not delivered to the User(s), or are delivered late or not accessed, despite the efforts undertaken by Upchar.</p>
<p>It shall be the responsibility of the Practitioner to ensure that the information provided by User is accurate and not incomplete and understand that Upchar shall not be liable for any errors in the information included in any communication between the Practitioner and User.</span></strong></p>
<p>The Practitioner shall indemnify and hold harmless Upchar and its affiliates, subsidiaries, directors, officers, employees and agents from and against any and all claims, proceedings, penalties, damages, loss, liability, actions, costs and expenses (including but not limited to court fees and attorney fees) arising due to the services provided by Practitioner, violation of any law, rules or regulations by the Practitioner or due to such other actions, omissions or commissions of the Practitioner that gave rise to the claim.</p>
								
								
								
								
                        </div>
                                </div>
                        </div>
                
      




<!-- Footer Code-->


<?php include ('includes/footer.php'); ?>
<div class="clearfix"></div>
  



<script type="text/javascript">
  $('.carousel').carousel({
  interval: 3000
})
</script>

<script>
$(document).ready(function(){
  $(".showPartners").mouseover(function(){
    $("#showBox").css("display", "block");
    
  });

  $(".close").click(function(){
    $("#showBox").css("display", "none");
    
  });

  $(".showPartners").click(function(){
    $("#showBox").css("display", "none");
    
  });
  
});


</script>


</body>
</html>
