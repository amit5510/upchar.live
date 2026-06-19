<head>
    <link rel="icon" href="images/logo.png" type="images/logo.png" sizes="32x32">
</head>

<!-- Mirrored from eyecix.com/html/careplus/team-list.html by --->
<?php include ("includes/header_new.php"); ?>
<style>

.advertisement img{
    height:164px;
}
.CardBox {
    background: #9bc03c;
    color: white;
    padding: 11px 9px;
    margin-bottom: 18px;
    border-radius: 9px;
}
.CardBox:hover{
    transition:0.3s;
     transform: scale(1.03, 1.03);
}
.SmallName{
}
p {
    margin: 0 0 1px;
}
.btnBook {
    background: #84a532;
    color: #4f631b;
    font-weight: bold;
    text-align: center;
    margin-top: 10px;
    border-radius: 23px;
}
.backIcon {
    color: white;
    border-right: 2px solid white;
    padding-right: 4px;
}
.HandPName{
    color:white;
}
.leftTag {
    background: #84a532;
    color: white;
    padding: 10px 8px;
    border-radius: 23px;
   
   
}
.FeeTag {
    background: white;
    color: black;
    padding: 4px 7px;
}
.rightTag {
    background: #84a532;
    color: white;
    padding: 2px 11px;
    float: right;
    font-weight: bold;
    margin-bottom: 4px;
    border-radius: 14px;
}
.continue2 {
    background: #1c506a;
    color: white;
    padding: 12px 43px;
    border-radius: 24px;
    text-shadow: 2px 2px black;
}
td{transition: 0.9s;}
td:hover{background: green;text-align: center;}
.texttransform{
    text-transform:capitalize;
}

/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #043d5b; 
  
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: white; 
  border-radius:83px;

}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: white; 
}



.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: center;
    border-top: 1px solid #295771;
}
.table > thead > tr > th {
    vertical-align: bottom;
    border-bottom: 1px solid #295771;
}
.patienthistory{
    color:white;
    background: #1d3e50;
    border-radius: 0px 15px;
    border: 1px solid wheat;
}
#searchBTN {
    width: 100%;
    margin-top: 0px;
    box-shadow: 0px -4px 6px #183140;
    padding: 12px;
    border: none;
    background-color: #043d5b;
    color: white;
    margin-top: 5px;
}

    .careplus-navigation-section.careplus-bgcolor, .box-form .careplus-fancy-title{
        display:none;
    }
 

.headingTop{background:red;color:white;}




@media screen and (max-width: 786px) {
#sidebartab{position:absolute;z-index:432;margin:5px 0px; width: 263px;}
.careplus-main-content {
    padding: 0px 0px 60px 0px;
}
.mobilesearchicons{
    width:46px;
}

#sidebartab{position:absolute;z-index:432;margin:5px 0px; width: 263px;transition:0.3s;display:none;}


#searchBTN {
    width: 100%;
    margin-top: 0px;
    box-shadow: 0px -4px 6px #244c63;
    padding: 12px;
    border: none;
    background-color: #043d5b;
    color: white;
    margin-top: 11px;
    margin-bottom: 0px;
}

.nav > li > a {
    color: black;
}
.nav > li > a:hover, .nav > li > a:focus {
    text-decoration: none;
    background-color: #295771;
    border-radius:0px 0px;
    color: white !important;
}



}

.scrollit {
    overflow:scroll;
    height:300px;

    }

.manage{position: absolute;

background: #000;

width: 100%;

max-width: 828px;

margin-top: -40px;}
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

   <div class="careplus-main-content">


      <!--// Main Section \\-->
            <div class="careplus-main-section careplus-services-full">
                <div class="container">
                   
                    <div class="row">
                        <div class="col-md-3 text-center advertisement">
                            <img src="https://www.upchar.shop/images/Final_logo23.png" >
                            <h5 style="color:white;">Space For Ads..</h5>
                        </div>
                        <div class="col-md-9" style="background:#083042;height: 391px;overflow-y: scroll;">
                            <h4 style="color: white;background: ;text-align: center;padding: 2px;border-radius: 23px;border: 1px solid white;">Appointment History</h4>
						<?php if($this->session->flashdata('pgresponse')){ 
						echo "<div style='width:60%; position:inherit;top:25%;left:20%;background:#f3e30;color:#000;padding:1px;text-align:center;'>".$this->session->flashdata('pgresponse').'</div>'; 
						} ?>

                       


<div >
                                
                              
                              
                              <div class="col-md-12">
                                  	<?php foreach($appointments as $p){ ?> 
                             <div class="col-md-4">
					  
					    <div class="col-md-12 CardBox">
					        
					         <a href="#" class="leftTag"><?=$p['appointment']->appointment_id;?></a>
					           <a href="#" class="rightTag"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=$p['appointment']->from_timing.' - '.$p['appointment']->to_timing;?></a>
					           <a href="#" class="rightTag"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$p['appointment']->appointment_date;?></a>
					         
					         <div style="padding-top: 34px;">
					           
					           <hp><a style="color: white;" href='#' data-toggle="modal" data-target="#myModal"><?=$p['appointment']->patient_name;?></a></p>
					         <p><i class="fa fa-hospital-o backIcon" aria-hidden="true"></i> <a class="HandPName" href='<?=base_url();?>hospital/<?=$p['appointment']->institute_id;?>'><?=$p['institute']->name;?></a></p>
					         <p class="text-center">Booked For</p>
					         <p><i class="fa fa-user-md backIcon" aria-hidden="true"></i> <a class="HandPName" href='<?=base_url();?>doctor/<?=$p['appointment']->doctor_id;?>'><?=prefixdr($p['doctor']->fname).' '.$p['doctor']->lname;?></a></p>
					         <p><i class="fa fa-volume-control-phone backIcon" aria-hidden="true"></i> <?=$p['appointment']->appointment_mobile;?></p>
					         </div>
					     
					          <a href="#" class="FeeTag"><i class="fa fa-inr" aria-hidden="true"></i> <?=$p['appointment']->amount;?></a>
					          <a href="#" class="rightTag"><?php if($p['appointment']->payment_status=='DONE'){echo 'Paid';}else if($p['appointment']->payment_status=='UNPAID'){echo'Not Paid';} ?></a>
					     <p class="btnBook"> <?php if($p['appointment']->status=='1'){echo'Booked';}else if($p['appointment']->status=='2'){echo'Booked';} ?></p>
					    </div>
					  
					</div>
                          	<?php } ?>       
                      </div>  
                              
  <!--                              
    <table class="table" style="color:white;border:1px solid #295771;width: 1152px;">
        
      <thead>
        <tr>
            <th>Patient</th>
             <th>Hospital</th>
             <th>Doctor</th>
         <th>Date</th>
      <th>Time</th>
     
      
      
      <th>Mobile</th> 
      <th>Fee</th>
      <th class="text-center">Appointment ID</th>
      <th>Status</th>
      <th>Payment</th>
         
        </tr>
      </thead>
      <tbody style="font-size:12px;font-weight:bold;">
        	<?php foreach($appointments as $p){ ?>
      <tr>
                              	 <td >
                                 
                                  <a style="color: white;" href='#' data-toggle="modal" data-target="#myModal"><?=$p['appointment']->patient_name;?></a>
                                

                                </td>
                              	<td class="texttransform"><a style="color:red;" href='<?=base_url();?>hospital/<?=$p['appointment']->institute_id;?>'><?=$p['institute']->name;?></td>
                              	<td class="texttransform"> <a href='<?=base_url();?>doctor/<?=$p['appointment']->doctor_id;?>'><?=prefixdr($p['doctor']->fname).' '.$p['doctor']->lname;?></a></td>
                            	<td class="texttransform"> <?=$p['appointment']->appointment_date;?></td>
								<td class="texttransform"><?=$p['appointment']->from_timing.' - '.$p['appointment']->to_timing;?></td>
								
								
							
								<td > <?=$p['appointment']->appointment_mobile;?></td> 
								<td class="text-center"> <?=$p['appointment']->amount;?></td>
								<td class="text-center"> <?=$p['appointment']->appointment_id;?></td>
								<td class="texttransform"> <?php if($p['appointment']->status=='1'){echo'Booked';}else if($p['appointment']->status=='2'){echo'Booked';} ?></td>
								<td class="texttransform"><?php if($p['appointment']->payment_status=='DONE'){echo 'Paid';}else if($p['appointment']->payment_status=='UNPAID'){echo'Not Paid';} ?></td>
      </tr>
      	<?php } ?>
    </tbody>
    </table>
    -->
</div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

            
     
            
       

   </div>
    

        </div>
    


<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="padding: 23px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Patient Details </h4>
        </div>
        <div class="modal-body">
         
        
                         <form action ='' method='post'>
           
           <div class="formdiv">

            
               <div class="form-group">
                  <label for="text" class="colorwhite">Appointmet ID</label>
                  <input type="text" class="form-control" id="religion"  name="name" value="<?=$p['appointment']->appointment_id;?>">
                  
              </div>

                  <div class="form-group">
                  <label for="text" class="colorwhite">Hospital Name</label>
                  <input type="text" class="form-control" id="religion"  name="name" value="<?=$p['institute']->name;?>">
                  
              </div>

              <div class="form-group">
                  <label for="text" class="colorwhite">Patient Name</label>
                  <input type="text" class="form-control" id="religion"  name="email" data-validation="required"
                  data-validation-error-msg="This Field is required" value="<?=$p['appointment']->patient_name;?>">
                  
              </div>
              <div class="form-group">
                  <label for="text" class="colorwhite">Doctor Name</label>
                  <input type="text" class="form-control" id="religion"  name="email" data-validation="required"
                  data-validation-error-msg="This Field is required" value="<?=prefixdr($p['doctor']->fname).' '.$p['doctor']->lname;?>">
                  
              </div>
              
              <div class="form-group">
                  <label for="text" class="colorwhite">Mobile</label>
                  <input type="text" class="form-control" id="religion"  name="dob" data-validation="required"
                  data-validation-error-msg="This Field is required" value="<?=$p['appointment']->appointment_mobile;?>">
                  
              </div>
              <div class="form-group">
                  <label for="text" class="colorwhite">Appointment Date</label>
                  <input type="text" class="form-control" id="religion" name="dob" data-validation="required"
                  data-validation-error-msg="This Field is required" value="<?=$p['appointment']->appointment_date;?>">
                  
              </div>
              <div class="col-sm-12 click_step2 padding0">        
                  <button class="continue2" type='submit' name='submit'>Continue</button>
                  
              </div>
              
              

          </div>

      </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>


    <?php include ('includes/footer.php'); ?>
    
    
    
 

</script>

