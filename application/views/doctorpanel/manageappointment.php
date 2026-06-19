<style>
.CardBox{
    background:#1db71d;
    color:white;
    padding:7px 0px;
    margin-bottom: 18px;
}
.rightTag {
    background: white;
    color: black;
    padding: 2px 11px;
    float: right;
    font-weight:bold;
}
button, select {
    text-transform: none;
    color: #295771 !important;
}
.PaidNotPaid{
    background:#198c19;
    text-align:center;
    color:white;
    padding:4px 12px;
    margin-top: 14px;
}
.leftTag {
    background: #198c19;
    color: white;
    padding: 10px 8px;
    border-radius: 23px;
    position: absolute;
}
.FeeTag {
    background: white;
    color: black;
    padding: 4px 7px;
}

.HandPName{
    font-size:15px;
    font-weight:bold;
}

.SearchBtn {
    background:#1db71d;
    color: white;
    float: right;
    margin: -34px 0px;
    padding: 10px 19px;
}
</style>
<?php include ("assets/includes/header.php"); ?>
    <?php include ("assets/includes/leftmenu.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
                                	<h4 class="PageTitle">Manage Appointment</h4>
							<div class="col-sm-12 processsstep2">
						

							</div>
							
                                <div class="col-sm-12 processsstep2">
                                     <div class="col-sm-10 col-md-offset-1">
                                   <form>
                                       <input name='d' class="form-control" placeholder="Filter By Date" >
                                       <a href="#" type='submit' class="SearchBtn"><i class="fa fa-search" aria-hidden="true"></i> </a>
                                       
                                   </form>
                                   </div>
                                   			<?php foreach($appointments as $p){ ?>
					<div class="col-md-4">
					    <div class="col-md-12 CardBox">
					         <a href="#" class="leftTag"><?=$p['appointment']->appointment_id;?></a>
					           <a href="#" class="rightTag"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=$p['appointment']->from_timing.' '.$p['appointment']->to_timing;?></a>
					         
					         <div class="text-center" style="padding:30px 0px;">
					         <h6 class="HandPName"> <?=$p['institute']->name;?></h6>
					         <p class="text-center">Booked For</p>
					         <h6 class="HandPName"><?=$p['appointment']->patient_name;?></h6>
					        
					         </div>

					          <a href="#" class="FeeTag"><i class="fa fa-inr" aria-hidden="true"></i> : <?=$p['appointment']->amount;?></a>
					          <a href="#" class="rightTag"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$p['appointment']->appointment_date;?></a>
					         
					          <p class="PaidNotPaid"><?php if($p['appointment']->payment_status=='DONE'){echo'Paid';}else if($p['appointment']->payment_status=='UNPAID'){echo'Not Paid';} ?></p>
					    </div>
					</div>
						<?php } ?>
						
						
                                   
                                   
                                   
					 <table id="datatable" class="display" style="width:100%">
								<thead>
									<tr>
										<th>Date</th>
										<th>Time</th>
										<th>Hospital/Clinic</th>
										<th>Patient</th>
									<!--	<th>Mobile</th> -->
										<th>Fee</th>
										<th>Appointment ID</th>
										<th>Status</th>
									</tr>
								</thead>
							
					</table>  
			</div>
								

                               <!-- <div class="col-sm-5 hoslist_he mrgt30">
                                  
                                        <p>
                                            This information helps us perform critical checks to ensure that only licensed and genuine medical practitioners are listed on Upchaar . Your profile will get a “Verified” badge on verification. Doctors with verified profiles get 95% more patient views on Upchaar.</p>
                                   
                                </div>-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include ("assets/includes/footer.php"); ?>
		<link rel="stylesheet" type="text/css"  href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css'>
		<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
		<script>
		$(document).ready(function() {
			$('#datatable').DataTable();
		} );
		</script>