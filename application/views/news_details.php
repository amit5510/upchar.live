<head>
    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
    <style>
	.aboutCont {
		background: white;
		padding: 14px 0px;
		border-radius: 0px 24px;
		margin-top: 31px;
	}
	#searchBTN {
		width: 100%;
		margin-top: 0px;
		box-shadow: 0px -4px 6px #00000091;
		padding: 12px;
		border: none;
		background-color: #043d5b;
		color: white;
		margin-top: 5px;
	}
    </style>
</head>
<?php include ("includes/header.php"); ?>
<div class="clearfix"></div>
<form action='<?=base_url();?>search' method='GET'>
    <div class="box-form">
		<div class="col-sm-2 col-sm-offset-1">
			<div class="input-group shadow">
				<span class="input-group-addon"> <i class="fa fa-map-marker"> &nbsp; &nbsp; </i></span>
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
		<div class="col-sm-2">
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

<div class="container">
	<div class="row">
		<!--<img src="images/logo.png" class="centerLogo">--> 
	</div>
	<div class="col-md-12 aboutCont">  
		<div class="">
			<h3 class="text-center"><b>News Details</b></h3>
			<h6><b><?php echo $news_details[0]->title; ?></b></h6>
			<p><?php echo $news_details[0]->description; ?></p>
			<?php if($news_details[0]->type=='1'){?>
			<img src="<?=admin_url();?>public/assets/upload/<?=($news_details[0]->image)? $news_details[0]->image : 'dummy.jpg';?>" alt="">
			<?php } else {?>
			<iframe width="560" height="315" src="<?php echo $news_details[0]->video_url;  ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<?php } ?>
		</div>
	</div>
</div>
<!-- Footer Code-->
<?php include ('includes/footer.php'); ?>
<div class="clearfix"></div>

<script type="text/javascript">
  $('.carousel').carousel({
  interval: 3000
})
</script>

<script>
$(document).ready(function(){
  $(".showPartners").mouseover(function(){
    $("#showBox").css("display", "block");
    
  });

  $(".close").click(function(){
    $("#showBox").css("display", "none");
    
  });

  $(".showPartners").click(function(){
    $("#showBox").css("display", "none");
    
  });
  
});


</script>
</body>
</html>