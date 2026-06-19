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
  .Input_radio{
      display:none;    
  }
  #h1:hover .Input_radio{
     display:inline-block;
  } 
 input:focus {
  border-radius:9px;
  }

  #h1:focus > .Input_radio { 
  color: yellow;
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
        <div class="container bg-3 ">  
          <div class="row text-">
            <?php $id=$this->uri->segment(4); ?>
            <form class="form-horizontal formbody" id='mainform' action="<?=base_url()?>doctor/appointment/doctordata/<?php echo $id;?>" method="get" enctype="multipart/form-data">
              <div class="row mainheadlinefirstrow">
                <div class="col-md-12 mainheadlinefirst">Doctor Filter</div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label col-sm-1 label-name" for="email">Name</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control input-sm"  name="doctor_name" value="<?php echo $this->input->get_post('doctor_name');?>">
                    </div>
                    <label class="control-label col-sm-1 label-name" for="email">Emai</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control input-sm"  name="doctor_email" value="<?php echo $this->input->get_post('doctor_email');?>">
                    </div>
                    <label class="control-label col-sm-1 label-name" for="email">Phone</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control input-sm" name="doctor_phone" value="<?php echo $this->input->get_post('doctor_phone');?>">
                    </div>
                    <label class="control-label col-sm-1 label-name" for="email">City</label>
                    <div class="col-sm-3">
                      <select class="form-control input-sm"  name="city_name">
                        <option value="">Select City</option>
                        <?php 
                        if(is_array($city) && !empty($city)){
                        foreach ($city as $key => $value) {?>
                        <option value="<?php echo $value['id']; ?>" <?php if($this->input->get_post('city_name')==$value['id']){ echo "selected"; } ?>><?php echo $value['name']; ?></option>
                      <?php } } ?>
                      </select>
                    </div>
                    <label class="control-label col-sm-5 label-name" for="email"></label>
                      <div class="col-sm-3">
                        <input type="submit" class="btn btn-info" id="submit" name="submit" value='Search' />
                        <?php 
                         if( $this->input->get_post('doctor_name')!='' ||  $this->input->get_post('doctor_email')!='' ||  $this->input->get_post('doctor_phone')!='' ||  $this->input->get_post('city_name')!=''  )
                          { 
                            echo anchor("doctor/appointment/doctordata/".$id."/",'<span>Clear Search</span>');    
                          } 
                        ?>
                      </div>
                  </div>
                </div>
              </div> 
            </form>
            <h4 style="font-weight:600;margin-bottom:20px;">Doctor List</h4>
            <table class="table table-hover table-bordered table-bordered" id='example' style="border:none;">
              <thead>
                <tr>
                  <th class="tableheaddata">Doctor Id</th>
                  <th class="tableheaddata">Doctor Name</th>
                  <th class="tableheaddata">Email</th>
                  <th class="tableheaddata">Mobile No</th>
                  <th class="tableheaddata">City</th>
                  <th class="tableheaddata">Patient</th>
                </tr>
              </thead>
              <tbody id="tviewtablebody">
                <?php 
                foreach($clinic as $p)
                { 
                echo"<tr>";
                echo"<td>".$p->id."</td>";
                echo"<td>".$p->fname."</td>";
                echo"<td>".$p->email."</td>";
                echo"<td>".$p->mobile."</td>";
                echo"<td>".getCityName($p->city)."</td>";
                echo "<td><a href='".base_url()."doctor/appointment/patient/".$p->id."' style=color:red;><span >View</span></a></td>";
                echo"</tr>";
                } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th class="tableheaddata">Doctor Id</th>
                  <th class="tableheaddata">Doctor Name</th>
                  <th class="tableheaddata">Email</th>
                  <th class="tableheaddata">Mobile No</th>
                  <th class="tableheaddata">City</th>
                  <th class="tableheaddata">Patient</th>
                </tr>
              </tfoot>
            </table>
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
<?php $this->load->view('footer');?>

 
  



