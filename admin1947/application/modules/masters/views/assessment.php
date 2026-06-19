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
  
  
  #assessmentfield{
	  margin-top:18px;
  }
  #assessmentlabel{
	  margin-top:18px;
  }
   .mainhead{
      font-weight:600;margin-bottom:20px;
  }
  .formbody{
      border:2px solid #f0f5ff;padding:10px;border-radius:4px;
  }
  #submit{background:#605ca8;padding: 6px 30px;}
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  #chdiv{margin-bottom:15px;}
   @media only screen and (min-width: 1300px) and (max-width: 1349px) {
		#chagg{margin-top:-22px;margin-bottom:34px;}
   }
   @media only screen and (min-width: 1165px) and (max-width: 1300px) {
		#rdagg{margin-top:-21px;margin-bottom: 7px;}
   }
   
  @media only screen and (min-width: 1400px) and (max-width: 1442px) {
    #mydata_wrapper {
        max-width:96%!important;
		margin-left:1%!important;
    }
	#mainform{
		max-width:98%!important;
	}
  }
  @media only screen and (min-width: 1350px) and (max-width: 1399px) {
    #mydata_wrapper {
        max-width:94%!important;
		margin-left:0%!important;
    }
	#mainform{
		max-width:95%!important;
	}
  }
   @media only screen and (min-width: 1300px) and (max-width: 1349px) {
    #mydata_wrapper {
        max-width:89%!important;
		margin-left:1%!important;
    }
	#mainform{
		max-width:91%!important;
	}
	
  }
  @media only screen and (min-width: 1200px) and (max-width: 1299px) {
    #mydata_wrapper {
        max-width:80%;
		margin-left:1%!important;
    }
	#mainform{
		max-width:82%!important;
	}
	
  }
  @media only screen and (min-width: 1165px) and (max-width: 1199px) {
    #mydata_wrapper {
        max-width:93%;
		margin-left:1%!important;
    }
	#mainform{
		max-width:95%!important;
	}
  }
  
  @media only screen and (min-width: 1065px) and (max-width: 1164px) {
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
        max-width:75%;
		margin-left:2%!important;
    }
	
  }
  .othernote{
      font-weight:600;font-size:13px;color:#d20c0c;
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
        Assessment Details
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
        <li class="active">Add Assessment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
		 <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
<div class="container bg-3 ">  

<br>  
  <br>
  <div class="row text-">
    
	<div class="container">

	<?=$this->session->flashdata('flashmsg');?>
	  <form class="form-horizontal formbody" action="<?=base_url()?>masters/assessment/create" method="post" enctype="multipart/form-data" id="mainform">
		
		<div class="row">
			<div class="col-md-6">
			<div class="form-group">
			 
			  <label class="control-label col-sm-4 label-name" id="assessmentlabel" for="email">DPR<span class="starspan">*</span></label>
			  <div class="col-sm-7" id="assessmentfield">
				<select class="form-control dpr" id="dpr" data-validation="required"
					data-validation-error-msg="This Field is required" name="dpr">
						<option value="">Select</option>
						<?php
						$dprfield=$this->db->get_where('dpr_create',array('active'=>1));
						foreach($dprfield->result() as $dprfielddate){
						?>
						<option value="<?=$dprfielddate->dpr_id;?>"><?=$dprfielddate->dpr_name;?></option>
						<?php } ?>
					</select>
			  </div>
			</div>
		 </div>
		</div>
		<div class="row">
		
		 <div class="col-md-6">
			<div class="form-group">
			 <label class="control-label col-sm-4 label-name" for="email"></label>
			  <div class="col-sm-7">
				<label class="radio-inline"><input type="radio" id="radiocenter" name="radio" value="Center" checked>Center</label>&emsp;
				<label class="radio-inline"><input type="radio" id="radioindustrial" name="radio" value="Industrial">Industrial</label>&emsp;
				<label class="radio-inline" id="rdagg"><input type="radio" id="radioaggregate" name="radio" value="Aggregate">Aggregate</label>&emsp;
			  </div>
			  
			  <label class="control-label col-sm-4 label-name" id="assessmentlabel" for="email">Assessment %<span class="starspan">*</span></label>
			  <div class="col-sm-7" id="assessmentfield">
				<input type="text" class="form-control" id="assessmentperc" name="assessmentperc" data-validation="required"
					data-validation-error-msg="This Field is required" onkeypress="return isNumber(event)">
				<input type="hidden" id="eid" name="eid">
			  </div>
			</div>
		 </div>
		 <div class="col-md-6">
		 <div class="form-group">
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email"></label>
			  <div class="col-sm-7" id="chdiv">
				<label class="checkbox-inline"><input type="checkbox" id="checktheortical" name="checktheortical" value="1" checked>Theortical</label>&emsp;
				<label class="checkbox-inline"><input type="checkbox" id="checkpractical" name="checkpractical" value="1" >Practical</label>&emsp;
				<label class="checkbox-inline" id="chagg"><input type="checkbox" id="checkaggregate" name="checkaggregate" value="1">Aggregate</label>&emsp;
			  </div>
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Passing %<span class="starspan">*</span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="passingper" name="passingper" data-validation="required"
					data-validation-error-msg="This Field is required" onkeypress="return isNumber(event)">
			  </div>
			</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
			<div class="form-group">
			 
			  <label class="control-label col-sm-4 label-name" for="email">Theory Max Marks<span class="starspan">*</span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="theorymax" name="theorymax" data-validation="required"
					data-validation-error-msg="This Field is required" onkeypress="return isNumber(event)">
			  </div>
			</div>
		 </div>
		

		<div class="col-md-6">
		 <div class="form-group">
			
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Practical Max Marks<span class="starspan">*</span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="practicalmax" name="practicalmax" data-validation="required"
					data-validation-error-msg="This Field is required" onkeypress="return isNumber(event)">
			  </div>
			</div>
		</div>
		</div>
		<div class="row">
		
		<div class="col-md-6">
			<div class="form-group">
			 
			  <label class="control-label col-sm-4 label-name" for="email">Signature<span class="starspan">*</span></label>
			  <div class="col-sm-7" id="signature">
				<input type="file" class="form-control" name="signature" data-validation="required"
					data-validation-error-msg="This Field is required">
				<p class="othernote">Size of signature should be less than 50 KB.</p>
			  </div>
			</div>
		
			
		 </div>
			
		 <div class="col-md-6">
		 <div class="form-group">
			
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Min OJT %<span class="starspan">*</span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="min_ojt" name="min_ojt" data-validation="required"
					data-validation-error-msg="This Field is required" onkeypress="return isNumber(event)">
			  </div>
			</div>
		</div>
		</div>
		<div class="row" style="margin-top:20px">
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
	<br>
	<br>
	
	<table class="table table-bordered" id='mydata' style="border:none;">
    <thead>
      <tr>
        <th class="tableheaddata">S.No.</th>
        <th class="tableheaddata">DPR</th>
        <th class="tableheaddata">Assessment</th>
        <th class="tableheaddata">Assessment %</th>
        <th class="tableheaddata">Passing %</th>
        <th class="tableheaddata">Theory Marks</th>
        <th class="tableheaddata">Practical Marks</th>
        <th class="tableheaddata">OJT %</th>
        <th class="tableheaddata">Select</th>
        <th class="tableheaddata">Delete</th>
      </tr>
    </thead>
    <tbody>
	<?php 
		$getlists=$this->db->order_by('assessment_id','DESC')->get_where('master_assessment');
		$sn=1;
		
		foreach($getlists->result() as $rowdata){
		
	?>
      <tr class="active">
        <td class="tabledata"><?=$sn;?></td>
		<td class="tabledata"><?=getDprName($rowdata->dpr);?></td>
		<td class="tabledata"><?=$rowdata->radiovalue;?></td>
		<td class="tabledata"><?=$rowdata->assessmentpercent;?></td>
        <td class="tabledata"><?=$rowdata->passingper;?></td>
		<td class="tabledata"><?=$rowdata->theorymax;?></td>
        <td class="tabledata"><?=$rowdata->practicalmax;?></td>
        <td class="tabledata"><?=$rowdata->min_ojt;?></td>
		<td class="tabledata"><a href="#" style="cursor:pointer" class="select" data-uid="<?=base64_encode($rowdata->assessment_id)?>">Select</a></td>
		
        <td class="tabledata"><a href="#" style="cursor:pointer" class="delete" data-uid="<?=$rowdata->assessment_id;?>">Delete</a></td>
      </tr>
     <?php
		$sn++; }
	 ?>
    </tbody>
  </table>
	
  </div>
</div><br>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script>
  $.validate({
   
  });
</script>

<script>
$(document).ready(function(){
	
    $(".select").click(function(){
		
			var uid=$(this).attr('data-uid'); 
			var uri='<?=base_url()?>masters/assessment/edit';
			$.ajax({
			 type:"post", 
			 url: uri,
			 dataType:'json',
			 data:{uid:uid},
			 success: function(result){
				
				
				var uid=result['id'];
				var dpr=result['dpr'];
				var radiovalue=result['radiovalue'];
				var assessmentpercent=result['assessmentpercent'];
				var checktheortical=result['checktheortical'];
				var checkpractical=result['checkpractical'];
				var checkaggregate=result['checkaggregate'];
				var passingper=result['passingper'];
				var theorymax=result['theorymax'];
				var practicalmax=result['practicalmax'];
				var signature=result['signature'];
				var min_ojt=result['min_ojt'];
				
				if(radiovalue=='Center')
				{
					$("#radiocenter").attr("checked", "checked");
				}
				else if(radiovalue=='Industrial')
				{
					$("#radioindustrial").attr("checked", "checked");
				}
				else
				{
					$("#radioaggregate").attr("checked", "checked");
				}
				
				$("#eid").val(uid);
				$("#dpr").val(dpr);
				$("#assessmentperc").val(assessmentpercent);
				$("#passingper").val(passingper);
				$("#theorymax").val(theorymax);
				$("#practicalmax").val(practicalmax);
				$("#min_ojt").val(min_ojt);
				$("#signature").html(signature);
				
				if(checktheortical == 1){
					$("#checktheortical").attr("checked", "checked");
				}
				else{
					$("#checktheortical").removeAttr("checked");
				}
				
				if(checkpractical == 1){
					$("#checkpractical").attr("checked", "checked");
				}
				else{
					$("#checkpractical").removeAttr("checked");
				}
				if(checkaggregate == 1){
					$("#checkaggregate").attr("checked", "checked");
				}
				else{
					$("#checkaggregate").removeAttr("checked");
				}
			 }

			});
			
			
			$("#submit").html('Update');
		
    });
    $("#reset").click(function(){
		
			$("#eid").val('');
			$("#submit").html('Add');
		
    });
});
</script>

<script>
$(document).ready(function(){
	
    $(".delete").click(function(){
		var c=confirm('Are you sure to delete');
		if(c)
		{
			var uid=$(this).attr('data-uid'); 
			var uri='<?=base_url()?>masters/assessment/delete/'+uid
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
		function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
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
