<head>
    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
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
                        <h1>Reset Password</h1>

                    </div>
                </div>
            </div>
        </div>
        <div class="careplus-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li><a href="<?=base_url();?>">Homepage</a></li>
                            <li ><a href="<?=base_url('login');?>">Login</a></li>							
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->
<div class="container">
    <div class="row">
		<form action='<?=base_url();?>User/forgotpass' method='post' id='forgotform'>
			<div class="col-sm-6 col-md-offset-3 borders" id="designforform">
                <div class="box-header"><h2>Forgot Password</h2></div>
				<div class="label_name">                 
					<p style="color:black;">Provide us the email id/ mobile of your Upchar account and we will send you an otp with instructions to reset your password.</p>
						<h6 style="font-weight:bold;">Enter Email Or Mobile</h6>
						<input value="" type="" name="mobile" class="form-control" Placeholder='Enter Registered Email or Mobile' required>
					<button type="submit" class="btn common-btn practo-btn" style="float:right;margin-top: 10px!important;border:none;color: white;background: #93b53c;">Submit
					</button>
				</div>                 
            </div>
		</form>
		<form id='forgototpform' action='<?=base_url();?>user/verifyforgototp' method='post' style='display:none;'>
			<div class="col-sm-4 col-md-offset-4 borders" id="designforform">                          
				<div class="box-header">
					<h4 style="font-weight:bold;">Enter OTP</h4>
				</div>                            
				<div class="label_name">                                                 
				<p></p><h6>Enter OTP Number ( 6 Digit )</h6>                                   
				<input  type="text" name="otp" class="form-control" required>      
				<button type="submit" class="btn  btn-lg common-btn practo-btn" style="margin-top: 10px!important;"> Submit </button>       
				<div class='pull-right '> <a href='#' class='pull-right resendotp'>Resend OTP</a></div>      </div>                                                                                                    
			</div>
		</form>
		<form id='forgotnewpassform' action='<?=base_url();?>user/setnewpass' method='post' style='display:none;'>
			<div class="col-sm-4 col-md-offset-4 borders" id="designforform">   
				<div class="box-header"><h4 style="font-weight:bold;">Set New Password</h4></div>                            
				<div class="label_name">                                                 
					<p></p>                                   
					<span>Create New Password</span>                                  
					<input  type="Password" name="pass" class="form-control" required>      
					<button type="submit" class="btn  btn-lg common-btn practo-btn" style="margin-top: 10px!important;" > Submit </button>             
				</div>    
			</div>
		</form>
    </div>
</div>
<?php include ('includes/footer.php'); ?>