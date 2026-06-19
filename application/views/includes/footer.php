<?php 
$userlogin=$this->Userlogin_Model->c_count();
?>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<footer id="careplus-footer" class="careplus-footer-one">
    <span class="careplus-footer-transparent"></span>
	<!--// Footer Widget \\-->
	<div class="careplus-footer-widget">
		<div class="container">
			<div class="row">
				<!--// Widget Contact Info \\-->
				<aside class="col-md-4 widget widget_contact_info">
					<a href="<?=base_url();?>" class="footer-logo"><img src="<?=base_url();?>images/Upchar_footer.png" alt="" style="height: 100px;margin-bottom:0px;"></a>
					<p>Workboat Media Private Limited (â€œUPCHARâ€) is the author and publisher of the internet resource <a href="https://www.upchar.shop" target='_blank' style="text-decoration: none;
					color: #008CBA;"> https://www.upchar.shop</a> and the mobile application â€˜Upcharâ€™ (together, â€œWebsiteâ€). Upchar owns and operates the services provided through the Website..<br>
					<a href="<?=base_url();?>aboutus" class="careplus-readmore-btn">read more <span></span></a>   </p>
				</aside>
				<!--// Widget Contact Info \\-->
				<!--// Widget Useful Link \\-->
				<aside class="col-md-4 widget widget_useful_link">
					<h2 class="careplus-footer-title">Useful Links</h2>
					<ul id="mobilefooter">
						<li><a href="<?=base_url();?>aboutus">About Us</a></li>
						<li><a href="<?=base_url();?>Home/services">Our services</a></li>
						<li><a href="<?=base_url();?>refund_cancellation">Refund & Cancellation</a></li>
						<li><a href="<?=base_url();?>Home/career">Careers</a></li>
						<li><a href="<?=base_url();?>privacy">Privacy Policy</a></li>
						<li><a href="<?=base_url();?>Home/contactus">Contact Us</a></li>
						<li><a href="<?=base_url();?>tnc">Term And condition</a></li>
						<li><a href="<?=base_url();?>Upchar_Patient.apk">Download App</a></li>
						<li><a href="#" target='_blank'>Workboat Media Pvt Ltd</a></li>
					</ul>
				</aside>
				<aside class="col-md-4 widget widget_contact_info" >
					<h2 class="careplus-footer-title">Contact Us</h2>
					<ul>
						<li>
							<h6>Call Us At:</h6>
							<span>Customer care NO - 844-844-0603</span>
						</li>
						<li>
							<h6>Mail Us At:</h6>
							<a href="mailto:info@upchar.shop">hello@upchar.shop - info@upchar.shop</a>
						</li>
						<li>
							<h6>Our Location:</h6>
							<span>N8/251 A-1-11 Newada Sundarpur B.H.U to D.L.W Street,varanasi,Uttar pradesh 221005 </span>
						</li>
					</ul>
				</aside>
				<!--// Widget Newsletter \\-->
			</div>
		</div>
	</div>
	<!--// Footer Widget \\-->
	<!--// Copy Right \\-->
	<div class="careplus-copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>Upchar <i class="fa fa-copyright"></i> 2019, All Right Reserved  </p>
					<a href="#" class="careplus-back-top"><i class="fa fa-angle-up"></i></a>
					<ul class="careplus-footer-social">
						<li><a href ="#">
							<h5 style="margin-right: 281px;
								background: white;
								padding: 3px 34px;
								border-radius: 34pc;
								color: black;;"> Views <?php echo $userlogin;?>
							</h5>
						</li>
						<li><a href="https://www.facebook.com/Upchar-online-Medical-solution-2187443094907268/?__tn__=kC-R&eid=ARDE9OXjTMIV4M7qlTFvSeN_jXXgDb1ZMzAfbesehXye06-TPEb2zP6-V8gqb__crERRdMn_Quqod_pL&hc_ref=ARQBi9NRQDujn9jDDz0Q4mWg06mQ_iD_XcCTuEyXwZ-e3Vq-q-769KIvpe1ie3rUrr0&__xts__%5B0%5D=68.ARDRzHqnWmt3fGAyBanIFx6lk0MLXmWnCbqdsE7vdw-oMqsZt6WR97juTtgAnO1uxFD0nMrYXQJ9_fe-A11H1XEe6Agc5R2Kkph8u3cj1g3wAwOJwQ9UCtRpQJtW1N3bThb9E7ruKNoqW-C-KCB6cge-5wzaoHuhzpFchHWhf-8zAZxJKzt2zc5ivrL_7KrBTcdxcGIYKBpUDt1yMusdWop9PMH0mRlknIFlHUejyZ3V4gdpKQ5rL7uLAjKifXeO_CEj_kdSDmWeOTGXR76MwDlaRznc-A3Fn72G/" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
						<li><a href="https://twitter.com/amitkum35423465" target="_blank" ><i class="fab fa-twitter-square"></i></a></li>
						<li><a href="https://pk.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
						<li><a href="https://plus.google.com/104908238854277970882/" target="_blank"><i class="fab fa-google-plus-square"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--// Copy Right \\-->
</footer>
<!--// Footer \\-->
<div class="clearfix"></div>
<!--// Main Wrapper \\-->
<!-- Modal -->
<div class="modal fade searchmodal" id="searchmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
		<div class="modal-body">
			<a href="#" class="careplus-close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
			<form>
				<input type="text" value="Type Your Keyword" onblur="if(this.value == '') { this.value ='Type Your Keyword'; }" onfocus="if(this.value =='Type Your Keyword') { this.value = ''; }">
				<input type="submit" value="">
				<i class="fa fa-search"></i>
			</form>
		</div>
    </div>
</div>
<div id="conmermation"/>
    <div class="modal fade" id="myModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="col-sm-6 borders confer">
						<form method='post' action='<?=base_url();?>home/bookappointment' id='app_conf_form'>
							<div class="careplus-fancy-titles">
							  <h2>Confirm Appointment</h2>
							  <input value="" type="text" id="app_conf_pop_doctorid" style="display:none;" name="app_doctor" class="form-control">
							</div>
							<div class="label_name">
								<label>Choose your Date</label>
								<!-- <input  type="text" placeholder="click to show Datepicker" class="form-control" id="example1" >-->
								<select class="form-control" name='app_date' id='app_conf_pop_date' required></select>
								<label>Select Time<span>*</span></label>
								<select class="form-control" name='app_time' id='app_conf_pop_time' required></select>
								<label>Patient/Visitor Name<span>*</span></label>
								<input value="<?=@$userdata['name'];?>" type="text" name="app_name" id='app_conf_name' class="form-control" required>
								<label style="color:black;">Mobile Number<span>*</span></label>
								<input value="<?=@$userdata['mobile'];?>" type="text" name="app_mobile" id='app_conf_mobile' class="form-control" onkeypress="return isNumber(event)"  required>
								<label style="color:black;">E-mail Id</label>
								<input value="<?=@$userdata['email'];?>" type="email" name="app_email" class="form-control" >
								<?php if($this->session->userdata('userid')==''){ ?>
								<div style='display:none;' id='app_conf_otp'>
									<label style="color:black;">Send OTP<span>*</span></label>
									<input value="" type="text" name="app_otp" class="form-control" required>
								</div>
								<?php } ?>
								<?php if($this->session->userdata('userid')==''){ ?>
								<p style=" margin-top: 10px;">You will receive an SMS with a verification code on this number</p>
								<p>By booking the appointment, you agree to Upchar's <a href="#">Terms and Conditions.</a></p>
								<button type="button" id='app_conf_otp_submit' class="btn  btn-lg common-btn con_done">Send OTP    </button>
								<button type="submit" style='display:none;' id='app_conf_submit' class="btn  btn-lg common-btn con_done">Verify & Book Appointment </button>
								<?php }else{ ?>
								<p style=" margin-top: 6px;">By booking the appointment, you agree to Upchar's <a href="#">Terms and Conditions.</a></p>
								<button type="submit" id='app_conf_submit' class="btn  btn-lg common-btn con_done">Book Appointment </button>
								<?php } ?>
							</div>
						</form>
					</div>
					<div class="col-sm-6 right_box" id='app_conf_pop_doctor'>
						<div class="col-md-4">
							<img src="extra-images/team-list-img1.jpg" alt="">
						</div>
						<div class="col-md-8">
							<div class="doc_nam_inf" >
								<span>Loading...</span>
								<ul>
									<li>Loading... </li>
									<li>Loading... </li>
									<li><b>Loading...</b></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-6 right_box" id='app_conf_pop_institute'>
						<div class="col-md-4">
							<img src="images/dentist.png" alt="">
						</div>  
						<div class="col-md-8">
							<div class="doc_nam_inf">
								<span>Dr. Birendra Kumar Pawar</span>
								<ul>
									<li>579, Pocket C/8 , Sector-8 , Madhuban Chowk, Metro Pillar No. 373, Delhi </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer"></div>
			</div>
		</div>
    </div>
</div>
<script type="text/javascript">
	// When the document is ready
	$(document).ready(function () {

		$('#example1').datepicker({
			format: "dd/mm/yyyy"
		});

	});
</script>
<script>
function isNumber(evt) 
{
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<script type="text/javascript" src="<?=base_url();?>css/bootstrap-datepicker.js"></script>
<script>
	$('#registrationform').submit(function(e) {
		e.preventDefault(e);
		/* $('button[type=submit], input[type=submit]').prop('disabled',true); */
		var myform=$(this);
    var validation = true;
    var email = $('#email').val();
    var mobile = $('#mobile').val();
    var name = $('#name').val();
    var password = $('#password').val();
    if(email!='' && !isEmail(email)){
      validation=false;
      myalert('Please Enter a Valid Email Address','Invalid');
      return false;
    }
    if(mobile=='' || mobile.length !=10 ){
      validation=false;
      myalert('Please Enter a Valid Mobile Number','Invalid');
      return false;
    }
    if(name=='' || name.length <3 ){
      validation=false;
      myalert('Please Enter your Valid Name','Invalid');
      return false;
    }
    if(password=='' || password.length <8 ){
      validation=false;
      myalert('Please Enter atleast 8 Character Password','Invalid');
      return false;
    }
    if(validation==true){
		$.ajax({
			type: "POST",
			url: myform.attr('action'),
			data: myform.serialize(),
			success: function( response ) {
				response = JSON.parse(response);
				if(response.status=='success'){
					window.location="<?=base_url();?>verifymobile";
				}
				else if(response.status=='failed'){
					myalert(response.msg);
				}else{
					myalert('opps'+response.msg);
				}
				console.log( response );
			}
		});
    }		
	});
	</script>
	<script>
	$('#loginform').submit(function(e) {
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
				//location.reload();
				window.location="<?=$this->session->userdata('last_page');?>";
				}
				else if(response.status=='otp'){
					window.location="<?=base_url();?>verifymobile";
				}
				else if(response.status=='failed'){
					myalert(response.msg);
				}else{
					myalert('opps'+response.msg);
				}
				console.log( response );
			}
		});
	});

	</script>
	<script>
	$('#forgotform').submit(function(e) {
		e.preventDefault(e);
		var myform=$(this);
		$.ajax({
			type: "POST",
			url: myform.attr('action'),
			data: myform.serialize(),
			success: function( response ) {
				response = JSON.parse(response);
				if(response.status=='success'){
				//window.location="<?=$this->session->userdata('last_page');?>";
				//window.location="<?=base_url();?>verifymobileforgot";
				$('#forgotform').hide();
				$('#forgototpform').show();
				}else{
					myalert('opps'+response.msg);
				}
				console.log( response );
			}
		});
	});

	</script>
	<script>
	$('#signupotpform').submit(function(e) {
		e.preventDefault(e);
		/* $('button[type=submit], input[type=submit]').prop('disabled',true); */
		var myform=$(this);


	//if(validation==true){
		$.ajax({
		type: "POST",
		url: myform.attr('action'),
		data: myform.serialize(),
		success: function( response ) {
			response = JSON.parse(response);
			if(response.status=='success'){
				//window.location="<?=base_url();?>";
				window.location="<?=$this->session->userdata('last_page');?>";
			}else if(response.status=='failed'){
				myalert(response.msg);
			}else{
				myalert('opps'+response.msg);
			}
			console.log( response );
		}
		});
	//}
	});
	$('.resendotp').click(function(e) {
		e.preventDefault(e);
		/* $('button[type=submit], input[type=submit]').prop('disabled',true); */
		//var myform=$(this);
		$.ajax({
		type: "POST",
		url: '<?=base_url();?>user/resendsignupotp',//myform.attr('action'),
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
	$('.resendfotp').click(function(e) {
		e.preventDefault(e);
		/* $('button[type=submit], input[type=submit]').prop('disabled',true); */
		//var myform=$(this);
		$.ajax({
		type: "POST",
		url: '<?=base_url();?>user/resendforgetotp',//myform.attr('action'),
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

	$('#forgototpform').submit(function(e) {
		e.preventDefault(e);
		var myform=$(this);
		$.ajax({
		type: "POST",
		url: myform.attr('action'),
		data: myform.serialize(),
		success: function( response ) {
			response = JSON.parse(response);
			if(response.status=='success'){
				//window.location="<?=base_url();?>";
				//window.location="<?=$this->session->userdata('last_page');?>";
				$('#forgototpform').hide();
				$('#forgotnewpassform').show();
			}else if(response.status=='failed'){
				myalert(response.msg);
			}else{
				myalert('opps'+response.msg);
			}
			console.log( response );
		}
		});
	});

	$('#forgotnewpassform').submit(function(e) {
		e.preventDefault(e);
		var myform=$(this);
		$.ajax({
		type: "POST",
		url: myform.attr('action'),
		data: myform.serialize(),
		success: function( response ) {
			response = JSON.parse(response);
			if(response.status=='success'){
				window.location="<?=base_url();?>login";
				//window.location="<?=$this->session->userdata('last_page');?>";
				//$('#forgototpform').hide();
				//$('#forgotnewpassform').show();
			}else if(response.status=='failed'){
				myalert(response.msg);
			}else{
				myalert('opps'+response.msg);
			}
			console.log( response );
		}
		});
	});

	$('body').on('click','.getappointment',function(e) {
		e.preventDefault(e);
		$('#app_conf_pop_doctor').html('');
		$('#app_conf_pop_date').html('');
		$('#app_conf_pop_time').html('');
		$('#app_conf_pop_institute').html('');
			var did = $(this).attr('data-upchar-did');
			$('#app_conf_pop_doctorid').val(did);
		 $.ajax({
			  type: "POST",
			  //data: {id : menuId},
			  //dataType: "html"
              url: "<?=base_url();?>home/app_conf_pop_doctor?doctor="+did,
              success: function( data ) {
				  $('#app_conf_pop_doctor').html(data);
			  }
            });
		$.ajax({
			  type: "POST",
			 // data: {id : menuId},
			  //dataType: "html"
              url: "<?=base_url();?>home/app_conf_pop_date?doctor="+did,
              success: function( data ) {
				  $('#app_conf_pop_date').html(data);
			  }
            });


	});

	 $('body').on('change','#app_conf_pop_date',function(e) {
		//e.preventDefault(e);
		$('#app_conf_pop_institute').html('');
			var date = $(this).val();
			var did = $('#app_conf_pop_doctorid').val();

		 $.ajax({
			  type: "POST",
              url: "<?=base_url();?>home/app_conf_pop_time?doctor="+did+"&date="+date,
              success: function( data ) {
				  $('#app_conf_pop_time').html(data);
			  }
            });
	});

	$('body').on('change','#app_conf_pop_time',function(e) {
		//e.preventDefault(e);
			var date = $('#app_conf_pop_date').val();
			var did = $('#app_conf_pop_doctorid').val();
			var time = $('#app_conf_pop_time').val();

		 $.ajax({
			  type: "POST",
              url: "<?=base_url();?>home/app_conf_pop_institute?doctor="+did+"&date="+date+"&time="+time,
              success: function(data) 
			  {		//alert(data);
				  $('#app_conf_pop_institute').html(data);
			  }
            });
	});

	$('body').on('click','#app_conf_otp_submit',function(e) {
		//e.preventDefault(e);
		var date = $('#app_conf_pop_date').val();
			var did = $('#app_conf_pop_doctorid').val();
			var time = $('#app_conf_pop_time').val();
			var mobile = $('#app_conf_mobile').val();
			var name = $('#app_conf_name').val();
			if(name=='' || mobile=='' || mobile.length<10 ||mobile.length>10 || time==''){
				myalert('Please Fill the Form with Valid Details');
			}else{
		//send otp
		  $.ajax({
			  type: "POST",
              url: "<?=base_url();?>home/app_conf_pop_otpgen",
			  data: 'mobile=' + mobile,
              success: function( data ) {
				  //$('#app_conf_pop_institute').html(data);
			  }
            });
		$('#app_conf_otp').show();
		$('#app_conf_otp_submit').hide();
		$('#app_conf_submit').show();

			}

	});

	$('body').on('submit','#app_conf_form',function(e) 
	{	
		e.preventDefault(e);
		var myform=$(this);
		//alert(myform);
		  $.ajax({
			  url: myform.attr('action'),
			  data: myform.serialize(),
			  type: "POST",
              //url: "",//?doctor="+did+"&date="+date+"&time="+time,
				
              success: function(data) 
			  {	  
				 if(data=='OK')
				 {
					window.location="<?=base_url();?>paysecure/acheckout";
					//$('#myModal').modal('hide');
					//myalert('Thanks!! Appointment Successfuly booked. Please Pay the Fee at Counter.','Successs');
				 }
				 else if(data=='Not Available')
				 {
					$('#myModal').modal('hide');
					myalert('Not available','Not Available');
				 }
				 else
					 myalert('Failed');
				  //$('#app_conf_pop_institute').html(data);
			  }
            });


	});

	</script>
 <!--<script src="//code.jquery.com/jquery-1.12.4.js"></script>-->
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
  <script type="text/javascript">

        $(function() {
			/* $( "#hint" ).autocomplete({
			  source: [ "c++", "java", "php", "coldfusion", "javascript", "asp", "ruby" ]
			}); */
             $( "#hint" ).autocomplete({
				 minLength: 1,
                source: function( request, response ) {
                    $.ajax({
                        url: "<?=base_url();?>gethint",
                        dataType: "json",
                        data: {
                            q: request.term
                        },
                        success: function( data ) {
                           response( data );
						   /* response( $.map( data.myData, function( item ) {
								return {
									label: item.label,
									value: item.value
								}
							})); */
                        }
                    });
                }/* ,
				select:	function(event,b){
					event.preventDefault();
					$(this).val(b.item.label);
					$('#city').val(b.item.value);

				} */
            });
			$( "#hintcity" ).autocomplete({
				minLength: 1,
                source: function( request, response ) {
                    $.ajax({
                        url: "<?=base_url();?>gethintcity",
                        dataType: "json",
                        data: {
                            q: request.term
                        },
                        success: function( data ) {
                           // response( data );
							response( $.map( data, function( item ) {
								return {
									label: item.label,
									value: item.value
								}
							}));
                        }
                    });
                },
				select:	function(event,b){
					event.preventDefault();
					$(this).val(b.item.label);
					$('#city').val(b.item.value);
					/* document.cookie = "mart=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
					$('#headermart').html('Market');
					$('#headermartm').html('Market');
					setCookie('city', b.item.value , 2);
					$.ajax({
						url: "http://www.mylomart.com/mylomart/martautofill",
						data: {city: b.item.value},
						success: function( data ) {
							if(data!=''){
							$( ".top-mrkt" ).hide();
							$( ".avlbl-mrkt" ).html(data).fadeIn(200);

							$('#headercity').html(b.item.label);
							$('#headercitym').html(b.item.label);

							}
						}
					}); */
				}


            });
        });

	function isEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
        </script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script><script>function myalert(content='',title='Alert!'){	$.alert({    title: title,    content: content,});}
<?php $flashmsg=$this->session->flashdata('flashmsg');if($flashmsg['status']!='') {echo "myalert('".@$flashmsg['msg']."','".@$flashmsg['status']."')"; } ?>
</script>
  </body>

</html>

