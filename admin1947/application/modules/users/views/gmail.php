<!DOCTYPE html>
<html>

  <style>
  .tabledata{
	  border:1px solid #fff!important;
	  font-weight:600;
  }

  .label-name{
	  text-align:left!important;
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
      border:1px solid #d6d2d2;padding:10px;border-radius:4px;
  }
  .note{
      font-weight:600;font-size:17px;margin-top:10px;margin-bottom:20px;
  }
  .othernote{
      font-weight:600;font-size:13px;color:#d20c0c;
  }
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
  


<div class="container">
	
	<table class="table table-bordered" id='example' style="border:none;margin-top: 32px;">
    <thead>
      <tr>
        <th class="tableheaddata">User Id</th>
        <th class="tableheaddata">Name</th>
        
        <th class="tableheaddata">Guid</th>
        <th class="tableheaddata">Email</th>
        <th class="tableheaddata">DOB</th>
        
		
      </tr>
    </thead>
     <tbody id="tviewtablebody">
	
<?php 
   foreach($userlogin as $p)
   {

  echo"<tr>";
  echo"<td>".$p->USERID."</td>";
  echo"<td>".$p->FNAME."</td>";
  echo"<td>".$p->GUID."</td>";
  echo"<td>".$p->EMAIL."</td>";
  echo"<td>".$p->DOB."</td>";

echo"</tr>";
  

   }
  ?>
     </tbody>
  </table>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?=base_url();?>public/assets/dist/js/zebra_datepicker.min.js"></script>
        <script type="text/javascript" src="<?=base_url();?>public/assets/dist/js/examples.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		
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
