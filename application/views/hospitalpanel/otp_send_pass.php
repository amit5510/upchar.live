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


    <div class="careplus-subheader">
        <div class="careplus-subheader-image">
            <span class="careplus-dark-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Hospital Panel</h1>

                    </div>
                </div>
            </div>
        </div>
        <div class="careplus-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li><a href="<?=base_url()?>">Homepage</a></li>
                            <li>Login / Sign Up</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

         <div class="container">
            <div class="row">
                        <div class="col-sm-4 col-md-offset-4 borders" id="designforform">
                          <div class="box-header">OTP Number</div>
                            <div class="label_name">                 
                                <p></p>
                                   <span>Type OTP Number 6 Digit</span><form id='hossignupotpform' action='<?=base_url();?>hospitaluser/verifysignupotp' method='post'>
                                  <input  type="text" name="otp" class="form-control">
      <button type="submit" class="btn  btn-lg common-btn practo-btn" style="margin-top: 10px!important;"> Send       </form>
         </div>                 
                      <div class='pull-right '> <a href='#' class='pull-right hospresendotp'>Resend OTP</a></div>          
                           

                        </div>

    
  
    
    
      </div>
          </div>



  


    <?php $this->load->view('includes/footer.php'); ?>
	
	<script>
	$('#hossignupotpform').submit(function(e) {		
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
				window.location="<?=base_url();?>hospital-dashboard";
				//window.location="<?=$this->session->userdata('last_page');?>";					
			}else if(response.status=='failed'){					
				alert(response.msg);									
			}else{
				alert('oops '+response.msg);
			}
			console.log( response );			
		}
		});
	});	
	$('.hospresendotp').click(function(e) {		
		e.preventDefault(e);		
		/* $('button[type=submit], input[type=submit]').prop('disabled',true); */		
		//var myform=$(this);		
		$.ajax({			
		type: "POST",			
		url: '<?=base_url();?>hospitaluser/resendsignupotp',//myform.attr('action'),			
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