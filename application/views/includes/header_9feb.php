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

<header>
    <title>Welcome to Upchaar</title>
<link rel="icon" href="demo_icon.gif" type="image/gif" sizes="16x16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="<?=base_url();?>style_home.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>style_home2.css">
            <link rel="stylesheet" type="text/css" href="<?=base_url();?>media.css">
            <link rel="stylesheet" type="text/css" href="<?=base_url();?>mediauser.css">            
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
/*--madicine model box css--*/
#login-form-link, #register-form-link{color:white;padding: 10px 22%;}
#login-form-link, #register-form-link:hover{text-decoration:none;}
.modelhead{background:#9bc03c;}
#login-submit{background: #9bc03c;color: white;}
  </style>


<div class="container">
<div class="row">
                        <aside class="col-md-3 logocont"><a href="<?=base_url();?>" class="careplus-logo"><img src="<?=base_url();?>images/upchar-logo.png" style="height: 155px;" alt=""></a></aside>

                        <aside class="col-md-9">
                                  <h2 class="sitename"><b>Upchar Online Medical Solutions</b></h2>
                            
                        </aside>

<div class="container text-right menucont" id="headmenu">
  
  <button type="button" class="btn topmenu"><i class="fa fa-home" aria-hidden="true"></i> <a href="<?=base_url();?>" style="color:white;text-decoration:none;">Home</a></button>
  <button type="button" class="btn topmenu" data-target="#madicine"><i class="far fa-handshake"></i><a href="<?=base_url();?>" class="showPartners" style="color:white;text-decoration:none;"> Upchar Partner</a></button>
  <a href="<?=base_url();?>" class=""><button type="button" class="btn topmenu" >Partner Login</button></a>
  <?php if ($this->session->userdata('userid')==''){ ?>
    <button type="button" class="btn topmenu"><i class="fas fa-user"></i> <a href="<?=base_url('login');?>" style="color:white;text-decoration:none;">Login</a> / <i class="fas fa-sign-in-alt"></i><a href="<?=base_url('signup');?>" style="color:white;text-decoration:none;"> Sign Up</a></button>
	<?php } ?>
</div>

<img class="mobileIcon" src="images/menu_icon.png" />


                    
                    </div>

</div>

<!--partner btn popup-->
 <div class="modal fade" id="madicine" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modelhead">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;">Medicine Partner's</h4>
        </div>
        <div class="modal-body">
          

    <div class="container">
      <div class="row">
      <div class="col-md-8">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6" style="background: #9bc03c;padding:12px;color:white;text-align:center;border-right:2px solid white;">
                <a href="#" class="active" id="login-form-link">Login</a>
              </div>
              <div class="col-xs-6" style="background: #9bc03c;padding:12px;color:white;text-align:center;">
                <a href="#" id="register-form-link">Register</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" action="#" method="post" role="form" style="display: block;">
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Remember Me</label>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="text-center">
                          <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <form id="register-form" action="https://phpoll.com/register/process" method="post" role="form" style="display: none;">
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" style="background: #9bc03c;color:white;" value="Register Now">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="background: #9bc03c;color: white;">Close</button>
        </div>
      </div>
    </div>
  </div>
  

<!--Close partner btn popup-->


</header>
<div class="container" id="showBox">
  
        <div class="col-md-12">
                            <div class="careplus-fancy-title">
                                <button class="close">x</button>
                                <h2>Our Partner's</h2>
                                <span><small></small><i class="fas fa-link"></i></span>
                            </div>
                            <div class="careplus-blog careplus-blog-modern">
                                <ul class="row">

                              


                                       <li class="col-md-3" id="tabpopup">
                                        <figure ><a href='<?=base_url();?>hospital-login'><img src="images/Hospital.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                            <!--    <time datetime="2008-02-14 20:00">21 AUG</time>-->
                                        </figure>
                                        <div class="careplus-blog-modern-text text-center">
                                            <h5><a href='<?=base_url();?>hospital-login'>Hospital</a></h5>
                                        </div> 
                                    </li>


                                    <li class="col-md-3" id="tabpopup">
                                        <figure ><a href="blog-detail.php"><img src="images/blog-modern-img3.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                            <!--    <time datetime="2008-02-14 20:00">21 AUG</time>-->
                                        </figure>
                                        <div class="careplus-blog-modern-text text-center">
                                            <h5><a href="blog-detail.php">Pathology</a></h5>
                                        </div>
                                    </li>
                                    <li class="col-md-3" id="tabpopup">
                                      
                                        <figure><a href="blog-detail.php"><img src="images/3d-printed-pharmaceuticals-header_kss.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                           <!--    <time datetime="2008-02-14 20:00">21 AUG</time>-->
                                        </figure>
                                        <div class="careplus-blog-modern-text text-center">
                                            <h5><a href="#" data-toggle="modal" data-target="#madicine">Medicine</a></h5>
                                        </div>
                                    </li>
                                    <li class="col-md-3" id="tabpopup">
                                    
                                        <figure><a href='<?=base_url();?>doctor-login'><img src="images/blog-modern-img2.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
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

<script type="text/javascript">
  $(function() {

    $('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

});

</script>

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

<script> 
$(document).ready(function(){
  $(".mobileIcon").click(function(){
    $("#headmenu").slideToggle("slow");
  });
});
</script>