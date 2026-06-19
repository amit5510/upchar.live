<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<style>

.boxIcon{
    background: #89ab33;
    padding: 15px;
    width: 70px;
    border-radius: 64px;
}
.BOOKBTN {
    background: #000000;
    color: white;
    padding: 4px 29px;
    font-weight: bold;
    float: right;
    box-shadow: 0px -1px #7f9e30;
    border-radius: 23px;
    margin-top: 4px;
}
.closeBTN, .closeBTN2 {
    background: #9bc03c;
    color: white;
    padding: 8px 11px;
    font-size: 16px;
    float: right;
    position: absolute;
    margin-left: 241px;
}
.closeBTN2{
    display:none;
}
.sidenav {
    height: 100%;
    width: 242px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #111;
    padding-top: 20px;
    z-index: 23;
}
.dropdown-menu {
    background:none !important;
}
.dropdown-menu li {
    text-align: center;
    border-bottom: 2px solid #81a030;
    background: #9bc03c;
}
#SidebarPhoto {
    height: 126px;
    border-radius: 83px;
    width: 122px;
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
    .careplus-navigation-section.careplus-bgcolor, .box-form .careplus-fancy-title{
        display:none;
    }



.menutab {
    width:100%;
}
.nav > li > a {
    color:white;
}
.nav > li > a:hover, .nav > li > a:focus {
    background-color: #8bad36 !important;
}

/*-- page media query--*/


</style>


<div class="sidenav">
    
     <a href="#" class="closeBTN2"><i class="fa fa-caret-right" aria-hidden="true"></i></a> <a href="#" class="closeBTN"><i class="fa fa-times" aria-hidden="true"></i></a> 
       
        <?php if ($this->session->userdata('userid')==''){ ?>
   <li><a href="<?=base_url();?>"><i class="fas fa-home iconEffect"></i> Home</a></li>
   
  <li class="showPartners" data-target="#madicine"><a href="<?=base_url();?>"> <i class="fas fa-thumbs-up iconEffect"></i> Upchar Partner</a></li>

          <li>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-handshake iconEffect"></i> Partner Login <span class="caret"></span></a>
        <ul class="dropdown-menu innerList" style="background: none;">
          <li> <a href="<?=base_url();?>hospital-aindex">Hospital</a></li>
          <li> <a href="<?=base_url();?>pathlab-login">Pathology</a></li>
          <li><a href="<?=base_url();?>pathdoctor-login">Pathdoctor</a></li>
          <li><a href="<?=base_url();?>medical-login">Medicine</a></li>
           <li><a href="<?=base_url();?>doctor-aindex">Doctor</a></li>
        </ul>
      </li>
  

 

  <li><a href="<?=base_url('signup');?>"><i class="fas fa-user-plus iconEffect"></i> Sign Up</a>
  </li>
      <li>
          <a href="<?=base_url('login');?>"><i class="fas fa-sign-in-alt iconEffect"></i> Login</a>
          </li>

	<?php }else{ ?>
	
	
	
	<?php $profileimg=$this->db->select('IMAGE')->from('userlogin')->where('USERID',$this->session->userdata('userid'))->get()->row()->IMAGE;
                                            if(!$profileimg)
                                                $profileimg=base_url()."/assets/images/user.jpg";
                                            else
                                                $profileimg=admin_url()."public/assets/upload/".$profileimg;


                                            ?>

			<div class="dropdown" id="user-header" style="width:100%;display: inline-block;padding: 2px;border-radius: 2px 12px;text-align: center;margin-bottom: 8px;">
                           
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img id="SidebarPhoto" src="<?=$profileimg;?>" alt="user image">
                                <h6 class="username" style="color:white;font-weight:bold;"><?=$this->session->userdata('username')?> <i class="fa fa-chevron-down" style="padding:6px 6px;background: #9bc03c;color: white;border-radius: 53px;width: 30px;" aria-hidden="true"></i></h6>
                            </a>
                           
                            <ul class="dropdown-menu">
                                <!--<li class="name_mo"> <img src="assets/images/user.jpg" alt="user image"  style='width:42px;'>
                                    <p>Swati                                        <br/>9990179859</p>
                                </li>-->
                                <li><a href="<?=base_url();?>Home/profile"><span class="UserMenu">My Profile</span></a></li>
                                <li><a href="#"><span class="UserMenu">My Tests</span></a></li>
                                <li><a href="#"><span class="UserMenu">My Medicine Order</span></a></li>
                                <li><a href="#"><span class="UserMenu">My Online Consultation</span></a></li>
                                <li><a href="#"><span class="UserMenu">My Feedback</span></a></li>

                                <li><a href="#"><span class="UserMenu">My Articles</span></a></li>
                                <li><a href="#"><span class="UserMenu">My Payments</span></a></li>

                                <li><a href="#"><span class="UserMenu">View Update Profile</span></a></li>
								  <li><a href="<?=base_url();?>Home/change_password"><span class="UserMenu">Change Password</span></a></li>
                                <li><a href="#"><span class="UserMenu">Setting</span></a></li>
                                <li><a href="<?=base_url();?>User/logout"><span class="UserMenu">Logout</span></a></li>
                            </ul>

                      </div>

	<?php } ?>
  

   <div class="sidebar">
            <div class="sidebar-inner">
          <ul class="nav nav-sidebar">
              <li class="menutab"><a href="<?=base_url();?>myappointents"><i class="fa fa-calendar" aria-hidden="true" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Appointment History</span> </a> </li>
            <li class="menutab"><a href="index.php"><i class="icon-home" style="font-size: 24px;"></i><span style="padding: 9px 19px;font-weight:bold;">Dashboard</span></a></li>
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



<script> 
$(document).ready(function(){
  $(".closeBTN").click(function(){
    $(".sidenav").animate({left: '-242px'});
     $(".closeBTN").hide();
      $(".closeBTN2").show();
  });
});

$(document).ready(function(){
  $(".closeBTN2").click(function(){
    $(".sidenav").animate({left: '0px'});
     $(".closeBTN2").hide();
      $(".closeBTN").show();
  });
});
</script>