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
   table.dataTable tbody tr {
    background-color: #e5e4f1;
}
  </style>

   <style>
  
  .label-name{
	  text-align:left!important;
	  margin-top:-5px;
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
	  background:#605ca8;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;
  }
  .mainheadlinefirstrow
  {
	  padding:5px;
  }
  .mainheadlinefirst
  {
	  background:#605ca8;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;
  }
  .mainhead{font-weight:600;margin-bottom:20px;}
  .formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
  .note{font-weight:600;margin-top:10px;margin-bottom:20px;}
  #submit{background:#605ca8;padding: 6px 30px;}
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  </style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<!--there was sidebar -->
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      
		  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
  
<div class="container bg-3 ">  
<br>  
  <br>
  <div class="row text-">
    
	
	<?=$this->session->flashdata('flashmsg');?>
	<h4 style="font-weight:600;margin-bottom:20px;">Doctor List</h2>
	<br>
	<form class='formbody hide'>
	<div class="row mainheadlinefirstrow">
			<div class="col-md-12 mainheadlinefirst">Basic Details</div>
		</div>
		
		<div class="row hide">
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">DPR<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control dpr input-sm listingdpr viewtrainee" id="dpr" data-validation="required"
					data-validation-error-msg="This Field is required" name="dpr">
						<option value="">Select</option>
						<?php
						/* $dprfield=$this->db->get_where('dpr_create',array('active'=>1));
						foreach($dprfield->result() as $dprfielddate){
						?>
						<option value="<?=$dprfielddate->dpr_id;?>"><?=$dprfielddate->dpr_name;?></option>
						<?php }  */?>
					</select>
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Center<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control listingcenter fddicenter input-sm viewtrainee" id="fddicenter" name="fddicenter" data-validation="required" data-validation-error-msg="This Field is required">
						<option value="">Select</option>
						
					</select>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Sub Center<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm listingsubcenter fddi_subcenter viewtrainee" id="fddi_subcenter" data-validation="required" data-validation-error-msg="This Field is required" name="fddi_subcenter">
						<option value="">Select</option>
						
					</select>
				  </div>
				</div>
			</div><br><br>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Course<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm listingcourse coursemenu viewtrainee" id="coursemenu" name="coursemenu">
						<option value="">Select</option>
						
					</select>
				  </div>
				</div>
			</div>
			
		</div>
		
	</div><br><!--<br><br>
	<p id="totviewpara" style="color:#c70850;font-size:18px;font-weight:600;text-align:center;display:none;">Total Count: <span id="tviewcount">0</span></p>--><br>
	<table class="table table-hover table-bordered table-bordered" id='neodatatable' style="border:none;">
    <thead>
      <tr>
        <th class="tableheaddata">Doctor ID</th>
        <th class="tableheaddata">Name</th>
        <th class="tableheaddata">City</th>
        <th class="tableheaddata">Email</th>
        <th class="tableheaddata">Mobile</th>
        <th class="tableheaddata">Reg. Date</th>
        <th class="tableheaddata">Actions</th>
      </tr>
    </thead><tfoot>
      <tr>
         <th class="tableheaddata">Doctor ID</th>
        <th class="tableheaddata">Name</th>
        <th class="tableheaddata">City</th>
        <th class="tableheaddata">Email</th>
        <th class="tableheaddata">Mobile</th>
        <th class="tableheaddata">Reg. Date</th>
        <th class="tableheaddata">Actions</th>
      </tr>
    </tfoot>
  </table>
	
  </div>
</div><br>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	
	<script type="text/javascript">
    $(document).ready(function () {
		
		/* $(".listingdpr, .listingcenter, .listingsubcenter, .listingcourse").change(function(){

				$('#neodatatable').DataTable().draw();
			
		}); */
	
        $('#neodatatable').DataTable({
			"ordering": false,
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: '<?=base_url();?>others/data_view/doctorview',
                type: 'POST',
				data: function(d){
					/* d.dpr = $(".listingdpr").val()
					d.center = $(".listingcenter").val()
					d.subcenter = $(".listingsubcenter").val()
					d.course = $(".listingcourse").val() */
				}
            },
			columnDefs: [
				{ targets: [0, 1], orderable: false},
			]
        });
		
		$("#neodatatable").on('click','.actionapprove',function(e){
			e.preventDefault();
			var $t = $(this);
			var key=$(this).attr('data-upcahr-did');	
			var uri='<?=base_url()?>doctor/doctorview/approve';
			$.ajax({
				 type:"post", 
				 url: uri,
				 dataType:'json',
				 data:{did:key},
				 success: function(result){
					
					 if(result['status'] == 1)
					 {
						  $t.css('color','#097d0d')
						$t.text('Approved')
					 }else if(result['status'] == 0){
						 $t.css('color','#f00')
						  $t.css('color','Not Approved')
					 }else{
						 alert('Something went wrong');
					 }
				 }
			 });
			});
				
		$("#neodatatable").on('click','.actionverify',function(e){
			e.preventDefault();
			var $t = $(this);
			var key=$(this).attr('data-upcahr-did');	
			var uri='<?=base_url()?>doctor/doctorview/verify';
			$.ajax({
				 type:"post", 
				 url: uri,
				 dataType:'json',
				 data:{did:key},
				 success: function(result){
					
					 if(result['status'] == 1)
					 {
						  $t.css('color','#097d0d')
						$t.text('Verified')
					 }else if(result['status'] == 0){
						 $t.css('color','#f00')
						  $t.css('color','Not Verified')
					 }else{
						 alert('Something went wrong');
					 }
				 }
			 });
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
