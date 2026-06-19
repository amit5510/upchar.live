<head>
    <style>
#designforform{
    border-radius: 0px 29px;
    background:white;
    padding: 20px;
    margin-top: 47px;
    box-shadow:0px -2px 8px #173242;
}
    </style>
</head>
<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->
<?php include ("includes/header.php"); ?>

<!--
    <div class="careplus-subheader">
        <div class="careplus-subheader-image">
            <span class="careplus-dark-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>User Mobile Verification </h1>

                    </div>
                </div>
            </div>
        </div>
        <div class="careplus-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li><a href="index.html">Homepage</a></li>
                            <li>Login / Sign Up</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->

         <div class="container">
            <div class="row">
                        <div class="col-sm-4 col-md-offset-4 borders" id="designforform">
                          <div class="box-header"><h4 style="font-weight:bold;">Enter OTP</h4></div>
                          
                          
                            <div class="label_name">                 
                                <p></p>
                                   <h6>Enter OTP Number ( 6 Digit )</h6> 
                                   <form id='signupotpform' action='<?=base_url();?>user/verifysignupotp' method='post'>
                                  <input  type="text" name="otp" class="form-control" required>
      <button type="submit" class="btn  btn-lg common-btn practo-btn" style="margin-top: 10px!important;color: white;background: #ed3237">submit</button></form>
         </div>                 
                                
                       <div class='pull-right '> <a href='#' class='pull-right resendotp' style="background: #295771;font-weight: bold;color: white;padding: 10px;">Resend OTP</a></div>    

                        </div>

    
  
    
    
      </div>
          </div>



  


    <?php include ('includes/footer.php'); ?>