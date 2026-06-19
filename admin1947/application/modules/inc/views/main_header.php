<!DOCTYPE html>
<html lang="en">
<head>
  <title>Upchar Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?=base_url();?>public/assets/global/images/favicon.png">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
 
</head>
<body>
<div class="container-fluid">
	<div class='row'>
		<img src="<?=base_url();?>public/assets/global/images/logo2.png">
		<img src="<?=base_url();?>public/assets/global/images/DIPP_new.png" class="pull-right">
	</div>

</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Masters
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?=base_url()?>masters/education">Education</a></li>
          <li><a href="<?=base_url()?>masters/category">Category</a></li>
          <li><a href="<?=base_url()?>masters/religion">Religion</a></li>
          <li><a href="<?=base_url()?>masters/document">Identity document</a></li>
          <li><a href="<?=base_url()?>masters/coursetype">Course Type</a></li>
          <li><a href="<?=base_url()?>masters/coursefield">Course Field</a></li>
          <li><a href="<?=base_url()?>masters/course">Courses</a></li>
          <li><a href="<?=base_url()?>masters/hrcount">Training Duration</a></li>
          <li><a href="<?=base_url()?>masters/addagency">Add Agency</a></li>
          <li><a href="<?=base_url()?>masters/addassesse">Add Assesse</a></li>
          <li><a href="<?=base_url()?>masters/assessment">Add Asessment</a></li>
        </ul>
      </li>
	  <li class="dropdown active">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">DPR
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?=base_url()?>dpr/dprcreate">Create/Edit</a></li>
          <li><a href="<?=base_url()?>dpr/traineeallotment">Trainee Allotment</a></li>
          <li><a href="#">Similar / Duplicate Trainees</a></li>
        </ul>
      </li>
        <li><a href="<?=base_url()?>centers/center">Center</a></li>
        <li><a href="<?=base_url()?>subcenters/subcenter">Sub Center</a></li>
        <li><a href="<?=base_url()?>faculty/facultyreg">Faculty</a></li>
	  <li class="dropdown ">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Trainee
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?=base_url()?>trainee/traineereg">Create/Edit Trainee</a></li>
          <li><a href="<?=base_url()?>trainee/traineeview">View Trainee </a></li>
          <li><a href="<?=base_url()?>trainee/traineeupdate">Update Trainees</a></li>
		</ul>
	  </li>
	  <li class="dropdown ">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Batch
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Create Batch</a></li>
          <li><a href="#">Trainee Migration</a></li>
        </ul>
      </li>
	  <li class="dropdown ">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Attendance
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Center </a></li>
          <li><a href="#">Industrial</a></li>
          <li><a href="#">Manual</a></li>
        </ul>
      </li>
      <li><a href="#">Result</a></li>
      <li><a href="#">Placment</a></li>
      <li><a href="#">Logout</a></li>
	  
	  
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
