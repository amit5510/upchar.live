<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".buttonsforpayment").click(function(){
    //$(".paymentbox").show();
    //$(".coc").hide();
	window.location="<?=base_url();?>paysecure/securePay";
  });
  
  $(".buttonsforcoc").click(function(){
   //$(".paymentbox").hide();
    //$(".coc").show();
	window.location="<?=base_url();?>doctor/appointment/processordercod_admin";
  });
});
</script>    
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
</head>
<?php $appointment_data=$this->db->get_where('appointment',array('status'=>'0','appointment_id'=>$AppointmentCheckout))->row(); ?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<!--there was sidebar -->
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<div class="careplus-main-content">
					<!--// Main Section \\-->
					<div class="careplus-main-section careplus-services-full">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="paymentbox">
										<div class="row">
											<div class="well col-xs-10 col-sm-10 col-md-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
												<div class="text-center">
													<h3 style="color:black;">Checkout / Appointment Confirmation</h3>
												</div>
												<div class="row" style="color:black;">
													<div class="col-xs-6 col-sm-6 col-md-6">
														<h6><b>Name</b></h6>
														<address>
															<h4 style="text-transform: capitalize;"><?=$gatewayData['billing_cust_name'];?></h4>
														  <h6><b>Email Address</b></h6>
														   <h6><p><em><?=$appointment_data->appointment_email;?></p></em></h6>
														   
															 <h6><b>Phone</b></h6>
															<h6><p><em><?=$appointment_data->appointment_mobile;?></p></em></h6>
														</address>
													</div>
													<div class="col-xs-6 col-sm-6 col-md-6 text-right">
														<h6><b>Date</b></h6>
														<p><em><?=$appointment_data->book_date;?></em></p>
														<h6><b>Appointment Number</b></h6>
														<p>
															<em> <?=$AppointmentCheckout;?></em>
														</p>
													</div>
												</div>
												<div class="row">
													<table class="table table-hover table-bordered" style="width: 98.7%;margin: 4px;">
														 <thead>
															<tr>
																<th class="text-center">HOSPITAL</th>
																<th class="text-center">DOCTOR</th>
																<th class="text-center">DATE</th>
																<th class="text-center">Time</th>
															</tr>
														</thead>
														<tbody>
														   <tr>
																<td class="text-center"><h6><?=getInstituteName($appointment_data->institute_id,$appointment_data->institution_type);?></h6></td>
																<td class="text-center" style="text-transform:capitalize;"> <?=getDoctorName($appointment_data->doctor_id);?> </td>
																<td class="text-center"><?=$appointment_data->appointment_date;?></td>
																<td class="text-center"><?=$appointment_data->from_timing;?> - <?=$appointment_data->to_timing;?></td>
															</tr>
															<tr>
																<td>   </td>
																<td>   </td>
																<td class="text-right">
																<p>
																	<strong>Subtotal</strong>
																</p></td>
																<td class="text-center">
																
																<p>
																	<strong>Rs <?=$appointment_data->fee;?></strong>
																</p></td>
															</tr>
															<tr>
																<td colspan=2 style="font-weight:bold;text-align: center;"> Note<br>If You have a valid Coupon You can apply on next (Payment Page) to get discount   </td>
																
																<td class="text-right"><h4><strong>Total</strong></h4></td>
																<td class="text-center"><h4><strong style="color:green;">Rs <?=$gatewayData['Amount'];?></strong></h4></td>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="text-right">
													<button type="button" class="btn btn-primary btn- buttonsforcoc">
														Pay On Counter</span>
													</button>
													<!--<button type="button" class="btn btn-success btn-  buttonsforpayment">
														Pay Now Online</span>
													</button>-->
												</div>
											</div>
										</div>
									</div> 
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--// Main Section \\-->
			</section>
		</div>
	</div>
</body>
<script> 
$(document).ready(function(){
  $(".closeBTN").click(function(){
    $(".sidenav").animate({left: '-242px'});
     $(".closeBTN").hide();
      $(".closeBTN2").show();
  });
});

$(document).ready(function(){
  $(".closeBTN2").click(function(){
    $(".sidenav").animate({left: '0px'});
     $(".closeBTN2").hide();
      $(".closeBTN").show();
  });
});
</script>        
        
    
         