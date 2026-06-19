
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>|| Welcome to Upchaar ||</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link href="<?=base_url();?>css/datepicker.css" rel="stylesheet">
    <link href="<?=base_url();?>css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url();?>css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url();?>css/flaticon.css" rel="stylesheet">
    <link href="<?=base_url();?>css/slick-slider.css" rel="stylesheet">
    <link href="<?=base_url();?>css/fancybox.css" rel="stylesheet">
     <link href="<?=base_url();?>css/coustm.css" rel="stylesheet">
    <link href="<?=base_url();?>style.css" rel="stylesheet">
    <link href="<?=base_url();?>css/color.css" rel="stylesheet">
    <link href="<?=base_url();?>css/style_home.css" rel="stylesheet">
    <link href="<?=base_url();?>css/responsive.css" rel="stylesheet">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style type="text/css"> .login
 {
    margin-left: 54px;
    border: 1px solid #fff;
    padding: 11px 30px;
    margin-top: 9px;
    float: right;
    color: #fff;
}
.login a
{color: #fff;}
.login:hover
{background: #9bc03c;
color: #fff;}
.navbar-nav > li { padding: 0px 26px 0px 12px!important; }
.careplus-user-list li {
  
    margin: 15px 0px 0px -11px!important;
 
}
</style>
  <body>
    
    <!--// Main Wrapper \\-->
    <div class="careplus-main-wrapper">
    

 <header id="careplus-header" class="careplus-header-one">
            
            <!--// Main Header \\-->
            <div class="careplus-main-header">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-3"><a href="<?=base_url();?>" class="careplus-logo"><img src="<?=base_url();?>images/logo.png" alt=""></a></aside>
                        <aside class="col-md-9">
                            <ul class="careplus-infolist">
                                <li>
                                    <i class="careplus-bgcolor-two fa fa-envelope"></i>
                                    <a href="mailto:yourdomain@name.com">hello@upchaar.com</a>
                                    <a href="mailto:yourdomain@name.com">info@upchaar.com</a>
                                </li>
                                <li>
                                    <i class="careplus-bgcolor-two fa fa-mobile"></i>
                                    <span>9718777468</span>
                                    <!--<span>7:00 pm - 10:00 pm</span>-->
                                </li>
                                <li>
                                    <i class="careplus-bgcolor-two fa fa-map-marker"></i>
                                    <span>H. No-N 8 / 251 A-1 -99 Nevada sunderpur Varanasi -221005</span>
                                </li>
                                	
                            </ul>
                            
                            									<div class="dropdown" id="user-header" style="">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img src="assets/images/user.jpg" alt="user image" style='width:20px;'>
                                <span class="username">Swati<i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!--<li class="name_mo"> <img src="assets/images/user.jpg" alt="user image"  style='width:20px;'>
                                    <p>Swati                                        <br/>9990179859</p>
                                </li>-->
                                <li><a href="my_profile.php"><span>My Profile</span></a></li>
                                <li><a href="#"><span>My Tests</span></a></li>
                                <li><a href="#"><span>My Medicine Order</span></a></li>
                                <li><a href="#"><span>My Online Consultation</span></a></li>
                                <li><a href="#"><span>My Feedback</span></a></li>

                                <li><a href="#"><span>My Articles</span></a></li>
                                <li><a href="#"><span>My Payments</span></a></li>

                                <li><a href="#"><span>View Update Profile</span></a></li>
								  <li><a href="change_password.php"><span>Change Password</span></a></li>
                                <li><a href="#"><span>Setting</span></a></li>
                                <li><a href="<?=base_url();?>User/logout"><span>Logout</span></a></li>
                            </ul>
                      
                      </div>
										 
                        </aside>
                    </div>
                </div>
            </div>
            <!--// Main Header \\-->

            <!--// Navigation Section \\-->
            <div class="careplus-navigation-section careplus-bgcolor">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3"> <a href="#" class="navbar-brand"></a></div>
                        <div class="col-md-9">
                            <div class="careplus-navinner">
                                <nav class="navbar navbar-default">
                                    <div class="navbar-header">
                                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="true">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span3
                                      </button>

                                    </div>
                                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                      <ul class="nav navbar-nav">
                                        <li class="active"><a href="<?=base_url();?>">Home</a></li>
                                        <li><a href="#">Gallery</a>
                                            <ul class="careplus-dropdown-menu">
                                                <li><a href="appointment.php">Time Table</a></li>
                                                <li><a href="appointment-form.php">Appointment Booking</a></li>
                                            </ul>
                                        </li>
                                        <!--
                                        <li><a href="#">Blogs</a>
                                            <ul class="careplus-dropdown-menu">
                                                <li><a href="blog-grid.php">Blog Grid</a>
                                                    <ul class="careplus-dropdown-menu">
                                                        <li><a href="blog-grid-wls.php">Blog Grid W/L/S</a></li>
                                                        <li><a href="blog-grid-wrs.php">Blog Grid W/R/S</a></li>
                                                        <li><a href="blog-grid.php">Blog Grid W/O/S</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-modern.php">Blog Modern</a>
                                                    <ul class="careplus-dropdown-menu">
                                                        <li><a href="blog-modern-wls.php">Blog Modern W/L/S</a></li>
                                                        <li><a href="blog-modern-wrs.php">Blog Modern W/R/S</a></li>
                                                        <li><a href="blog-modern.php">Blog Modern W/O/S</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-medium.php">Blog Medium</a></li>
                                                <li><a href="blog-large.php">Blog Large</a>
                                                    <ul class="careplus-dropdown-menu">
                                                        <li><a href="blog-large.php">Blog Large W/R/S</a></li>
                                                        <li><a href="blog-large-wls.php">Blog Large W/L/S</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-detail.php">Blog Detail</a>
                                                    <ul class="careplus-dropdown-menu">
                                                        <li><a href="blog-detail.php">Blog Detail W/R/S</a></li>
                                                        <li><a href="blog-detail-wls.php">Blog Detail W/L/S</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        -->
                                         <li class="careplus-megamenu-li"><a href="<?=base_url();?>doctors">Our Doctor</a></li>
                                        <li class="careplus-megamenu-li"><a href="#">Our Services</a>
                                            <ul class="careplus-megamenu">
                                                <li class="row">
                                                    <div class="col-md-2">
                                                        <h4>Link 1</h4>
                                                        <ul class="careplus-megalist">
                                                            <li><a href="team-grid.php">Team Grid W/O/S</a></li>
                                                            <li><a href="team-grid-wls.php">Team Grid W/L/S</a></li>
                                                            <li><a href="team-grid-wrs.php">Team Grid W/R/S</a></li>
                                                            <li><a href="team-grid-wof.php">Team Grid W/O/F</a></li>
                                                            <li><a href="team-list.php">Team List</a></li>
                                                            <li><a href="team-list-wls.php">Team List W/L/S</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <h4>Link 2</h4>
                                                        <ul class="careplus-megalist">
                                                            <li><a href="team-medium.php">Team Medium W/O/S</a></li>
                                                            <li><a href="team-medium-wls.php">Team Medium W/L/S</a></li>
                                                            <li><a href="team-medium-wrs.php">Team Medium W/R/S</a></li>
                                                            <li><a href="team-detail-wls.php">Team Detail W/L/S</a></li>
                                                            <li><a href="team-detail.php">Team Detail</a></li>
                                                            <li><a href="pricing-plan.php">Pricing Plan</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <h4>Link 3</h4>
                                                        <ul class="careplus-megalist">
                                                            <li><a href="gallery.php">Gallery</a></li>
                                                            <li><a href="gallery-view-two.php">Gallery View 2</a></li>
                                                            <li><a href="testimonial.php">Testimonial</a></li>
                                                            <li><a href="about-us.php">About Us</a></li>
                                                            <li><a href="faq.php">Faq</a></li>
                                                            <li><a href="404.php">404 Error Page</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="#" class="careplus-thumbnail">
                                                            <img src="<?=base_url();?>extra-images/megamenu-frame.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="contact-us.php">Contact us</a></li>
									       
                                      </ul>
                                    </div>
                                </nav>
                                <ul class="careplus-user-list">
                                    <li><a href="#" class="careplus-color-two fa fa-search" data-toggle="modal" data-target="#searchmodal"></a></li>
                                   <!--- <li><a href="#" class="careplus-color-two fa fa-shopping-cart">Login / Sign Up</a>
                             <div class="careplus-cart-box"> <p>No products in the cart.</p> </div>
                                    </li>--> 
										                                </ul>

                                       <!-- <div class="careplus-cart-box"> <p>No products in the cart.</p> </div>-->
                                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Navigation Section \\-->

        </header>
       <style>
    .careplus-navigation-section.careplus-bgcolor, .box-form .careplus-fancy-title{
        display:none;
    }
    .box-form {
    padding: 20px;
}
</style>
<div class="careplus-banner">
<div class="container-fluid">
            <div class="row">
			<form action='<?=base_url();?>search' method='GET'>
                <div class="box-form">
                    	
						<div class="col-md-12">
                            <div class="careplus-fancy-title" style="margin: 0px 0px 20px;">
                                <h2 style="color:#fff;">Search your needs!</h2>
                                <span><small></small><i class="icon-tool5"></i></span>
                            </div>
                            </div>
                    <div class="col-sm-2 col-sm-offset-1">
                        <div class="input-group shadow">
                            <span class="input-group-addon"> <i class="fa fa-map-marker"> &nbsp; &nbsp; </i></span>
                            <input type="text" class="form-control" name="location" placeholder="Location" id='hintcity'>
                            <input type="hidden" class="form-control" name="city"  id='city'>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" id='hint' class="form-control" name="keyword" placeholder="Search Hospitals/Doctors/Clinics etc">
                        </div>
                        
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                            <select class="form-control" name='spl'>
							<option value=''>-Specialization-</option>
							                                <option value='6'>cardiologist</option>
							                                <option value='1'>Dentist</option>
							                                <option value='5'>neuro</option>
							                                <option value='2'>Orthodontist</option>
							                                <option value='7'>physytion</option>
							                                 
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-sm-1"><button class="careplus-booking-btn careplus-bgcolor-two" style=" margin-top: 0px; line-height: 40px;box-shadow: 3px 3px 0px #08364b9e; ">Search</button></div>
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
                        <div class="col-md-3">
                            <div class="sidebar">

            
			
            <div class="sidebar-inner">
          <ul class="nav nav-sidebar">
            <li class="nav-active active"><a href="index.php"><i class="icon-home"></i><span>Dashboard</span></a></li>

			          <li class=""><a href="#"><i class="icon-bulb"></i><span>User Detail</span> </a></li>
            <li class=""><a href="#"><i class="icon-bulb"></i><span>Medicine Pathology</span> </a></li>
			 <li class=""><a href="#"><i class="icon-puzzle"></i><span>Doctor History</span> </a> </li>
            <li><a href="#"><i class="icon-bulb"></i><span>Hospital History</span> </a></li>
<li class=""><a href="milestone.php"><i class="fa fa-user-md" aria-hidden="true"></i><span>Profile</span> </a> </li>
           
          </ul>
        </div>
        </div>
                        </div>
                        <div class="col-md-9">
                            <div class="careplus-service careplus-service-grid">
                                <ul class="row">
                                    <li class="col-md-3">
                                        <div class="careplus-service-wrap">
                                            <h5>Appointment </h5>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="careplus-service-wrap">
                                            <h5>Medicine </h5>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="careplus-service-wrap">
                                            <h5>Pathology </h5>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="careplus-service-wrap">
                                            <h5>Ambulance</h5>
                                        </div>
                                    </li>
                                    
                             
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

            
       

   
    

        </div>
        <!--// Main Content \\-->

        <!--// Footer \\-->
         
 
       <footer id="careplus-footer" class="careplus-footer-one">
            <span class="careplus-footer-transparent"></span>
            <!--// Footer Widget \\-->
            <div class="careplus-footer-widget">
                <div class="container">
                    <div class="row">
                        <!--// Widget Contact Info \\-->
                        <aside class="col-md-4 widget widget_contact_info">
                            <a href="index.html" class="footer-logo"><img src="<?=base_url();?>images/footer-logo.png" alt=""></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisci elit. Sed et elementum nulla, eu placerat felis. Et mtin orci lacus, id varius.Nunc ut volutpat ex. Morbi risus elit, mattis in mi ne mollis blandit erat.</p>
                            
                        </aside>
                        <!--// Widget Contact Info \\-->

                        <!--// Widget Useful Link \\-->
                        <aside class="col-md-4 widget widget_useful_link">
                            <h2 class="careplus-footer-title">Useful Links</h2>
                            <ul>
                                <li><a href="404.html">Dental</a></li>
                                <li><a href="404.html">Cardiology</a></li>
                                <li><a href="404.html">Nuclear Magnetic</a></li>
                                <li><a href="404.html">Hourly Care</a></li>
                                <li><a href="404.html">Pregnancy</a></li>
                                <li><a href="404.html">Respite Care</a></li>
                                <li><a href="404.html">For Disabled</a></li>
                                <li><a href="404.html">Insurance Claim</a></li><!--
                                <li><a href="404.html">Prostheses</a></li>
                                <li><a href="404.html">Patient Reports</a></li>
                                <li><a href="404.html">Traumatology</a></li>
                                <li><a href="404.html">Appointment</a></li>-->
                            </ul>
                        </aside>
                        <!--// Widget Useful Link \\-->

                        <!--// Widget Newsletter \\-->
                        <aside class="col-md-4 widget widget_contact_info" >
                            <h2 class="careplus-footer-title">Contact Us</h2>
                            
                            <ul>
                                <li>
                                    <h6>Call Us At:</h6>
                                    <span>+123 45 678 - (923) 987 65 432</span>
                                </li>
                                <li>
                                    <h6>Mail Us At:</h6>
                                    <a href="mailto:yourdomain@name.com">hello@care.com - info@exam.com</a>
                                </li>
                                <li>
                                    <h6>Our Location:</h6>
                                    <span>2925 Swick Hill Street, lotte, NC </span>
                                </li>
                            </ul>
                        </aside>
                        <!--// Widget Newsletter \\-->

                    </div>
                </div>
            </div>
            <!--// Footer Widget \\-->

            <!--// Copy Right \\-->
            <div class="careplus-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Upchaar <i class="fa fa-copyright"></i> 2018, All Right Reserved  </p>
                            <a href="#" class="careplus-back-top"><i class="fa fa-angle-up"></i></a>
                            <ul class="careplus-footer-social">
                                <li><a href="https://www.facebook.com/" target='_blank' class="fa fa-facebook-square"></a></li>
                                <li><a href="https://twitter.com/login" target='_blank' class="fa fa-twitter-square"></a></li>
                                <li><a href="https://pk.linkedin.com/" target='_blank' class="fa fa-linkedin-square"></a></li>
                                <li><a href="https://plus.google.com/" target='_blank' class="fa fa-google-plus-square"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Copy Right \\-->


        </footer>
        <!--// Footer \\-->

	<div class="clearfix"></div>
    </div>
    <!--// Main Wrapper \\-->

    <!-- Modal -->
    <div class="modal fade searchmodal" id="searchmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-body">
                <a href="#" class="careplus-close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                <form>
                    <input type="text" value="Type Your Keyword" onblur="if(this.value == '') { this.value ='Type Your Keyword'; }" onfocus="if(this.value =='Type Your Keyword') { this.value = ''; }">
                    <input type="submit" value="">
                    <i class="fa fa-search"></i>
                </form>
            </div>
        </div>
    </div>

<div id="conmermation"/>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body">
         <div class="col-sm-6 borders confer">
 <form method='post' action='<?=base_url();?>home/bookappointment' id='app_conf_form'>
            <div class="careplus-fancy-titles">
                                <h2>Confirm Appointment</h2>
                                <input value="" type="hidden" id="app_conf_pop_doctorid"  name="app_doctor" class="form-control">
                            </div>
                            <div class="label_name">
                    <label>Choose your Date<span>*</span></label>
                      <!-- <input  type="text" placeholder="click to show Datepicker" class="form-control" id="example1" >-->
						<select class="form-control" name='app_date' id='app_conf_pop_date' required>
					
				
						
						</select>
                        <label>Select Time<span>*</span></label>
                        <select class="form-control" name='app_time' id='app_conf_pop_time' required>
  </select>
                                 <label>Patient/Visitor Name<span>*</span></label>
                                  <input value="Swati Swati" type="text" name="app_name" id='app_conf_name' class="form-control" required>
                                   <label>Mobile Number<span>*</span></label>
                                  <input value="9718777468" type="text" name="app_mobile" id='app_conf_mobile' class="form-control" onkeypress="return isNumber(event)"  required>
                                  
                                   <label>E-mail Id</label>
                                  <input value="mcaswati02@gmail.com" type="email" name="app_email" class="form-control" >

        
<p>By booking the appointment, you agree to Upchar's <a href="#">Terms and Conditions.</a></p>	   
      <button type="submit" id='app_conf_submit' class="btn  btn-lg common-btn con_done">Book Appointment </button>
	        
         </div>                 
                                
              </form>             

                        </div>


 <!---- <div class="col-sm-3  date_cha"> 
<span><i class="fa fa-calendar" aria-hidden="true"></i>On Sep 04, 2018<br/><a href="#">Change Date & Time</a></span>

                            </div>
                             <div class="col-sm-3  date_cha"> 
<span><i class="fa fa-clock-o" aria-hidden="true"></i>At 4:00 PM</span>
                            </div>--->
                       
                          <div class="col-sm-6 right_box" id='app_conf_pop_doctor'> 
<div class="col-md-4">    
    <img src="extra-images/team-list-img1.jpg" alt="">
</div>

<div class="col-md-8">    
<div class="doc_nam_inf" >
                                <span>Loading...</span>
                                <ul>
                                    <li>Loading... </li>
                                    <li>Loading... </li>
                                    
                                    <li><b>Loading...</b></li>

                                </ul>
                            </div>
                        </div>
                        </div>
						
 <div class="col-sm-6 right_box" id='app_conf_pop_institute'>                          
<div class="col-md-4">    
    <img src="images/dentist.png" alt="">
</div>

<div class="col-md-8">    
<div class="doc_nam_inf">
                                <span>Dr. Birendra Kumar Pawar</span>
                                <ul>
                                    <li>579, Pocket C/8 , Sector-8 , Madhuban Chowk, Metro Pillar No. 373, Delhi
</li>

                                </ul>
                            </div>
                        </div>
                        </div>
                        



        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         
        </div>
        
      </div>
    </div>
  </div>
  
</div>
</div>

  <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>

</script>
<script>
		function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
	</script>

    <script type="text/javascript" src="<?=base_url();?>css/bootstrap-datepicker.js"></script>
   <!-- <script type="text/javascript" src="script/jquery.js"></script>
    <script type="text/javascript" src="script/bootstrap.min.js"></script>
    <script type="text/javascript" src="script/slick.slider.min.js"></script>
    <script type="text/javascript" src="script/isotope.min.js"></script>
    <script type="text/javascript" src="script/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="script/fancybox.pack.js"></script>
    <script type="text/javascript" src="script/progressbar.js"></script>
    <script type="text/javascript" src="script/counter.js"></script>
    <script type="text/javascript" src="script/functions.js"></script>-->	
	
	<script>	
	$('#registrationform').submit(function(e) {		
		e.preventDefault(e);		
		/* $('button[type=submit], input[type=submit]').prop('disabled',true); */		
		var myform=$(this);		
		$.ajax({			
			type: "POST",			
			url: myform.attr('action'),			
			data: myform.serialize(),			
			success: function( response ) {			
				response = JSON.parse(response);				
				if(response.status=='success'){					
					window.location="<?=base_url();?>verifymobile";				
				}				
				else if(response.status=='failed'){					
					alert(response.msg);									
				}else{					
					alert('opps'+response.msg);				
				}				
				console.log( response );			
			}		
		});			
	});
	</script>		
	<script>
	$('#loginform').submit(function(e) {		
		e.preventDefault(e);		
		/* $('button[type=submit], input[type=submit]').prop('disabled',true); */		
		var myform=$(this);		
		$.ajax({			
			type: "POST",			
			url: myform.attr('action'),			
			data: myform.serialize(),			
			success: function( response ) {				 
				response = JSON.parse(response);				
				if(response.status=='success'){
				//location.reload();	
				window.location="<?=base_url();?>";		
				}				
				else if(response.status=='otp'){					
					window.location="<?=base_url();?>verifymobile";								
				}
				else if(response.status=='failed'){					
					alert(response.msg);									
				}else{					
					alert('opps'+response.msg);				
				}				
				console.log( response );			
			}		
		});			
	});		
	
	</script>
	<script>
	$('#forgotform').submit(function(e) {		
		e.preventDefault(e);		
		var myform=$(this);		
		$.ajax({			
			type: "POST",			
			url: myform.attr('action'),			
			data: myform.serialize(),			
			success: function( response ) {				 
				response = JSON.parse(response);				
				if(response.status=='success'){
				//window.location="<?=base_url();?>";	
				//window.location="<?=base_url();?>verifymobileforgot";	
				$('#forgotform').hide();
				$('#forgototpform').show();
				}else{					
					alert('opps'+response.msg);				
				}				
				console.log( response );			
			}		
		});			
	});		
	
	</script>
	<script>
	$('#signupotpform').submit(function(e) {		
		e.preventDefault(e);		
		/* $('button[type=submit], input[type=submit]').prop('disabled',true); */		
		var myform=$(this);		
		$.ajax({			
		type: "POST",			
		url: myform.attr('action'),			
		data: myform.serialize(),			
		success: function( response ) {				
			response = JSON.parse(response);				
			if(response.status=='success'){										
				//window.location="<?=base_url();?>";
				window.location="<?=base_url();?>";					
			}else if(response.status=='failed'){					
				alert(response.msg);									
			}else{
				alert('opps'+response.msg);
			}
			console.log( response );			
		}
		});
	});		
	
	$('#forgototpform').submit(function(e) {		
		e.preventDefault(e);		
		var myform=$(this);		
		$.ajax({			
		type: "POST",			
		url: myform.attr('action'),			
		data: myform.serialize(),			
		success: function( response ) {				
			response = JSON.parse(response);				
			if(response.status=='success'){										
				//window.location="<?=base_url();?>";
				//window.location="<?=base_url();?>";
				$('#forgototpform').hide();
				$('#forgotnewpassform').show();
			}else if(response.status=='failed'){					
				alert(response.msg);									
			}else{
				alert('opps'+response.msg);
			}
			console.log( response );			
		}
		});
	});		
	
	$('#forgotnewpassform').submit(function(e) {		
		e.preventDefault(e);		
		var myform=$(this);		
		$.ajax({			
		type: "POST",			
		url: myform.attr('action'),			
		data: myform.serialize(),			
		success: function( response ) {				
			response = JSON.parse(response);				
			if(response.status=='success'){										
				window.location="<?=base_url();?>login";
				//window.location="<?=base_url();?>";
				//$('#forgototpform').hide();
				//$('#forgotnewpassform').show();
			}else if(response.status=='failed'){					
				alert(response.msg);									
			}else{
				alert('opps'+response.msg);
			}
			console.log( response );			
		}
		});
	});		
	
	$('body').on('click','.getappointment',function(e) {		
		e.preventDefault(e);
		$('#app_conf_pop_doctor').html('');
		$('#app_conf_pop_date').html('');
		$('#app_conf_pop_time').html('');
		$('#app_conf_pop_institute').html('');
			var did = $(this).attr('data-upchar-did');
			$('#app_conf_pop_doctorid').val(did);
		 $.ajax({
			  type: "POST",
			  //data: {id : menuId},
			  //dataType: "html"
              url: "<?=base_url();?>home/app_conf_pop_doctor?doctor="+did,
              success: function( data ) {
				  $('#app_conf_pop_doctor').html(data);
			  }
            });
		$.ajax({
			  type: "POST",
			 // data: {id : menuId},
			  //dataType: "html"
              url: "<?=base_url();?>home/app_conf_pop_date?doctor="+did,
              success: function( data ) {
				  $('#app_conf_pop_date').html(data);
			  }
            });
			
			
	});
	
	 $('body').on('change','#app_conf_pop_date',function(e) {		
		//e.preventDefault(e);
		$('#app_conf_pop_institute').html('');
			var date = $(this).val();
			var did = $('#app_conf_pop_doctorid').val();
			
		 $.ajax({
			  type: "POST",
              url: "<?=base_url();?>home/app_conf_pop_time?doctor="+did+"&date="+date,
              success: function( data ) {
				  $('#app_conf_pop_time').html(data);
			  }
            });			
	});
	
	$('body').on('change','#app_conf_pop_time',function(e) {		
		//e.preventDefault(e);
			var date = $('#app_conf_pop_date').val();
			var did = $('#app_conf_pop_doctorid').val();
			var time = $('#app_conf_pop_time').val();
			
		 $.ajax({
			  type: "POST",
              url: "<?=base_url();?>home/app_conf_pop_institute?doctor="+did+"&date="+date+"&time="+time,
              success: function( data ) {
				  $('#app_conf_pop_institute').html(data);
			  }
            });			
	}); 
	
	$('body').on('click','#app_conf_otp_submit',function(e) {		
		//e.preventDefault(e);
		var date = $('#app_conf_pop_date').val();
			var did = $('#app_conf_pop_doctorid').val();
			var time = $('#app_conf_pop_time').val();
			var mobile = $('#app_conf_mobile').val();
			var name = $('#app_conf_name').val();
			if(name=='' || mobile=='' || mobile.length<10 ||mobile.length>10 || time==''){
				alert('Please Fill the Form with Valid Details');
			}else{
		//send otp
		  $.ajax({
			  type: "POST",
              url: "<?=base_url();?>home/app_conf_pop_otpgen",
			  data: 'mobile=' + mobile, 
              success: function( data ) {
				  //$('#app_conf_pop_institute').html(data);
			  }
            });	 		
		$('#app_conf_otp').show();
		$('#app_conf_otp_submit').hide();
		$('#app_conf_submit').show();
			
			}
		
	}); 
	
	$('body').on('submit','#app_conf_form',function(e) {		
		e.preventDefault(e);
		var myform=$(this);	
		  $.ajax({
			  url: myform.attr('action'),			
			  data: myform.serialize(),
			  type: "POST",
              //url: "",//?doctor="+did+"&date="+date+"&time="+time,
              success: function( data ) {
				 if(data=='OK')
				 { 
					alert('Appointmetn Success Please Pay the Fee ');
				 }
				 else
					 alert('Failed');
				  //$('#app_conf_pop_institute').html(data);
			  }
            });	 
				
		
	}); 
	
	</script>
 <!--<script src="//code.jquery.com/jquery-1.12.4.js"></script>-->
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
  <script type="text/javascript"> 

        $(function() {
			/* $( "#hint" ).autocomplete({
			  source: [ "c++", "java", "php", "coldfusion", "javascript", "asp", "ruby" ]
			}); */
             $( "#hint" ).autocomplete({
				 minLength: 1,
                source: function( request, response ) {
                    $.ajax({
                        url: "<?=base_url();?>gethint",
                        dataType: "json",
                        data: {
                            q: request.term
                        },
                        success: function( data ) {
                           response( data );
						   /* response( $.map( data.myData, function( item ) {
								return {
									label: item.label,
									value: item.value
								}
							})); */
                        }
                    });
                }/* ,
				select:	function(event,b){ 
					event.preventDefault();
					$(this).val(b.item.label);
					$('#city').val(b.item.value);
					
				} */
            });
			$( "#hintcity" ).autocomplete({
				minLength: 1,
                source: function( request, response ) {
                    $.ajax({
                        url: "<?=base_url();?>gethintcity",
                        dataType: "json",
                        data: {
                            q: request.term
                        },
                        success: function( data ) {
                           // response( data );
							response( $.map( data, function( item ) {
								return {
									label: item.label,
									value: item.value
								}
							}));
                        }
                    });
                },
				select:	function(event,b){ 
					event.preventDefault();
					$(this).val(b.item.label);
					$('#city').val(b.item.value);
					/* document.cookie = "mart=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
					$('#headermart').html('Market');
					$('#headermartm').html('Market');
					setCookie('city', b.item.value , 2);
					$.ajax({
						url: "http://www.mylomart.com/mylomart/martautofill",
						data: {city: b.item.value},
						success: function( data ) {
							if(data!=''){
							$( ".top-mrkt" ).hide();
							$( ".avlbl-mrkt" ).html(data).fadeIn(200);
							
							$('#headercity').html(b.item.label);
							$('#headercitym').html(b.item.label);
							
							}
						}
					}); */
				}
				
				
            }); 
        });     
        </script>
  </body>

</html>

