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
 
    
   
    
  </div>
   
  
 
  <table class="table table-hover table-bordered table-bordered" id='example' style="border:none;">
    <thead>
      <tr>
        <th class="tableheaddata"> Id</th>
        <th class="tableheaddata">Doctor Fee</th>
        
        <th class="tableheaddata">Percent</th>
        
       
        <th class="tableheaddata"> Total Amount</th>
        
        
        
        
      </tr>
    </thead>
    <tbody id="tviewtablebody">
 <?php foreach($data as $p) {?>
   <tr>
       <td><?=$p->id;?></td>
       <td><?=$p->fee;?></td>
       <td><?=$p->percent;?></td>
       <td><?=$p->total;?></td>
       
   </tr>
   <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        
         <th class="tableheaddata"> Id</th>
        <th class="tableheaddata">Doctor Fee</th>
        
        <th class="tableheaddata">Percent</th>
        
       
        <th class="tableheaddata"> Total Amount</th>
        
        
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
