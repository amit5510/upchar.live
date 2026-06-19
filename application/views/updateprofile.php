<head>
    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
</head>

<?php include ("includes/header_new.php"); ?>
<style>
#searchBTN {
    width: 100%;
    margin-top: 0px;
    box-shadow: 0px -4px 6px #204356;
    padding: 12px;
    border: none;
    background-color: #043d5b;
    color: white;
    margin-top: 5px;
}
.img-picker {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
	
}
.Innerimg {
    border-radius: 113px;
    width: 214px;
    height: 214px;
    padding: 15px;
}
.img-picker + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    
    display: inline-block;
    background-color: #08364b;
    padding: 3px 23px;
    border-radius: 16px;
}

.img-picker:focus + label,
.img-picker + label:hover {
    background-color: #295771;
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
  
  

.colorwhite{color:white;}

.continue2 {
    background: #9bc03c;
    color: white;
    border: none;
    padding: 8px 36px;
    font-weight: bold;
    border-radius: 23px;
}
  </style>
  
  <?php include("sidebar.php");?>
  
    <div class="careplus-banner">
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


                        <div class="clearfix"></div>
            
        </div>
           
            
        </div>
        
        
        <div class="container">
        <div class="pag_cstm">

            <div class="row">
                
                <div class="col-md-3" id="sidebartab">
        
                        </div>
                <div class="col-lg-9">
                    <div class="pag_cstm_panel">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
						

						 <div class="pag_cstm">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pag_cstm_panel" style="color:white;">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
                                
							<form action='' method='post' enctype="multipart/form-data">
                              <!--  <div class="col-sm-12 processsstep3">
									<p><?=$this->session->userdata('username');?></p>
                                </div> -->
                                

                                <div class="col-sm-6 col-md-offset-2 id_proof">

                                    <div class="col-sm-12 bggrya" style="background: #9bc03c;text-align: center;border-radius: 9px;">
                                        
                                          <img src="<?=base_url();?>admin1947/public/assets/upload/<?=$src;?>" class="Innerimg" alt='No Profile Image'>
							<h6 class="colorwhite">Your Display Picture</h6>
							
								
                                    <input type="file" name="file" id="file" class="img-picker" />
                                    <label for="file">Choose a file</label>									
                                     
									<P>Please upload your Profile picture it will be displayed in  your profile .</p>
									<br>
									<button class="continue2"  name='submit' type='submit'>Upload</button>
                                    </div>

                                  <div class="col-sm-8 click_step2 mrt30 padding0">
                                        <a class="backiocn" href="<?=base_url();?>profile"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back</a>
                                    </div>
                                    <div class="col-sm-4 click_step2 mrt20 padding0">
                                        
                                            
                                        

                                    </div>

                                </div>

                                
								<form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                               

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
        
        <?php include ("includes/footer.php"); ?>