
       <?php include ("includes/header.php"); ?>
	   
  <div class="careplus-banner">
<div class="container-fluid">
            <div class="row">
			<form action='<?=base_url();?>search' method='GET'>
                <div class="box-form">
                    	
			
                    <div class="col-sm-2 col-sm-offset-1">
                        <div class="input-group shadow">
                            <span class="input-group-addon"> <i class="fa fa-map-marker"> &nbsp; &nbsp; </i></span>
                            <input type="text" class="form-control" name="location" placeholder="Location" id='hintcity'>
                            <input type="hidden" class="form-control" name="city"  id='city'>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" id='hint' class="form-control" name="keyword" placeholder="Search Hospitals/Doctors/Clinics etc">
                        </div>
                        
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                            <select class="form-control" name='spl'>
							<option value=''>-Specialization-</option>
							<?php foreach($specialization as $s){ ?>
                                <option value='<?=$s->id;?>'><?=$s->name;?></option>
							<?php } ?>
                                 
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-sm-1"><button class="careplus-booking-btn careplus-bgcolor-two" style=" margin-top: 0px; line-height: 40px;box-shadow: 3px 3px 0px #08364b9e; ">Search</button></div>
                    <div class="clearfix"></div>
                </div>
                </form>
            </div>
                        <div class="clearfix"></div>
            
        </div>
            <!--// Slider \\-->
            <div class="careplus-banner-one slick-initialized slick-slider">
                <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 2698px;"><div class="careplus-banner-one-layer slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 1349px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                    <img src="extra-images/banner-1.jpg" alt="">
                    <span class="careplus-transparent"></span>
                    <div class="careplus-banner-caption">
                        <span class="careplus-transparent-shape"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="careplus-banner-wrap">
                                        <h1><span>You Can’t</span>Always Be There<span>But We CAn</span></h1>
                                        <p>Upchar Online Medical Solution provides online Hazel free Doctor / hospital / pathology / medicin consultant services.</p>
                                        <div class="clearfix"></div>
                                        <a href="404.html" class="careplus-banner-btn" tabindex="0">Read More <span></span></a>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div><div class="careplus-banner-one-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 1349px; position: relative; left: -1349px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;">
                    <img src="extra-images/banner-2.jpg" alt="">
                    <span class="careplus-transparent"></span>
                    <div class="careplus-banner-caption">
                        <span class="careplus-transparent-shape"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="careplus-banner-wrap">
                                        <h1><span>You Can’t</span>Always Be There<span>But We CAn</span></h1>
                                        <p>Upchar Online Medical Solution provides online Hazel free Doctor / hospital / pathology / medicin consultant services</p>
                                        <div class="clearfix"></div>
                                        <a href="404.html" class="careplus-banner-btn" tabindex="-1">Read More <span></span></a>
                                    </div>
                                    <div class="careplus-appointment-form">
                                        <form>
                                            <label>Book Appointment</label>
                                            <p>Upchar Online Medical Solution provides online Hazel free Doctor / hospital / pathology / medicin consultant services</p>
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
                </div></div></div>
                
            </div>
            <!--// Slider \\-->
            
        </div>
        <div class="careplus-main-content">

            <!--// Main Section \\-->
            <div class="careplus-main-section careplus-services-full">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="careplus-fancy-title">
                                <h2>upchar Services</h2>
                                <span><small></small><i class="icon-tool5"></i></span>
                            </div>
                            <div class="careplus-service careplus-service-grid">
                                <ul class="row">
                                    <li class="col-md-3">
                                        <div class="careplus-service-wrap">
                                            <i class="icon-upchaar3"></i>
                                            <h5>Online Appointment </h5>
                                            <p>Upchar online medical solution provide you hazel free medical services.</p>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="careplus-service-wrap">
                                            <i class=" icon-tool5"></i>
                                            <h5>General Medicine</h5>
                                            <p>Upchar online medical solution provide you hazel free medical services.</p>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="careplus-service-wrap">
                                            <i class="icon-upchaar-1"></i>
                                            <h5>upchaar Research</h5>
                                            <p>Upchar online medical solution provide you hazel free medical services.</p>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="careplus-service-wrap">
                                            <i class=" icon-ribbon"></i>
                                            <h5>Intensive Care</h5>
                                            <p>Upchar online medical solution provide you hazel free medical services.</p>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="careplus-service-wrap">
                                            <i class="icon-interface5"></i>
                                            <h5>Cognitive therap</h5>
                                            <p>Upchar online medical solution provide you hazel free medical services.</p>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="careplus-service-wrap">
                                            <i class="icon-luxury"></i>
                                            <h5>Peace of mind</h5>
                                            <p>Upchar online medical solution provide you hazel free medical services.</p>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="careplus-service-wrap">
                                            <i class="icon-app"></i>
                                            <h5>Available 24/7</h5>
                                            <p>Upchar online medical solution provide you hazel free medical services.</p>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="careplus-service-wrap">
                                            <i class="icon-upchaar-2"></i>
                                            <h5>ICU Department</h5>
                                            <p>Upchar online medical solution provide you hazel free medical services.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>           -->
            <!--// Main Section \\-->

            <!--// Main Section \\-->
           <div class="careplus-main-section careplus-blog-modern-full">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="careplus-fancy-title">
                                <h2>Blog`s</h2>
                                <span><small></small><i class="icon-tool5"></i></span>
                            </div>
                            <div class="careplus-blog careplus-blog-modern">
                                <ul class="row">
                                    <li class="col-md-4">
                                        <figure><a href="blog-detail.php"><img src="extra-images/blog-modern-img1.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                            <time datetime="2008-02-14 20:00">21 AUG</time>
                                        </figure>
                                        <div class="careplus-blog-modern-text">
                                            <h5><a href="blog-detail.php">How To Build a Long Distance Care Team</a></h5>
                                            <p>Upchar Doctor sit in many hospital, it has established to help the people . But the project upchar provide online Appointment services and online traking OPD Number..</p>
                                            <a href="blog-detail.php" class="careplus-readmore-btn">Read More <span></span></a>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <figure><a href="blog-detail.php"><img src="extra-images/blog-modern-img2.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                            <time datetime="2008-02-14 20:00">21 AUG</time>
                                        </figure>
                                        <div class="careplus-blog-modern-text">
                                            <h5><a href="blog-detail.php">How To Build a Long Distance Care Team</a></h5>
                                            <p>Upchar Doctor sit in many hospital, it has established to help the people . But the project upchar provide online Appointment services and online traking OPD Number..</p>
                                            <a href="blog-detail.php" class="careplus-readmore-btn">Read More <span></span></a>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <figure><a href="blog-detail.php"><img src="extra-images/blog-modern-img3.jpg" alt=""><span><i class="fa fa-link"></i><small></small></span></a>
                                            <time datetime="2008-02-14 20:00">21 AUG</time>
                                        </figure>
                                        <div class="careplus-blog-modern-text">
                                            <h5><a href="blog-detail.php">How To Build a Long Distance Care Team</a></h5>
                                            <p>Upchar Doctor sit in many hospital, it has established to help the people . But the project upchar provide online Appointment services and online traking OPD Number..</p>
                                            <a href="blog-detail.php" class="careplus-readmore-btn">Read More <span></span></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>                   
            <!--// Main Section \\-->
            
       

            <!--// Main Section \\-->
            <div class="careplus-main-section careplus-team-mediumfull">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="careplus-fancy-title">
                                <h2>Meet Our Specialists</h2>
                                <span><small></small><i class="icon-tool5"></i></span>
                            </div>
                            <div class="careplus-team careplus-team-medium">
                                <ul class="row">
                                    <li class="col-md-3">
                                        <figure><a href="team-detail.php"><img src="extra-images/team-medium-img1.jpg" alt=""></a>
                                            <figcaption>
                                                <div class="careplus-team-medium-info">
                                                    <h5><a href="team-detail.php">Dr Sunil Kushwaha</a></h5>
                                                    <span>Dental Hygienist</span>
                                                </div>
                                                <div class="careplus-team-medium-text">
                                                    <h5><a href="team-detail.php">Dr Sunil Kushwaha</a></h5>
                                                    <span>Dental Hygienist</span>
                                                    <p>Upchar online medical solution provide you hazel free medical services.</p>
                                                    <ul class="careplus-team-social">
                                                        <li><a href="https://www.facebook.com/" class="fa fa-facebook-square"></a></li>
                                                        <li><a href="https://twitter.com/login" class="fa fa-twitter-square"></a></li>
                                                        <li><a href="https://pk.linkedin.com/" class="fa fa-linkedin-square"></a></li>
                                                        <li><a href="https://plus.google.com/" class="fa fa-google-plus-square"></a></li>
                                                    </ul>
                                                    <a href="404.php" class="careplus-readmore-btn">read more <span></span></a>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <li class="col-md-3">
                                        <figure><a href="team-detail.php"><img src="extra-images/team-medium-img2.jpg" alt=""></a>
                                            <figcaption>
                                                <div class="careplus-team-medium-info">
                                                    <h5><a href="team-detail.php">Dr Sunil Kushwaha</a></h5>
                                                    <span>Clinic Manager</span>
                                                </div>
                                                <div class="careplus-team-medium-text">
                                                    <h5><a href="team-detail.php">Dr Sunil Kushwaha</a></h5>
                                                    <span>Clinic Manager</span>
                                                    <p>Upchar online medical solution provide you hazel free medical services.</p>
                                                    <ul class="careplus-team-social">
                                                        <li><a href="https://www.facebook.com/" class="fa fa-facebook-square"></a></li>
                                                        <li><a href="https://twitter.com/login" class="fa fa-twitter-square"></a></li>
                                                        <li><a href="https://pk.linkedin.com/" class="fa fa-linkedin-square"></a></li>
                                                        <li><a href="https://plus.google.com/" class="fa fa-google-plus-square"></a></li>
                                                    </ul>
                                                    <a href="404.php" class="careplus-readmore-btn">read more <span></span></a>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <li class="col-md-3">
                                        <figure><a href="team-detail.php"><img src="extra-images/team-medium-img3.jpg" alt=""></a>
                                            <figcaption>
                                                <div class="careplus-team-medium-info">
                                                    <h5><a href="team-detail.php">Dr Sunil Kushwaha</a></h5>
                                                    <span>Dental Hygienist</span>
                                                </div>
                                                <div class="careplus-team-medium-text">
                                                    <h5><a href="team-detail.php">Dr Sunil Kushwaha</a></h5>
                                                    <span>Dental Hygienist</span>
                                                    <p>Upchar online medical solution provide you hazel free medical services.</p>
                                                    <ul class="careplus-team-social">
                                                        <li><a  href="https://www.facebook.com/" class="fa fa-facebook-square"></a></li>
                                                        <li><a href="https://twitter.com/login" class="fa fa-twitter-square"></a></li>
                                                        <li><a href="https://pk.linkedin.com/" class="fa fa-linkedin-square"></a></li>
                                                        <li><a href="https://plus.google.com/" class="fa fa-google-plus-square"></a></li>
                                                    </ul>
                                                    <a href="404.php" class="careplus-readmore-btn">read more <span></span></a>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <li class="col-md-3">
                                        <figure><a href="team-detail.php"><img src="extra-images/team-medium-img4.jpg" alt=""></a>
                                            <figcaption>
                                                <div class="careplus-team-medium-info">
                                                    <h5><a href="team-detail.php">Dr Sunil Kushwaha</a></h5>
                                                    <span>Surgery Specialist</span>
                                                </div>
                                                <div class="careplus-team-medium-text">
                                                    <h5><a href="team-detail.php">Dr Sunil Kushwaha</a></h5>
                                                    <span>Surgery Specialist</span>
                                                    <p>Upchar online medical solution provide you hazel free medical services.</p>
                                                    <ul class="careplus-team-social">
                                                        <li><a href="https://www.facebook.com/" class="fa fa-facebook-square"></a></li>
                                                        <li><a href="https://twitter.com/login" class="fa fa-twitter-square"></a></li>
                                                        <li><a href="https://pk.linkedin.com/" class="fa fa-linkedin-square"></a></li>
                                                        <li><a href="https://plus.google.com/" class="fa fa-google-plus-square"></a></li>
                                                    </ul>
                                                    <a href="404.php" class="careplus-readmore-btn">read more <span></span></a>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </li>
                                </ul>
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


