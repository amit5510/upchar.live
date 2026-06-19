<head>
    <link rel="icon" href="images/logo.png" type="images/logo.png" sizes="32x32">
</head>
<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->
<?php include ("includes/header_new.php"); ?>
<style>
    .careplus-navigation-section.careplus-bgcolor, .box-form .careplus-fancy-title{
        display:none;
    }
    .box-form {
    padding: 20px;
}
@media screen and (max-width: 786px) {
#sidebartab{position:absolute;z-index:432;margin:5px 0px; width: 263px;}
}

@media screen and (max-width: 786px) {
.paddl0{
    width: 100%;
    padding: 0px 165px;
}
}

.menutab:first-child { 
    border-radius:14px 0px 0px 0px;
}
.menutab:last-child { 
    border-radius:0px 0px 14px 0px;
}


.menutab{
    background: #043d5b;
    margin-bottom:3px;
}

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

   <div class="careplus-main-content">

            <!--// Main Section \\-->
            <div class="careplus-main-section careplus-services-full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3" id="sidebartab">
                            <div class="sidebar" style="border-radius: 1px 17px;">

            
			
            <div class="sidebar-inner">
          <ul class="nav nav-sidebar">
              <li class="menutab"><a href="<?=base_url();?>myappointents"><i class="fa fa-calendar" aria-hidden="true" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Appointment History</span> </a> </li>
            <li class="menutab"><a href="index.php"><i class="icon-home" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Dashboard</span></a></li>
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
                        <div class="col-md-9">

    <div class="row">
        <div class='col-sm-4'>
 <div class='col-sm-12'>
                                        <div class="careplus-service-wrap">
                                            <h1 style="color:white;"><i class="fa fa-calendar" aria-hidden="true"></i></h1>
                                      
                                          <h5>CHOOSE DATE </h5></a>
                                           <div class='col-sm-12'>
                                          <div class="form-group">
                                            <div class='input-group date' id='datetimepicker7'>
                                                <input type='text' class="form-control" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div> 
                                           </div>
                                          
         </div>
           </div>
        </div>
        
          <div class='col-sm-4'>
         <div class='col-sm-12'>
                
                                        <div class="careplus-service-wrap">
                                            <h1 style="color:white;"><i class="fa fa-calendar" aria-hidden="true"></i></h1>
                                            
                                          <h5>SPECIALIZATION </h5></a>
                                           <div class='col-sm-12'>
                                        
                                          
                        <div class="input-group">
                            <!--
                            <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                            -->
                            <select class="form-control" name="spl">
              <option value="">-Specialization-</option>
                                              <?php foreach($specialization as $s){ ?>
                                <option value='<?=$s->id;?>'><?=$s->name;?></option>
							<?php } ?>
                                               
                            </select>
                            
                        </div>
                    </div> 
                  </div>
               </div>                     
        </div>
        
          <div class='col-sm-4'>
                <div class='col-sm-12'>
            
               <div class="careplus-service-wrap">
                                           <h1 style="color:white;"><i class="fa fa-map-marker" aria-hidden="true"></i></h1>
                                          
                                          <h5>LOCATION </h5></a>
                                           <div class='col-sm-12'>
                                            <select class="form-control" name="spl">
              <option>-CHOOSE STATE-</option>
                                             
                                
                                        <option>Bihar (Patna)<option>
                                        <option>Chhattisgarh (Raipur)<option>
                                        <option>Goa (Panaji)<option>
                                        <option>Gujarat (Gandhinagar)<option>
                                        <option>Haryana (Chandigarh)<option>
                                        <option>Himachal Pradesh (Shimla)<option>
                                        <option>Jammu & Kashmir <option>
                                        <option>Jharkhand (Ranchi)<option>
                                        <option>Karnataka (Bangalore)<option>
                                        <option>Kerala (Thiruvananthapuram)<option>
                                        <option>Madhya Pradesh (Bhopal)<option>
                                        <option>Maharashtra (Mumbai)<option>
                                        <option>Manipur (Imphal)<option>
                                        <option>Meghalaya (Shillong)<option>
                                        <option>Mizoram (Aizawl)<option>
                                        <option>Nagaland (Kohima)<option>
                                        <option>Odisha (Bhubaneshwar)<option>
                                        <option>Punjab (Chandigarh)<option>
                                        <option>Rajasthan (Jaipur)<option>
                                        <option>Sikkim (Gangtok)<option>
                                        <option>Tamil Nadu (Chennai)<option>
                                        <option>Telangana (Hyderabad)<option>
                                        <option>Tripura (Agartala)<option>
                                        <option>Uttarakhand (Dehradun)<option>
                                        <option>Uttar Pradesh (Lucknow)<option>
                                        <option>West Bengal (Kolkata)<option>
						
                                               
                            </select>
                                        </div> 
                                        
                                         
                            
                                        
                                        </div>
                                    
        </div>
         </div>
        
        
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>



                        </div>

                    </div>
                </div>
            </div>
           
  <!--         
<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
      
      -->     
           
                      
            <!--// Main Section \\-->

            
       

   
    

        </div>
        

      <br/><br/>

    <?php include ('includes/footer.php'); ?>