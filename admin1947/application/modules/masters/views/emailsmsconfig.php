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
	  white-space: nowrap;
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
      border:2px solid #605CA8;padding:10px;border-radius:4px;
  }
  #submit{background:#605ca8;padding: 6px 30px;}
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  @media only screen and (min-width: 1350px) and (max-width: 1442px) {
    #mydata_wrapper {
        max-width:90%!important;
		margin-left:1%!important;
    }
	#mainform{
		max-width:92%!important;
	}
  }
  @media only screen and (min-width: 1300px) and (max-width: 1349px) {
    #mydata_wrapper {
        max-width:87%!important;
		margin-left:1%!important;
    }
	#mainform{
		max-width:89%!important;
	}
	
  }
  @media only screen and (min-width: 1200px) and (max-width: 1299px) {
    #mydata_wrapper {
        max-width:78%;
		margin-left:1%!important;
    }
	#mainform{
		max-width:80%!important;
	}
	
  }
  @media only screen and (min-width: 1065px) and (max-width: 1199px) {
    #mydata_wrapper {
        max-width:80%;
		margin-left:1%!important;
    }
	#mainform{
		max-width:83%!important;
	}
  }
  
  @media only screen and (min-width: 1000px) and (max-width: 1064px) {
    #mydata_wrapper {
        max-width:75%!important;
		margin-left:0%!important;
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
        Email SMS Server setting
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
        <li class="active">Server Config</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
		 <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
<div class="container bg-3">  

<br>  
  <br>
  <div class="row text-">
    
	<div class="container">
<?php 
		 ?>
	<?=$this->session->flashdata('flashmsg');?>
	  <form class="form-horizontal formbody" action="<?=base_url()?>masters/emailsmsconfig/edit" method="post" id="mainform">
		<div class="row mainheadlinefirstrow">
			<div class="col-md-12 mainheadlinefirst">Email Server</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Outgoing Server<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control" id="smtpserver" name="smtpserver" data-validation="required"
					data-validation-error-msg="This Field is required" value='<?=$getconfig->smtpserver;?>'>
					 <input type="hidden" id="eid" name="eid" value='1'>
				  </div>
				</div>
			</div>
		
			 <div class="col-md-4">
				
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">SMTP Port<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control" id="smtpport" name="smtpport" data-validation="required"
					data-validation-error-msg="This Field is required"  value='<?=$getconfig->smtpport;?>' >
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Username<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control" id="smtpuser" name="smtpuser" value='<?=$getconfig->smtpuser;?>' data-validation="required"
					data-validation-error-msg="This Field is required" >
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Password<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="password" class="form-control" id="smtppass" name="smtppass"  value='<?=$getconfig->smtppass;?>' data-validation="required"
					data-validation-error-msg="This Field is required">
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">From Email<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="email" class="form-control" id="fromemail" name="fromemail" data-validation="required"
					data-validation-error-msg="This Field is required"  value='<?=$getconfig->fromemail;?>' >
				  </div>
				</div>
			</div>
			
		</div>
		
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">SMS Server</div>
		</div>
		<div class="row">
			
			
			<div class="col-md-4">
				
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Username<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control" id="smsusername" name="smsusername" data-validation="required"
					data-validation-error-msg="This Field is required"  value='<?=$getconfig->smsusername;?>'>
				  </div>
				</div>
			</div>
			
			
			<div class="col-md-4">
				
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Password<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="password" class="form-control" id="smspass" name="smspass" data-validation="required"
					data-validation-error-msg="This Field is required"  value='<?=$getconfig->smspass;?>'>
				  </div>
				</div>
			</div>
			
			
			<div class="col-md-4">
				
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Sender id<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control" id="smssenderid" name="smssenderid" data-validation="required"
					data-validation-error-msg="This Field is required"  value='<?=$getconfig->smssenderid;?>'>
				  </div>
				</div>
			</div>
			
			
			<div class="col-md-4">
				
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Feed Id<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control" id="smsfeedid" name="smsfeedid" data-validation="required"
					data-validation-error-msg="This Field is required"  value='<?=$getconfig->smsfeedid;?>'>
				  </div>
				</div>
			</div>
			
			
			<div class="col-md-4">
				
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">URL<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control" id="smsurl" name="smsurl" data-validation="required"
					data-validation-error-msg="This Field is required"  value='<?=$getconfig->smsurl;?>'>
				  </div>
				</div>
			</div>
			
			
			
			
		</div>
		
		</div>
		<div class="row">
		<div class="col-md-12">
			
			<div class="form-group">        
				  <div class="col-sm-9">
					<button type="submit" class="btn btn-info" id="submit" name="submit">Submit</button>
					<button type="reset" id="reset" class="btn btn-info" name="reset">Reset</button>
				  </div>
			</div>
			</div>
		</div>
	  </form>
</div>
	
	<br>
	
	
  </div>
</div><br>
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
