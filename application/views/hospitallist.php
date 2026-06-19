<head>
    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
    <!-- All your existing CSS stays same -->
    <style>
    /* Your existing CSS code - No changes needed */
    </style>
</head>

<?php include("sidebar.php");?>
<?php include ('includes/header_new.php'); ?>

<form action='<?=base_url();?>search' method='GET'>
    <!-- Your existing search form - No changes -->
</form>

<div class="container">
    <div class="row">
        <!-- ✅ FIXED CAROUSEL -->
        <div class="col-xs-3 text-center advrtzmnt">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php if(!empty($hospital) && isset($hospital[0])): ?>
                        <!-- First slide - Featured hospital -->
                        <?php $featured = $hospital[0]; ?>
                        <div class="item active">
                            <div class="col-md-12 text-center">
                                <img class="sliderImg" src="<?=admin_url();?>public/assets/upload/<?=isset($featured->drimage) ? $featured->drimage : 'dummyhospital.jpg';?>" width="200" alt="Hospital">
                            </div>
                            <div class="col-md-12 text-center">
                                <span class="hospitaltagname">
                                    <i class="fa fa-hospital-o" aria-hidden="true"></i> 
                                    <?=isset($featured->name) ? $featured->name : 'Hospital Name';?>
                                </span>                                        
                                <p class="hospitaltagname2">Welcome to Innovation Of Upchar</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="<?=isset($featured->id) ? base_url('hospital/'.$featured->id) : '#';?>" 
                                   class="btn btn-block bg-back book-btn">SHOW DETAILS</a>
                            </div>
                        </div>
                        
                        <!-- Other slides -->
                        <?php for($i=1; $i<count($hospital); $i++): ?>
                        <div class="item">
                            <?php $inst = $hospital[$i]; ?>
                            <div class="col-md-12 text-center">
                                <img class="imghospital" src="<?=admin_url();?>public/assets/upload/<?=isset($inst->drimage) ? $inst->drimage : 'dummyhospital.jpg';?>" width="200" alt="Hospital">
                            </div>
                            <div class="col-md-12 text-center">
                                <span class="hospitaltagname">
                                    <i class="fa fa-hospital-o" aria-hidden="true"></i> 
                                    <?=isset($inst->name) ? $inst->name : 'Hospital Name';?>
                                </span>                                        
                                <p class="hospitaltagname2">1 Dentist, 1 Implantologist</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="<?=isset($inst->id) ? base_url('hospital/'.$inst->id) : '#';?>" 
                                   class="btn btn-block bg-back book-btn">SHOW DETAILS</a>
                            </div>
                        </div>
                        <?php endfor; ?>
                    <?php else: ?>
                        <!-- No hospitals fallback -->
                        <div class="item active">
                            <div class="col-md-12 text-center">
                                <img class="sliderImg" src="<?=admin_url();?>public/assets/upload/dummyhospital.jpg" width="200" alt="No Hospitals">
                            </div>
                            <div class="col-md-12 text-center">
                                <span class="hospitaltagname">No Hospitals Available</span>
                                <p class="hospitaltagname2">Check back later</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Carousel controls -->
                <a href="#myCarousel" data-slide="prev">
                    <i class="fa fa-arrow-circle-left BtnAds" aria-hidden="true"></i>
                </a>
                <a href="#myCarousel" data-slide="next">
                    <i class="fa fa-arrow-circle-right BtnAds" aria-hidden="true"></i>
                </a>   
            </div>
        </div>

        <!-- ✅ FIXED HOSPITAL LIST -->
        <div class="col-sm-9 BackHeight">
            <?php if(!empty($hospital)): ?>
                <?php foreach($hospital as $institution): ?>
                <div class="col-xs-12 box_sh_bg hospitalbox">
                    <div class="col-sm-3 text-center mobileimage">                                        
                        <img class="imghospital" 
                             src="<?=admin_url();?>public/assets/upload/<?=isset($institution->drimage) ? $institution->drimage : 'dummyhospital.jpg';?>" 
                             width="200" alt="Hospital Image">
                    </div>

                    <div class="col-sm-9 doc-info">                                        
                        <span class="hospitaltagname">
                            <i class="fa fa-hospital-o" aria-hidden="true"></i> 
                            <?=isset($institution->name) ? $institution->name : 'Hospital Name';?>
                        </span>
                        
                        <a href="#" class="Links">Doctors</a>
                        <a href="#" class="Links">Hospital</a>		                                      
                        <a href="#" class="Links">pathology</a>
                        <a href="#" class="Links">others</a>	
                        
                        <ul class="col-sm-12 doc-info-details">                                            
                            <li class="col-sm-4">
                                <a href="#"><i class="fa fa-thumbs-o-up rightsmallicons"></i> 99% (1311 votes)</a>
                            </li>
                            <li class="col-sm-4">
                                <a href="#"><i class="fa fa-inr rightsmallicons"></i> 500 Fee</a>
                            </li>
                            <li class="col-sm-4">
                                <a href="#"><i class="fa fa-calendar-check-o rightsmallicons"></i> MON-SAT 24/7 call +091-8448440603</a>
                            </li>
                            <li class="col-sm-4">
                                <a href="#"><i class="fa fa-clock-o rightsmallicons"></i> 9:00 AM-8:05 PM</a>
                            </li>
                            <li class="col-sm-8">
                                <a href="#"><i class="fa fa-commenting-o rightsmallicons"></i> 155 Feedback for 5 Doctors</a>
                            </li>
                            <li class="col-sm-12">
                                <a href="#"><i class="fa fa-map-marker rightsmallicons"></i> 
                                    <?=isset($institution->address) ? $institution->address : 'Address not available';?>
                                </a>
                            </li>
                        </ul>
                        
                        <div class="col-md-12">
                            <a href="<?=isset($institution->id) ? base_url('hospital/'.$institution->id) : '#';?>" 
                               class="btn btn-block bg-back book-btn">SHOW DETAILS</a>
                        </div>
                    </div> 
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-xs-12">
                    <p class="text-center">No hospitals found. Please try different search criteria.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include ('includes/footer.php'); ?>

<script> 
$(document).ready(function(){
    $(".secondmenuicon").click(function(){
        $("#sidebartab").slideToggle("slow");
    });
});
</script>
