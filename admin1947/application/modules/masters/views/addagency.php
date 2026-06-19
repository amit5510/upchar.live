<!DOCTYPE html>
<html>
<style>
 <style>
  .tabledata{
	  border:1px solid #fff!important;
	  font-weight:600;
	 font-size:12px;
  }
  .tableheaddata{
	  border:1px solid #fff!important;
	  background:#605CA8;
	  color:#fff;
	  text-align:center;
	  font-size:13px;
  }
  .label-name{
	  text-align:left!important;
	  white-space: nowrap;
  }
  .mainheadlinefirstrow
  {
	  padding:5px;
  }
  .mainheadlinefirst
  {
	  background:#605ca8;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;
  }
  .starspan
  {
	  color:#e80909;
	  font-size:18px;
  }
 .mainhead{
      font-weight:600;margin-bottom:20px;
  }
  .formbody{border:2px solid #f0f5ff;padding:10px;border-radius:4px;}
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
        max-width:75%;
		margin-left:2%!important;
    }
	
  }
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
        Add Agency
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
        <li class="active">Agency</li>
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
	  <form class="form-horizontal formbody" action="<?=base_url()?>masters/addagency/create" method="post" enctype='multipart/form-data' id="mainform">
		
		
		
		
		<div class="row">
		<div class="col-md-6">
			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">DPR<span class="starspan">*</span></label>
			  <div class="col-sm-7" >
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
		 </div><br>
		 <div class="col-md-6">
			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">Company Name<span class="starspan">*</span></label>
			  <div class="col-sm-7" >
				<input type="text" class="form-control" id="companyname" name="companyname" data-validation="required"
					data-validation-error-msg="This Field is required">
			  </div>
			</div>
		 </div>
		 <div class="col-md-6">
		 <div class="form-group">
			
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Contact Person Name<span class="starspan">*</span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="contactperson" name="contactperson" data-validation="required"
					data-validation-error-msg="This Field is required">
			  </div>
			</div>
		</div>
		<br>
		<div class="col-md-6">
			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">Company Address<span class="starspan">*</span></label>
			  <div class="col-sm-7" >
				<input type="text" class="form-control" id="companyaddress" name="companyaddress" data-validation="required"
					data-validation-error-msg="This Field is required">
			  </div>
			</div>
		 </div>
		 <div class="col-md-6">
		 <div class="form-group">
			
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">City<span class="starspan">*</span></label>
			  <div class="col-sm-7">
				<input type="text" class="form-control" id="city" name="city" data-validation="required"
					data-validation-error-msg="This Field is required">
				<input type="hidden" name="eid" id="eid">
			  </div>
			</div>
		</div>
		<br>
		<div class="col-md-6">
			<div class="form-group">
			 
			  <label class="control-label col-sm-4 label-name" for="email">State<span class="starspan">*</span></label>
			  <div class="col-sm-7">
				<select class="form-control state" id="state" name="state" data-validation="required"
		 data-validation-error-msg="This Field is required">
					<option value="">Select</option>
					<?php
					$statedatas=$this->db->order_by('state_name','ASC')->get_where('lgd_states');
					foreach($statedatas->result() as $statedata){
					?>
					<option value="<?=$statedata->state_code;?>" data-uid="<?=$statedata->state_code;?>"><?=$statedata->state_name;?></option>
					<?php } ?>
				</select>
			  </div>
			</div>
		 </div>
		 <div class="col-md-6">
		 <div class="form-group">
			
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">District<span class="starspan">*</span></label>
			  <div class="col-sm-7">
				<select class="form-control" id="district" name="district" data-validation="required"
				data-validation-error-msg="This Field is required">
					<option value="">Select</option>
				</select>
			  </div>
			</div>
		</div>
		<br>
		 <div class="col-md-6">
			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">PIN<span class="starspan">*</span></label>
			  <div class="col-sm-7" >
				<input type="text" class="form-control" id="pin" name="pin" data-validation="required,length" data-validation-length="6-6" data-validation-error-msg="PINCODE must be 6 digit" onkeypress="return isNumber(event)">
			  </div>
			</div>
		 </div>
		 <div class="col-md-6">
		 <div class="form-group">
			
			<div class="col-sm-1"></div>
			  <label class="control-label col-sm-4 label-name" for="email">Email<span class="starspan">*</span></label>
			  <div class="col-sm-7">
				<input type="email" class="form-control" id="email" name="email" data-validation="required"
					data-validation-error-msg="Email is required">
			  </div>
			</div>
		</div>
		<br>
		<div class="col-md-6">
			<div class="form-group">
			  <label class="control-label col-sm-4 label-name" for="email">Contact Number<span class="starspan">*</span></label>
			  <div class="col-sm-7" >
				<input type="text" class="form-control" id="contactnumber" name="contactnumber" data-validation="required"
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
					<button type="reset" id="reset" class="btn btn-info" name="reset" >Reset</button>
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

<!--Agency details-->
<div class="container" style="border:1px solid #ccc">
<div class="row mainheadlinefirstrow" style="padding:0px;">
			<div class="col-md-12 mainheadlinefirst" style="margin-top:0px;">Center Details</div>
		</div>
	<div class="row" style="border-bottom:1px solid #d5d6d8;">
		  <div class="col-md-4">
			<div class="form-group">
				  <label class="control-label col-sm-4 label-name" style="margin-top:4px;">DPR<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control facultydpr fddi_agencydetails" id="dpr" data-validation="required"
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
		  
			
			<br><br>
	</div>
	<hr>
	
	<div class="row">
		<table class="table table-bordered tab" id='mydata' style="border:none;">
    <thead>
      <tr>
        <th class="tableheaddata">DPR</th>
        <th class="tableheaddata">Company Name</th>
        <th class="tableheaddata">Contact Person</th>
        <th class="tableheaddata">State</th>
        <th class="tableheaddata">District</th>
        <th class="tableheaddata">Pin</th>
        <th class="tableheaddata">Contact Number</th>
        <th class="tableheaddata">Email</th>
        <th class="tableheaddata">City</th>
        <th class="tableheaddata">Select</th>
        <th class="tableheaddata">Delete</th>
      </tr>
    </thead>
    <tbody id="agencybody">
	
    </tbody>
  </table>
	</div>
</div>
<!--End Agency Details-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script>
  $.validate({
   
  });
</script>



<script>
$(document).ready(function(){
	
    $("body").on('click','.select',function(){
		
			var uid=$(this).attr('data-uid');  
			var uri='<?=base_url()?>masters/addagency/edit';
			$.ajax({
			 type:"post", 
			 url: uri,
			 dataType: 'json',
			 data:{uid:uid},
			 success: function(result){
				var eid=result['id'];
				//var dpr=result['dpr'];
				var dpr=$('.facultydpr').val();
				var companyname=result['companyname'];
				var contactperson=result['contactperson'];
				var companyaddress=result['companyaddress'];
				var city=result['city'];
				var state=result['state'];
				var district=result['district'];
				var districtid=result['districtid'];
				var pin=result['pin'];
				var email=result['email'];
				var contactnumber=result['contactnumber'];
				$("#eid").val(eid);
				$("#dpr").val(dpr);
				$("#companyname").val(companyname);
				$("#contactperson").val(contactperson);
				$("#companyaddress").val(companyaddress);
				$("#state").val(state);
				$("#city").val(city);
				$("#pin").val(pin);
				$("#email").val(email);
				$("#contactnumber").val(contactnumber); 
				$("#district").html(district);
				$("#district").val(districtid);
				
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
	
    $("body").on('click','.delete',function(){
		var c=confirm('Are you sure to delete');
		if(c)
		{
			var uid=$(this).attr('data-uid'); 
			var uri='<?=base_url()?>masters/addagency/delete/'+uid
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
<script type="text/javascript" src="<?=base_url();?>public/assets/dist/js/getdistrict.js"></script>

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
		$(document).ready(function(){
			$(".fddi_agencydetails").change(function(){
					var vid=this.value; 
					
					var uri="<?=base_url()?>others/other/getagencyview";
					
					if ( $(this).hasClass("facultydpr") ) 
					{   
						var type='dpr'; 
					}
				
					$.ajax({
						 type:"post", 
						 url: uri,
						 data:{vid:vid,type:type},
						 success: function(result){
							 console.log(result);
							$("#agencybody").html(result);
								
						}

						});			
			});
		});
	</script>

    </section>
    <!-- /.content -->
  </div>
  
  
  <!-- /.content-wrapper -->
  <?=$this->load->view('inc/footer');?>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


</body>
</html>
