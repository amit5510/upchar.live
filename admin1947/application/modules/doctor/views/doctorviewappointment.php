<!DOCTYPE html>
<html>

  <style>
  .tabledata{
	  border:1px solid #fff!important;
	  font-weight:600;
  }
  .tableheaddata{
	  border:1px solid #fff!important;
	  background:#605CA8;
	  color:#fff;
  }
  .label-name{
	  text-align:left!important;
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
  .mainheadline
  {
	  background:#605CA8;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;
  }
  .mainheadlinefirstrow
  {
	  padding:5px;
  }
  .mainheadlinefirst
  {
	  background:#605CA8;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;
  }
  .mainhead{
      font-weight:600;margin-bottom:20px;
  }
  .formbody{
      border:1px solid #d6d2d2;padding:10px;border-radius:4px;
  }
  .note{
      font-weight:600;font-size:17px;margin-top:10px;margin-bottom:20px;
  }
  .othernote{
      font-weight:600;font-size:13px;color:#d20c0c;
  }
  #submit{background:#605ca8;padding: 6px 30px;}
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  </style>
  
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<!--there was sidebar -->
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
        <li class="active">User Login</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
		<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
  
<div class="container bg-3 ">  

  <div class="row text-">
    
	<div class="container">
	
	<h4 class="mainhead">Patient Appointment History</h2>
<br>


	  
	  	<?php foreach($data as $row)
{
?>

		<div class="row mainheadlinefirstrow">
			<div class="col-md-12 mainheadlinefirst">User Details</div>
		</div>
		<div class="row">
	    <div class="col-md-6">
			
			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">Appointment Id<span class="starspan"></span></label>
			  <div class="col-sm-7">
			<input type="text" class="form-control" id="username" name="fname" value="<?php echo $row->appointment_id;?>" >
			
			  </div>
			</div>
        <div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">From Timing<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="usermobile" name="mobile"  data-validation-error-msg="Enter 10 digit valid no." onkeypress="return isNumber(event)" value="<?php echo $row->from_timing;?>">
			  </div>
			</div>


			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">Patient Name<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="usermobile" name="mobile"  data-validation-error-msg="Enter 10 digit valid no." onkeypress="return isNumber(event)" value="<?php echo $row->appointment_name;?>">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">Mobile No<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="usermobile" name="mobile"  data-validation-error-msg="Enter 10 digit valid no." onkeypress="return isNumber(event)" value="<?php echo $row->appointment_mobile;?>">
			  </div>
			</div>
			
			
			
		
			
			
			
		</div>
		
		 <div class="col-md-6">
			
			<div class="form-group">
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Appointment Date<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input id="useraddress" type="text" class="form-control"  name="lname"value="<?php echo $row->appointment_date;?>">
			  </div>
			</div>
			<div class="form-group">
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">To Timing<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input id="useraddress" type="text" class="form-control"  name="lname"value="<?php echo $row->to_timing;?>">
			  </div>
			</div>
			<div class="form-group">
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Email<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="useremail" name="email" value="<?php echo $row->appointment_email;?>">
			  </div>
			</div>
		<div class="form-group">
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Amount<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="useremail" name="password" value="<?php echo $row->amount;?>">
			  </div>
			</div>
			
		
				
			
		
		</div>
		</div>
		
		
		
		
	<?php } ?>
	
</div>
	
	<br>
	<br>
	<br>
	
	
	
  </div>
</div><br>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?=base_url();?>public/assets/dist/js/zebra_datepicker.min.js"></script>
        <script type="text/javascript" src="<?=base_url();?>public/assets/dist/js/examples.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>






	

    </section>
    <!-- /.content -->
  </div>
  
  
  <!-- /.content-wrapper -->
 <?php $this->load->view('footer');?>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


</body>
</html>
