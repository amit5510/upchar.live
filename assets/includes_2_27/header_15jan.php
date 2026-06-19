    <!-- Header Main-->
    <header>
    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="<?=base_url();?>style_home.css">
  <style type="text/css">
     .login
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
<div class="container">
<div class="row">

<title>|| Welcome to Upchar ||</title>
                        <aside class="col-md-3 logocont"><a href="<?=base_url();?>" class="careplus-logo"><img src="<?=base_url();?>images/upchar-logo.png" style="height: 155px;" alt=""></a></aside>

                        <aside class="col-md-9">
                                  <h2 class="sitename"><b>Upchar Online Medical Solutions</b></h2>
                            
                        </aside>

<div class="container text-right menucont">
  
  <button type="button" class="btn topmenu"><i class="fas fa-calendar-alt"> </i> <a href="<?=base_url();?>">Appointment</a></button>
  <button type="button" class="btn topmenu"><i class="far fa-handshake"></i><a href="<?=base_url();?>"> Upchar Partner</a></button>
  <a href="<?=base_url();?>" class="showPartners"><button type="button" class="btn topmenu">Partner</button></a>
  <?php if ($this->session->userdata('userid')==''){ ?>
    <button type="button" class="btn topmenu"><i class="fas fa-user"></i> <a href="<?=base_url('login');?>">Login</a> / <i class="fas fa-sign-in-alt"></i><a href="<?=base_url('signup');?>"> Sign Up</a></button>
	<?php }else{ ?>
			<div class="dropdown" id="user-header" style="width:100px;    display: inline-block;">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img src="assets/images/user.jpg" alt="user image" style='width:20px;'>
                                <span class="username"><?=$this->session->userdata('username')?><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
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
	
	<?php } ?>
</div>


                    
                    </div>

</div>

</header>
<div class="container" id="showBox">
  <div class="row">
    <div class="col-md-12">
     
        <div class="col-md-12">
                            <div class="careplus-fancy-title">
                                <button class="close">x</button>
                                <h2>Our Partner's</h2>
                                <span><small></small><i class="fas fa-link"></i></span>
                            </div>
                            <div class="careplus-blog careplus-blog-modern">
                                <ul class="row">

                              


                                        <li class="col-md-3">
                                        <figure ><a href='<?=base_url();?>hospital-login'><img src="<?=base_url();?>images/Hospital.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                            <!--    <time datetime="2008-02-14 20:00">21 AUG</time>-->
                                        </figure>
                                        <div class="careplus-blog-modern-text text-center">
                                            <h5><a href='<?=base_url();?>hospital-login'>Hospital</a></h5>
                                        </div> 
                                    </li>


                                    <li class="col-md-3">
                                        <figure ><a href="blog-detail.php"><img src="<?=base_url();?>images/blog-modern-img3.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                            <!--    <time datetime="2008-02-14 20:00">21 AUG</time>-->
                                        </figure>
                                        <div class="careplus-blog-modern-text text-center">
                                            <h5><a href="blog-detail.php">Pathology</a></h5>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                      
                                        <figure><a href="blog-detail.php"><img src="<?=base_url();?>images/3d-printed-pharmaceuticals-header_kss.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                           <!--    <time datetime="2008-02-14 20:00">21 AUG</time>-->
                                        </figure>
                                        <div class="careplus-blog-modern-text text-center">
                                            <h5><a href="blog-detail.php">Madican</a></h5>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                    
                                        <figure><a href='<?=base_url();?>doctor-login'><img src="<?=base_url();?>images/blog-modern-img2.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                          <!--    <time datetime="2008-02-14 20:00">21 AUG</time>-->
                                        </figure>
                                          <div class="careplus-blog-modern-text text-center">
                                            <h5><a href='<?=base_url();?>doctor-login'>Doctor</a></h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

    </div>
  </div>
</div>




<script>
$(document).ready(function() {
        $("#showBox").hide();
    $(".showPartners").on("mouseenter", function() {
        $("#showBox").show();
    })
    $('#showBox').on("mouseleave", function() {
        $("#showBox").hide();
    });

    $(".close").click(function(){
    $("#showBox").css("display", "none");
    
  });

     $("#showBox").on("mouseenter", function() {
        $("#showBox").show();
    })
});

</script>
