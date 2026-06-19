<!DOCTYPE html>
<html>
    <style>
    .tabledata{
      border:1px solid #fff!important;
      font-weight:600;
    }
    .BoxBody{
        height:713px;
        overflow:scroll;
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
  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/metallic/zebra_datepicker.min.css" type="text/css">
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="container bg-3">  
          <div class="row text-">
            <?php $doctor_id   = $this->uri->segment(4); ?>
            <form class="form-horizontal formbody" id='mainform' action="<?=base_url()?>doctor/appointment/patient/<?php echo $doctor_id;?>" method="get" enctype="multipart/form-data">
              <div class="row mainheadlinefirstrow">
                <div class="col-md-12 mainheadlinefirst">Patient Filter</div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label col-sm-1 label-name" for="email">Name</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control input-sm"  name="paient_name" value="<?php echo $this->input->get_post('paient_name');?>">
                    </div>
                    <label class="control-label col-sm-1 label-name" for="email">Phone</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control input-sm"  name="paient_phone" value="<?php echo $this->input->get_post('paient_phone');?>">
                    </div>
                    <label class="control-label col-sm-1 label-name" for="email">Email</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control input-sm"  name="paient_email" value="<?php echo $this->input->get_post('paient_email');?>">
                    </div>
                    <label class="control-label col-sm-1 label-name" for="email">Payment Mode</label>
                    <div class="col-sm-3">
                      <select class="form-control input-sm"  name="payment_mode">
                        <option value="">Select</option>
                        <option value="ONLINE" <?php if($this->input->get_post('payment_mode')=='ONLINE'){ echo "selected";}?>>ON LINE</option>
                        <option value="COC" <?php if($this->input->get_post('payment_mode')=='COC'){ echo "selected";}?>>OFF LINE</option>
                      </select>
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
                    <label class="control-label col-sm-1 label-name" for="email">Session From</label>
                    <div class="col-sm-3">
                      <select name="session_from" class="form-control">
                        <option value="">Select</option>
                        <?php 
                        $current = date("Y");
                        for($i=2018; $i<=$current; $i++){?>
                        <option value="<?php echo $i.'-01-01';?>" <?php if($this->input->get_post('session_from')==$i){ echo "selected"; }?>><?php echo $i;?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <label class="control-label col-sm-1 label-name" for="email">Session To</label>
                    <div class="col-sm-3">
                      <select name="session_to" class="form-control">
                        <option value="">Select</option>
                        <?php 
                        $current = date("Y");
                        for($i=2018; $i<=$current; $i++){?>
                        <option value="<?php echo $i.'-12-31';?>" <?php if($this->input->get_post('session_to')==$i){ echo "selected"; }?>><?php echo $i;?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <label class="control-label col-sm-1 label-name" for="email"></label>
                    <div class="col-sm-3">
                      <input type="submit" class="btn btn-info" id="submit" name="submit" value='Search' />
                      <?php 
                      if( $this->input->get_post('paient_name')!='' ||  $this->input->get_post('paient_email')!='' ||  $this->input->get_post('paient_phone')!='' ||  $this->input->get_post('payment_mode')!='' ||  $this->input->get_post('date_from')!='' ||  $this->input->get_post('date_to')!='' ||  $this->input->get_post('session_from')!='' ||  $this->input->get_post('session_to')!=''  )
                        { 
                          echo anchor("doctor/appointment/patient/".$doctor_id."",'<span>Clear Search</span>');    
                        } 
                      ?>
                    </div>
                  </div>
                </div>
            </div>
          </form>
          <?=$this->session->flashdata('flashmsg');?>
          <h4 style="font-weight:600;margin-bottom:20px;">Appointment List</h4>
          <table class="table table-hover table-bordered table-bordered" id='example' style="border:none;">
            <thead>
              <tr>
                <th class="tableheaddata">Appointment ID</th>
                <th class="tableheaddata">Patient Name</th>
                <th class="tableheaddata">Mobile</th>
                <th class="tableheaddata">Email</th>
                <th class="tableheaddata">Appointment Date</th>
                <th class="tableheaddata">Payment Mode</th>
              </tr>
            </thead>
            <tbody id="tviewtablebody">
              <?php 
              foreach($appointment as $p)
              {  ?>
              <tr>
                <td ><?=$p->appointment_id; ?></td>
                <td><?=$p->appointment_name ; ?></td>
                <td><?=$p->appointment_mobile;?></td>
                <td><?=$p->appointment_email;?></td>
                <td><?=$p->appointment_date;?></td>
                <td><?php 
                if($p->payment_mode=='COC'){ echo "OFF LINE"; }else if($p->payment_mode=='ONLINE'){ echo "ON LINE"; } else{ echo "NA";}?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th class="tableheaddata">Appointment ID</th>
                <th class="tableheaddata">Patient Name</th>       
                <th class="tableheaddata">Mobile</th>
                <th class="tableheaddata">Email</th>  
                <th class="tableheaddata">Appointment Date</th>
                <th class="tableheaddata">Payment Mode</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </section>
  </div>
</div>
</body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">  
$(document).ready(function() {
    $('#example').DataTable();
} );
</script> 
  <!-- /.content-wrapper -->
<?php $this->load->view('footer');?>

 
  



