<?php include ("assets/includes/header_hospital.php"); ?>

    <?php include ("assets/includes/leftmenu_hospital.php"); ?>

    
    
        <div class="pag_cstm">
         
          <div class="row">
		   <div class="col-lg-12">
              <div class="pag_cstm_panel">
                <div class="pag_cstm_panel_panel_ontent p-t-0">
                  <div class="row paddb40">
                
					<div class="col-sm-12 processsstep2">
							    	<h4>Biomedical Equipment </h4> 
							</div>
      <?php foreach($data as $p) { ?>		
       <div class="col-md-12">
        
        
     	         	    	<div class="col-xs-12 box_sh_bg">
 	         	    	    <div class="row">
 	         	    	    <div class="col-md-3 text-center">
 	         	    	        <a href="<?=admin_url();?>public/assets/upload/<?=($p->image)?>">
 	         	    	        <img class="hospitalImg" src="<?=admin_url();?>public/assets/upload/<?=($p->image)?>"/></a>
 	         	    	          
 	         	    	        <div class="text-center">
 	         	    	         <a href="#" class="BTN">Book Now</a>
 	         	    	        <a href="#" class="BTN">Before Use</a>
 	         	    	         <a class="BTN" href="<?=admin_url();?>public/assets/upload/<?=($p->image)?>" download> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF Download</a>
 	         	    	           
 	         	    	        </div>
 	         	    	       
 	         	    	        <h3 style="color:black;"></h3>
 	         	    	     
 	         	    	    </div>
 	         	    	     <div class="col-md-9">
 	         	    	       <div class="row">
 	         	    	           <div class="col-md-7">
 	         	    	          <span class="hospitalName"><?=$p->equipment;?></span>	
 	         	    	          <h5 class="hospitalTitle"><?=$p->company_name;?></h5>
 	         	        <h5 class="hospitalTitle">Distributor -  <span class="innerTitle"><?=$p->distributor_name;?></span></h5>
 	         	         
 	         	         
 	         	          	         	       <div class="row">
 	         	        <div class="col-md-4 text-center">
 	         	        <div class="sqrBox text-center">
 	         	        <h5 class="bigfont">Price</h5>
 	         	        <span class="innerTitle"><?=$p->price;?></span>
 	         	          </div>   
 	         	        </div>
 	         	        <div class="col-md-4">
 	         	            <div class="sqrBox text-center">
 	         	        <h5 class="bigfont">M.R.P.</h5>
 	         	        <span class="innerTitle"><?=$p->mrp_price;?></span>
 	         	          </div> 
 	         	        </div>
 	         	        <div class="col-md-4 ">
 	         	            <div class="sqrBox text-center">
 	         	        <h5 class="bigfont">Discount</h5>
 	         	       <span class="innerTitle"><?=$p->discount_price;?></span>
 	         	        </div> 
 	         	        </div>
 	         	        
 	         	        </div>
 	         	        </div>
 	         	        
 	         	        <div class="col-md-5">
 	         	            <h6 class="hospitalName">Contact Us</h6>
 	         	          
 	         	             <h5 class="hospitalTitle"><i class="fa fa-phone FAicon" aria-hidden="true"></i><?=$p->distributor_mobile;?></h5>
 	         	             
 	         	             <h5 class="hospitalTitle"><i class="fa fa-envelope FAicon" aria-hidden="true"></i><?=$p->distributor_email;?></h5>
 	         	            
 	         	         <h5 class="hospitalTitle"><i class="fa fa-globe" aria-hidden="true"></i><a class="bookBTN" href="http://www.gyantech.online/" target="_blank"> Gyantech Internaational pvt ltd</a></h5>
 	         	        </div>
 	         	        
 	         	        </div>
 	         	         
 	         	        

 	         	        
 	         	        <div class="row">
<div class="col-md-6 descriptionBox">
  <h4 >Description</h4>
      <p><?=$p->short_desc;?></p>
      
</div>

<div class="col-md-6 descriptionBox">
  <h4>Specification</h4>
      <p><?=$p->long_desc;?></p>
      
</div>





</div>
 	         	        
 	         	       	     </div>
 



 	         	    	     </div>
 	         	     
 	         	        

   </div>
    
      
  </div>
  <?php } ?>
</div>

		
				
				
				
                        </div>  
						 </div>  
				   </div>
                </div>
              </div>
           
    
    
    <?php include ("assets/includes/footer_hospital.php"); ?>

	<link rel="stylesheet" type="text/css"  href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css'>

		<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
		<link rel="stylesheet" type="text/css"  href='https://www.upcharr.com/css/coustm.css'>		
		
		<style>		
		
.docimg img {
    width: 121px;
    height: 121px;
    border-radius: 72px;
    box-shadow: 1px 7px 0px #6b6464;

}
.hospitalName {
    color: #295771;
    font-size: 21px;
    font-weight: bold;
    text-transform: capitalize;
}
.tab-content{
    color: #295771;
}
.nav>li>a:focus, .nav>li>a:hover {
    text-decoration: none;
    background-color: #295771;
    border-radius: 0px 12px;
    color: white;
}

.descriptionBox{
    color:#295771;
}
.hospitalImg {
    width: 100%;
    height: 218px;
}
.hospitalImg:hover{
   
}
.hospitalTitle {
    color: #295771;
    font-weight: bold;
}
.sqrBox {
    padding: 6px;
    border: 1px solid #295771;
    margin-bottom: 4px;
}
.bigfont {
    font-weight: bold;
    font-size: 16px;
    color: #295771;
}
.innerTitle {
    color: gray;
}
.FAicon {
    margin-right: 9px;
}
.bookBTN {
    padding: 2px 11px;
    border-radius: 28px;
    background: #295771;
    color: white;
    margin-left: 9px;
    transition:0.3s;
}

.fa-file-pdf-o {
    font-size: 20px;
    margin-right: 8px;
}

.bookBTN:hover{
   color:gray;
}
.BTN {
    background: #295771;
    width: 100%;
    border-radius: 34px;
    color: white;
}
.BTN:first-child { 
  background:#26c426;
}
</style>
		<script>

		$(document).ready(function() {

			$('#datatable').DataTable();

		} );

		</script>