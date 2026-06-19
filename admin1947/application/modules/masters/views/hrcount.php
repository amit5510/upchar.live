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
        Training Duration
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
        <li class="active">Trainig</li>
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

	<?=$this->session->flashdata('flashmsg');?>
	  <form class="form-horizontal formbody" action="<?=base_url()?>masters/hrcount/create" method="post" id="mainform">
		<div class="row mainheadlinefirstrow">
			<div class="col-md-12 mainheadlinefirst">Basic Details</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Select DPR<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control" id="dpr" name="dpr" data-validation="required"
					data-validation-error-msg="This Field is required">
						<option value="">Select</option>
						<?php foreach($dpr->result() as $dprrow){ ?>
							<option value="<?=$dprrow->dpr_id?>"><?=$dprrow->dpr_name?></option>
						<?php } ?>
					</select>
				  </div>
				</div>
			</div>
		
			 <div class="col-md-4">
				
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Total Nos of Hr<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control" id="totalhr" name="totalhr" data-validation="required"
					data-validation-error-msg="This Field is required" onkeypress="return isNumber(event)">
					 <input type="hidden" id="eid" name="eid">
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Batch Limit<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control" id="batchlimit" name="batchlimit" data-validation="required"
					data-validation-error-msg="This Field is required" onkeypress="return isNumber(event)">
				  </div>
				</div>
			</div>
			
		</div>
		
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Working Days</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label class="checkbox-inline"><input type="checkbox" id="mon" name="mon" value="1" checked>Monday</label>&emsp;
				<label class="checkbox-inline"><input type="checkbox" id="tue" name="tue" value="1" checked>Tuesday</label>&emsp;
				<label class="checkbox-inline"><input type="checkbox" id="wed" name="wed" value="1" checked>Wednesday</label>&emsp;
				<label class="checkbox-inline"><input type="checkbox" id="thurs" name="thurs" value="1" checked>Thursday</label>&emsp;
				<label class="checkbox-inline"><input type="checkbox" id="fri" name="fri" value="1" checked>Friday</label>&emsp;
				<label class="checkbox-inline"><input type="checkbox" id="sat" name="sat" value="1" checked>Saturday</label>&emsp;
				<label class="checkbox-inline"><input type="checkbox" id="sun" name="sun" value="1" >Sunday</label>
			</div>
		</div>
		
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Center Trainig Details</div>
		</div>
		
		<div class="row">
		 <div class="col-md-6">
			
			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">Hr. Per Day<span class="starspan">*</span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="centerperday" name="centerperday" data-validation="required"
					data-validation-error-msg="This Field is required" onkeypress="return isNumber(event)">
			  </div>
			</div>
		</div>
		 <div class="col-md-6">
		 	<div class="form-group">
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Total Hr.<span class="starspan">*</span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="centertotal" name="centertotal" data-validation="required"
					data-validation-error-msg="This Field is required" onkeypress="return isNumber(event)">
			  </div>
			</div>
			
		 </div>
		</div>
		
		
		
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Industrial Trainig Details</div>
		</div>
		
		<div class="row">
		 <div class="col-md-6">
			
			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">Hr. Per Day<span class="starspan">*</span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="industrialperday" name="industrialperday" data-validation="required"
					data-validation-error-msg="This Field is required" onkeypress="return isNumber(event)">
			  </div>
			</div>
		</div>
		 <div class="col-md-6">
		 	<div class="form-group">
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Total Hr.<span class="starspan">*</span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="industrialtotal" name="industrialtotal" data-validation="required"
					data-validation-error-msg="This Field is required" onkeypress="return isNumber(event)">
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
	<br>
	<br>
	
	<table class="table table-bordered" id='mydata' style="border:none;">
    <thead>
      <tr>
        <th class="tableheaddata">S.No.</th>
        <th class="tableheaddata">DPR</th>
        <th class="tableheaddata">Total Hr</th>
        <th class="tableheaddata">Batch Limit</th>
        <th class="tableheaddata">Center HR Per Day</th>
        <th class="tableheaddata">Industrial HR Per Day</th>
        <th class="tableheaddata">Center Total HR</th>
        <th class="tableheaddata">Industrial Total HR</th>
        <th class="tableheaddata">Working Days</th>
        <th class="tableheaddata">Action</th>
      </tr>
    </thead>
    <tbody>
	<?php 
		$getlists=$this->db->get_where('master_training_duration');
		$sn=1;
		
		foreach($getlists->result() as $rowdata){
			$alldays=['mon','tue','wed','thurs','fri','sat','sun'];
			$count=0;
			for($i=0;$i<7;$i++)
			{
				$dayvalue=$rowdata->$alldays[$i];
				if($dayvalue==1)
				{
					$count=$count+1;
				}
			}
		$dpr=$this->db->get_where('dpr_create',array('dpr_id'=>$rowdata->dpr))->row('dpr_name');
	?>
      <tr class="active">
        <td class="tabledata"><?=$sn;?></td>
		<td class="tabledata"><?=$dpr;?></td>
        <td class="tabledata"><?=$rowdata->totalhr;?></td>
		<td class="tabledata"><?=$rowdata->batchlimit;?></td>
        <td class="tabledata"><?=$rowdata->centerperday;?></td>
		<td class="tabledata"><?=$rowdata->industrialperday;?></td>
        <td class="tabledata"><?=$rowdata->centertotal;?></td>
		<td class="tabledata"><?=$rowdata->industrialtotal;?></td>
        <td class="tabledata"><?=$count;?></td>
        <td class="tabledata"><a href="#" style="cursor:pointer" class="select" data-uid="<?=base64_encode($rowdata->id)?>">Edit</a></td>
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
			var uri='<?=base_url()?>masters/hrcount/edit';
			$.ajax({
			 type:"post", 
			 url: uri,
			 dataType: 'json',
			 data:{uid:uid},
			 success: function(result){
				
				var uid=result['id'];
				var dpr=result['dpr'];
				var dprid=result['dprid'];
				var totalhr=result['totalhr'];
				var batchlimit=result['batchlimit'];
				var centerperday=result['centerperday'];
				var centertotal=result['centertotal'];
				var industrialperday=result['industrialperday'];
				var industrialtotal=result['industrialtotal'];
				var mon=result['mon'];
				var tue=result['tue'];
				var wed=result['wed'];
				var thurs=result['thurs'];
				var fri=result['fri'];
				var sat=result['sat'];
				var sun=result['sun'];
				$("#dpr").val(dprid);
				$("#totalhr").val(totalhr);
				$("#batchlimit").val(batchlimit);
				$("#centerperday").val(centerperday);
				$("#centertotal").val(centertotal);
				$("#industrialperday").val(industrialperday);
				$("#industrialtotal").val(industrialtotal);
				$("#eid").val(uid);
				if(mon == 1){
					$("#mon").attr("checked", "checked");
				}
				else{
					$("#mon").removeAttr("checked");
				}
				
				if(tue == 1){
					$("#tue").attr("checked", "checked");
				}
				else{
					$("#tue").removeAttr("checked");
				}
				if(wed == 1){
					$("#wed").attr("checked", "checked");
				}
				else{
					$("#wed").removeAttr("checked");
				}
				if(thurs == 1){
					$("#thurs").attr("checked", "checked");
				}
				else{
					$("#thurs").removeAttr("checked");
				}
				if(fri == 1){
					$("#fri").attr("checked", "checked");
				}
				else{
					$("#fri").removeAttr("checked");
				}
				if(sat == 1){
					$("#sat").attr("checked", "checked");
				}
				else{
					$("#sat").removeAttr("checked");
				}
				
				if(sun == 1){
					$("#sun").attr("checked", "checked");
				}
				else{
					$("#sun").removeAttr("checked");
				}
				
				
				
				
			 }

			});
			
			
			$("#submit").html('Update');
		
    });
    $("#reset").click(function(){
		
			$("#education").val('');
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

var validatehrs = function validatehrs(){
	var totalhr = $("#totalhr").val();
	var centertotal = $("#centertotal").val();
	var industrialtotal = $("#industrialtotal").val();
	if(totalhr!='' && centertotal!='' && industrialtotal!=''){
		if(parseInt(totalhr) != ( parseInt(centertotal) + parseInt(industrialtotal) )  ){
			$(this).val('');
			alert('Sum of Center & Industrial Hr Should be equal to Total Hr!');
		}
	}			
	
}
$("#totalhr,#centertotal,#industrialtotal").blur(validatehrs);
	
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
