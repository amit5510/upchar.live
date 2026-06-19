<head>
    <style>
        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: white !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
    cursor: default;
    color: white !important;
    border: 1px solid transparent !important;
    background: red !important;
    margin-top: 22px;
}
    </style>
</head>
<?php include ("assets/includes/header.php"); ?>
    <?php include ("assets/includes/leftmenu.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
                                <h4 class="PageTitle">Manage Own clinics</h4>  
							<div class="col-sm-12 processsstep2">
							
							<a href='<?=base_url();?>addclinic'><button type='submit' name='submit' class="btn pull-right" style="letter-spacing: 2px;font-weight: bold;color: #295771;padding: 10px 40px;background: white;">Add Clinic</button></a>

							</div>
							
                                <div class="col-sm-12 processsstep2">
                                   
					 <table id="datatable" class="display" style="width:100%">
								<thead style="color:white;">
									<tr>
										<th>Clinic Name</th>
										<th>Address</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								
								<?php foreach($data as $p){ ?><tr>
								<td> <?=$p->name;?></td>
										<td><?=$p->address;?></td>
										<td><?php if($p->claim_status=='P'){echo 'Pending';}else{echo 'Approved';}?></td>
										<td><a href='<?=base_url();?>updateclinic/<?=mybase64_encode($p->id);?>'>Update</a></td></tr>
								<?php } ?>
								</tbody>
					</table>  
					
					
                                </div>
								

                              <div class="col-sm-5 hoslist_he mrgt30">
                                  
                                        <p>
                                            This information helps us perform critical checks to ensure that only licensed and genuine medical practitioners are listed on Upchaar . 
                                            Your profile will get a “Verified” by admin. Doctors with verified profiles get 95% more patient views on Upchaar.</p>
                                   
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