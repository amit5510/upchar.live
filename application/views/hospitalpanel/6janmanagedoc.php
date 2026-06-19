<head>
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
    box-sizing: border-box;
    display: inline-block;
    min-width: 1.5em;
    padding: 0.5em 1em;
    margin-left: 2px;
    text-align: center;
    text-decoration: none !important;
    cursor: pointer;
    *cursor: hand;
    color: #333 !important;
    border: 1px solid transparent;
    border-radius: 2px;
    background: white !important;
}
    </style>
</head>
<?php include ("assets/includes/header_hospital.php"); ?>
    <?php include ("assets/includes/leftmenu_hospital.php"); ?>
        <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel" style="background: #295771;">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
							<div class="col-sm-12 processsstep2">
							<h4>Manage Doctors </h4><br>
							<a href='<?=base_url();?>hospitalpanel/adddoctor'><button type='submit' name='submit' style="letter-spacing: 1px;font-weight:900;color: #295771;background:white;padding:9px 23px;float: right;">Add Doctor</button></a>

							</div>

                                <div class="col-sm-12 processsstep2">

					 <table id="datatable" class="display" style="width:100%">
								<thead style="color:white;">
									<tr>
										<th> Name</th>
										<th>Mobile</th>
										<th>Email</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($clinic as $p){ ?>
								<tr><td> <?=$p->fname.' '.$p->lname;?></td>
										<td><?=$p->mobile;?></td>
										<td><?=$p->email;?></td>
										<td><?=($p->p_status)? '<span style="color:#00f;">Approved Active</span>' : '<span style="color:#f00;">Approval Pending</span>';?></td>
										<td>
										<!--<a href='<?=base_url()?>hospitalpanel/updatedoctor/<?=mybase64_encode($p->id);?>'>Update</a>-->

                      <?php if($p->p_status==1){ ?>
                        <a href='<?=base_url()?>hospitalpanel/updatedoctor/<?=mybase64_encode($p->id);?>'>Update Timing & Fee</a>
                      <?php  } 	elseif($p->p_status==0)  { ?>
                      <a href=#>Update Timing & Fee</a>
                      <?php } 	?>

										</td></tr>
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

        <?php include ("assets/includes/footer_hospital.php"); ?>
		<link rel="stylesheet" type="text/css"  href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css'>
		<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
		<script>
		$(document).ready(function() {
			$('#datatable').DataTable();
		} );
		</script>
