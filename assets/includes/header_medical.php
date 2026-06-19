
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">

    <title>Medical Panel | Upchar</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
     <link href="<?=base_url();?>assets/css/cstm.css" rel="stylesheet">

    <link href="<?=base_url();?>assets/css/theme.css" rel="stylesheet">
	   <link href="<?=base_url();?>assets/css/responsive.css" rel="stylesheet"> 
    <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/font-awesome.css" rel="stylesheet">
	    <link href="<?=base_url();?>assets/css/dummy.css" rel="stylesheet">
	   <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
<style>
.navbar-toggle {
    position: relative;
    float: right;
    padding: 9px 10px;
    margin-top: -37px;
    margin-right: 15px;
    margin-bottom: 8px;
    background-color: transparent;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}

.navbar-nav>li>a {
    margin-top: -44px;
    padding: 6px 9px;
    background: black;
    border-radius: 0px 12px;
    float:right;
}

.nav>li>a:focus, .nav>li>a:hover {
    text-decoration: none;
    background-color: #0b171d;
    border-radius:0px 12px;
}

.topmenu {
    font-size: 14px;
    text-transform: uppercase;
    position: relative;
    transition: 0.7s;
    background: #ed3237;
    font-weight: bold;
    letter-spacing: 1px;
    color: #ffffff;
    border-radius: 4px;
    margin-right:3px;
}
.dropdown-menu>li>a {
    display: block;
    padding: 8px 18px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: white;
    white-space: nowrap;
    background: #224558;
    margin-top: 1px;
    font-weight: bold;
    text-align: center;
    border-radius: 0px 12px;
}

.mynavback{background:none;}


@media screen and (max-width: 767px) {
 
  .navbar-nav {
    margin: 27.5px 4px;
}


  }
  
  
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
.menutab{
    margin-left: 208px;
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





.topbar .header-right .header-menu #user-header .dropdown-menu li a {
    background: #224152;
    color: white;
    display: block;
    font-size: 13px;
    padding: 8px 7px;
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
                        <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
                    </div>
                    
                </div>
                
                 
                       	
                       	 
                <h3 style="text-shadow: 0px -4px 3px black;color:white;margin-left:79px;"> <?=$this->session->userdata('medicalusername');?></h3>
                
             
  
    
                
                <!-- header-right -->


<nav class="navbar mynavback">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar" style="background:white;"></span>
        <span class="icon-bar" style="background:white;"></span>
        <span class="icon-bar" style="background:white;"></span>                        
      </button>
    
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    
      <ul class="nav navbar-nav navbar-right">
        
      <li>
          <ul class="header-menu nav navbar-nav">
                        <!-- BEGIN USER DROPDOWN -->
                        <!--<li class="dropdown" id="user-header">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="username">For Clients And Hospitals.. <i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span>Software For Clients</span></a></li>
                                <li><a href="#"><span>Software For Hospitals</span></a></li>
                                <li><a href="#"><span>Advertising</span></a></li>
                                <li><a href="#"><span>List Your Practice For Free</a></li>
                            </ul>
                        </li>-->

                      <?php $profileimg=$this->db->select('drimage')->from('profile_chem')->where('id',$this->session->userdata('medicaluserid'))->get()->row()->drimage;
                                            if(!$profileimg)
                                                $profileimg=base_url()."/assets/images/user.jpg";
                                            else
                                                $profileimg=admin_url()."public/assets/upload/".$profileimg;


                                            ?>


                        <li class="dropdown" id="user-header">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img id="userimgcss" src="<?=$profileimg;?>" alt="user image">
                                <span class="username" style="color:white;"><?=$this->session->userdata('medicalusername');?><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                            </a>
                            <ul class="dropdown-menu" style="background:none;box-shadow:none;border:none;">
                               
                                <li ><a class="menutab" href="<?=base_url();?>medicalpanel/updateprofile">My Profile </a></li>

                                <li><a class="menutab" href="#"><span>My Tests</span></a></li>
                                <li><a class="menutab" href="#"><span>My Medicine Order</span></a></li>
                                <li><a class="menutab" href="#"><span>My Online Consultation</span></a></li>
                                <li><a class="menutab" href="#"><span>My Feedback</span></a></li>

                               
                                <li><a class="menutab" href="#"><span>My Payments</span></a></li>

                               <li ><a class="menutab" href="<?=base_url();?>medicalpanel/updateprofile">Update Profile </a></li>
						<li><a class="menutab" href="<?=base_url();?>medicalpanel/change_password"><span>Change Password</span></a></li>
                                <li><a class="menutab" href="#"><span>Setting</span></a></li>
                                <li><a class="menutab" href="<?=base_url();?>medicaluser/logout"><span>Logout</span></a></li>
                              
                            </ul>
                        </li>
      </ul>
    </div>
  </div>
</nav>

                
                
            </div>
            <!-- END TOPBAR -->
            <!-- BEGIN PAGE CONTENT -->

