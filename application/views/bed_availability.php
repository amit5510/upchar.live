<head>
    <style>
	.headingprivacy{
		background:#295771;
		color:white;
		padding: 0px 16px;
	}
        
	.firstletterdesign::first-letter { 
	font-size: 200%;
	color: #295771;
	font-weight:bold;
	}        
	.directorDetails {
	background: #295771;
	color: white;
	padding: 18px;
	border-radius: 0px 31px;
	text-align:right;
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php include ("includes/header_new.php"); ?>
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
<div style="background-color: #08364b;">
    <div class="container mt-2" >
        <div class="row">
            <div class="col">

            </div>
        </div>
		<div class="row">
			<?php if(is_array($hospital_bed) && !empty($hospital_bed)){
			foreach($hospital_bed as $val){?>
            <div style="background-color: white;  padding-right: 0px;padding-left: 0px;" class="col-sm-3 border-green pb-2 mx-3">
				<div class="hospital">
					<h4 style="font-weight:bold;color:white;" ><?php echo $val['name']; ?></h4>
					<p style="color:white;" ><?php echo $val['address'].','.$val['city_name']; ?></p>
				</div>
                <div class="p-15">
					<div class="table-responsive">
						<table class="table table-borderless table-sm">
							<tbody>
								<tr >
									<td class="text-black" style="border:0px;font-weight:bold">Bed type :</td>
									<td style="border:0px;"><?php echo $val['bed_type']; ?></td>
								</tr>
								<tr>
									<td class="text-black;" style="border:0px;font-weight:bold">Total bed :</td>
									<td style="border:0px;"><?php echo $val['total_bed']; ?></td>
								</tr>
								<tr>
									<td class="text-black" style="border:0px;font-weight:bold">Occupied bed :</td>
									<td style="border:0px;"><?php echo $val['occupied_bed']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row">
					  <?php if($val['total_bed']-$val['occupied_bed']>0){?>
						<div class="col-md-12" style="text-align: right;"><i class="fa fa-check" style="font-size:35px;color:#9bc03c" aria-hidden="true"></i></div>
					  <?php }else{?>
					  <div class="col-md-12" style="text-align: right;"><i class="fa fa-times" style="font-size:35px;color:red" aria-hidden="true"></i></div>
					  <?php } ?>
					</div>
					<p class="text-muted  h-15"><?php echo substr($val['comment'],0,500);?></p>
					<button class="fontSignUp">Call Now</button>
					 <i href="#" class="fa fa-phone" style="font-size:30px;color:red"></i> 844-844-0603
                </div>
            </div>
			<?php } }?>
			<div class="row" style="text-align:center;">
				<div class="col-sm-12">
					<?php echo $page_links;?>
				</div>
			</div>
		</div>
	</div>
</div>
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