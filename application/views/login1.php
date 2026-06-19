<head>
    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
</head>
<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->
<?php include ("includes/header.php"); ?>


    <div class="careplus-subheader">

        <div class="careplus-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li><a href="index.html">Homepage</a></li>
                            <li>Login / Sign Up</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="doctor_list">
        
         <div class="container">
            <div class="row">

                   <div class="col-sm-4 col-md-offset-4 box_sh_bg1">

    
<ul class="dis_inli">
    <li class="actives"><a href="<?=base_url('login');?>">Login</a></li>
    <li ><a class="cwhi" href="<?=base_url('signup');?>">Sign up</a></li>
   
  </ul>


                        <div class="col-sm-12 borders">
                            <div class="label_name">
                   <form id='loginform' action='<?=base_url();?>User/login' method='post'>
                                 <span>Mobile Number / Email ID</span>
                                  <input  type="text" name="email" class="form-control" required>
                                   <span>Password</span>
                                  <input  type="Password" name="password" class="form-control" required>
                                    <a href="<?=base_url('forgotpassword');?>" >Forgot password?</a>
      <button type="submit" class="btn  btn-lg common-btn practo-btn"> Login  </button>
	   </form>
	   
       <div class="hr-container">
          <hr class="hr-inline" align="left">
          <span class="hr-text"> or </span>
          <hr class="hr-inline" align="right">
      </div>
       <div>
          <a href="<?=base_url();?>Fbauth" class="btn  btn-lg connect-facebook-btn" id="facebookbtn">
              <span class="facebookIcon">
<i class="fa fa-facebook" aria-hidden="true"></i> Connect with Facebook
              </span>
          
         </a>
		 
		 <a href="<?=base_url();?>Google" class="btn  btn-lg connect-facebook-goole">
              <span class="google">
              <i class="fa fa-google-plus" aria-hidden="true"></i> Connect with Google+
              </span>
           
         </a>
		 

      </div>
         </div>                 
                                
                           

                        </div>

    <!-----

<div class="col-sm-5 col-md-offset-4 borders">
                            <div class="label_name">
                   
                                 <span>Full Name</span>
                                  <input value="Full Name" type="text" name="name" class="form-control">
                                   <span>Mobile Number</span>
                                  <input value="Mobile Number" type="text" name="name" class="form-control">

                                  <span>Create Password</span>
                                  <input value="Mobile Number" type="Password" name="name" class="form-control">
                                  <div class="forget-pasword">
    
      </div>
      <button type="submit" class="btn  btn-lg common-btn practo-btn"> Send OTP
       </button>
     
         </div>                 
                                
                           

                        </div>---->



    
      </div>
                      </div>
                       </div>
    </section>


  


    <?php include ('includes/footer.php'); ?>