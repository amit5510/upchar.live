<head>
    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
</head>
<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->
<?php include ("includes/header_new.php"); ?>
<style>
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #295771; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #9bc03c; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: white; 
}

.BtnAds {
    background: white;
    color: #9bc03c;
    border-radius: 23px;
    font-size: 25px;
    margin: 6px;
}
.BackHeight{
    height:374px;
    overflow-y:scroll;
}

#MoreShow{


}
.box_sh_bg:hover #MoreShow{
  
    transition:0.9s;
}

.advrtzmnt {
    background: #ffffff;
    margin-top: 24px;
    border-radius: 3px 23px;
    padding: 20px 12px;
}
.advrtzmnt img {
    height: 134px;
    width: 144px;
}
.hosp_name ul li {
    display: inline-block;
    margin-right: 0px;
    margin-top: 10px;
    transition: 0.3s;
}
.hosp_name ul li img {
    border: 1px solid #cccccc4a;
    height: 94px;
    width: 100%;
}
.colorwhite{
    color: black;
}
.add_list {
    border-bottom: 1px solid #d0d0d078;
    margin-top: 16px;
}
.add_list li {
    margin:0px;
    background:none;
   color: #08364b;  
}
.lastViewBtn {
    float: right;
    background: #9bc03c;
    color: white;
    padding: 0px 20px;
}
.box_sh_bg {
    border: 1px solid #e8e8e8;
    background-color: #fff;
    box-shadow: 0 1px 2px 1px hsla(0, 0%, 43%, 0.1);
    padding: 15px;
    margin: 20px 0 0px 0px;
    border-radius:23px 0px 0px 23px;
    box-shadow: 0px 0px 0px 0px;
    height: auto;
    transition:0.9s;

}
.docimg {
    height: 171px;
    border-radius: 83px;
    box-shadow: 0px -5px 4px -1px #848181;
    width: 100%;
}
.docName {
    font-size: 12px;
    color: #043d5b;
    letter-spacing: 0.8px;
    font-size: 16px;
    font-weight: 600;
    font-family: 'Lato', sans-serif;
}
.timeicon{color: #295771;font-size: 35px;transition: 0.3s;}
.timeicon:hover{transform: scale(1.1,1.1);}
.boxbtn {
    background: #295771;
    padding: 9px 12px;
    color: #ffffff;
    border-radius: 4px;
    transition: 0.5s;
    box-shadow: 0px 0px green inset;
    width: 100%;
    margin: 3px;
}

.boxbtn:last-child{
    background: #9bc03c;

    box-shadow: 0px -2px 5px #797676;
}
.boxbtn:last-child:hover{
	transition: 0.5s;
    box-shadow: 0px 40px white inset;
}
.boxbtn:hover{
    box-shadow: 0px 40px white inset;
    color: black;
}

.secondmenuicon{
    font-size:31px;
    color:white;
    display:none;
    
}
#searchBTN {
    width: 100%;
    padding: 12px;
    border: none;
    background-color:#9bc03c;
    color: white;
    margin-top: 5px;
    font-size: 16px;
    border-radius: 2px 2px 18px 0px;
}
    .careplus-navigation-section.careplus-bgcolor, .box-form .careplus-fancy-title{
        display:none;
    }

.book-btn{
    background: #9bc03c;
    color: white;
    border-radius: 2px;
        margin-bottom: 19px;
}

.small-btn-hospital {
    background: #01324c;
    padding: 8px 16px;
    line-height: 3.2;
}
.menutab{
    background: #043d5b;
    margin-bottom:3px;
}
.menutab:first-child { 
    border-radius:14px 0px 0px 0px;
}
.menutab:last-child { 
    border-radius:0px 0px 14px 0px;
}

@media screen and (max-width: 480px) {
    .box_sh_bg {
    width: 100%;
}
.docimg {
    width: 156px;
}
.hosp_name ul li {
    display:block;

    width: 100%;
}

#mobledoctor {
       width: 100%;
  }
  .col-sm-2{
      text-align:center;
  }

.view_profile {width:100%;margin: 3px;}

/*--small photos
.smallImg{width:100%;}
small photos close--*/
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

.secondmenuicon {
    font-size: 31px;
    color: white;
    display: block;
    width: 41px;
    padding: 6px;
    margin: 7px;
    cursor: pointer;
    background: #22495f;
}
#searchBTN {
    width: 100%;
    padding: 12px;
    border: none;
    background-color:#9bc03c;
    color: white;
    margin-top: 5px;
    font-size: 16px;
    border-radius: 2px 2px 18px 0px;
}
.menutab {
    background: #ffffff;
    margin-bottom: 3px;
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

#mobledoctor{
    padding:0px;
    text-align:center;
}
}

@media screen and (max-width: 486px) {
.boxbtn {
    width: 100%;
    margin: 3px 0px;
}
.docimg {
    height: 171px;
    box-shadow: 0px -5px 4px -1px #848181;
    width: 168px;
    border-radius: 2px;
}
.hosp_name ul li img {
    border: 1px solid #cccccc4a;
    height: 139px;
    width: 100%;
}
}
</style>
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
    <section id="doctor_list">
        <div class="container">
            <div class="col-xs-3 text-center advrtzmnt">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php $j=1;
						foreach($doctors as $d){ 
						if($j==1){?>
						<div class="item active">
                            <div class="col-md-12 text-center">
                                <img class="docimgSide" src="<?=admin_url();?>public/assets/upload/<?=($d->drimage)? $d->drimage : 'dummydr.jpg';?>" alt="<?=$d->fname.' '.$d->lname;?>">
                            </div>
                            <div class="col-md-12 text-center">
                                <span><?=$d->fname.' '.$d->lname;?></span>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="#" class="btn boxbtn">Contact Hospital</a>
                                <a href="<?=base_url();?>doctor/<?=$d->id;?>" class="btn boxbtn">View Profile</a> 
                                <a href="#" class="btn boxbtn getappointment" data-upchar-did='<?=$d->id;?>' data-toggle="modal" data-target="#myModal">Book Appointment</a>
                            </div>
                        </div>
						<?php } else{ ?>
                        <div class="item">
                            <div class="col-md-12 text-center">
                                <img class="docimg" src="<?=admin_url();?>public/assets/upload/<?=($d->drimage)? $d->drimage : 'dummydr.jpg';?>" alt="<?=$d->fname.' '.$d->lname;?>">    
                            </div>
                            <div class="col-md-12 text-center">
                                <span><?=$d->fname.' '.$d->lname;?></span>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="#" class="btn boxbtn">Contact Hospital</a>
                                <a href="<?=base_url();?>doctor/<?=$d->id;?>" class="btn boxbtn">View Profile</a> 
                                <a href="#" class="btn boxbtn getappointment" data-upchar-did='<?=$d->id;?>' data-toggle="modal" data-target="#myModal">Book Appointment</a>
                            </div>
                        </div>
                        <?php } $j++; } ?>
                        <a href="#myCarousel" data-slide="prev"><i class="fa fa-arrow-circle-left BtnAds" aria-hidden="true"></i>  </a>
                        <a href="#myCarousel" data-slide="next"><i class="fa fa-arrow-circle-right BtnAds" aria-hidden="true"></i>  </a>   
                    </div>
                </div>
            </div>
			<div class="col-sm-9 BackHeight">
                <div class="col-sm-12">
                    <?php foreach($doctors as $d){ ?>
                    <div class="col-lg-12 box_sh_bg">
                        <div class="col-sm-3 text-center paddl0" id="mobledoctor"><img class="docimg" src="<?=admin_url();?>public/assets/upload/<?=($d->drimage)? $d->drimage : 'dummydr.jpg';?>" alt="<?=$d->fname.' '.$d->lname;?>">
                            <ul class="add_list">
                                <div class="row">
                                    <li class="col-md-6">
                                        <i class="fas fa-thumbs-up colorwhite"></i><br>
                                        <span><b>93%</b></span></li>
                                        <li class="col-md-6"><i class="fa fa-money colorwhite"></i><br>
                                        <span><?=@$pract->fee;?></span>
                                    </li>
                                </div>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <div class="doc_nam">
                                <span><?=$d->fname.' '.$d->lname;?></span>
                                <ul>
                                    <li><?php $quastring='';
										$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$d->id));
										foreach(@$qu->result() as $q)
											$quastring.=getQualificationName($q->qualification_id).', ';
										echo $quastring=rtrim($quastring,', ');
										?>
									</li>
                                    <li><b><?=$d->exp;?> Years Experience</b></li>
                                    <li><?php $splstring=''; $sp=$this->db->get_where('dr_specialization',array('user_id'=>$d->id))->result();
										foreach($sp as $s)
											$splstring.=getSpecilizationName($s->specialization_id).', ';
										echo $splstring=rtrim($splstring,', ');
										/* <?php } */ ?>
									</li>
                                </ul>
                            </div>
						    <p><?=$d->short_about;?></p>
	                        <?php $practdata=$this->db->get_where('dr_practice',array('user_id'=>$d->id,'status'=>'1'));
							$practcount=$practdata->num_rows(); 
							$pract=$practdata->row(); 
							if(@$pract->type=='C')
								$institution_table='clinic';
							else if(@$pract->type=='H')
								$institution_table='hospital';
							if($institution_table){
							$institutiondata=$this->db->get_where(@$institution_table, array('id'=>@$pract->institution_id,'status'=>'1'));
							$institutioncount=@$institutiondata->num_rows();
							$institution=@$institutiondata->row();	?>
                            <div class="col-md- hosp_name">
                                <p><b>services</b></p>
                                <span><a href="#"><?=@$institution->name;?></a> <?php if($practcount > 1){ echo 'and '.($practcount-1).' more places'; } ?> </span>
                                <ul> <?php foreach($gallery as $p) { ?>
                                    <li class="smallImg">
									   <a href="<?=admin_url();?>public/assets/upload/<?=($p->image)? $p->image : 'dummydr.jpg';?>" target="_blank"><img src="<?=admin_url();?>public/assets/upload/<?=($p->image)? $p->image : 'dummydr.jpg';?>" alt=""></a>
									</li>
									<?php } ?>                         
							    </ul>
                            </div>
						    <?php } ?>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                            	<i class="fa fa-clock-o timeicon" aria-hidden="true"></i>
                                <p style="color:#295771;font-weight: bold;"> 30 mins or less wait time assured</p>
                            </div>
                            <a href="#" class="btn boxbtn">Contact Hospital</a>
                            <a href="<?=base_url();?>doctor/<?=$d->id;?>" class="btn boxbtn">View Profile</a> 
                            <a href="#" class="btn boxbtn getappointment" data-upchar-did='<?=$d->id;?>' data-toggle="modal" data-target="#myModal">Book Appointment</a>
                        </div>
			            <li class="col-md-12" style="text-align:left;">
                            <i class="fa fa-map-marker" style="color:#9bc03c;"></i>
                            <span style="font-weight:bold;"><?=@$institution->address;?></span>
                        </li>			
                        <div class="col-sm-12 padd0" >
                            <ul class="doc_servic">
						        <?php 
						         $inst_service=$this->db->select('master_services.name')->join('master_services','master_services.id=instition_services.services_id')->get_where('instition_services',array('institution_id'=>@$pract->institution_id,'institution_type'=>@$pract->type))->result();
    							foreach($inst_service as $is){
    							?>
                                    <li><?=$is->name;?></li>
    								<?php } ?>
                                   <!-- <li>Open Prostatectomy</li>
                                    <li>Ureteroscopy (URS)</li>
                                    <li>Urologic Oncology</li>-->
                            </ul>
                            <div class="col-sm-3 padd0">
                                <ul class="doc_servic">
                                </ul>
                            </div>
                            <div class="col-sm-3 padd0">
                                <ul class="doc_servic">
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12" id="MoreShow">
                        </div>
                    </div>
                    <?php } ?>            
                </div>
                <div class="col-md-12">
                    <?php 	foreach($hospital as $institution) {   	?>                 
	                <div class="col-md-12 box_sh_bg">                                   
                		<div class="col-sm-3 text-center">                                        
                		    <img class="docimg" src="<?=admin_url();?>public/assets/upload/<?=($institution->drimage)? $institution->drimage : 'dummyhospital.jpg';?>" align="center">
                		</div>                                    
	                    <div class="col-sm-6 doc-info">                                        
	                        <span class="docName"><?=$institution->name;?></h5>
	   		                    <ul class="add_list">  
                            		<div class="col-md-4">
                            		    <li><a href="#" class="colorwhite"><i class="fas fa-thumbs-up colorwhite"></i><br>99% </a> </li>
                            		</div>
	                                <div class="col-md-4">
	                                    <li><a href="#" class="colorwhite"><i class="fa fa-inr" ></i><br> 500 Fee</a></li>
	                                </div>
                            		<div class="col-md-4">
                            		    <li><a href="#" class="colorwhite"><i class="fa fa-calendar-check-o" ></i><br> MON-SUN 24/7 Service</a></li>
                            		</div>
                            		<div class="col-md-6">
                            		   	<li><a href="#" class="colorwhite"><i class="fa fa-clock-o" ></i><br> 12:00 AM-11:59 PM</a></li>
                            		</div>
                            		<li class="col-md-6"><a href="https://upcharrnews.blogspot.com" class="colorwhite"><i class="far fa-comments colorwhite"></i><br> Give Your Feedback</a></li> 
                            		<li class="col-md-12"><a href="#" class="colorwhite" style=""><i class="fas fa-map-marker-alt colorwhite"></i><br> <?=$institution->address;?></a></li>
	                            </ul>                                   
	                    </div> 
                		<div class="col-md-3"> 		    
                		    <div class="label label-default small-btn-hospital">Crowns and Bridges F</div>
                		    <div class="label label-default small-btn-hospital">Metalic Crowns</div>
                		    <div class="label label-default small-btn-hospital">Crowns and Bridges F</div>
                		    <div class="btn btn-block bg-back book-btn">Call-844-844-0603</div>
                		    <br>
                		    <a href="<?=base_url();?>hospital/<?=$institution->id;?>" class="btn btn-block bg-back book-btn">View Profile  </a > 
                		</div>
                		<div class="col-sm-12 float-right">                                 
                            <p> <a class="lastViewBtn" href="https://www.facebook.com/upcharhealth/">Like facebook page and you feedback of upchar</a></p> 
                		</div>
	                </div>	 
                    <?php } ?>
                </div> 
            </div>
        </div>
    </section>
    <br/><br/>
    <?php include ('includes/footer.php'); ?>
    <script> 
        $(document).ready(function(){
        $(".secondmenuicon").click(function(){
        $("#sidebartab").slideToggle("slow");
        });
        });
    </script>