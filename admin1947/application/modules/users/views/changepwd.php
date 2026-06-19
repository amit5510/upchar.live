<!DOCTYPE html>
<html>

  <style>
  
  .formbody {
    border: 1px solid #a9a9a9;
    padding: 40px;
    border-radius: 4px;
    background: #3c8dbc;
    color: white;
}
  #submit {
    background: #ffffff;
    padding: 6px 30px;
    border: 1px solid white;
    border-radius: 23px;
    color: #3c8dbc;
    font-weight: bold;
}
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
        <li class="active">Change password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
		<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
  
<div class="container bg-3 ">  

  <div class="row text-">
    
	<div class="container">
<br>

	
	 <div class="row">
	 <div class="col-md-offset-3 col-md-6 formbody">
		<h3 style="margin-top:-15px;margin-bottom:20px;font-weight:600;text-align:center;">Change Password</h3>
		<form class="form-horizontal" method="post" id="changeform">
			  <div class="form-group">
				<label for="email">Old Password:</label>
				<input type="password" class="form-control" id="old" data-validation="required"
		 data-validation-error-msg="This Field is required">
			  </div>
			  <div class="form-group">
				<label for="pwd">New Password:</label>
				<input type="password" class="form-control" id="pwd" data-validation="required"
		 data-validation-error-msg="This Field is required">
			  </div>
			   <div class="form-group">
				<label for="pwd">Confirm Password:</label>
				<input type="password" class="form-control" id="cpwd" data-validation="required"
		 data-validation-error-msg="This Field is required">
			  </div>
			  
			   <div class="form-group">
				<p style="color:#dc0909;font-weight:600;font-size:15px;" id="err"></p>
			   </div>
			  <div class="form-group">
				<input type="submit" class="btn btn-info" value="Change Password" id="submit" name="submit">
			  </div>
		</form>
	</div>
	</div>
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
<script>
  $.validate({
   
  });
</script>

<script>
		$(document).ready(function(){
			$('#changeform').on('submit', function(e){
				e.preventDefault();
				var old=$.trim($('#old').val());
				var pwd=$.trim($('#pwd').val());
				var cpwd=$.trim($('#cpwd').val());
				
				var uri = base_url+'users/changepassword/change';
				if(pwd.length < 8)
				{
					$('#err').html('New Password length should minimum 8 characters.');
					return false;
				}
				else if(pwd != cpwd)
				{
					$('#err').html('New and Confirm Password not matched');
					return false;
				}
				else{
					$.ajax({
						type:'post',
						url:uri,
						data:{pwd:pwd,old:old},
						success:function(result)
						{
							if(result=='Y')
							{
								alert('Password changed successfully');
								location.reload();
								
							}
							else{
								$('#err').html(result);
							}
						}
					});
				}
			});
		});
	</script>


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
