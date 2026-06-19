<head>
    <link rel="icon" href="images/logo.png" type="images/logo.png" sizes="32x32">
<style>


.box_backgroundimage {
    background-image: url(images/banner-1.jpg);
    border-radius: 0px 37px;
    margin-top: 12px;
}

.loginimage {
     height: 122px;
    margin: 4px 17px 11px 52px;
}


.titlelogin{
  color: white;
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
</head>
<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->
<?php include ("includes/header_new.php"); ?>


   <!--  <div class="careplus-subheader">

        <div class="careplus-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                           <li><a href="index.html">Homepage</a></li>
                            <h1 align="center">Login / Sign Up</h1>
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
            <div class="col-sm-6" style="text-align:right;padding: 141px 36px">
             
                  
             <!--<img class="loginimage" src="images/Upchar_footer.png"> 
             
              <hr style="box-shadow: 0px -2px 3px #295771;border-top:1px solid #295771;">-->
            
            <h1>Better Advice<br> & Better Healthcare</h1>
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

                        <div class="col-sm-12">
                            <div class="label_name">
                   <form id='loginform' action='<?=base_url();?>User/login' method='post'>
                                 <h6 class="logintitle">Mobile Number / Email ID</h6>
                                  <input  type="text" name="email" class="form-control" required>
                                   <h6 class="logintitle">Password</h6>
                                 
                                  <input type="Password" name="password" class="form-control" required >
                                    <br />
                                    <a id="forgetpassworduser" href="<?=base_url('forgotpassword');?>" >Forgot password?</a>
      <button type="submit" class="btn  btn-lg common-btn practo-btn"> Login  </button>
     </form>
     
       <div class="hr-container">
          <hr class="hr-inline" align="left">
          <span class="hr-text"> or </span>
          <hr class="hr-inline" align="right">
      </div>
       <div>

          <a href="<?=base_url();?>Fbauth" class="btn  btn-lg connect-facebook-btn" id="facebookbtn">
              <span class="facebookIcon">
<i class="fa fa-facebook-official" aria-hidden="true"></i> Connect with Facebook
              </span>
          
         </a>
     
     <a href="<?=base_url();?>Google" class="btn  btn-lg connect-facebook-goole">
              <span class="google">
              <i class="fa fa-google-plus" aria-hidden="true"></i> Connect with Google+
              </span>
           
         </a>
     

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
     
    <div id="menu1" class="tab-pane fade">
                   <div class="col-sm-12">


<div class="col-sm-12"><form id='registrationform' action='<?=base_url();?>User/register' method='post' >
                            <div class="label_name">
                   
                                 <h6 class="logintitle">Full Name</h6>
                                  <input value="" type="text" name="name" id='name' class="form-control" required>
								  <h6 class="logintitle">E-Mail</h6>
                                  <input value="" type="email" name="email" id='email' class="form-control" >
                                   <h6 class="logintitle">Mobile Number</h6>
                                  <input value="" type="text" name="mobile" id='mobile' class="form-control"  onkeypress="return isNumber(event)" required>

                                   <h6 class="logintitle">Password</h6>
                                  <input placeholder="Password" type="Password" id='password' name="password"  pattern="(?=.*\d)(?=.*[a-z]).{6,}" class="form-control" required>
                                <i onclick="myFunction()" class="fa fa-eye" style="font-size:24px;float:right;margin: -29px 4%;"></i>
                                 <div class="registrationFormAlert" id="divPasswordValidationResult">
                                </div>
                                  <div class="forget-pasword">
                                      
    
      </div>
      <div class="form-group" style="margin-top: 15px;">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck" style="display:inline;">
      <h6 style="color:black;display:inline;"> Agree to <a style="color:black;text-decoration: underline;" href="<?=base_url();?>tnc">Terms & Conditions</a></h6>
      </label>
      <div class="invalid-feedback">
        <span style="color:white;transition:0.3s;background:red;font-size: 10px; padding: 2px 17px; border-radius: 0px 12px;">You must agree before submitting.</span>
      </div>
    </div>
  </div>
      <button type="submit" class="btn  btn-lg common-btn practo-btn" id="sub_button" disabled> Register
       </button>
     
         </div>                 </form>
           <div class="hr-container">
          <hr class="hr-inline" align="left">
          <span class="hr-text"> or </span>
          <hr class="hr-inline" align="right">
      </div>
                                

                        </div>



    
      </div>
      </div>
      
      
      </div>
                    <div class="col-md-1"></div>
                      </div>
                    </div>
                       </div>
    </section>


  


    <?php include ('includes/footer.php'); ?>
    
     <script>
(function() {
'use strict';
window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('#registrationform');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
form.addEventListener('submit', function(event) {
if (form.checkValidity() === false) {
event.preventDefault();
event.stopPropagation();
}
form.classList.add('was-validated');
}, false);
});
}, false);
})();
</script>
<style>
h1.hidden {
  display: none;
}
</style>

<script>
    $(function () {
        $("#invalidCheck").click(function () {
            if ($(this).is(":checked")) {
                $(".invalid-feedback").hide();
                 $('#sub_button').removeAttr('disabled'); //enable input
            } else {
               
                $(".invalid-feedback").show();
                  $('#sub_button').attr('disabled', true); //disable input
            }
        });
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