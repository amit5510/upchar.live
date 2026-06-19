<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".buttonsforpayment").click(function(){
    $(".paymentbox").show();
    $(".coc").hide();
  });
  
  $(".buttonsforcoc").click(function(){
   $(".paymentbox").hide();
    $(".coc").show();
  });
});
</script>
</head>
<?php include ("assets/includes/header_hospital.php"); ?>
<?php include ("assets/includes/leftmenu_hospital.php"); ?>
        <div class="pag_cstm">
         
          <div class="row">
		   <div class="col-lg-12">
              <div class="pag_cstm_panel">
                <div class="pag_cstm_panel_panel_ontent p-t-0">
                  <div class="row paddb40">
                
				
				<div class="col-md-12">
				
		<!---- MAIN PAGE CONTENT --->
				
	 <div class="row">
    <div class="col-sm-4">
        <h3>PAYMENT CONFIRMATION </h3>
        <h6>Choose Methord</h6>
        <button class="buttonsforcoc">COC ( COST ON COUNTER )</button><br>
         <button class="buttonsforpayment">PAY NOW</button>
    </div>
    <div class="col-sm-8">
        
         <div class="coc">
            
             <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <h5><b>Name</b></h5>
                    <address>
                        <h4 style="text-transform: capitalize;">mohit bharti</h4>
                      <h5><b>Address</b></h5>
                       <h6><p><em>c-2/57 yamuna vihar delhi</p></em></h6>
                       
                         <h5><b>Phone</b></h5>
                        <h6><p><em>9911077446</p></em></h6>
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <h5><b>Date</b></h5>
                    <p><em>1st February, 2019</em></p>
                    
                    <h5><b>Appointment Number</b></h5>
                    <p>
                        <em> 34</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h3>COST ON COUNTER</h3>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>HOSPITAL</th>
                            <th>DOCTOR</th>
                            <th class="text-center">DATE</th>
                            <th class="text-center">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-4"><em>Upchar hospital</em></h4></td>
                            <td class="col-md-3" style="text-transform:capitalize;"> Dr. Amit </td>
                            <td class="col-md-3">23 Fed 2019</td>
                            <td class="col-md-2 ">11:00 AM</td>
                        </tr>
                    
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-lg btn-block">Thanks
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </button></td>
            </div>
        </div>
    </div> 
             
             
             
             
         </div>
        
        
        
        
        
        
        
        <!--payment coding-->
        <div class="paymentbox">
           
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
           <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <h5><b>Name</b></h5>
                    <address>
                        <h4 style="text-transform: capitalize;">mohit bharti</h4>
                      <h5><b>Address</b></h5>
                       <h6><p><em>c-2/57 yamuna vihar delhi</p></em></h6>
                       
                         <h5><b>Phone</b></h5>
                        <h6><p><em>9911077446</p></em></h6>
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <h5><b>Date</b></h5>
                    <p><em>1st February, 2019</em></p>
                    
                    <h5><b>Appointment Number</b></h5>
                    <p>
                        <em> 34</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h3>PAYMENT NOW</h3>
                </div>
                </span>
                <table class="table table-hover">
                     <thead>
                        <tr>
                            <th>HOSPITAL</th>
                            <th>DOCTOR</th>
                            <th class="text-center">DATE</th>
                            <th class="text-center">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                       <tr>
                            <td class="col-md-4"><em>Upchar hospital</em></h4></td>
                            <td class="col-md-3" style="text-transform:capitalize;"> Dr. Amit </td>
                            <td class="col-md-3">23 Fed 2019</td>
                            <td class="col-md-2 ">11:00 AM</td>
                        </tr>
                     
                       
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>$6.94</strong>
                            </p>
                            <p>
                                <strong>$6.94</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>$31.53</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-lg btn-block">
                    Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                </button></td>
            </div>
        </div>
    </div> 
            
       
        
        
    </div>
 
  </div>
		<!---- MAIN PAGE CONTENT --->
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
.buttonsforpayment, .buttonsforcoc{
    background: #043d5b;
    color: white;
    padding: 16px;
    margin-top: 10px;
}
.paymentbox{display:none;}
         </style>
          			<?php include ("assets/includes/footer_hospital.php"); ?>