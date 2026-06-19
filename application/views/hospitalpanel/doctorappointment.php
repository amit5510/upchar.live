<head>
    <style>
   
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
    cursor: default;
    color: #666 !important;
    border: 1px solid transparent;
    background: #e4e4e4;
    box-shadow: none;
}

.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: #efefef;
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
							<div class="col-sm-12 processsstep2">
						<!---	<h4>Manage Appointment </h4> -->
                               <h2 style="color: red;"><strong>Number Of Patient <?=$hospital;?></strong></h2>
							</div>
							
                                <div class="col-sm-12 processsstep2">
                                   <form style="width:387px;padding: 11px;border-radius: 0px 15px;"><input name='d' placeholder="Filter By Date" ><input style="border:none;box-shadow:0px 3px 2px  #264d63;background: #295771;color: white!important;" type='submit' ></form>
					 <table id="datatable" class="display" style="width:100%">
								<thead style="color:white;">
									<tr>
									    <th>Apmt ID</th>
										<th>Date</th>
										<th>Time</th>
									<!--	<th>Doctor Name</th> -->         <!--  <th>Hospital Name</th> -->
										<th>Patient</th>
									<!--	<th>Mobile</th>  -->
										<th>Fee</th>
										<th>Status</th>
										
									</tr>
								</thead>
								<tbody>
								
								<?php 
   foreach($data as $p)
   { ?>

  <tr>
  <td><?=$p->appointment_id ;?></td>
  <td><?=$p->appointment_date;?></td>
  <td><?=$p->from_timing.' - '.$p->to_timing;?></td>
  
 <!-- <td><?=$p->name ;?></td> -->
  <td><?=$p->appointment_name; ?></td>

   <td><?=$p->fee;?></td>
   <td>
   <?php if($p->payment_status=='DONE')
   {echo"<span style='color: green'>Paid</span>";}
   else if($p->payment_status=='UNPAID')
   {echo "<a href='#'><span style='color: Blue'>Not Paid</span></a>";} 
   elseif($p->payment_status=='NA')
   {echo "<span style='color: red'>ANC</span>";} ?>
   </td>
   

   </tr>
  

 <?php   }
  ?>
  
  
								</tbody>
					</table>  
					<h4 style="color:red;"><bold>ANC = Appointment Not Completed </bold></h4>
					
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

        <?php include ("assets/includes/footer_hospital.php"); ?>
		<link rel="stylesheet" type="text/css"  href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css'>
		<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
		<script>
		$(document).ready(function() {
			$('#datatable').DataTable();
		} );
		</script>