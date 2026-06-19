<?php
if ($this->session->userdata('userid')!=''){ 
	$userdata['id']=$this->session->userdata('userid');
	$userdata['row']=$this->db->get_where('userlogin',array('USERID'=>$userdata['id']))->row();
	$userdata['email']=$userdata['row']->EMAIL;
	$userdata['mobile']=$userdata['row']->MOBILE;
	$userdata['name']=$userdata['row']->FNAME.' '.$userdata['row']->FNAME;
}
if(current_url() != base_url().'login' && current_url() != base_url().'signup' && current_url() != base_url().'forgotpassword' && current_url() != base_url().'verifymobile' ){
	if($_SERVER['QUERY_STRING'])
$this->session->set_userdata('last_page', current_url().'?'.$_SERVER['QUERY_STRING']);
else
$this->session->set_userdata('last_page', current_url());
//echo "<br><hr><br>";
}
?>
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
    <link href="<?=base_url();?>css/style.css" rel="stylesheet">
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
                                
                            </ul>
                            <a href="<?=base_url('doctor-login');?>" class="careplus-booking-btn careplus-bgcolor-two">Login as Doctor</a>
                             <a href="<?=base_url('hospital-login');?>" class="careplus-booking-btn careplus-bgcolor-two">Login as Hospital</a>
                            
                        </aside>
                    </div>
                </div>
            </div>
            <!--// Main Header \\-->

            <!--// Navigation Section \\-->
            <div class="careplus-navigation-section careplus-bgcolor">
                <div class="container">
                    <div class="row">
                    
                                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                      <ul class="nav navbar-nav">
                                        <li class="active"><a href="<?=base_url();?>">Home</a></li>
                                        <li><a href="https://www.upcharr.com/search?location=&city=&keyword=&spl=">Appointment</a>
                                            <ul class="careplus-dropdown-menu">
                                                                                           
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
                                                            
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <h4>Link 2</h4>
                                                        <ul class="careplus-megalist">
                                                            <li><a href="team-medium.php">Team Medium W/O/S</a></li>
                                                           
                                                            <li><a href="pricing-plan.php">Pricing Plan</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <h4>Link 3</h4>
                                                        <ul class="careplus-megalist">
                                                            <li><a href="gallery.php">Gallery</a></li>
                                                            
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
                                        
										<?php if ($this->session->userdata('userid')!=''){ ?>
										<li class="dropdown" id="user-header">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img src="assets/images/user.jpg" alt="user image" style='width:20px;'>
                                <span class="username"><?=$this->session->userdata('username')?><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="name_mo"> <img src="assets/images/user.jpg" alt="user image"  style='width:20px;'>
                                    <p><?=$this->session->userdata('username')?>
                                        <br/>7080245777</p>
                                </li>
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
                                <li><a href="<?=base_url('User/logout');?>"><span>Logout</span></a></li>
                            </ul>
                        </li>
										<?php } ?>         
                                      </ul>
                                    </div>
                                </nav>
                                <ul class="careplus-user-list">
                                    <li><a href="#" class="careplus-color-two fa fa-search" data-toggle="modal" data-target="#searchmodal"></a></li>
                                   <!--- <li><a href="#" class="careplus-color-two fa fa-shopping-cart">Login / Sign Up</a>
                             <div class="careplus-cart-box"> <p>No products in the cart.</p> </div>
                                    </li>--> 
										<?php if ($this->session->userdata('userid')==''){ ?>
									<div class="login">								
                                        <a href="<?=base_url('login');?>">Login </a>
                                        <a href="<?=base_url('signup');?>">/ Sign Up</a>									
										
										
										
                                    </div>
									<?php } ?>
                                </ul>


<body onload="myFunction()">

<h1>Hello World!</h1>

<script>
function myFunction() {
  alert("appointed will book soon");
}
</script>

</body>


                                       <!-- <div class="careplus-cart-box"> <p>No products in the cart.</p> </div>-->
                                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Navigation Section \\-->

        </header>
       