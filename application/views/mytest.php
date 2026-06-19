<?php include ("includes/header_new.php"); ?>
<style>
.form-group {
    background: #9bc03c;
    color: white;
    padding: 32px 15px;
}
.backPage {
    background: white;
    padding: 7px 14px;
}
.backpageImg{
    height:107px;
}
.ATC {
    background: 5px 12px;
    background: #3eaff1;
    color: white;
    width: 100%;
    font-weight: bold;
}
/* The container */
.boxFirst {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    color: white;
}

/* Hide the browser's default checkbox */
.boxFirst input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.boxFirst:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.boxFirst input:checked ~ .checkmark {
  background-color: #2196F3;
}


.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.boxFirst input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.boxFirst .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
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
    background: #295771;
    color: white;
    border: none;
    outline: none;
    padding: 10px 25px;
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
           

<section class="search-sec">
    <div class="container">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control" placeholder="Enter City">
                        </div>
                        
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control">
                                <option>Select Your Lab</option>
                                <option>Example one</option>
                                <option>Example one</option>
                                <option>Example one</option>
                                <option>Example one</option>
                                <option>Example one</option>
                                <option>Example one</option>
                            </select>
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Enter Pathology Name">
                              
                        </div>
                      
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="button" class="btn btn-danger wrn-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

        <br>
        
           <div class="careplus-main-section careplus-services-full">
        <div class="container">
         
            <div class="row">
                
                <div class="col-md-2">
                            <form action="/action_page.php">
                        
                        <input type="text" id="search_input" value="" class="form-control" placeholder="Search"><br>
                                           
                    <label class="boxFirst">Upchar
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                    <label class="boxFirst">Doctors
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                    <label class="boxFirst">prescription
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                    <label class="boxFirst">medicine
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
 </form>
 
 
 
 <br><br><br>
 <form action="/action_page.php">
                        
                        <input type="text" id="search_input" value="" class="form-control" placeholder="Search"><br>
                                           
                    <label class="boxFirst">Upchar
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                    <label class="boxFirst">Doctors
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                    <label class="boxFirst">prescription
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                    <label class="boxFirst">medicine
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                    
                    

 </form>
 
 
                        </div>
                <div class="col-lg-10">
                    <div class="pag_cstm_panel">
                        <div class="pag_cstm_panel_panel_ontent p-t-0">
                            <div class="row paddb40">
                                <h5>Upchar Center </h5>
							<div class="col-sm-12 processsstep2">
							    
							    	<div class="col-sm-4">
							    	    	<div class="col-sm-12 backPage">
							    	    	    <h5>Upcahr Hospital Pathlogy</h5>
							    	    	    <p>Near By you</p>
							    	    	    <div class="text-center">
							    	    	        <img src="https://www.upchar.shop/images/Final_logo23.png" class="backpageImg">
							    	    	    </div>
							    	    	    
							    	    	    <br>
							    	    	     <h6><i class="fa fa-inr"></i> 2300 / </h6>
							    	    	     <h4>Cash Back</h4>
							    	    	     <a href="#" class="btn ATC">ADD TO CART</a>
							    	
							    	</div>    
							    	</div>
							   
							       	<div class="col-sm-4">
							    	    	<div class="col-sm-12 backPage">
							    	    	    <h5>Upcahr Hospital Pathlogy</h5>
							    	    	    <p>Near By you</p>
							    	    	    <div class="text-center">
							    	    	        <img src="https://www.upchar.shop/images/Final_logo23.png" class="backpageImg">
							    	    	    </div>
							    	    	    
							    	    	    <br>
							    	    	     <h6><i class="fa fa-inr"></i> 2300 / </h6>
							    	    	     <h4>Cash Back</h4>
							    	    	     <a href="#" class="btn ATC">ADD TO CART</a>
							    	
							    	</div>    
							    	</div>
							    	
							    		<div class="col-sm-4">
							    	    	<div class="col-sm-12 backPage">
							    	    	    <h5>Upcahr Hospital Pathlogy</h5>
							    	    	    <p>Near By you</p>
							    	    	    <div class="text-center">
							    	    	        <img src="https://www.upchar.shop/images/Final_logo23.png" class="backpageImg">
							    	    	    </div>
							    	    	    
							    	    	    <br>
							    	    	     <h6><i class="fa fa-inr"></i> 2300 / </h6>
							    	    	     <h4>Cash Back</h4>
							    	    	     <a href="#" class="btn ATC">ADD TO CART</a>
							    	
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
        
  
        
