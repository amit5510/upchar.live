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
  </style>
  <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <div class="content-wrapper">
        <section class="content">
          <div class="container bg-3 ">  
            <div class="row text-">
              <!--<form class="form-horizontal formbody" id='mainform' action="<?=base_url()?>doctor/appointment/user" method="get" enctype="multipart/form-data">-->
              <?php echo form_open("doctor/path_appointment/",'class="form-horizontal formbody" id="search_form" method="get"');  ?>
				<div class="row mainheadlinefirstrow">
					<div class="col-md-12 mainheadlinefirst">Basic Filter
					<a  href="<?php echo base_url();?>doctor/path_appointment/book_test" class="btn btn-info" style="float:right;" id="submit" >Add Test Booking</a>
					</div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label col-sm-1 label-name" for="email">Paient Name</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control input-sm"  name="paient_name" value="<?php echo $this->input->get_post('paient_name');?>">
                      </div>
                      <label class="control-label col-sm-1 label-name" for="email">Date From</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control datepicker"  name="date_from" value="<?php echo $this->input->get_post('date_from');?>" onkeypress="return isNumber(event)" data-validation="required"
                        data-validation-error-msg="This Field is required">
                      </div>
                      <label class="control-label col-sm-1 label-name" for="email">Date To</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control datepicker"  name="date_to" value="<?php echo $this->input->get_post('date_to');?>" onkeypress="return isNumber(event)" data-validation="required"
                        data-validation-error-msg="This Field is required">
                      </div>
                    </div>
                  
                    <div class="form-group">
					  <label class="control-label col-sm-2 label-name" for="email">Records Per Page</label> 
					  <div class="col-sm-2"><?php echo display_record_per_page();?></div>
                      <label class="control-label col-sm-1 label-name" for="email"></label>
					  <div class="col-sm-3">
						
						<a  onclick="$('#search_form').submit();" style="padding-top:1px" class="button2 btn-lg btn btn-info" ><span> Search </span></a>
						<?php 
						 if( $this->input->get_post('hospital_name')!='' ||  $this->input->get_post('hospital_email')!='' ||  $this->input->get_post('hospital_phone')!='' ||  $this->input->get_post('city_name')!='' ||  $this->input->get_post('paient_name')!='' ||  $this->input->get_post('paient_email')!='' ||  $this->input->get_post('paient_phone')!='' ||  $this->input->get_post('appointment_id')!='' ||  $this->input->get_post('appointment_id')!='' ||  $this->input->get_post('date_from')!='' ||  $this->input->get_post('date_to')!='' ||  $this->input->get_post('time_from')!='' ||  $this->input->get_post('time_to')!='' ||  $this->input->get_post('doctor_name')!='' )
						  { 
							echo anchor("doctor/path_appointment/",'<span>Clear Search</span>');    
						  } 
						?>
					  </div>
                    </div>
					<!--<div class="form-group">
						<label class="control-label col-sm-1 label-name" for="email">City</label>
						<div class="col-sm-3">
                        <select class="form-control input-sm"  name="city_name">
                          <option value="">Select City</option>
                          <?php /*
                          if(is_array($city) && !empty($city)){
                          foreach ($city as $key => $value) {?>
                          <option value="<?php echo $value['id']; ?>" <?php if($this->input->get_post('city_name')==$value['id']){ echo "selected"; } ?>><?php echo $value['name']; ?></option>
                        <?php } } ?>
                        </select>
                      </div>
					  <label class="control-label col-sm-1 label-name" for="email">Payment Mode</label>
                      <div class="col-sm-3">
                        <select class="form-control input-sm"  name="payment_mode">
                          <option value="">Select</option>
                          <option value="ONLINE" <?php if($this->input->get_post('payment_mode')=='ONLINE'){ echo "selected";}?>>ON LINE</option>
                          <option value="COC" <?php if($this->input->get_post('payment_mode')=='COC'){ echo "selected";} */?>>OFF LINE</option>
                        </select>
                      </div>
						
                    </div>-->
                  </div>
                </div>
             <?php echo form_close();?>
              <h4 style="font-weight:600;margin-bottom:20px;">Test Booking List</h4>
              <?=$this->session->flashdata('flashmsg');?>
			<div class="table-responsive">
              <table class="table table-hover table-bordered table-bordered" id='exportTable' style="border:none;">
                <thead>
                  <tr>
                    <th class="tableheaddata">Booking ID</th>
                    <th class="tableheaddata">Name</th>
                    <th class="tableheaddata">Email</th>
                    <th class="tableheaddata">Mobile</th>
                    <th class="tableheaddata">Total Amount</th>
                    <th class="tableheaddata">Path Lab Name</th>
					<th class="tableheaddata">City Name</th>
					<th class="tableheaddata">Payment</th>
					<th class="tableheaddata">Appointment</th>
					<th class="tableheaddata">Date</th>
                    <th class="tableheaddata">View Test</th>
                    <th class="tableheaddata">Delete</th>
                  </tr>
                </thead>
                <tbody id="tviewtablebody">
                  <?php 
				  //echo "<pre>"; print_r($data); die;
                  foreach($data as $p)
                  {	
                    echo"<tr>";
                    echo"<td>".$p->booking_id."</td>";
                   
                    echo"<td>".$p->patient_name."</td>";
                    echo"<td>".$p->patient_email."</td>";
                    echo"<td>".$p->patient_mobile."</td>";
                    echo"<td>".$p->total_amount."</td>";
                    echo"<td>".$p->pathlab_name."</td>";
					echo"<td>".$p->city_name."</td>";
					?>
					<td><?php if($p->payment_status=='0'){ echo '<span class="alert-danger">Pending</span>'; } else if($p->payment_status=='1'){ echo '<span class="alert-success">Done</span>'; }else { echo '<span class="alert-warning">Failed</span>'; } ?></td>
					<td><?php if($p->status=='0'){ echo '<span style="color:red;">Pending</span>'; } else{ echo '<span style="color:green;">Done</span>'; } ?></td>
                   <?php 
				    echo"<td>".$p->book_date."</td>";
					echo "<td><a href='".base_url()."doctor/path_appointment/booking_details/".$p->booking_id."' style=color:red;><span class='glyphicon glyphicon-eye-open'></span></a></td>";
                    echo "<td><a href='".base_url()."doctor/path_appointment/delete_booking/".$p->booking_id."' style=color:red;><span class='glyphicon glyphicon-trash'></span></a></td>";
                    echo"</tr>";
                    echo"</tr>";
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th class="tableheaddata">Booking ID</th>
                    <th class="tableheaddata">Name</th>
                    <th class="tableheaddata">Email</th>
                    <th class="tableheaddata">Mobile</th>
                    <th class="tableheaddata">Total Amount</th>
                    <th class="tableheaddata">Path Lab Name</th>
					<th class="tableheaddata">City Name</th>
					<th class="tableheaddata">Payment</th>
					<th class="tableheaddata">Appointment</th>
					<th class="tableheaddata">Date</th>
                    <th class="tableheaddata">View Test</th>
                    <th class="tableheaddata">Delete</th>
                  </tr>
                </tfoot>
              </table>
			</div>  
			  <div class="row">
				<div class="col-md-6">
					
				</div>
				<div class="col-md-6">
					<div class="pagination"><?php echo $page_links; ?></div>
				</div>
			  </div>
            </div>
          </div>
        </section>
      </div>
    <div class="control-sidebar-bg"></div>
  </div>
</body>
</html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>public/assets/dist/js/zebra_datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/zebra_datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>

<script type="text/javascript">
jQuery(function ($) {
	$("#exportButton").click(function () {
		// parse the HTML table element having an id=exportTable
		var dataSource = shield.DataSource.create({
			data: "#exportTable",
			schema: {
				type: "table",
				fields: {
					ID: { type: Number },
					Date: { type: String },
					Name: { type: String },
					Email: { type: String },
					Mobile: { type: String },
					Hospital: { type: String },
					Doctor: { type: String },
					Payment : { type: String },
					Appointment: { type: String }
				}
			}
		});

		// when parsing is done, export the data to PDF
		dataSource.read().then(function (data) {
			var pdf = new shield.exp.PDFDocument({
				author: "PrepBootstrap",
				created: new Date()
			});

			pdf.addPage("a4", "portrait");

			pdf.table(
				25,
				25,
				data,
				[
					{ field: "ID", title: "ID", width: 40 },
					{ field: "Date", title: "Date", width: 50 },
					{ field: "Name", title: "Name", width: 60 },
					{ field: "Email", title: "Email", width: 100 },
					{ field: "Mobile", title: "Mobile", width: 70 },
					{ field: "Hospital", title: "Hospital", width: 60 },
					{ field: "Doctor", title: "Doctor", width: 60 },
					{ field: "Payment", title: "Payment", width: 55 },
					{ field: "Appointment", title: "Appointment", width: 45 }
				],
				{
					margins: {
						top: 25,
						left: 25
					}
				}
			);

			pdf.saveAs({
				fileName: "Appointment"
			});
		});
	});
});
</script>

<style>
    #exportButton {
        border-radius: 0;
    }
</style>
<script>
$(document).ready(function(){
  $(document).on('click','.addsession',function(){
    var dblockid = $(this).attr('data-dayblock-id');
    var cblockid = $(this).attr('data-clinicblock-id');
      var code ='<br><div class="col-md-4">' +
    ' <div class="form-group">' +
    '   <label class="control-label col-sm-4 label-name" for="email">From<span class="starspan wg"></span></label>' +
    '   <div class="col-sm-7" id="ccont">' +
    '   <input type="time" class="form-control input-sm timepicker" id="" name="fromtime['+cblockid+']['+dblockid+'][]" value="">' +
    '   </div>' +
    ' </div>' +
    '</div>' +
    '<div class="col-md-4">' +
    ' <div class="form-group">' +
    '   <label class="control-label col-sm-4 label-name" for="email">To<span class="starspan wg"></span></label>' +
    '   <div class="col-sm-7" id="cema">' +
    '   <input type="time" class="form-control input-sm timepicker" id="" name="totime['+cblockid+']['+dblockid+'][]" value="">' +
    '   </div>' +
    ' </div>' +
    '</div>';
    $(this).parent().find(".sessionwrapper:eq( "+dblockid+" )").append(code);
  });
  
  $(document).on('click','.addtiming',function(){
    var dblockid = $(this).attr('data-dayblock-id');
    dblockid=  parseInt(dblockid)+1;
    $(this).attr('data-dayblock-id',dblockid);
    var cblockid = $(this).attr('data-clinicblock-id');
    
    var hiddendayseq = parseInt($('#hiddenday_'+cblockid).val());
    $('#hiddenday_'+cblockid).val( parseInt($('#hiddenday_'+cblockid).val()) +1 );
    
    var code = '<br><hr  style="width:60%;border-top-color:black;"><br><div class="col-md-8">' +
      '<div class="form-group">' +
       ' <label class="control-label col-sm-4 label-name" for="email">Select Day<span class="starspan wg"></span></label>' +
        '<div class="col-sm-7" id="cadd">' +
        '<label class="checkbox-inline"><input type="checkbox" name="sun['+cblockid+']['+hiddendayseq+']" value="S">Sun</label>' +
        '<label class="checkbox-inline"><input type="checkbox" name="mon['+cblockid+']['+hiddendayseq+']" value="M">Mon</label>' +
        '<label class="checkbox-inline"><input type="checkbox" name="tue['+cblockid+']['+hiddendayseq+']" value="T">Tue</label>' +
        '<label class="checkbox-inline"><input type="checkbox" name="wed['+cblockid+']['+hiddendayseq+']" value="W">Wed</label>' +
        '<label class="checkbox-inline"><input type="checkbox" name="thu['+cblockid+']['+hiddendayseq+']" value="TH">Thus</label>' +
        '<label class="checkbox-inline"><input type="checkbox" name="fri['+cblockid+']['+hiddendayseq+']" value="F">Fri</label>' +
        '<label class="checkbox-inline"><input type="checkbox" name="sat['+cblockid+']['+hiddendayseq+']" value="SA">Sat</label>' +
        
        '</div>' +
      '</div>' +
    '</div>' +
    
    '<br>' +
    '<br>' +
    '<div class="sessionwrapper">' +
    ' <div class="col-md-4">' +
    '   <div class="form-group">' +
    '     <label class="control-label col-sm-4 label-name" for="email">From<span class="starspan wg"></span></label>' +
    '     <div class="col-sm-7" id="ccont">' +
    '     <input type="time" class="form-control input-sm timepicker" id="" name="fromtime['+cblockid+']['+dblockid+'][]"  value="">' +
    '     </div>' +
    '   </div>' +
    ' </div>' +
    ' <div class="col-md-4">' +
    '   <div class="form-group">' +
    '     <label class="control-label col-sm-4 label-name" for="email">To<span class="starspan wg"></span></label>' +
    '     <div class="col-sm-7" id="cema">' +
    '     <input type="time" class="form-control input-sm timepicker" id="" name="totime['+cblockid+']['+dblockid+'][]" value="">' +
    '     </div>' +
    '   </div>' +
    ' </div>' +
    '</div>' +
    
    '<button type="button" class="btn btn-info btn-xs addsession" name="" data-clinicblock-id="'+cblockid+'" data-dayblock-id="'+dblockid+'">Add More Session</button>';
    
    
    $(this).parent().find(".timmingwrapper").append(code);
  });
$("#addclinic").click(function(){
var cblockid = $(this).attr('data-clinicblock-id');
cblockid=  parseInt(cblockid)+1;
$(this).attr('data-clinicblock-id',cblockid);
var dblockid = $(this).attr('data-dayblock-id');
var code = '<br><hr style="border-top-color:blue;"><br>'+
'<div class="row" style="margin-top:5px;">'+
'<div class="col-md-12">'+
  ' <div class="form-group">'+
  '   <label class="control-label col-sm-2 label-name" for="email">Type<span class="starspan">*</span></label>'+
  '   <div class="col-sm-7">'+
  '    <label class="radio-inline"> <input type="radio" class="objective" data-objectiveid="'+cblockid+'"  id="objectiveself" name="objective['+cblockid+']" value="H" >Hospital</label>'+
  '    <label class="radio-inline"> <input type="radio" class="objective" data-objectiveid="'+cblockid+'"  id="objectivewage" name="objective['+cblockid+']" value="C">Clinic</label>'+
  '   </div>'+
  ' </div>'+
  '</div>'+
  '<br><br>'+
  '<div class="col-md-4">'+
  ' <div class="form-group">'+
  '   <label class="control-label col-sm-4 label-name" for="email" style="white-space: nowrap;">Clinic/Hospital<span class="starspan wg"></span></label>'+
  '   <div class="col-sm-7" id="cemp">'+
  '   <select class="form-control input-sm" id="clinic" name="clinic['+cblockid+']" >'+
  '   </select>'+
  '   </div>'+
  ' </div>'+
  '</div>'+
  '<div class="col-md-4">'+
  ' <div class="form-group">'+
  '   <label class="control-label col-sm-4 label-name" for="email">Fee<span class="starspan wg"></span></label>'+
  '   <div class="col-sm-7" id="cadd">'+
  '   <input type="text" class="form-control input-sm" id="fee" name="fee[]" value="">'+
  '   </div>'+
  ' </div>'+
  '</div>'+
  '<br>     <br>'+
  '<div class="timmingwrapper">'+
    '<div class="col-md-8">' +
      '<div class="form-group">' +
       ' <label class="control-label col-sm-4 label-name" for="email">Select Day<span class="starspan wg"></span></label>' +
        '<div class="col-sm-7" id="cadd">' +
        '<label class="checkbox-inline"><input type="checkbox" name="sun['+cblockid+'][]" value="S">Sun</label>' +
        '<label class="checkbox-inline"><input type="checkbox" name="mon['+cblockid+'][]" value="M">Mon</label>' +
        '<label class="checkbox-inline"><input type="checkbox" name="tue['+cblockid+'][]" value="T">Tue</label>' +
        '<label class="checkbox-inline"><input type="checkbox" name="wed['+cblockid+'][]" value="W">Wed</label>' +
        '<label class="checkbox-inline"><input type="checkbox" name="thu['+cblockid+'][]" value="TH">Thus</label>'+
        '<label class="checkbox-inline"><input type="checkbox" name="fri['+cblockid+'][]" value="F">Fri</label>' +
        '<label class="checkbox-inline"><input type="checkbox" name="sat['+cblockid+'][]" value="SA">Sat</label>' +
        '</div>' +
      '</div>' +
    '</div>' +
    '<br>' +
    '<br>' +
    '<div class="sessionwrapper">' +
    ' <div class="col-md-4">' +
    '   <div class="form-group">' +
    '     <label class="control-label col-sm-4 label-name" for="email">From<span class="starspan wg"></span></label>' +
    '     <div class="col-sm-7" id="ccont">' +
    '     <input type="time" class="form-control input-sm timepicker" id="" name="fromtime['+cblockid+']['+dblockid+'][]"  value="">' +
    '     </div>' +
    '   </div>' +
    ' </div>' +
    ' <div class="col-md-4">' +
    '   <div class="form-group">' +
    '     <label class="control-label col-sm-4 label-name" for="email">To<span class="starspan wg"></span></label>' +
    '     <div class="col-sm-7" id="cema">' +
    '     <input type="time" class="form-control input-sm timepicker" id="" name="totime['+cblockid+']['+dblockid+'][]" value="">' +
    '     </div>' +
    '   </div>' +
    ' </div>' +
    '</div>' +
    '<button type="button" class="btn btn-info btn-xs addsession" name="" data-clinicblock-id="'+cblockid+'" data-dayblock-id="'+dblockid+'">Add More Session</button>'+
    '</div>'+
    '<button type="button" class="btn btn-info btn-xs addtiming" name=""  data-clinicblock-id="'+cblockid+'"   data-dayblock-id="'+dblockid+'" >Add Timing For Remaining Day</button>'+
    '</div>';
    $(".practicewrapper").append(code);
  }); 
  $(document).on('change','.objective',function(){
    var oid = $(this).attr('data-objectiveid');
    var type= $("input[name='objective["+oid+"]']:checked").val();
    var uri='<?=base_url();?>doctor/doctorreg/getobjectivelist';
    $.ajax({
     type:"post", 
     url: uri,
     //dataType: 'json',
     data:{type:type},
     success: function(result){
      $("select[name='clinic["+oid+"]']").html(result);
     }
    });
  });
});
$('.timepicker').Zebra_DatePicker({
format: 'H:i'
});
</script> 
<?php $this->load->view('footer');?>
  
