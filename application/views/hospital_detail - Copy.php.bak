<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <style>
    #searchBTN {width: 100%;margin-top: 0px;box-shadow: 0px -4px 6px #244c63;padding: 12px;border: none;
    background-color: #9bc03c;color: white;margin-top:4px;}
  </style>
</head>

<?php include ('includes/header_new.php'); ?>

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
<div class="col-md-12">	

  <!---- MAIN PAGE CONTENT --->		
  <div class="blackshad">
    <img class="MainPhoto" id="display_pic" data-pid="1" src="<?=admin_url();?>public/assets/upload/<?=($hospital->drimage)? $hospital->drimage : 'dummydr.jpg';?>" data-src="https://content.jdmagicbox.com/comp/def_content/hospitals/default-hospitals-23.jpg?interpolation=lanczos-none&amp;output-format=jpg&amp;resize=1024:370&amp;crop=1024:370px;*,*">
  </div>
  <div class="company-details">
    <div class="col-md-1"></div>
    <div class="col-sm-6 text-center blackBack">
      <h4 class="content_design"><?=$hospital->name;?></h4>
      <p>WE ARE ONLINE FOR PATIENT'S 24 HOUR'S</p>
      <!-- <a href="https://www.upcharr.com/search?location=&city=&keyword=&spl=#" class="btn BooKNow">Book Now</a> -->
      <!--  <h6>Message on WhatsApp</h6> -->
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1041.5382881225871!2d77.32916749191378!3d28.590678045657178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce4ff07da730b%3A0x74119cc5681c0b56!2sB-111%2C+B+Block%2C+Sector+10%2C+Noida%2C+Uttar+Pradesh+201301!5e0!3m2!1sen!2sin!4v1562824058764!5m2!1sen!2sin" width="100%" height="355px" frameborder="0" style="border:0;box-shadow: 0px -3px 6px -2px #c5bebe;padding: 20px 0px;" allowfullscreen></iframe>
    </div>
  </div>
	<div class="col-md-12" style="background:white;">
    <div class="col-md-4" style="padding: 12px 0px;">
      <p style="color:black;padding:3px; font-weight:bold;">Photos</p>
        <?php foreach($gallery as $g) {?>
          <img src="<?=base_url();?>admin1947/public/assets/upload/<?=$g->image;?>" class="galleryimages">
        <?php } ?>
      <p><a href="#" class="morebtn">See More</a> </p>
      <div class="col-md-12">
        <hr>
        <p class="detailsinfo"><a href="skype:+1-425-793-8900?call" class="link_ar"><i class="fa fa-mobile colmd4icon" aria-hidden="true"></i><?=$hospital->mobile;?></a></p>
        <p class="detailsinfo"><i class="fa fa-location-arrow colmd4icon" aria-hidden="true"></i> <strong><?=$hospital->address;?></strong></p>
        <p class="detailsinfo">
        <a href='mailto:info@upcharr.com'><i class="fa fa-envelope colmd4icon" aria-hidden="true"></i> Send Enquiry By Email</a></p>
      </div>
    </div>
    <div class="col-md-8">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ul class="carousel-inner">
          <?php for($p=0;$p<count($clinic);$p++) { ?>
            <li class="item <?php if($p==0) { ?> active <?php } ?>">
              <div class="col-md-4">
                <div class="col-md-12 innerbox">
                  <a data-toggle="pill" href="#home<?php echo $clinic[$p]['id'];?>"><span class="titleinbox"><?=prefixdr($clinic[$p]['fname']).' '.$clinic[$p]['lname'];?></span>
                  <p class="datadoctor"><?php $splstring=''; $sp=$this->db->get_where('dr_specialization',array('user_id'=>$clinic[$p]['id']))->result();
                  foreach($sp as $s)						
                  $splstring.=getSpecilizationName($s->specialization_id).', ';	
                  echo $splstring=rtrim($splstring,', ');						
                  ?>,</p></a>
                  <p class="datadoctor2"><i class="fa fa-clock-o" aria-hidden="true"></i> 11:00 AM To 1:00 PM</p>
                  <a href="<?=base_url();?>doctor/<?=$clinic[$p]['id'];?>" class="bookbtn text-center">View Details<i class="fa fa-chevron-right" id="bookbtn_icon" aria-hidden="true"></i></a>
                </div>
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class="tab-content">
        <?php for($p=0;$p<count($clinic);$p++) { ?>
          <div id="home<?php echo $clinic[$p]['id'];?>" class="tab-pane fade in <?php if($p==0) { ?> active <?php } ?>">
            <div class="col-md-12 innerboxdetail" >
              <div class="row">
                <div class="col-md-3">
                  <img class="tabdoctorimage" src="<?=base_url();?>admin1947/public/assets/upload/<?=($clinic[$p]['drimage'])? $clinic[$p]['drimage'] : 'dummydr.jpg';?>">
                </div>
                <div class="col-md-9" style="padding-top: 19px;">
                  <span class="titleinbox"><?=($clinic[$p]['fname']).' '.$clinic[$p]['lname'];?></span>
                  <p class="datadoctor"><?php $quastring='';
          			  $qu=$this->db->get_where('dr_qualifications',array('user_id'=>$clinic[$p]['id']));
          			  foreach(@$qu->result() as $q)				
          			  $quastring.=getQualificationName($q->qualification_id).', ';	
          			  echo $quastring=rtrim($quastring,', ');				
          			  ?></p>
                  <p class="doctoreducation"><?php $splstring=''; $sp=$this->db->get_where('dr_specialization',array('user_id'=>$clinic[$p]['id']))->result();	
          			  foreach($sp as $s)								
          			  $splstring.=getSpecilizationName($s->specialization_id).', ';	
          			  echo $splstring=rtrim($splstring,', ');					
          			  ?>,</p>
                  <p class="colorblack"><?=$clinic[$p]['about'];?></p>
                  <a href="#" class="morebtn getappointment" data-upchar-did='<?=$clinic[$p]['id'];?>' data-toggle="modal" data-target="#myModal">Book Appointment</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <div id="menu3" class="tab-pane fade">
          <h3>Menu 3</h3>
          <p>upchar one place of Healthcare.</p>
        </div>
      </div>
    </div>
  </div>
</div>
		
<?php include ('includes/footer.php'); ?>
         
<style>
.MainPhoto{
    width:100%;
    height:686px;
}
.blackBack {
    background: #0000004d;
    padding: 90px 0px;
    border-radius: 22px;
}

.BooKNow {
    background: #9bc03c;
    color: white !important;
    padding: 12px 30px;
    font-weight: bold;
    transition:0.3s;
}
.BooKNow:hover{
    background:#809e34;
}

         
         .carousel-indicators li {
    background-color: rgb(53, 149, 48);
    border: 1px solid black;
    border-radius: 10px;
    padding: 5px;    
    
}

		 .small-box {
    border-radius: 2px;
    position: relative;
    display: block;
    margin-bottom: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
    background-color: #00a65a !important;   
}

.small-box .icon {
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: absolute;
    top: 6px;
    right: 10px;
    z-index: 0;
    font-size: 90px;
    color: rgba(0,0,0,0.15);
}
.small-box>.inner {
    padding: 10px;
	 color: #fff !important;
}
.small-box h3 {
    font-size: 38px;
    font-weight: bold;
    margin: 0 0 10px 0;
    white-space: nowrap;
    padding: 0;
}
.small-box>.small-box-footer {
    position: relative;
    text-align: center;
    padding: 3px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
	    color: #fff !important;
}
.small-box:hover .icon {
    font-size: 95px;
}

/*-- page css here --*/

.blackshad {
    background: black;
    z-index: 2;
    height: 1px;
}

#image_div{
  background-image:url("");
  width:100%;
  height:200px;
  background-repeat:no-repeat;
  background-size:cover;

}
.company-details {
    z-index: 2;
    color: white;
}
.flex-container {
  display: flex;
  justify-content: center;
}

.flex-container > div {
    background-color: #f1f1f1;
    width: 100px;
    margin: 2px;
    text-align: center;
    line-height: 95px;
    font-size: 30px;
    border-radius: 5px;
    overflow:hidden;

}
.holder {
    background-color: #efefef;
    margin: auto;
    width: 1024px;
    position: relative;
}
.innerbox {
    background: #f9f9f9;
    padding: 13px 9px;
    border-radius: 2px 12px;
    border: 1px solid #e6e4e4;
    margin: 15px 0px;
    transition:0.4s;
    height: 136px;
}
.innerboxdetail{
    background: #f9f9f9;
    padding: 13px 9px;
    border-radius: 2px 12px;
    border: 1px solid #e6e4e4;
    margin: 15px 0px;
    transition:0.4s;
    height: auto;
}

.content_design {
    font-weight: bold;
    letter-spacing: 2px;
    color: white;
    text-transform: uppercase;
}
.bookbtn {
    background: #94b63c;
    float: right;
    font-size: 12px;
    padding: 0px 20px;
    transition: 1s;
    color: white !important;
}

.bookbtn:hover{
    color:#d0dcd0;
}
.bookbtn:hover #bookbtn_icon {
    text-shadow: -6px 0px 4px #2f6b2b;
}

.gallarytitle {
    font-weight: bold;
    color: gray;
    padding: 2px 14px;
}
#bookbtn_icon {
    color: white;
    font-weight: bold;
    font-size: 11px;
    margin-left: 5px;
}
.nav-tabs {
    border-bottom: 1px solid #bec0c2;
}
.bookdtab {
    cursor: pointer;
    text-transform: uppercase;
    background: #f5f5f5;
    padding: 0px;
    text-align: center;
    border: #e8e8e8 solid 1px;
    
}

.bookdtabcontent {
    width: 100%;
    position: relative;
    outline: 0;
    cursor: pointer;
    text-transform: uppercase;
    background: #439c3e;
    padding: 15px 23px;
    color: white;
}

.myactive{
    background: #d2c2c2;
    

}

.titleinbox {
    color: black;
    font-family: cambria;
        font-size: 14px;
    text-transform: capitalize;
    font-family:verdana;
    
}
.galleryimages {
    border-radius: 2px;
    width: 131px;
    border: 1px solid #295771;
    transition: 0.3s;
    margin: 4px;
    height: 134px;
}
.galleryimages:hover {
    border: 1px solid white;
     transform: scale(1.1,1.1);
}
.detailsinfo{
    color:black;
}
.colorblack{
    color:black;
}
.nav>li>a:focus, .nav>li>a:hover {
    text-decoration: none;
    background-color: #295771;
    color: white;
    border-radius:0px;
}
.morebtn {
    background:#94b63c;
    padding: 6px 21px;
    color: white;
    font-weight: bold;
    border-radius: 23px;
}
.datadoctor{
    color:black;
    text-transform:capitalize;
    font-size:12px;
    margin-bottom:0px;
}
.datadoctor2 {
    color: black;
    text-transform: capitalize;
    font-size: 12px;
    margin-bottom: ;
}

.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: white;
    cursor: default;
    background-color: #295771;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
}
.innerbox:hover{
    box-shadow:-4px 0px 3px #d0cece;
}
.colmd4icon {
    margin: 4px 3px;
    color: #94b63c;
    font-size: 19px;
    width: 30px;
    height: 30px;
    text-align: center;
}
.tabdoctorimage {
    height: 100px;
    width: 100px;
    border-radius: 63px;
    box-shadow: 0px -1px 7px #7b7777;
}
.doctoreducation{
    color:black;
    
}
/*--slider page css --*/
.carousel-control.left {
    background-image: -webkit-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);
    background-image: -o-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);
    background-image: -webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.5)),to(rgba(0,0,0,.0001)));
    background-image: linear-gradient(to right,rgba(0, 0, 0, 0.12) 0,rgba(0,0,0,.0001) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
    background-repeat: repeat-x;
}
.carousel-control.right {
    right: 0;
    left: auto;
    background-image: -webkit-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
    background-image: -o-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
    background-image: -webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.0001)),to(rgba(0,0,0,.5)));
    background-image: linear-gradient(to right,rgba(0,0,0,.0001) 0,rgba(187, 183, 183, 0.5) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
    background-repeat: repeat-x;
}

@media screen and (max-width: 680px) {
  .mobileslider {
    height:164px;
  }
}

         </style>
 