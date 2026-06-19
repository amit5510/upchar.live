<head>
    <link rel="icon" href="images/logo.png" type="images/logo.png" sizes="32x32">
<style>
label {
    padding: 8px;
    background: #043d5b;
    display: table;
    color: #fff;
    width: 100%;
    border-radius: 23px;
    text-align: center;
    cursor:pointer;
}
.submit{border-radius: 23px;}

input[type="file"] {
    display: none;
}
.mysubmit {
    border-radius: 18px;
    padding: 6px 63px;
    font-weight: bold;
    background: #043d5b;
    border: none;
    box-shadow: 0px -4px 2px #1c3b4c;
    color: white;
    margin-left: 19px;
}
.section-content{text-align: center;
    padding: 23px;
}
.career-header{}
.contact{}
.carrerfield{
    border-radius:23px !important;
}
</style>
</head>

<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->
<?php $this->load->view("includes/header.php"); ?>


   

         

<div class="container" style="margin-top:63px;">
         
  <div class="careplus-main-section careplus-blog-modern-full">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="careplus-fancy-title">
                                <h2>Career</h2>
                                <span><small></small><i class="fas fa-link"></i></span>
                            </div>
                            
                            <!--contact page-->
                            
<section id="contact">
		
			
		
			<div class="contact-section">
			<div class="container">
			    <form action="<?=base_url()?>Home/career" method="post" enctype="multipart/form-data">
			    <div class="row">
				<div class="col-md-12" style="background: white;padding:23px;border-radius: 0px 29px;">
				    	<h3 style="color: #295771;font-weight:bold;">BECOME AN INSIDER</h3>
					<div class="col-md-6 form-line">
			  			<div class="form-group">
			  			
					    	<input type="text" class="form-control carrerfield" name="name" id="" placeholder=" Enter Name">
				  		</div>
				  		<div class="form-group">
					    
					    	<input type="email" class="form-control carrerfield" name="email" id="exampleInputEmail" placeholder=" Enter Email id">
					  	</div>	
					  	
			  		</div>
			  		<div class="col-md-6">
			  		    	<div class="form-group">
					    
					    	<input type="tel" class="form-control carrerfield" id="telephone" name="mobile" placeholder=" Enter 10-digit mobile no.">
			  			</div>
			  			
			  			<div class="form-group">
			  			 <label id="#bb"> Enter Your File
                        <input type="file" id="File"   size="60" >
                        </label> 
			  			</div>
			  			<div>

			  			
			  			</div>
			  			
					</div>
					
					<button type="button" class="mysubmit">Submit </button>
					</div>
				</form>
				</div>
			</div>
			</div>
		</section>
<!--close page coding-->
                            
                        
                        </div>

                    </div>
                </div>
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
				window.location="<?=base_url();?>doctor-login";
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
				myalert('opps'+response.msg);
			}
			console.log( response );			
		}
		});
	});		
	
	</script>