
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">

    <title>Doctor Panel | Upchar</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
     <link href="<?=base_url();?>assets/css/cstm.css" rel="stylesheet">
	<link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/theme.css" rel="stylesheet">
	   <link href="<?=base_url();?>assets/css/responsive.css" rel="stylesheet"> 
    <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/font-awesome.css" rel="stylesheet">
	    <link href="<?=base_url();?>assets/css/dummy.css" rel="stylesheet">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
.dropdown-menu>li>a {
    display: block;
    padding: 8px 18px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: white;
    white-space: nowrap;
    background:#224558;
    margin-top: 1px;
    font-weight: bold;
    text-align: center;
    border-radius: 0px 12px;
}


.mobileIcon {
    display: none;
}
#desktopview{margin-top: 11px;}

 @media screen and (max-width: 614px){
.mobileIcon {
    height: 40px;
    float: right;
    position: relative;
    display: block;
    cursor: pointer;
    border-radius: 23px;
    background: white;
    margin: -40px 13px;
}
.sitename {
    font-family: verdana;
    color: white;
    text-shadow: 2px -3px 5px #245a73;
    font-size: 22px;
    margin-top: 13px;
}
#mobileuser{
        margin: -2px 235px !important;
}

.topbar .header-right .header-menu.navbar-nav {
    float: left !important;
    margin: 0;
    width: 196px;
    margin-top: 49px;
}
#desktopview {
    margin-top: 49px;
    display:none;

}

.topbar .header-right .header-menu #user-header {
    width: auto;
    margin: -31px -19px;
}

.topbar .header-right .header-menu #user-header .dropdown-menu {
    width: 150px !important;
    margin: 0px 35px;
}



}
</style>
</head>

<body class="sidebar-light fixed-topbar theme-sltl bg-light-dark color-default dashboard">

<!---------------------------------------practice_suggestion_hospital_step6 modal open--------------------------------------------->
<div class="hover_bkgr_fricc">
    <span class="helper"></span>
    <div>
        <div class="prc_sugg"><p>Claim Clinic</p></div>
		<div class="prce_suge_useranme"><p>Are you sure you want to claim profile named as "Gayatri Nursing Home Pvt. Ltd."?</p></div>
		<div class="prce_suge"><p><b>Note:</b> Request you to provide the proof of clinic ownership to ascertain your credentials.</p></div>
		<a href="#" class="Pra_sug">Cancel</a>
				<a href="#" class="Pra_sug_clai">Claim Clinic</a>
		
       
    </div>
</div>

<!---------------------------------------practice_suggestion_hospital_step6 modal close--------------------------------------------->
<div class="hover_bkgr_fricc_practics">
    <span class="helper"></span>
    <div>
        <div class="prc_sugg"><p></p></div>
		<div class="prce_suge_useranme"></div>
		<div class="prce_suge"><p><b>Note:</b> Request you to provide the proof of clinic ownership to ascertain your credentials.</p></div>
		<a href="#" class="Pra_sug">Cancel</a>
				<a href="#" class="Pra_sug_clai">Claim Clinic</a>
		
       
    </div>
</div>
<!---------------------------------------practice_start modal close--------------------------------------------->

    <section>
        <!-- BEGIN SIDEBAR -->
       
        <!-- END SIDEBAR -->
        <div class="main-content">
            <!-- BEGIN TOPBAR -->

		
		
			
            <div class="topbar">
			
                <div class="header-left">
                    <div class="topnav">
                        <a class="MENUTOGGLE" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
                    </div>
                </div>
                
                       <div class="sitenameadjeust">
                    <h3 class="sitename"><b>UPCHAR</b></h3>
                       <p class="slowgon">One Place of Your Healthcare</p>
            
</div>
                       	 
                       		<img class="mobileIcon" src="images/menu_icon.png" />
                <div class="header-right">	
				
			 <?php $profileimg=$this->db->select('drimage')->from('profile_dr')->where('user_id',$this->session->userdata('druserid'))->get()->row()->drimage;
                                            if(!$profileimg)
                                                $profileimg=base_url()."/assets/images/user.jpg";
                                            else
                                                $profileimg=admin_url()."public/assets/upload/".$profileimg;


                                            ?>
	
                    <ul class="header-menu nav navbar-nav" id="desktopview">
                        <!-- BEGIN USER DROPDOWN -->
                        
                        <li class="dropdown" id="user-header">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img id="userimgcss" src="<?=$profileimg;?>" alt="user image">
                                <span class="username" style="color:white;">Dr&nbsp; <?=$this->session->userdata('drusername');?><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                               
                                <!--
                                <li class="name_mo"> <img src="assets/images/user.jpg" alt="user image">
                                    <p><?=$this->session->userdata('drusername');?><?=$this->session->userdata('druserlname');?>
                                       <br/>9990179859</p>
                                </li>
                                -->
                                <li ><a href="<?=base_url();?>profile_step1">My Profile </a></li>

                               <!--   <li><a href="#"><span>My Tests</span></a></li>
                                <li><a href="#"><span>My Medicine Order</span></a></li>
                              <li><a href="#"><span>My Online Consultation</span></a></li>
                                <li><a href="#"><span>My Feedback</span></a></li>

                                <li><a href="#"><span>My Articles</span></a></li>-->
                                <li><a href="#"><span>My Payments</span></a></li>

                                <li ><a href="<?=base_url();?>profile_step1">Update Profile </a></li>
                                    <li><a href="#"><span>About</span></a></li>
								  <li><a href="<?=base_url();?>doctorpanel/change_password/"><span>Change Password</span></a></li>
                                <li><a href="#"><span>Setting</span></a></li>
                                <li><a href="<?=base_url();?>doctoruser/logout"><span>Logout</span></a></li>
                               <!-- <li><a href="#"><span>Switch Your Provider <br/>Products</span></a></li>-->
                            </ul>
                        </li>
                        
                        
                        
                        <!-- END USER DROPDOWN -->
                        <!-- CHAT BAR ICON -->

                    </ul>
                </div>
                
                
                  
                <!-- header-right -->
            </div>
            <!-- END TOPBAR -->
            <!-- BEGIN PAGE CONTENT -->
            
            
            
<script> 
$(document).ready(function(){
  $(".mobileIcon").click(function(){
    $("#desktopview").slideToggle();
  });
});
</script>