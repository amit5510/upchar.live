
<head>

    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
    <style>
#designforform{
    border-radius: 0px 29px;
    background:white;
    padding: 20px;
    margin-top: 47px;
    box-shadow:0px -2px 8px #173242;
}



 .menutab {
    background: #043d5b;
    margin-bottom: 3px;
}
.menutab:first-child {
    border-radius: 14px 0px 0px 0px;
        box-shadow: -4px -3px 6px #17303e;
}
.menutab:last-child {
    border-radius: 0px 0px 14px 0px;
}
.colorwhite{color:white;}

.continue2 {
    background: #295771;
    color: white;
    border: none;
    padding: 10px 30px;
}
    </style>
</head>


<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->
<?php $this->load->view("includes/header_new.php"); ?>


<form action='<?=base_url();?>search' method='GET'>
                <div class="box-form">
                      
      
                    <div class="col-sm-2 col-sm-offset-1">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            <input type="text" class="form-control ui-autocomplete-input" name="location" placeholder="Location" id="hintcity" autocomplete="off">
                            <input type="hidden" class="form-control" name="city" id="city">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" id="hint" class="form-control ui-autocomplete-input" name="keyword" placeholder="Search Hospitals/Doctors/Clinics etc" autocomplete="off">
                        </div>
                        
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                            <select class="form-control" name="spl">
              <option value="">-Specialization-</option>
                                              <?php foreach($specialization as $s){ ?>
                                <option value='<?=$s->id;?>'><?=$s->name;?></option>
							<?php } ?>
                                               
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-sm-1">
<button class="careplus-booking-btn careplus-bgcolor-two" id="searchBTN"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>




                    <div class="clearfix"></div>
                </div>
                </form>
   

         

<div class="container">
    
                             <div class="col-md-3" id="sidebartab">
                            <div class="sidebar" style="border-radius: 1px 17px;">

            
			
            <div class="sidebar-inner">
          <ul class="nav nav-sidebar">
              <li class="menutab"><a href="<?=base_url();?>myappointents"><i class="fa fa-calendar" aria-hidden="true" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Appointment History</span> </a> </li>
            <li class="menutab"><a href="<?=base_url();?>index.php"><i class="icon-home" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Dashboard</span></a></li>
            <li class="menutab"><a href="#"><i class="fa fa-medkit" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Medicine Pathology</span> </a></li>
		<!--	 <li class="menutab"><a href="#"><i class="fa fa-user-md" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Doctor History</span> </a> </li>
            <li class="menutab"><a href="#"><i class="fa fa-hospital-o" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Hospital History</span> </a></li> -->
            <li class="menutab"><a href="<?=base_url();?>Home/profile"><i class="fa fa-user-md" aria-hidden="true" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Profile</span> </a> </li>
            <li class="menutab"><a href="<?=base_url();?>hospitallist"><i class="fa fa-hospital-o" aria-hidden="true" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Hospital List</span> </a> </li>
            <li class="menutab"><a href="<?=base_url();?>doctors"><i class="fa fa-user-md" aria-hidden="true" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Doctor List</span> </a> </li>

           
          </ul>
        </div>
        </div>
                        </div>
                        <div class="col-md-2"></div>
        <div class="col-md-4" id="designforform">
            <h2>Change Password</h2>
   <?=$this->session->flashdata('msg');?>

            <form method="post" action=''>
            	<h5 style="color:black;">Old Password </h5>
            		

            		<input type="password" class="form-control" name="password" id="name" placeholder="Old Pass"/>
            		<h5 style="color:black;">New Password </h5>
            		<input type="password" class="form-control" name="newpass" id="password" placeholder="New Password"/>
            
            		<h5 style="color:black;">Confirm Password</h5>
            		<input type="password" class="form-control" name="confpassword" id="password" placeholder="Confirm Password"/>
            	
            	
            		
            			<input type="submit" value="SAVE" name="change_pass" style="
    background: #295771;
    color: white;
    border: none;
    border-radius: 0px 12px;
    margin-top: 20px;
    padding: 7px 27px;
    color: #ffffff;
    font-weight: bold;
">

            </form>            
            
        </div>        
        <div class="col-md-4"></div>    
    </div>
</div>


    <?php $this->load->view('includes/footer.php'); ?>
	 