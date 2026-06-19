<!DOCTYPE html>
<html>

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
  .filecss {
    background: #3077a0;
    display: table;
    color: #fff;
    border-radius: 23px;
    padding: 5px 23px;
    cursor:pointer;
}


input[type="file"] {
    display: none;
}

  .mainheadline
  {
	  background:#3c8dbc;margin-top:10px;margin-bottom:10px;color:#fff;padding:9px;font-weight:600;
  }
  .mainheadlinefirstrow
  {
	  padding:5px;
  }
  .mainheadlinefirst
  {
	  background:#3c8dbc;margin-top:-15px;margin-bottom:15px;color:#fff;padding:9px;font-weight:600;
  }
  .othernote{
      font-weight:600;font-size:13px;color:#d20c0c;
  }
  .mainhead{font-weight:600;margin-bottom:20px;}
  .formbody{border:1px solid #d6d2d2;padding:10px;border-radius:4px;}
  .note{font-weight:600;margin-top:10px;margin-bottom:20px;}
 
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  </style>
  
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<!--there was sidebar -->
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="content">
      
	  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">

  
<div class="container bg-3 ">  

  <div class="row text-">
    
	<div class="container">
	<?=$this->session->flashdata('flashmsg');?>
	<h4 class="mainhead">Pathology Registration</h4>

	  <form class="form-horizontal formbody" id='mainform' action="<?=base_url()?>doctor/pathlabreg/create"  method="post" enctype="multipart/form-data">
		
		<!--Basic Details-->
		<div class="row mainheadlinefirstrow">
			<div class="col-md-12 mainheadlinefirst">Basic Details</div>
		</div>
		
		<div class="row">
		<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email"> Name<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="t_fname" name="name" data-validation="required"
					data-validation-error-msg="This Field is required" value="">
				  </div>
				</div>
			</div>
			
		
			
			
			
	
			
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Email<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="email" class="form-control input-sm" id="email" name="email" value="">
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Mobile No.<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="mobile" name="mobile" data-validation="required,number" data-validation-allowing="range[6000000000;9999999999]" data-validation-error-msg="Enter 10 digit valid no." onkeypress="return isNumber(event)" value="">
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
			<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">City<span class="starspan">*</span></label>
				  <div class="col-sm-7">
					<select class="form-control input-sm" id="city" data-validation="required"
					data-validation-error-msg="This Field is required" name="city">
						<option value="">Select</option>
						<?php
						$citylist=$this->db->get_where('master_city',array('status'=>'1'));
						foreach(@$citylist->result() as $list){
						?>
						<option value="<?=$list->id;?>" ><?=$list->name;?></option>
						<?php } ?>
					</select>
				  </div>
				</div>
			</div>
				
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Location<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="location" name="location" value="">
				  </div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Address<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="address" name="address" value="">
				  </div>
				</div>
			</div>
			
       <div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Website<span class="starspan"></span></label>
				  <div class="col-sm-7">
					<input type="text" class="form-control input-sm" id="website" name="website" value="">
				  </div>
				</div>
			</div>

		</div>
		
<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline"> About Pathology</div>
		</div>
		<div class="row">
		<div class="col-md-12">
				<div class="form-group">
				
				  <label class="control-label col-sm-2 label-name" for="email">About<span class="starspan"></span></label>
				  <div class="col-sm-9">
					<textarea class="form-control input-sm" id="about" name="about" data-validation=""
					data-validation-error-msg="This Field is required" ></textarea>
				  </div>
				</div>
			</div>
		</div>
		
		<!--Father's Details-->
		<div class="row mainheadlinerow">
			<div class="col-md-12 mainheadline">Upload Images</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Profile Picture<span class="starspan">*</span></label>
				  <div class="col-sm-7">
				       <label class="filecss">Choose Photo
					<input type="file" class="form-control input-sm" id="uploadimage" name="uploadimage" data-validation="required"
					data-validation-error-msg="This Field is required">
					</label>
					<br>
					
					<p class="othernote">Image should be jpg or png, less than  1MB.</p>
				  </div>
				</div>
			</div>
			
				<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">ID Proof<span class="starspan"></span></label>
				  <div class="col-sm-7">
				      <label class="filecss">Choose Photo
					<input type="file" class="form-control input-sm" id="idproof" name="idproof" data-validation=""
					data-validation-error-msg="This Field is required">
						</label>
					<br>
					<p class="othernote">Image should be jpg or png, less than  1MB.</p>
				  </div>
				</div>
			</div>
			
				<div class="col-md-4">
				<div class="form-group">
				  <label class="control-label col-sm-4 label-name" for="email">Medi. Reg. Proof<span class="starspan"></span></label>
				  <div class="col-sm-7">
				      <label class="filecss">Choose Photo
					<input type="file" class="form-control input-sm" id="regpoof" name="regpoof" data-validation=""
					data-validation-error-msg="This Field is required">
						</label>
					<br>
					<p class="othernote">Image should be jpg or png, less than  1MB.</p>
				  </div>
				</div>
				</div>
				
					
		</div>
	
	
		

		<div class="row">
		<div class="col-md-12">
		<p class="note">Note: Size of image must be less than 50 KB. Only jpg and png file allowed.</p>
			<div class="form-group">        
				  <div class="col-sm-9">
					<input type="submit" class="btn btn-info" id="submit" name="submit" value='Add' />
					<button type="reset" class="btn btn-info" id="reset" name="reset">Reset</button>
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

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
  $.validate({
   
  }); 
/*   // this is the id of the form
$("#mainform").submit(function(e) {


    var form = $(this);
    var url = form.attr('action');

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
}); */
</script>

<script>
 function bplcardyes(checkboxElem) {
  if (checkboxElem.checked) {
    $("#bplcodediv").html(' <input type="text" class="form-control input-sm" id="bplcode" name="bplcode" data-validation="required" data-validation-error-msg="This Field is required">');
  } 
 }

 function bplcardno(checkboxElem) {
  if (checkboxElem.checked) {
    $("#bplcodediv").html('');
  } 
 }
 
</script>
 <script src="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/zebra_datepicker.min.js"></script>
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
   <?=$this->load->view('inc/footer');?>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


</body>
</html>
