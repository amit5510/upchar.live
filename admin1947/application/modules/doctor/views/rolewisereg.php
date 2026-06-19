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
  .filecss {
    background: #3077a0;
    display: table;
    color: #fff;
    border-radius: 23px;
    padding: 5px 23px;
    cursor:pointer;
}


input[type="file"] {
    display: none;
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
.box {
            color: black;
            display: none;
            margin-top: 40px;
        }

        .check {
            background: #ecf0f5;
        }
  </style>
  
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
  		<div class="content-wrapper">
    		<section class="content-header"></section>
			<section class="content">
  				<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
				<div class="container bg-3 ">  
				  	<div class="row text-">
						<div class="container">
							<?=$this->session->flashdata('flashmsg');?>
							<h4 class="mainhead">Role Add</h4>
  							<form class="form-horizontal formbody" id='mainform' action="<?=base_url()?>doctor/rolewisereg/create"  method="post" enctype="multipart/form-data">
								<!--Basic Details-->
								<div class="row mainheadlinefirstrow">
									<div class="col-md-12 mainheadlinefirst">Add User Level Information</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
										  	<label class="control-label col-sm-4 label-name" for="email"> Name<span class="starspan">*</span></label>
										  	<div class="col-sm-7">
												<input type="text" class="form-control input-sm" id="t_fname" name="name" data-validation="required"
												data-validation-error-msg="This Field is required" value="">
										  	</div>
										</div>
									</div>
								</div>
								<!--Father's Details-->
								 <div class="row mainheadlinerow">
									<div class="col-md-12 mainheadline">Privileges</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<div class="col-md-7">					  	
												<div id="opwp_woo_tickets">
													<?php $management = $this->db->get_where('master_management',array('isStatus'=>'1'))->result_array();
													//echo "<pre>";print_r($management);
												  		if(is_array($management) && !empty($management)) {
												  			foreach($management as $mgmt) {	?>
														<input type="checkbox" class="maxtickets_enable_cb" name="module[]" value="<?php echo $mgmt['module_id'];?>" ><?php echo $mgmt['module_name'];?>

													<!--<div class="max_tickets">
														<input type="checkbox" name="opwp_wootickets[tickets][<?php echo $mgmt['module_id'];?>][maxtickets]" value="" ><?php echo $mgmt['module_name'];?>
													</div>-->
													<br>
													<?php } } ?>
										        </div>
									        </div>	
										</div>
									</div>
								</div>
								<div class="row mainheadlinerow">
									<div class="col-md-12 mainheadline">Status</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
										  	<div class="radio"><label><input type="radio" name="status" value='1' <?php if($rolewise->isStatus=='1'){ echo "checked";}?>>Active</label></div>
										  	<div class="radio"><label><input type="radio" name="status" value='2' <?php if($rolewise->isStatus=='2'){ echo "checked";}?>>Inactive</label></div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										
										<div class="form-group">        
										  	<div class="col-sm-9">
												<input type="submit" class="btn btn-info" id="submit" name="submit" value='Add' />
												<button type="reset" class="btn btn-info" id="reset" name="reset">Reset</button>
										  	</div>
										</div>
									</div>
								</div>
  							</form>
						</div>	<br>	<br>	<br>
						</div>
				</div><br>
			</section>
		</div>
   		<?=$this->load->view('inc/footer');?>
   		<div class="control-sidebar-bg"></div>
	</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>  $.validate({  }); </script>

    <script type="text/javascript">
    	jQuery(document).ready(function($) {
   // STOCK OPTIONS
	$('input.maxtickets_enable_cb').change(function(){
		if ($(this).is(':checked'))
    $(this).next('div.max_tickets').show();
else
    $(this).next('div.max_tickets').hide();
	}).change();
});
    </script>
</body>
</html>
