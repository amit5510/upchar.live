<?php include ("assets/includes/header.php"); ?>
<?php include ("assets/includes/leftmenu.php"); ?>
        <div class="pag_cstm">
         
          <div class="row">
		   <div class="col-lg-12">
              <div class="pag_cstm_panel">
                <div class="pag_cstm_panel_panel_ontent p-t-0" style="background: #295771;border-radius: 0px 19px;">
                  <div class="row paddb40">
                
				
				<div class="col-md-12">
				
				
			<!--	<div class="col-lg-3 col-xs-6">
          <!-- small box 
          
          <div class="small-box bg-green">
            <div class="inner">
             
         <h3><?=$totaldoctor;?></h3>

              <p>Total Doctor</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <a href="<?=base_url()?>doctorpanel/managedoctor" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        
        </div>  -->
		
        
				<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box label-warning">
            <div class="inner">
              <h3><?=$todayappointment;?></h3>

              <p>Todays Appointment</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="<?=base_url();?>doctorpanel/manageappointment?d=<?=date('Y-m-d');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
        
				<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box label-danger">
            <div class="inner">
              <h3><?=$totalappointment;?></h3>

              <p>Total Appointment</p>
            </div>
            <div class="icon">
              <i class="fa fa-building-o"></i>
            </div>
            <a href="<?=base_url()?>doctorpanel/manageappointment" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
        
		
		
		</div>
		
		
				
				
				
                        </div>  
						 </div>  
				   </div>
                </div>
              </div>
            </div>
        
         <style>
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
         </style>
          			<?php include ("assets/includes/footer.php"); ?>