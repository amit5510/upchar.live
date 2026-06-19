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
	  background:#3c8dbc;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;
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
	<?=$this->session->flashdata('flashmsg');?>
	<h4 class="mainhead">Create/Edit User</h2>
<br>
	  <form class="form-horizontal formbody" action="<?=base_url()?>users/Userlogincreate/create" method="post" >
		<div class="row mainheadlinefirstrow">
			<div class="col-md-12 mainheadlinefirst">User Details</div>
		</div>
		<div class="row">
	    <div class="col-md-6">
			
			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">First Name<span class="starspan"></span></label>
			  <div class="col-sm-7">
			<input type="text" class="form-control" id="username" name="fname" >
			
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">Mobile No.<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="usermobile" name="mobile"  data-validation-error-msg="Enter 10 digit valid no." onkeypress="return isNumber(event)">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">Date of Birth</label>
			  <div class="col-sm-7">
				<input type="text" class="form-control datepicker" id="userdob" name="dob" onkeypress="return isNumber(event)" >
			  </div>
			</div>
			
			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">Gender:</label>
			  <div class="col-sm-7">
				<label class="radio-inline"><input type="radio" class="activeradio" id="activeyes" name="activeradio" value="Male" checked>Male</label>
				<label class="radio-inline"><input type="radio" class="activeradio" id="activeno" name="activeradio" value="Female">Female</label>
			  </div>
			</div>
			
		<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">Height.<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="usermobile" name="height"  data-validation-allowing="range[6000000000;9999999999]" data-validation-error-msg="Enter 10 digit valid no." onkeypress="return isNumber(event)">
			  </div>
			</div>
			
			
			
		</div>
		
		 <div class="col-md-6">
			
			<div class="form-group">
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Last Name<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input id="useraddress" type="text" class="form-control"  name="lname">
			  </div>
			</div>
			<div class="form-group">
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Email<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="useremail" name="email" >
			  </div>
			</div>
		<div class="form-group">
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Password<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input type="password" class="form-control" id="useremail" name="password" >
			  </div>
			</div>
			
		<div class="form-group">
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Blood Group<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="useremail" name="blood" >
			  </div>
			</div>
				<div class="form-group">
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Weight<span class="starspan"></span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="useremail" name="weight" >
			  </div>
			</div>
			
		
		</div>
		</div>
		
		
		
		<div class="row">
		<div class="col-md-12">
			<!--<p class="note">Note: Size of sanction letter and DPR file should not be greater than 500 KB.</p>-->
			<div class="form-group">        
				  <div class="col-sm-9">
					<button type="submit" class="btn btn-info" id="submit" name="submit">Submit</button>
					<a href="<?=base_url();?>users/usercreate" class="btn btn-info" id="reset">Reset</a>
				  </div>
			</div>
			</div>
		</div>
	  </form>
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
	
    $("body").on('click','.delete',function(){
		var c=confirm('Are you sure to delete');
		if(c)
		{
			var uid=$(this).attr('data-uid'); 
			var uri='<?=base_url()?>users/usercreate/delete/'+uid
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
	
    $("body").on('click','.select',function(){
		
			var uid=$(this).attr('data-uid'); 
			var uri='<?=base_url()?>users/usercreate/fetch';
			$.ajax({
			 type:"post", 
			 url: uri,
			 dataType:'json',
			 data:{uid:uid},
			 success: function(result){
				var eid=result['id'];
				var name=result['name'];
				var address=result['address'];
				var mobile=result['mobile'];
				var email=result['email'];
				var role=result['role'];
				var dob=result['dob'];
				var userid=result['userid'];
				var active=result['active'];
				$("#eid").val(eid);
				$("#username").val(name);
				$("#useraddress").val(address);
				$("#usermobile").val(mobile);
				$("#useremail").val(email);
				$("#userdob").val(dob);
				$("#userrole").val(role);
				$("#userid").val(userid);
				
				if(active == 1){
					$('#activeyes.activeradio').prop('checked', true);
				}
				else if(active == 0){
					$('#activeno.activeradio').prop('checked', true);
				}
				
				
				
			 }

			});
			
			
			
			$("#submit").html('Update');
			$('#resetno').prop('checked', true);
			$("#resetpwddiv").html('');
		
    });
    $("#reset").click(function(){
		
			$("#eid").val('');
			$("#submit").html('Add');
		
    });
});
</script>


<script>
		function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
	</script>
	
<script>
 function resetyesradio(checkboxElem) {
  if (checkboxElem.checked) {
    $("#resetpwddiv").html('<input id="resetpassword" type="text" class="form-control" data-validation="required" data-validation-error-msg="This Field is required" name="resetpassword" placeholder="Enter Password">');
  }
}

 function resetnoradio(checkboxElem) {
  if (checkboxElem.checked) {
    $("#resetpwddiv").html('');
  } 
}
</script>
	
<script>
$(document).ready(function(){
		var uri='<?=base_url()?>users/usercreate/gettable';
			
			$.ajax({
			 type:"post", 
			 url: uri,
			 success: function(result){
				$('#tablebody').html(result);
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
