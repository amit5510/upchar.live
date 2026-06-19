<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->
<?php $this->load->view("includes/header.php"); ?>


    <div class="careplus-subheader">
        <div class="careplus-subheader-image">
            <span class="careplus-dark-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Doctor Panel</h1>

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
                            <li>Login / Sign Up</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

         <div class="container">
            <div class="row">
                        <div class="col-sm-4 col-md-offset-4 borders">
                          <div class="box-header">Type OTP Number</div>
                            <div class="label_name">                 
                                <p></p>
                                   <span>Type OTP Number 6 Digit</span><form id='drsignupotpform' action='<?=base_url();?>Pathdoctoruser/verifysignupotp' method='post'>
                                  <input  type="Password" name="otp" class="form-control">
      <button type="submit" class="btn  btn-lg common-btn practo-btn" style="margin-top: 10px!important;"> Send       </form>
         </div>                 
                                
                    <div class='pull-right '> <a href='#' class='pull-right drresendotp'>Resend OTP</a></div>       

                        </div>

    
  
    
    
      </div>
          </div>



  


    <?php $this->load->view('includes/footer.php'); ?>
	
	<script>
	$('#drsignupotpform').submit(function(e) {		
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
				window.location="<?=base_url();?>pathdoctor-dashboard";
				//window.location="<?=$this->session->userdata('last_page');?>";					
			}else if(response.status=='failed'){					
				alert(response.msg);									
			}else{
				alert('opps'+response.msg);
			}
			console.log( response );			
		}
		});
	});	
	$('.drresendotp').click(function(e) {		
		e.preventDefault(e);		
		/* $('button[type=submit], input[type=submit]').prop('disabled',true); */		
		//var myform=$(this);		
		$.ajax({			
		type: "POST",			
		url: '<?=base_url();?>Pathdoctoruser/resendsignupotp',//myform.attr('action'),			
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