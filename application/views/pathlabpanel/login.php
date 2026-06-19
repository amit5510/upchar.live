<style>
.box_backgroundimage {
    background-image: url(images/banner-1.jpg);
    background-size: 123% 100%;
    background-position: -34px -1px;
}
.loginimage {
     height: 122px;
    margin: 4px 17px 11px 52px;
}
.logincat {
    background: #295771;
    color: white;
    padding: 13px 16px;
    font-weight: bold;
    border-radius: 15px 15px 15px 0px;
    margin-top: 12px;
}

</style>

<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->
<?php $this->load->view("includes/header_new.php"); ?>

<!--
    <div class="careplus-subheader">

        <div class="careplus-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li><a href="<?=base_url();?>">Homepage</a></li>
                            <li>Pathology Login </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->
    <section id="doctor_list">
        
         <div class="container">
            <div class="row">
            <div class="col-md-12 box_backgroundimage"> 
             <div class="col-md-1"></div>
            <div class="col-sm-6" style="text-align: right;padding:129px 40px 11px 0px;">
              <div>
             <!-- <img class="loginimage" src="images/Upchar_footer.png">
              
              <hr style="box-shadow: 0px -2px 3px #295771;border-top:1px solid #295771;">-->
            </div>
            <h1>Pathology Login<br> & Better Service's</h1>
              <h5>Upchar Provides You Whole Medical Services Online.</h5>
            
            <div class="row" style="margin:23px 0px">
              <a href="#" class="logincat">Doctor</a>
              <a href="#" class="logincat">Hospital</a>
              <a href="#" class="logincat">Pathology</a>
              <a href="#" class="logincat">Medicine</a>
            </div>
            </div>


     <div class="col-sm-4 box_sh_bg1">

    
      
  <ul class="nav nav-tabs nav-justified dis_inli">
    <li class="active"><a data-toggle="pill" href="#home">Login</a></li>
    <li><a data-toggle="pill" href="#menu1">Sign Up</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">

                        <div class="col-sm-12 borders">
                            <div class="label_name">
                   <form id='pathloginform' action='<?=base_url();?>pathlabuser/login' method='post'>
                                 <h4 class="logintitle">Mobile Number / Email ID</h4>
                                  <input  type="text" name="email" class="form-control" required>
                                   <h4 class="logintitle">Password</h4>
                                  <input  type="Password" name="password" class="form-control" required><br>
                                    <a id="forgetpassworduser" href="<?=base_url('pathlab-forgotpassword');?>" >Forgot password?</a>
                                   
      <button type="submit" class="btn  btn-lg common-btn practo-btn"> Login  </button>
	   </form>
	   
      <!-- <div class="hr-container">
          <hr class="hr-inline" align="left">
          <span class="hr-text"> or </span>
          <hr class="hr-inline" align="right">
      </div>
       <div>
          <a href="<?=base_url();?>Fbauth" class="btn  btn-lg connect-facebook-btn" id="facebookbtn">
              <span class="facebookIcon">
<i class="fa fa-facebook" aria-hidden="true"></i> Connect with Facebook
              </span>
          
         </a>
		 
		 <a href="<?=base_url();?>Google" class="btn  btn-lg connect-facebook-goole">
              <span class="google">
              <i class="fa fa-google-plus" aria-hidden="true"></i> Connect with Google+
              </span>
           
         </a>
		 

      </div>-->
         </div>                 
                 </div>
                       </div> 
                       
                       
                       
     <div id="menu1" class="tab-pane fade">  
     
<div class="col-sm-12 borders">
    <form  id='pathregistrationform' action='<?=base_url();?>Pathlabuser/register' method='post'>
                            <div class="label_name">
                   
                                <h6 class="logintitle">Full Name</h6>
                                  <input value="" type="text" name="name" class="form-control" required>
								   <h6 class="logintitle">E-Mail</h6>
                                  <input value="" type="email" name="email" class="form-control" required >
                                  <h6 class="logintitle">Mobile Number</h6>
                                  <input value="" type="text" name="mobile" class="form-control" onkeypress="return isNumber(event)"  required>

                                   <h6 class="logintitle">Password</h6>
                                  <input placeholder="Password" type="Password" id='password' pattern="(?=.*\d)(?=.*[a-z]).{6,}" name="password" class="form-control" required>
                                  <i onclick="myFunction()" class="fa fa-eye" style="font-size:24px;float:right;margin: -29px 4%;"></i>
                                  <div class="registrationFormAlert" id="divPasswordValidationResult">
                                  </div>
                                  <div class="forget-pasword">
                                      
    
      </div>
      <button type="submit" class="btn  btn-lg common-btn practo-btn"> Register
       </button>
     
         </div>  
         </form>
                                
                           

                        </div>

                </div>         
                     </div>   
                       

    <!-----

<div class="col-sm-5 col-md-offset-4 borders">
                            <div class="label_name">
                   
                                 <span>Full Name</span>
                                  <input value="Full Name" type="text" name="name" class="form-control">
                                   <span>Mobile Number</span>
                                  <input value="Mobile Number" type="text" name="name" class="form-control">

                                  <span>Create Password</span>
                                  <input value="Mobile Number" type="Password" name="name" class="form-control">
                                  <div class="forget-pasword">
    
      </div>
      <button type="submit" class="btn  btn-lg common-btn practo-btn"> Send OTP
       </button>
     
         </div>                 
                                
                           

                        </div>---->



    
      </div>
            </div>
      
      

        
                      </div>
                       </div>
    </section>


  


    <?php $this->load->view('includes/footer.php'); ?>
	<script>
	$('#pathloginform').submit(function(e) {		
		e.preventDefault(e);		
		/* $('button[type=submit], input[type=submit]').prop('disabled',true); */		
		var myform=$(this);		
		$.ajax({			
			type: "POST",			
			url: myform.attr('action'),			
			data: myform.serialize(),			
			success: function( response ) {				 
				response = JSON.parse(response);				
				if(response.status=='success'){
					window.location="<?=base_url();?>pathlab-dashboard";				
				}				
				else if(response.status=='otp'){					
					window.location="<?=base_url();?>pathlab-verifymobile";								
				}
				else if(response.status=='failed'){					
					alert(response.msg);									
				}else{					
					alert('opps'+response.msg);				
				}				
				console.log( response );			
			}		
		});			
	});		
	
	</script>
	
	<script>	
	$('#pathregistrationform').submit(function(e) {		
		e.preventDefault(e);		
		/* $('button[type=submit], input[type=submit]').prop('disabled',true); */		
		var myform=$(this);		
		$.ajax({			
			type: "POST",			
			url: myform.attr('action'),			
			data: myform.serialize(),			
			success: function( response ) {			
				response = JSON.parse(response);				
				if(response.status=='success'){					
					window.location="<?=base_url();?>pathlab-verifymobile";				
				}				
				else if(response.status=='failed'){					
					alert(response.msg);									
				}else{					
					alert('opps'+response.msg);				
				}				
				console.log( response );			
			}		
		});			
	});
	</script>
	<script>
      
function validatePassword() {
    var password = $("#password").val();
    

    if (password.match(/^(?=.*\d)(?=.*[a-z]).{6,}/))
        $("#divPasswordValidationResult").html("password is correct");
    else
         $("#divPasswordValidationResult").html("please enter alpha numeric");
   
}

$(document).ready(function () {
   $("#password").keyup(validatePassword);
});      
    </script>
    <script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
	