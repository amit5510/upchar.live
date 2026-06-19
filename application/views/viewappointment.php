<?php include ("includes/header_new.php"); ?>
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
   .formdiv{
      padding:25px; border-bottom-left-radius: 4px;; border-bottom-right-radius: 4px;
  }
  .formheader{
      background:#605CA8;padding:10px;color:#fff;font-size:16px;
  }
  #submit{background:#605ca8;padding: 6px 30px;}
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
  
  
  .menutab {
    background: #043d5b;
    margin-bottom: 3px;
}
.menutab:first-child {
    border-radius: 14px 0px 0px 0px;
}
.menutab:last-child {
    border-radius: 0px 0px 14px 0px;
}
.colorwhite{color:white;}

.continue2 {
    background: #041e2b;
    color: white;
    border: none;
    outline: 1px solid #ffffff;
    padding: 10px 30px;
}
  </style>
    <div class="careplus-banner">
<div class="container-fluid">
            <div class="row">
		
<form action='<?=base_url();?>search' method='GET'>
                <div class="box-form">
                      
      
                    <div class="col-sm-2 col-sm-offset-1">
                        <div class="input-group shadow">
                            <span class="input-group-addon"> <i class="fa fa-map-marker"> &nbsp; &nbsp; </i></span>
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
            </div>
                        <div class="clearfix"></div>
            
        </div>
           
            
        </div>
        
        
        <div class="container">
        <div class="pag_cstm">

            <div class="row">
                
                <div class="col-md-3" id="sidebartab">
                            <div class="sidebar" style="border-radius: 1px 17px;">

            
			
              <div class="sidebar-inner">
          <ul class="nav nav-sidebar">
              <li class="menutab"><a href="<?=base_url();?>myappointents"><i class="fa fa-calendar" aria-hidden="true" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Appointment History</span> </a> </li>
            <li class="menutab"><a href="<?=base_url();?>index.php"><i class="icon-home" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Dashboard</span></a></li>
            <li class="menutab"><a href="#"><i class="fa fa-medkit" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Medicine Pathology</span> </a></li>
			 <li class="menutab"><a href="#"><i class="fa fa-user-md" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Doctor History</span> </a> </li>
            <li class="menutab"><a href="#"><i class="fa fa-hospital-o" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Hospital History</span> </a></li>
            <li class="menutab"><a href="<?=base_url();?>Home/profile"><i class="fa fa-user-md" aria-hidden="true" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Profile</span> </a> </li>
            <li class="menutab"><a href="<?=base_url();?>hospitals"><i class="fa fa-hospital-o" aria-hidden="true" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Hospital List</span> </a> </li>
            <li class="menutab"><a href="<?=base_url();?>doctors"><i class="fa fa-user-md" aria-hidden="true" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Doctor List</span> </a> </li>

           
          </ul>
        </div>
        </div>
                        </div>
                <div class="col-lg-7">
                    <div class="pag_cstm_panel" style="background: #043752;padding: 12px 43px;">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
							<div class="col-sm-12 processsstep2">
							<h3 class="colorwhite">User Profile</h3>

							</div>


                <?php foreach($data as $row) {

                     ?>
							<form action =''method='post'>
                               
                               <div class="formdiv">

        
       <div class="form-group">
          <label for="text" class="colorwhite">Appointmet Id:</label>
          <input type="text" class="form-control" id="religion" placeholder="Enter Your Name" name="name" data-validation="required"
         data-validation-error-msg="This Field is required"  value="<?php echo $row->appointment_id; ?>">
         
          </div>

       <div class="form-group">
          <label for="text" class="colorwhite">Appointmet Name</label>
          <input type="text" class="form-control" id="religion" placeholder="Enter Your Email" name="email" data-validation="required"
         data-validation-error-msg="This Field is required" value="<?php echo $row->appointment_name?>">
         
          </div>
          <div class="form-group">
          <label for="text" class="colorwhite">Appointment Email</label>
          <input type="text" class="form-control" id="religion" placeholder="Enter Your Mobile" name="mobile" data-validation="required"
         data-validation-error-msg="This Field is required" value="<?php echo $row->appointment_email;?>">
         
          </div>
          <div class="form-group">
          <label for="text" class="colorwhite">Mobile</label>
          <input type="text" class="form-control" id="religion" placeholder="Enter Your DOB" name="dob" data-validation="required"
         data-validation-error-msg="This Field is required" value="<?php echo $row->appointment_mobile;?>">
         
          </div>
          <div class="form-group">
          <label for="text" class="colorwhite">Appointment Date</label>
          <input type="text" class="form-control" id="religion" placeholder="Enter Your DOB" name="dob" data-validation="required"
         data-validation-error-msg="This Field is required" value="<?php echo $row->appointment_date;;?>">
         
          </div>
          <div class="col-sm-12 click_step2 padding0">        
                                  <button class="continue2" type='submit' name='submit'>Continue</button>
                                  
                                                                  </div>
                       
                         

        </div>

								</form>
<?php } ?>    

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
        
        <?php include ("includes/footer.php"); ?>