<!DOCTYPE html>
<html>
<style>
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
  #submit{background:#605ca8;padding: 6px 30px;}
  #reset{background:#fff;color:#000;padding: 6px 30px;}
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
        Setting
        <small>Master</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Masters</li>
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
	<form action="<?=base_url()?>masters/setting/create" method="post" id="myform">
	<div style="background:#605CA8;padding:10px;color:#fff;font-size:16px;">
Setting	</div>
	<div style="border:1px solid #d2cbcb;padding:25px; border-bottom-left-radius: 4px;; border-bottom-right-radius: 4px;">
		<div class="form-group">
		  <label for="text">Max Batch to Faculty:</label>
		  <input type="text" class="form-control" id="max_batch_faculty" value='<?=$max_batch_faculty;?>' placeholder="Enter No of Batch for a faculty at once" name="max_batch_faculty" data-validation="required" 
		 data-validation-error-msg="This Field is required">
		 <input type="hidden" id="eid" name="eid">
		  <!--<p style="color:#ef0909;font-weight:600;">Please insert value in filled</p>-->
		</div>
		
		<div class="form-group">
		  <label for="text">Max Batch to Assessor:</label>
		  <input type="text" class="form-control" id="max_batch_assessor" value='<?=$max_batch_assessor;?>' placeholder="Enter No of Batch for a assessor at once" name="max_batch_assessor" data-validation="required" 
		 data-validation-error-msg="This Field is required">
		  <!--<p style="color:#ef0909;font-weight:600;">Please insert value in filled</p>-->
		</div>
		
		<button type="submit" id="submit" class="btn btn-info" name="submit">Update</button>
		<button type="reset"  id="reset" class="btn btn-info">Reset</button>
		<hr>
		<span style="text-align:center">Note: Please Don't insert duplicate value</span>
	</form>
	</div>
    </div>
    
	
	<div class="form-group col-md-2">
	  
    </div>
    
	</div>
	
	<br>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script>
  $.validate({
   
  });
</script>



</div></div>

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
