
<?php include ("assets/includes/header_pathlab.php"); ?>
    <?php include ("assets/includes/leftmenu_pathlab.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
							<div class="col-sm-12 processsstep2">
							<h4>Manage Appointment </h4>

							</div>
							
                                <div class="col-sm-12 processsstep2">
                                   <form style="width:387px;padding: 11px;border-radius: 0px 15px;"><input name='d' placeholder="Filter By Date" ><input style="border:none;box-shadow: 0px 8px 10px #1c323e;background: #295771;color: white!important;border-radius:0px 0px 13px 13px;color:white;" type='submit' ></form>
								<table id="datatable" class="display" style="width:100%">
								<thead style="color:white;">
									<tr>
										<th>Date</th>
										<th>Time</th>
										<th>Doctor</th>
										<th>Patient</th>
										<th>Mobile</th>
										<th>Fee</th>
										<th>Appointment ID</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
								
								<?php foreach($appointments as $p){ ?>
								<tr>
								<td> <?=$p['appointment']->appointment_date;?></td>
								<td><?=$p['appointment']->from_timing.' - '.$p['appointment']->to_timing;?></td>
								<td> <?=$p['institute']->fname.' '.$p['institute']->lname;?></td>
								<td> <?=$p['appointment']->patient_name;?></td>
								<td> <?=$p['appointment']->appointment_mobile;?></td>
								<td> <?=$p['appointment']->amount;?></td>
								<td> <?=$p['appointment']->appointment_id;?></td>
								<td> <?php if($p['appointment']->status=='1'){echo'Booked';}else if($p['appointment']->status=='2'){echo'Booked';} ?></td>
								</tr>
								<?php } ?>
								</tbody>
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

        <?php include ("assets/includes/footer_pathlab.php"); ?>
		<link rel="stylesheet" type="text/css"  href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css'>
		<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
		<script>
		$(document).ready(function() {
			$('#datatable').DataTable();
		} );
		</script>