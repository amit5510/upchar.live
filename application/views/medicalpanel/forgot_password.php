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
                            <li ><a href="<?=base_url('medical-login');?>">Login</a></li>							
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->

         <div class="container">
            <div class="row"><form action='<?=base_url();?>Medicaluser/forgotpass' method='post' id='drforgotform'>
                        
                              <div class="col-sm-4 col-md-offset-4 borders" id="designforform">
                          <div class="box-header"><h2>Forgot Password</h2></div>
                            <div class="label_name">                 
                                <p style="color:black;">Provide us the email id/ mobile of your Upchar account and we will send you an otp with instructions to reset your password.</p>
                                   <hr><h6 style="width: 226px;padding: 1px 23px;color: white;background: #ed3237;">Enter Email Or Mobile</h6>
                                  <input value="" type="" name="mobile" class="form-control" Placeholder='Enter Registered Email or Mobile' required>
      <button type="submit" class="btn  btn-lg common-btn practo-btn" style="margin-top: 10px!important;border:none;color: white;background: #ed3237;">Submit
       </button>
         </div>                 
                        </div></form>
						
<form id='drforgototpform' action='<?=base_url();?>Medicaluser/verifyforgototp' method='post' style='display:none;'>
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
 
 <form id='drforgotnewpassform' action='<?=base_url();?>Medicaluser/setnewpass' method='post' style='display:none;'>
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



  


    <?php $this->load->view('includes/footer.php'); ?>
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
					alert('opps'+response.msg);				
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
				alert('opps'+response.msg);
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
				window.location="<?=base_url();?>medical-login";
			}else if(response.status=='failed'){					
				alert(response.msg);									
			}else{
				alert('opps'+response.msg);
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
		url: '<?=base_url();?>medicaluser/resendforgetotp',//myform.attr('action'),			
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
				myalert('opps'+response.msg);
			}
			console.log( response );			
		}
		});
	});		
	
	</script>