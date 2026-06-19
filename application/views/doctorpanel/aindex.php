<head>
    <style>
#designforform{
    border-radius: 0px 29px;
    background:white;
    padding: 20px;
    margin-top: 47px;
    box-shadow:0px -2px 8px #173242;
}

.bottomBtns{
    border-radius: 5px;
    letter-spacing: 1px;
    padding: 6px 41px;
    background: #295771; 
    color: white; 
    float:right;
    margin-right:12px;
}
.bottomBtns:hover{
    color:#c0c4c5;
}
    </style>
</head>
<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->
<?php $this->load->view("includes/header.php"); ?>

<!--
    <div class="careplus-subheader">
        <div class="careplus-subheader-image">
            <span class="careplus-dark-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Doctor Panel Forget Password</h1>

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
                            <li ><a href="<?=base_url('doctor-login');?>">Login</a></li>							
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->

         <div class="container">
            <div class="row"><form action='<?=base_url();?>Doctoruser/otppass' method='post' id='drforgotform'>
                         
                              <div class="col-sm-6 col-md-offset-3 borders" id="designforform">
                          <div class="box-header"><h4>Upchar Doctor Email / Mobile</h4></div>
                            <div class="label_name">                 
                               
                                   
                                  <input value="" type="" name="mobile" class="form-control" Placeholder='Enter Registered Email or Mobile' required>
                                  <p style="font-size:16px;font-family:Calibri;colo:red;padding: 10px 17px; ">You will receive an OTP on your registered mobile number <br> Login First time with OTP then create your password by `Clicking` Change Password in dashboard. </p>
     
    <div class="row"> 
      <button type="submit" class="btn" style="border-radius: 5px;letter-spacing: 1px;padding: 6px 41px;background: #295771;color: white;float:left;margin-left: 27px;">Login With Otp</button>

        <a id="forgetpassworduser" class="bottomBtns" href="<?=base_url('doctor-login');?>">Login</a>
     </div>
         </div>                 
                        </div></form>
						
<form id='drforgototpform' action='<?=base_url();?>Doctoruser/verifyforgototp' method='post' style='display:none;'>
 <div class="col-sm-4 col-md-offset-4 borders" id="designforform">                          
 <div class="box-header"><h4 style="font-weight:bold;">Enter OTP</h4></div>                           
 <div class="label_name">                                               
                             
 <h6>Enter OTP Number ( 6 Digit )</h6>                                  
 <input  type="text" name="otp" class="form-control" required>      
 <button type="submit" class="btn  btn-lg common-btn practo-btn" style="margin-top: 10px!important;color: white;background: #ed3237"> Submit </button>  
 </div> 
<div class='pull-right '> <a href='#' class='pull-right drresendfotp' style="background: #295771;font-weight: bold;color: white;padding: 10px;">Resend OTP</a></div> 

 </div>
 </form>
 
 <form id='drforgotnewpassform' action='<?=base_url();?>Doctoruser/setnewpass' method='post' style='display:none;'>
 <div class="col-sm-4 col-md-offset-4 borders" id="designforform">                         
 <div class="box-header">Set New Password</div>                            
 <div class="label_name">                                                
 <p> </p>                                 
 <span>Create New Password</span>                                 
 <input  type="Password" name="pass" class="form-control" required>      <button type="submit" class="btn  btn-lg common-btn practo-btn" style="margin-top: 10px!important;" required> Submit </button>            
 </div>                                                                                                    
 </div>
 </form>
    
  
    
    
      </div>
          </div>

   
	 <script>
	
		$('#drforgotform').submit(function(e) {		
		e.preventDefault(e);		
		var myform=$(this);		
		$.ajax({			
			type: "POST",			
			url: myform.attr('action'),			
			data: myform.serialize(),			
			success: function( response ) {				 
				response = JSON.parse(response);				
				if(response.status=='success'){
				$('#drforgotform').hide();
				$('#drforgototpform').show();
				}else{					
					alert('oops '+response.msg);				
				}				
				console.log( response );			
			}		
		});			
	});		
	
	
	$('#drforgototpform').submit(function(e) {		
		e.preventDefault(e);		
		var myform=$(this);		
		$.ajax({			
		type: "POST",			
		url: myform.attr('action'),			
		data: myform.serialize(),			
		success: function( response ) {				
			response = JSON.parse(response);				
			if(response.status=='success'){										
					$('#drforgototpform').hide();
				$('#drforgotnewpassform').show();
			}else if(response.status=='failed'){					
				alert(response.msg);									
			}else{
				alert('oops '+response.msg);
			}
			console.log( response );			
		}
		});
	});		
	
	$('#drforgotnewpassform').submit(function(e) {		
		e.preventDefault(e);		
		var myform=$(this);		
		$.ajax({			
		type: "POST",			
		url: myform.attr('action'),			
		data: myform.serialize(),			
		success: function( response ) {				
			response = JSON.parse(response);				
			if(response.status=='success'){										
				window.location="<?=base_url();?>doctor-login";
			}else if(response.status=='failed'){					
				alert(response.msg);									
			}else{
				alert('oops '+response.msg);
			}
			console.log( response );			
		}
		});
	});		
	$('.drresendfotp').click(function(e) {		
		e.preventDefault(e);		
		/* $('button[type=submit], input[type=submit]').prop('disabled',true); */		
		//var myform=$(this);		
		$.ajax({			
		type: "POST",			
		url: '<?=base_url();?>doctoruser/resendforgetotp',//myform.attr('action'),			
		//data: myform.serialize(),			
		success: function( response ) {				
			response = JSON.parse(response);				
			if(response.status=='success'){										
				//window.location="<?=base_url();?>";
				myalert(response.msg);
				//window.location="<?=$this->session->userdata('last_page');?>";					
			}else if(response.status=='failed'){					
				myalert(response.msg);									
			}else{
				myalert('oops '+response.msg);
			}
			console.log( response );			
		}
		});
	});		
	
	</script>