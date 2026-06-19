<head>
    <style>
#designforform{
    border-radius: 0px 29px;
    background: white;
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
                        <h1>Hospital Forget Password</h1>

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
                            <li ><a href="<?=base_url('hospital-login');?>">Login</a></li>							
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->

         <div class="container">
            <div class="row"><form action='<?=base_url();?>hospitaluser/forgotpass' method='post' id='hosforgotform'>
                        <div class="col-sm-6 col-md-offset-3 borders" id="designforform">
                            
                            
                            
                            
                            
                          <div class="box-header"><h2>Forgot Password</h2></div>
                            <div class="label_name" style="color:black;">                 
                                <p>Provide us the email id/ mobile of your Upchar account and we will send you an otp with instructions to reset your password.</p>
                        <h6 style="font-weight: bold;">Enter Email Or Mobile</h6>
                                  <input value="" type="" name="mobile" class="form-control" Placeholder='Enter Registered Email or Mobile' required>
      <button type="submit" class="btn common-btn practo-btn" style="float:right;margin-top: 10px!important;border:none;color: white;background: #93b63c;">Submit</button>
         </div>                 
                        </div></form>
						
<form id='hosforgototpform' action='<?=base_url();?>hospitaluser/verifyforgototp' method='post' style='display:none;'>
 <div class="col-sm-4 col-md-offset-4 borders" id="designforform">                          
 <div class="box-header"><h4 style="font-weight:bold;">Enter OTP</h4></div>                           
 <div class="label_name">                                               
 <p></p>                                  
 <h6>Enter OTP Number ( 6 Digit )</h6>                                  
 <input  type="text" name="otp" class="form-control" required>      
 <button type="submit" class="btn  btn-lg common-btn practo-btn" style="margin-top: 10px!important;color: white;background: #ed3237"> Submit </button>             
 </div>
<div class='pull-right '> <a href='#' class='pull-right hospresendfotp' style="background: #295771;font-weight: bold;color: white;padding: 10px;">Resend OTP</a></div> 
 </div>
 </form>
 
 <form id='hosforgotnewpassform' action='<?=base_url();?>hospitaluser/setnewpass' method='post' style='display:none;'>
 <div class="col-sm-4 col-md-offset-4 borders" id="designforform">                         
 <div class="box-header"><h4 style="color:black;">Set New Password</h4></div>                            
 <div class="label_name">                                                
 <p> </p>                                 
 <h6 style="color:black;">Create New Password</h6>                                 
 <input  type="Password" name="pass" class="form-control" required>      <button type="submit" class="btn  btn-lg common-btn practo-btn" style="margin-top: 10px!important;"> Submit </button>            
 </div>                                                                                                    
 </div>
 </form>
    
  
    
    
      </div>
          </div>



  


    <?php $this->load->view('includes/footer.php'); ?>
	 <script>
	$('#hosforgotform').submit(function(e) {		
		e.preventDefault(e);		
		var myform=$(this);		
		$.ajax({			
			type: "POST",			
			url: myform.attr('action'),			
			data: myform.serialize(),			
			success: function( response ) {				 
				response = JSON.parse(response);				
				if(response.status=='success'){
				$('#hosforgotform').hide();
				$('#hosforgototpform').show();
				}else{					
					alert('oops '+response.msg);				
				}				
				console.log( response );			
			}		
		});			
	});		
	
	
	$('#hosforgototpform').submit(function(e) {		
		e.preventDefault(e);		
		var myform=$(this);		
		$.ajax({			
		type: "POST",			
		url: myform.attr('action'),			
		data: myform.serialize(),			
		success: function( response ) {				
			response = JSON.parse(response);				
			if(response.status=='success'){										
					$('#hosforgototpform').hide();
				$('#hosforgotnewpassform').show();
			}else if(response.status=='failed'){					
				alert(response.msg);									
			}else{
				alert('oops '+response.msg);
			}
			console.log( response );			
		}
		});
	});		
	
	$('#hosforgotnewpassform').submit(function(e) {		
		e.preventDefault(e);		
		var myform=$(this);		
		$.ajax({			
		type: "POST",			
		url: myform.attr('action'),			
		data: myform.serialize(),			
		success: function( response ) {				
			response = JSON.parse(response);				
			if(response.status=='success'){										
				window.location="<?=base_url();?>hospital-login";
			}else if(response.status=='failed'){					
				alert(response.msg);									
			}else{
				alert('oops '+response.msg);
			}
			console.log( response );			
		}
		});
	});		
	$('.hospresendfotp').click(function(e) {		
		e.preventDefault(e);		
		/* $('button[type=submit], input[type=submit]').prop('disabled',true); */		
		//var myform=$(this);		
		$.ajax({			
		type: "POST",			
		url: '<?=base_url();?>hospitaluser/resendforgetotp',//myform.attr('action'),			
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