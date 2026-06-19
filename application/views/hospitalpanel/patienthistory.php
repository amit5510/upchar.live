<head>
<link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
<style>
.modal-title{
	color:black;
}
.colorwhite{
	color:black;
}
.dropbtn {
background-color: #043d5b;
color: white;
padding: 7px 21px 7px 48px;
font-size: 16px;
border: none;
border-radius: 23px;

}
.boxBack{
    background:white;
}
.innerBox {
    background: #e8e7e7;
    padding: 15px 1px;
    margin-bottom: 12px;
    transition:0.3s;
}
.innerBox:hover{
    box-shadow:0px -3px 6px 1px #d6cdcd;
}


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
    color: #043d5b;
    padding: 10px 16px;
    text-decoration: none;
    display: block;
    font-weight: bold;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

.Input_radio {
  display: none;
}
.titleBox{
    color: #929292;
    border-bottom: 2px solid #efefef;
    padding: 7px 0px;
}
.preview-img {
    width: 171px;
    height: 174px;
    border-radius: 83px;
    border:2px solid #e2dfdf;
    margin: 20px 2px;
}
.colorBlack {
    color: #676767;
    font-weight: bold;
}
</style>
</head>
<?php include ("assets/includes/header_hospital.php"); ?>
<?php include ("assets/includes/leftmenu_hospital.php"); ?>
<div class="pag_cstm">
	<div class="row">
		<div class="col-lg-12">
			<div class="pag_cstm_panel">
				<div class="pag_cstm_panel_panel_ontent p-t-0">
					<div class="row paddb40">
						<div class="col-md-8 col-md-offset-2 boxBack">
							<h4 class="titleBox"><a href="<?php echo base_url();?>hospitalpanel/manageappointment"> Back To Listing </a>Patient Information</h4>    
							<div class="col-md-4 text-center">
								<img class="preview-img" src="<?=admin_url();?>public/assets/upload/<?=($p->IMAGE)? $p->IMAGE : 'dummydr.jpg';?>" alt="Preview Image" />
							</div>
							<form action ='' method='post'>
								<div class="formdiv">
									<div class="col-md-4"> 
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Appointmet ID</label>
											<h5 class="colorBlack"><?=$p->appointment_id;?></h5>
										  </div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
											<div class="form-group text-center">
												<label for="text" class="colorwhite">Patient Name</label>
												<h5 class="colorBlack"><?= $p->appointment_name;?></h5>
											</div> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
											<div class="form-group text-center">
												<label for="text" class="colorwhite">Mobile</label>
												<h5 class="colorBlack"><?= $p->appointment_mobile;?></h5>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">  
											<div class="form-group text-center">
												<label for="text" class="colorwhite">Date Of Birth</label>
												<h5 class="colorBlack"><?= $p->DOB;?></h5>
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="col-md-12 innerBox">
											<div class="form-group text-center">
												<label for="text" class="colorwhite">Email</label>
												<h5 class="colorBlack"><?= $p->EMAIL;?></h5>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox"> 
											<div class="form-group text-center">
											<label for="text" class="colorwhite">Blood Group</label>
											<h5 class="colorBlack"><?= $p->BGROUP;?></h5>
										</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Gender</label>
											<h5 class="colorBlack"><?= $p->GENDER;?></h5>
										  </div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
											<div class="form-group text-center">
												<label for="text" class="colorwhite">Fee</label>
												<h5 class="colorBlack"><?= $p->fee;?></h5>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Height</label>
											<h5 class="colorBlack"><?= $p->HEIGHT;?></h5>
										  </div> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Weight</label>
											<h5 class="colorBlack"><?= $p->WEIGHT;?> KG</h5>
										  </div> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Doctor Name</label>
											<h5 class="colorBlack"><?= prefixdr($p->fname);?></h5>
										  </div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Appointment Date</label>
											<h5 class="colorBlack"><?= $p->appointment_date;?></h5>
										  </div> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Book Date</label>
											<h5 class="colorBlack"><?= $p->book_date;?></h5>
										  </div> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Order Id</label>
											<h5 class="colorBlack"><?=$p->orderid;?></h5>
										  </div>  
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Payment Mode</label>
											<h5 class="colorBlack"><?= $p->paymentmod;?></h5>
										  </div> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Card Name</label>
											<h5 class="colorBlack"><?= $p->cardname;?></h5>
										  </div> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Amount</label>
											<h5 class="colorBlack"><?= $p->amount;?></h5>
										  </div> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Billing Address</label>
											<h5 class="colorBlack"><?= $p->billingaddress;?></h5>
										  </div> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Billing City</label>
											<h5 class="colorBlack"><?= $p->billingcity;?></h5>
										  </div>  
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Billing State</label>
											<h5 class="colorBlack"><?= $p->billingstate;?></h5>
										  </div> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Billing Zip</label>
											<h5 class="colorBlack"><?= $p->billingzip;?></h5>
										  </div>  
										</div>
									</div>
									<div class="col-md-4">
										<div class="col-md-12 innerBox">
										  <div class="form-group text-center">
											<label for="text" class="colorwhite">Billing Country</label>
											<h5 class="colorBlack"><?= $p->billingcountry;?></h5>
										  </div> 
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4" style="color:white;font-weight:bold;padding:11px 34px 10px 51px;background:rgba(0, 128, 128, 1);">
										<h2>Payment</h2> 
									</div>
									<div class="col-md-8">
										<div class="form-group" >
										<label for="text" class="colorwhite">Payment Status:</label>
										<select name="gender">
											<option value="UNPAID" <?php if($p->payment_status=='UNPAID'){echo "selected";} ?> >Pending</option>
											<option value="DONE" <?php if($p->payment_status=='DONE'){echo "selected"; } ?>>Paid</option>
										</select>
										</div>
										<div class="form-group" >
											<?php if($p->payment_status!='DONE'){?>
											<div class="col-sm-1" >
												<input type="checkbox" style="height: 19px; width: 20px;" id="show" value="1"  >
											</div>
											<label class="col-sm-4" style="color: red;" >Pay on Counter</label>
											<?php } ?>
											<div id="appont" style="display: none;">
												<label class="col-sm-5 colorwhite"  >Appointment Completed</label>
												<div class="col-sm-2" >
													<button class="continue2" type='submit' value="Continue" name='submit'>Continue</button>
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
</div>
<?php include ("assets/includes/footer_hospital.php"); ?>     
<script>
$(document).ready(function(){
  $("#show").click(function()
  {
    if($(this).is(":checked"))
    {
      $("#appont").show();
    }
    else
    {
      $("#appont").hide();
    }
  });
});
</script>