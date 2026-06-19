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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<!--there was sidebar -->
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Advertisment
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Advertisment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
		 <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
<div class="container bg-3 ">  
<br>  
  <br>
  <div class="row text">
    
	<div class='row'>
	
	<div class="form-group col-md-3">
	  
    </div>
    
	
	<div class="form-group col-md-6" id="formdiv">
	<?=$this->session->flashdata('flashmsg');?>
	<form action="<?=base_url()?>doctor/clinicreg/advertisment" method="post" id="myform"  enctype="multipart/form-data">
	<div class="formheader">
		Advertisement Master
	</div>
	<div class="formdiv">
		<div class="form-group">
		  <label for="text">Shot Description:</label>
		  <input type="text" class="form-control" id="eid" placeholder="Enter Shot Description" name="short" data-validation="required"
		 data-validation-error-msg="This Field is required">
		 
		  <!--<p style="color:#ef0909;font-weight:600;">Please insert value in filled</p>-->
		</div>

<div class="form-group">
		  <label for="text">Long Description:</label>
		  <input type="text" class="form-control" id="religion" placeholder="Enter Long Description" name="long" data-validation="required"
		 data-validation-error-msg="This Field is required">
		 
		  <!--<p style="color:#ef0909;font-weight:600;">Please insert value in filled</p>-->
		</div>
      
			
			

		<div class="form-group">
				  <label  for="email" >Image </label>
				  
					<input type="file" class="form-control input-sm" id="uploadimage" name="uploadimage" >
				
				</div>


   <div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Page</label>
				  <div class="col-sm-7">
					<select class="form-control input-sm" id="page" data-validation="required"
					data-validation-error-msg="This Field is required" name="page" style="    margin-left: -126px;">
						<option value="">Select</option>
						
						<option value="<?=base_url();?>" >Home</option>
						<option value="<?=base_url('login');?>" >User</option>
					</select>
				  </div>
				</div>

				<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">Active:</label>
			  <div class="col-sm-7">
				<label class="radio-inline"><input type="radio" class="activeradio" id="activeyes" name="activeradio" value="1" checked>Yes</label>
				<label class="radio-inline"><input type="radio" class="activeradio" id="activeno" name="activeradio" value="0">No</label>
			  </div>
			</div>
<br><br>
		<button type="submit" id="submit" class="btn btn-info" name="submit">Add</button>
		<button type="reset"  id="reset" class="btn btn-info">Reset</button>
		<hr>
		<span style="text-align:center">Note: Please Don't insert duplicate value</span>
	</form>
	</div>
    </div>
    
	
	<div class="form-group col-md-2">
	  
    </div>
    
	</div>
	
	
	
</div></div><br>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
