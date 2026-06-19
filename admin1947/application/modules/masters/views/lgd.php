<!DOCTYPE html>
<html>
<style>
 <style>
  
  .error valid{
	  color:green!important;
  }
  .tabledataactive{
	  color:green;
  }
  .tabledatainactive{
	  color:red;
  }
   .formdiv{
      border:1px solid #d2cbcb;padding:25px; border-bottom-left-radius: 4px;; border-bottom-right-radius: 4px;
  }
  .formheader{
      background:#605CA8;padding:10px;color:#fff;font-size:16px;
  }
  .othernote{
      font-weight:600;font-size:13px;color:#d20c0c;
  }
  #submit{background:#605ca8;padding: 6px 30px;}
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  @media only screen and (min-width: 1350px) and (max-width: 1442px) {
    #mydata_wrapper {
        max-width:85%!important;
		margin-left:7%!important;
    }
	
  }
  @media only screen and (min-width: 1300px) and (max-width: 1349px) {
    #mydata_wrapper {
        max-width:85%!important;
		margin-left:3%!important;
    }
	#formdiv{
		margin-left:-55px;
	}
  }
  @media only screen and (min-width: 1200px) and (max-width: 1299px) {
    #mydata_wrapper {
        max-width:78%;
		margin-left:3%!important;
    }
	#formdiv{
		margin-left:-85px;
	}
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
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<!--there was sidebar -->
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        LGD DATA
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
        <li class="active">Course</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
		 <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
<div class="container bg-3 ">  
<br>  
  <br>
  <div class="row text">
   <?=$this->session->flashdata('flashmsg');?>
	<div class='row'>
	
	<!--state start-->
	<div class="form-group col-md-6" id="formdiv">
		<form action="<?=base_url()?>masters/lgd/stateDB" method="post" id="myform">
			<div class="formheader">
				State
			</div>
			<div class="formdiv">
				<div class="form-group">
				  <label for="text">Select Type:</label>
				   <select class="form-control" id="type" name="type">
						<option value="S">State</option>
						<option value="U">UT</option>
				   </select>
				</div>
				<div class="form-group">
				  <label for="text">State Name:</label>
				  <input type="text" class="form-control" id="state" placeholder="Enter state name" name="state" data-validation="required"
				 data-validation-error-msg="This Field is required">
				</div>
				
				
				<button type="submit" id="submit" class="btn btn-info" name="submit">Add</button>
				<button type="reset"  id="reset" class="btn btn-info">Reset</button>
				<hr>
				<span class="othernote">Note: Please Don't insert duplicate value</span>
			
			</div>
		</form>
    </div>
    <!--state end-->
	
	<!--district start-->
	<div class="form-group col-md-6" id="formdiv">
		<form action="<?=base_url()?>masters/lgd/districtDB" method="post" id="myform">
			<div class="formheader">
				District
			</div>
			<div class="formdiv">
				
				<div class="form-group">
				  <label for="text">Select State/UT:</label>
				 <select class="form-control state" id="state" name="state" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select State</option>
						<?php
						$statedatas=$this->db->order_by('state_name','ASC')->get_where('lgd_states');
						foreach($statedatas->result() as $statedata){
						?>
						<option value="<?=$statedata->state_code;?>" data-uid="<?=$statedata->state_code;?>"><?=$statedata->state_name;?></option>
						<?php } ?>
					</select>
				</div>
				
				<div class="form-group">
				  <label for="text">District Name:</label>
				  <input type="text" class="form-control" placeholder="Enter district name" name="district" data-validation="required"
				 data-validation-error-msg="This Field is required">
				</div>
				<button type="submit" id="submit" class="btn btn-info" name="submit">Add</button>
				<button type="reset"  id="reset" class="btn btn-info">Reset</button>
				<hr>
				<span class="othernote">Note: Please Don't insert duplicate value</span>
			
			</div>
		</form>
    </div>
    <!--district end-->
	
	<!--block start-->
	<div class="form-group col-md-6" id="formdiv">
		<form action="<?=base_url()?>masters/lgd/blockDB" method="post" id="myform">
			<div class="formheader">
				Block
			</div>
			<div class="formdiv">
				
				<div class="row">
					<div class="form-group col-md-6">
					  <label for="text">State:</label>
					   <select class="form-control state" id="state" name="state" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select State</option>
						<?php
						$statedatas=$this->db->order_by('state_name','ASC')->get_where('lgd_states');
						foreach($statedatas->result() as $statedata){
						?>
						<option value="<?=$statedata->state_code;?>" data-uid="<?=$statedata->state_code;?>"><?=$statedata->state_name;?></option>
						<?php } ?>
					</select>
					</div>
					<div class="form-group col-md-6">
					  <label for="text">District:</label>
					 <select class="form-control district" id="district" name="district" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select</option>
					</select>
					</div>
				</div>
				<div class="form-group">
				  <label for="text">Block Name:</label>
				  <input type="text" class="form-control" placeholder="Enter block name" name="block" data-validation="required"
				 data-validation-error-msg="This Field is required">
				</div>
				
				<button type="submit" id="submit" class="btn btn-info" name="submit">Add</button>
				<button type="reset"  id="reset" class="btn btn-info">Reset</button>
				<hr>
				<span class="othernote">Note: Please Don't insert duplicate value</span>
			
			</div>
		</form>
    </div>
    <!--block end-->
	
	<!--village start-->
	<div class="form-group col-md-6" id="formdiv">
		<form action="<?=base_url()?>masters/lgd/villageDB" method="post" id="myform">
			<div class="formheader">
				Village
			</div>
			<div class="formdiv">
				
				<div class="row">
					<div class="form-group col-md-6">
					  <label for="text">State:</label>
					   <select class="form-control state" id="state" name="state" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select State</option>
						<?php
						$statedatas=$this->db->order_by('state_name','ASC')->get_where('lgd_states');
						foreach($statedatas->result() as $statedata){
						?>
						<option value="<?=$statedata->state_code;?>" data-uid="<?=$statedata->state_code;?>"><?=$statedata->state_name;?></option>
						<?php } ?>
					</select>
					</div>
					<div class="form-group col-md-6">
					  <label for="text">District:</label>
					 <select class="form-control" id="districtlgd" name="district" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select</option>
					</select>
					</div>
				</div>
				<div class="form-group">
				  <label for="text">Block Name:</label>
				  <select class="form-control" id="blocklgd" name="block" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select</option>
					</select>
				</div>
				<div class="form-group">
				  <label for="text">Village Name:</label>
				  <input type="text" class="form-control" placeholder="Enter village name" name="village" data-validation="required"
				 data-validation-error-msg="This Field is required">
				</div>
				<button type="submit" id="submit" class="btn btn-info" name="submit">Add</button>
				<button type="reset"  id="reset" class="btn btn-info">Reset</button>
				<hr>
				<span class="othernote">Note: Please Don't insert duplicate value</span>
			
			</div>
		</form>
    </div>
    <!--village end-->
	
	</div>
	
	<br>
	<br>
	<br>
	<div>
	
	
  </div>
</div></div><br>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script>
  $.validate({ 
  });
</script>





    </section>
    <!-- /.content -->
  </div>
  
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2018 <a href="#">Fddi</a>.</strong> All rights
    reserved.
  </footer>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


</body>
</html>
