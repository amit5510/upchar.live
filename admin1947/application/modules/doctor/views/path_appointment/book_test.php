<?php 
$this->load->view('inc/topheaderlink');
$this->load->view('inc/topheader');
?>
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
  .docimg {
    margin-bottom: 30px;
    height: 134px;
    border-radius: 14px;
    box-shadow: 0px -5px 4px -1px #848181;
    width: 122px;
}
  .doc_nam_inf span {
    font-size: 12px;
    color: #9bc03c;
    letter-spacing: 0.8px;
    font-size: 16px;
    font-weight: 600;
    font-family: 'Lato', sans-serif;
}
ol, ul {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
}
ul {
    display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}
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
					<div class="row text-">
						<div class="container">
							<h4 class="mainhead">Book Test</h4>
							<?=$this->session->flashdata('flashmsg');?>
							<?php echo form_open("doctor/path_appointment/book_test",'class="form-horizontal formbody" id="search_form" method="get"');  ?>
							<div class="row mainheadlinefirstrow">
								<div class="col-md-12 mainheadlinefirst">Pathology Details</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-sm-2 label-name" for="email">City Name<span class="starspan"></span></label>
										<div class="col-sm-3">
											<select class="form-control" id="city_name" name="city_name" >
												<option value="">Select</option>
												<?php $city = $this->path_appointmentmodel->get_city(array('status'=>'1'));
												if(is_array($city) && !empty($city)){
												foreach($city as $list){
												?>
												<option value="<?php echo $list['id'];?>" <?php if($this->input->get_post('city_name')==$list['id']){ echo "selected";}?>  ><?php echo $list['name'];?></option>
												<?php } } ?>
											</select>
										</div>
										<label class="control-label col-sm-2 label-name" for="email">Pathology Name<span class="starspan"></span></label>
										<div class="col-sm-3">
											<select class="form-control" id="pathlab_id" name="pathlab_id" >
												<option value="">Select</option>
												<?php  
												$pathlab_list  	=  $this->path_appointmentmodel->pathlab_list(array('city'=>$this->input->get_post('city_name'))); 
												if(is_array($pathlab_list) && !empty($pathlab_list)){
												foreach($pathlab_list as $val){
												?>
												<option value="<?php echo $val['id'] ?>" <?php if($val['id']==$this->input->get_post('pathlab_id')){ echo "selected"; }?>><?php echo $val['name']?></option>
												<?php }} ?>
											</select>
										</div>
										<div class="col-sm-2">
											<a  onclick="$('#search_form').submit();" style="padding-top:1px" class="button2 btn-lg btn btn-info" ><span> Search </span></a>
											<?php 
											 if($this->input->get_post('city_name')!='' || $this->input->get_post('pathlab_id')!='')
											  { 
												echo anchor("doctor/path_appointment/book_test/",'<span>Clear Search</span>');    
											  } 
											?>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_close();?>
							<?php echo form_open_multipart(current_url_query_string(), 'class="form-horizontal formbody" id="form"');?>
							<div class="row mainheadlinefirstrow">
								<div class="col-md-12 mainheadlinefirst">Test's Details</div>
							</div>
							<div class="table-responsive">
								<table class="table table-hover table-bordered table-bordered" id='example' style="border:none;">
									<thead>
										<tr>
											<th><input type="checkbox" style="width:30px;" name="checkall" id="checkall"  onClick="check_uncheck_checkbox(this.checked);"/></th>
											<th class="tableheaddata">Test Name</th>
											<th class="tableheaddata">Test Short Name</th>
											<th class="tableheaddata">Test Type</th>
											<th class="tableheaddata">Method</th>
											<th class="tableheaddata">Code</th>
											<th class="tableheaddata">Amount</th>
										</tr>
									</thead>
									<?php $test_arr_id = $this->input->post('arr_ids');
									if(is_array($path_test) && !empty($path_test))
									{
									foreach($path_test as $val)
									{
									?>
									<tbody>
										<tr>
											<td><input style="width:45px;" type="checkbox" name="arr_ids[]" <?php if(is_array($test_arr_id) && !empty($test_arr_id)){ if(in_array($val['test_id'], $test_arr_id)){ echo "checked";}} ?> value="<?php echo $val['test_id'];?>" id="check-all" class="flat"></td>
											<td class="tableheaddata"><?php echo $val['test_name']?></td>
											<td class="tableheaddata"><?php echo $val['short_name'];?></td>
											<td class="tableheaddata"><?php echo $val['test_type'];?></td>
											<td class="tableheaddata"><?php echo $val['method']?></td>
											<td class="tableheaddata"><?php echo $val['code']?></td>
											<td class="tableheaddata"><?php echo $val['amount']?></td>
										</tr>
									</tbody>
									<?php 
									}
									}
									?>
									<tfoot>
									  <tr>
										<th><input type="checkbox" style="width:30px;" name="checkall" id="checkall"  onClick="check_uncheck_checkbox(this.checked);"/></th>
										<th class="tableheaddata">Test Name</th>
										<th class="tableheaddata">Test Short Name</th>
										<th class="tableheaddata">Test Type</th>
										<th class="tableheaddata">Method</th>
										<th class="tableheaddata">Code</th>
										<th class="tableheaddata">Amount</th>
									  </tr>
									</tfoot>
								</table>
							</div>
							<div class="row">
								<div class="col-md-6">
									<span style="color:red;"><?php echo form_error('arr_ids[]');?></span>
								</div>
								<div class="col-md-6">
									<div class="pagination"><?php //echo $page_links; ?></div>
								</div>
							</div>
							<!--Basic Details-->
							<div class="row mainheadlinefirstrow">
								<div class="col-md-12 mainheadlinefirst">Patient's Details</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-sm-2 label-name" for="email">Pathology<span class="starspan">*</span></label>
										<div class="col-sm-4">
											<input type="text" name="pathlab_id"  id='pathlab_id' class="form-control" readonly value="<?php echo $this->input->get('pathlab_id');?>" placeholder="Pathology Name">
											<span style="color:red;"><?php echo form_error('pathlab_id');?></span>
										</div>
										<label class="control-label col-sm-2 label-name" for="email">Name<span class="starspan">*</span></label>
										<div class="col-sm-4">
											<input type="text" name="patient_name"  id='patient_name' class="form-control" value="<?php echo set_value('patient_name');?>" placeholder="Patient Name">
											<span style="color:red;"><?php echo form_error('patient_name');?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2 label-name" for="email">Mobile<span class="starspan">*</span></label>
										<div class="col-sm-4">
											<input type="text" id='patient_mobile' name="patient_mobile" class="form-control" value="<?php echo set_value('patient_mobile');?>"  placeholder="Mobile Number" >
											<span style="color:red;"><?php echo form_error('patient_mobile');?></span>
										</div>
										<label class="control-label col-sm-2 label-name" for="email">Email<span class="starspan"></span></label>
										<div class="col-sm-4">
											<input type="text" name="patient_email" class="form-control"  placeholder="Email Id">
											<span style="color:red;"><?php echo form_error('patient_email');?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">        
										<div class="col-sm-9">
											<input type="submit" class="btn btn-info" id="submit" name="submit" value='Add' />
											<button type="reset" class="btn btn-info" id="reset" name="reset">Reset</button>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_close();?>
						</div>
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<?=$this->load->view('inc/footer');?>
		<div class="control-sidebar-bg"></div>
	</div>
<!-- ./wrapper -->
</body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	$('#example').DataTable();
	} );
</script> 
<script>

$(function() {
    $('#city_name').change( function() 
	{
        var val = $(this).val();
        //alert(val);
        if (val!='') 
        {
			$.ajax({
               url: '<?php echo base_url();?>doctor/path_appointment/get_pathlab_by_city_id/',
               dataType: 'html',
               data: { city_id : val },
               success: function(data) {
                   $('#pathlab_id').html( data );
               }
            });
        }
		else 
        {
		   $("#pathlab_id").empty();
        }
    });
});
</script>
<script>
$(function() {
    $('#pathlab_id').change( function() 
	{
        var val 	= $(this).val();
        if (val!='') 
        {
            $('#doctor_name').val('');
            $.ajax({
				url: '<?php echo base_url();?>doctor/appointment/get_hospital_by_locality_id/',
				dataType: 'html',
				data:{"city_id": city_id},
				success: function(data) {
                $('#hospital_name').html(data);
               }
            });
        }
    });
}); 
</script>
<?php 
$this->load->view('sidebar');
$this->load->view('inc/headersetting');
$this->load->view('inc/footerlink');
$this->load->view('inc/table_footer');
?>