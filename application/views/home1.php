<head>
    <link rel="icon" href="images/logo.png" type="images/logo.png" sizes="32x32">

<style>

::placeholder {
  color: black !important;
  opacity: 0.8 !important; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: red;
}

::-ms-input-placeholder { /* Microsoft Edge */
 color: red;
}

.mySlides {display:none;}
.mySlides3 {display:none;}
.bannertext{ animation-name: beatHeart;animation-duration: 1.9s;animation-iteration-count: infinite;}
 #appointmentbookicon{transition:0.3s;transform: scale(1.1,1.1);}
.bannerbox:hover{transform: scale(1.1,1.1);}
.bannerbox{transition: 0.3s;}

@keyframes beatHeart {
  0% {
    transform: scale(1);
  }
  25% {
    transform: scale(0.8,0.8);
  }
  28% {
    transform: scale(1);
  }
  35% {
    transform: scale(0.8,0.8);
  }
  38% {
    transform: scale(1);
  }
  40% {
    transform: scale(1);
  }
  75% {
    transform: scale(1);
  }
  78% {
    transform: scale(1);
  }
  100% {
    transform: scale(1);
  }
}


</style>
  
</head>
<?php include ("includes/header.php"); ?>
    <div class="careplus-navigation-section careplus-bgcolor" style="background-color: #08364b;">
        <div class="container">
            <div class="row">
                <div class="collapse navbar-collapse" id="navbar-collapse-1"> </div>                   
            </div>
        </div>
    </div>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-center">
                <iframe class="videoCode" src="https://www.youtube.com/embed/XQzm5iBEkVs" target="_self" frameborder="0" allow="autoplay"></iframe>
            </div>
            <div class="col-sm-6">
                <div class="spacingText">
                    <div class="center">
                        <div id="text">
                            <h2>FASTEST ONLINE HOSPITAL SERVICE'S</h2>
                            <br>
                            <h3>Best Online Hospital Services In All Over India.</h3>
                        </div>
                    </div>
                    <ul class="ulList">
                        <li><span class="glyphicon rightIcon">&#xe013;</span> Online Book Doctors</li>
                        <li><span class="glyphicon rightIcon">&#xe013;</span> Hospital Facilities Online</li>
                        <li><span class="glyphicon rightIcon">&#xe013;</span> Buy Medicine Online</li>
                        <li><span class="glyphicon rightIcon">&#xe013;</span> Fastest Ambulance Service's</li>
                        <li><span class="glyphicon rightIcon">&#xe013;</span> Biomedical Equipment's Service's</li>
                        <button class="fontSignUp">Book Now</button>
                    </ul>
                    <img class="bannertext" src="images/heart.png" alt="Welcome In Upchar">
                    <div class=bannerbox>
                        <a href="https://www.upchar.shop/search?location=&city=&keyword=&spl="><h4 style="font-weight:bold;color:white;text-shadow: 0px -3px 5px #464545;"><i class="fa fa-calendar" id="appointmentbookicon" aria-hidden="true"></i> Book  Appointment</h4></a>
                        <a href="https://www.upchar.shop/login"><span class="NewButton" id="appointmentbookicon">Create Account</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="careplus-banner-one slick-initialized slick-slider">
        <div aria-live="polite" class="slick-list draggable">
            <div class="slick-track" role="listbox" style="opacity: 1; width: 2698px;height:0px;">
                <div class="careplus-banner-one-layer slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 1349px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                </div>
                <div class="careplus-banner-one-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 1349px; position: relative; left: -1349px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;">
                    <img src="images/banner-2.jpg" alt="">
                    <span class="careplus-transparent"></span>
                    <div class="careplus-banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="careplus-banner-wrap">
                                        <h1><span>You Canâ€™t</span>Always Be There<span>But We CAn</span></h1>
                                        <div class="clearfix"></div>
                                        <a href="404.html" class="careplus-banner-btn" tabindex="-1">Read More <span></span></a>
                                    </div>
                                    <div class="careplus-appointment-form">
                                        <form>
                                            <label>Book Appointment</label>
                                            <ul>
                                                <li>
                                                    <input type="text" value="Full Name" onblur="if(this.value == '') { this.value ='Full Name'; }" onfocus="if(this.value =='Full Name') { this.value = ''; }" tabindex="-1">
                                                    <i class="fa fa-user"></i>
                                                </li>
                                                <li>
                                                    <input type="text" value="Phone" onblur="if(this.value == '') { this.value ='Phone'; }" onfocus="if(this.value =='Phone') { this.value = ''; }" tabindex="-1">
                                                    <i class="fa fa-phone"></i>
                                                </li>
                                                <li>
                                                    <input type="text" value="mm / dd / yyyy" onblur="if(this.value == '') { this.value ='mm / dd / yyyy'; }" onfocus="if(this.value =='mm / dd / yyyy') { this.value = ''; }" tabindex="-1">
                                                    <i class="fa fa-calendar"></i>
                                                </li>
                                                <li>
                                                    <div class="careplus-select">
                                                        <select tabindex="-1">
                                                            <option value="">Choose Department</option>
                                                            <option value="pakistan"> Department</option>
                                                            <option value="india"> Department</option>
                                                            <option value="usa"> Department</option>
                                                            <option value="student"> Department</option>
                                                        </select>
                                                    </div>
                                                </li>
                                                <li>
                                                    <input type="submit" value="Submit Now" tabindex="-1">
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <div class="careplus-main-section careplus-team-mediumfull">
            <div class="container">                    
                <div class="careplus-fancy-title">
                    <h2>Our Specialists</h2>
                    <span><small></small><i class="fas fa-link"></i></span>
                </div>
                <div class="container-fluid" id="tabSpecialists">
                    <div class="col-xs-12">
                        <div class="carousel slide" id="myCarousel">
                            <div class="carousel-inner careplus-team careplus-team-medium" >
                                <?php $slidcount=0; foreach($doctor_slid as $ds){ ?>
                                <?php if($slidcount%4==0){ ?>
                                <div class="item <?=($slidcount===0)?'active':'';?>">
                                    <ul class="thumbnails row">   <?php } ?>
                                        <li class="col-md-3" id="tabspecilist">
                                            <figure><a href=""><img src="<?=admin_url();?>public/assets/upload/<?=($ds->drimage)? $ds->drimage : 'dummydr.jpg';?>" style=" position: relative;"alt=""></a>
                                                <figcaption>
                                                    <div class="careplus-team-medium-info" style="background:#9bc03c;">
                                                        <h6><a style="color:white;" href="#"><?=(strcasecmp(substr($ds->fname,0,2),'Dr'))? 'Dr.' : '';?><?=$ds->fname.' '.$ds->lname;?></a></h6>
                                                        <span style="color:white;text-align:center;width: 100%;"><?php $quastring='';
                                                        $qu=$this->db->get_where('dr_qualifications',array('user_id'=>$ds->id));
                                                        foreach(@$qu->result() as $q)
                                                        $quastring.=getQualificationName($q->qualification_id).', ';
                                                        echo $quastring=rtrim($quastring,', ');
                                                        ?></span>
                                                    </div>
                                                    <div class="careplus-team-medium-text">
                                                        <h6><a style="color:white;" href="<?=base_url();?>doctor/<?=$ds->id;?>"><?=(strcasecmp(substr($ds->fname,0,2),'Dr')) ? 'Dr.' : '';?><?=$ds->fname.' '.$ds->lname;?></a></h6>
                                                        <span style="color:white;text-align:center;padding:;width: 100%;"><?=$quastring;?></span>
                                                        <a href="<?=base_url();?>doctor/<?=$ds->id;?>">  <img src="<?=admin_url();?>public/assets/upload/<?=($ds->drimage)? $ds->drimage : 'dummydr.jpg';?>" style="position: relative;height: 192px;border: 23px solid #87b511;margin:18px 15px;border-radius: 122px;width:186px;box-shadow:2px 2px 5px #55710c;">
                                                        </a>
                                                        <a href="<?=base_url();?>doctor/<?=$ds->id;?>" class="careplus-readmore-btn">View <span></span></a>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </li>
                                        <?php 
                                        $slidcount++;
                                        if($slidcount%4==0){ ?>
                                    </ul>
                                </div>
                                    <?php } }?>                        
                            </div>
                            <nav>
                                <ul class="control-box pager">
                                    <li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
                                    <li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></a></li>
                                </ul>
                            </nav>
                            <!-- /.control-box -->                         
                        </div><!-- /#myCarousel -->     
                    </div><!-- /.col-xs-12 -->          
                </div><!-- /.container -->
            </div>
        </div>
    </div>
	<div class="careplus-main-section careplus-team-mediumfull">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="careplus-fancy-title">
						<h2>Latest News</h2>
						<span><small></small><i class="fas fa-link"></i></span>
					</div>
					<div class="careplus-team careplus-team-medium">
						<ul class="row">
						 <?php $slidcount=0; foreach($news as $ds){ ?>
							<li class="col-md-3">
								<figure><a href="#"><img src="<?=admin_url();?>public/assets/upload/<?=($ds->image)? $ds->image : 'dummy_video.jpg';?>" alt=""></a>
									<figcaption>
										<div class="careplus-team-medium-info">
											<h5><a href="#"><?=substr($ds->title,0,25)?></a></h5>
										</div>
										<div class="careplus-team-medium-text">
											<h5><a href="#"><?=substr($ds->title,0,40)?></a></h5></br>
											<p><?=substr($ds->description,0,70)?></p></br>
											<a href="<?php echo base_url();?>news/<?php echo  mybase64_encode($ds->id);?>" class="careplus-readmore-btn">read more <span></span></a>
										</div>
									</figcaption>
								</figure>
							</li>
						 <?php } ?>
						</ul>
					</div>
					<nav>
						<ul class="control-box pager">
							<!--<button style="color: white;padding:4px 17px;border-radius: 61px;margin: 6px;float: right;background: #9bc03c;font-weight: bold;    border: none;">See More </button>-->
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!--// Main Section \\-->
    <div class="careplus-main-section careplus-blog-modern-full">
        <div class="container">
            <div class="careplus-fancy-title" style="margin-top: -27px;">
                <h2>Our Partner's</h2>
                <span><small></small><i class="fas fa-link"></i></span>
            </div>
            <div class="careplus-blog careplus-blog-modern">
                <ul class="row">
                    <li class="col-md-3">
                        <?php foreach($hospital as $h) { ?>
                        <figure >
                            <a href='<?=base_url();?>hospital-login'> 
                                <div class="w3-content w3-section">
                                    <img class="mySlides w3-animate-bottom" src="<?=admin_url();?>public/assets/upload/<?=($h->drimage)? $h->drimage : 'dummyhospital.jpg';?>">
                                </div>
                                <span><i class="fa fa-link"></i><small></small></span>
                            </a>   
                        </figure>
                        <div class="careplus-blog-modern-text text-center">
                            <p><a href='<?=base_url();?>hospital-login'><?=$h->name;?></a></p>
                        </div> 
                        <?php } ?>
                    </li>
                    <li class="col-md-3">
                        <figure >
                            <a href="blog-detail.php">
                                <div class="w3-content w3-section" >
                                    <img class="mySlides2 w3-animate-bottom" src="images/Hospital.jpg">
                                    <img class="mySlides2 w3-animate-bottom" src="images/ChemicalPathology.jpg">
                                    <img class="mySlides2 w3-animate-bottom" src="images/Hospital.jpg">
                                    <img class="mySlides2 w3-animate-bottom" src="images/ChemicalPathology.jpg">
                                </div>
                                <span><i class="fa fa-link"></i><small></small></span>
                            </a>
                        </figure>
                        <div class="careplus-blog-modern-text text-center">
                            <p><a href='<?=base_url();?>pathlab-login'>Pathology</a></p>
                        </div>
                    </li>
                    <li class="col-md-3">
                        <figure>
                            <a href="blog-detail.php">
                                <div class="w3-content w3-section">
                                    <img class="mySlides3 w3-animate-bottom" src="images/Hospital.jpg">
                                    <img class="mySlides3 w3-animate-bottom" src="images/ChemicalPathology.jpg">
                                    <img class="mySlides3 w3-animate-bottom" src="images/Hospital.jpg">
                                    <img class="mySlides3 w3-animate-bottom" src="images/ChemicalPathology.jpg">
                                </div>    
                                <span><i class="fa fa-link"></i><small></small></span>
                            </a>
                        </figure>
                        <div class="careplus-blog-modern-text text-center">
                            <p><a href="<?=base_url();?>pathdoctor-login">Medicine</a></p>
                        </div>
                    </li>
					<?php //echo "<pre>"; print_r($ds); die;?>
                    <li class="col-md-3">
                        <figure>
                            <a href='<?=base_url();?>doctor-login'>
                                <div class="w3-content w3-section" >
                                    <img class="mySlides4 w3-animate-bottom" src="<?=admin_url();?>public/assets/upload/dummydr.jpg">
                                </div>   
                                <span><i class="fa fa-link"></i><small></small></span>
                            </a>
                        </figure>
                        <div class="careplus-blog-modern-text text-center">
                            <p><a href='<?=base_url();?>doctor-login'><?php //=(strcasecmp(substr($ds->title,0,2),'Dr')) ? 'Dr.' : '';?><?php echo "Dr";?></a></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="careplus-main-section careplus-blog-modern-full">              
        <div class="col-md-12">
            <div class="careplus-fancy-title" style="margin-top: 100px;">
                <h2>Gallery</h2>
                <span><small></small><i class="fas fa-link"></i></span>
            </div>
        </div>
        <div id="mobileGallery">
            <div class="container" id="tabgallery">
                <div class="item active">
                    <ul class="thumbnails row">
                        <?php foreach($image as $p) { ?>
                        <li class="col-md-3 mobileGallery2">  
                            <div class="imghove">
                                <img src="<?=base_url();?>admin1947/public/assets/upload/<?=$p->image;?>" alt="Avatar" class="image">
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>  
                <button style="color: white;padding:4px 17px;border-radius: 61px;margin: 6px;float: right;background: #9bc03c;font-weight: bold;    border: none;">See More </button>
            </div>
        </div>
    </div>    
    <div class="clearfix"></div>
	<div id="myModal" class="modal fade" role="dialog" style="top: 10%;">
    <div style="background-color: #9bc03c;   border-radius: 25px;"    class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content " style="background: #295771;;   border-radius: 25px;">
        <div class="modal-header  " style="border-bottom:0px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!--         <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body text-center ">
          <h1 style="color: white;font-weight: bold;">Bed availability for covid-19 in Your City</h1>
          <a style="background-color: red;"class="fontSignUp" href='<?php echo base_url();?>bed-availability'>Click Here</a>
          
        </div>
        <div class="modal-footer" style="border-top:0px;">
          <!--         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
  
    </div>
  </div>
 
<?php $this->load->view('includes/footer.php'); ?>
 <script>
    $(document).ready(function(){       
$('#myModal').modal('show');
}); 
</script>
<script> 
$(document).ready(function(){
  $(".SerchArrow").click(function(){
    $(".SearchBox").slideToggle("slow");
  });
});
</script>


<script type="text/javascript">
  $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>

<script> 
$(window).scroll(function(){

    var sPos = $(this).scrollTop();
        $(".bannertext, .bannerbox").css({
            
            'right' : sPos/1 + 'px',
        });
    
});


</script> 



<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 1400);    
}
</script>
<script>
var myIndex = 0;
carousel1();

function carousel1() {
  var i;
  var x = document.getElementsByClassName("mySlides1");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 1150);    
}
</script>

<script>
var myIndex = 0;
carousel2();

function carousel2() {
  var t;
  var x = document.getElementsByClassName("mySlides2");
  for (t = 0; t < x.length; t++) {
    x[t].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel2, 1200);    
}
</script>

<script>
var myIndex = 0;
carousel3();

function carousel3() {
  var j;
  var x = document.getElementsByClassName("mySlides3");
  for (j = 0; j < x.length; j++) {
    x[j].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel3, 1100);    
}
</script>

<script>
var myIndex = 0;
carousel4();

function carousel4() {
  var k;
  var x = document.getElementsByClassName("mySlides4");
  for (k = 0; k < x.length; k++) {
    x[k].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel4, 1400);    
}


</script>

<script>
            var text = document.getElementById('text');
        var newDom = '';
        var animationDelay = 6;

        for(let i = 0; i < text.innerText.length; i++)
        {
            newDom += '<span class="char">' + (text.innerText[i] == ' ' ? '&nbsp;' : text.innerText[i])+ '</span>';
        }

        text.innerHTML = newDom;
        var length = text.children.length;

        for(let i = 0; i < length; i++)
        {
            text.children[i].style['animation-delay'] = animationDelay * i + 'ms';
        }
    
</script>

 
    
