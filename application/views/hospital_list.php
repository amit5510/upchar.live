<head>
    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">

    <style>

.doc_name {
    color: #043d5b;
    letter-spacing: 0.8px;
    font-size: 16px;
    font-weight: 600;
    font-family: 'Lato', sans-serif;
    text-transform: capitalize;
}
.boxlabel {
    padding: 0px 3px !important;
    margin-top: 5px;
    text-align: center;
    border: 1px solid #9bc03c;
    transition: 0.4s;
    font-size: 11px;
    background: #9bc03c;
    color: white;
}
.boxlabel:hover{
    background:#08364b;
    color:white;
    font-weight:bold;
}
.viewbutton {
    background: #9bc03c;
    color: white;
    padding:8px 27px;
    width: 100%;
    text-align: center;
    margin-top: 11px;
   border-radius: 23px; 
}
.doc-info {
    padding: 13px;
}

.doc-info-details li {
    list-style: none;
    font-size: 14px;
    background: none;
    text-align: center;
    color: black;
    border-radius: 14px;
    transition: 0.3s;
    padding: 7px;
}
.doc-info-details li i {
    color: #9bc03c;
    font-size: 22px;
}

.doc-info-details li a {
    color: #08364b;
    font-weight: bold;
}
.doc-info-details li:hover {
    transform: scale(1.1, 1.1);
}
.doc-info{padding-bottom: 26px;}
.hospitalbox {
    border: 1px solid #e8e8e8;
    background-color: #fff;
    box-shadow: 0 1px 2px 1px hsla(0, 0%, 43%, 0.1);
    padding: 20px;
    margin: 20px 0 0px 0px;
    border-radius: 23px 0px 0px 23px;
    box-shadow: 2px -2px 8px 0px #423d36;
}
       
 .imghospital {
    width: 118px;
    height: 116px;
    border-radius: 93px;
 
}
.label-mylabel {
    background-color: #295771;
    padding: 8px 8px;
}
.bg-back {
    background: #9bc03c;
    color: white;
}
    </style>
</head>
        <!--// Header \\-->
       <?php include ('includes/header.php'); ?>
        <!--// Header \\-->

		
       
		<!--// Main Banner \\-->

		<!--// Main Content \\-->
		
		
		<div class="careplus-banner">
<div class="container-fluid">
            <div class="row">
		
<form action='<?=base_url();?>search' method='GET'>
                <div class="box-form">
                      
      
                    <div class="col-sm-2 col-sm-offset-1">
                        <div class="input-group shadow">
                            <span class="input-group-addon"> <i class="fa fa-map-marker mobilesearchicons"></i></span>
                            <input type="text" class="form-control ui-autocomplete-input" name="location" placeholder="Location" id="hintcity" autocomplete="off">
                            <input type="hidden" class="form-control" name="city" id="city">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-search mobilesearchicons"></i></span>
                            <input type="text" id="hint" class="form-control ui-autocomplete-input" name="keyword" placeholder="Search Hospitals/Doctors/Clinics etc" autocomplete="off">
                        </div>
                        
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-user-md mobilesearchicons"></i></span>
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
                        <div class="clearfix"></div>
            
        </div>
           
            
        </div>
		<div class="careplus-main-content">

			<!--// Main Section \\-->
			<div class="careplus-main-section careplus-services-full">
                <div class="container">
                    
                        
		
				<div class="row">

					<div class="col-sm-3"> </div>

		 <div class="col-sm-9">                           
		 <div class="col-sm-12">     
		 <?php foreach($hospital as $institution){ ?>
		 
		 <div class="col-sm-12 hospitalbox"> 
		 <div class="row">
		 <div class="col-sm-3 text-center">                                        
		 <img class="imghospital" src="<?=admin_url();?>public/assets/upload/<?=($institution->drimage)? $institution->drimage : 'dummyhospital.jpg';?>" width="200" align="center">
		 </div>  
		 
		 <div class="col-sm-6 doc-info">                                        
		 <span class="doc_name"><?=$institution->name;?></span>                                        
		 <!--//<h6>1 Dentist, 1 Implantologist</h6>      Header \\-->                                   
		
		 
		 </div> 
		  <div class="col-sm-3"> 
		     <a href="<?=base_url();?>hospital/<?=$institution->id;?>" class="btn btn-block bg-back book-btn">View Profile  </a ><br>
       <p> <a class="btn btn-block bg-back" href="#">view all 33 services</a></p> 
		  </div> 
	</div>
	 <div class="row">
        <div class="col-sm-9">                                        
		 <ul class="doc-info-details">   
		 <div class="row" style="margin-top: 15px;">
		 <li class="col-md-3"><i class="far fa-thumbs-up colorwhite"></i><br><a href="#">99% <br></a></li>
		 <li class="col-md-3"><a href="#"><i class="fas fa-rupee-sign"></i><br> 500 Fee</a></li>
		  <li class="col-md-3"><a href="#"><i class="fas fa-calendar-week"></i> <br> MON-SUN 24/7 call +091-8448440603</a></li>
		  <li class="col-md-3"><a href="#"><i class="far fa-clock"></i><br> 9:00 AM-8:05 PM</a></li>
		  </div>
		  	 <div class="row">
		 <li class="col-md-6"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> <br><?=$institution->address;?></a></li>
		 <li class="col-md-6"><a href="#"><i class="fas fa-comments"></i><br> 155 Feedback for 5 Doctors</a></li> 
		  
		  </div>
	 
		 </ul>

		 </div> 
		 
	<!--	    <div class="col-md-3">
		 <p class="boxlabel">Crowns and Bridges F</p>
		 <p class="boxlabel">Metalic Crowns</p>
		 <p class="boxlabel">Crowns and Bridges F</p>
		 <p class="boxlabel">Metalic Crowns</p>
		 </div>    Header \\-->
		 
            	 </div>                                                      
		 </div>
		  
		 <?php } ?>
		 </div>                        
		 </div>
		
		 
                        </div>
		
						
                  </div>
			</div>
			<!--// Main Section \\-->


		</div>
		<!--// Main Content \\-->

        <!--// Footer \\-->
        <?php include ('includes/footer.php'); ?>