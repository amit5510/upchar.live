<head>
    <link rel="icon" href="images/logo.png" type="images/logo.png" sizes="32x32">
</head>

<?php include ("includes/header_new.php"); ?>
<style>
.form-group {
    background: #9bc03c;
    color: white;
    padding: 32px 15px;
    border-radius: 12px;
}
  .tabledata{
      border:1px solid #fff!important;
      font-weight:600;
  }
  .tableheaddata{
      border:1px solid #fff!important;
      background:#605CA8;
      color:#fff;
  }
  .error valid{
      color:green!important;
  }
  .tabledataactive{
      color:green;
  }
  .tabledatainactive{
      color:red;
  }
   .formdiv{
      padding:25px; border-bottom-left-radius: 4px;; border-bottom-right-radius: 4px;
  }
  .formheader{
      background:#605CA8;padding:10px;color:#fff;font-size:16px;
  }
  #submit{background:#605ca8;padding: 6px 30px;}
  #reset{background:#fff;color:#000;padding: 6px 30px;}
  
  @media only screen and (min-width: 1350px) and (max-width: 1442px) {
    #mydata_wrapper {
        max-width:85%!important;
        margin-left:7%!important;
    }
    
  }
  @media only screen and (min-width: 1300px) and (max-width: 1349px) {
    #mydata_wrapper {
        max-width:85%!important;
        margin-left:3%!important;
    }
    #formdiv{
        margin-left:-55px;
    }
  }
  @media only screen and (min-width: 1200px) and (max-width: 1299px) {
    #mydata_wrapper {
        max-width:78%;
        margin-left:3%!important;
    }
    #formdiv{
        margin-left:-85px;
    }
  }
  @media only screen and (min-width: 1065px) and (max-width: 1199px) {
    #mydata_wrapper {
        max-width:80%;
        margin-left:3%!important;
    }
    #formdiv{
        margin-left:-85px;
    }
  }
  
  @media only screen and (min-width: 1000px) and (max-width: 1064px) {
    #mydata_wrapper {
        max-width:75%;
        margin-left:2%!important;
    }
    #formdiv{
        margin-left:-105px;
    }
  }
  

.colorwhite{color:red;}

.continue2 {
    background: #9bc03c;
    color: white;
    border: none;
    outline: none;
    padding: 8px 89px;
    border-radius: 23px;
    float: right;
}
.colorwhite{
    color:white;
}
@media screen and (max-width: 786px) {
#sidebartab{position:absolute;z-index:432;margin:5px 0px; width: 263px;transition:0.3s;}
}

@media screen and (max-width: 786px) {
.paddl0{
    width: 100%;
    padding: 0px 165px;
}
.mobilesearchicons{
    width:46px;
}
}
@media screen and (max-width: 786px) {
#sidebartab{position:absolute;z-index:432;margin:5px 0px; width: 263px;display:none;}
}

@media screen and (max-width: 786px) {
.paddl0{
    width: 100%;
    padding: 0px 165px;
}


.nav > li > a {
    color: black;
}
.nav > li > a:hover, .nav > li > a:focus {
    text-decoration: none;
    background-color: #295771;
    border-radius:0px 0px;
    color: white;
}

}

  </style>

<?php include("sidebar.php");?>


<div class="container-fluid">
           
<form action='<?=base_url();?>search' method='GET'>
                <div class="box-form">
                      
      
                    <div class="col-sm-3">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            <input type="text" class="form-control ui-autocomplete-input" name="location" placeholder="Location" id="hintcity" autocomplete="off">
                            <input type="hidden" class="form-control" name="city" id="city">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" id="hint" class="form-control ui-autocomplete-input" name="keyword" placeholder="Search Hospitals/Doctors/Clinics etc" autocomplete="off">
                        </div>
                        
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                            <select class="form-control" name="spl">
              <option value="">-Specialization-</option>
                                              <?php foreach($specialization as $s){ ?>
                                <option value='<?=$s->id;?>'><?=$s->name;?></option>
                            <?php } ?>
                                               
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-sm-1">
<button class="careplus-booking-btn careplus-bgcolor-two" id="searchBTN"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>




                    <div class="clearfix"></div>
                </div>
                </form>
            
        </div>
           
      
        
        
           <div class="careplus-main-section careplus-services-full">
        <div class="container">
         
            <div class="row">
                
                <div class="col-md-3">
                           
                        </div>
                <div class="col-lg-9">
                    <div class="pag_cstm_panel">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
                                
                                	
								

							<form action =''method='post'>
                               
                               <div class="formdiv">
                        <h4 style="color: #9bc03c;font-weight: bold;">User Profile</h4>
        
         <div class="col-md-6">
              <div class="col-md-12 form-group">
          <label for="text" class="colorwhite">Full Name:</label>
          <input type="text" class="form-control" id="religion" placeholder="Enter Your Name" name="name" data-validation="required"
         data-validation-error-msg="This Field is required"  value="<?=$data->FNAME;?>">
          </div>
          </div>

          <div class="col-md-6">
              <div class="col-md-12 form-group">    
          <label for="text" class="colorwhite">Email ID</label>
          <input type="text" class="form-control" id="religion" placeholder="Enter Your Email" name="email" data-validation="required"
         data-validation-error-msg="This Field is required" value="<?=$data->EMAIL?>">
          </div>
          </div>
          <div class="col-md-6">
              <div class="col-md-12 form-group">
          <label for="text" class="colorwhite">Mobile</label>
          <input type="text" class="form-control" id="religion" placeholder="Enter Your Mobile" name="mobile" data-validation="required"
         data-validation-error-msg="This Field is required" value="<?=$data->MOBILE;?>">
          </div>
          </div>
          
           <div class="col-md-6">
              <div class="col-md-12 form-group">
          <label for="text" class="colorwhite">Date of Birth</label>
          
          <input type="text" class="form-control" id="datepicker" placeholder="Enter Your DOB" name="dob" data-validation="required"
         data-validation-error-msg="This Field is required" value="<?=$data->DOB;?>">
         
          </div>
          
          
          </div>
          
            <div class="col-md-6">
              <div class="col-md-12 form-group">
          <label for="text" class="colorwhite">Gender</label><br>
          <span style="color:white;font-weight:bold;padding: 1px 34px;"><input type="radio" name="gender" value="M"<?php if($data->GENDER=='M'){echo "checked";} ?>> Male</span>
          <span style="color:white;font-weight:bold;"><input type="radio" name="gender" value="F"<?php if($data->GENDER=='F'){echo "checked";} ?>> Female</span>
          
  
          </div>
          </div>
          <div class="col-sm-12 click_step2 padding0">        
                                  <button class="continue2" type='submit' name='submit'>Continue</button>
                                  
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
        
        <?php include ("includes/footer.php"); ?>
        
  
        