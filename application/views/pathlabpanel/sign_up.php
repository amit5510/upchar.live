<head>
    <style>
        .colorwhite{color:white;}


    </style>
</head>

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
                            <li>Pathology Sign Up</li>
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

                   <div class="col-sm-6 col-md-offset-3 box_sh_bg1">

    <h3 class="formHeading">SIGN UP FOR PATHOLOGY</h3>
<ul class="dis_inli1">
    <li class="cwhi1"><a href="<?=base_url('pathlab-login');?>">Login</a></li>
    <li ><a class="actives" href="<?=base_url('pathlab-signup');?>">Sign up</a></li>
   
  </ul>


                      

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
                       </div>
    </section>


  


    <?php $this->load->view('includes/footer.php'); ?>
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
