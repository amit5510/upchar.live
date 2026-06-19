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
  <h4 style="font-weight:600;margin-bottom:20px;">Appointment List</h2>
  <br>
 
    
   
    
  </div><br>
   
        
  
 
  <table class="table table-hover table-bordered table-bordered" id='example' style="border:none;">
    <thead>
      <tr>
        <th class="tableheaddata">Hospital  ID</th>
        
        
        
         <th class="tableheaddata">Hospital Name</th>
          <th class="tableheaddata">Hospital Email</th>
          <th class="tableheaddata">Hospital Mobile</th>
        <th class="tableheaddata">View Doctors</th>
        
        
      </tr>
    </thead>
    <tbody id="tviewtablebody">
 <?php 
   foreach($data as $p)
   {

  echo"<tr>";
 

echo"<td>".$p->id."</td>";
echo "<td>".$p->name."</td>";
//echo "<td>".$p->fname."</td>";
echo"<td>".$p->email."</td>";
echo"<td>".$p->mobile."</td>";
echo "<td><a href=".base_url()."doctor/appointment/doctordata/".$p->uid." style=color:red;><span class='glyphicon glyphicon-eye-open'></span></a></td>";
        echo"</tr>";

echo"</tr>";
  

   }
  ?>
   
    </tbody>
    <tfoot>
      <tr>
        <th class="tableheaddata">Hospital  ID</th>
        
        
        
         <th class="tableheaddata">Hospital Name</th>
          <th class="tableheaddata">Hospital Email</th>
          <th class="tableheaddata">Hospital Mobile</th>
        <th class="tableheaddata">View Doctors</th>
        
        
      </tr>
    </tfoot>
  </table>
  
  </div>
</div><br>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

   <script type="text/javascript">
    
$(document).ready(function() {
    $('#example').DataTable();
} );

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
