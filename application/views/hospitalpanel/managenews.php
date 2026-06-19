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
.boxDesign {
    background: #f5f5f5;
    color: #295771;
    font-weight: bold;
    border-radius: 5px;
    margin-top:32px;
    padding:10px;
}
.boxIcon {
    background: #295771;
    padding: 6px;
    border-radius: 23px;
    color: white;
    margin-right: 6px;

}
.StatusBTN {
    background: #10b323;
    color: white;
    border-radius: 23px;
    text-align: center;
    padding: 7px;
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
    							    <a href='<?=base_url();?>hospitalpanel/news'>
                                        <button type='submit' name='submit' style="letter-spacing: 1px;text-shadow: 3px -1px 2px #666;font-weight:900;color:white;background:#1fc61f;padding:9px 23px;border-radius: 23px;float: right;border:none;">Add News
                                        </button>
                                    </a>
							        <h4>News List</h4>
							    </div>
                                <div class="col-sm-12 processsstep2">
                                	<?php foreach($news as $p){ ?>
                                        <div class="col-md-4">
                                            <div class="col-md-12 boxDesign">
                                            <?php if($p['video_url'] !='') { ?>
                                               <iframe width="100%" height="150" src="<?php echo $p['video_url'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <?php } ?> 
    								        <?php if($p['image'] !='') { ?>
                                                <img src="<?php echo base_url();?>admin1947/public/assets/upload/<?php echo $p['image'];?>" style="height:150px;width: 100%;">
                                            <?php } ?>
                                            <?php if($p['title'] !='') { ?>
                                                <h5 style="text-transform: capitalize;"><b>Title :</b><?php echo $p['title'];?> </h5>
                                            <?php } ?>
                                            <?php if($p['description'] !='') { ?>
                                                <h5 style="text-transform: capitalize;"><b>Description :</b><?php echo $p['description'];?> </h5>
                                            <?php } ?>
    										    <h5 class="StatusBTN"><?php if($p['status'] ==A) { ?> Approved <?php } else { ?> Not Approved <?php } ?></h5>
    							            </div>
                                        </div>
	                                <?php } ?>
                                </div>
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
