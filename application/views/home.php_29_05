<head>
    <link rel="icon" href="images/logo.png" type="images/logo.png" sizes="32x32">
</head>
<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->

<style>


#searchBTN {
    width: 100%;
    padding: 12px;
    border: none;
    background-color: #9bc03c;
    color: white;
    margin-top: 5px;
    font-size: 16px;
    border-radius: 2px 2px 18px 0px;
}
    .careplus-navigation-section.careplus-bgcolor, .box-form .careplus-fancy-title{
        display:none;
    }


.nav > li > a {
    color:white;
}
.nav > li > a:hover, .nav > li > a:focus {
    background-color: #8bad36 !important;
}

/*-- page media query--*/

@media screen and (max-width: 786px) {
#sidebartab{position:absolute;z-index:432;margin:5px 0px; width: 263px;transition:0.3s;}
}

@media screen and (max-width: 786px) {
.paddl0{
    width: 100%;
    padding: 0px 165px;
}
.mobilesearchicons{
    width:46px;
}
}
@media screen and (max-width: 786px) {
#sidebartab{position:absolute;z-index:432;margin:5px 0px; width: 263px;display:none;}
}

@media screen and (max-width: 786px) {
.paddl0{
    width: 100%;
    padding: 0px 165px;
}

.secondmenuicon {
    font-size: 31px;
    color: white;
    display: block;
    width: 41px;
    padding: 6px;
    margin: 7px;
    cursor: pointer;
    background: #22495f;
}
#searchBTN {
    width: 100%;
    padding: 12px;
    border: none;
    background-color: #9bc03c;
    color: white;
    margin-top: 5px;
    font-size: 16px;
    border-radius: 2px 2px 18px 0px;
}

.nav > li > a {
    color: black;
}
.nav > li > a:hover, .nav > li > a:focus {
    text-decoration: none;
    
    border-radius:0px 0px;
    color: white;
}

}


</style>


<?php include("sidebar.php");?>

<body>
    <div class="text-center">
  <div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<?php include ("includes/header_new.php"); ?>
 <div class="container-fluid">
     
<form action='<?=base_url();?>search' method='GET'>
                <div class="box-form">
                      
      
                    <div class="col-sm-3">
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
                    <div class="col-sm-3">
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


   <div class="careplus-main-content">

            <!--// Main Section \\-->
            <div class="careplus-main-section careplus-services-full">
                <div class="container-fluid">
                   <!--  <i class="fa fa-bars secondmenuicon"></i>-->
                   
                      
                      
                            
                            <div class="careplus-service careplus-service-grid">
                                <ul class="col-md-12">
                                 <li class="col-md-4">
                                        <div class="col-md-12 careplus-service-wrap">
                                        <div class="col-md-3 text-center">
                                          <a href="<?=base_url();?>Home/calender">   <h1 style="color:white;"><i class="fa fa-search boxIcon" style="margin-right:6px;" aria-hidden="true"></i></h1></a>
                                        </div>

                                        <div class="col-md-9">
                                             <h5>Looking For Doctors </h5>
                                            
                                              <a href="https://www.upcharr.com/search?location=&city=&keyword=&spl=" class="BOOKBTN"><i class="fa fa-search" style="margin-right:6px;" aria-hidden="true"></i> Doctors</a>
                                        </div>
                                         </div>
                                         
                                    </li> 
                                    <li class="col-md-4">
                                        <div class="col-md-12 careplus-service-wrap">
                                        <div class="col-md-3 text-center">
                                          
                                           <a href=""> <h1 style="color:white;"><i class="fa fa-hospital-o boxIcon"></i></h1></a>
                                        
                                        </div>
                                        
                                        <div class="col-md-9">
                                             <h5>Looking For Hospital </h5>
                                           
                                              <a href="https://www.upcharr.com/hospitallist" class="BOOKBTN"><i class="fa fa-search" style="margin-right:6px;" aria-hidden="true"></i> Hospital</a>
                                        </div>
                                         </div>
                                         
                                    </li>
                                    
                                    <li class="col-md-4">
                                       <div class="col-md-12 careplus-service-wrap">
                                      <div class="col-md-3 text-center">
                                            <a href="#"> <h1 style="color:white;"><i class="fa fa-calendar boxIcon" aria-hidden="true"></i></h1></a>
                                        </div>
                                        
                                        <div class="col-md-9">
                                        <h5>Looking For Pathology </h5>
                                        
                                        <a href="#" class="BOOKBTN"><i class="fa fa-search" style="margin-right:6px;" aria-hidden="true"></i> Pathology</a>
                                        </div>
                                         </div>
                                    </li>
                                    <!--
                                    <li class="col-md-4">
                                     <div class="col-md-12 careplus-service-wrap">
                                        <div class="col-md-3 text-center">
                                          <a href="<?=base_url();?>Home/calender">   <h1 style="color:white;"><i class="fa fa-ambulance boxIcon"></i></h1></a>
                                        </div>

                                        <div class="col-md-9">
                                          <h5>Looking For Ambulance</h5>
                                           <a href="#" class="BOOKBTN">Book Now</a>
                                        </div>
                                         </div>
                                         
                                    </li>
                                    -->
                             
                                </ul>
                            </div>
                      

                    
                </div>
            </div>
            <!--// Main Section \\-->

            
       

   
    

        </div>
        


<?php $this->load->view('includes/footer.php'); ?>
        
    
    <script> 
$(document).ready(function(){
  $(".secondmenuicon").click(function(){
    $("#sidebartab").slideToggle("slow");
  });
  
  
});

</script>
</body>
