<head>

    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">

    <style>
.aboutCont {
    background: white;
    padding: 14px 0px;
    border-radius: 0px 24px;
    margin-top: 31px;
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

<?php include ("includes/header.php"); ?>
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

                <div class="container">
                            <div class="row">
                               
                                <!--  <img src="images/logo.png" class="centerLogo">  -->
                            </div>


                              <div class="col-md-12 aboutCont">  

                              <div class="">
                                <h3 class="text-center"><b>About Us</b></h3>
                                
                               

                                <h6><b>NATURE AND APPLICABILITY OF TERMS</b></h6>


                                  <p>
                                    Please carefully go through these terms and conditions (“Terms”) and the privacy policy available at https://www.Upcharr.com/company/privacy (“Privacy Policy”)before you decide to access the Website or avail the services made available on the Website by Upchar. These Terms and the Privacy Policy together constitute a legal agreement (“Agreement”) between you and Upchar in connection with your visit to the Website and your use of the Services (as defined below).
                                    The Agreement applies to you whether you are -

                                  </p>



<ul>
  <li><i class="fa fa-caret-right" aria-hidden="true"></i> A medical practitioner or health care provider (whether an individual professional or an organization (“Practitioner(s)”, “you” or “User”); or</li>
  <li><i class="fa fa-caret-right" aria-hidden="true"></i> A patient, his/her representatives or affiliates, searching for Practitioners through the Website (“End-User”, “you” or “User”); or</li>
  <li><i class="fa fa-caret-right" aria-hidden="true"></i> Otherwise a user of the Website (“you” or “User”).</li>


</ul>


<h6><b>This Agreement applies to those services made available by Upchar on the Website, which are offered free of charge to the Users (“Services”), including the following:</b></h6>


<ul>
  <li><i class="fa fa-caret-right" aria-hidden="true"></i>
For Practitioners: Listing of Practitioners and their profiles and contact details, to be made available to the other Users and visitors to the Website.</li>
<li><i class="fa fa-caret-right" aria-hidden="true"></i> For other Users: Facility to (i) create and maintain ‘Health Accounts’, (ii) search for Practitioners by name, specialty, and geographical area, or any other criteria that may be developed and made available by Upchar, and (iii) to make appointments with Practitioners.</li>
</ul>

<p>The Services may change from time to time, at the sole discretion of Upchar, and the Agreement will apply to your visit to and your use of the Website to avail the Service, as well as to all information provided by you on the Website at any given point in time.</p>
<p>This Agreement defines the terms and conditions under which you are allowed to use the Website and describes the manner in which we shall treat your account while you are registered as a member with us. If you have any questions about any part of the Agreement, feel free to contact us at <a href="#">support@Upchar.com.</a></p>

<p>By downloading or accessing the Website to use the Services, you irrevocably accept all the conditions stipulated in this Agreement, the Subscription Terms of Service and Privacy Policy, as available on the Website, and agree to abide by them. This Agreement supersedes all previous oral and written terms and conditions (if any) communicated to you relating to your use of the Website to avail the Services. By availing any Service, you signify your acceptance of the terms of this Agreement.</p>

<p>We reserve the right to modify or terminate any portion of the Agreement for any reason and at any time, and such modifications shall be informed to you in writing You should read the Agreement at regular intervals. Your use of the Website following any such modification constitutes your agreement to follow and be bound by the Agreement so modified.
You acknowledge that you will be bound by this Agreement for availing any of the Services offered by us. If you do not agree with any part of the Agreement, please do not use the Website or avail any Services.</p>

<p>Your access to use of the Website and the Services will be solely at the discretion of Upchar.
The Agreement is published in compliance of, and is governed by the provisions of Indian law, including but not limited to:</p>

<ul>
  <li><i class="fa fa-caret-right" aria-hidden="true"></i> The Indian Contract Act, 1872,</li>
  <li><i class="fa fa-caret-right" aria-hidden="true"></i> The (Indian) Information Technology Act, 2000, and</li>
  <li><i class="fa fa-caret-right" aria-hidden="true"></i> The rules, regulations, guidelines and clarifications framed there under, including the (Indian) Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Information) Rules, 2011 (the “SPI Rules”), and the (Indian) Information Technology (Intermediaries Guidelines) Rules, 2011 (the “IG Rules”).</li>
</ul>
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