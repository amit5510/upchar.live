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
  <style type="text/css"> 
  .login {   padding: 5px 20px;    margin-top: 0px;    color: #333;}
.login:hover{background: #76af37;color: #fff;}

 .cart {   padding: 5px 20px;    margin-top: 0px;  float:right;  color: #333;}
.cart:hover{background: #76af37;color: #fff;}


.navbar-nav > li { padding: 0px 26px 0px 12px!important; }
.careplus-user-list li {
  
    margin: 15px 0px 0px -11px!important;
 
}
.topcart{
    margin-left:30px;
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
                        <aside class="col-md-3"><i class="careplus-bgcolor-two fa fa-mobile"></i>
                                    <span>7080245777</span> 
                            <i class="careplus-bgcolor-two fa fa-envelope"></i>
                                    <a href="mailto:yourdomain@name.com">hello@upchaar.com</a>
                           				
                        </aside>
                        <aside class="col-md-6">   </aside>
                        <aside class="col-md-3">
                            
                            
                            	<?php if ($this->session->userdata('userid')==''){ ?>
									<div class="login pull-right">
									     
				
                                        <a href="<?=base_url('login');?>">Login </a>
                                        <a href="<?=base_url('signup');?>">/ Sign Up</a>	
										
                                    </div>
                                   
                                    	<div class="cart">
                                        <a href="<?=base_url('cart');?>" class="topcart"><i class="fa fa-shopping-cart"></i> Cart </a>
                                    </div>
									<?php } ?>
                               </aside>
                    </div>
                </div>
            </div>
            <!--// Main Header \\-->

            <!--// Navigation Section \\-->
            <div class="careplus-navigation-section careplus-bgcolor">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3"> <a href="<?=base_url();?>" class="careplus-logo"><img src="<?=base_url();?>images/logo.png" alt=""></a></div>
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
                                          
                                        <li><a href="<?=base_url();?>">Doctors Appointment</a></li>
                                        <li><a href="<?=base_url();?>">Medicines</a></li>
                                        <li><a href="<?=base_url();?>">Diagnostic Lab/Test</a></li>
                                        <li><a href="<?=base_url();?>">Ambulance</a></li>
									    <li><a href='<?=base_url();?>doctor-login'><button type='button' class='btn btn-primary btn-xs'>Login as Doctor</button></a></li>
								<a href='<?=base_url();?>hospital-login'><button type='button' class='btn btn-primary  btn-xs'>Login as Hospital</button></a></li>
                                      </ul>
                                    </div>
                                </nav>
                                
                                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Navigation Section \\-->

        </header>
       