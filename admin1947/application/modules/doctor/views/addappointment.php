<?php //echo "<pre>"; print_r($clinic); die;?>
<!DOCTYPE html>
<html>
  <style>
  .label-name{
	  text-align:left!important;
	  margin-top:-5px;
  }
  .starspan
  {
	  color:#e80909;
	  font-size:18px;
  }
  .mainheadlinerow
  {
	  padding:5px;margin-top:10px;margin-bottom:10px;
  }
  .mainheadline
  {
	  background:#3c8dbc;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;
  }
  .mainheadlinefirstrow
  {
	  padding:5px;
  }
  .mainheadlinefirst
  {
	  background:#3c8dbc;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;
  }
  .othernote{
      font-weight:600;font-size:13px;color:#d20c0c;
  }
  .mainhead{font-weight:600;margin-bottom:20px;}
  .formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
  .note{font-weight:600;margin-top:10px;margin-bottom:20px;}
  
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  .docimg {
    margin-bottom: 30px;
    height: 134px;
    border-radius: 14px;
    box-shadow: 0px -5px 4px -1px #848181;
    width: 122px;
}
  .doc_nam_inf span {
    font-size: 12px;
    color: #9bc03c;
    letter-spacing: 0.8px;
    font-size: 16px;
    font-weight: 600;
    font-family: 'Lato', sans-serif;
}
ol, ul {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
}
ul {
    display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}
  </style>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<!--there was sidebar -->
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
				<link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
				<div class="container bg-3 ">  
					<div class="row text-">
						<div class="container">
							<h4 class="mainhead">Add Appointment</h4>
							<?=$this->session->flashdata('flashmsg');?>
							<form class="form-horizontal formbody" id='app_conf_form' action="<?=base_url()?>doctor/appointment/bookappointment_admin"  method="POST">
								<!--Basic Details-->
								<div class="row mainheadlinefirstrow">
									<div class="col-md-12 mainheadlinefirst">Patient's Details</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">City Name<span class="starspan"></span></label>
											<div class="col-sm-8">
												<select class="form-control" id="city_name" name="city_name" >
													<option value="">Select</option>
													<?php $city = $this->appointmentmodel->get_city(array('status'=>'1'));
													if(is_array($city) && !empty($city)){
													foreach($city as $list){
													?>
													<option value="<?php echo $list['id'];?>"  ><?php echo $list['name'];?></option>
													<?php } } ?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Locality Name<span class="starspan"></span></label>
											<div class="col-sm-8">
												<select class="form-control" id="locality_name" name="locality_name" >
													<option value="">Select</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Specialization Name<span class="starspan"></span></label>
											<div class="col-sm-8">
												<select class="form-control" id="specialization_name" name="specialization_name">
													<option value="">Select</option>
													<?php
													if(is_array($specialization) && !empty($specialization)){
													foreach($specialization as $list){
													?>
													<option value="<?php echo $list['id'];?>"  ><?php echo $list['name'];?></option>
													<?php } } ?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Hospital Name<span class="starspan"></span></label>
											<div class="col-sm-8">
												<select class="form-control" id="hospital_name" name="hospital_name">
													<option value="">Select</option>
													<?php
													if(is_array($hospital) && !empty($hospital)){
													foreach($hospital as $list){
													?>
													<option value="<?php echo $list['id'];?>"  ><?php echo $list['name'];?></option>
													<?php } } ?>
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Dr. Name<span class="starspan">*</span></label>
											<div class="col-sm-8">
												<select class="form-control input-sm" id="app_conf_pop_doctorid"  name="app_doctor" required>
													<option value="">Select Doctor</option>
													<?php $hospital_name = $this->input->get_post('hospital_name');
													if($hospital_name!='')
													{
													  $doctor_list         =  $this->appointmentmodel->doctor_list(array('type'=>'H','institution_id'=>$hospital_name));
													}
													else
													{
														$doctor_list         =  $this->appointmentmodel->doctor_list(array('type'=>'H'));
													}
													if(is_array($doctor_list) && !empty($doctor_list)){
													foreach ($doctor_list as $key => $value) {?>
													<option value="<?php echo $value['id']; ?>" <?php if($this->input->get_post('doctor_name')==$value['id']){ echo "selected"; } ?>><?php echo $value['fname']; ?></option>
													<?php } } ?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Appointment Date<span class="starspan">*</span></label>
											<div class="col-sm-8">
												<select class="form-control" name='app_date' id='app_conf_pop_date' required>
													<option value="">Select Date</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Appointment Time<span class="starspan">*</span></label>
											<div class="col-sm-8">
												<select class="form-control" name='app_time' id='app_conf_pop_time' required>
													<option value="">Select Time</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Mobile<span class="starspan">*</span></label>
											<div class="col-sm-8">
												<input type="text" id='app_conf_mobile' name="app_mobile" class="form-control" value=''  placeholder="Mobile Number" required>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Patient/Visitor Name<span class="starspan">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="app_name"  id='app_conf_name' class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-4 label-name" for="email">Email<span class="starspan"></span></label>
											<div class="col-sm-8">
												<input type="text" name="app_email" class="form-control"  placeholder="Email Id">
											</div>
										</div>
										<!--<div class="form-group" style='display:none;' id='app_conf_otp'>
											<label class="control-label col-sm-4 label-name" for="email">Send OTP<span class="starspan"></span></label>
											<div class="col-sm-8">
												<input value="" type="text" name="app_otp" class="form-control" required>
											</div>
										</div>-->
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
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">        
											<div class="col-sm-9">
												<!--<input type="submit" class="btn btn-info" id="submit" name="submit" value='Add' />
												<button type="reset" class="btn btn-info" id="reset" name="reset">Reset</button>-->
												<!--<p style=" margin-top: 10px;">You will receive an SMS with a verification code on this number
												By booking the appointment, you agree to Upchar's <a href="#">Terms and Conditions.</a></p>
												<button type="button" id='app_conf_otp_submit' class="continue2  btn-lg common-btn con_done">Send OTP    </button>-->
												<button type="submit"  id='app_conf_submit' class="continue2  btn-lg common-btn con_done"> Book Appointment </button>
												<!--<button type='submit' name='submit' class="continue2">Add Appointment</button>-->
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<?=$this->load->view('inc/footer');?>
		<div class="control-sidebar-bg"></div>
	</div>
<!-- ./wrapper -->
</body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>

$(function() {
    $('#city_name').change( function() {
        var val = $(this).val();
        //alert(val);
        if (val!='') 
        {
            $('#doctor_name').val('');
            $.ajax({
               url: '<?php echo base_url();?>doctor/appointment/get_locality_by_city_id/',
               dataType: 'html',
               data: { city_id : val },
               success: function(data) {
                   $('#locality_name').html( data );
               }
            });
			$.ajax({
               url: '<?php echo base_url();?>doctor/appointment/get_hospital_by_city_id/',
               dataType: 'html',
               data: { city_id : val },
               success: function(data) {
                   $('#hospital_name').html( data );
               }
            });
        }
		else 
        {
		   $("#locality_name").empty();
		   //$("#hospital_name").empty();
        }
    });
});
</script>
<script>
$(function() {
    $('#locality_name').change( function() {
        var val 	= $(this).val();
		var city_id = $('#city_name').val();
        if (val!='') 
        {
            $('#doctor_name').val('');
            $.ajax({
               url: '<?php echo base_url();?>doctor/appointment/get_hospital_by_locality_id/',
               dataType: 'html',
			   data:{"city_id": city_id,"locality_id": val},
               success: function(data) {
                   $('#hospital_name').html(data);
               }
            });
        }
    });
}); 
</script>
<script>
$(function() {
    $('#specialization_name').change( function() {
        var val = $(this).val();
        if (val!='') 
        {
            $('#doctor_name').val('');
            $.ajax({
               url: '<?php echo base_url();?>doctor/appointment/get_doctor_by_specialization_id/',
               dataType: 'html',
               data: { specialization_id : val },
               success: function(data) {
                   $('#app_conf_pop_doctorid').html(data);
               }
            });
        }
        else 
        {
		   $("#app_conf_pop_doctorid").empty();
        }
    });
});
</script>
<script>
$(function() {
    $('#hospital_name').change( function() {
        var val = $(this).val();
        if (val!='') 
        {
            $('#doctor_name').val('');
            $.ajax({
               url: '<?php echo base_url();?>doctor/appointment/get_doctor_by_hospital_id/',
               dataType: 'html',
               data: { hospital_id : val },
               success: function(data) {
              
                   $('#app_conf_pop_doctorid').html( data );
               }
            });
        }
        else 
        {
		   $("#app_conf_pop_doctorid").empty();
        }
    });
});
</script>
<script>
$('body').on('click','#app_conf_pop_doctorid',function(e) {
	e.preventDefault(e);
	$('#app_conf_pop_doctor').html('');
	$('#app_conf_pop_date').html('');
	$('#app_conf_pop_time').html('');
	$('#app_conf_pop_institute').html('');
		var did = $('#app_conf_pop_doctorid').val();
		//console.log(did);
		$('#app_conf_pop_doctorid').val(did);
	$.ajax({
		  type: "POST",
		  url: "<?=base_url();?>doctor/appointment/app_conf_hospital_doctor?doctor="+did,
		  success: function( data ) 
		  {	   console.log(data);
			  $('#app_conf_pop_doctor').html(data);
		  }
		});
	$.ajax({
		  type: "POST",
		  url: "<?=base_url();?>doctor/appointment/app_conf_pop_date?doctor="+did,
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
		  url: "<?=base_url();?>doctor/appointment/app_conf_pop_time?doctor="+did+"&date="+date,
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
		  url: "<?=base_url();?>doctor/appointment/app_conf_hospital_institute?doctor="+did+"&date="+date+"&time="+time,
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
		  url: "<?=base_url();?>doctor/appointment/app_conf_pop_otpgen",
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
				window.location="<?=base_url();?>doctor/appointment/acheckout_admin";
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