
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">

    <title>Path Doctor Panel | Upchar</title>
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
    right: 8px;
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
    margin-right: 7px;
    margin-top: 2px;
    width: 113%;
    
}
#mobileuser{
    
}
.topbar .header-right .header-menu #user-header .dropdown-menu {
    width: 150px !important;
    margin: -265px 230px;
    
}
.topbar .header-right .header-menu #user-header .dropdown-menu li a {
    background: #043d5b;
    display: block;
    font-size: 13px;
    padding: 8px 7px;
    margin: 1px;
    color: white;
    height: 34px;
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
                
                        <h2 class="sitename"><b>UPCHAR</b></h2>
                         <h6 class="slogan">one place of your healthcare</h6>
                            <img class="mobileIcon" src="images/menu_icon.png" />
                <div class="header-right">  
                
             <?php $profileimg=$this->db->select('drimage')->from('pathdoctor')->where('user_id',$this->session->userdata('druserid'))->get()->row()->drimage;
                                            if(!$profileimg)
                                                $profileimg=base_url()."/assets/images/user.jpg";
                                            else
                                                $profileimg=admin_url()."public/assets/upload/".$profileimg;


                                            ?>
    
                    <ul class="header-menu nav navbar-nav" id="desktopview">
                        <!-- BEGIN USER DROPDOWN -->
                        
                        <li class="dropdown" id="user-header">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img src="<?=$profileimg;?>" alt="user image">
                                <span class="username">Dr&nbsp; <?=$this->session->userdata('drusername');?><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                               
                                <!--
                                <li class="name_mo"> <img src="assets/images/user.jpg" alt="user image">
                                    <p><?=$this->session->userdata('drusername');?>
                                       <br/>9990179859</p>
                                </li>
                                -->
                                <li ><a href="<?=base_url();?>profile_step11">My Profile </a></li>

                                <li><a href="#"><span>My Tests</span></a></li>
                                <li><a href="#"><span>My Medicine Order</span></a></li>
                              <!--  <li><a href="#"><span>My Online Consultation</span></a></li>
                                <li><a href="#"><span>My Feedback</span></a></li>

                                <li><a href="#"><span>My Articles</span></a></li>-->
                                <li><a href="#"><span>My Payments</span></a></li>

                                <li ><a href="<?=base_url();?>profile_step11">Update Profile </a></li>
                                    <li><a href="#"><span>About</span></a></li>
                                  <li><a href="<?=base_url();?>pathdoctorpanel/change_password/"><span>Change Password</span></a></li>
                                <li><a href="#"><span>Setting</span></a></li>
                                <li><a href="<?=base_url();?>pathdoctoruser/logout"><span>Logout</span></a></li>
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