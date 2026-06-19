<?php include ("assets/includes/header_hospital.php"); ?>
<?php include ("assets/includes/leftmenu_hospital.php"); ?>
<style>
.docimg {
	margin-bottom: 30px;
	height: 134px;
	border-radius: 14px;
	box-shadow: 0px -5px 4px -1px #848181;
	width: 122px;
}
.doc_nam_inf ul li {
	font-size: 13px;
	/*color: #868686;
	 letter-spacing: 0.8px; */
	list-style: none;
	line-height: 20px;
}
.right_box {
	padding: 13px 0px;
	margin-top: 10px;
	margin-bottom: 10px;
	border-bottom: 1px solid #e8e8e8;
}
								
								.right_box img {
	border-radius: 8px;
}
								.doc_nam_inf span {
	font-size: 12px;
	color: #9bc03c;
	letter-spacing: 0.8px;
	font-size: 16px;
	font-weight: 600;
	font-family: 'Lato', sans-serif;
}
.doc_nam_inf ul {
	margin-top: 4px;
}
</style>
<div class="pag_cstm">
    <div class="row">
		<div class="col-lg-12">
            <div class="pag_cstm_panel" style="background:#295771;">
                <div class="pag_cstm_panel_panel_ontent p-t-0">
					<div class="row paddb40">
						<h4 class="colorwhite" style="font-weight:bold;padding:4px 17px">Patient's Details</h4>
						<form action='<?=base_url();?>home/bookappointment_hospital' id='app_conf_form'  method='POST'>
                            <div class="col-sm-6 ">
								<div class="col-sm-12" style="padding: 0px;">
                                    <label class="colorwhite">Dr. Name</label>
									<?php 
									?>
                                    <select class="form-control" id="app_conf_pop_doctorid" name="app_doctor" required>
										<option value="">Select</option>
										<?php
										foreach($clinic as $list){
										?>
										<option value="<?php echo $list->id;?>"  ><?php echo $list->fname;?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-12" style="padding: 0px;">
                                    <label class="colorwhite">Appointment Date</label>
									<?php 
									?>
									<select class="form-control" name='app_date' id='app_conf_pop_date' required>
										<option value="">Select Date</option>
									</select>
								</div>
								<div class="col-sm-12" style="padding: 0px;">
                                    <label class="colorwhite">Appointment Time</label>
									<?php 
									?>
									<select class="form-control" name='app_time' id='app_conf_pop_time' required>
										<option value="">Select Time</option>
									</select>
								</div>
								<div class="col-sm-12" style="padding: 0px;">
                                    <label class="colorwhite">Mobile</label>
                                    <input type="text" id='app_conf_mobile' name="app_mobile" class="form-control2" value=''  placeholder="Mobile Number" required>
								</div>
								<hr>
								<div class="col-sm-12 padding0">                    
									<label class="colorwhite">Patient/Visitor Name*</label>
									<input type="text" name="app_name"  id='app_conf_name' class="form-control">	
								</div>
								<div class="col-sm-12 padding0"  >
									<label class="colorwhite">Email</label>
									<input type="text" name="app_email" class="form-control2"  placeholder="Email Id">
                                </div>
								<div class="col-sm-12 padding0" style='display:none;' id='app_conf_otp'>
									<label class="colorwhite" >Send OTP *</label>
									<input value="" type="text" name="app_otp" class="form-control" required>
								</div>
								<div class="col-lg-12  mrt20" style="padding: 0px;"> 
								  <p style=" margin-top: 10px;">You will receive an SMS with a verification code on this number
								  By booking the appointment, you agree to Upchar's <a href="#">Terms and Conditions.</a></p>
								  <button type="button" id='app_conf_otp_submit' class="continue2  btn-lg common-btn con_done">Send OTP    </button>
								  <button type="submit" style='display:none;' id='app_conf_submit' class="continue2  btn-lg common-btn con_done">Verify & Book Appointment </button>
								<!--<button type='submit' name='submit' class="continue2">Add Appointment</button>-->
							</div>  
							</div>
							<div class="col-sm-6">
								<div class="col-lg-10 padding0">  
									<div  id='app_conf_pop_doctor'>
										<div class="col-md-6">
											<img src="extra-images/team-list-img1.jpg" alt="">
										</div>
										<div class="col-md-6">
											<div class="doc_nam_inf" >
												
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-10 padding0"> 
									<div  id='app_conf_pop_institute'>
										<div class="col-md-6">
											<img src="images/dentist.png" alt="">
										</div>  
										<div class="col-md-6">
											<div class="doc_nam_inf">
											 
											</div>
										</div>
									</div>
								</div>
							</div>	
							
						</form>
                    </div>  
				</div>  
			</div>
		</div>
	</div>
</div>
<?php include ("assets/includes/footer_hospital.php"); ?>
<script>
$('body').on('click','#app_conf_pop_doctorid',function(e) {
	e.preventDefault(e);
	$('#app_conf_pop_doctor').html('');
	$('#app_conf_pop_date').html('');
	$('#app_conf_pop_time').html('');
	$('#app_conf_pop_institute').html('');
		var did = $(this).val();
		$('#app_conf_pop_doctorid').val(did);
	$.ajax({
		  type: "POST",
		  url: "<?=base_url();?>home/app_conf_hospital_doctor?doctor="+did,
		  success: function( data ) 
		  {
			  $('#app_conf_pop_doctor').html(data);
		  }
		});
	$.ajax({
		  type: "POST",
		  url: "<?=base_url();?>home/app_conf_pop_date?doctor="+did,
		  success: function( data ) {
			  $('#app_conf_pop_date').html(data);
		  }
		});
});

$('body').on('change','#app_conf_pop_date',function(e) {
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
	var date = $('#app_conf_pop_date').val();
	var did = $('#app_conf_pop_doctorid').val();
	var time = $('#app_conf_pop_time').val();
	$.ajax({
		  type: "POST",
		  url: "<?=base_url();?>home/app_conf_hospital_institute?doctor="+did+"&date="+date+"&time="+time,
		  success: function( data ) {
			  $('#app_conf_pop_institute').html(data);
		  }
		});
});


$('body').on('click','#app_conf_otp_submit',function(e) {
	var date = $('#app_conf_pop_date').val();
	var did = $('#app_conf_pop_doctorid').val();
	var time = $('#app_conf_pop_time').val();
	var mobile = $('#app_conf_mobile').val();
	var name = $('#app_conf_name').val();
	if(name=='' || mobile=='' || mobile.length<10 ||mobile.length>10 || time==''){
		myalert('Please Fill the Form with Valid Details');
	}else{
	  $.ajax({
		  type: "POST",
		  url: "<?=base_url();?>home/app_conf_pop_otpgen",
		  data: 'mobile=' + mobile,
		  success: function( data ) {
		  }
		});
	$('#app_conf_otp').show();
	$('#app_conf_otp_submit').hide();
	$('#app_conf_submit').show();

		}
});

$('body').on('submit','#app_conf_form',function(e) {
	e.preventDefault(e);
	var myform=$(this);
	  $.ajax({
		  url: myform.attr('action'),
		  data: myform.serialize(),
		  type: "POST",
		  success: function( data ) {
			//alert(data);
			 if(data=='OK')
			 {
				window.location="<?=base_url();?>paysecure/acheckout_hospital";
			 }
			 else if(data=='Not Available')
			 {
				$('#myModal').modal('hide');
				myalert('Not available','Not Available');
			 }
			 else
				 myalert('Failed');
		  }
		});
});
</script>