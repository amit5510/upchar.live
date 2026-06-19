<!DOCTYPE html>
<html>

 <style>
  .tabledata{
	  border:1px solid #fff!important;
	  font-weight:600;
  }

  .error valid{
	  color:green!important;
  }

  .tabledatainactive{
	  color:red;
  }

.filecss {
    background: #3077a0;
    display: table;
    color: #fff;
    border-radius: 23px;
    padding: 11px 23px;
    cursor:pointer;
}


input[type="file"] {
    display: none;
}

  #reset{background:#fff;color:#000;padding: 6px 30px;}
  
  @media only screen and (min-width: 1350px) and (max-width: 1442px) {
    #mydata_wrapper {
        max-width:85%!important;
		margin-left:7%!important;
    }
	
  }
  @media only screen and (min-width: 1300px) and (max-width: 1349px) {
    #mydata_wrapper {
        max-width:85%!important;
		margin-left:3%!important;
    }
	#formdiv{
		margin-left:-55px;
	}
  }
  @media only screen and (min-width: 1200px) and (max-width: 1299px) {
    #mydata_wrapper {
        max-width:78%;
		margin-left:3%!important;
    }
	#formdiv{
		margin-left:-85px;
	}
  }
  @media only screen and (min-width: 1065px) and (max-width: 1199px) {
    #mydata_wrapper {
        max-width:80%;
		margin-left:3%!important;
    }
	#formdiv{
		margin-left:-85px;
	}
  }
  
  @media only screen and (min-width: 1000px) and (max-width: 1064px) {
    #mydata_wrapper {
        max-width:75%;
		margin-left:2%!important;
    }
	#formdiv{
		margin-left:-105px;
	}
  }
  </style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<!--there was sidebar -->
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Locality
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> report</a></li>
        <li class="active">City</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
		 <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
<div class="container bg-3">  

<div class="col-md-12">


<div class="col-md-6 col-md-offset-3 backImg">
    <div class="col-md-12" style="background:#a9a9a963;color: black;">
    
    <div class="text-center">
    <h3><b>UPCHAR</b> </h3>
           
    </div>

<center><h5 style="background: #5cb85c;padding: 8px 21px;color: white;border-radius: 23px;">                          Healthcare facility survey</h5>
</center>

<table cellpadding="10">
<td>
<form accreateProfile.php" method = "post">
<div class="col-md-6">
<h5>Name:</h5>
<input type="text" class="form-control" name="firstname" />
</div>

<div class="col-md-6">
<h5>Age</h5>
<input type="text" class="form-control digit" name="age" />
</div>


<div class="col-md-12">
<h5>Place</h5>
<input type="text" class="form-control" name="place" />

</div>

<div class="col-md-12">
<h5>Gender</h5>

<div class="col-md-4">
<input type="radio" name="gender" value="Male" /> <span class="ColorWhite">Male</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender" value="Female" /> <span class="ColorWhite">Female</span>
</div>
</div>




<br />


<div class="col-md-12">
<h5>1. Do you find difficulty in finding  doctor of your choice?</h5> 

<div class="col-md-4">
<input type="radio" name="gender1" value="YES" /> <span class="ColorWhite">YES</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender1" value="NO" /> <span class="ColorWhite">NO</span>
</div>
</div>

<div class="col-md-12">
	<h5>2. Do you have to wait for long time when you visit a doctor?</h5> 
<div class="col-md-4">
<input type="radio" name="gender2" value="YES" /> <span class="ColorWhite">YES</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender2" value="NO" /><span class="ColorWhite">NO</span>
</div>
</div>

<div class="col-md-12">
	<h5>3. If we provide good doctor and hospital facility near by you in lower cost, will you prefer it?</h5> 
<div class="col-md-4">
<input type="radio" name="gender3" value="YES" /><span class="ColorWhite">YES</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender3" value="NO" /> <span class="ColorWhite">NO</span>
</div>
</div>

<div class="col-md-12">
	<h5>4-	If we provide Doctor's appointment status tracking online, will it be helpful?    </h5> 
<div class="col-md-4">
<input type="radio" name="gender4" value="YES" /> <span class="ColorWhite">YES</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender4" value="NO" />  <span class="ColorWhite">NO</span>
</div>
</div>

<div class="col-md-12">
	<h5>5. Do you like to have all healthcare need on your phone in one application?</h5> 
<div class="col-md-4">	
<input type="radio" name="gender5" value="YES" /> <span class="ColorWhite">YES</span>
</div>
<div class="col-md-4">
<input type="radio" name="gender5" value="NO" />  <span class="ColorWhite">NO</span>
</div>
</div>
<br>
  <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="margin:19px 10px;">Submit</button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
         <h4 class="modal-title">Thanks For Submitting</h4>
        </div>
        
        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin: 23px;">Welcome</button>
       
      </div>
      
    </div>
  </div>

</form>
</td>
</table>

  </div>
    </section>
   
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
