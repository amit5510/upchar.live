<!DOCTYPE html>
<html>

 <style>
  .tabledata{
	  border:1px solid #fff!important;
	  font-weight:600;
  }
    .table>tbody>tr.active>td, .table>tbody>tr.active>th, .table>tbody>tr>td.active, .table>tbody>tr>th.active, .table>tfoot>tr.active>td, .table>tfoot>tr.active>th, .table>tfoot>tr>td.active, .table>tfoot>tr>th.active, .table>thead>tr.active>td, .table>thead>tr.active>th, .table>thead>tr>td.active, .table>thead>tr>th.active {
    background-color: #3c8dbc;
    color: white;
}

  .error valid{
	  color:green!important;
  }
 
  .tabledatainactive{
	  color:red;
  }
 
#submit {
    background: #337aa3;
    padding: 6px 30px;
}
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
        Council
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
        <li class="active">Council</li>
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
	<form action="<?=base_url()?>masters/council/create" method="post" id="myform">
	<div class="formheader">
		Council Master
	</div>
	<div class="formdiv">
		<div class="form-group">
		  <label for="text">Name:</label>
		  <input type="text" class="form-control" id="religion" placeholder="Enter Council" name="specilization" data-validation="required"
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
	<?php echo form_open("masters/council",'class="form-horizontal formbody" id="search_form" method="get"');  ?>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label col-sm-2 label-name" for="email">Records Per Page</label> 
								<div class="col-sm-2"><?php echo display_record_per_page();?></div>
								<label class="control-label col-sm-1 label-name" for="email">Name</label>
								<div class="col-sm-3">
									<input type="text" class="form-control input-sm" name="keyword" value="<?php echo $this->input->get_post('keyword');?>">
								</div>
								
							
							
								
								 
								<label class="control-label col-sm-1 label-name" for="email"></label>
								<div class="col-sm-3">
									<a  onclick="$('#search_form').submit();" style="padding-top:1px" class="button2 btn-lg btn btn-info" ><span> Search </span></a>
									<?php 
									if($this->input->get_post('keyword')!='' || $this->input->get_post('mobile')!='' || $this->input->get_post('city_name')!='')
									{ 
										echo anchor("masters/council/",'<span>Clear Search</span>');    
									} 
									?>
								</div>
							</div>
						</div>
					</div>
					<?php echo form_close();?>
	<br>
	<div>
	<table class="table table-bordered" id='mydata' style="border:none;">
    <thead>
      <tr>
        <th class="tableheaddata"> ID</th>
        <th class="tableheaddata">Council Name</th>
        <th class="tableheaddata">Status</th>
        <th class="tableheaddata">Select</th>
        <th class="tableheaddata">Delete</th>
      </tr>
    </thead>
    <tbody>
	<?php 
		
		foreach($council as $rowdata){
		$status=$rowdata['status'];
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
        <td class="tabledata"><?=$rowdata['id'];?></td>
        <td class="tabledata"><?=$rowdata['name'];?></td>
		
        <td class="tabledata"><a href="#" class="statuscng " id="ch<?=$rowdata['id'];?>" data-uid="<?=$rowdata['id'];?>" style="cursor:pointer"><span class="<?=$statusclass?>" ><?=$statusvalue?></span></a></td>
        <td class="tabledata" id="kamal"><a href="#" style="cursor:pointer" class="select" data-uid="<?=base64_encode($rowdata['id'])?>" data-name="<?=$rowdata['name'];?>">Select</a></td>
		
        <td class="tabledata"><a href="#" style="cursor:pointer" class="delete" data-uid="<?=$rowdata['id'];?>">Delete</a></td>
      </tr>
		<?php } ?>
    </tbody>
  </table>
	
  </div>
   <div class="row">
						
						<div class="col-md-7">
							<div class="pagination"><?php echo $page_links; ?></div>
						</div>
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
			var uri='<?=base_url()?>masters/council/delete/'+uid
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
		
		var uri='<?=base_url()?>masters/council/update';
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
