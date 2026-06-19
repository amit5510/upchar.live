<!DOCTYPE html>
<html>

 <style>
  	.tabledata{border:1px solid #fff!important; font-weight:600;}
    .table>tbody>tr.active>td, .table>tbody>tr.active>th, .table>tbody>tr>td.active, .table>tbody>tr>th.active, .table>tfoot>tr.active>td, .table>tfoot>tr.active>th, .table>tfoot>tr>td.active, .table>tfoot>tr>th.active, .table>thead>tr.active>td, .table>thead>tr.active>th, .table>thead>tr>td.active, .table>thead>tr>th.active {background-color: #3c8dbc;color: white;}

  	.error valid{ color:green!important;  }
  	.tabledatainactive{ color:red; }
 
	#submit {background: #337aa3;padding: 6px 30px;}
  	#reset{background:#fff;color:#000;padding: 6px 30px;}
  
  	@media only screen and (min-width: 1350px) and (max-width: 1442px) {
    #mydata_wrapper {max-width:85%!important;margin-left:7%!important; } }
  @media only screen and (min-width: 1300px) and (max-width: 1349px) {
    #mydata_wrapper {max-width:85%!important;margin-left:3%!important; }
	#formdiv{margin-left:-55px;}
  }
  @media only screen and (min-width: 1200px) and (max-width: 1299px) {
    #mydata_wrapper { max-width:78%;margin-left:3%!important;  }
	#formdiv{margin-left:-85px;}
  }
  @media only screen and (min-width: 1065px) and (max-width: 1199px) {
    #mydata_wrapper {
        max-width:80%;
		margin-left:3%!important;
    }
	#formdiv{
		margin-left:-85px;
	}
  }
  
  @media only screen and (min-width: 1000px) and (max-width: 1064px) {
    #mydata_wrapper {
        max-width:75%;
		margin-left:2%!important;
    }
	#formdiv{
		margin-left:-105px;
	}
  }
  </style>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
  		<div class="content-wrapper">
    		<section class="content-header">
      			<h1>Management</h1>
      			<ol class="breadcrumb">
        			<li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
        			<li class="active">management</li>
      			</ol>
    		</section>
    		<section class="content">
		 		<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
				<div class="container bg-3 ">  
  					<div class="row text">
						<div class='row'>
							<div class="form-group col-md-3"></div>
							<div class="form-group col-md-6" id="formdiv">
								<?=$this->session->flashdata('flashmsg');?>
								<form action="<?=base_url()?>masters/management/create" method="post" id="myform">
									<div class="formheader">
										Management Master
									</div>
									<div class="formdiv">
										<div class="form-group">
											<label for="text">Section:</label>
										  	<select name="section_id" id="section_id" class="form-control">
										  		<option value="0">Select</option>
											  	<?php $sections = $this->db->get_where('master_sections',array('isStatus'=>'1'))->result_array(); 
											  	if(is_array($sections) && !empty($sections)) {
											  	foreach($sections as $sec) {  
											  	?>
											  	<option value="<?php echo $sec['section_id'];?>"> <?php echo $sec['section_name'];?></option>
											  	<?php } } ?>
										  	</select>
										  	<label for="text">Name:</label>
										  	<input type="text" class="form-control" id="management" placeholder="Enter Management Name" name="management" data-validation="required" 	data-validation-error-msg="This Field is required">
										  	<label for="text">Folder:</label>
										  	<input type="text" class="form-control" id="module_folder" placeholder="Enter Folder Name" name="module_folder" data-validation="required" 	data-validation-error-msg="This Field is required">
										  	<label for="text">Controller:</label>
										  	<input type="text" class="form-control" id="module_controller" placeholder="Enter Controller Name" name="module_controller" data-validation="required" 	data-validation-error-msg="This Field is required">
										  	<label for="text">Action:</label>
										  	<input type="text" class="form-control" id="module_action" placeholder="Enter Action Name" name="module_action" data-validation="required" 	data-validation-error-msg="This Field is required">
										  	
										  	<label for="text">Icon:</label>
										  	<input type="text" class="form-control" id="module_icon" placeholder="Enter Icon Name" name="module_icon" data-validation="required" 	data-validation-error-msg="This Field is required">
										 	<input type="hidden" id="eid" name="eid">
										  	<!--<p style="color:#ef0909;font-weight:600;">Please insert value in filled</p>-->
										</div>
										<button type="submit"  id="submit" class="btn btn-info" name="submit">Add</button>
										<button type="reset"  id="reset" class="btn btn-info">Reset</button>
										<hr>
										<span style="text-align:center">Note: Please Don't insert duplicate value</span>
									</div>
								</form>
    						</div>
							<div class="form-group col-md-2"></div>
						</div>
						<br>
						<br>
						<br>
						<div>
							<table class="table table-bordered" id='mydata' style="border:none;">
							    <thead>
							      	<tr>
							        	<th class="tableheaddata"> ID</th>
							        	<th class="tableheaddata">Management Name</th>
							        	<th class="tableheaddata">Status</th>
							        	<th class="tableheaddata">Select</th>
							        	<!--<th class="tableheaddata">Delete</th>-->
							      	</tr>
							    </thead>
    							<tbody>
									<?php 
										$getlists=$this->db->get_where('master_management');
										$i=1;
										foreach($getlists->result() as $rowdata){
										$status=$rowdata->isStatus;
										if($status==1)
										{
											$statusvalue="Active";
											$statusclass="tabledataactive";
										}
										else{
											$statusvalue="In-Active";
											$statusclass="tabledatainactive";
										}
									?>
      								<tr class="active">
        								<td class="tabledata"><?=$i;?></td>
								        <td class="tabledata"><?=$rowdata->module_name;?></td>
								        <td class="tabledata"><a href="#" class="statuscng" id="ch<?=$rowdata->module_id;?>" data-uid="<?=$rowdata->module_id;?>" style="cursor:pointer"><span class="<?=$statusclass?>" ><?=$statusvalue?></span></a></td>
								        <td class="tabledata" id="kamal"><a href="#" style="cursor:pointer" class="select" data-uid="<?=base64_encode($rowdata->module_id)?>" data-section="<?=$rowdata->section_id;?>" data-name="<?=$rowdata->module_name;?>" data-folder="<?=$rowdata->module_folder;?>" data-controller="<?=$rowdata->module_controller;?>" data-action="<?=$rowdata->module_action;?>" data-icon="<?=$rowdata->module_icon;?>">Select</a></td>

								        <!--<td class="tabledata"><a href="#" style="cursor:pointer" class="delete" data-uid="<?//=$rowdata->module_id;?>">Delete</a></td>-->
								    </tr>
									<?php $i++; } ?>
    							</tbody>
  							</table>
  						</div>
					</div>
				</div>
				<br>
				<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
				<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
				<script>
				  $.validate({
				   
				  });
				</script>
				<script>
				$(document).ready(function(){
					
				    $(".delete").click(function(){
						var c=confirm('Are you sure to delete');
						if(c)
						{
							var uid=$(this).attr('data-uid'); 
							var uri='<?=base_url()?>masters/management/delete/'+uid
							$.ajax({
							 type:"post", 
							 url: uri,
							 success: function(result){
							   if(result=='Y')
							   	{
								    location.reload();
								   
							   	}
							 }

							});
						}
				        
				    });
				});
				</script>
				<script>
				$(document).ready(function(){
					$(".statuscng").click(function(){
						var uid=$(this).attr('data-uid');
						var row=$(this).attr('id'); 
						var uri='<?=base_url()?>masters/management/statusupdate';
							$.ajax({
							 	type:"post", 
							 	url: uri,
							 	data:{uid:uid},
							 	success: function(result){
							   if(result=='Show')
							   {
								  location.reload();
								  $("#row").html("<span style='color:green'>Active</span>");
							   }
							   else if(result=='Hide'){
								   location.reload();
								   $("#row").text("<span style='color:red'>In-Active</span>");
							   } 
							 }
							});
				    });
				});
				</script>
				<script>
				$(document).ready(function(){
				    $(".select").click(function()
				    {	
							var uid 			= $(this).attr('data-uid'); 
							var section 		= $(this).attr('data-section'); 
							var name 			= $(this).attr('data-name'); 
							var folder 			= $(this).attr('data-folder');
							var controller 		= $(this).attr('data-controller');
							var action 			= $(this).attr('data-action');
							var icon 			= $(this).attr('data-icon');
							$("#eid").val(uid);
							$("#section_id").val(section);
							$("#management").val(name);
							$("#module_folder").val(folder);
							$("#module_controller").val(controller);
							$("#module_action").val(action);
							$("#module_icon").val(icon);
							$("#submit").html('Update');
						
				    });
				    $("#reset").click(function(){
							$("#eid").val('');
							$("#section_id").val('');
							$("#management").val('');
							$("#module_folder").val('');
							$("#module_controller").val('');
							$("#module_action").val('');
							$("#module_icon").val('');
							$("#submit").html('Add');
				    });
				});
				</script>
  			</div>
  			<!-- /.content-wrapper -->
  			<?php $this->load->view('footer');?>
  			<div class="control-sidebar-bg"></div>
		</div>
		<!-- ./wrapper -->
	</body>
</html>
