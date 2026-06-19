<?php
if ($this->session->userdata('userid')!=''){
	$userdata['id']=$this->session->userdata('userid');
	$userdata['row']=$this->db->get_where('userlogin',array('USERID'=>$userdata['id']))->row();
	$userdata['email']=$userdata['row']->EMAIL;
	$userdata['mobile']=$userdata['row']->MOBILE;
	$userdata['name']=$userdata['row']->FNAME.' '.$userdata['row']->LNAME;
}
if(
		current_url() != base_url().'login' &&
		current_url() != base_url().'signup' &&
		current_url() != base_url().'forgotpassword' &&
		current_url() != base_url().'verifymobile' &&

		current_url() != base_url().'doctor-login' &&
		current_url() != base_url().'doctor-signup' &&
		current_url() != base_url().'doctor-forgotpassword' &&
		current_url() != base_url().'doctor-verifymobile' &&

		current_url() != base_url().'hospital-login' &&
		current_url() != base_url().'hospital-signup' &&
		current_url() != base_url().'hospital-forgotpassword' &&
		current_url() != base_url().'hospital-verifymobile'
   ){
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
    
	<?php 
	$meta_rec = getMeta();
	if( array_key_exists('dynamic_meta',$meta_rec) && @is_array($meta_array) && !empty($meta_array) )
	{
		if(  array_key_exists('meta_title',$meta_array) && $meta_array['meta_title']!='')
		{
			echo '<title>'.$meta_array['meta_title'].'</title>';
		}
		if( array_key_exists('meta_description',$meta_array) && $meta_array['meta_description']!='')
		{
			echo '<meta name="description" content="'.$meta_array['meta_description'].'" />';
		}
		if( array_key_exists('meta_keyword',$meta_array) && $meta_array['meta_keyword']!='')
		{
		   echo '<meta  name="keywords" content="'.$meta_array['meta_keyword'].'" />';
		}
		
	}else
	{   
	?>
	<title><?php echo $meta_rec['meta_title'];?> </title>
	<meta name="description" content="<?php echo $meta_rec['meta_description'];?>" />
	<meta  name="keywords" content="<?php echo $meta_rec['meta_keyword'];?>" />
	<?php
	}
	?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
   <link href="<?=base_url();?>css/datepicker.css" rel="stylesheet">
    <link href="<?=base_url();?>css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url();?>css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url();?>css/flaticon.css" rel="stylesheet">
    <link href="<?=base_url();?>css/slick-slider.css" rel="stylesheet">
    <link href="<?=base_url();?>css/fancybox.css" rel="stylesheet">
     <link href="<?=base_url();?>css/coustm.css" rel="stylesheet">
    <link href="<?=base_url();?>style_home.css" rel="stylesheet">
    <link href="<?=base_url();?>css/color.css" rel="stylesheet">
    <!--<link href="<?=base_url();?>css/style.css" rel="stylesheet">-->
    <link href="<?=base_url();?>css/responsive.css" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
     <style type="text/css">
   #upchar_logo {
    height: 122px;
    margin: 4px 17px 11px 52px;
}
header {
    background-image: linear-gradient(#08364b, #2777a0, #08364b);
}
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
.careplus-user-list li {

    margin: 15px 0px 0px -11px!important;

}

.innerList li a {
    color: white;
    font-weight: bold;
    background: #9abf3c;
    padding: 12px 50px;
}

.mobileIcon{display:none;}

.nav > li > a:hover{
    color:white;
}

.iconEffect {
    padding: 7px;
    border-radius: 20px;
    margin-right: 2px;
    transition:0.2s;
    transition-timing-function: ease-in;
}
.navbar-nav > li:hover .iconEffect{
   transform: scale(1.3, 1.3);
}
.navbar-nav > li:hover {
    box-shadow: 0px -4px 5px black;
    transition:0.8s;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-menu li a {
    font-weight: bold;
}
.dropdown-menu li {
    text-align: center;
    border-bottom: 2px solid #0a364a;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 158px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 9;
    text-align: center;
}

.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    background: #043d5b;
}
.dropdown-content a:hover {
    background-color: #073146;
    color: white;
    font-weight: bold;
    transform: scale(1.2, 1.2);
    transition: 0.6s;
}


.dropdown-content a:active .dropdown-content a{background:red;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #073146;color:white;}

.mynavback {
    background: none!important;
}
#boxdiv {
    margin-bottom: 31px!important;
}


.popboxdesign{
     float: left;
    width: 100%;
    height: 87px!important;
}
.popboxdesign2{
     float: left;
    width: 100%;
    height: 88px;
}
.topmenupartner {
    font-size: 14px;
    text-transform: uppercase;
    position: relative;
    transition: 0.7s;
    background: #043d5b;
    font-weight: bold;
    letter-spacing: 1px;
    border-radius: 4px;
    padding: 14px 15px;
    color: white;
}
.slogan {
    color: white;
    font-size: 22px;
    letter-spacing: 5px;
    font-weight: bold;
    text-shadow: 0px -3px #7d7676;
}
#userprofileimages{
    width:43px;height:43px;border-radius: 20px;transition:0.4s;margin-right: 7px;
}
#userprofileimages:hover{
   transform: scale(1.2, 1.2);
}


@media screen and (max-width: 768px) {
#headmenu {
    width: 289px;
    z-index: 9;
    float: right;
    position: absolute;
    right: 0px;
    margin-top: 151px;
    display:none;

}

#showBox {
    height: 1080px;
    width: 51%;
    margin: 3px 65px;
    background: white;
}

.navbar {
    width: 239px;
    z-index: 9;
    float: right;
    position: absolute;
    right: 0px;
    margin-top: 54px;
    display: none;
    text-align: center;
}

.mobileIcon {
    height: 45px;
    float: right;
    position: relative;
    display:block;
    cursor:pointer;
    right:8px;
    background:white;
    border-radius:9px;
}
.topmenu {
    padding: 14px 15px!important;
    width: 263px;
    margin: 3px;
    box-shadow: 0px -2px 10px 0px black;
}

.careplus-logo {
    width: auto;
    text-align:center;
}

}



@media screen and (max-width: 614px) {
.slogan {
    color: white;
    font-size: 16px;
    font-weight: bold;
    text-shadow: 0px -3px #7d7676;
    float: right;
    margin-right: 8%;
}

#showBox {
    left: -55px;
    height: 1215px;
    margin-top: 9px;
}
.topmenu {
    padding: 14px 15px!important;
    width: 238px;
    margin: 2px;
}
.sitename {
    font-family: verdana;
    color: white;
    text-shadow: 0px -2px 4px #245a73;
    text-align: center;
    font-size: 28px;
}
.slogan {
    color: white;
    font-size: 16px;
    font-weight: bold;
    text-shadow: 0px -3px #7d7676;
    float: right;
    letter-spacing:1px;
    text-align:center;
}
.input-group {
    margin-bottom: 0px;
    box-shadow: 1px -3px 12px #295771;
    border-radius: 7px;
}
}
@media screen and (max-width: 614px) {
    .sitename {
    font-family: verdana;
    color: white;
    text-shadow: 0px -2px 4px #245a73;
    text-align: center;
    font-size: 31px;
    letter-spacing: 10px;
    float: left;
}
.slogan {
    font-size: 12px;
    float: right;
    letter-spacing: 1px;
    margin-right: 39px;
}
}


@media screen and (max-width: 414px){
#showBox {
    left: -60px;
    height: 1212px;
    width: 97.2%;
    background: white;
}

}
  </style>


    
    
  </head>
  
      
 <body>
     <header>
<div class="container">
<div class="row">

                        <aside class="col-md-3 logocont"><a href="<?=base_url();?>" class="careplus-logo"><img id="upchar_logo" src="<?=base_url();?>images/Final_logo23.png" alt=""></a></aside>

                        <aside class="col-md-9" id="HeadMobile">
                                  <h2 class="sitename"><b>UPCHAR</b></h2>
                                  <h6 class="slogan">one place of your healthcare</h6>
                            
                        </aside>



<nav class="navbar">

    
    <ul class="nav navbar-nav navbar-right">
        
        <?php if ($this->session->userdata('userid')==''){ ?>
   <li><a href="<?=base_url();?>"><i class="fas fa-home iconEffect"></i> Home</a></li>
   
  <li class="showPartners" data-target="#madicine"><a href="<?=base_url();?>"> <i class="fas fa-thumbs-up iconEffect"></i> Upchar Partner</a></li>

          <li>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-handshake iconEffect"></i> Partner Login <span class="caret"></span></a>
        <ul class="dropdown-menu innerList" style="background: none;">
          <li> <a href="<?=base_url();?>hospital-aindex">Hospital</a></li>
          <li> <a href="<?=base_url();?>pathlab-login">Pathology</a></li>
         <!-- <li><a href="<?=base_url();?>pathdoctor-login">Pathdoctor</a></li>
          <li><a href="<?=base_url();?>medical-login">Medicine</a></li>-->
           <li><a href="<?=base_url();?>doctor-aindex">Doctor</a></li>
        </ul>
      </li>
  

 

  <li>
  <a href="https://upcharrnews.blogspot.com/" target="_blank"><i class="fas fa-newspaper iconEffect"></i> Blog</a>
  </li>
      <li>
          <a href="<?=base_url('login');?>"><i class="fa fa-sign-in iconEffect" aria-hidden="true"></i> Login / <i class="fas fa-user-plus iconEffect"></i> Sign Up </a>
          </li>

	<?php }else{ ?>
	
	
	
	<?php $profileimg=$this->db->select('IMAGE')->from('userlogin')->where('USERID',$this->session->userdata('userid'))->get()->row()->IMAGE;
                                            if(!$profileimg)
                                                $profileimg=base_url()."/assets/images/user.jpg";
                                            else
                                                $profileimg=admin_url()."public/assets/upload/".$profileimg;


                                            ?>

			<div class="dropdown" id="user-header" style="width:189px;display: inline-block;padding: 2px;border-radius: 2px 12px;background: #043d5b;">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img id="userprofileimages" src="<?=$profileimg;?>" alt="user image">
                                <span class="username" style="color:white;font-weight:bold;"><?=$this->session->userdata('username')?> <i class="fa fa-chevron-down" style="border: 2px solid #043d5b;padding: 15px 7px;background: #043d5b;color: white;" aria-hidden="true"></i></span>
                            </a>
                            <ul class="dropdown-menu" style="background:#043d5b;">
                                <!--<li class="name_mo"> <img src="assets/images/user.jpg" alt="user image"  style='width:42px;'>
                                    <p>Swati                                        <br/>9990179859</p>
                                </li>-->
                                <li><a href="<?=base_url();?>Home/profile"><span class="UserMenu">My Profile</span></a></li>
                                <li><a href="<?=base_url();?>Home/mytest"><span class="UserMenu">Lab Tests</span></a></li>
             //<!--                   <li><a href="#"><span class="UserMenu">My Medicine Order</span></a></li>
                                <li><a href="#"><span class="UserMenu">My Online Consultation</span></a></li>
                                <li><a href="#"><span class="UserMenu">My Feedback</span></a></li>
                                <li><a href="#"><span class="UserMenu">My Articles</span></a></li>
                                <li><a href="#"><span class="UserMenu">My Payments</span></a></li>
 Header \\-->                          <li><a href="#"><span class="UserMenu">View Update Profile</span></a></li>
								  <li><a href="<?=base_url();?>Home/change_password"><span class="UserMenu">Change Password</span></a></li>
                                <li><a href="#"><span class="UserMenu">Setting</span></a></li>
                                <li><a href="<?=base_url();?>User/logout"><span class="UserMenu">Logout</span></a></li>
                            </ul>

                      </div>

	<?php } ?>
    </ul>
  
</nav>



                    </div>

</div>
</header>
<img class="mobileIcon" src="images/menu_icon.png" />

<div class="container" id="showBox" style="height: auto; width: 733px;border-radius: 5px;">

        <div class="col-md-12" style="background:white;padding:30px 44px;">
                            <div class="careplus-fancy-title" id="boxdiv">
                                <button class="close">x</button>
                                <h2>Our Partner's</h2>
                                <span><small></small><i class="fas fa-link"></i></span>
                            </div>
                            <div class="careplus-blog careplus-blog-modern">
                                <ul class="row">




                                       <li class="col-md-3" id="tabpopup">

                                        <figure class="popboxdesign"><a href='<?=base_url();?>hospitals'><img class="popboxdesign" src="<?=base_url();?>images/Hospital.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                            <!--    <time datetime="2008-02-14 20:00">21 AUG</time>-->
                                        </figure>
                                        <div class="careplus-blog-modern-text text-center">
                                            <h6><a href='<?=base_url();?>hospitals'>Hospital</a></h6>
                                        </div>

                                    </li>


                                    <li class="col-md-3" id="tabpopup">

                                        <figure class="popboxdesign"><a href="blog-detail.php"><img class="popboxdesign" src="<?=base_url();?>images/blog-modern-img3.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                            <!--    <time datetime="2008-02-14 20:00">21 AUG</time>-->
                                        </figure>
                                        <div class="careplus-blog-modern-text text-center">
                                            <h6><a href="blog-detail.php">Pathology</a></h6>
                                       </div>
                                    </li>
                                    <li class="col-md-3" id="tabpopup">

                                        <figure class="popboxdesign"><a href="blog-detail.php"><img class="popboxdesign" src="<?=base_url();?>images/3d-printed-pharmaceuticals-header_kss.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                           <!--    <time datetime="2008-02-14 20:00">21 AUG</time>-->
                                        </figure>
                                        <div class="careplus-blog-modern-text text-center">
                                            <h6><a href="#" data-toggle="modal" data-target="#madicine">Medicine</a></h6>

                                        </div>
                                    </li>
                                    <li class="col-md-3" id="tabpopup">

                                        <figure class="popboxdesign"> <a href='<?=base_url();?>doctors'><img class="popboxdesign" class="popboxdesign" src="<?=base_url();?>images/blog-modern-img2.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                          <!--    <time datetime="2008-02-14 20:00">21 AUG</time>-->
                                        </figure>
                                          <div class="careplus-blog-modern-text text-center">
                                            <h6><a href='<?=base_url();?>doctors'>Doctor</a></h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>


</div>





<script>
$(document).ready(function() {
        $("#showBox").hide();
    $(".showPartners").on("mouseenter", function() {
        $("#showBox").show();
    })
    $(".showPartners").on("mouseleave", function() {
        $("#showBox").hide();
    })
    $('#showBox').on("mouseleave", function() {
        $(this).hide();
    });

    $(".close").click(function(){
    $("#showBox").css("display", "none");

  });

     $("#showBox").on("mouseenter", function() {
        $("#showBox").show();
    })
});

</script>


<script> 
$(document).ready(function(){
  $(".mobileIcon").click(function(){
    $(".navbar").slideToggle("slow");
  });
});

</script>


    
</body>
