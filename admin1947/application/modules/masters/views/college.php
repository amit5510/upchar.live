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
        College
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
        <li class="active">College</li>
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
	<form action="<?=base_url()?>masters/college/create" method="post" id="myform">
	<div class="formheader">
		College Master
	</div>
	<div class="formdiv">
		<div class="form-group">
		  <label for="text">Name:</label>
		  <input type="text" class="form-control" id="religion" placeholder="Enter College" name="specilization" data-validation="required"
		 data-validation-error-msg="This Field is required">
		 <input type="hidden" id="eid" name="eid">
		  <!--<p style="color:#ef0909;font-weight:600;">Please insert value in filled</p>-->
		</div>
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
	
	<br>
	<br>
	<br>
	<div>
	<table class="table table-bordered" id='mydata' style="border:none;">
    <thead>
      <tr>
        <th class="tableheaddata"> ID</th>
        <th class="tableheaddata">College Name</th>
        <th class="tableheaddata">Status</th>
        <th class="tableheaddata">Select</th>
        <th class="tableheaddata">Delete</th>
      </tr>
    </thead>
    <tbody>
	<?php 
		$getlists=$this->db->get_where('master_college');
		foreach($getlists->result() as $rowdata){
		$status=$rowdata->status;
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
        <td class="tabledata"><?=$rowdata->id;?></td>
        <td class="tabledata"><?=$rowdata->name;?></td>
		
        <td class="tabledata"><a href="#" class="statuscng " id="ch<?=$rowdata->id;?>" data-uid="<?=$rowdata->id;?>" style="cursor:pointer"><span class="<?=$statusclass?>" ><?=$statusvalue?></span></a></td>
        <td class="tabledata" id="kamal"><a href="#" style="cursor:pointer" class="select" data-uid="<?=base64_encode($rowdata->id)?>" data-name="<?=$rowdata->name;?>">Select</a></td>
		
        <td class="tabledata"><a href="#" style="cursor:pointer" class="delete" data-uid="<?=$rowdata->id;?>">Delete</a></td>
      </tr>
		<?php } ?>
    </tbody>
  </table>
	
  </div>
</div></div><br>
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
			var uri='<?=base_url()?>masters/college/delete/'+uid
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
		
		var uri='<?=base_url()?>masters/college/update';
			$.ajax({
			 type:"post", 
			 url: uri,
			 data:{uid:uid},
			 success: function(result){
				
			   if(result=='Show')
			   {
				  location.reload();
				  //$("#row").html("<span style='color:green'>Active</span>");
			   }
			   else if(result=='Hide'){
				   location.reload();
				   //$("#row").text("<span style='color:red'>In-Active</span>");
			   }
			   
			 }

			});
        
    });
});
</script>

<script>
$(document).ready(function(){
	
    $(".select").click(function(){
		
			var uid=$(this).attr('data-uid'); 
			var name=$(this).attr('data-name'); 
			
			$("#religion").val(name);
			$("#eid").val(uid);
			$("#submit").html('Update');
		
    });
    $("#reset").click(function(){
		
			$("#religion").val('');
			$("#eid").val('');
			$("#submit").html('Add');
		
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
